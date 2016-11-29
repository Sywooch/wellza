<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-2">
    <?php $form = ActiveForm::begin([
        'action' => '',
        'method' => 'get',
    ]); ?>
    <?php
        //echo Yii::$app->request->get('searchstring');
        //echo Yii::$app->getRequest()->getQueryParam('searchstring');
    ?>
    <?php
        $value = '';
        
        if(isset($searchstring) && !empty($searchstring)) {
            
            $value = $searchstring;
        }        
        
    ?>   
    <?= $form->field($model, 'Search')->textInput(['name' => 'search','value' => $value]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>