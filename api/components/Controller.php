<?php

namespace api\components;

use Yii;
use common\filters\auth\QueryParamAuth;
use yii\filters\VerbFilter;
use yii\filters\RateLimiter;

/**
 * Site controller
 */
class Controller extends \yii\rest\Controller {
    public $requestParams;
    public $requestQueryParams;
    public $requestFormData;
    public $requestHeaders;
    /**
     * @inheritdoc
     */
    public function behaviors() {
        
        return [
            'authenticator' => [
                'class' => QueryParamAuth::className(),
                'except' => ['register', 'login','social-login'],
                'tokenParam' => 'access-token'
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'  => ['get'],
                    'view'   => ['get'],
                    'create' => ['get', 'post'],
                    'update' => ['get', 'put', 'post'],
                    'delete' => ['post', 'delete'],
                ],
            ],
            'rateLimiter' => [
                'class' => RateLimiter::className(),
                'enableRateLimitHeaders' => false
            ]
            
        ];
    }
    
    public function init() 
    {   
        if (Yii::$app->request->getRawBody()) {
            $this->requestParams = json_decode(Yii::$app->request->getRawBody(), true);
        }

        if (Yii::$app->request->getBodyParams()) {
            $this->requestFormData = Yii::$app->request->getBodyParams();
        }
        
        if (Yii::$app->request->getHeaders()) {
            $this->requestHeaders = Yii::$app->request->getHeaders();
        }
        
        if (Yii::$app->request->getQueryParams()) {
            $this->requestQueryParams = Yii::$app->request->getQueryParams();
        }
        
    }

}
