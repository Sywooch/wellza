<?php
/************************************************************************************************************************//**
 *  View Name: Service.php
 *  Created: Codian Team
 *  Description: Service Provider can add services from here.If the service is not availble then he can request for service
 * to admin. 
 ***************************************************************************************************************************/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
?>
<!--Below loader image will show on ajax call-->
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web');?>/images/ajax-loader.gif">    
</div>
<main class="inner-content" id="inner-content">
    <div class="container select-category-section">
        <h1 class="inner-heading">Add Service</h1>
        <div class="inner-subheading">Please add services you offer</div>
         <?php $form = ActiveForm::begin([
                'action' => 'service/add-service',
                'method' => 'post',
                'options' => [
                    'id' => 'add_service'
                    ]
            ]);         
            ?>
        <div class="category-tabs add-category-tabs">
            <?php if (Yii::$app->session->hasFlash('service_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('service_message') ?>
                        </div>
            <?php endif; ?>
            <!-- Nav tabs -->
            <ul class="list-unstyled nav nav-tabs owl-carousel owl-theme" role="tablist" id="category_tab">
                <?php
                    $first_categoryid = 0;
                    if (!empty($returndata)) {
                        for ($i = 0; $i < count($returndata); $i++) {
                            if($i ==0) {
                                $first_categoryid = $returndata[$i]['category_id'];
                            }

                            $category_name = $returndata[$i]['category_name'];

                            if ($category_name == 'Wellza Bundles') {
                                continue;
                            }
                            $class = !empty($returndata[$i]['class']) ? $returndata[$i]['class'] : '';
                            $controls = !empty($returndata[$i]['controls']) ? $returndata[$i]['controls'] : '';
                    ?>
                    <li role="presentation" class="item <?= ($i == 0) ? 'active' : ''; ?>">
                        <!--<a href="#hair-makeup" aria-controls="hair-makeup" role="tab" data-toggle="tab" class="cat-icon hair-icon">

                        </a>-->
                        <a id="<?=$returndata[$i]['category_id']?>" href="#<?= $controls ?>" aria-controls="<?= $controls ?>" role="tab" data-toggle="tab" class="cat-icon <?= $class ?>"></a>
                        <div class="cat-name"><?= $category_name ?></div>
                    </li>
                    <?php
                        }
                    } else {
                        echo 'No Category Found!!';
                    }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="category_contents">
                    <div class="category category-type category-type-slider  owl-carousel owl-theme">
                        <!-- Please don't delete this section -->   
                        <!-- Data will load here through ajax -->
                    </div>
                </div>  
            </div>
            <input type="hidden" id="service_id" name="service_id" value="<?=$first_categoryid?>">
            <input type="hidden" id="sub_service_id" name="sub_service_id" value="">
            <div class="center-block text-center btn-bottom">
                <!--<a  href="service-package.php" class="btn btn-info btn-lg">Add Service</a>-->
                <?=
                    Html::submitButton('Add Service', [
                        'class' => 'btn btn-info btn-lg',
                        'name' => 'add_servicebtn',
                        'id' => 'add_servicebtn',
                    ]);
                ?>
                <?=
                    Html::submitButton('Add', [
                        'class' => 'btn btn-primary btn-lg',
                        'name' => 'continue',
                        'data-target' => ".request-service",
                        'data-toggle' => 'modal',
                        'id' => 'add_btn'
                        
                    ]);
                ?>
                <!--<a href="service-package.php" class="btn btn-primary btn-lg" data-target=".request-service" data-toggle='modal'>Add</a>-->
            </div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</main>
<input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('provider/service') ?>">
<?php
    //Renders view request for service
    echo Yii::$app->view->render('_request_service',['model' => $request_service]);        
?>
<?php 
$this->registerCssFile('@web/css/provider/provider.css');
$this->registerJsFile('@web/js/provider/client.js');

/*************************************************************************************************************************************/
// EOF: service.php
/*************************************************************************************************************************************/
?>