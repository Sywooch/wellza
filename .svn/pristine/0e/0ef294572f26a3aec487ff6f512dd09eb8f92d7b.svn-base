<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>
<div class="modal admin-modal fade view_add_pacakge" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
            $form = ActiveForm::begin([
                        'action' => 'service-package/update-package',
                        //'enableAjaxValidation' => true,
                        'enableClientValidation' => true,
                        'method' => 'post',
                        'options' => [
                            ['enctype' => 'multipart/form-data'],
                            'id' => 'edit_package'
                        ]
            ]);
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="resource/images/cross.png" alt="close"></button>
                <h2 class="modal-title">View/Edit Package</h2>
            </div>
            <div class="modal-body">
                <div class="form-group row" id="editpackage_rows">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'category_name',
                                [
                                        'template' => "{input}\n{hint}\n{error}"                                        
                                ])->textInput(['placeholder' => "Wellza Package Name",'class' => "form-control input-lg" ,'id' => "wellza-package-name_edit",'disabled' => 'disabled','value' =>""]);                                      
                        ?>
                        <!--<input type="text" class="form-control input-lg" placeholder="Wellza Package Name">-->
                    </div>
                    <div class="col-sm-6">
                       <?= $form->field($model, 'sub_category_name')->dropDownList(['prompt' => 'Select Service'],['class' => 'selectpicker','id' => 'subcategories_edit'])->label(false); ?>
                    </div>
                </div>
                <div id="editcontents"></div>

                <!--<div class="row filled">
                    <div class="col-sm-10 form-group" id="service_package1">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row time_duration">
                                    <div class="col-sm-4 start_time">
                                         < ?= $form->field($model, 'start_time',
                                                [
                                                    'template' => "{input}\n{hint}\n{error}"                                        
                                                ])->textInput(['data-counter' => "0" ,'class' => "form-control input-lg watch_icon_gray datetimepicker1 first", 'placeholder' => "Start Time", 'value' => "",'name' => 'Packages[start_time][]']);                                      
                                        ?>
                                        <input type="text" class="form-control input-lg watch_icon_white" id="datetimepicker1" placeholder="Time" value="08:00 AM">
                                    </div>
                                    <div class="col-sm-1 to">
                                        To
                                    </div>
                                    <div class="col-sm-4 end_time">
                                        < ?= $form->field($model, 'end_time',
                                                [
                                                    'template' => "{input}\n{hint}\n{error}"                                        
                                                ])->textInput(['data-counter' => "0" ,'class' => "form-control input-lg watch_icon_gray datetimepicker1 second", 'placeholder' => "End Time", 'value' => "",'name' => 'Packages[end_time][]']);                                      
                                        ?>
                                        <input type="text" class="form-control input-lg watch_icon_white" id="datetimepicker2" placeholder="Time" value="08:00 AM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                < ?= $form->field($model, 'minutes_duration',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['id' => "duration-0" ,'class' => "form-control input-lg", 'placeholder' => "Duration (mins)", 'readonly' => "readonly",'value' => "",'name' => 'Packages[minutes_duration][]']);                                      
                                ?>
                                <input type="text" id="duration-0" class="form-control input-lg" placeholder="Duration (mins)" readonly = "readonly">
                            </div>
                            <div class="col-sm-3">
                                < ?= $form->field($model, 'service_price',
                                        [
                                            'template' => "{input}\n{hint}\n{error}"                                        
                                        ])->textInput(['class' => "form-control input-lg", 'placeholder' => "Price ($)",'value' => "",'name' => 'Packages[service_price][]']);                                      
                                ?>
                                <input type="text" class="form-control input-lg" placeholder="Price">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-2 edit_package">
                        <ul class="list-unstyled list-inline">
                            <li><a href="javascript:void(0);"><img src="resource/images/edit_icon02.png" alt="edit_icon"></a></li>
                            <li><a href="javascript:void(0);"><img src="resource/images/delete_icon02.png" alt="delete_icon"></a></li>
                        </ul>
                    </div>

                </div>-->
                
                <!--<div class="row">
                    <div class="col-sm-10 form-group" id="service_package1">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row time_duration">
                                    <div class="col-sm-5 start_time">
                                        <input type="text" class="form-control input-lg watch_icon_gray" id="datetimepicker1" placeholder="Time" value="08:00 AM">
                                    </div>
                                    <div class="col-sm-1 to">
                                        To
                                    </div>
                                    <div class="col-sm-5 end_time">
                                        <input type="text" class="form-control input-lg watch_icon_gray" id="datetimepicker2" placeholder="Time" value="08:00 AM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-lg" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 edit_package">
                        <ul class="list-unstyled list-inline">
                            <li><a href="javascript:void(0);"><img src="resource/images/add_icon02.png" alt="add_icon"></a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <?= $form->field($model, 'preparation_status',
                                [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textarea(['class' => "form-control",'placeholder' => "Preparation Instructions",'id' => "packages-preparation_status_edit"]); 
                        ?>
                        <!--<textarea class="form-control" placeholder="Preparation Instructions"></textarea>-->
                    </div>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('SAVE PACKAGE',
                            [
                                'class' => 'btn btn-info btn-lg',
                                'name' => 'edit-package',
                                'id' => 'edit_packagebtn'
                            ]);
                    ?>
                    <!--<button type="button" class="btn btn-info btn-lg ">SAVE PACKAGE</button>-->
                </div>
            </div>
            <input type="hidden" id="main_category_id" name="Packages[parent]" value=""/>
            <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->