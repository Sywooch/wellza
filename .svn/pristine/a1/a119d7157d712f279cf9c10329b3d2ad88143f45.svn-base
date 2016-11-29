<?php
/*
 * Add/edit product form 
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>

<div class="modal admin-modal fade add-product-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
                $form = ActiveForm::begin([
                    'action' => 'product/manage-product',
                   // 'action' => 'manage-product',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'method' => 'post',
                    'options' => [
                        ['enctype' => 'multipart/form-data'],
                        'class' => '',
                        'id' => 'manage_product'
                    ]
                ]);
            ?>            
           
            <div id="outPopUp">
                    <i class="fa fa-spinner fa-spin"></i>
            </div>
            <input type="hidden" id="product_ids" name="product_ids" value="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/') ?>resource/images/cross.png" alt="close"></button>
                <h2 class="modal-title">Add Products</h2>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="addproduct-box">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="upload-product-img">
                                <!--<a href="#">
                                    <img src="< ?php echo Yii::$app->urlManager->createUrl('/') ?>resource/images/upload-img.jpg" alt="upload-img" >
                                </a>-->
                                <input type="image" id="prodimage" src="<?php echo Yii::$app->urlManager->createUrl('/') ?>resource/images/upload-img.jpg" class="img-responsive"/>
                                <?= $form->field($model, 'product_image',
                                    [
                                        'template' => "{input}\n{hint}\n{error}"                                        
                                    ])->fileInput(['id' => 'product_image' ,'class' => 'btn btn-default']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="upload-product-fields">
                                <div class="row">                                        
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?=
                                        $form->field($model, 'product_name', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textInput(['placeholder' => 'Products Name', 'class' => 'form-control input-lg', 'id' => 'product_name']);
                                        ?>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?=
                                        $form->field($model, 'sr_number', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textInput(['placeholder' => "SR. Number", 'class' => 'form-control input-lg', 'id' => 'sr_number']);
                                        ?>                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?= $form->field($model, 'main_category')->dropDownList($category,['prompt' => 'Main Category','class' => 'selectpicker'])->label(false); ?>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?= $form->field($model, 'sub_category')->dropDownList($subcategory,['prompt' => 'Sub Category','class' => 'selectpicker'])->label(false); ?>
                                        <p class="help-block help-block-error"></p>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?=
                                        $form->field($model, 'price', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textInput(['placeholder' => "Gross Price", 'class' => 'form-control input-lg', 'id' => 'gross_price']);
                                        ?>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?=
                                        $form->field($model, 'selling_price', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textInput(['placeholder' => "Discount Price", 'class' => 'form-control input-lg', 'id' => 'discount_price']);
                                        ?>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class='col-lg-6 col-md-6 col-sm-6'>
                                        <?=
                                        $form->field($model, 'quantity', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textInput(['placeholder' => "Quantity", 'class' => 'form-control input-lg', 'id' => 'quantity']);
                                        ?>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class='col-lg-12'>
                                        <?=
                                        $form->field($model, 'long_description', [
                                            'template' => "{input}\n{hint}\n{error}"
                                        ])->textarea(['class' => "form-control input-lg", 'rows' => '3', 'cols' => '45', 'placeholder' => "Description"]);
                                        ?> 
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?=
                                            Html::submitButton('Save', [
                                                'class' => 'btn btn-info btn-lg',
                                                'name' => 'save'
                                            ]);
                                            ?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>   
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php 
$this->registerCssFile("@web/css/product.css");
$this->registerJsFile('@web/js/product.js'); ?>