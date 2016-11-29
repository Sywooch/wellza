<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use  yii\web\Session;

class ProviderDetailController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {   
        $rating_total = 0;
        $rating_count = 0;
        $average_rating = '';
        $review_count = 0;
        
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session['provider_id'] = $id;
        
        $returndata = \common\models\User::providerDetail($id);
        $rating_data = \common\models\ReviewRating::findAll(['provided_to' => $id]);                
        
        if(!empty($rating_data)) {
            for($i=0;$i<count($rating_data);$i++) {
                $rating_total = $rating_total + $rating_data[$i]['rating']; 
                $rating_count++;
                if(!empty($rating_data[$i]['review'])) {
                    $review_count++;
                }
            }
            $average_rating = $rating_total/$rating_count;
        }
        
        $is_upcoming = 0;
        $appointment_data = \common\models\Appointment::findOne(['id' => $session->get('appointment_id')]);        
        //echo $session->get('appointment_id');
        //echo $appointment_data->status;
        //echo '<pre/>';
        //        print_r($appointment_data);die('....');
        if(!empty($appointment_data) && $appointment_data->status == 'Upcoming') {
            $is_upcoming = 1;
        }        
        
        return $this->render('provider-detail',['returndata' => $returndata,'average_rating' => $average_rating,'rating_data' => $rating_data,'review_count' => $review_count,'is_upcoming' => $is_upcoming]);
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /***
     * Load calender dates for a particular month with its weekday
     * *** */

    public function actionSetAppointment() {
        
        $session['customer_id'] = \Yii::$app->user->identity->id;        
    }

}
