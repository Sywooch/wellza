<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use Yii;
//use yii\base\Model;
use Stripe\Stripe;
use Stripe\Charge;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

//use common\components\customvalidators\CreditCardNumberValidator;

/**
 * Description of Stripe model
 *
 * @author #
 */
class StripePayment extends base\BaseStripePayment {

    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    ['creditCard_number', 'CreditCardNumberValidator'],
                    ['creditCard_cvv', 'integer', 'message' => 'CCV not valid'],
                    [['number','exp_month','exp_year','cvc'],'required','on'=>['add_card','pay']],
                    [['number'],'CreditCardNumberValidator','on'=>['add_card','pay']]
        ]);
    }

    /**
     * Validation for credit card 
     * * */
    public function CreditCardNumberValidator($attribute, $params) {
        $value = $this->$attribute;
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
            $this->addError($attribute, 'Card Number is not valid');
        }

        /*  mod 10 checksum algorithm  */
        $revcode = strrev($value);
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

        if ($checksum % 10 != 0) {
            $this->addError($attribute, 'Card Number is not valid');
        }
    }

    /**
     * Check balance from stripe
     * * */
    public function checkBalance() {
        return \Stripe\Balance::retrieve();
    }

    /**
     * Payment for the purchased commodity
     * * */
    public function paynow($data) {
        if (isset($data['StripePayment']) && $data['StripePayment'] != '') {
            $date_arra = explode('/', $data['StripePayment']['creditCard_expirationDate']);
            $year = $date_arra[1];
            $month = $date_arra[0];
            $myCard = array('number' => $data['StripePayment']['creditCard_number'], 'exp_month' => $month, 'exp_year' => $year, 'cvc' => $data['StripePayment']['cvc']);
            $this->load($myCard, '');
            if ($this->validate()) {
                $this->source = $myCard;
                try {
                    return $this->createCustomer();
                } catch (\Stripe\Error\InvalidRequest $e) {

                    return $e; // The request is invalid
                }
            } else {
                return $this;
            }
        } else {
            return false;
        }
    }

    /**
     * Customer credit card will be saved here for further payment
     * @param $data 
     * @return True|False
     * * */
    public function saveCreditCard($data) {
        if (!empty($data)) {

            $date_arra = explode('/', $data['card_date']);
            $year = $date_arra[1];
            $month = $date_arra[0];
            $token = array('number' => $data['card_number'], 'exp_month' => $month, 'exp_year' => $year, 'cvc' => $data['card_cvc'], 'name' => $data['card_name']);
            $this->source = $token;

            try {
                $user_data = User::findOne(['id' => \Yii::$app->user->id]);

                $card_token = \Stripe\Token::create(array(
                            "card" => $token
                ));
                $customer = \Stripe\Customer::create(array(
                            "email" => $user_data->email,
                            "source" => $card_token->id,
                            "description" => 'Save Card'
                ));
                if (!empty($customer)) {
                    $card_id = $customer->sources->data[0]->id;
                    $brand = $customer->sources->data[0]->brand;
                    $customer_id = $customer->sources->data[0]->customer;
                    $credit_card_number = $customer->sources->data[0]->last4;
                    $card_holder_name = $customer->sources->data[0]->name;
                    $customer_data = json_encode($customer);
                } else {
                    return false;
                }

                //return $customer;
            } catch (\Stripe\Error\InvalidRequest $e) {

                return $e; // The request is invalid
            }
        } else {
            return false;
        }
    }

    public function createToken() {
        $card_token = \Stripe\Token::create(array(
                    "card" => $this->source
        ));
        if (!empty($card_token->id)) {
            return $card_token->id;
        }
    }

    public function createCustomer() {
        $cardInfo = CardInfo::findOne(['user_id' => \yii::$app->user->id]);
        if (empty($cardInfo)) {
            $user_data = User::findOne(['id' => \yii::$app->user->id]);
            $customer = \Stripe\Customer::create(array(
                        "email" => $user_data->email,
                        "source" => $this->createToken(),
                        "description" => 'Save Card'
            ));
            if (!empty($customer->id)) {
                $this->customer_id = $customer->id;
                return $this->addCard();
            }
        } else {
            $this->customer_id = $cardInfo->customer_id;
            return $this->addCard();
        }
    }

    public function addCard() {
        $card = \Stripe\Customer::retrieve($this->customer_id)->sources->create(array("source" => $this->createToken()));
        if (!empty($card->id)) {
            $this->source = $card->id;
            $this->customer_id = $card->customer;
            $oldCard = CardInfo::getCardByFingerPrint($card->fingerprint);
            if (!empty($oldCard)) {
                $this->old_card_id = $oldCard->card_id;
                $this->deleteCard();
                CardInfo::deleteAll(['card_id'=>$oldCard->card_id]);
            }
            $data = [];
            $data['user_id'] = \yii::$app->user->id;
            $data['card_id'] = $card->id;
            $data['brand'] = $card->brand;
            $data['customer_id'] = $card->customer;
            $data['card_last_digit'] = $card->last4;
            $data['holder_name'] = $card->name;
            $data['fingerprint'] = $card->fingerprint;
            $data['response_data'] = json_encode($card);
            CardInfo::saveCardInfo($data);
            if ($this->type == 'add_card') {
                return $card;
            } elseif ($this->type == 'pay') {
                return $this->pay();
            }
        }
    }

    public function pay() {
        try {
            $charge = \Stripe\Charge::create(array(
                        "amount" => (100 * 100),
                        "currency" => "usd",
                        "customer" => $this->customer_id,
                        "source" => $this->source,
                        "description" => "Item Amount"
            ));
            return $charge;
        } catch (\Stripe\Error\Card $e) {

            return $e; // The card has been declined
        }
    }

    public function deleteCard() {
        return  \Stripe\Customer::retrieve($this->customer_id)->sources->retrieve($this->old_card_id)->delete();
    }

    public function getCards() {
        return \Stripe\Customer::retrieve($this->customer_id)->sources->all(array('object' => 'card'));
    }

}
