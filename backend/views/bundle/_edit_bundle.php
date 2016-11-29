<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
$site_url = \Yii::$app->urlManager->createUrl('');
?>
<div class="modal admin-modal fade edit_bundle" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <?php
                $form = ActiveForm::begin([
                    'id' => 'edit_bundle',
                    'method' => 'post',
                    'action' => Yii::$app->urlManager->createUrl('bundle').'/update-bundle',
                    //'enableAjaxValidation' => true,
                    'enableClientValidation' => true                        
                ]);
            ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?=$site_url?>resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">Edit Wellza Bundle</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'bundle_name',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['id' => "wellza-package-name_edit",'class' => "form-control input-lg", 'placeholder' => "Wellza Bundle Name"]);                                      
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'category_name')->dropDownList($category,['prompt' => 'Category Name','class' => 'selectpicker','multiple' => true,'id' => 'categories_edit'])->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'savings',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['id' => "savings_edit",'class' => "form-control input-lg", 'placeholder' => "Total Saving"]);                                      
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'price',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['id' => "price_edit",'class' => "form-control input-lg", 'placeholder' => "Wellza Bundle price"]);                                      
                                ?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="current_bundle_id" name="Bundles[bundle_id]" value="">
                    <div class="text-center">
                        <?= Html::submitButton('SAVE BUNDLE',
                            [
                                'class' => 'btn btn-info btn-lg',
                                'name' => 'edit_bundle',
                                'id' => 'edit_bundle'
                            ]);
                    ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

