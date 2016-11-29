<?php
/**
 * Manage all the data for provider services
 * **/
namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\web\NotFoundHttpException;

class ProviderServicesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
            
    /**
    * Edit all the data for provider services
    * **/
    public function actionManageProviderServices()
    {
        $model = new \common\models\ProviderServices();
        $model->access_token = Yii::$app->request->getHeaders()->get('access-token');
        $model->load($this->requestFormData,'');
        
        if(!$model->validate()) {
            return $model;
        }
        return $model->manageServices('edit');
    }
}
