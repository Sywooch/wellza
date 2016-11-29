<?php
/************************************************************************************************************************//**
 *  Controller Name: PortfolioController.php
 *  Created: Codian Team
 *  Description: This will manage the provider's portfolio images and video.
 ***************************************************************************************************************************/

namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class PortfolioController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex()
    {
        $model = new \common\models\Portfolio();
        $id = Yii::$app->user->id;
        $returndata = \common\models\Portfolio::getPortfolioData($id);
        return $this->render('portfolio',['model' => $model,'returndata' => $returndata]);
    }

    /********************************************** Ajax Driven functions ******************************************************************* */
    /*************************************************************************************************************************************** */
    /**
     * Upload images and video to server
     */
    public function actionAddPortfolio()
    {
        $model = new \common\models\Portfolio();
        $id = Yii::$app->user->id;
        $model->media_url = UploadedFile::getInstance($model, 'media_url');
        if(!empty($model->media_url)) {
            $retundata = $model->addPortfolioDataWeb($id,$model->media_url);
            if($retundata) {
                Yii::$app->session->setFlash('portfolio_message', 'Porfolio added successfully');
            } else {
                Yii::$app->session->setFlash('portfolio_message', 'Porfolio not added');
            }
        } 
        return $this->redirect(['/provider/portfolio']);
    }

}
/*************************************************************************************************************************************/
// EOF: PortfolioController.php
/*************************************************************************************************************************************/