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
<div class="search">
    <?php $form = ActiveForm::begin([
        'action' => '',
        'method' => 'post',
        'options' => [
            'class' => 'form-inline',
            'id' => 'user_search'
            ]
    ]);         
    ?>
        <div class = "form-group">
                <?php
                    if(empty($search)) {
                        $search = '';
                    }
                ?>
                <?= $form->field($model, 'search',[
                                    'template' => "<div class='input-group'>{input}\n<div class = 'input-group-addon'><a href = 'javascript:void(0);'><i class = 'fa fa-search'></i></a></div>{hint}\n{error}</div>"
                                ])->textInput(['value' => $search,'placeholder' => "Search",'class' => '']) ?>           
        </div>
    <?php ActiveForm::end(); ?>
    <!--<form class="form-inline">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="" id="" placeholder="Search">
                <div class="input-group-addon"><a href="javascript:void(0);"><i class="fa fa-search"></i></a></div>
            </div>
        </div>
    </form>-->
</div>


