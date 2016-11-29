<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class GiftCardController extends \backend\components\Controller {

    public function actionIndex() {
        $dataprovider = \common\models\GiftVoucher::getAllGiftCard();
        return $this->render('gift-card',['gift_cards' => $dataprovider->getModels(),'pagination' => $dataprovider->pagination]);
    }
    
    /**
     * Delete a gift card
     *
     */    
    public function actionDeleteCard() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $returndata = \common\models\GiftVoucher::deleteCoupon($id);
        
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('gift_card_message', 'Gift Card deleted successfully');            
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('gift-card');
        return $this->redirect($redirect_url);                
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /***
     * Get choosen gift card
     * **/
    public function actionGiftCardData() {
        
        $data = Yii::$app->request->post();
        $id = $data['id'];
        $giftcard = \common\models\GiftVoucher::getGiftCardData($id);
        echo json_encode($giftcard);
        die;
    }
    
    /***
     * Change the status of a gift card
     * **/
    public function actionChangeStatus() {
        
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }        
        $id = $data['id'];
        \common\models\GiftVoucher::updateStatus($id, $status);
        die;        
    }


}
