<?php

/************************************************************************************************************************//**
 *  Controller Name: CheckPostalCodeValidator.php
 *  Created: Codian Team
 *  Description: This is used to validate the postal code must accept only alphnumeris data
 * ************************************************************************************************************************* */
 
namespace common\components\customvalidators;

use yii\validators\Validator;
/***
 * For postal code validations
 * ***/
class CheckPostalCodeValidator extends Validator
{   
    public function init()
    {
        parent::init();
        $this->message = 'Postal Code is not valid';
    }
    
    /***
     * Check if psotal code is valid or not
     * ***/ 
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
              
        if(!preg_match('~^[a-z0-9]*[0-9][a-z0-9]*$~i', $value)) {
            $model->addError($attribute, $this->message);
        }         
    }
    
}

/*************************************************************************************************************************************/
// EOF: CheckPostalCodeValidator.php
/*************************************************************************************************************************************/

