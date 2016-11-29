<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For birth date validations
 * ***/
class CheckBirthDateValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Birth Date is not valid';
    }
    
    /***
     * Check for proper birth date format
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if(preg_match("/^(\d{2})-(\d{2})-(\d{4})$/", $value, $matches)) {
               if(!checkdate($matches[2], $matches[1], $matches[3])) {
                   $model->addError($attribute, $this->message);
               }
        } else {
                
                $model->addError($attribute, $this->message);
        }
    }
    
}
