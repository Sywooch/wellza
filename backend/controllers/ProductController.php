<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ProductController extends \backend\components\Controller {

    public function actionIndex() {
        
        $model = new \common\models\Product();
        $search_string = '';
        $post = Yii::$app->request->post();
        $category_id = '';
        $sub_category_id = '';
        if(!empty($post['Product']['main_category']) || !empty($post['Product']['sub_category'])) {
            $category_id = $post['Product']['main_category'];
            $sub_category_id = $post['Product']['sub_category'];
            //$dataprovider =  $model->adminGetAllServices($category_id,$sub_category_id);
            $dataprovider = \common\models\Product::adminGetAllProducts($category_id,$sub_category_id);
        } else {
            $dataprovider = \common\models\Product::adminGetAllProducts();
            
        }
        $category = $this->getCategory();
        $subcategory = $this->getSubcategory();
         
        return $this->render('product', ['model' => $model, 'category' => $category,'category_id' => $category_id,'sub_category_id' => $sub_category_id, 'subcategory' => $subcategory,'dataprovider' => $dataprovider]);
        //return $this->render('product', ['model' => $model, 'category' => $category,'subcategory' =>$subcategory, 'dataprovider' => $dataprovider]);        
    } 
   
    /***
     * Add/edit products from here
     * **/
    
    public function actionManageProduct() {
        
        //$id = Yii::$app->getRequest()->getQueryParam('product_ids');
        
        $model = new \common\models\Product();
        $post = Yii::$app->request->post();
        
        $model->product_image = UploadedFile::getInstance($model, 'product_image');
        
        if (Yii::$app->request->isAjax && $model->load($post)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        $model->load($post);
        
        if(isset($post) && isset($post['product_ids'])) {
            
            $returndata = $model->saveProduct($post['product_ids']);

            if(!empty($returndata)) {
                Yii::$app->session->setFlash('category_success', 'Product updated successfully');
            }
        } else {
            
            $returndata = $model->saveProduct();

            if(!empty($returndata)) {
                Yii::$app->session->setFlash('category_success', 'Product added successfully');
            }
            
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('product');
        return $this->redirect($redirect_url);   
        
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
     * Get subcategories
     * **/
    public function getSubcategory() {
        $subcategory = \common\models\Services::adminGetAllSubCategories();
        $subcategory = \yii\helpers\ArrayHelper::map($subcategory,'category_id','category_name');
        return $subcategory;
    }
    
    /********************************************** Ajax Driven functions ********************************************************************/
    /****************************************************************************************************************************************/
    
    /**
     * Get data of a category
     *
     */
    
    public function actionProductData() {
        
        $data = Yii::$app->request->post();
        $product_id = $data['product_id'];
        $returndata = \common\models\Product::getProductDetails($product_id);        
        echo json_encode($returndata);
        die;
    }
    
    
    
    /**
     * Set status of a product
     *
     */    
    public function actionChangeStatus() {
        $data = Yii::$app->request->post();
        if($data['status'] == 'false') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        
        $product_id = $data['product_id'];
        \common\models\Product::updateStatus($product_id, $status);                
        die;      
    }
    
    /**
     * Delete a product
     *
     */    
    public function actionDeleteProduct() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $returndata = \common\models\Product::deleteProduct($id);
        if(!empty($returndata)) {
            Yii::$app->session->setFlash('category_success', 'Product deleted successfully');
            $redirect_url = Yii::$app->urlManager->createUrl('product');
            return $this->redirect($redirect_url);
        }
        
        $redirect_url = Yii::$app->urlManager->createUrl('product');
        return $this->redirect($redirect_url);                
    }
    
}
