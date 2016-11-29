<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For image validations
 * ***/
class CheckImageValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Uploaded image is not valid';
    }
    
    /***
     * Check if uploaded image is valid or not
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
              
        if(!preg_match("/\.(png|jpg|jpeg)$/", $value)) {
            $model->addError($attribute, $this->message);
        }
          
    }
    
}

