<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\Session;

class BookAppointmentController extends \frontend\modules\client\components\Controller {

    public function actionIndex() {
        //die('...');
        $session = Yii::$app->session;
        $session->remove('appointment_id');
        $session->remove('categoryid');
        $session->remove('subcategoryid');
        
        $model = new \common\models\Services();
        $services = \common\models\Services::getServices();
        $category_id = 0;
        $sub_category_id = 0;
        $appointment_id = Yii::$app->request->get('id');
        if (isset($appointment_id)) {
            $category_array = \common\models\Appointment::getCategoriesByAppointment($appointment_id);
            $category_id = $category_array['category_id'];
            $sub_category_id = $category_array['sub_category_id'];
            $session['appointment_id'] = $appointment_id;
        }
        if (!empty($services)) {
            $data = Yii::$app->request->post();

            if (!empty($data)) {
                
                $category_id = $data['category_id'];

                if ($category_id == 0) {
                    
                    $cat = \common\models\Services::getFirstCategorySubServices();
                    $data = $model->getBySubServices($cat->category_id);
                } else {
                    
                    $data = $model->getBySubServices($category_id);
                }

                echo json_encode($data);
                exit();
            }
            
            $returndata = \common\components\Utility::getCategoryWithClass($services);
            return $this->render('book-appointment', ['model' => $model, 'returndata' => $returndata, 'category_id' => $category_id, 'sub_category_id' => $sub_category_id]);
        }
        //$returndata = \common\components\Utility::getCategoryWithClass($services);
        return $this->render('book-appointment', ['model' => $model, 'returndata' => $returndata]);
    }

    /**
     * Callback for social signup
     */
    public function actionGetCategories() {
        $services = \common\models\Services::getServices();

        $returndata = \common\components\Utility::getCategoryWithClass($services);
    }

    /**
     * save the data in the session
     */
    public function actionLoadPackage() {

        $session = Yii::$app->session;
        $data = Yii::$app->request->post();
        
        //$appointment_id = Yii::$app->request->get('id');
        $session['categoryid'] = $data['categoryid'];
        $session['subcategoryid'] = $data['subcategoryid'];
        /*if (!empty($session->get('appointment_id')) && empty($data['categoryid'])) {
            
            $category_array = \common\models\Appointment::getCategoriesByAppointment($session->get('appointment_id'));
            $session['categoryid'] = $category_array['category_id'];
            $session['subcategoryid'] = $category_array['sub_category_id'];            
        } else {
            
            $session['categoryid'] = $data['categoryid'];
            $session['subcategoryid'] = $data['subcategoryid'];
        }*/
        
        $this->redirect(['/client/service-package']);
        //return $this->render('/client/service-package');
    }

    /*     * ******************************************** Ajax Driven functions ******************************************************************* */
    /*     * ************************************************************************************************************************************* */

    /**
     * Callback for social signup
     */
    public function actionLoadSubcategory() {
        $data = Yii::$app->request->post();
        $model = new \common\models\Services();
        $category_id = $data['category_id'];
        //if($category_id == 0) {
        //    $cat = \common\models\Services::getFirstCategorySubServices();
        //    echo $cat->category_id;die;
        //    $returndata = $model->getBySubServices($category_id);
        //} else {
        $returndata = $model->getBySubServices($category_id);
        //}

        echo json_encode($returndata);
        die;
    }

}