<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use  yii\web\Session;

class ServicePackageController extends \frontend\modules\client\components\Controller {
          
    public function actionIndex() {
        
        $model = new \common\models\Services();
        $data = Yii::$app->request->post();
        $session = Yii::$app->session;
        $appointment_data = '';
        $appointment_id = Yii::$app->request->get('id');
        $time_slider = '';
        $slots_data = '';
        if(!empty($appointment_id) || !empty($session->get('appointment_id'))) {
            if(!empty($session->get('appointment_id'))) {
                $appointment_id = $session->get('appointment_id');
            } else {
                $session['appointment_id'] = $appointment_id;
            }
            
            //$appointment_id = $session->get('appointment_id');
            $appointment_data = \common\models\Appointment::findOne(['id' => $appointment_id]);
            //echo '<pre/>';print_r($appointment_data);die;
            $returndata = \common\models\Packages::getPackageData($appointment_data->package_id);
            
            $session['categoryid'] = $returndata->parent;
            $session['subcategoryid'] = $returndata->service_id;
            $slots_data = \common\models\Packages::getPackageSlots($session->get('categoryid'), $session->get('subcategoryid'),$appointment_data->appointment_duration);
            $time_slider = \common\models\Services::timeSlider($slots_data,$appointment_data);
            //echo '<pre/>';print_r($slots_data);die('1');
        }else {            
            
            $slots_data = \common\models\Packages::getPackageSlots($session->get('categoryid'), $session->get('subcategoryid'));
            $time_slider = \common\models\Services::timeSlider($slots_data,$appointment_data);//echo '<pre/>';print_r($slots_data);die('2');
        } 
        
               
        //echo '<pre/>';print_r($slots_data);die('...');
        $content = $model->customContent();
        if(!empty($appointment_data)) {
            $ap_date = $appointment_data->appointment_date;
            $appointment_date_array = explode('-',$ap_date);
            $day_slider = $model->customCalenderSlider($appointment_date_array[2],$appointment_date_array[1],$appointment_date_array[0]);
        } else {
            $day_slider = $model->customCalenderSlider();
        }       
        
        if(!empty($appointment_data)) {
            
            return $this->render('service-package', ['content' => $content, 'day_slider' => $day_slider, 'time_slider' => $time_slider, 'slots_data' => $slots_data,'appointment_data' => $appointment_data]);
        }
        
        return $this->render('service-package', ['content' => $content, 'day_slider' => $day_slider, 'time_slider' => $time_slider, 'slots_data' => $slots_data]);
    }
    
     /**
     * save the data in the session for service package
     */
    public function actionLoadLocation() {
        
        $data = Yii::$app->request->post();
        $session = Yii::$app->session;
        
        $session['appointment_minutes'] = $data['appointment_minutes'];
        $session['appointment_price'] = $data['appointment_price'];
        $session['appointment_date'] = $data['appointment_date'];
        $session['appointment_time'] = $data['appointment_time'];
        return $this->redirect(['/client/service-location']);
        //return $this->render('@frontend/client/service-location');
        //return $this->render('/'.$url);
    }

    /********************************************** Ajax Driven functions ******************************************************************* */
    /*************************************************************************************************************************************** */

    /***
     * Load calender dates for a particular month with its weekday
     * *** */

    public function actionLoadCalender() {
        $data = Yii::$app->request->post();
        
        $model = new \common\models\Services();
        $content = $model->customContent($data['month'], $data['year']);
        if(!empty($data['day'])) {
            
            $day_slider = $model->customCalenderSlider($data['day'],$data['month'], $data['year']);
        } else {
            
            $day_slider = $model->customCalenderSlider(null,$data['month'], $data['year']);
        }
        
        $returndata = $content . '####' . $day_slider;
        echo $returndata;
        die();
    }
    
    /***
     * Load time slider with the available slots
     * *** */

    public function actionLoadTimeSlots() {
        $data = Yii::$app->request->post();
       $appointment_data = '';
        $session = Yii::$app->session;
        if(!empty($session->get('appointment_id'))) {
            $appointment_id = $session->get('appointment_id');
            $appointment_data = \common\models\Appointment::findOne(['id' => $appointment_id]);
            //echo '<pre/>';print_r($appointment_data); die;
            //$returndata = \common\models\Packages::getPackageData($appointment_data->package_id);
            $package_data = \common\models\Packages::findOne(['package_id' => $appointment_data->package_id]);
            //echo '<pre/>';print_r($package_data); 
            $slots_data = \common\models\Packages::getPackageSlots($package_data->parent,$package_data->service_id,$data['appointment_minutes']);
            //echo '<pre/>';print_r($slots_data);die('....');
            $time_slider = \common\models\Services::timeSlider($slots_data,$appointment_data);            
        } else {
            $slots_data = \common\models\Packages::getPackageSlots($session->get('categoryid'), $session->get('subcategoryid'),$data['appointment_minutes']);
            $time_slider = \common\models\Services::timeSlider($slots_data,$appointment_data);
        }
        /*$data = Yii::$app->request->post();
        $model = new \common\models\Services();
        $content = $model->customContent($data['month'], $data['year']);
        $day_slider = $model->customCalenderSlider($data['month'], $data['year']);
        $returndata = $content . '####' . $day_slider;*/
        echo $time_slider;
        die();
    }
    
    /***
     * Check for available time slot
     * *** */

    public function actionCheckSlots() {
        $session = Yii::$app->session;
        $data = Yii::$app->request->post();
        $model = new \common\models\Services();
        $params['customer_id'] = Yii::$app->user->id;
        $params['categoryid'] = $session->get('categoryid');
        $params['subcategoryid'] = $session->get('subcategoryid');
        $params['appointment_minutes'] = $data['appointment_minutes'];
        $date_time = $data['appointment_date'].' '. $data['appointment_time'];
        $appointment_time = date('g:i A', strtotime($date_time));
        $params['appointment_date'] = $data['appointment_date'];
        $params['appointment_time'] = $appointment_time;
        $params['appointment_price'] = $data['appointment_price'];
        $returdsata = \common\models\Packages::IsPackageExist($params);
        
        if($returdsata) {
            echo 1;
        } else {
            echo 0;
        }        
        die();
    }
}
