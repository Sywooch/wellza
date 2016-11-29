<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ServicePackageController extends \backend\components\Controller
{
    public function actionIndex()
    {   $model = new \common\models\Services();
        $model_packages = new \common\models\Packages();
        $category = $this->getCategory();
        
        $dataprovider = \common\models\Packages::getAllPackage();
        return $this->render('service-package',['model' => $model,'model_packages'=>$model_packages,'category' => $category,'dataprovider' => $dataprovider]);
    }
    
    /***
     * Get main catgory
     * **/
    public function getCategory() {
        
        $category = \common\models\Services::adminGetAllServices();
        $category = \yii\helpers\ArrayHelper::map($category,'category_id','category_name');
        return $category;
    }
    
    /***
     * Saves Packages in the db table
     * **/
    public function actionAddPackage() {
        
        $model_packages = new \common\models\Packages();
        
        $model_packages->scenario = 'adminpackages';
        
        $post = Yii::$app->request->post();
        
        if (\Yii::$app->request->isAjax && $model_packages->load($post)) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model_packages);
        }
       
        $model_packages->load($post);
       
        $model_packages->parent = $post['Packages']['parent'];
        $model_packages->sub_category_name = $post['Packages']['sub_category_name'];
        $model_packages->start_time = $post['Packages']['start_time'];
        $model_packages->end_time = $post['Packages']['end_time'];
        $model_packages->minutes_duration = $post['Packages']['minutes_duration'];
        $model_packages->service_price = $post['Packages']['service_price']; 
         
        $returndata = $model_packages->savePackage();        
        
        if($returndata) {
            Yii::$app->session->setFlash('packages_message', 'Pacakage Saved successfully');
        } else {
            Yii::$app->session->setFlash('packages_message', 'Product Not Saved successfully');
        }        
        
        $redirect_url = Yii::$app->urlManager->createUrl('service-package');
        return $this->redirect($redirect_url);
    }
    
    /***
     * Saves Packages in the db table
     * **/
    public function actionUpdatePackage() {
        
        $model_packages = new \common\models\Packages();
        
        $model_packages->scenario = 'adminpackages';
        
        $post = Yii::$app->request->post();
              
        $model_packages->load($post);
       
        $model_packages->parent = $post['Packages']['parent'];
        $model_packages->sub_category_name = $post['Packages']['sub_category_name'];
        $model_packages->start_time = array_filter($post['Packages']['start_time']);
        $model_packages->end_time = array_filter($post['Packages']['end_time']);
        $model_packages->minutes_duration = array_filter($post['Packages']['minutes_duration']);
        $model_packages->service_price = array_filter($post['Packages']['service_price']); 
        $package_id = \common\models\Packages::getPackageId($post['Packages']['sub_category_name']);
        
        $returndata = $model_packages->savePackage($package_id);        
        
        if($returndata) {
            Yii::$app->session->setFlash('packages_message', 'Pacakage Updated successfully');
        } else {
            Yii::$app->session->setFlash('packages_message', 'Product Not Updated');
        }        
        
        $redirect_url = Yii::$app->urlManager->createUrl('service-package');
        return $this->redirect($redirect_url);
    }
    
    /***
     * Delete a packages in the db table
     * **/
    public function actionDeletePackage() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $returndata = \common\models\Packages::deletePackage($id);
        
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('packages_message', 'Package deleted successfully');            
        } else {
            Yii::$app->session->setFlash('packages_message', 'Package Not deleted');            
        }    
       
        $redirect_url = Yii::$app->urlManager->createUrl('service-package');
        return $this->redirect($redirect_url);
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /***
     * Get subcategories
     * **/
    public function actionGetSubcategory() {
        
        $data = Yii::$app->request->post();
        
        $category_id = $data['categoryid'];
        $subcategory_id =  $data['subcategoryid'];
        $model = new \common\models\Services();        
        $subcats = $model->getBySubServices($category_id);
        
        $subcategory_id = !empty($subcategory_id) ? $subcategory_id : $subcats[0]['category_id'];
        
        $category_data = \common\models\Services::getCatName($data['categoryid']);
        
        $category['category'] = $category_data->category_name;
        //$d = \yii\helpers\ArrayHelper::map(\common\models\Services::adminGetSubCategoies($category_id),'category_id','category_name');
        
        $subcategory_arr['subcategory'] = \yii\helpers\ArrayHelper::map(\common\models\Services::adminGetSubCategoies($category_id),'category_id','category_name');
        $slots_arra['slots'] = \common\models\Packages::getPackageSlots($data['categoryid'],$subcategory_id);
        //echo '<pre/>';
        //       print_r($slots_arra);die('...');
        //$slots_arra['slots'] = \common\models\PackageServices::getPackageSlots($data['categoryid']);
        //$subcategory_arr['subcategory'] = \yii\helpers\ArrayHelper::map($subcategory,'category_id','category_name');
        
        $returndata = array_merge($category,$subcategory_arr,$slots_arra);
        echo json_encode($returndata);
        die;
    }
    
    /***
     * Change the status of a package
     * **/
    public function actionChangeStatus() {
        
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        
        $package_id = $data['package_id'];
        \common\models\Packages::updateStatus($package_id, $status);
        die;        
    }
}
