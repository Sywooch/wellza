<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
/**
 * Description of NormalSignup
 *
 * @author hp
 */
class NormalSignup extends SignupAbstract {
    
    //public $termsConditions = false;
        
    public function rules() {
        return [
            [['email', 'password','confirm_password','first_name', 'last_name','attached_cv','user_type'], 'trim'],
            [['email', 'password', 'first_name', 'last_name'], 'required'],
            [['confirm_password'], 'required'],
            [['first_name'],'match','pattern' => '/^[a-zA-Z]+$/','message'=>"Only alphabets are allowed"],
            [['last_name'],'match','pattern' => '/^[a-zA-Z]+$/','message'=>"Only alphabets are allowed"],
            //['termsConditions', 'required','requiredValue' => 1, 'message' => 'Please accept terms and conditions.'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password'],
            [['email'], 'email'],
            //[['email'], 'unique', 'targetClass' => 'common\models\User', 'filter' => ['status' => ['active', 'inactive']]],
            ['email',\common\components\customvalidators\CheckEmailValidator::className()],
            [['first_name'], 'string', 'min' => 2, 'max' => 30],
            [['last_name'], 'string', 'min' => 2, 'max' => 30],
            [['password'], 'string', 'min' => 6, 'max' => 15],
            [['email', 'password','user_type'], 'safe'],
            ['attached_cv', 'file', 'extensions' => ['doc', 'docx', 'pdf'],'checkExtensionByMimeType'=>false, 'maxSize' => 1024 * 1024 * 20],
        ];
    }  

}
