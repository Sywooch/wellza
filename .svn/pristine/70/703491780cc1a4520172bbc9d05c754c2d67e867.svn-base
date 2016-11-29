<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'GIFT CARD';
?>
<style>
    div#preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background-color: rgba(0, 0, 0, 0.5);}
    div#preloader img {
        display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20%;
    }    
</style>
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web');?>/images/ajax-loader.gif">    
</div>
<main class="inner-content" id="inner-content">

    <div class="container wellza-gift-card">

        <div class="row">
            <div class="col-lg-12">
                <div class="gift-card-banner">
                    <div class="gift-card-content">
                        <h2><?= $this->title ?></h2>
                        <p>LOREM IPSUM DOLOR SIT AMET, IT<br>CONSECTETUER ADIPISCING </p>
                    </div>
                </div>
            </div>
        </div> 

        <!-- xxxxx -->

        <div class="row">
            <div class="col-lg-12">
                <div class="gift-card-heading">
                    <h2>Gift Card</h2>
                    <p>Lorem ipsum dolor sit amet, it consectetuer adipiscing </p>
                </div>

            </div>
        </div>

        <!-- xxxxx -->
        <?php
        $form = ActiveForm::begin([
                    'action' => 'gift-card/add-card',
                    //'action' => '',
                    //'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'method' => 'post',
                    'id' => 'add_card'
        ]);
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-5">
                                 
                    <?=
                    $form->field($model, 'amount', [
                        'template' => "<label>Price</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Price here..." ,'maxlength' => 4]);
                    ?>
                   
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-group">                    
                        <?=
                        $form->field($model, 'delivery_date', [
                            'template' => "<label>Gift Delivery Date</label>
                                            <div class='input-group date' id = 'datepicker_delivery'>{input}\n<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span>
                                            </span></div>\n
                                            {hint}\n{error}"
                        ])->textInput(['class' => 'form-control','id' => 'gift_datepicker','maxlength' => 12]);
                        ?>                        
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">                                    
                    <?=
                    $form->field($model, 'from_name', [
                        'template' => "<label>Name</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Who is your gift for...?" ,'maxlength' => 50]);
                    ?>                   
            </div>

            <div class="col-lg-4 col-md-5">                                    
                    <?=
                    $form->field($model, 'from_email', [
                        'template' => "<label>Email Address</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Email Address of Sender..." ,'maxlength' => 80]);
                    ?>                    
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10">                   
                    <?=
                    $form->field($model, 'message', [
                        'template' => "<label>Personal Message (Optional)</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Description...." ,'maxlength' => 250]);
                    ?>                    
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">                                    
                    <?=
                    $form->field($model, 'to_name', [
                        'template' => "<label>Your Name</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Your Full Name Here..." ,'maxlength' => 50]);
                    ?>
            </div>

            <div class="col-lg-4 col-md-5">                                    
                    <?=
                    $form->field($model, 'to_email', [
                        'template' => "<label>Your Email Address (For Receipt)</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Your Email For Receipt..." ,'maxlength' => 80]);
                    ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <?=
                    Html::submitButton('ADD TO CART', [
                        'class' => 'btn-warning',
                        'id' => 'add_gift_card'
                    ]);
                ?>               
            </div>
        </div>
        <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('cart') ?>">
        <input type="hidden" id="commodity_type" name="commodity_type" value="giftcard">
        <input type="hidden" id="add" name="add" value="add">
<?php ActiveForm::end(); ?>
    </div>

</main>
<?php
$this->registerJsFile('@web/js/client/gift-card.js');?>