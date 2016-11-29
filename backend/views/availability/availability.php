<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: Availability.php
 *  Created: Codian Team
 *  Description: Service Provider availability is viewed here.This list out all the slots accodring to the date
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
$this->title = 'Service Provider Availability';
?>
<!--Below loader image will show on ajax call-->
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web'); ?>/images/ajax-loader.gif">    
</div>
<main class="content admin-page clearfix" id="content" style="height: 100%;">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container" style="min-height:auto;">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?=$this->title?></h4>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="schedule_calender clearfix">
        <section class="appointment_section">
            <div class="serviceproviderlist_slider owl-carousel owl-theme" id="serviceproviderlist_slider">
                <?php
                    $first_provider_id = '';
                    if(!empty($returdata)) {
                        $i=0;
                        $site_url = \Yii::$app->urlManager->createUrl('');
                        foreach($returdata as $data) {
                            if($i==0) {
                                $first_provider_id = $data->id; 
                            }
                            $i++;
                            $profile_image = !empty($data->profile_image) ? '../'.$data->profile_image : $site_url . '/images/default-profile.png';
                            $first_name = !empty($data->first_name) ? $data->first_name : '';
                            $last_name = !empty($data->last_name) ? $data->last_name : '';
                            $full_name = $first_name.' '.$last_name;
                ?>
                <div id="<?=$data->id?>" class="item av_provider_id">
                    <div class="img_box">
                        <img src="<?=$profile_image?>" alt="img"/>
                    </div>
                    <div class="name">
                        <?=$full_name?>
                    </div>
                </div>                
                <?php
                        }
                    } else {
                        echo '<div class="item">No Data Available</div>';
                    }
                ?>
            </div>
        </section>
        <div id="calenderview_provider" style="height: 100%;">
            <?php
            //Renders add bundle view
            echo Yii::$app->view->render('_calender',['returdata' => $returdata ]);
            ?>
        </div>  
    </div>
</main>
 <div class="clearfix"></div>
 <input type="hidden" id="providerid" name="providerid" value="<?=$first_provider_id ?>">
<input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('availability') ?>">

<?php
$this->registerCssFile('@web/css/availability/dhtmlxscheduler.css');
$this->registerJsFile('@web/js/availability/dhtmlxscheduler.js');
$this->registerJsFile('@web/js/availability/dhtmlxscheduler_minical.js');
$this->registerCssFile('@web/css/availability/availability.css');
$this->registerJsFile('@web/js/availability/availability.js');

/* * ********************************************************************************************************************************** */
// EOF: Availability.php
/* * ********************************************************************************************************************************** */
?>
