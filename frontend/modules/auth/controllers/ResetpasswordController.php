<?php
namespace frontend\modules\auth\controllers;

use yii;
use common\models\ResetPasswordForm;

class ResetpasswordController extends \frontend\modules\auth\components\Controller {
    public function actionIndex($token) {
         try
        {
            $model = new ResetPasswordForm($token);
        }
        catch (InvalidParamException $e)
        {
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if($model->load(Yii::$app->request->post()) && $model->validate()&& $model->resetPassword()) 
        {
           Yii::$app->getSession()->setFlash('success', 'Password has been changed successfully.');
           return $this->redirect(['/login']);
        }
        return $this->render('resetpassword', [
                    'model' => $model,
        ]);
    }
}