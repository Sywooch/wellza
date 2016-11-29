<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\components\Utility;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $requestType;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                    'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
            [['requestType'],'safe']
        ];
    }

     /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = \common\models\User::findOne([
                    'status' => 10,
                    'email' => $this->email,
        ]);
//        \yii\helpers\VarDumper::dump($this->attributes,10,true);
//        die;
        $data = array();
        $user->generatePasswordResetToken();
        if ($user->user_type == 'Administrator')
        {
            $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/login/reset-password','token' => $user->password_reset_token]);
            if(!empty($this->requestType) && $this->requestType == 'api') {
                $resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/login/reset-password','token' => $user->password_reset_token]);
            }
            $data['user'] = $user->first_name.' '.$user->last_name;
        }
        elseif ($user->user_type =='Client' || $user->user_type =='Provider' ) 
        {
            $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/resetpassword', 'token' => $user->password_reset_token]);
            if(!empty($this->requestType) && $this->requestType == 'api') {
                $resetLink = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/resetpassword', 'token' => $user->password_reset_token]);
            }
            
            $data['user'] = $user->first_name.' '.$user->last_name;
        }
        if ($user->save(false))
        {
            $url = \Yii::$app->urlManager->createAbsoluteUrl('');
            $resetLink =$resetLink; 
            $data['to'] = $user->email;
            $data['link'] = $resetLink;
            $data['request'] = "forget_password";
            $data['logo'] =  $url . '/resource/images/innerpage-logo.png';
            Utility::sendMail($data);
            return true;
        }
        return false;
    }
}
