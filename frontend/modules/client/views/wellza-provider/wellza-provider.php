<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
use kartik\rating\StarRating;
use yii\web\JsExpression;

$this->title = 'Select Wellza Provider';
?>
<main class="inner-content top-bg-map" id="inner-content">
    <div class="container wellza-provider-section">
        <h1 class="inner-heading"><?=$this->title?></h1>
        <div class="top-headline clearfix">
            <div class="left">
                <span class="show-result">Showing <?=count($dataprovider)?> Results</span>
            </div>
            <!--<div class="right">
                <a href="javascript:void(0);"> <img src="resource/images/location-icon.png" alt="location-icon"> MAP</a>
            </div>-->
        </div>

        <div class="wellza-provider-list">
            <div class="row">
                <?php
                    if(!empty($dataprovider)) {
                        
                        $i=1;  
                        foreach($dataprovider as $data) {
                            $rating_total = 0;
                            $rating_count = 0;
                            $average_rating = '';
                            $review_count = 0;    
                            $checked = '';
                            $favourite = \common\models\FavouriteList::findOne(['provider_id' => $data->id]);
                            if(!empty($favourite) && $favourite->status == 'Active') {
                                $checked = 'checked = checked';
                            }
                            $rating_data = \common\models\ReviewRating::findAll(['provided_to' => $data->id]);
                            //echo '<pre/>'; print_r($rating_data);die('...'); 
                            if(!empty($rating_data)) {
                               for($j=0;$j<count($rating_data);$j++) {
                                   $rating_total = $rating_total + $rating_data[$j]['rating']; 
                                   $rating_count++;
                                   if(!empty($rating_data[$j]['review'])) {
                                       $review_count++;
                                   }
                               }
                               $average_rating = $rating_total/$rating_count;
                           }
                ?>
                <div class="col-lg-4 col-md-6 col-sm-6 resize-box align">
                    <div class="list-box">
                        <div class="info-photo-video">
                            <span class="photo">0 Photo</span>
                            <span class="video">0 Video</span>
                        </div>
                        <div class="img-box">
                            <div class="provider-image">
                                <img src="<?= Yii::getAlias('@web').'/'.$data->profile_image?>" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" <?=$checked?> name="like" id="like<?=$i?>" value="<?=$data->id?>"> 
                                <label for="like<?=$i?>"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                <?=$data->first_name.' '.$data->last_name?>
                            </div>
                            <div class="address">
                                <?=$data->address?>
                            </div>
                            <div class="rating">
                                <?php
                                    if(!empty($average_rating)) {
                                        // Render a display only rating easily
                                        echo StarRating::widget([
                                            'name' => 'rating',
                                            'value' => "{$average_rating}",
                                            'pluginOptions' => ['displayOnly' => true]
                                        ]);
                                    }        
                                ?>
                                <!--<img src="../resource/images/rating-star.png" class="img-responsive center-block" alt="">-->
                                
                                    <?php
                                        if(!empty($review_count)) {?>
                                         <a id="reviewcount-<?=$data->id?>" class="reviewcount review" data-toggle="modal" data-target=".rating-list-modal" href="javascript:void(0);"><?=$review_count?> reviews</a>        
                                    <?php
                                    } else {
                                        echo 'No review';
                                    }
                                    ?>                                   
                                
                            </div>
                        </div>
                        <div class="book-appointment">
                            <a class="btn btn-block" href="<?php echo Yii::$app->urlManager->createUrl('client/provider-detail').'/'.$data->id ?>">BOOK APPOINTMENT</a>
                        </div>
                    </div>
                </div>
                <?php
                        $i++;
                      }
                    }
                ?>                
            </div>
        </div>

    </div>   
    <?php
        //Renders rating and review list page for client
        echo Yii::$app->view->render('_rating_review_list');        
    ?>
</main>
<input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('client/wellza-provider') ?>">
<?php
$this->registerJsFile("@web/js/client/wellza-provider.js");
$this->registerCssFile("@web/css/client/wellza-provider.css");
?>