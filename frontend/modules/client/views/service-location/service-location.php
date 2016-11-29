<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Your Location';
?>
<main class="inner-content" id="inner-content">
    <div class="container location-section">
        <h1 class="inner-heading"><?= $this->title ?></h1>
        <?php
                $form = ActiveForm::begin([
                            'action' => 'service-location/search-location',
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => true,
                            'method' => 'post',
                            'options' => [
                                'id' => 'search_location'
                            ]                            
                ]);
                
                $preferred_location = !empty($data->preferred_location) ? $data->preferred_location : ''; 
                $address1 = !empty($data->address1) ? $data->address1 : '';
                $address2 = !empty($data->address2) ? $data->address2 : '';
                $city = !empty($data->city) ? $data->city : '';
                $province = !empty($data->province) ? $data->province : '';
                $telephone_number = !empty($data->telephone_number) ? $data->telephone_number : '';
                $postal_code = !empty($data->postal_code) ? $data->postal_code : '';
                $personal_information = !empty($data->personal_information) ? $data->personal_information : '';
                $latitude = !empty($data->latitude) ? $data->latitude : '';
                $longitude = !empty($data->longitude) ? $data->longitude : '';
            ?>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <!--<div class="form-group">
                       <!--< ?=
                            Html::submitButton('Get LOCATION', [
                                'class' => 'btn btn-info btn-lg',
                                'name' => 'get_location',
                                'id' => 'get_location'
                            ]);
                            ?>
                    </div>-->   
                    <div class="pick-location">
                        <div class="left">
                            <div class="form-group">
                                <?=
                                    $form->field($model, 'preferred_location', [
                                        'template' => "{input}\n{hint}\n{error}"
                                    ])->textInput(['placeholder' => "Preferred Location",'value'=> "{$preferred_location}", 'class' => "form-control",'id' => "autocomplete",'onFocus' => "geolocate()", 'maxlength' => 350]);
                                    ?>
                                <!--<input id="autocomplete" onFocus="geolocate()" type="text" class="form-control" placeholder="Preferred Location">-->
                            </div>  
                        </div>
                        <div class="center">OR</div>
                        <div class="right">
                            <div class="form-group">
                                <a id="get_location" href="javascript:void(0);" class="btn btn-info btn-lg btn-block"><img src="../resource/images/location_icon.png" alt="location"> Pick Your Location</a>
                            </div>  
                        </div>
                    </div>
                    <div class="form-group text-center">
                         <input type="text" class="form-control" readonly="" id="pick_locationtxt" style="display:none;">
                         <i class="fa fa-spinner fa-spin" style="display:none;"></i>
                    </div>    
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <?=
                        $form->field($model, 'address1', [
                            'template' => "{input}\n{hint}\n{error}"
                        ])->textInput(['placeholder' => "Address Line 1",'value'=> "{$address1}", 'class' => "form-control", 'maxlength' => 250]);
                        ?>                       
                        <!--<input type="text" class="form-control" placeholder="Address Line 1">-->
                    </div>
                    <div class="form-group">
                        <label>Address Line 2</label>
                        <?=
                        $form->field($model, 'address2', [
                            'template' => "{input}\n{hint}\n{error}"
                        ])->textInput(['placeholder' => "Address Line 2",'value'=> "{$address2}", 'class' => "form-control", 'maxlength' => 250]);
                        ?>
                        <!--<input type="text" class="form-control" placeholder="Address Line 2">-->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group ui-widget">
                                <label>City</label> 
                                <?=
                                $form->field($model, 'city', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textInput(['placeholder' => "City",'value'=> "{$city}", 'class' => "form-control", 'maxlength' => 50,'data-size' => 5]);
                                ?>
                                <!--<input type="text" class="form-control" placeholder="City">-->
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group ui-widget">
                                <label>Province</label>
                                <?=
                                $form->field($model, 'province', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textInput(['placeholder' => "Province",'value'=> "{$province}", 'class' => "form-control" , 'maxlength' => 50]);
                                ?>
                                <!--<input type="text" class="form-control" placeholder="Province">-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Telephone No.</label>
                                <?=
                                $form->field($model, 'telephone_number', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textInput(['placeholder' => "Telephone No.",'value'=> "{$telephone_number}", 'class' => "form-control", 'maxlength' => 10]);
                                ?>
                                <!--<input type="text" class="form-control" placeholder="Telephone No.">-->
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <?=
                                $form->field($model, 'postal_code', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textInput(['placeholder' => "Postal Code",'value'=> "{$postal_code}", 'class' => "form-control", 'maxlength' => 6]);
                                ?>
                                <!---<input type="text" class="form-control" placeholder="Postal Code">-->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Add Personal Message</label>
                        <?php
                            
                            $model->personal_information = $personal_information;
                        ?>
                        <?=
                        $form->field($model, 'personal_information', [
                            'template' => "{input}\n{hint}\n{error}"
                        ])->textarea(['class' => "form-control", 'placeholder' => "Add Personal Message"]);
                        ?>
                        <!--<textarea class="form-control" placeholder="Add Personal Message" rows="4"></textarea>-->
                    </div>

                </div>
            </div>

            <div class="center-block text-center btn-bottom clearfix">
                <?=
                Html::submitButton('SAVE LOCATION', [
                    'class' => 'btn btn-info btn-lg',
                    'name' => 'save_location',
                    'id' => 'save_location'
                ]);
                ?>
                <!--<a class="btn btn-info btn-lg" href="wellza-provider.php">SAVE LOCATION</a>-->
            </div>
            <?= $form->field($model, 'latitude')->hiddenInput(['value'=> "{$latitude}",'id' => 'latitude'])->label(false);?>
            <?= $form->field($model, 'longitude')->hiddenInput(['value'=> "{$longitude}",'id' => 'longitude'])->label(false);?>
        <?php ActiveForm::end(); ?>
    </div>
</main>
<?php
    //Renders message for no provider found
    echo Yii::$app->view->render('_message',['model' => $model]);        
?>

<!--<input type="hidden" id="latitude" name="latitude" value="">
<!--<input type="hidden" id="longitude" name="longitude" value="">-->
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('client/service-location') ?>">
<?php
$this->registerJsFile("@web/js/client/service-location.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyC6UvgQK_Ua6wHk9J5Up0IcGJVPvko1lvI&libraries=places&callback=initAutocomplete', ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=true');
?>
