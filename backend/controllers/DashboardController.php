<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
class DashboardController extends \backend\components\Controller
{
    public function actionIndex()
    {       die('...1');
        return $this->render('index');
    }

}
