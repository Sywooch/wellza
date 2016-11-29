<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use  yii\web\Session;
use yii\data\ActiveDataProvider;

class BundleController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {
        $dataprovider = \common\models\Bundles::getAllBundle();
        $bundle_categories = \common\models\BundlesCategories::getCategoriesData();
        
        return $this->render('bundle',['dataprovider' => $dataprovider,'bundle_categories' => $bundle_categories]);
    }

}
