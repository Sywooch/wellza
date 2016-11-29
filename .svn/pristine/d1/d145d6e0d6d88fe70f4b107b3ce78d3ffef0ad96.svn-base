<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use  yii\web\Session;

class GiftCardController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {
        $model = new \common\models\GiftVoucher();
        return $this->render('gift-card',['model' => $model]);
    }
    /*
    public function actionAddCard() {
        $model = new \common\models\GiftVoucher();
        $data = Yii::$app->request->post();
        $model->load($data);
        if($model->validate()) {
            $returndata = \common\models\GiftVoucher::addGiftCard($data['GiftVoucher'],'web');
            if($returndata) {
                $session = Yii::$app->session;
                $session['gift_id'] = $returndata;
                $session['add'] = 'add';
                $session['commodity_type'] = 'gift_card';
                die;
                return $this->redirect(['/cart/add-to-cart']);
            }
        }
        die;
        //return $this->render('gift-card',['model' => $model]);                
    }*/

}
