<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php')
        // require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        //can name it whatever you want as it is custom
        'urlManagerRoot' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'uploads',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'response' => [
            'format' => 'json',
            'class' => 'api\components\Response',
            /* 'on beforeSend' => function ($event) {
              $response = $event->sender;
              if ($response->data !== null) {
              $response->data = [
              'success' => $response->isSuccessful,
              'data' => $response->data,
              ];
              $response->statusCode = 200;
              }
              }, */
            'on beforeSend' => function ($event) {
                Yii::createObject([
                    'class' => 'api\components\ResponseHandler',
                    'event' => $event
                ])->formatResponse();
            },
                ],
                'request' => [
                    // Enable JSON Input:
                    'parsers' => [
                        'application/json' => 'yii\web\JsonParser',
                    ]
                ],
                'user' => [
                    'identityClass' => 'common\models\User',
                    'enableAutoLogin' => false,
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
                'urlManager' => [
                    'enablePrettyUrl' => true,
                    'enableStrictParsing' => false,
                    'showScriptName' => false,
                    'rules' => [
                        [
                            'class' => 'yii\rest\UrlRule',
                            'controller' => [
                                'v1/user', 'v1/portfolio',
                                'v1/provider', 'v1/product',
                                'v1/cart', 'v1/blog',
                                'v1/message'
                            ],
                            'pluralize' => false,
                        /*
                          'tokens' => [
                          '{id}' => '<id:\\w+>',
                          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                          ] */
                        ],
                        '<module:\w+>/<controller:\w+>/<id:\d+>/<action:\w+>'=>'<module>/<controller>/<action>', 
                        '<module:\w+>/<controller:\w+>/<id:\d+>/sales-history'=>'<module>/<controller>/sales-history', 
                        '<module:\w+>/<controller:\w+>/<id:\d+>/upcoming-appointment'=>'<module>/<controller>/upcoming-appointment', 
                        '<module:\w+>/<controller:\w+>/<id:\d+>/completed-appointment'=>'<module>/<controller>/completed-appointment', 
                    ],
                ],
                'urlManagerFrontend' => [
                    'class' => '\yii\web\urlManager',
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                    'baseUrl' => 'http://localhost/wellza/',
                    'rules' => [
                    ],
                ],
                'urlManagerBackend' => [
                    'class' => '\yii\web\urlManager',
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                    'baseUrl' => 'http://localhost/wellza/backend/web/',
                    'rules' => [
                    ],
                ],
            ],
            'params' => $params,
        ];



        