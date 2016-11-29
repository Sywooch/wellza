<?php

namespace backend\modules\auth\controllers;

use yii;
use yii\web\Controller;

class LoginController extends \backend\modules\auth\components\Controller
{   
    public $defaultAction = 'login';
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    
    public function actionIndex()
    {   
        $model = new \common\models\LoginForm();
                
        return $this->render('login',['model' => $model]);
    }
    /**
     * Login action.
     *
    */
    public function actionLogin()
    {   
        if(\Yii::$app->user->isAdmin)
        {
            return $this->goHome();
        }
        $model = new \common\models\LoginForm();
        $model->user_type = 'Administrator';
        
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->redirect(['/category']);
        } 
       
        return $this->render('login', [
                    'model' => $model,
        ]);        
    }
    
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {   
        Yii::$app->user->logout();
        return $this->redirect(['/']);        
    }

}
