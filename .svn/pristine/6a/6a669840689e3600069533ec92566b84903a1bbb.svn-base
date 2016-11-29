<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
?>
<div class="modal admin-modal fade add_coupon" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <?php 
             $form = ActiveForm::begin(
                                [
                                    'id' => 'add-couponform',
                                    'enableAjaxValidation' => true,
                                    'enableClientValidation' => true,
                                   'action' => 'coupon/add-coupon'
                ]); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">Add Coupon</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'name',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Name"]);
                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Name">
                            </div>-->
                        </div>

                        <div class="col-sm-6">
                            <?= $form->field($model, 'code',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Code",'readonly' => "readonly",'value' => "{$code}" ]);
                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Code">
                            </div>-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'discount',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Discount(in %)"]);
                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Discount">
                            </div>-->
                        </div>
                        <!--<div class="col-sm-6">
                            < ?= $form->field($model, 'total',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Total"]);                                      
                            ?>
                            
                        </div>-->
                        <div class="col-sm-6">
                            <?= $form->field($model, 'date_start',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Start Date"]);                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Start Date">
                            </div>-->
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-sm-6">
                            <?= $form->field($model, 'date_end',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "End Date"]);                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="End Date">
                            </div>-->
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'uses_total',
                                    [
                                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                                    ])->textInput(['class' => 'form-control input-lg','placeholder' => "Total Uses"]);                                      
                            ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Total Uses">
                            </div>-->
                        </div>
                    </div>                    
                     <?= Html::submitButton('ADD', [   
                         'id' => 'add_couponbtn',
                         'class' => 'btn btn-info btn-lg',
                         'name' => 'signup-button'
                       ]);
                    ?>
                    <!--<button type="button" class="btn btn-info btn-lg">ADD</button>-->
                </div>
            <?php ActiveForm::end(); ?>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

