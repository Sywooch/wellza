<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: my-profile.php
 *  Created: Codian Team
 *  Description: Client can view his profile from here.Client can also edit his profile.
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use yii\imagine\Image;
use bupy7\cropbox\Cropbox;
use yii\helpers\FileHelper;

if (!empty($returndata)) {
    $site_url = \Yii::$app->urlManager->createUrl('');
    $profile_image_thumb = !empty($returndata['profile_image_thumb']) ? '../'.$returndata['profile_image_thumb'] : $site_url . '/images/default-profile.png';
    $profile_image = !empty($returndata['profile_image']) ? '../'.$returndata['profile_image'] :  '';
    $first_name = !empty($returndata['first_name']) ? $returndata['first_name'] : '';
    $last_name = !empty($returndata['last_name']) ? $returndata['last_name'] : '';
    $gender = !empty($returndata['gender']) ? $returndata['gender'] : '';
    $date = !empty($returndata['birth_date']) ? $returndata['birth_date'] : '';
    $date_array = explode('-', $date);
    $birth_date = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0];
    $experience_in_year = !empty($returndata['experience_in_year']) ? $returndata['experience_in_year'] . ' Years' : '';
    $experience_in_month = !empty($returndata['experience_in_month']) ? $returndata['experience_in_month'] . ' month' : '';
    $cell_phone = !empty($returndata['cell_phone']) ? $returndata['cell_phone'] : '';
    $address = !empty($returndata['address']) ? $returndata['address'] : '';
    $address2 = !empty($returndata['address2']) ? $returndata['address2'] : '';
    $province = !empty($returndata['province']) ? $returndata['province'] : '';
    $city = !empty($returndata['city']) ? $returndata['city'] : '';
    $postal_code = !empty($returndata['postal_code']) ? $returndata['postal_code'] : '';
    $model->address = $address;
    $model->address2 = $address2;
    $model->gender = $gender;
    $model->experience_in_year = $returndata['experience_in_year'];
    $model->experience_in_month = $returndata['experience_in_month'];
    $yop = array();
    $month = array();
    
    for ($i = 0; $i <= 30; $i++) {
        $yop[$i] = $i;
    }
    for ($i = 0; $i <= 12; $i++) {
        $month[$i] = $i;
    }
}
?>
<!------------------------------------------- View/Edit Profile starts from here -------------------------------------------------------------------->

