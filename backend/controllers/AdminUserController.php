<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\bootstrap\ActiveForm;
use yii\web\UploadedFile;

class AdminUserController extends \backend\components\Controller
{   
    /**
     * ajax function
     *
     */
    public function actionChangePassword() {
        
        $model = new \backend\models\ManageUser(['scenario' => \backend\models\ManageUser::SCENARIO_CHANGEDPASSWORD]);
        //$post = \Yii::$app->request->post();
        $model->id = \Yii::$app->request->post('user_id');
        $model->old_password = \Yii::$app->request->post('old_password');
        $model->new_password = \Yii::$app->request->post('new_password');
        $model->confirm_password = \Yii::$app->request->post('confirm_password');
        
        if(!$model->validate()) {
            echo \yii\helpers\Json::encode($model->errors);
            exit;
        }
        $return = $model->setUserPassword();
        if($return) {
            echo '{"response":["Password changes successfully"]}';
        } else {
            echo '{"response":["Password not set"]}';
        }
        exit;
        
    }
    /**
     * Redirect to admin user index page
     *
     */
    public function actionIndex()
    {   
        return $this->render('index');
    }
    
    /**
     * Get the list of all the user
     * 
     * @return user
     */
    public function actionGetUserList()
    {       
        $searchModel = new \common\models\Search();
        
        $searchstring = '';
        $query = '';
        $searchstring = Yii::$app->request->getQueryParam('search');
                
        if($searchstring) {
            
            $query = \common\models\User::getAllUsers($searchstring);
            
        }  else {
            $query = \common\models\User::getAllUsers();
            //return $this->render('userlist', ['model' => $model,'dataProvider' => $dataProvider,'searchModel' => $searchModel]);
        }
                        
        $dataProvider = new \yii\data\ActiveDataProvider([
                            'query' => $query,
                            'pagination' => [ 
                                'pageSize' => 10,
                            ],
                        ]);
        //return $this->render('userlist', ['model' => $model,'dataProvider' => $dataProvider,'searchModel' => $searchModel,'searchstring' => Yii::$app->request->get()]);
        
        return $this->render('index', [
                    'userlist' =>$dataProvider->getModels(),
                    'pagination' => $dataProvider->pagination,
                    'search' => $searchModel,
                    'searchstring' => $searchstring,
                    'sortlinks' => \common\models\User::setSortData()
               ]);
    }
    
    /**
     * This is used for add user data
     * 
     * @return user
     */
    public function actionAddUser()
    {   
        $model = new \backend\models\ManageUser();
        
        $post = Yii::$app->request->post();
       
        if($model->load($post) ) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->profile_image = UploadedFile::getInstance($model, 'profile_image');//UploadedFile::getInstanceByName('profile_image');
           // echo '<pre/>';
             //           print_r($model);die('...');           
            if($model->validate()) {
                                
                $file = UploadedFile::getInstance($model, 'profile_image');
                
                $returndata = $model->setUserData(null,$file);
                
                if(!empty($returndata)) {
                    Yii::$app->session->setFlash('success', 'Record Added Successfully!!');
                    
                } else {
                    Yii::$app->session->setFlash('error', 'Record not Added.');
                }
           }
                
        }
                  
        return $this->render('manageuser',['model' => $model]);
    }
    
    /**
     * This is used for edit user data
     * 
     * @return user
     */
    public function actionEditUser($id)
    {   die('...');
        $model = new common\models\base\UserForm;
        
        $post = Yii::$app->request->post();
        
        if($model->load($post) ) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                
                return ActiveForm::validate($model);
            }
            $model->profile_image = UploadedFile::getInstance($model, 'profile_image');//UploadedFile::getInstanceByName('profile_image');
           
            if($model->validate()) {
                                
                $file = UploadedFile::getInstance($model, 'profile_image');
                
                $returndata = $model->setUserData($id,$file);
                
                if(!empty($returndata)) {
                    Yii::$app->session->setFlash('success', 'Record Edit Successfully!!');
                    
                } else {
                    Yii::$app->session->setFlash('error', 'Record not Edited.');
                }
           }
                
        } else {
            $data = \common\models\User::findIdentity($id);
                      
            return $this->render('manageuser',['model' => $data,'editprofile' => 1]);
        }
        
        return $this->render('manageuser',['model' => $model,'editprofile' => 1]);
    }
    
}
