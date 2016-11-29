<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Select Category';
?>
<style>
    div#preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background-color: rgba(0, 0, 0, 0.5);}
    div#preloader img {
        display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20%;
    }    
</style>
<div id="preloader">
    <img src="<?php echo Yii::getAlias('@web');?>/images/ajax-loader.gif">    
</div>
    <!---->
    
<main class="inner-content" id="inner-content">
    <div class="container select-category-section">
        <h1 class="inner-heading"><?= $this->title; ?></h1>
        <div class="inner-subheading">What would you like to schedule today?</div>
        <div class="category-tabs">
            <!-- Nav tabs -->
            <ul class="list-unstyled owl-carousel owl-theme"  role="tablist" id="category_tab">
                <?php
                //echo '<pre/>';
                ///                print_r($returndata);die('...');
                $first_categoryid = 0;
                
                $first_sub_category_id = isset($sub_category_id) ? $sub_category_id : '';
                
                if (!empty($returndata)) {
                    for ($i = 0; $i < count($returndata); $i++) {
                        
                        if($i ==0) {
                            $category_id = $returndata[$i]['category_id'];
                            $first_categoryid = isset($category_id) ? $category_id : $first_categoryid;
                        }
                        
                        $category_name = $returndata[$i]['category_name'];
                        
                        if ($category_name == 'Wellza Bundles') {
                            continue;
                        }
                        $class = !empty($returndata[$i]['class']) ? $returndata[$i]['class'] : '';
                        $controls = !empty($returndata[$i]['controls']) ? $returndata[$i]['controls'] : '';
                        ?>
                        <li role="presentation" class="item <?= ($i == 0) ? 'active' : ''; ?>">
                            <a id="<?=$returndata[$i]['category_id']?>" href="#<?= $controls ?>" aria-controls="<?= $controls ?>" role="tab" data-toggle="tab" class="cat-icon <?= $class ?>">&nbsp;</a>
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
                    <div class="category category-type category-type-slider owl-carousel owl-theme">
                        <!-- Please don't delete this -->   
                        <!-- Data will load here through ajax --> 
                    </div>
                </div>
            </div>
            <?php $form = ActiveForm::begin([
                //'action' => 'book-appointment/load-package',
                'action' => 'book-appointment/load-package',
                'method' => 'post',
                'options' => [
                    'class' => 'form-inline',
                    'id' => 'user_appoinment'
                    ]
            ]);         
            ?>
            <div class="center-block text-center btn-bottom">
                <input type="hidden" id="categoryid" name="categoryid" value="<?=$first_categoryid?>">
                <input type="hidden" id="subcategoryid" name="subcategoryid" value="<?=$first_sub_category_id?>">
                
                <a href="javascript:void(0);" class="btn btn-warning btn-lg showmodel" data-target="" data-toggle="modal">VIEW SERVICE DETAILS</a>
                <!--<a href="javascript:void(0);" class="btn btn-warning btn-lg showmodel">VIEW SERVICE DETAILS</a>-->
                <!--<a href="service-package.php" class="btn btn-info btn-lg">CONTINUE</a>-->
                <?=
                    Html::submitButton('CONTINUE', [
                        'class' => 'btn btn-info btn-lg',
                        'name' => 'continue'
                    ]);
                ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>    
    <input type="hidden" id="resource_path" name="resource_path" value="<?php echo Yii::getAlias('@web');?>">
    <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('client/book-appointment') ?>">
     
    
   
    
</main>
    
<!--<div class="modal inner-modal fade service-detail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="< ?php echo Yii::getAlias('@web');?>/resource/images/cross.png" alt="close"></button>
        </div>

        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <img src="< ?php echo Yii::getAlias('@web');?>/resource/images/service-video.jpg" alt="video" class="img-responsive">
                    <div class="product-detail">
                        <div class="heading">MASSAGE <img src="assets/images/arrow.png" alt="arrow"> <span>BRAIDING</span></div>
                        <p>lorem ipsum tromi kali dolor sit amet, is a wisi enim at i consectetuer adipiscing elit, sed  at cole diam ia is as toi isi a nonummy nibh euismo tincidunt. ut laoreet doloree  magna adipiscing elit a aliquam eas erat volutpat. ut I ise adipiscing elit, sed  at cole diam a ut laoreet doloree  magna adipiscing elit
                            tromi kali dolor sit amet, is a wisi enim at i consectetuer adipiscing elit, sed magna adipiscing elit as.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>-->

<?php $this->registerJsFile('@web/js/client/client.js'); ?>