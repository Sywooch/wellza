<?php

namespace common\models;

use yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Description of SignupAbstract
 *
 * @author hp
 */
abstract class SignupAbstract extends Model {

    public $email;
    public $password;
    public $name;
    public $first_name;
    public $last_name;
    //public $gender;
    public $social_type;
    public $social_id;
    public $user_type;
    public $username;
    public $attached_cv;
    public $confirm_password;
    protected $user;
    //public $requestType = 'web';

    const USER_REGISTRATION = 'user_registration';

    public function init() {
        $this->on(self::USER_REGISTRATION, [$this, 'sendMail']);
    }

    public function getUser() {
        return $this->user;
    }

    public function saveUser() {
        
        if ($this->validate()) {
            
            $model = new User();
            //$file = UploadedFile::getInstanceByName('NormalSignup[attached_cv]');
            $post = \Yii::$app->request->post();
            /*if(!empty($file)) {
                $dirpath = './attach_cv/';
                if (!is_dir($dirpath)) {

                    \yii\helpers\FileHelper::createDirectory($dirpath, 0777, true);
                }
                $dirpath = $dirpath . time() . '_';
                $basename = preg_replace('/\s+/', '_', $file->baseName);
                $file->saveAs($dirpath . $basename . '.' . $file->extension);
                $dirpath = ltrim($dirpath, '.');
                $model->attached_cv = $dirpath . $basename . '.' . $file->extension;
            }*/
            
            $model->first_name = $this->first_name;
            $model->last_name = $this->last_name;
            $model->email = $this->email;
            $model->user_type = $this->user_type;
            $model->status = 10;
            $model->setPassword($this->password);
            $model->generatePasswordResetToken();
            
            if ($model->save(false)) {
            
                
                $this->user = $model;
                
                $url = \Yii::$app->urlManager->createAbsoluteUrl('');
                $emailData = [];
                $emailData['request'] = 'registration';
                $emailData['user_name'] = ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
                
                $emailData['to'] = $this->email;
                $emailData['logo'] = $url . 'resource/images/innerpage-logo.png';
                               
                $event = new \common\components\Myevent;
                $event->emailData = $emailData;
                $this->trigger(self::USER_REGISTRATION, $event);
                
                return true;
            } else {
            
                return false;
            }
        } else {
            
            return false;
        }
    }

    public function sendMail($event) {
        $data = $event->emailData;
        return \common\components\Utility::sendMail($data);
    }

}
