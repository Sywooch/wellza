<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class BundleController extends \backend\components\Controller {

    public function actionIndex() {
        $search_string = '';
        $model = new \common\models\Bundles();
        $post = Yii::$app->request->post();
        $category = $this->getCategory();
        if (($key = array_search('Wellza Bundles', $category)) !== false) {
            unset($category[$key]);
        }
                
        if(!empty($post['Bundles']['search'])) {
            $search_string = $post['Bundles']['search'];
            $query = \common\models\Bundles::getAllBundle($search_string,1);
            
        } else {
            $query = \common\models\Bundles::getAllBundle(null,1);
        }
        $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 5
                    
                ]
            ]);
                
        return $this->render('bundle', ['model' => $model, 'category' => $category, 'search' => $search_string, 'dataprovider' => $dataProvider->getModels(),'sortlinks' => \common\models\Bundles::setSortData(),'pagination' => $dataProvider->pagination]);
    }

    /** *
     * Get main catgory
     * * */

    public function getCategory() {

        $category = \common\models\Services::adminGetAllServices();

        $category = \yii\helpers\ArrayHelper::map($category, 'category_id', 'category_name');
        return $category;
    }

    /** *
     * Add bundle to db
     * 
     * * */

    public function actionAddBundle() {

        $model = new \common\models\Bundles();

        $post = Yii::$app->request->post();
        $model->category_name = $post['Bundles']['category_name'];
        if (\Yii::$app->request->isAjax && $model->load($post)) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        $model->load($post);
        $model->category_name = $post['Bundles']['category_name'];

        $returndata = $model->saveBundle();

        if ($returndata) {
            Yii::$app->session->setFlash('bundle_message', 'Bundle Saved successfully');
        } else {
            Yii::$app->session->setFlash('bundle_message', 'Bundle Not Saved');
        }

        $redirect_url = Yii::$app->urlManager->createUrl('bundle');
        return $this->redirect($redirect_url);
    }
    
    /** *
     * Update bundle
     * * */

    public function actionUpdateBundle() {
        
        $model = new \common\models\Bundles();
        $post = Yii::$app->request->post();
        $model->category_name = $post['Bundles']['category_name'];
        
        $model->load($post);
        $model->category_name = $post['Bundles']['category_name'];
        $model->bundle_id = $post['Bundles']['bundle_id'];
        
        $returndata = $model->saveBundle('edit');

        if ($returndata) {
            Yii::$app->session->setFlash('bundle_message', 'Bundle Updated successfully');
        } else {
            Yii::$app->session->setFlash('bundle_message', 'Bundle Not Updated');
        }

        $redirect_url = Yii::$app->urlManager->createUrl('bundle');
        return $this->redirect($redirect_url);
    }
    
    /***
     * Delete a bundle in the db table
     * **/
    public function actionDeleteBundle() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $returndata = \common\models\Bundles::deleteBundle($id);
                
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('bundle_message', 'Bundle deleted successfully');            
        } else {
            Yii::$app->session->setFlash('bundle_message', 'Bundle Not deleted');            
        }    
       
        $redirect_url = Yii::$app->urlManager->createUrl('bundle');
        return $this->redirect($redirect_url);
    }
    
    /**
     * Get all the category icons
     *
     */
    public function getIcons($icon_type = null) {
        
        return \common\models\IconClass::getAllIconClass($icon_type);
    }
    
    /**
     * Get all the sub categories
     *
     */
    public function actionSubcategories($id = null) {
        
        $id = Yii::$app->getRequest()->getQueryParam('id');
        
        $search_string = '';
        $model = new \common\models\Bundles();
        $post = Yii::$app->request->post();
        $bundle_data = \common\models\Bundles::getBundleData($id);
        $icon_class = $this->getIcons('Subcategory');
        $category = $this->getCategory();
        if(!empty($post['Bundles']['search'])) {
            $search_string = $post['Bundles']['search'];
            $dataprovider =  \common\models\BundlesCategories::adminGetAllSubCategoies($id,$search_string);
                        
            if($dataprovider->totalCount == 0) {
                return $this->render('subcategory',['model' => $model,'category' => $category, 'search' => $search_string,'dataprovider' => '','icon_class' => $icon_class,'pagination' => $dataprovider->pagination,'bundle_data' => $bundle_data,'sortlinks' => \common\models\BundlesCategories::setSortData()]);        
            }
        } else {
            $dataprovider = \common\models\BundlesCategories::adminGetAllSubCategoies($id);
            
        }  
        
        return $this->render('subcategory',['model' => $model,'category' => $category, 'search' => $search_string,'dataprovider' => $dataprovider->getModels(),'icon_class' => $icon_class,'pagination' => $dataprovider->pagination,'bundle_data' => $bundle_data,'sortlinks' => \common\models\BundlesCategories::setSortData()]);        
        //die;
        
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /***
     * Get choosen categories
     * **/
    public function actionGetSelectedCategory() {
        
        $data = Yii::$app->request->post();
        $bundle_id = $data['bundle_id'];
        $bundles = \common\models\Bundles::getBundleData($bundle_id);
        $categores_id = \common\models\BundlesCategories::getSelectedCategories($bundle_id);
        $returndata = array_merge($bundles,$categores_id);
        echo json_encode($returndata);
        die;
    }
    
    /***
     * Change the status of a bundle
     * **/
    public function actionChangeStatus() {
        
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }        
        $package_id = $data['bundle_id'];
        \common\models\Bundles::updateStatus($package_id, $status);        
        die;        
    }

}
