<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = "Sub Categories"
?>

<main class="content admin-page clearfix" id="content">
            <div class="tabpanel">                    
                <div class="panel-body">
                    <div class="table-container">
                        <div class="panel-heading clearfix"> 
                            <div class="main-heading pull-left">
                                <h4 class="">Hair & Make Up</h4>
                                <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                            </div>
                            
                            <?php
                                echo Yii::$app->view->render('_search',['model' => $model,'search' => $search]);
                            ?>
                            <a data-target=".add-subcategory-modal" data-toggle="modal" href="javascript:void(0);" class="btn btn-info inblock"> ADD SUB CATEGORIES</a>
                        </div>
                        <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('/')?>">
                        
                        <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('category')?>">
                        <div class="table-responsive sub-category-list admintable02">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SUB CATEGORIES</th>
                                        <th>IMAGE</th>
                                        <th>PREPARATION</th>
                                        <th>DESCRIPTION</th>                                        
                                        <th>VIEW</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         if(!empty($dataprovider)) {
                                            
                                            foreach ($dataprovider as $category)
                                            {   //echo '<pre/>';print_r($category);die('...');
                                                $category_id = !empty($category->category_id) ? $category->category_id : '';
                                                $category_thumbnail = !empty($category->category_thumbnail) ? $category->category_thumbnail : '';
                                                $category_thumbnail = Yii::$app->urlManager->createUrl('/').$category_thumbnail;                                                
                                                $banner_type = !empty($category->banner_type) ? $category->banner_type : '';
                                                if($banner_type == "Image") {
                                                    $banner = !empty($category->banner) ? $category->banner : '';
                                                    $banner = Yii::$app->urlManager->createUrl('/').$banner;
                                                }
                                                if($banner_type == "Video") {
                                                    $banner = !empty($category->video_thumbnail) ? $category->video_thumbnail: '';
                                                    $banner = Yii::$app->urlManager->createUrl('/').$banner;
                                                }                                                
                                                $preparation_status = !empty($category->preparation_status) ? $category->preparation_status : '';
                                                $description = !empty($category->description) ? $category->description : '';
                                                $category_name = !empty($category->category_name) ? $category->category_name: '';
                                                $status = !empty($category->status)? $category->status : '' ;
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
                                        <td>
                                            <a href="javascript:void(0);" class="view-more"> 
                                                
                                                <div id="<?=$category_id?>" class="color-green" data-target=".add-subcategory-modal" data-toggle="modal">View More</div>
                                            </a>
                                        </td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <?php
                                                        if(!empty($status) && $status == 'Active') {
                                                    ?>
                                                    <input type="checkbox" id="<?=$category_id?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <input type="checkbox" id="<?=$category_id?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                    <?php
                                                        }
                                                    ?>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" name="<?=$category_id?>" class="delete-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                                <li>
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
                        </div>
                        <div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>
                    </div>
                </div>
            </div>

        </main>


        <!-- Add category section -->
        <?php
            echo Yii::$app->view->render('_addsubcategory',['model' => $model,'icon_class' => $icon_class]);
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

