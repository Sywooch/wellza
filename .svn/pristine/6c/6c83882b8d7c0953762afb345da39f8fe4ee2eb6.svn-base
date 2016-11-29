<?php 
/* * ********************************************************************************************************************* *//**
 *  View Name: _rating_review_list.php
 *  Created: Codian Team
 *  Description: This will show the review and rating list for the provider given client
 * ************************************************************************************************************************* */
use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
use yii\web\JsExpression;
?>
<!--Below loader image will show on ajax call-->
<div class="preloader">
    <img src="<?php echo Yii::getAlias('@web');?>/images/ajax-loader.gif">    
</div>
<div class="modal inner-modal fade rating-list-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
            <div class="modal-body">
                <div id="reviewsdata" class="reviews ">                    

                </div>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
/* * ********************************************************************************************************************************** */
// EOF: _rating_review_list.php
/* * ********************************************************************************************************************************** */
