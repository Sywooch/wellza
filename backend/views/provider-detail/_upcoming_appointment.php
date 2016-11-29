<?php
 /* * ********************************************************************************************************************* *//**
 *  View Name: _upcoming_appointment.php
 *  Created: Codian Team
 *  Description: List out the upcoming appointment for the provider.
 * ************************************************************************************************************************* */ 
use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use yii\web\JsExpression;

if (!empty($upcoming)) {
    date_default_timezone_set('Asia/kolkata'); // Remove this on server
    $current_datetime = date('Y-m-d H:i:s');

    $site_url = \Yii::$app->urlManager->createUrl('');
    $i = 0;
    foreach ($upcoming as $data) {
        
        if ($i % 3 == 0 && $i != 0) {
            echo '</div><div class="row">';
        }
        $appointment_datetime = $data->appointment_date . ' ' . $data->appointment_time;
        if ($appointment_datetime < $current_datetime) {
            continue;
        }
        $rating_data = common\models\ReviewRating::findOne(['provided_by' => $data->customer_id, 'appointment_id' => $data->id, 'rating_given_by' => 'Client']);
        $rating = isset($rating_data) ? $rating_data->rating : '';
        $user_id = $data->customer_id;
        $provider_id = $data->provider_id;
        
        $profile_image = ($data['profile_image_thumb'] !='') ? '../' . $data['profile_image_thumb'] : Yii::getAlias('@web') . '/images/default-profile.png';
        
        $review_array = common\models\ReviewRating::findAll(['provided_to' => $data->provider_id, 'rating_given_by' => 'Client']);
        $review_count = count($review_array);
        $provider_firstname = $data['first_name'];
        $provider_lastname = $data['last_name'];

        $address = !empty($data->address1) ? $data->address1 : '';
        $service_name = !empty($data->package->service->category_name) ? $data->package->service->category_name : '';
        $duration = !empty($data->appointment_duration) ? $data->appointment_duration : '';

        $review = '';

        $service_price = !empty($data->appointment_price) ? $data->appointment_price : '';
        $service_date = '';
        if (!empty($data->appointment_date)) {
            $date = date_create($data->appointment_date);
            $service_date = date_format($date, "l,M d");
        }
        $service_time = '';
        if (!empty($data->appointment_time)) {
            $service_time = date('H:i a', strtotime($data->appointment_time));
        }
?>
<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="list-box">
        <div class="img-box">
            <div class="provider-image">
                <img src="<?=$profile_image?>" class="img-circle img-responsive" alt="provider-image">
            </div>
        </div>
        <div class="provider-info">
            <div class="provider-name">
                <?=$provider_firstname.' '.$provider_lastname?>
            </div>
            <div class="address">
               <?=$address?>
            </div>
            <div class="timing">
                <?=$service_name.' - '.$duration?>
            </div>
            <div class="rating">
                        <?php
                        if (!empty($rating_data) && $rating_data->status == 'rated') {
                            // Render a display only rating easily
                            echo StarRating::widget([
                                'name' => 'rating',
                                'value' => "{$rating}",
                                'pluginOptions' => ['displayOnly' => true]
                            ]);
                            ?>
                            <div class="review">
                                <a id="reviewcount-<?= $provider_id ?>" class="reviewcount" data-toggle="modal" data-target=".rating-list-modal" href="javascript:void(0);"><?= $review_count ?> reviews</a>
                            </div>
                            <?php
                        } else {
                            ?>

                            <div class="review">
                                No reviews
                            </div>
                            <?php
                        }
                        ?>                        
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
    echo '<h1>No Record Found!</h1>';
}

/* * ********************************************************************************************************************************** */
// EOF: _upcoming_appointment.php
/* * ********************************************************************************************************************************** */
?>
