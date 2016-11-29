<?php
/* * ********************************************************************************************************************* *//**
 *  Controller Name: AppointmentController.php
 *  Created: Codian Team
 *  Description: This will manage the data of a providers appointment.Manages the ajax calls functions.
 * ************************************************************************************************************************* */

namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\Session;

class AppointmentController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex() {
        $model = new \common\models\Appointment();
        $model_review_rating = new \common\models\ReviewRating();
        $dataprovider_upcoming = \common\models\Appointment::getProviderApppointmentData(\Yii::$app->user->id, 'Upcoming', 'web');
        $dataprovider_completed = \common\models\Appointment::getProviderApppointmentData(\Yii::$app->user->id, 'Complete', 'web');
        return $this->render('appointment', ['model' => $model, 'upcoming' => $dataprovider_upcoming->getModels(), 'completed' => $dataprovider_completed->getModels(), 'model_review_rating' => $model_review_rating]);
    }

    /**
     * Saves the rating and review in the database given by provider to client 
     * */
    public function actionSaveReviewRating() {
        $model = new \common\models\ReviewRating();
        $id = Yii::$app->user->id;
        $data = Yii::$app->request->post();
        $model->load($data);
        $model->rating = $data['rating_value'];
        $model->provided_to = $data['provided_to'];
        $model->appointment_id = $data['appointment_id'];
        $returndata = $model->saveReiewRating($id, 'Provider');
        die;
    }

    /**
     * Saves the rating and review in the database given by provider to client 
     * */
    public function actionGetReviews() {
        $data = Yii::$app->request->post();
        
        $returndata = \common\models\ReviewRating::getClientReviews($data['clientid'], 'Provider');
        echo json_encode($returndata);
        die;
    }
    
    /**
     * Provider cancels the alloted upcoming client appointment
     * */
    public function actionCancelAppointment() {
        $data = Yii::$app->request->post();
        $returndata = \common\models\Appointment::cancelAppointment($data['appointment_id'], 'Cancel');
        die;
    }
    

}

/*************************************************************************************************************************************/
// EOF: AppointmentController.php
/*************************************************************************************************************************************/
