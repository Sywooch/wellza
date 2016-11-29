<?php
/*
 * This api is used to manage user related operations
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class CustomerController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
    * Get all the providers
    * **/
    public function actionAllProviders()
    {
        //$model = new \common\models\base\BaseCustomer();
        $model = new \common\models\Customer();
        $model->load($this->requestParams,'');
        $model->access_token = Yii::$app->request->getHeaders()->get('access-token');
        
        if(!$model->validate()) {
            return $model;
        }
        
        $returndata = $model->getProvidersData();
        if(!empty($returndata)) {
            return $returndata;
            
        } else {
            return \api\components\Utility::apiError('201', 'Records not found');
        }
    }
    
    /**
    * Get a provider detail
    * **/
    public function actionProviderDetail()
    {
        //$model = new \common\models\base\BaseCustomer();
        $model = new \common\models\Customer();
        $model->scenario = 'providerdetail';
        $model->load(Yii::$app->request->getQueryParams(),'');
        $model->access_token = Yii::$app->request->getHeaders()->get('access-token');
        
        if(!$model->validate()) {
            return $model;
        }
        
        $returndata = $model->getProvidersData('provider');
        if(!empty($returndata)) {
            return $returndata;
            
        } else {
            return \api\components\Utility::apiError('201', 'Records not found');
        }
    }
    
    /**
    * Get a provider detail
    * **/
    public function actionFavourite()
    {
        $model = new \common\models\base\BaseFavouriteList();
        $model->load($this->requestFormData,'');
               
        if(!$model->validate()) {
            return $model;
        }
        $returndata = $model->addFavourites();
        if($returndata) {
            return $returndata;
        } else {
            return null;
        }
    }
}
