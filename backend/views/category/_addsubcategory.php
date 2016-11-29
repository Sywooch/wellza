<?php
/* * *
 * Add subcategory view
 * 
 * ** */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>
<div class="modal admin-modal fade add-subcategory-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        
        <div class="modal-content" style="position:relative">
             <?php
            $form = ActiveForm::begin(
                            [
                                'id' => 'addsubcategories',
                                //'action' => 'add-category',
                                'action' => Yii::$app->urlManager->createUrl('/category/add-category'),
                                'options' => [
                                    ['enctype' => 'multipart/form-data']
                                ]
            ]);
            ?>
                <div id="outPopUp">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/') ?>resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">ADD SUB CATEGORY</h2>
                </div>
                
                <div class="modal-body clearfix">
                    <div id="category_msg"></div>
                    <div id="add-category" class="owl-carousel owl-theme categoryslider-box">
                        <?php
                            if(!empty($icon_class)) {
                                
                                for($i=0;$i<count($icon_class);$i++) {
                        ?>
                        <div class="item">
                            <div class="checkbox cate-<?=$i?>">
                                <input type="radio" name="icons" id="cate-<?=$i?>" class = "<?=$icon_class[$i]['class_name']?>" value="<?=$icon_class[$i]['class_name']?>"> 
                                <label class="category_icon" for="cate-<?=$i?>"> <span class='cat-icon <?=$icon_class[$i]['class_name']?>'></span></label>
                            </div>    
                        </div>
                        <?php
                                }
                            }
                        ?>
                        
                    </div>

                    <?= $form->field($model, 'category_name',
                        [
                            'template' => "<div class='form-group col-lg-6 col-md-6 col-sm-6'>{input}\n{hint}\n{error}</div>"                                       
                        ])->textInput(['placeholder' => "Sub Category Name",'class' => 'form-control input-lg','id' => 'category-name']);
                    ?>
                   
                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group">
                        <input class="form-control input-lg" id="uploadFile" placeholder="" disabled="disabled" />

                        <div class="input-group-addon custom-file-input">
                        <label  class="input_btn">

                        <?=
                            $form->field($model, 'banner', [ 'template' => "{input}\n{hint}\n{error}",
                            ])->fileInput(['id' => 'uploadBtn','class' => 'file-input','value' => '']);
                        ?>
                        </label>
                        </div>
                        </div>
                    </div>
                    
                    <?= $form->field($model, 'preparation_status',
                                    [
                                        'template' => "<div class='form-group col-lg-12 col-md-12 col-sm-12'>{input}\n{hint}\n{error}</div>",                                        
                                    ])->textarea(['rows' => '3' ,'cols' => '6','placeholder' => "Preparation Instruction",'class' => 'form-control input-lg','id' => 'preparation-status']); 
                    ?>
                    <?= $form->field($model, 'description',
                                    [
                                        'template' => "<div class='form-group col-lg-12 col-md-12 col-sm-12'>{input}\n{hint}\n{error}</div>",                                        
                                    ])->textarea(['rows' => '3' ,'cols' => '6','placeholder' => "Description",'class' => 'form-control input-lg','id' => 'description']); 
                    ?>                   
                    
                    <div class="form-group col-lg-12 text-center">
                        <?= Html::submitButton('Save category',
                                    [
                                        'class' => 'btn btn-info btn-lg',
                                        'name' => 'save-category'
                                    ]);
                        ?>
                        
                    </div>
                </div>
            <input type="hidden" id="section" name="section" value="subcategory">
            <input type="hidden" id="current_action" name="current_action" value="">
            <input type="hidden" id="current_category_id" name="current_category_id" value="">
            
            <input type="hidden" id="parent_id" name="parent_id" value="<?php echo Yii::$app->getRequest()->getQueryParam('id')?>">
            <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<style>
        #outPopUp {
        position: absolute;width: 300px;height: 200px;z-index: 15;  top: 50%;left: 50%; margin: -100px 0 0 -150px; background: #fff;
      }
      #uploadFile{ height: 50px;}
      .custom-file-input{ padding: 0px;}
	.custom-file-input label.input_btn{
		display: inline-block;
		position: relative;
		color: #533e00; margin-bottom: 0px;
	}
        .custom-file-input .form-group{ margin: 0px;}
	.custom-file-input input {
		visibility: hidden;
		width: 100px;
	}
	.custom-file-input label.input_btn:before {
		content: 'Choose File';display: block;padding: 0 0px;
		outline: none;	white-space: nowrap;cursor: pointer;text-shadow: 1px 1px rgba(255,255,255,0.7);
		font-weight: bold;text-align: center;font-size: 10pt;position: absolute;
		left: 0;right: 0;height: 100%; line-height: 32px;
	}
	.custom-file-input label.input_btn:hover:before {
		border-color: #febf01;
	}
	.custom-file-input:active:before {
		background: #febf01;
	}
/*	.file-blue:before {
		content: 'Browse File';background: -webkit-linear-gradient( -180deg, #99dff5, #02b0e6);
		background: -o-linear-gradient( -180deg, #99dff5, #02b0e6);
		background: -moz-linear-gradient( -180deg, #99dff5, #02b0e6);
		background: linear-gradient( -180deg, #99dff5, #02b0e6);
		border-color: #57cff4;
		color: #FFF;
		text-shadow: 1px 1px rgba(000,000,000,0.5);
	}
	.file-blue:hover:before {
		border-color: #02b0e6;
	}
	.file-blue:active:before {
		background: #02b0e6;
	}*/

</style>
<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

<?php $this->registerJsFile('@web/js/add_subcategory.js'); ?>