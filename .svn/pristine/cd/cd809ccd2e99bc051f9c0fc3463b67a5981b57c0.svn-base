<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: my-availability.php
 *  Created: Codian Team
 *  Description: Provider can view his profile from here.
 * ************************************************************************************************************************* */

use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
?>
<!--Below loader image will show on ajax call-->
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web');?>/images/ajax-loader.gif">    
</div>
<main class="inner-content" id="inner-content" style="height: 100%;">
            <div class="container">
                <h1 class="inner-heading">My Availability</h1>
            </div>
            <div class="container" style="height:100%;">
                <div class="schedule_calender clearfix">
                    <div class="col-md-9 calendar left">
                        <div id="cal_here" class="" style='text-align: center;'>
                        </div>
                    </div>

                    <div id="scheduler_here" class="dhx_cal_container right col-md-3" style='height:100%;'>
                        <div style="width: 100%;" title="Add" id="adevent" class="icon_add">Add Event</div>
                        <div class="dhx_cal_navline">
                            <div class="dhx_cal_date"></div>
                        </div>
                        <div class="dhx_cal_header">
                        </div>
                        <div class="dhx_cal_data">
                        </div>
                    </div>  
                </div>
            </div>
        </main>
        <div class="clearfix"></div>
        <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
        <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('provider/my-availability') ?>">
<?php

$this->registerCssFile('@web/css/provider//dhtmlxscheduler.css');
$this->registerCssFile('@web/css/provider/my-availability.css');
$this->registerJsFile('@web/js/provider/dhtmlxscheduler.js');
$this->registerJsFile('@web/js/provider/dhtmlxscheduler_minical.js');
$this->registerJsFile('@web/js/provider/my-availability.js');

/* * ********************************************************************************************************************************** */
// EOF: my-availability.php
/* * ********************************************************************************************************************************** */