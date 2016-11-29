<?php

namespace common\models;

use yii;
use common\models\User;
use common\models\LoginForm;

/**
 * Description of FacebookSignup
 *
 * @author hp
 */
class SocialSignup extends SignupAbstract {
    public $name;
    public $case;
    //public $device_id;
    //public $device_type;
    //public $certification_type;
    public $status;
    //public $image;
    const CUSTOMER_ROLE = 'Client';
    const SOCIAL_REGISTRATION = 'social_registration';

    public function init() {
        $this->on(self::SOCIAL_REGISTRATION, [$this, 'sendMail']);
    }

//    public $device_id;

    public function rules() {
        return [
            [['email', 'social_id','social_type', 'first_name', 'last_name','name'], 'trim'],
            [['email', 'social_id','social_type','first_name', 'last_name',], 'required'],
            [['email'], 'email'],
            //[['email'], 'unique', 'targetClass' => 'common\models\User', 'filter' => ['status' => ['active', 'inactive']]],
            [['email'], \common\components\customvalidators\CheckEmailValidator::className()],
            //[['email', 'fb_id', 'role', 'device_id', 'device_type','image', 'certification_type','gender','username'], 'safe'],
        ];
    }
    /**
     * Saves the user data for social login
     * @return user|false
     * ****/
    public function saveUser() {
        
        $user = $this->getUser();
        
        if (!empty($user) && empty($user->social_id)) {
            \yii::$app->session->setFlash('error', 'Email already registered with us.');
                      
            return false;           
        }
        
        if (!empty($user)) {
            
            if ($user->status == 10) {
                $login = Yii::$app->user->login($user);
                return true;
            } else {
                \yii::$app->session->setFlash('error', 'Your account is not active.');
                return false;
            }
        } else {
            
            if(!$this->isEmailExist($this->email)) {
                \yii::$app->session->setFlash('error', 'Email already registered with us.');
                
                return false;
            }
            
            $condition = 0;                       
            $user = \common\models\User::findOne(['email' => $this->email]);
            if(!empty($user)) {
                $user = $this->setData($user);
                $user->update();
                $condition = 1;
            } else {
                $user = new User();
                $user = $this->setData($user);
                $user->save();
                $condition = 1;
            }
            
            if ($condition == 1) {
                $identity = User::findIdentity($user->id);
                $login = Yii::$app->user->login($identity, NULL);
                $url = \Yii::$app->urlManager->createAbsoluteUrl('');
                $emailData = [];
                $emailData['request'] = $this->social_type.'_registration';
                $emailData['user_name'] = ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
                $emailData['to'] = $user->email;
                $emailData['logo'] = $url . 'resource/images/innerpage-logo.png';
                //$event = new \common\components\Myevent;
                //$event->emailData = $emailData;
                //$this->trigger(self::SOCIAL_REGISTRATION, $event);
                return true;
            }else{
                return $user;
            }
        }
    }
    
    /**
     * Get user details
     * @return user|null
     **/
    public function getUser() {
        if ($this->user === null) {
            $this->user = User::find()->where(['email' => $this->email, 'status' => ['active', 'inactive']])->one();
        }
        return $this->user;
    }
    
    /**
     * Generates password
     * @return password
     **/
    private function populateDefault() {
        $user = new User();
        $this->password = $user->generateRandomPassword();
    }
    
    /**
     * Send mail
     * @return True|False
     **/
    public function sendMail($event) {
        $data = $event->emailData;
        
        return \common\components\Utility::sendMail($data);
    }
    
    /**
     * Checks if email and social id already exists for a client 
     * @return True|False
     **/
    public function isEmailExist() {
        $data = User::find()->where('email = :email AND social_id = :social_id',[':email' => $this->email, ':social_id' => $this->social_id])->one();
        
        if(!empty($data)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Set the data for the user via social media
     * @return user
     **/
    public function setData($user) {
        $user->social_id = $this->social_id;
        $user->social_type = $this->social_type;
        $user->email = $this->email;

        if(!empty($this->name)) {
            $dataarray = explode(' ', $this->name);
            if(!empty($dataarray[1])) {
                $user->first_name = $dataarray[0];
                $user->last_name = $dataarray[1];
            } else {
                $user->first_name = $this->name;
            }
        }

        if(!empty($this->first_name) && !empty($this->last_name)) {
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
        }            
        $user->user_type = self::CUSTOMER_ROLE;
        $user->status = 10;
        $this->populateDefault();
        $user->setPassword($this->password);
        
        return $user;
    }
    
}
