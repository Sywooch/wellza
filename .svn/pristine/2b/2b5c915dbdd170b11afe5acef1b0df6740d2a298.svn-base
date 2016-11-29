<?php
/*
 * This api will get or set the data for portfolio of a client or service provider 
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Portfolio Controller API
 *
 */
class PortfolioController extends Controller {
    
    /**
     * To the portfolio of a client or subscriber
     *
     * * */
    public function actionGetPortfolio()
    {
        $access_token = Yii::$app->request->getHeaders()->get('access-token');
        $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);     
        
        $returndata = \common\models\Portfolio::getPortfolioData($auth->user_id);
        
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return  \api\components\Utility::apiError('201', 'No Record found');
        }
   
    }
    
    /**
     * To add the portfolio for a client or subscriber
     *
     * * */
    public function actionAddPortfolio() 
    {   
        $model = new \common\models\Portfolio;
        
        $model->load($this->requestFormData,'');
        $model->media_url = UploadedFile::getInstanceByName('media_url');
        
        if(!$model->validate()) {
            return $model;
        } else {
           
            $access_token = Yii::$app->request->getHeaders()->get('access-token');
            $file = UploadedFile::getInstanceByName('media_url');

            $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);     

            $returndata = $model->addPortfolioData($auth->user_id,null,$file);
                       
            if (!empty($returndata)) {
                return $returndata;
            } else {
                return  \api\components\Utility::apiError('201', 'No Record found');
            }
        }
      
    }
    
   /**
     * Delete protfolio of a provider
     *
     * * */
    public function actionDelete($id = null) 
    {   
        $model = new \common\models\Portfolio();
        $model->id = $id;
        
        $model->scenario = 'delete';
        if(!$model->validate()) {
            return $model;
        }
        $access_token = Yii::$app->request->getHeaders()->get('access-token');
        $returndata = \common\models\Portfolio::deletePortfolioItem($id,$access_token);
        
        if(!empty($returndata)) {
            return true;
        } else {
            return  \api\components\Utility::apiError('201', 'No Record found');
        }
    }
}

