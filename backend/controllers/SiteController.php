<?php
namespace backend\controllers;

use Yii;
//use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends \backend\components\Controller
{
    /**
     * @inheritdoc
     */
    /*
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ], 
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow admins to create
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow admins to update
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function actions()
    {   
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        die('here');
        $model = new LoginForm();
        if (\Yii::$app->user->isAdmin) {
            $this->redirect(['dashboard/index']);
     
        } else {
            Yii::$app->user->logout();
            return $this->render('login', [
                'model' => $model,
            ]);
        }        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {   //$url = \yii\helpers\Url::toRoute('dashboard/index',true);
         die('2here');
        if (\Yii::$app->user->isAdmin) {
            
            $this->redirect(['dashboard/index']);
        }
        
        $model = new LoginForm();
         
        if ($model->load(Yii::$app->request->post()) && $model->adminLogin()) {
            
            $this->redirect(['dashboard/index']);
        } else {
            
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
