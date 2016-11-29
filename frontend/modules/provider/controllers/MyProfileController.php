<?php
/************************************************************************************************************************//**
 *  Controller Name: MyProfileController.php
 *  Created: Codian Team
 *  Description: This will manage the meta data of a provider's profile.Also manage the flow of data from view to modal and
 * vice versa.
 ***************************************************************************************************************************/

namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Session;
//use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class MyProfileController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex()
    {   
        return $this->render('my-profile');
    }
    
/********************************************** Ajax Driven functions ******************************************************************* */
/*************************************************************************************************************************************** */
    
    /**
     * View providers profile
     */
    public function actionViewProfile()
    {   
        $model = new \common\models\User();
        $returndata = \common\models\User::providerDetail(Yii::$app->user->id);
        return $this->renderAjax('my-profile', ['returndata' => $returndata,'model' => $model]);        
    }
    
    /**
     * View providers profile
     */
    public function actionEditProfile()
    {   
        $model = new \common\models\User();
        
        $id = Yii::$app->user->id;
        $model->scenario = 'providerEditProfile';
        
        $post = Yii::$app->request->post();
        
        if (Yii::$app->request->isAjax && $model->load($post)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $model->load($post);
        
        
        $model->image = \yii\web\UploadedFile::getInstance($model,'image');
              
        //$model->load($post);
        
        $model->gender = $post['User']['gender'];
               
        $model->crop_info = $post['User']['crop_info'];
        $isadmin = '';       
                      
        $data = \common\models\User::findIdentity($id);
        $province = \common\components\Utility::provinceData('CA');
        $cities = \common\components\Utility::cityData('CA');
        
        $returndata = $model->setUserData($id,null ,null,'isadmin');
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('service_message', 'Profile edited!');
                    
        } else {
            Yii::$app->session->setFlash('service_message', 'Failed to edit profile!');
            //return $this->redirect(Yii::$app->urlManager->createUrl('customer-detail').'/'.$id);
        }
        return $this->redirect(Yii::$app->urlManager->createUrl('provider/service'));
        //die('..');
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
// EOF: MyProfileController.php
/*************************************************************************************************************************************/
