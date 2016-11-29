<?php

/* * ********************************************************************************************************************* *//**
 *  Controller Name: CustomerDetailController.php
 *  Created: Codian Team
 *  Description: This will manage customer profile data.Manages the ajax call functions.
 * ************************************************************************************************************************* */

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class CustomerDetailController extends \backend\components\Controller {

    public function actionIndex($id = null) {
        $model = new \common\models\User();
        $data = \common\models\User::findAllByIdentity($id);
        $province = \common\components\Utility::provinceData('CA');

        $cities = \common\components\Utility::cityData('CA');
        return $this->render('customer-detail', ['model' => $model, 'data' => $data, 'province' => $province, 'cities' => $cities]);
    }

    /*     * *
     * Manages the customer details
     * 
     * ** */

    public function actionEditDetail($id = null) {
        $model = new \common\models\User();
        $post = Yii::$app->request->post();
        $model->load($post);
        if (Yii::$app->request->isAjax && $model->load($post)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $model->load($post);

        $model->gender = $post['User']['gender'];
        $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
        $model->crop_info = $post['User']['crop_info'];
        $isadmin = '';
              
        $data = \common\models\User::findIdentity($id);
        $province = \common\components\Utility::provinceData('CA');
        $cities = \common\components\Utility::cityData('CA');

        $model->scenario = 'adminEditProfile';
                
        $returndata = $model->setUserData($id, null, null, 'isadmin');
        if (!empty($returndata)) {
            Yii::$app->session->setFlash('customer_message', 'Profile edited!');
            return $this->redirect(Yii::$app->urlManager->createUrl('customer-detail') . '/' . $id);
        } else {
            Yii::$app->session->setFlash('customer_message', 'Failed to edit profile!');
            return $this->redirect(Yii::$app->urlManager->createUrl('customer-detail') . '/' . $id);
        }
    }

    /********************************************** Ajax Driven functions ******************************************************************* */
    /*************************************************************************************************************************************** */

    /** *
     * Manages the customer details
     * 
     * ** */

    public function actionProvinceCity() {
        $data = Yii::$app->request->post();

        $cities = \common\models\MasterCities::getCitiesByProvince($data['state_id']);
        echo json_encode($cities);
        die;
        //return $this->render('_edit-detail',['model' => $model,'data' => $data,'province' => $province,'cities' => $cities]);
    }

    /**
     * Change the customer status from Active to Inactive and vice versa
     *
     */
    public function actionChangeStatus() {

        $data = Yii::$app->request->post();

        if ($data['status'] == 'false') {
            $status = 0;
        } else {
            $status = 10;
        }
        $user_id = $data['user_id'];
        \common\models\User::updateStatus($user_id, $status);
        die;
    }
    
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

/*************************************************************************************************************************************/
// EOF: CustomerDetailController.php
/*************************************************************************************************************************************/
