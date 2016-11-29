<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class CustomerController extends \backend\components\Controller
{
    public function actionIndex() {
        $model = new \common\models\Customer();
        $search_string = '';
        $post = Yii::$app->request->post();
        
        if(!empty($post['Customer']['search'])) {
            $search_string = $post['Customer']['search'];
            $dataprovider = \common\models\Customer::getAllUser($search_string,'Client');            
        } else {
            $dataprovider = \common\models\Customer::getAllUser(null,'Client');
        }         
        
        return $this->render('customer',['model' => $model,'search' => $search_string,'dataprovider' => $dataprovider->getModels(),'pagination' => $dataprovider->pagination]);
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
        \common\models\User::updateStatus($user_id, $status);                
        die;
    }
}
