<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: appointment.php
 *  Created: Codian Team
 *  Description: Client can see his completed and upcoming appointments from there.Client can give rating and review to the 
 * provider. 
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
?>
<main class="inner-content" id="inner-content">
    <div class="container apponintment-history-section">
        <h1 class="inner-heading">Appointments</h1>

        <div class="wellzabundle-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#complete-appointment" id="tab_1" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                        COMPLETED
                    </a>
                </li>
                <li role="presentation">
                    <a href="#upcoming-appointment" id="tab_2" aria-controls="training" role="tab" data-toggle="tab">
                        UPCOMING
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                    //Renders completed appointments for client
                    echo Yii::$app->view->render('_complete',['model' => $model,'completed' => $completed]);        
                ?>
                <?php
                    //Renders upcoming appointments for client
                    echo Yii::$app->view->render('_upcoming',['model' => $model,'upcoming' => $upcoming]);        
                ?>
                <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
                <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('client/appointment') ?>">
            </div>
        </div>
    </div>    
    <?php
        //Renders feedback page for client
        echo Yii::$app->view->render('_feedback',['model' => $model]);        
    ?>
    <!-- xxxxxxx -->
    <?php
        //Renders rating and review page for client
        echo Yii::$app->view->render('_rating_review',['model_review_rating' => $model_review_rating]);        
    ?>
    <?php
        //Renders rating and review list page for client
        echo Yii::$app->view->render('_rating_review_list',['model' => $model]);        
    ?>

</main>
<?php

//$this->registerCssFile('@web/css/provider//dhtmlxscheduler.css');
$this->registerCssFile('@web/css/client/appointment.css');
$this->registerJsFile('@web/js/client/appointment.js');
//$this->registerJsFile('@web/js/provider/dhtmlxscheduler_minical.js');
//$this->registerJsFile('@web/js/provider/my-availability.js');

/* * ********************************************************************************************************************************** */
// EOF: appointment.php
/* * ********************************************************************************************************************************** */
