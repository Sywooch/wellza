<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Service Package';
?>
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web'); ?>/images/ajax-loader.gif">    
</div>
<main class="inner-content" id="inner-content">
    <div class="container service-package-section">
        <h1 class="inner-heading">Service Package</h1>
        <div class="inner-subheading">No need to tip!</div>            
        <?php
            $form = ActiveForm::begin([
                        //'action' => 'service-package/load-location',
                        'action' => 'service-package/load-location',
                        //'enableAjaxValidation' => true,
                        'enableClientValidation' => true,
                        'method' => 'post',                           
                        'id' => 'edit_package'
                    ]);
            ?>
        <div class="select-time-slider owl-carousel owl-theme" id="select-time-slider">
            <?php
            $temp='';
            $appointment_minutes = '';
            $appointment_price = '';
            $appointment_date = '';
            $appointment_time = '';
            
            if (!empty($slots_data)) {
                
                if(isset($appointment_data)) {
                    $appointment_minutes = !empty($appointment_data->appointment_duration) ? $appointment_data->appointment_duration : '';
                    $appointment_price = !empty($appointment_data->appointment_price) ? $appointment_data->appointment_price : '';
                    $appointment_date = !empty($appointment_data->appointment_date) ? $appointment_data->appointment_date : '';
                    $appointment_time = !empty($appointment_data->appointment_time) ? $appointment_data->appointment_time : '';
                }
                
                for ($i = 0; $i < count($slots_data); $i++) {
                    if($temp != $slots_data[$i]['minutes_duration']) {
                        $temp = $slots_data[$i]['minutes_duration'];
                        $slotselected ='';
                        if(!empty($appointment_data->appointment_duration)) {
                            if($slots_data[$i]['minutes_duration'] == $appointment_data->appointment_duration) {
                                $slotselected ='selected';
                            }
                        }                            
                    ?>
                    <div class="item slotsslide <?=$slotselected?>">
                        <div class="item-cnt">
                            <div class="time">
                                <div class="number">                                    
                                    <?=$slots_data[$i]['minutes_duration'] ?>
                                    <div class="minutes">
                                        MINUTES
                                    </div>   
                                </div>
                                <div class="price">

                                    <?= '$' . (int) $slots_data[$i]['service_price'] ?>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php
                    }
                }
            } else {
                ?>
                <div class="item">
                    <div class="item-cnt">
                        <div class="time">
                            No Slot available
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            
        </div>

        <div class="select-datetime-section clearfix">

            <div class="top-header clearfix">
                <div class="left-heading">
                    Select Date & Time
                </div>


                <div class="month">
                    <?php
                    echo $content;
                    ?>                    
                </div>
            </div>
            <div class="box-content day">
                <?php
                echo $day_slider;
                ?>
            </div>    
            <div id="slidertimeslots" class="time">
                <?php
                echo $time_slider;
                ?>                
            </div>
        </div>
        
        <!--<input type="hidden" id="categoryid" name="categoryid" value="< ?=$session->get('categoryid')?>">
        <input type="hidden" id="subcategoryid" name="subcategoryid" value="< ?=$session->get('subcategoryid')?>">-->
        <input type='hidden' id='appointment_minutes' name='appointment_minutes' value="<?=$appointment_minutes?>">
        <input type='hidden' id='appointment_price' name='appointment_price' value="<?=$appointment_price?>">
        <input type='hidden' id='appointment_date' name='appointment_date' value="<?=$appointment_date?>">
        <input type='hidden' id='appointment_time' name='appointment_time' value="<?=$appointment_time?>">
        <!--<input type='hidden' id='appointment_minutes' name='appointment_minutes' value="">
        <input type='hidden' id='appointment_price' name='appointment_price' value="">
        <input type='hidden' id='appointment_date' name='appointment_date' value="">
        <input type='hidden' id='appointment_time' name='appointment_time' value="">-->
        
        <div class="center-block text-center btn-bottom">
            <?=
            Html::submitButton('SELECT LOCATION', [
                'class' => 'btn btn-info btn-lg',
                'name' => 'select_location',
                'id' => 'select_location'
            ]);
            ?>
            <!--<a class="btn btn-info btn-lg" href="location.php">SELECT LOCATION</a>-->
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>
<input type="hidden" id="site_url" name="site_url" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('client/service-package') ?>">
<?php
$this->registerCssFile("@web/css/service-package/service-package.css");
$this->registerJsFile('@web/js/client/service-package.js');
?>