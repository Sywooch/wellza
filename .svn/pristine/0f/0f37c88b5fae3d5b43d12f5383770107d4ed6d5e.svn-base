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
<div class="modal admin-modal fade edit_coupon" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
            $form = ActiveForm::begin(
                            [
                                'id' => 'edit-couponform',
                                //'enableAjaxValidation' => true,
                                //'enableClientValidation' => true,
                                'action' => 'coupon/edit-coupon'
                    ]);
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/') ?>resource/images/cross.png" alt="close"></button>
                <h2 class="modal-title">Edit Coupon</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'name', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Name",'id' => 'name_coupon']);
                        ?>                        
                    </div>

                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'code', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Code",'id' => 'code_coupon']);
                        ?>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'discount', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Discount",'id' => 'discount_coupon']);
                        ?>                        
                    </div>
                    <!--<div class="col-sm-6">
                        < ?=
                        $form->field($model, 'total', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Total"]);
                        ?>
                    </div>-->
                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'date_start', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Start Date",'id' => 'date_start_coupon']);
                        ?>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'date_end', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "End Date",'id' => 'date_end_coupon']);
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?=
                        $form->field($model, 'uses_total', [
                            'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>",
                        ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "Total Uses",'id' => 'uses_coupon']);
                        ?>
                    </div>
                </div>
                <input type="hidden" id="couponid" name="couponid" value=""/>
                <?=
                    Html::submitButton('Update', [
                        'id' => 'update_couponbtn',
                        'class' => 'btn btn-info btn-lg',
                        'name' => 'update-button'
                    ]);
                ?>
                
            </div>
            <?php ActiveForm::end(); ?>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

