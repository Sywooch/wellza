<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: _rating_review.php
 *  Created: Codian Team
 *  Description: Client can give rating and review to client from here in a pop up view
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
<div class="modal inner-modal fade rating-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
                $form = \yii\widgets\ActiveForm::begin([
                            'action' => 'save-review-rating',
                            'method' => 'post',
                            'options' => [
                                'id' => 'provider_rating_review',                                
                            ],
                ]);
                
                ?>
                <div class="modal-header">
                    <button type="button" class="close review_close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="msg">
                                <h2>Thank You</h2>
                                <p>FOR USING WELLZA</p>
                            </div>

                            <div class="rating">
                                <h2 id="ratecontainer">0.0</h2>
                                <?php
                                    // Usage with ActiveForm and model
                                    echo $form->field($model_review_rating, 'rating')->widget(StarRating::classname(), [
                                        'pluginOptions' => 
                                        [   'showCaption' => true,
                                            'step' => 0.5,
                                            'stars' => 5,
                                            'min' => 0,
                                            'max' => 5,
                                            'defaultCaption' => '0.0',
                                            //'starCaptions' => new JsExpression("function(val){ document.getElementById('rating_value').value = val;return val == null ? document.getElementById('ratecontainer').innerHTML = '0.0' : document.getElementById('ratecontainer').innerHTML = val;}")
                                            'starCaptions' => new JsExpression("function(val){ return val == null ? '0.0' : val;}")
                                        ]
                                        /*,
                                        'pluginEvents' => [
                                            'rating.change' => new JsExpression("function(event, value, caption){console.log(caption);console.log(value);console.log(event)}")
                                        ]*/
                                        
                                    ]);
                                ?>
                                <p>RATE YOUR EXPERIENCE</p>
                            </div>

                            <div class="cmnt">
                                <?=
                                    $form->field($model_review_rating, 'review', [
                                        'template' => "{input}\n{hint}\n{error}"                                        
                                    ])->textarea(['rows' => '5', 'cols' => '6', 'placeholder' => "Leave a comment (optional)", 'class' => "form-control", 'id' => 'client_comment']);
                                ?>
                                <!--<div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Leave a comment (optional)"></textarea>
                                </div>-->
                                <?=
                                    Html::submitButton('SAVE COMMENT', [
                                        'class' => 'btn-success',
                                        'name' => 'save_comment',
                                        'id' => 'save_comment'
                                        //'data-target' => ".thankyou-popup",
                                        //'data-toggle' => "modal",
                                        //'data-dismiss' => "modal"
                                    ]);
                                ?>
                                <!--<a href="" class="btn-success" data-target=".thankyou-popup" data-toggle="modal" data-dismiss="modal">SAVE COMMENT</a>-->
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.modal-content -->
        <input type="hidden" id="rating_value" name="rating_value" value=""/>
        <input type="hidden" id="provided_to" name="provided_to" value=""/>
        <input type="hidden" id="appointment_id" name="appointment_id" value=""/>
        
        <?php ActiveForm::end(); ?>     
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
/* * ********************************************************************************************************************************** */
// EOF: _rating_review.php
/* * ********************************************************************************************************************************** */