<div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/cross.png" alt="close"></button>
        </div>
        <div class="modal-body">

            <div id="view_profile">
                <div class="row">
                    <div class="col-lg-12 main_heading clearfix">
                        <h2 class="modal-title">View Profile</h2>
                        <a id="edit_profile" href="javascript:void(0);">Edit Profile</a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="profile-image">
                            <img src="<?= $profile_image_thumb; ?>" alt="customer-image" class="img-circle img-responsive" align="left">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">First Name:</label>
                            <div class="form-control name"><?= $first_name ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Last Name:</label>
                            <div class="form-control name"><?= $last_name ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Gender:</label>
                            <div class="form-control gender"><?= $gender ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Birth Date:</label>
                            <div class="form-control dob"><?= $birth_date ?></div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Cell Phone:</label>
                            <div class="form-control mob-no"><?= $cell_phone ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Address 01:</label>
                            <div class="form-control address"><?= $address ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Address 02:</label>
                            <div class="form-control address"><?= $address2 ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Province:</label>
                            <div class="form-control province"><?= $province ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">City:</label>
                            <div class="form-control city"><?= $city ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Postal Code: </label>
                            <div class="form-control postal_code"><?= $postal_code ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit_profile" style="display: none;">
                <?php
                //if (!Yii::$app->user->isGuest && Yii::$app->user->isProvider) {
                $form = ActiveForm::begin([
                            'options' => [
                                'id' => 'provider_view_profile',
                                ['enctype' => 'multipart/form-data']
                            ],
                            'action' => 'my-profile/edit-profile',
                            'method' => 'post',
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => true,
                            
                            'fieldConfig' => function ($model, $attribute) {

                        if ($attribute == 'province' || $attribute == 'city') {
                            return ['options' => ['class' => 'form-group ui-widget']];
                        }
                    },
                ]);
                //}                   
                
                ?>
                <div id="light" class="white_content">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="< ?php echo Yii::getAlias('@web'); ?>/resource/images/cross.png" alt="close"></button>-->
                    <div>
                        <?php 
                            echo $form->field($model, 'image')->widget(Cropbox::className(), [
                                 'attributeCropInfo' => 'crop_info',
                                 'previewImagesUrl' => ["{$profile_image_thumb}"],
                                 'originalImageUrl' => "{$profile_image}" 
                        ]);?>
                        
                    </div>
                    <div class="btn_container">
                        <button type="button" id="saveimgbtn" name="saveimgbtn" class="btn btn-success">Save</button>
                        <button type="button" id="cancelimg" name="cancelimg" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
                
                <div id="fade" class="black_overlay"></div>
                        
                <!--<input type="hidden" id="originalimg" name="originalimg" value="">
                <input type="hidden" id="profile_thumbimg" name="profile_thumbimg" value="">-->
                <div class="row">
                    <div class="col-lg-12 main_heading clearfix">
                        <h2 class="modal-title">Edit Profile</h2>
                        <?=
                        Html::submitButton('Finish Edit', [
                            'class' => 'save_profile change',
                            'name' => 'finish_edit'
                        ]);
                        ?>
                        <!--<a class="back_btn" href="javascript:void(0);">Finish Edit</a>-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="profile-image">
                            <img src="<?= $profile_image_thumb ?>" alt="customer-image" class="img-circle img-responsive customer-image" align="left">
                            <a class="edit-btn text-center" href="javascript:void(0);" onclick = "document.getElementById('light').style.display = 'block';
                                    document.getElementById('fade').style.display = 'block'"><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/camera_icon.png" alt="edit-icon"></a>
                        </div>
                        
                        <?=
                        $form->field($model, 'profile_image_thumb', [ 'template' => "{input}\n{hint}\n{error}",
                        ])->fileInput(['id' => 'profile_image_thumb', 'class' => 'upload btn btn-warning', 'style' => 'display:none;', 'value' => "{$profile_image_thumb }"]);
                        ?>
                        <?=
                        $form->field($model, 'first_name', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['autofocus' => true, 'class' => "form-control name", 'placeholder' => "First Name", 'value' => $first_name, 'id' => 'first_name']);
                        ?>
                        <?=
                        $form->field($model, 'last_name', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control name", 'placeholder' => "Last Name", 'value' => $last_name, 'id' => 'last_name']);
                        ?>
                        <?=
                        $form->field($model, 'gender', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label'],
                        ])->radioList(['Male' => 'Male', 'Female' => 'Female'], ['class' => 'form-control gender']);
                        ?>                            
                        <?=
                        $form->field($model, 'birth_date', [
                            'template' => "<div class='input_border'>{label}\n<div class='input-group date' id = 'datepicker_birthdate'>{input}\n<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span>
                                            </span></div></div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control dob", 'placeholder' => "Birth Date", 'value' => $birth_date, 'id' => 'birth_date']);
                        ?>                       
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <?=
                        $form->field($model, 'cell_phone', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control mob-no", 'placeholder' => "Cell Phone:", 'value' => $cell_phone, 'id' => 'cell_phone']);
                        ?>
                        <?=
                        $form->field($model, 'address', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'col-md-2 control-label']
                        ])->textarea(['rows' => '4', 'cols' => '6', 'placeholder' => "Address 01", 'class' => "form-control address", 'id' => 'address']);
                        ?>
                        <?=
                        $form->field($model, 'address2', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'col-md-2 control-label']
                        ])->textarea(['rows' => '4', 'cols' => '6', 'placeholder' => "Address 02", 'class' => "form-control address", 'id' => 'address2']);
                        ?>
                        <?=
                        $form->field($model, 'province', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control province ui-widget", 'placeholder' => "Province:", 'value' => $province, 'id' => 'province']);
                        ?>
                        <?=
                        $form->field($model, 'city', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control city", 'placeholder' => "City:", 'value' => $city, 'id' => 'city']);
                        ?>
                        <?=
                        $form->field($model, 'postal_code', [
                            'template' => "<div class='input_border'>{label}\n{input}</div>\n{hint}\n{error}",
                            'labelOptions' => [ 'class' => 'control-label']
                        ])->textInput(['class' => "form-control postal_code", 'placeholder' => "Postal Code:", 'value' => $postal_code, 'id' => 'postal_code']);
                        ?>
                        
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<!------------------------------------------- View/Edit Profile ends here -------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<style>
    #birth_date {
        margin: 0 0 0 100px;
        padding-left: 0px;
        width: auto;
    }
    .img-responsive {
        height: 100%;
    }
    .ui-widget-content {
        z-index: 99999;
    }
    .manage-profile-modal .modal-content .modal-body .form-group .postal_code {
        padding-left: 100px;
    }
    
    .btn-group {
        margin-left: 32%;
    }
    .btn_container,.cropped {
        text-align: center;
    }
    .white_content {
        top:-17px;
    }
</style>

<?php
$this->registerCssFile('@web/css/client/myprofile.css');
$this->registerJsFile('@web/js/client/myprofile.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* * ********************************************************************************************************************************** */
// EOF: my-profile.php
/* * ********************************************************************************************************************************** */
?>
