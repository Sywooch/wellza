<?php 
 /* * ********************************************************************************************************************* *//**
 *  View Name: _complete.php
 *  Created: Codian Team
 *  Description: List out the completed appointment for the provider.
 * ************************************************************************************************************************* */ 
use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use yii\web\JsExpression;
?>
<div role="tabpanel" class="tab-pane active" id="complete-appointment">
    <div class="row appointment-history-list">
         <?php
            if(!empty($completed)) {
                date_default_timezone_set('Asia/kolkata'); // Remove this on server
                $current_datetime = date('Y-m-d H:i:s');
                $site_url = \Yii::$app->urlManager->createUrl('');
                
                foreach ($completed as $data) {
                    $appointment_datetime = $data->appointment_date.' '.$data->appointment_time; 
                    if($appointment_datetime > $current_datetime) {
                        continue;
                    }
                    
                    $rating_data = common\models\ReviewRating::findOne(['provided_by' => $data->provider_id,'appointment_id' => $data->id,'rating_given_by' => 'Provider']);
                    
                    $rating = isset($rating_data)? $rating_data->rating : '';
                    
                    $user_id = $data->customer_id;
                    $provider_id = $data->provider_id;
                    $profile_image = !empty($data['profile_image']) ? '../'.$data['profile_image'] : Yii::getAlias('@web') . '/images/default-profile.png';
                    $israted = common\models\ReviewRating::findOne(['appointment_id' => $data->id,'rating_given_by' => 'Provider']);
                    $review_array = common\models\ReviewRating::findAll(['provided_to' => $data->customer_id,'rating_given_by' => 'Provider']);
                    $review_count = count($review_array);
                    //$israted = isset($data->reviewRating->status) ? $data->reviewRating->status : ''; 
                    
                    $client_firstname = $data['first_name'];
                    $client_lastname = $data['last_name'];
                                        
                    $address = !empty($data->address1) ? $data->address1 : '';
                    $service_name = !empty($data->package->service->category_name) ? $data->package->service->category_name : '';
                    $duration = !empty($data->appointment_duration) ? $data->appointment_duration : '';
                    $review = '';
                    
                    $service_price = !empty($data->appointment_price) ? $data->appointment_price : '';
                    $service_date = '';
                    if(!empty($data->appointment_date)) {
                        $date=date_create($data->appointment_date);
                        $service_date = date_format($date,"l,M d");
                    } 
                    $service_time = '';
                    if(!empty($data->appointment_time)) {
                        $service_time = date ('H:i a',strtotime($data->appointment_time));                        
                    }
                                        
                    //echo '<pre/>';print_r($data);die('...');
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 box-width">
            <div class="list-box">
                <div class="rebook">
                    <!--<a class="rebook-btn" href="< ?php echo Yii::$app->urlManager->createUrl('/client/book-appointment/'.$data->id)?>">RESCHEDULE</a>-->
                    <!--<a class="rebook-btn cancel_appointment" id="cancel-< ?=$data->id?>" href="javascript:void(0)">CANCEL</a>-->
                    <div class="right">
                        <a class="rebook-btn" href="javascript:void(0);">SUPPORT</a>
                    </div>
                </div>
                <div class="img-box">
                    <div class="provider-image">
                        <img src="<?=$profile_image?>" class="img-circle img-responsive" alt="provider-image">
                    </div>
                    <a class="chat" href="javascript:void(0)"><img src="../resource/images/chat-icon-yellow.png" alt="chat"></a>
                </div>
                <div class="provider-info">
                    <div class="provider-name">
                        <?=$client_firstname.' '.$client_lastname?>
                    </div>
                    <div class="address">
                        <?=$address?>
                    </div>
                    <div class="timing">
                        <?=$service_name.' - '.$duration?>
                    </div>
                    <div class="rating" >
                        <?php
                            if(!empty($israted) && $israted->status == 'rated') {                        
                                // Render a display only rating easily
                                echo StarRating::widget([
                                    'name' => 'rating',
                                    'value' => "{$rating}",
                                    'pluginOptions' => ['displayOnly' => true]
                                ]);
                            ?>
                        <div class="review">
                            <a id="reviewcount-<?=$user_id?>" class="reviewcount" data-toggle="modal" data-target=".rating-list-modal" href="javascript:void(0);"><?=$review_count?> reviews</a>
                        </div>
                        <?php
                        }
                        else {
                        ?>
                        <div>
                            <button id = "userid-<?=$user_id?>" data-appointment_id ="<?=$data->id?>" type="submit" class="btn-success client_id" name="rate_provider" data-toggle="modal" data-target=".rating-popup">Rate Client</button>
                        </div>
                        <div class="review">
                            No reviews
                        </div>
                        <?php
                            }
                        ?>
                        <!--<img src="../resource/images/rating-star.png" class="img-responsive center-block" alt="">-->
                        
                    </div>                    
                    
                </div>

                <div class="price-date-box clearfix">
                    <div class="left">
                        <div class="icon">
                            <img src="../resource/images/wallet-icon.png" alt="wallet">
                        </div>
                        <div class="price-box">
                            <div class="label-info">Services Price </div>
                            <div class="price">$<?=$service_price?></div>
                        </div>

                    </div>
                    <div class="right">
                        <div class="icon">
                            <img src="../resource/images/time-history.png" alt="wallet">
                        </div>
                        <div class="price-box">
                            <div class="label-info"><?=$service_date?></div>
                            <div class="time"><?=$service_time?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
                }
                
            } else {
                echo 'NO Record Found!';
            }
        ?>
        <!--<div class="text-center">
                    <a href="javascript:void(0);" class="loadmore">Load More <i class="fa fa-spinner fa-spin"></i></a>
        </div>-->
    </div>
</div>
<?php
/* * ********************************************************************************************************************************** */
// EOF: _complete.php
/* * ********************************************************************************************************************************** */
