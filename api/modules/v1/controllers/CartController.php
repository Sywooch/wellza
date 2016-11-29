<?php

/*
 * This api will get or set the data for a user
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Cart;
use common\models\GiftVoucher;
use common\models\Order;
use common\models\OrderDetail;
use common\models\StripePayment;

/**
 * User Controller API
 *
 */
class CartController extends Controller {

    /**
     * To get all the records from the user table
     *
     * * */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'authenticator' => [
                        'except' => []
                    ],
        ]);
    }

    public function actionIndex() {
        return ['index'];
    }
    public function actionView($id) {
        return ['view'];
    }
    public function actionCreate() {
        $post = $this->requestParams;
        $post['customer_id'] = \yii::$app->user->id;
         return Cart::add($post);
    }
    public function actionMyCart() {
        $userId = Yii::$app->user->id;
        return Cart::myCart($userId);
    }
    public function actionDelete($id) {
        return Cart::deleteFromCart($id);
    }
    public function actionAddGiftcard() {
        $post = $this->requestParams;
        return GiftVoucher::addGiftCard($post);
    }
    
    public function actionCheckout() {
        $userId = Yii::$app->user->id;
        $paymentModel = new StripePayment;
        $post = $this->requestParams;
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $order = Order::placeOrder($userId);
            $data['StripePayment'] = $post;
            $result = $paymentModel->paynow($data);
            if (!empty($result)) {
                Order::updateOrderStatus($userId, $order->id, $result);
                OrderDetail::createOrderDetails($userId, $order->id, $post);
                Cart::emptyCart($userId);
            }
            $transaction->commit();
            return true;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }
}
