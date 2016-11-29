<?php
/* * ********************************************************************************************************************* *//**
 *  Controller Name: InboxController.php
 *  Created: Codian Team
 *  Description: This will manage provider messages to client done while chatting.Manages the ajax call functions.
 * ************************************************************************************************************************* */

namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class InboxController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex()
    {
        $model = new \common\models\Message();
        $providers_data = \common\models\User::getAllProviderClient();
        $provid_data = \common\models\User::findIdentity(Yii::$app->user->id);
        $model->scenario = 'clientinbox';
        return $this->render('inbox',['model' =>$model,'providers_data' => $providers_data,'provid_data' => $provid_data]);
    }

/********************************************** Ajax Driven functions ******************************************************************* */
/*************************************************************************************************************************************** */
    /**
     * Send message from here
     * **/
    public function actionGetAllMessage() {
        $model = new \common\models\MessageRecipient(); 
        $post = Yii::$app->request->post();
        $current_user_id = Yii::$app->user->id;
        $message = \common\models\MessageRecipient::getAllMessages($current_user_id,$post['user_id']);
        echo $message;
        die;
    }
    
     /**
     * Change message status from unread as read
     * **/
    public function actionChangeMessageStatus() {
        $post = Yii::$app->request->post();
        \common\models\MessageRecipient::updateMessageStatus($post['from_user_id'],Yii::$app->user->id);
        die;
    }
    
/*************************************************************************************************************************************/
// EOF: MyProfileController.php
/*************************************************************************************************************************************/
}