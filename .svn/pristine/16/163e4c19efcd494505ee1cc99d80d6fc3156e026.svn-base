<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
$baseUrl = str_replace('/backend/web', '/backend', (new \yii\web\Request)->getBaseUrl());

return [
    'id' => 'Admin',
    'defaultRoute' => 'auth/login',
    'homeUrl' => 'category',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'auth' => [
            'class' => 'backend\modules\auth\Module',
        ],
    ],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => $baseUrl
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                '<controller:\w+>' => '<controller>',
                '<controller:\w+>/index?<sort:\w>' => '<controller>',      
                //'<controller:\w+(-\w+)*>/<id:\d+>'=>'<controller>',
                '<controller:\w+(-\w+)*>/<id:\d+>'=>'<controller>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => 'auth/<controller>/<action>',
                '<controller:\w+(-\w+)*>/<action:\w+(-\w+)*>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+(-\w+)*>/<id:\d+>'=>'<controller>/<action>',
                
                '<module:\w+>/<controller:\w+>/<action:\w+(-\w+)*>/<id:\d+>'=>'<module>/<controller>/<action>',                
            ],
            
        ],
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://192.168.0.192/wellza/frontend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        
    ],
    'params' => $params,
];
