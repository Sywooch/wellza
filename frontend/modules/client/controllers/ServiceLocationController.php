<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use  yii\web\Session;

class ServiceLocationController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {   //$session = Yii::$app->session;
        $model = new \common\models\Appointment();
        //$data = Yii::$app->request->post();
        $session = Yii::$app->session;
        
        if(!empty($session->get('appointment_id'))) {
            $data = $model->findOne(['id' => $session->get('appointment_id')]);
            
            return $this->render('service-location',['model' => $model,'data' => $data]);
        }
        
        return $this->render('service-location',['model' => $model]);
    }
    
    /**
     * set location for booking
     */
    public function actionSearchLocation() {
        
        $model = new \common\models\Appointment();
        $model->scenario = 'service-location';
        $data = Yii::$app->request->post();
        $session = Yii::$app->session;
        $model->load($data);
        //echo $model->validate();die('..');
        if (Yii::$app->request->isAjax && $model->load($data)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
               
        $session['address1'] = isset($data['Appointment']['address1']) ? $data['Appointment']['address1'] : '';
        $session['address2'] = isset($data['Appointment']['address2']) ? $data['Appointment']['address2'] : '';
        $session['address2'] = isset($data['Appointment']['address2']) ? $data['Appointment']['address2'] : '';
        $session['latitude'] = isset($data['Appointment']['latitude']) ? $data['Appointment']['latitude'] : '';
        $session['longitude'] = isset($data['Appointment']['longitude']) ? $data['Appointment']['longitude'] : '';         
        $session['preferred_location'] = isset($data['Appointment']['preferred_location']) ? $data['Appointment']['preferred_location'] : '';
        $session['city'] = isset($data['Appointment']['city']) ? $data['Appointment']['city'] : '';
        $session['province'] = isset($data['Appointment']['province']) ? $data['Appointment']['province'] : '' ;
        $session['postal_code'] = isset($data['Appointment']['postal_code']) ? $data['Appointment']['postal_code'] : '';
        $session['telephone_number'] = isset($data['Appointment']['telephone_number']) ? $data['Appointment']['telephone_number'] : '';
        $session['personal_information'] = isset($data['Appointment']['personal_information']) ? $data['Appointment']['personal_information'] : '';
        $returnadata = \common\models\User::searchWellzaProviders($data);
        //echo '<pre/>';
        //        print_r($returnadata->getModels());
        //        die('...');
        if(!empty($returnadata)) {
            $session['returndata'] = $returnadata->getModels();
            return $this->redirect(['/client/wellza-provider']);
        } 
            return $this->render('service-location',['model' => $model]);
        
        //$this->redirect(['/client/wellza-provider']);    
        
    }
    
    /*     * ******************************************** Ajax Driven functions ******************************************************************* */
    /*     * ************************************************************************************************************************************* */
    
    /**
     * Get the all provinces
     */
    public function actionGetProvinces() {
        $searchTerm = Yii::$app->request->get('term');
        $provinces = \common\models\MasterStates::searchProvince($searchTerm);
        echo json_encode($provinces);
        die;        
    }
    
    /**
     * Get the all cities
     */
    public function actionGetCities() {
        $searchTerm = Yii::$app->request->get('term');
        $cities = \common\models\MasterCities::searchCities($searchTerm);
        echo json_encode($cities);
        die; 
        
        
    }

}
