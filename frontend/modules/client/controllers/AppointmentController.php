<?php

/* * ********************************************************************************************************************* *//**
 *  Controller Name: AppointmentController.php
 *  Created: Codian Team
 *  Description: This will manage the data of a client appointment.Manages the ajax calls functions.
 * ************************************************************************************************************************* */

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\Session;

class AppointmentController extends \frontend\modules\client\components\Controller {

    public function actionIndex() {
        $model = new \common\models\Appointment();
        $model_review_rating = new \common\models\ReviewRating();
        $dataprovider_upcoming = \common\models\Appointment::getApppointmentData(\Yii::$app->user->id, 'Upcoming', 'web');
        $dataprovider_completed = \common\models\Appointment::getApppointmentData(\Yii::$app->user->id, 'Complete', 'web');
        return $this->render('appointment', ['model' => $model, 'upcoming' => $dataprovider_upcoming->getModels(), 'completed' => $dataprovider_completed->getModels(), 'model_review_rating' => $model_review_rating]);
    }

    /**
     * Saves the rating and review in the database given by client to provider 
     * */
    public function actionSaveReviewRating() {
        $model = new \common\models\ReviewRating();
        $id = Yii::$app->user->id;
        $data = Yii::$app->request->post();
        $model->load($data);
        $model->rating = $data['rating_value'];
        $model->provided_to = $data['provided_to'];
        $model->appointment_id = $data['appointment_id'];
        $returndata = $model->saveReiewRating($id, 'Client');
        die;
    }

    /**
     * Saves the rating and review in the database given by client to provider 
     * */
    public function actionGetReviews() {
        $data = Yii::$app->request->post();
        $returndata = \common\models\ReviewRating::getProviderReviews($data['providerid'], 'Client');
        echo json_encode($returndata);
        die;
    }

}

/*************************************************************************************************************************************/
// EOF: AppointmentController.php
/*************************************************************************************************************************************/
