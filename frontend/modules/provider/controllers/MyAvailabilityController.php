<?php
/************************************************************************************************************************//**
 *  Controller Name: MyAvailabilityController.php
 *  Created: Codian Team
 *  Description: This will manage the data of a provider's availability.Manages the ajax calls functions.
 
 ***************************************************************************************************************************/

namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Session;

class MyAvailabilityController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex()
    {
        return $this->render('my-availability');
    }
    
/********************************************** Ajax Driven functions ******************************************************************* */
/*************************************************************************************************************************************** */
    
    /**
     * Load availability data for the provider
     */
    public function actionLoadData() {
        
        $model = new \common\models\Availability();
        $returndata = $model->getAllSlot(Yii::$app->user->id);
        return $returndata;        
    }
    
    /**
     * Add availability data for the provider
     */
    public function actionAddAvailablity() {
        
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        $model->on_date = $post['on_date'];
        $model->from_time = $post['from_time'];
        $model->to_time = $post['to_time'];        
        $returndata = $model->manageAvailableSlot(Yii::$app->user->id,'xml');
        return $returndata;        
    }
    
    /**
     * update availability data for the provider
     */
    public function actionUpdateAvailablity() {
        
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        $model->slot_id = $post['event_id'];
        $model->on_date = $post['on_date'];
        $model->from_time = $post['from_time'];
        $model->to_time = $post['to_time'];        
        $returndata = $model->manageAvailableSlot(Yii::$app->user->id,'xml');
        return $returndata;        
    }
    
    /**
     * delete availability data for the provider
     */
    public function actionDeleteAvailablity() {
        
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        \common\models\Availability::deleteSlot(Yii::$app->user->id,$post['event_id']);
        return true;        
    }

}

/*************************************************************************************************************************************/
// EOF: MyAvailabilityController.php
/*************************************************************************************************************************************/
