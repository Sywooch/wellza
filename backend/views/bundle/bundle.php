<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = "Wellza Bundle";
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?= $this->title; ?></h4>
                    </div>

                    <div class="search-box">
                        <?php
                            echo Yii::$app->view->render('_search',['model' => $model,'search' => $search]);
                        ?>
                        <a title="ADD NEW WELLZA BUNDLE" data-target=".add_bundle" data-toggle="modal" href="javascript:void(0);" class="btn btn-info">ADD NEW WELLZA BUNDLE</a>
                    </div>
                </div>

                <div class="table-responsive admintable02 admin-wellza-package">
                    <?php
                        $site_url = \Yii::$app->urlManager->createUrl('');
                        
                        $bundle_name = $sortlinks->link('bundle_name');
                        $bundle_name = str_replace("index","",$bundle_name);
                        $price = $sortlinks->link('price');
                        $price = str_replace("index","",$price);                        
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$bundle_name?></th>
                                <th>TOTAL MAIN CATGORIES</th>
                                <th>TOTAL SAVINGS</th>                                        
                                <th><?=$price?></th>
                                <th>VIEW</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($dataprovider)) {
                                    //echo '<pre/>';print_r($dataprovider);die();
                                    foreach ($dataprovider as $data) {
                                        $category_count = count($data->bundleCategories);
                                        
                                        //echo '<pre/>';print_r($data);die;
                                        
                                        $package_name = !empty($data->bundle_name) ? $data->bundle_name : '';
                                        $savings = !empty($data->savings) ? $data->savings : '';
                                        $price = !empty($data->price) ? $data->price : '';
                                        $status = !empty($data->status) ? $data->status : '';                                   
                                
                            ?>
                            <tr>
                                <td>
                                    <div class="category-name">
                                        
                                        <a title="<?=$package_name?> " href="<?php echo Yii::$app->urlManager->createUrl('bundle/subcategories') ?>/<?= $data->bundle_id ?>"> 
                                            <?=$package_name?> 
                                        </a>
                                    </div> 
                                </td>
                                <td>
                                    <span class="cate-no color-666"><?=sprintf("%02d\n", $category_count);?></span>
                                    <div>Categories</div>
                                </td>
                                <td><?=sprintf("%2d%%",$savings)?></td>
                                <td><?=$price?></td>
                                <td>
                                    <a title="edit" data-bundle="<?=$data->bundle_id?>" data-target=".edit_bundle" data-toggle="modal" href="javascript:void(0);" class="view-more"> 
                                        <img src="<?=$site_url?>resource/images/plus-green.png" alt="plus">
                                        <div class="color-green">Edit</div>
                                    </a>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li>
                                        <?php if($status == 'Active')
                                        {
                                            ?>
                                            <input title="Enable" id="<?=$data->bundle_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="Enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                        <?php
                                        } else {
                                            ?>
                                            <input title="Disable" id="<?=$data->bundle_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="Disable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                            <?php
                                        }?>
                                        </li>
                                        <li>
                                            <a title="delete" id="<?=$data->bundle_id?>" href="<?php echo Yii::$app->urlManager->createUrl('bundle').'/delete-bundle/'.$data->bundle_id?>" class="delete-btn"><img src="<?=$site_url?>resource/images/delete-icon-btn.png"></a>
                                        <li>
                                        <li><span id="loader-<?=$data->bundle_id?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>    
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                    }
                                } else {
                                    echo '<tr>No Record Found</tr>';
                                }
                            ?>                            
                        </tbody>     

                    </table>
                    <?php
                        echo \yii\widgets\LinkPager::widget([
                            'pagination'=>$pagination
                            
                        ]);?>
                </div>                
            </div>
        </div>
    </div>
    <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('bundle') ?>">
    <div class="overlay"></div>
    <div id="preloader">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
    <?php
        //Renders add bundle view
        echo Yii::$app->view->render('_add_bundle',['model' => $model,'category' => $category ]);

        //Renders edit bundle view
        echo Yii::$app->view->render('_edit_bundle',['model' => $model,'category' => $category ]);
    ?>
</main>

<?php
$this->registerCssFile("@web/css/bundle/bundle.css");
$this->registerJsFile('@web/js/bundle/bundle.js');
?>