<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());



return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'home',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'auth' => [
            'class' => 'frontend\modules\auth\Module',
        ],
        'client' => [
            'class' => 'frontend\modules\client\Module',
        ],
         'store' => [
            'class' => 'frontend\modules\store\Module',
        ],
        'provider' => [
            'class' => 'frontend\modules\provider\Module',
        ],
    ],
    'components' => [
        //For cache busting
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/frontend/web'
        ],*/
        
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                
                  '<controller:(login)>/<action:(logout)>' => 'auth/login/logout',
                  '<controller:(login)>' => 'auth/login',
                  '<controller:(signup)>' => 'auth/signup',
                  '<module:\w+>/<controller:\w+>' => '<module>/<controller>', 
                  '<module:\w+>/<controller:\w+(-\w+)*>' => '<module>/<controller>',  
                  '<module:\w+>/<controller:\w+(-\w+)*>/<id:\d+>'=>'<module>/<controller>',
                  '<module:\w+>/<controller:\w+(-\w+)*>/<action:\w+(-\w+)*>' => '<module>/<controller>/<action>',
                  
//                '<controller:\w+>' => '<controller>',
//                '<controller:(forgotpassword)>' => 'auth/<controller>',
//                '<controller:(resetpassword)>' => 'auth/<controller>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                '<controller:\w+>' => 'auth/<controller>',
//                
//                '<controller:\w+>/<action:\w+>' => 'auth/<controller>/<action>',
                
                
                
                //'<controller:\w+>/<action:\w+>' => 'provider/<controller>/<action>',
                
                //'<module:\w+><controller:\w+>/<action:\w+(-\w+)*>' => 'auth/<controller>/<action>',
                
               // '<module:\w+>/<controller:\w+>' => '<module>/<controller>',
//                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>',
//                '<module:\w+>/<controller:\w+(-\w+)*>/<id:\d+>'=>'<module>/<controller>',
                //'<module:\w+>/<controller:\w+(-\w+)*>/<id:(.*)>'=>'<module>/<controller>',
               // '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
               
                //'<module:\w+>/<controller:\w+(-\w+)*>/<action:\w+(-\w+)*>' => '<module>/<controller>/<action>',
                //'<module:\w+>/<controller:\w+(-\w+)*>/<action:\w+(-\w+)*>' => 'provider/my-availability/load-data',
                
                //'<module:(auth)>/<controller:(signup)/<action:(client)>' => '<module>/<controller>/<action>',
                //'<module:(client)>/<controller:(signup)/<action:(client)>' => '<module>/<controller>/<action>',
                //'<controller:\w+>' => 'client/<controller>',
                //'<controller:\w+>/<action:\w+>' => 'client/<controller>/<action>',
                
            ]
        ],
        
    ],
    'params' => $params,
];
