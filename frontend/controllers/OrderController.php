<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\Session;

class OrderController extends Controller
{
    public function actionIndex()
    {
        return $this->render('order_detail');
    }
    
    public function actionOrderDetail()
    {
        $session = Yii::$app->session;
        
        $order = new \common\models\Order();
        $order_detail = new \common\models\OrderDetail();
        $returndata = \common\models\OrderDetail::getOrderDetails($session->get('order_id'));
        //$order = $order->findOne(['id' => $session->get('order_id')]);
        //$order_detail = $order_detail->findOne(['order_id' => $order->id]);
        
        return $this->render('order_detail',['order' => $order,'order_detail' => $returndata]);
    }

}
