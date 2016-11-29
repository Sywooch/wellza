<?php

/* * ********************************************************************************************************************* *//**
 *  Controller Name: AvailabilityController.php
 *  Created: Codian Team
 *  Description: This will manage the meta data of a admin provider's Availability.Also manage the flow of data from view 
 * to modal and vice versa.
 * ************************************************************************************************************************* */
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class AvailabilityController extends \backend\components\Controller
{
    public function actionIndex()
    {
        $model = new \common\models\Availability();
        $returdata = \common\models\Availability::getAllProviders();
        return $this->render('availability',['returdata' => $returdata]);
    }
/* * ******************************************** Ajax Driven functions ******************************************************************* */
/* * ************************************************************************************************************************************* */

    /**
     * Load availability data for the provider
     */
    public function actionLoadData() {
        $user_id = Yii::$app->request->get('user_id');
        $model = new \common\models\Availability();
        $returndata = $model->getAllSlot($user_id);
        //return $this->renderAjax('_calender', ['returndata' => $returndata]);
        return $returndata;
    }

    /**
     * Add availability data for the provider
     */
    public function actionAddAvailablity() {
        $user_id = Yii::$app->request->get('user_id');
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        $model->on_date = $post['on_date'];
        $model->from_time = $post['from_time'];
        $model->to_time = $post['to_time'];
        $returndata = $model->manageAvailableSlot($user_id, 'xml');
        return $returndata;
    }

    /**
     * update availability data for the provider
     */
    public function actionUpdateAvailablity() {
        $user_id = Yii::$app->request->get('user_id');
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        $model->slot_id = $post['event_id'];
        $model->on_date = $post['on_date'];
        $model->from_time = $post['from_time'];
        $model->to_time = $post['to_time'];
        $returndata = $model->manageAvailableSlot($user_id, 'xml');
        return $returndata;
    }

    /**
     * delete availability data for the provider
     */
    public function actionDeleteAvailablity() {
        $user_id = Yii::$app->request->get('user_id');
        $model = new \common\models\Availability();
        $model->scenario = 'providerAvailability';
        $post = Yii::$app->request->post();
        \common\models\Availability::deleteSlot($user_id,$post['event_id']);
        return true;
    }

}
/* * ********************************************************************************************************************************** */
// EOF: AvailabilityController.php
/* * ********************************************************************************************************************************** */