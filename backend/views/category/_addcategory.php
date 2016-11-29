<?php
/*
 * Adding category from this form
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>

<div class="modal admin-modal fade add-category-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
            <?php
            $form = ActiveForm::begin(
                            [
                                'id' => 'addcategories',
                                //'enableAjaxValidation' => true,
                                //'enableClientValidation' => true,
                                'action' => 'category/add-category'
            ]);
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="resource/images/cross.png" alt="close"></button>
                <h2 class="modal-title">Add Category</h2>
            </div>
            <div class="modal-body">
                <div id="category_msg"></div>
                <div id="add-category" class="owl-carousel owl-theme categoryslider-box">
                    
                        <?php
                            
                            for($i=0;$i<count($icon_class);$i++)
                            {
                        ?>
                            <div class="item">
                                <div class="checkbox cate-<?=$i?>">
                                    
                                    <!--<input type="checkbox" name="cate-< ?=$i?>" id="cate-< ?=$i?>" value="< ?=$icon_class[$i]['class_name']?>">-->
                                    <input type="radio" name="icons[]" id="cate-<?=$i?>" value="<?=$icon_class[$i]['class_name']?>">
                                    <label class="category_icon" for="cate-<?=$i?>"> <span class='cat-icon <?=$icon_class[$i]['class_name']?>'></span></label>
                                                         
                                </div>    
                            </div>
                        <?php
                            }
                        ?>                    
                </div>
                <?= $form->field($model, 'category_name',
                        [
                            'template' => "{input}\n{hint}\n{error}"                                       
                        ])->textInput(['placeholder' => "Category Name",'class' => 'form-control input-lg','id' => 'category-name']);
                ?>                
                
                <div class="form-group loader_load">
                    <?= Html::submitButton('Save category',
                            [
                                'class' => 'btn btn-info btn-lg btn-block',
                                'name' => 'save_category'
                            ]);
                    ?>
                    <i class="fa fa-spinner fa-spin"></i>
                    <!--<button type="button" class="btn btn-info btn-lg btn-block">Save category</button>-->
                </div>
            </div>
            <?php ActiveForm::end(); ?>    
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
    #category_msg {
        height: 12px;
    }
    .loader_load {
        position: relative;
    }
    .loader_load .fa-spin {
        position: absolute;
        margin-right: 50%;
        right: 0;
        top:20px;
    }
</style>
    <?php $this->registerJsFile('@web/js/add_category.js'); ?>
