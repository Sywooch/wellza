<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
?>
<main class="inner-content" id="inner-content">
    <div class="container serviceprovider-review-payment-section">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 review-section-body">
                <div class="review-section-containet">
                    <div class="container">
                        <div class="row border">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h2>Review Your Order</h2>
                            </div>
                        </div>
                        <?php
                            $bool = 0;
                            $total = 0;
                            $subtotal = 0;
                         if (count(Yii::$app->cart->getPositions()) > 0) {
                              
                                //$service_provider =
                                foreach (Yii::$app->cart->getPositions() as $cart) {
                                    $commodity_type = $cart->getType();
                                    
                                    if($commodity_type == 'appointment') {
                                        if($bool == 0) {?>
                                        <div class="row border">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <h3>Packages</h3>
                                            </div>
                                        </div>  
                                        <?php
                                        
                                        }                               
                                        
                                        $id = $cart->getId();
                                        $category_data = \common\models\Packages::getPackageName($id);
                                        $subcategory_data = \common\models\Packages::getPackageSubName($id);
                                        $category_name = $category_data->parent0->category_name;
                                        $subcategory_name = $subcategory_data->service->category_name;
                                        $category_image = '../'.$subcategory_data->service->category_thumbnail;
                                        $service_provider_data = \common\models\User::findOne(['id'=> $cart->provider_id]);
                                        //echo $service_provider_data->first_name;
                                        $service_provider_name = $service_provider_data->first_name.' '.$service_provider_data->last_name;
                                        $service_provider_address = $service_provider_data->address.','.$service_provider_data->city.','.$service_provider_data->province.',Canada';
                                        $total = $total + $cart->appointment_price;
                                        $subtotal = $subtotal + $cart->appointment_price;
                                        //echo '<pre/>';print_r($service_provider_data);die('..');
                        ?>                        

                                        <div class="row border">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p class="p-l">Service Name</p>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p  class="p-r"><?=$subcategory_name?></p>
                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                <p  class="p-l">Service Provider</p>
                                            </div>

                                            <div class="col-lg-7 col-md-7 col-sm-7">
                                                <p  class="p-r">
                                                    <?=$service_provider_name?>
                                                    <span class="text-right"><?=$service_provider_address?></span>
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="p-l">Location</p>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <p class="p-r">
                                                    <?=$cart->address1?>
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <p class="p-l">Time</p>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <p class="p-r">
                                                    <?=$cart->appointment_duration?> min
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <p class="p-l">Date</p>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <p class="p-r">
                                                    <?php

                                                        $date=date_create("{$cart->appointment_date}");
                                                        echo date_format($date,"D,d M Y");
                                                        //Fri, 21 May 2016
                                                    ?>

                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <p class="p-l">Price</p>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <p class="p-r">
                                                    $<?=(int)$cart->appointment_price?>
                                                </p>

                                            </div>
                                        </div>
                        <?php
                                    $bool = 1;
                                    
                                }
                                if($commodity_type == 'giftcard') {                                    
                                    $total = $total + $cart->amount;
                                    $subtotal = $subtotal + $cart->amount;
                                    if($bool == 1) {                                    
                                ?>
                                <div class="row border">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3>Gift Card's</h3>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="row border">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p class="p-l">Name</p>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p  class="p-r"><?=$cart->to_name?></p>
                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                <p  class="p-l">Email</p>
                                            </div>

                                            <div class="col-lg-7 col-md-7 col-sm-7">
                                                <p  class="p-r">
                                                    <?=$cart->to_email?>                                                   
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="p-l">Price</p>
                                            </div>

                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <p class="p-r">
                                                    $<?=$cart->amount?>
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row border">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <p class="p-l">Delivery Date</p>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-8">
                                                <p class="p-r">
                                                    <?php
                                                        
                                                        $date = $cart->delivery_date;
                                                        if(!empty($date)) {
                                                            $date_array = explode('-', $date);
                                                            echo $date_array[2].'-'.$date_array[1].'-'.$date_array[0];
                                                        } else {
                                                            echo 'N/A';
                                                        }
                                                        
                                                    ?>
                                                </p>

                                            </div>
                                        </div>                                       
                        <?php       
                                $bool = 2;
                                }
                                if($commodity_type == 'wellza_membership') {
                                if($bool == 1) {
                                ?>
                                <div class="row border">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h3>Wellza Membership</h3>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="row border">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="p-l">Membership</p>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p  class="p-r"><?= $cart->plan_detail ?></p>
                                    </div>
                                </div>

                                <div class="row border">
                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                            <p  class="p-l">Start Date</p>
                                        </div>

                                        <div class="col-lg-7 col-md-7 col-sm-7">
                                            <p  class="p-r">
                                                <?php
                                                    $date = $cart->start_date;
                                                    $date_array = explode('-', $date);
                                                    echo $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0];
                                                ?>                                                   
                                            </p>

                                        </div>
                                </div>

                                <div class="row border">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <p class="p-l">Billing Cycle</p>
                                        </div>

                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <p class="p-r">
                                                $<?= ucfirst($cart->duration) ?>
                                            </p>

                                        </div>
                                </div>

                                <div class="row border">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="p-l">Discount</p>
                                    </div>

                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <p class="p-r">
                                                <?php
                                                    echo $cart->off_percent
                                                ?>
                                            </p>

                                        </div>
                                </div>
                                <div class="row border">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <p class="p-l">Price</p>
                                    </div>

                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <p class="p-r">
                                                <?php
                                                    echo $cart->price;
                                                ?>
                                            </p>

                                        </div>
                                </div>
                                <?php
                                
                                }
                            }
                         }
                        ?>
                        <!--<div class="row border">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <p class="p-l">Tax</p>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <p class="p-r">
                                    $4.00
                                </p>

                            </div>
                        </div>-->
                        
                        <div class="row border-custom">
                            <div class="col-lg-6 col-md-6 col-sm-5">
                                <p class="p-l">Coupon/Promo Code</p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon/Promo no. is here">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">APPLY</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row border-custom2">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="p-l">Grant Total</p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="p-r">
                                    $<?=$total?>
                                </p>

                            </div>
                        </div>
                        

                    </div>

                </div>
            </div>

            <!-- xxxxx -->

            <div class="col-lg-7 col-md-6 col-sm-12 payment-section-body">
                <div class="payment-section-containt">
                    <div class="container">
                        <div class="containt-top">
                            <?php if (Yii::$app->session->hasFlash('cart_message')): ?>
                                <div class="alert alert-info" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <?= Yii::$app->session->getFlash('cart_message') ?>
                                </div>
                            <?php endif; ?> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Payment Detail</h2>
                                    <p>Your card detail is 100% secure.</p>
                                </div>
                            </div>
                            <?php
                                $form = ActiveForm::begin([
                                            'action' => 'check-out',
                                            'enableAjaxValidation' => true,
                                            'enableClientValidation' => true,
                                            'method' => 'post',                           
                                            'id' => 'cart_checkout'
                                        ]);
                                ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label >Other Card</label>
                                            <select class="selectpicker">
                                                <option>Choose your card </option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label >Add your Card</label>
                                            <?= $form->field($model, 'add_card',
                                                    [
                                                        'template' => "{input}\n{hint}\n{error}"                                                        
                                                    ])->textInput(['autofocus' => true,'placeholder' => "Click to add your card here...",'maxlength'=> 60]);

                                            ?>
                                            <!--<input type="email" class="form-control" placeholder="Click to add your card here...">-->
                                        </div>
                                    </div>
                                </div>

                                <!-- xxx -->
                                 <?php
                                    /*\Stripe\Stripe::setApiKey('sk_test_DohY0pgc4Dy28uhj1Fy7M8lH');
                                            $myCard = array('number' => '4242424242424242', 'exp_month' => 8, 'exp_year' => 2018);
                                            $charge = \Stripe\Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
                                            echo $charge;*/
                                 ?>   
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label >Name on Card</label>
                                            <?= $form->field($model, 'card_name',
                                                    [
                                                        'template' => "{input}\n{hint}\n{error}"                                                        
                                                    ])->textInput(['autofocus' => true,'placeholder' => "Your name on card here..." ,'maxlength'=> 60]);

                                            ?>
                                            <!--<input type="email" class="form-control" placeholder="Your name on card here...">-->
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label >Card Number</label>
                                            <?= $form->field($model, 'creditCard_number',
                                                    [
                                                        'template' => "{input}\n{hint}\n{error}"                                                        
                                                    ])->textInput(['autofocus' => true,'placeholder' => "Your card number is here...",'maxlength'=> 16]);

                                            ?>
                                            
                                            <!--<input type="email" class="form-control"  placeholder="Your card number is here...">-->
                                        </div>
                                    </div>
                                </div>

                                <!-- xxx -->
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        
                                        <!--<div class="form-group">-->
                                                                                       
                                            <?= $form->field($model, 'creditCard_expirationDate',
                                                    [
                                                        'template' => "<label >Exp.</label>{input}\n{hint}\n{error}"                                                        
                                                    ])->textInput(['autofocus' => true,'placeholder' => "Expairy date of card. MM/YY",'class' => "form-control", 'id'=>"delivery_date"]);

                                            ?>                                      
                                            <!--<input type="email" class="form-control" placeholder="Expairy date of card. MM/YY">-->
                                            <!--</div>-->    
                                        
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label >CCV</label>
                                            <?= $form->field($model, 'creditCard_cvv',
                                                    [
                                                        'template' => "{input}\n{hint}\n{error}"                                                        
                                                    ])->textInput(['autofocus' => true,'placeholder' => "Card security Code (CCV)" ,'maxlength' => 4]);
                                            ?>                                            
                                            <!--<input type="email" class="form-control"  placeholder="Card security Code (CCV)">-->
                                        </div>
                                    </div>
                                    <?= $form->field($model, 'amount')->hiddenInput(['value'=> "{$total}",'id' => 'amount'])->label(false);?>
                                </div>

                                <!-- xxx -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <img src="../resource/images/card-company.jpg" alt="card-company" class="img-responsive">
                                    </div>
                                </div>
                            
                        </div>


                        <div class="container-bottom">
                            <div class="row">
                                <div class="col-lg-12 pad0">
                                    <a href="" class="save">SAVE YOUR CARD</a>
                                    <?= Html::submitButton("PAY NOW $".$total, [
                                                'class' => 'pay',
                                                'name' => 'signup-button',
                                                'data-toggle' => "modal",
                                                'data-target' => ".payment-successful-popup",
                                                
                                            ]);
                                    ?>
                                    <!--<a href="" class="pay" data-toggle="modal" data-target=".payment-successful-popup">PAY NOW $< ?=$total?></a>-->
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>

<!-- xxxxxxx -->

<!--<div class="modal inner-modal fade payment-successful-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="../resource/images/payment-success.png" alt="payment-success">
                            <h2>Payment Successful</h2>
                            <p>We have email you the receipt</p>
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
</div>-->
<style>
    .help-block-error {
        color: #a94442 !important;
    }
</style>

<?php $this->registerJsFile('@web/js/client/checkout.js'); ?>


