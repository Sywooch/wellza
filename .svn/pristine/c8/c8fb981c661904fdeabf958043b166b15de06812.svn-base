<?php

namespace common\components\customvalidators;

use yii\validators\Validator;

/* * *
 * For credit number validation
 * ** */

class CreditCardNumberValidator extends Validator {

    public function init() {
        parent::init();
        $this->message = 'Card Number is not valid';
    }

    /*     * *
     * Check For credit number validation
     * ** */

    public function validateAttribute($model, $attribute) {
        echo $value;
        die('called');
        $value = $model->$attribute;

        $false = false;
        $card_type = "";
        $card_regexes = array(
            "/^4\d{12}(\d\d\d){0,1}$/" => "visa",
            "/^5[12345]\d{14}$/" => "mastercard",
            "/^3[47]\d{13}$/" => "amex",
            "/^6011\d{12}$/" => "discover",
            "/^30[012345]\d{11}$/" => "diners",
            "/^3[68]\d{12}$/" => "diners",
        );

        foreach ($card_regexes as $regex => $type) {
            if (preg_match($regex, $value)) {
                $card_type = $type;
                break;
            }
        }

        if (!$card_type) {
            $model->addError($attribute, $this->message);
        }

        /*  mod 10 checksum algorithm  */
        $revcode = strrev($cc_number);
        $checksum = 0;

        for ($i = 0; $i < strlen($revcode); $i++) {
            $current_num = intval($revcode[$i]);
            if ($i & 1) { /* Odd  position */
                $current_num *= 2;
            }
            /* Split digits and add. */
            $checksum += $current_num % 10;
            if
            ($current_num > 9) {
                $checksum += 1;
            }
        }

        if ($checksum % 10 == 0) {
            return true;
        } else {
            $model->addError($attribute, $this->message);            
        }
    }

}
