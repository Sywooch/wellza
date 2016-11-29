<?php

namespace frontend\modules\auth\controllers;

use yii;
use yii\base\Action;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use common\models\SignupFactory;
use api\components\Response;
use common\models\User;
use yii\web\UploadedFile;
use yii\authclient\AuthAction;
use yii\web\UrlManager;
use yii\web\Request;

class SignupController extends \frontend\modules\auth\components\Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
                //'redirectView' => $this->redirect(['/auth/signup/client'])
            ],
        ];
    }

    /**
     * Callback for social signup
     */
    public function onAuthSuccess($client) {
        $attributes = $client->getUserAttributes(); 
        
        $social_type = '';
        if(strpos($client->authUrl,"facebook")) {
            $social_type = 'facebook';
        }/* elseif (strpos($client->authUrl,"twitter")) {
            $social_type = 'twitter';
            
        } else {
            $social_type = 'linkedin';
        }*/       
        
        $model = SignupFactory::create(SignupFactory::TYPE_SOCIAL);
        $model->attributes = $attributes;
        $model->social_id = $attributes['id'];
        $model->social_type = $social_type;
        $model->email = $attributes['email'];
        
        switch($social_type) {
            case 'facebook':
                $model->name = $attributes['name'];
            break;
            /*case 'twitter':
                $model->name = $attributes['name'];
            break;
            case 'linkedin':
                $model->first_name = $attributes['first_name'];
                $model->last_name = $attributes['last_name'];
            break;*/
        }
        $url = Yii::$app->urlManager->createUrl('client/book-appointment');
        if ($model->saveUser()) {
            
            //$url = Yii::$app->urlManager->createUrl('/');
            
            return $this->redirect([$url]);
            //return $this->redirect(['client/book-appointment']);
            //return $this->render('client', ['model' => $model]);
            
        } else {
            //return $this->render('client', ['model' => $model]);
            return $this->redirect([$url]);
            //return $this->redirect(['client/book-appointment']);
            
        }
    }
        
    /**
     * Renders the view for client or provider signup module
     */
    public function actionIndex() {
        return $this->render('signup');
    }

    /**
     * Renders the view for client signup module
     */
    public function actionClient() {
        $model = SignupFactory::create();
        $post = \Yii::$app->request->post();
        if (!empty($post)) {
                                   
            if (Yii::$app->request->isAjax && $model->load($post)) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->load($post);    
            $model->attributes = $post['NormalSignup'];
            //echo '<pre/>';
            //            print_r($model);die('...');                        
            if ($model->validate()) { 
                
                $result = $model->saveUser();
               // echo $result;die('...');
                if ($result) {
                    Yii::$app->session->setFlash('info', 'Thank you for registering on wellza.');
                    
                    return $this->redirect(['/auth/login']);
                }
            }
            //die('...');
        }
        return $this->render('clientsignup', ['model' => $model]);
    }

    /**
     * Renders the view for provider signup module
     */
    public function actionProvider() {
        
        $model = SignupFactory::create('normal');
        $post = \Yii::$app->request->post();
        if (!empty($post)) {
            //$model->attributes = $post['NormalSignup'];
                       
            if (Yii::$app->request->isAjax && $model->load($post)) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->load($post);    
            $model->attributes = $post['NormalSignup'];
            //$model->attached_cv = UploadedFile::getInstanceByName('NormalSignup[attached_cv]');            
                  
            if ($model->validate()) { 
                 
                $result = $model->saveUser();
                
                if ($result) {
                    Yii::$app->session->setFlash('info', 'Thank you for registering on wellza.');
                    
                    return $this->redirect(['/auth/login']);
                }
            }
        }
        return $this->render('providersignup', ['model' => $model]);
    }
    

}
