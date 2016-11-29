<?php
namespace frontend\modules\auth\components;

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
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }
    
}