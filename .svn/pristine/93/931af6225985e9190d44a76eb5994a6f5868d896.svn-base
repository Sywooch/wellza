<?php

/* 
 * This api manages the packages data
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class PackagesController extends Controller
{   
   /* 
    * This api manages the packages data
    */
    public function actionSelectDate()
    {   
        $model = new \common\models\Packages();
             
        $model->load($this->requestFormData,'');
                
        if(!$model->validate()) {
            return $model;
        }
                
        $returndata = $model->get_select_date();
        
        if (!empty($returndata)) {
            
            return $returndata;
        } else {
            return  \api\components\Utility::apiError('201', 'No Record found');
        }
    }

}
