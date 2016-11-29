<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For email validations
 * ***/
class CheckEmailValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Email address already exists';
    }
    
    /***
     * Check if email is unique or not
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $checkUniqueExistenceForEmail = \common\models\User::find()->where(['email' =>  $value])->One();

        if(!empty($checkUniqueExistenceForEmail)){
            $model->addError($attribute, $this->message);
        }
          
    }
    
}
