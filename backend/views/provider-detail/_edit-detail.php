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
use yii\imagine\Image;
use bupy7\cropbox\Cropbox;
use yii\helpers\FileHelper;
?>

<div class="modal admin-modal fade edit-customerdetail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
                $customer_id = Yii::$app->request->getQueryParam('id');
                
                $action_url = 'edit-detail/'.$customer_id;
                $form = ActiveForm::begin([
                    'action' => $action_url,
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'method' => 'post',
                    'options' => [
                        ['enctype' => 'multipart/form-data'],
                         'id' => 'edit-detail'
                    ]
                ]);
                $profile_thumb = !empty($data->profile_image_thumb) ? \Yii::$app->urlManagerFrontEnd->createUrl('/').$data->profile_image_thumb : \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');
                $profile_image = !empty($data->profile_image) ? \Yii::$app->urlManagerFrontEnd->createUrl('/') .$data->profile_image : \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');                
            ?>
            <div id="light" class="white_content">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="< ?php echo Yii::getAlias('@web'); ?>/resource/images/cross.png" alt="close"></button>-->
                    <div>
                        <?php 
                            echo $form->field($model, 'image')->widget(Cropbox::className(), [
                                 'attributeCropInfo' => 'crop_info',
                                 'previewImagesUrl' => ["{$profile_thumb}"],
                                 'originalImageUrl' => "{$profile_image}" 
                        ]);?>
                        
                    </div>
                    <div class="btn_container">
                        <button type="button" id="saveimgbtn" name="saveimgbtn" class="btn btn-success">Save</button>
                        <button type="button" id="cancelimg" name="cancelimg" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
                
                <div id="fade" class="black_overlay"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">Edit Detail</h2>
                    
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="addproduct-box">
                        <div class="row">
                            <div class="customer-image">
                                <img src="<?=$profile_thumb?>" alt="customer-image" class="img-circle img-responsive profileimg" align="left">
                                <a class="edit-btn text-center" href="javascript:void(0);" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><img src="../resource/images/edit-icon.png" alt="edit-icon"></a>
                            </div>
                            <!--< ?=
                            $form->field($model, 'profile_image', [ 'template' => "{input}\n{hint}\n{error}",
                            ])->fileInput(['id' => 'profile_image', 'class' => 'upload btn btn-warning','style' => 'display:none;','value' => '']);
                            ?>-->
                            <?=
                            $form->field($model, 'profile_image_thumb', [ 'template' => "{input}\n{hint}\n{error}",
                            ])->fileInput(['id' => 'profile_image_thumb', 'class' => 'upload btn btn-warning','style' => 'display:none;','value' => '']);
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="upload-product-fields">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?=  $form->field($model, 'first_name', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'First Name', 'class' => 'form-control input-lg', 'id' => 'first_name' ,'value' => $data->first_name ]);
                                            ?>
                                            
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?=  $form->field($model, 'last_name', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'Last Name', 'class' => 'form-control input-lg', 'id' => 'last_name','value' => $data->last_name]);
                                            ?>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?php $model->gender = $data->gender;?>
                                            <?= $form->field($model, 'gender',
                                                    [
                                                       'template' => "{input}\n{hint}\n{error}"
                                                    ])->radioList(['Male' => 'Male', 'Female' => 'Female']); 
                                            ?>                                 
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?php
                                                $dob = '';
                                                
                                                if(!empty($data->birth_date)) {
                                                    $birthdate = explode('-', $data->birth_date);
                                                    $dob = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];                                                    
                                                }                                               
                                            ?>
                                            <?= $form->field($model, 'birth_date', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'Birth Date', 'class' => 'form-control input-lg', 'id' => 'birth_date','value' => $dob]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                               <?php
                                                    for($i=0;$i<=40;$i++) {
                                                        $experience_in_year[$i] = $i;
                                                    }
                                                    for($i=0;$i<=12;$i++) {
                                                        $experience_in_month[$i] = $i;
                                                    }
                                                    $model->experience_in_year = $data->experience_in_year;
                                                ?> 
                                              <?= $form->field($model, 'experience_in_year')->dropDownList($experience_in_year,['prompt' => 'Experience in years','id' => "experience_in_year",'class' => 'selectpicker'])->label(false); ?>                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <?php
                                                    $model->experience_in_month = $data->experience_in_month;
                                                ?>
                                              <?= $form->field($model, 'experience_in_month')->dropDownList($experience_in_month,['prompt' => 'Experience in month','id' => "experience_in_month",'class' => 'selectpicker'])->label(false); ?>                                              
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?= $form->field($model, 'cell_phone', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'Cell Phone', 'class' => 'form-control input-lg', 'id' => 'cell_phone','value' => $data->cell_phone]);
                                            ?>                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                             
                                            <?= $form->field($model, 'address', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textarea([ 'id' => 'address','class' => "form-control input-lg", 'rows' => '3', 'placeholder' => "Address 01",'value' => $data->address]);
                                            ?>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?= $form->field($model, 'address2', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textarea([ 'id' => 'address2','class' => "form-control input-lg", 'rows' => '3', 'placeholder' => "Address 02",'value' => $data->address2]);
                                            ?>                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                              <?=
                                                $form->field($model, 'province', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                    ])->textInput(['class' => "form-control input-lg province ui-widget", 'placeholder' => "Province", 'value' =>$data->province, 'id' => 'province']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                 <?=
                                                    $form->field($model, 'city', [
                                                        'template' => "{input}\n{hint}\n{error}"
                                                        ])->textInput(['class' => "form-control input-lg", 'placeholder' => "City:", 'value' => $data->city, 'id' => 'city']);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?= $form->field($model, 'postal_code', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'Postal Code', 'class' => 'form-control input-lg', 'id' => 'postal_code','value' => $data->postal_code]);
                                            ?>                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <?= $form->field($model, 'country', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textInput(['placeholder' => 'Country', 'class' => 'form-control input-lg', 'id' => 'zip','value' => 'Canada']);
                                            ?>                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                             
                                            <?= $form->field($model, 'about_me', [
                                                    'template' => "{input}\n{hint}\n{error}"
                                                ])->textarea([ 'id' => 'about_me','class' => "form-control input-lg", 'rows' => '3', 'placeholder' => "About Me",'value' => $data->about_me]);
                                            ?>                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <?=
                                                    yii\helpers\Html::submitButton('Save', [
                                                        'id' => 'savebtn',
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
            <input type="hidden" id="customer_id" name="customer_id" value="<?php echo Yii::$app->getRequest()->getQueryParam('id');?>">
           <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
