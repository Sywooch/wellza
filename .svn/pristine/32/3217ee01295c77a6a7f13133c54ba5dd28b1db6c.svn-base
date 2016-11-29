<?php

namespace frontend\modules\auth\controllers;
use Yii;
use common\models\PasswordResetRequestForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ForgotpasswordController extends \frontend\modules\auth\components\Controller
{
    /**
     * Forgot password
     * @return type
     */
    public function actionIndex()
    {
        $model = new PasswordResetRequestForm();
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            if (Yii::$app->request->isAjax && $model->load($post)) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->redirect(['/auth/login']);
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        return $this->render('forgotpassword', ['model' => $model]);
    }

}
