<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For match password validations
 * ***/
class MatchPasswordValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Incorrect password';
    }
    
    /***
     * Check for valid password
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $user = $this->getUser($id);
        if (!$user->validatePassword($value)) {
            $this->addError($attribute, $this->message);
        }
    }
    
    protected function getUser($id)
    {   
        return \common\models\User::find($id)->one();
    }
    
}
