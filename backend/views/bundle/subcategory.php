<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
$this->title = "Bundle Categories";

$bundle_name = '';
if(!empty($bundle_data)){
    $bundle_name = $bundle_data[0]['bundle_name'];
} 
?>

<main class="content admin-page clearfix" id="content">
            <div class="tabpanel">                    
                <div class="panel-body">
                    <div class="table-container">
                        <div class="panel-heading clearfix"> 
                            <div class="main-heading pull-left">
                                <h4 class=""><?=$bundle_name?></h4>
                                <!--<p class="subline">< ?=$bundle_name?></p>-->
                            </div>
                            
                            <?php
                                echo Yii::$app->view->render('_search',['model' => $model,'search' => $search]);
                            ?>
                            <a title="edit" data-bundle="<?=Yii::$app->getRequest()->getQueryParam('id');?>" data-target=".edit_bundle" data-toggle="modal" href="javascript:void(0);" class="view-more btn btn-info"> ADD/EDIT CATEGORIES</a>
                        </div>
                        
                        <div class="table-responsive sub-category-list admintable02">
                            <?php
                                $site_url = \Yii::$app->urlManager->createUrl('');
                                $categories = $sortlinks->link('services.category_name');
                                $categories = str_replace("index","",$categories);
                                                      
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?=$categories?></th>
                                        <th>IMAGE</th>
                                        <th>PREPARATION</th>
                                        <th>DESCRIPTION</th>                                        
                                        <!--<th>VIEW</th>
                                        <th>ACTION</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         if(!empty($dataprovider)) {
                                            
                                            foreach ($dataprovider as $category_data)
                                            {   
                                                //echo '<pre/>';print_r($category_data);die('..');
                                                $banner = '';
                                                $category_id = !empty($category_data['category_id']) ? $category_data['category_id'] : '';
                                                $category_thumbnail = !empty($category_data->category['category_image']) ? Yii::$app->urlManager->createUrl('/').$category_data->category['category_image'] : '';
                                                //$category_thumbnail = Yii::$app->urlManager->createUrl('/').$category_thumbnail;                                                
                                                $banner_type = !empty($category_data->category['banner_type']) ? $category_data->category['banner_type'] : '';
                                                if($banner_type == "Image") {
                                                    $banner = !empty($category_data->category['banner']) ? Yii::$app->urlManager->createUrl('/').$category_data->category['banner'] : '';
                                                }
                                                if($banner_type == "Video") {
                                                    $banner = !empty($category_data->category['video_thumbnail']) ? Yii::$app->urlManager->createUrl('/').$category_data->category['video_thumbnail']: '';
                                                    //$banner = Yii::$app->urlManager->createUrl('/').$banner;
                                                }                                                
                                                $preparation_status = !empty($category_data->category['preparation_status']) ? $category_data->category['preparation_status'] : '';
                                                $description = !empty($category_data->category['description']) ? $category_data->category['description'] : '';
                                                $category_name = !empty($category_data->category['category_name']) ? $category_data->category['category_name']: '';
                                                $status = !empty($category_data->category['status'])? $category_data->category['status'] : '' ;
                                    ?>
                                     <tr>
                                        <td>
                                            <div class="category-name">
                                                <div class="category-icon">
                                                    <div class="icon">
                                                        <img src="<?= $category_thumbnail?>" alt="hair">
                                                    </div>
                                                </div>
                                                <div class="name">
                                                    <?=$category_name?>
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="category-user-img">
                                                <img src="<?php echo $banner?>" alt="provider06" class="img-circle">
                                            </div>
                                        </td>
                                        <td>
                                            <p class="discrip"><?= yii\helpers\StringHelper::truncate($preparation_status, 70)?></p>
                                        </td>
                                        <td>
                                            <p class="discrip"><?= yii\helpers\StringHelper::truncate($description, 70)?></p>
                                        </td>
                                        <!--<td>
                                            <a href="javascript:void(0);"> 
                                                <div class="view-more">Edit/View More</div>
                                            </a>
                                        </td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    < ?php
                                                        if(!empty($status) && $status == 'Active') {
                                                    ?>
                                                    <input type="checkbox" id="< ?=$category_id?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                    < ?php
                                                        } else {
                                                    ?>
                                                    <input type="checkbox" id="< ?=$category_id?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                    < ?php
                                                        }
                                                    ?>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" name="< ?=$category_id?>" class="delete-btn"><img src="< ?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                                <li>
                                            </ul>
                                        </td>-->
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
                            
                        ]);
                    ?>
                        </div>
                        <!--<div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>-->
                    </div>
                </div>
            </div>

        </main>
        <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('/')?>">
                        
        <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('bundle')?>">

        <!-- Add category section -->
        <?php
            //echo Yii::$app->view->render('_addsubcategory',['model' => $model,'icon_class' => $icon_class]);
        ?>       

        <div class="modal admin-modal fade add-video-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                            
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/cross.png" alt="close"></button>
                           
                        </div>
                        <?php
                        /*
                                echo \wbraganca\videojs\VideoJsWidget::widget([
                                    'options' => [
                                        'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                                        'poster' => "http://www.videojs.com/img/poster.jpg",
                                        'controls' => true,
                                        'preload' => 'auto',
                                        'width' => '970',
                                        'height' => '400',
                                    ],
                                    'tags' => [
                                        'source' => [
                                            ['src' => 'http://vjs.zencdn.net/v/oceans.mp4', 'type' => 'video/mp4'],
                                            ['src' => 'http://vjs.zencdn.net/v/oceans.webm', 'type' => 'video/webm']
                                        ],
                                        'track' => [
                                            ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
                                        ]
                                    ]
                                ]);*/
                            ?>
                       
                    </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="overlay"></div>
        <div id="preloader">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <?php
           
            //Renders add bundle view
            echo Yii::$app->view->render('_add_bundle',['model' => $model,'category' => $category,'bundle' =>  $bundle_name]);

            //Renders edit bundle view
            echo Yii::$app->view->render('_edit_bundle',['model' => $model,'category' => $category ,'bundle' =>$bundle_name]);

            $this->registerCssFile("@web/css/bundle/bundle.css");
            $this->registerJsFile('@web/js/bundle/bundle.js');

        ?>
