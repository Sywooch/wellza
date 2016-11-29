<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: favourite.php
 *  Created: Codian Team
 *  Description: This page will show the list of all the provider's marked as favourite by client.
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'My Favorites';
?>
<main class="inner-content" id="inner-content">
    <div class="container my-favorite-section">
        <div class="my-favorite-list">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="inner-heading"><?=$this->title?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider-img01.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like1" value="like1" checked> 
                                <label for="like1"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider04.png" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like2" id="like2" value="like2" checked> 
                                <label for="like2"><span class="like2"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider05.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like3" id="like3" value="like3" checked> 
                                <label for="like3"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider06.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like4" value="like1" checked> 
                                <label for="like4"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider04.png" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like5" value="like1" checked> 
                                <label for="like5"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider05.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like6" value="like1" checked> 
                                <label for="like6"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider06.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like1" value="like1" checked> 
                                <label for="like1"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 resize-box">
                    <div class="list-box">
                        <div class="img-box check">
                            <div class="provider-image">
                                <img src="assets/images/provider-img01.jpg" class="img-circle img-responsive" alt="provider-image">
                            </div>
                            <span class="checkbox">
                                <input type="checkbox" name="like1" id="like1" value="like1" checked> 
                                <label for="like1"><span class="like"></span> </label>
                            </span>  
                        </div>
                        <div class="provider-info">
                            <div class="provider-name">
                                Kristine Lilly
                            </div>
                            <div class="address">
                                Chapel Hill, New York, United States
                            </div>

                            <div class="rating">
                                <img src="assets/images/rating-star.png" class="img-responsive center-block" alt="">
                                <div class="review">
                                    17 reviews
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="javascript:void(0);" class="loadmore">Load More</a>
        </div>
    </div>   
</div>
</main>
<?php
$this->registerCssFile('@web/css/client/myprofile.css');
$this->registerJsFile('@web/js/client/myprofile.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* * ********************************************************************************************************************************** */
// EOF: favourite.php
/* * ********************************************************************************************************************************** */
?>