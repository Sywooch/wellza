<?php
/* * ********************************************************************************************************************* *//**
 *  Controller Name: FavouriteController.php
 *  Created: Codian Team
 *  Description: This will manage list of all the favourite providers.Manages the ajax call functions.
 * ************************************************************************************************************************* */
namespace frontend\modules\client\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class FavouriteController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {
        return $this->render('favourite');
    }

    /********************************************** Ajax Driven functions ******************************************************************* */
    /*************************************************************************************************************************************** */

}
/*************************************************************************************************************************************/
// EOF: FavouriteController.php
/*************************************************************************************************************************************/