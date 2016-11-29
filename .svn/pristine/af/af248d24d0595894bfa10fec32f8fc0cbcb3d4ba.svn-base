<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ProviderController extends \backend\components\Controller
{
    public function actionIndex()
    {   $model = new \common\models\User();
        $search_string = '';
        $post = Yii::$app->request->post();
        
        if(!empty($post['User']['search'])) {
            $search_string = $post['User']['search'];
            $dataprovider = \common\models\Customer::getAllUser($search_string,'Provider');            
        } else {
            $dataprovider = \common\models\Customer::getAllUser(null,'Provider');
        }        
        return $this->render('provider',['model' => $model,'search' => $search_string,'dataprovider' => $dataprovider->getModels(),'pagination' => $dataprovider->pagination]);        
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /**
     * Change the customer status from Active to Inactive and vice versa
     *
     */
    public function actionChangeStatus() {
        
        $data = Yii::$app->request->post();
        
        if($data['status'] == 'false') {
            $status = 0;
        } else {
            $status = 10;
        }
        //$status = $data['status'];
        $user_id = $data['user_id'];
        $returndata = \common\models\User::updateStatus($user_id, $status);
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('provider_message', 'Status updated successfully');
        } else {
            Yii::$app->session->setFlash('provider_message', 'Status not updated');
        }        
        die;
    }
    
    /**
     * Change the customer status from Active to Inactive and vice versa
     *
     */
    public function actionChangeVerification() {
        
        $data = Yii::$app->request->post();
        
        if($data['status'] == 'false') {
            $status = 'No';
        } else {
            $status = 'Yes';
        }
        //$status = $data['status'];
        $user_id = $data['user_id'];
        
        $returndata = \common\models\User::updateVerificationStatus($user_id, $status);
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('provider_message', 'Verification updated successfully');
        } else {
            Yii::$app->session->setFlash('provider_message', 'Verification not done');
        }
        die;
    }
    
    /**
     * Delete a provider
     *
     */    
    public function actionDeleteProvider() {
        $data = Yii::$app->request->post();
        $id = $data['user_id'];
        
        $returndata = \common\models\User::deleteUser($id);
        
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('provider_message', 'Provider deleted successfully');
            $redirect_url = Yii::$app->urlManager->createUrl('provider');
            return $this->redirect($redirect_url);
        } else {
            Yii::$app->session->setFlash('provider_message', 'Provider not deleted');
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('provider');
        return $this->redirect($redirect_url);                
    }

}
