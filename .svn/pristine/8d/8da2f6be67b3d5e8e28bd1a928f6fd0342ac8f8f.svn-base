<?php

/*
 * This api will get or set the data for a Available time slot of provider
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Availability Controller API
 *
 */
class AvailabilityController extends Controller {
      
    /**
     * Add the available time slot
     *
     * * */
    public function actionAddAvailability() {
        $model = new \common\models\Availability();
        $model->load($this->requestFormData,'');
        $on_date = Yii::$app->request->getBodyParam('on_date');
        
        if(!empty($on_date)){
            $on_date = $model->getFormatedDate($on_date);
            $model->on_date = $on_date; 
        }
        if(!$model->validate()) {
            return $model;
        } else {
            
            $access_token = Yii::$app->request->getHeaders()->get('access-token');
            $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);     
            
            $returndata = $model->manageAvailableSlot($auth->user_id);
            if(!empty($returndata)) {
                return $returndata;
            } else {
                return  \api\components\Utility::apiError('201', 'Record not saved');
            }
        }
        
    }
    
    /**
     * Edit the available time slot
     *
     * * */
    public function actionEditAvailability() {
        //$model = new \common\models\base\BaseAvailability();
        $model = new \common\models\Availability();
        $model->scenario = 'editavailability';
                
        $on_date = Yii::$app->request->getBodyParam('on_date');
        $model->load($this->requestFormData,'');       
        if(!empty($on_date)){
            $on_date = $model->getFormatedDate($on_date);
            $model->on_date = $on_date; 
        }
        
        if(!$model->validate()) {
            return $model;
        } else {
            $data = $model->manageAvailableSlot();
            if(!empty($data)) {
                return $data;
            } else {
                return \api\components\Utility::apiError('201', 'Record not Found');
            }
        }
    }
    /**
     * To the list of all the subcategories
     *
     * * */
    public function actionMyAvailability() {
        
        //$model = new \common\models\base\BaseAvailability();
        $model = new \common\models\Availability();
        $model->scenario = 'myavailability';
        
        $model->load($this->requestFormData,'');
        $on_date = Yii::$app->request->getBodyParam('on_date');
        
        if(!empty($on_date)){
            $on_date = $model->getFormatedDate($on_date);
            $model->on_date = $on_date; 
        }
        if(!$model->validate()) {
            return $model;
        } else {
            
            $returndata = $model->getAvailableSlot();
            if(!empty($returndata)) {
                return $returndata;
            } else {
                return \api\components\Utility::apiError('201', 'Record not Found');
            }
            
        }    
        
    }
    
    /**
     * To delete a particular time slot
     *
     * * */
    public function actionDeleteAvailability() {
        
        $model = new \common\models\Availability();
        $model->scenario = 'deleteavailability';
        
        $model->load($this->requestQueryParams,'');
                
        if(!$model->validate()) {
            return $model;
        } else {
            $returndata = \common\models\Availability::deleteSlot($model->slot_id);
            
            if(!empty($returndata)) {
                return true;
            } else {
                return \api\components\Utility::apiError('201', 'Record not Found');
            }
            
        }    
        
    }

}
