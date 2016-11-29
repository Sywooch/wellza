<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class CouponController extends \backend\components\Controller
{
    public function actionIndex()
    {
        $model = new \common\models\Coupon();
        $dataprovider = \common\models\Coupon::getAllCoupon();
        $code = $model->generate();        
        return $this->render('coupon',['dataprovider' => $dataprovider->getModels(),'pagination' => $dataprovider->pagination,'model' => $model,'code' =>$code]);
    }
    
    /***
     * Function to add the coupon data in the database
     * **/
    public function actionAddCoupon() {
        $model = new \common\models\Coupon();
        $post = Yii::$app->request->post();
                        
        if (Yii::$app->request->isAjax && $model->load($post)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        $model->load($post);
        
        $returndata = $model->saveCouponData();
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('coupon_message', 'Coupon added successfully');
        } else {
            Yii::$app->session->setFlash('coupon_message', 'Coupon Not added');
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('coupon');
        return $this->redirect($redirect_url);        
    }
    
    /***
     * Function to edit the coupon data in the database
     * **/
    public function actionEditCoupon() {
        $model = new \common\models\Coupon();
        $post = Yii::$app->request->post();
               
        $model->load($post);
        
        $returndata = $model->updateCouponData($post['couponid']);
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('coupon_message', 'Coupon Updated successfully');
        } else {
            Yii::$app->session->setFlash('coupon_message', 'Coupon Not added');
        }
        $redirect_url = Yii::$app->urlManager->createUrl('coupon');
        return $this->redirect($redirect_url); 
    }
    
    /***
     * Function to delete the coupon data from the database
     * **/
    public function actionDeleteCoupon() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $returndata = \common\models\Coupon::deleteCoupon($id);
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('coupon_message', 'Coupon deleted successfully');
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('coupon');
        return $this->redirect($redirect_url);
    }
    
     /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /***
     * Get choosen Coupon data
     * **/
    public function actionGetCouponData() {
        
        $data = Yii::$app->request->post();
        $id = $data['id'];
        $coupon_data = \common\models\Coupon::getCouponData($id);
        echo json_encode($coupon_data);
        die;
    }  
    
    /***
     * Change the status of a Coupon
     * **/
    public function actionChangeStatus() {
        
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        $id = $data['id'];
        \common\models\Coupon::updateStatus($id, $status);
        die;        
    }

}
