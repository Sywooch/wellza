<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],        
        'gcm' => [
            'class' => 'bryglen\apnsgcm\Gcm',
            'apiKey' => 'AIzaSyD2D0B8lzKkRR_FH2R5qO3-6XXOu_qPHZM',
            'dryRun'=>false, //instead of sending just logs the message if true
            'enableLogging'=>true
        ],
       
//        'apns' => [
//        'class' => 'bryglen\apnsgcm\Apns',
//        'environment' => \bryglen\apnsgcm\Apns::ENVIRONMENT_SANDBOX,
//        'pemFile' => dirname(dirname(__DIR__)) . '/BAZRProduction.pem',
//        // 'retryTimes' => 3,
//        'options' => [
//            'sendRetryTimes' => 5
//            ]
//        ],
        'apnsGcm' => [
            'class' => 'bryglen\apnsgcm\ApnsGcm',
            // custom name for the component, by default we will use 'gcm' and 'apns'
            //'gcm' => 'gcm',
            //'apns' => 'apns',
        ]
    ],
];
