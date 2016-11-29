<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For Time Format validations
 * ***/
class CheckTimeFormatValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Time is not valid';
    }
    
    /***
     * Validation to check time format 
     * ***/ 
    public function validateAttribute($model, $attribute)
    {      
        $value = $model->$attribute;
        
        if(!preg_match('/^(0?\d|1\d|2[0-3]):[0-5]\d:[0-5]\d$/', $value)) {
            $model->addError($attribute, $this->message);
        }
      
    }
    
}
