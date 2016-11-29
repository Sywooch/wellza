<?php
/*
 * Search for category
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>        
        <div class="search-box">
            <?php $form = ActiveForm::begin([
                'action' => '',
                'method' => 'post',
                'options' => [
                    'class' => 'form-inline',
                    'id' => 'product_search',
                    'name' => 'product_search'
                    ]
            ]);?>                                
                <div class="form-group">
                    <?= $form->field($model, 'main_category')->dropDownList($category,['options' => [$category_id => ['Selected'=>'selected']],'prompt' => 'Main Category','class' => 'selectpicker','data-size' =>10])->label(false); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'sub_category')->dropDownList($subcategory,['options' => [$sub_category_id => ['Selected'=>'selected']],'prompt' => 'Sub Category','class' => 'selectpicker','data-size' =>10 ])->label(false); ?>
                </div>
            <a id="product_add" data-target=".add-product-modal" data-toggle="modal" href="javascript:void(0);" class="btn btn-warning puul-right">ADD PRODUCTS</a>
                <?=
                    Html::submitButton('SEARCH',
                        [
                            'class' => 'btn btn-info',
                            'name' => 'search'
                        ]);
                ActiveForm::end();?>
        </div>
