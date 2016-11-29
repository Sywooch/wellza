<?php
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For date if not past date
 * ***/
class CheckDateValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Date is not valid';
    }
    
    /***
     * Check for proper birth date format
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        $date = new \DateTime($value);
        $now = new \DateTime();
        echo '<pre/>';
                print_r($date);
        echo '<pre/>';
                print_r($now);die('###');
        if($date < $now) {
            $model->addError($attribute, $this->message);
        }
    }
    
}
