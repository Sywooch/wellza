<?php

namespace backend\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class CategoryController extends \backend\components\Controller {

    public function actionIndex() {
        $search_string = '';
        $model = new \common\models\Services();
        $post = Yii::$app->request->post();
        if(!empty($post['Services']['search'])) {
            $search_string = $post['Services']['search'];
            $dataprovider = \common\models\Services::adminGetAllServices($search_string);            
        } else {
            $dataprovider = \common\models\Services::adminGetAllServices();
        }   
        
        $icon_class = $this->getIcons('Category');      
        
        return $this->render('category', ['model' => $model, 'search' => $search_string, 'dataprovider' => $dataprovider, 'icon_class' => $icon_class]);
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
        $model = new \common\models\Services();
        $post = Yii::$app->request->post();
        if(!empty($post['Services']['search'])) {
            $search_string = $post['Services']['search'];
            $dataprovider =  $dataprovider = \common\models\Services::adminGetSubCategoies($id,$search_string);
            
        } else {
            $dataprovider = \common\models\Services::adminGetSubCategoies($id);
            
        }
        
        $icon_class = $this->getIcons('Subcategory');
        
        return $this->render('subcategory',['model' => $model, 'search' => $search_string,'dataprovider' => $dataprovider,'icon_class' => $icon_class]);
        //return $this->render('subcategory', ['model' => $model, 'search' => $search_string, 'dataprovider' => $dataprovider, 'icon_class' => $icon_class]);
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /**
     * Add category services,this is ajax driven function 
     *
     */
    public function actionAddCategory() {
        $subcategory = 0;
              
        $data = Yii::$app->request->post();
        
        //if icon not selected
        if(empty($data['icons'])) {
            return 1;
        }
        
        //if category name is blank
        if(empty($data['Services']['category_name'])) {
            return 2;
        }
        
        //if both are empty
        if(empty($data['icons'][0]) && empty($data['Services']['category_name'])) {
            return 3; 
        }
        
        $current_action = (isset($data['current_action']) && !empty($data['current_action'])) ? $data['current_action'] : '';
        
        //if category with name already exists
        if($current_action != 'edit') {
            $returndata = \common\models\Services::IsCategoryExist($data['Services']['category_name']);
            if(!empty($returndata)) {
                return 4;
            }
        }    
        //save category
                        
        $model = new \common\models\Services();
        //$model->scenario = 'addcategory';
        $model->load(Yii::$app->request->post());
        $model->icon_name = (isset($data['icons']) && !empty($data['icons'])) ? $data['icons'] : '';
        $model->category_name = (isset($data['Services']['category_name']) && !empty($data['Services']['category_name'])) ? $data['Services']['category_name'] : '';
        
        $icon_id = \common\models\IconClass::getIconID($data['icons'][0]);
        if(isset($data['section']) && !empty($data['section'])) {
           $subcategory = 1; 
            $model->preparation_status =  (isset($data['Services']['preparation_status']) && !empty($data['Services']['preparation_status'])) ? $data['Services']['preparation_status'] : '';
            $model->description =  (isset($data['Services']['description']) && !empty($data['Services']['description'])) ? $data['Services']['description'] : '';
            $model->parent =  $data['parent_id'];           
            $model->banner =  \yii\web\UploadedFile::getInstance($model,'banner');           
        }
        
        $model->icon_id =  (isset($icon_id[0]['id']) && !empty($icon_id[0]['id'])) ? $icon_id[0]['id'] : '';
        if(isset($data['current_category_id'])) {
            $returndata = $model->addCategory($subcategory,$current_action,$data['current_category_id']);
        } else {
            $returndata = $model->addCategory($subcategory,$current_action);
        }
                
        if($returndata) {
            return 5;
        } else {
            return 6; 
        }            
        
        die();       
    }  
    
    /**
     * Change the category status from Active to Inactive and vice versa
     *
     */
    public function actionChangeStatus() {
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        //$status = $data['status'];
        $category_id = $data['category_id'];
        \common\models\Services::updateStatus($category_id, $status);
        
        die;
    }
    
    /**
     * Delete specific category
     *
     */
    public function actionDeleteCategory() {
        $data = Yii::$app->request->post();
                
        $category_id = $data['category_id'];
        $returndata = \common\models\Services::deleteCategory($category_id);        
        die;
    }
    
    /**
     * Get data of a subcategory
     *
     */
    public function actionSubCategoryDetails() {
        $data = Yii::$app->request->post();
        
        $category_id = $data['category_id'];
        $returndata = \common\models\Services::adminGetSubCategory($category_id);        
        echo json_encode($returndata);
        die;
    }
}
