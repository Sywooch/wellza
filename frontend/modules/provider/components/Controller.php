<?php
namespace frontend\modules\provider\components;

use yii;
use yii\base\Behavior;
use yii\filters\AccessControl;

class Controller extends yii\web\Controller 
{
    public $layout='main';
    
    public $enableCsrfValidation;
        
    public function behaviors() 
    {        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => \Yii::$app->user->isProvider,
                    ],
                ],
            ],
        ];
    }
    
}