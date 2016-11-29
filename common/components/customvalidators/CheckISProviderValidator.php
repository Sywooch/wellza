<?php

namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * To check if a user is provider or not
 * ***/
class CheckISProviderValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Not a valid provider';
    }
    
    /***
     * Check for user type provider
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $returndata = \common\models\User::getUserType($value);
        
        $user_type = $returndata['user_type'];
        
        if(empty($user_type)) { 
            $model->addError($attribute, $this->message);   
        }
        if(!empty($user_type) && $user_type != 'Provider') { 
            $model->addError($attribute, $this->message);   
        }
    }
    
}

