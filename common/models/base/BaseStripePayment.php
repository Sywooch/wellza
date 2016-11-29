<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models\base;

use Yii;
use yii\base\Model;
use Stripe\Stripe;  
use Stripe\Charge;

 /**
 * Description of Stripe model
 *
 * @author #
 */
class BaseStripePayment extends Model {
    
    public $add_card;
    public $card_name;
    public $creditCard_number;
    public $creditCard_cvv;
    public $creditCard_expirationDate;
    public $amount;
    public $card;
    public $number;
    public $exp_month;
    public $exp_year;
    public $cvc;
    public $name;
    public $customer_id;
    public $card_id;
    public $source;
    public $old_card_id;
    public $type;
            
            
            
    function __construct() {
        \Stripe\Stripe::setApiKey('sk_test_DohY0pgc4Dy28uhj1Fy7M8lH');
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_card','amount' ,'card_name','creditCard_cvv','creditCard_number','creditCard_expirationDate'], 'trim'],
            [['number','cvc','exp_month','exp_year','name','customer_id','card_id','source','old_card_id','type'],'safe']
//            [['add_card', 'card_name','creditCard_cvv','creditCard_number','creditCard_expirationDate'], 'required']            
        ];
    }
}

