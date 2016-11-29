<?php

/*
 * This api will get or set the data for a Appointment
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\web\NotFoundHttpException;
use common\models\ReviewRating;
use common\models\Appointment;

/**
 * Availability Controller API
 *
 */
class AppointmentController extends Controller {
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    /**
     * Fix Appointment for the client
     *
     * * */
    public function actionAddAppointment() {
        //$model = new \common\models\base\BaseAppointment();
        $model = new Appointment();
        $model->load($this->requestParams, '');
        $model->customer_id = Yii::$app->user->id;
        if (!$model->validate()) {
            return $model;
        }
        $returndata = $model->addAppointment();
        if (!empty($returndata)) {
            return true;
        } else {
            return \api\components\Utility::apiError('201', 'Record not saved.');
        }
    }

    /**
     * Upcoming Appointment for the client
     *
     * * */
    public function actionUpcomingAppointment() {
        $customer_id = $this->getCustomerID();

        //$returndata = \common\models\base\BaseAppointment::getApppointmentData($customer_id,'upcoming');
        $returndata =  Appointment::getApppointmentData($customer_id, 'upcoming');

        if (!empty($returndata)) {

            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * Check in Appointment
     *
     * * */
    public function actionCheckIn() {
        $customer_id = $this->getCustomerID();
        $returndata = Appointment::getAppointmentStatus($customer_id, 'CheckIn');
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * Check out Appointment
     *
     * * */
    public function actionCheckOut() {
        $customer_id = $this->getCustomerID();
        $returndata = Appointment::getAppointmentStatus($customer_id, 'CheckOut');
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * Complete Appointment
     *
     * * */
    public function actionComplete() {
        $customer_id = $this->getCustomerID();
        $returndata = Appointment::getAppointmentStatus($customer_id, 'Complete');
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * Cancel Appointment
     *
     * * */
    public function actionCancel($id) {
        return Appointment::changeAppointmentStatus($id,'Cancel');
    }

    /**
     * Pending Appointment
     *
     * * */
    public function actionPending() {
        $customer_id = $this->getCustomerID();
        $returndata = Appointment::getAppointmentStatus($customer_id, 'Pending');
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * @return customer id
     *
     * * */
    public function getCustomerID() {
        $access_token = Yii::$app->request->getHeaders()->get('access-token');
        $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);
        return $auth->user_id;
    }

    /**
     * Completed Appointment
     *
     * * */
    public function actionCompletedAppointment() {
        $customer_id = $this->getCustomerID();
        $returndata = Appointment::getApppointmentData($customer_id, 'Complete');
        if (!empty($returndata)) {
            return $returndata;
        } else {
            return \api\components\Utility::apiError('201', 'Record not found');
        }
    }

    /**
     * Submit review for  Appointment
     *
     * * */
    public function actionRating() {
        $post = $this->requestParams;
        $post['provided_by'] = Yii::$app->user->id;
        $post['rating_date'] = date('Y-m-d');
        $post['rating_given_by'] = 'Client';
        return ReviewRating::saveReview($post);
        
    }
    /**
     * Submit Reschedule an  Appointment
     *
     * * */
    public function actionReschedule($id) {
        $model = Appointment::find()->byId($id)->byStatus('Upcoming',  \yii::$app->user->id)->one();
        if (!empty($model)) {
            $model->load($this->requestParams, '');
            if (!$model->validate()) {
                return $model;
            }
            $returndata = $model->rescheduleAppointment();
            if (!empty($returndata)) {
                return true;
            } else {
                return \api\components\Utility::apiError('201', 'Record not saved.');
            }
        } else {
            return \api\components\Utility::apiError('201', 'Record not saved.');
        }
    }
}
