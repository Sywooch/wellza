<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
 
$this->title = 'Manage User';
//$this->registerJsFile('@web/web/themes/admin_theme/js/bootstrap-lightbox.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCss('@web/web/themes/admin_theme/css/bootstrap-lightbox.css');
$this->registerJsFile('@web/web/themes/admin_theme/js/ajax.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>

<div class="col-md-10">
    <div class="row">
	<div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <legend><?= !empty($editprofile)? 'Edit User' : 'Add New User'?></legend>
		</div>
		<div class="panel-body">
                    <?php $form = ActiveForm::begin(
                                [
                                    'id' => 'manageform',
                                    //'enableAjaxValidation' => true,
                                    //'enableClientValidation' => true,
                                   'options' => [
                                        'class' => 'form-horizontal',
                                       ['enctype' => 'multipart/form-data']
                                    ],
                                    //'action' => 'add-user'
                                ]); ?>
			<fieldset>
                                                                                   
                            <?= $form->field($model, 'first_name',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['autofocus' => true,'placeholder' => "Enter Your First Name"]);
                                      
                            ?>
                            
                            <?= $form->field($model, 'last_name',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['placeholder' => "Enter Your Last Name"]);
                                      
                            ?>
                                
                            <?= $form->field($model, 'email',
                                    [   
                                        'enableAjaxValidation' => true,
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['placeholder' => "Enter Your Email"]);
                                      
                            ?>
                        <?php if(empty($editprofile)) { ?>
                            <?= $form->field($model, 'password',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->passwordInput()
                                      ->input('password',['placeholder' => "Enter Password"]);
                            ?>
                            
                            <?= $form->field($model, 'confirm_password',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->passwordInput()
                                      ->input('password',['placeholder' => "Enter Password Again"]);
                            ?>
                        <?php
                        } else {?>
                            
                        <div class='form-group'>
                            <label for="user-email" class="col-md-2 control-label">New Password</label>
                            <div class='col-md-10'>
                                
                                <?= Html::a('Click Here', ['#'],['data-toggle' => 'modal','data-target' => '#login-modal']) ?>
                            </div>
                        </div>
          
                          <?php
                          
                        }
                        ?>
                            
                            <?php
                                $gender = $model->gender;
                               
                            ?>
                             <?= $form->field($model, 'gender',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label'],
                                    ])->radioList(['Male' => 'Male', 'Female' => 'Female']); 
                            ?>
                            
                            <?= $form->field($model, 'profile_image',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}<p>Upload File Here</p></div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label'],
                                    ])->fileInput(['id' => 'exampleInputFile1' ,'class' => 'btn btn-default']);
                            ?>
                                                       
                                <div class='form-group'>
                                    <div class='col-md-10'>
                                        <label class ="col-md-2 control-label">Birth Date</label>

                                            <div class="bfh-datepicker" data-min="01/15/1900" data-format="d-m-y" id="dtpDate" data-date="today" data-max="today"></div>

                                    </div>
                                </div>
                            
                            <!--< ?= $form->field($model, 'birth_date',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10 bfh-datepicker' data-min='01/15/1900' data-format='d-m-y' id='dtpDate' data-date='today' data-max='today'></div>{input}\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label'],
                                    ])->textInput(['style' => 'display:none']);
                                      
                            ?>-->
                            
                            <?= $form->field($model, 'birth_date')->hiddenInput(['value'=> "{$model->birth_date}",'id' => 'userform-birth_date'])->label(false);
                            
                            ?>
                            
                            <?= $form->field($model, 'user_type',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->dropDownList(['empty' => 'Select Role', 'Provider' => 'Provider', 'Client' => 'Client'])->label('Role'); ?>
                            
                            <?= $form->field($model, 'address',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['placeholder' => "Enter Your Address"]);
                                     
                            ?>
                            
                            <?= $form->field($model, 'zip',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['placeholder' => "Enter Your Zip"]);
                                      
                            ?>
                            
                            <?= $form->field($model, 'country',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->dropDownList(['empty' => 'Select Country','india' => 'India', 'usa' => 'USA','uk' => 'UK']); ?>
                            
                            <?= $form->field($model, 'mobile',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textInput(['placeholder' => "Enter Your Mobile Number"]);
                                      
                            ?>
                            
                            <?= $form->field($model, 'about_me',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->textarea(['rows' => '10' ,'cols' => '6']); 
                            ?>
                            
                            <?= $form->field($model, 'status',
                                    [
                                        'template' => "<div class='form-group'>{label}\n<div class='col-md-10'>{input}</div>\n{hint}\n{error}</div>",
                                        'labelOptions' => [ 'class' => 'col-md-2 control-label']
                                    ])->dropDownList(['empty' => 'Select Status','10' => 'Active', '0' => 'Inactive']); 
                            ?>
                        
                        
			    <div style="margin-left: 10%" class='form-actions'>
                                <div class='row'> 	
                                    <div class='col-md-12'>
                                        <?= Html::submitButton('Signup', [
                                                'class' => 'btn btn-primary',
                                                'name' => 'signup-button'
                                            ]);
                                        ?>
                                    </div>
                                </div>
                            </div>        
											
			</fieldset>							
									
                    <?php ActiveForm::end(); ?>
                    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="loginmodal-container">
                                    <button type="button" class="close" data-dismiss="modal">✕</button>
                                        <h1>Create New Password</h1><br>
                                       
                                        <!--< ?php $form = ActiveForm::begin(
                                            [
                                                'id' => 'changepasswordform',
                                                'enableAjaxValidation' => true,
                                                'enableClientValidation' => true,
                                                'validateOnSubmit'       => true,
                                                'options' => [
                                                    'class' => 'form-horizontal',
                                                    'name' => 'change-password-form'
                                                ]
                                                //'action' => 'add-user'
                                            ]); 
                                        ?>-->
                                            <div id="messages"></div>
                                            <?= $form->field($model, 'old_password')
                                                        ->passwordInput()
                                                        ->input('password',['placeholder' => "Enter Old Password"]);
                                              ?>
                            
                                            <?= $form->field($model, 'new_password')
                                                      ->passwordInput()
                                                      ->input('password',['placeholder' => "Enter Password"]);
                                            ?>
                            
                                            <?= $form->field($model, 'confirm_password')
                                                      ->passwordInput()
                                                      ->input('password',['placeholder' => "Enter Password Again"]);
                                            ?>
                                            <input type="hidden" id="url" name="url" value="<?php echo \Yii::$app->getUrlManager()->createUrl('admin-user/change-password'); ?>">
                                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $model->id; ?>">
                                             <?= Html::submitButton('Submit', [
                                                    'class' => 'btn btn-primary change',
                                                    'name' => 'change'
                                                ]);
                                            ?>
                                            <!--<input type="submit" name="change" class="login loginmodal-submit" value="Change">-->
                                        <!--< ?php ActiveForm::end();
                                        ?>-->
                                </div>
                            </div>
                        </div>
		</div>
	    </div>
	</div>
    </div>
    <!--  Page content -->
</div>

