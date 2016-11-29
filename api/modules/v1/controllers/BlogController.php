<?php

/*
 * This api will get or set the data for a user
 */

namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Blog;

/**
 * User Controller API
 *
 */
class BlogController extends Controller {

    /**
     * To get all the records from the user table
     *
     * * */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'authenticator' => [
                        'except' => []
                    ],
        ]);
    }

    public function actionIndex() {
        $params = \Yii::$app->request->get();
        return Blog::blogList($params);
    }
    public function actionView($id) {
        return ['view'];
    }

}
