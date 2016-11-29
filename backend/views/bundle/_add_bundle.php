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

$name = '';
if(!empty($bundle)) {
    $name = $bundle;
}
?>
<div class="modal admin-modal fade add_bundle" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
                $form = ActiveForm::begin([
                    'id' => 'add_bundle',
                    'method' => 'post',
                    'action' => Yii::$app->urlManager->createUrl('bundle').'/add-bundle',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true                        
                ]);
            ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">Add Wellza Bundle</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'bundle_name',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['id' => "wellza-package-name",'class' => "form-control input-lg", 'placeholder' => "Wellza Bundle Name",'value' => $name]);                                      
                                ?>
                                <!--<input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Wellza Bundle Name">-->
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'category_name')->dropDownList($category,['prompt' => 'Category Name','class' => 'selectpicker','multiple' => true])->label(false); ?>
                                <!--<select class="selectpicker">
                                    <option>Category Name</option>
                                </select>-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'savings',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['class' => "form-control input-lg", 'placeholder' => "Total Saving"]);                                      
                                ?>
                                <!--<input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Total Saving">-->
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'price',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['class' => "form-control input-lg", 'placeholder' => "Wellza Bundle price"]);                                      
                                ?>
                                <!--<input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Wellza Bundle price">-->
                            </div>
                        </div>
                    </div>


                    <div class="text-center">
                         <?= Html::submitButton('SAVE BUNDLE',
                            [
                                'class' => 'btn btn-info btn-lg',
                                'name' => 'save_bundle',
                                'id' => 'save_bundle'
                            ]);
                    ?>
                        <!--<button type="button" class="btn btn-info btn-lg ">SAVE BUNDLE</button>-->
                    </div>
                </div>
            <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

