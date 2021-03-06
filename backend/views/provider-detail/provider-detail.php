<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: provider-detail.php
 *  Created: Codian Team
 *  Description: Admin can edit the providers profile.He can also see the providers portfolio,appointments,sales history
 * Customer List,Service offered by him,providers availability,providers employee info
 * ************************************************************************************************************************* */
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
$this->title = 'Service Provider';
?>
<main class="content clearfix admin-page admin-service-provider" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class="">Service Provider</h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                </div>
                <?php
                    //$profile_thumb = !empty($data->profile_image_thumb) ? Yii::$app->urlManager->createUrl('/').$data->profile_image_thumb : \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');
                    $profile_thumb = !empty($data->profile_image_thumb) ? Yii::$app->urlManagerFrontEnd->baseUrl.'/'.$data->profile_image_thumb : \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');
                    /*$city_name = '';
                    $province_name = '';
                    if(!empty($data->city)) {
                        $city_data = \common\models\MasterCities::getCitiesByName($data->city); 
                        
                        $city_name = !empty($city_data->city_name) ? $city_data->city_name : '';
                    } 
                    if(!empty($data->province)) {
                        $province_data = \common\models\MasterStates::getProvinceName($data->province);
                        $province_name = !empty($province_data->state_name) ? $province_data->state_name : '';
                    }*/
                    $dob = '';
                                                
                    if(!empty($data->birth_date)) {
                        $birthdate = explode('-', $data->birth_date);
                        $dob = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];                                                    
                    }
                    
                    $experience = '';
                    
                    if(!empty($data->experience_in_year)) {
                        $experience .= $data->experience_in_year.' Years '; 
                                
                    }
                    
                    if(!empty($data->experience_in_month)) {
                        $experience .= $data->experience_in_month.' Month'; 
                                
                    }
                ?>  
                <div class="customer-detail">
                    <?php if (Yii::$app->session->hasFlash('customer_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('customer_message') ?>
                        </div>
                    <?php endif; ?> 
                    <div class="clearfix">
                    <a class="edit-btn text-center btn-info btn pull-right" href="javascript:void(0);" data-target=".edit-customerdetail-modal" data-toggle="modal">Edit</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-ms-3 col-sm-3 text-center">
                            <div class="customer-left">
                                <div class="customer-image">
                                    <img src="<?=$profile_thumb?>" alt="customer-image" class="img-circle img-responsive" align="left">
                                </div>
                                <ul class="list-unstyled">
                                    <li class="name"><?= $data->first_name . ' ' . $data->last_name ?></li>
                                    <li class="wellza-member">Wellza member</li>
                                    <li>
                                        <?php if ($data->status == 10) { ?>
                                            <input id="<?=$data->id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="Enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                            <?php } else {
                                            ?>
                                            <input id="<?=$data->id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="Disable" data-on-text="&nbsp;" data-off-text="&nbsp;"/>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- xxx -->

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="user-text-detail">
                                <div class="text-gray">First Name: <span><?= $data->first_name ?></span></div>
                                <div class="text-gray">Last Name: <span><?= $data->last_name ?></span></div>
                                <div class="text-gray">Gender: <span><?= $data->gender ?></span></div>
                                <div class="text-gray">Birth Date: <span><?= $dob ?></span></div>
                                <div class="text-gray">Year of Exprience: <span><?=$experience?></span></div>
                                <div class="text-gray">Mobile Number:  <span>+1<?= $data->cell_phone ?></span></div>
                                <div class="text-gray">Address 01:  <span><?= $data->address ?></span></div>
                            </div>
                        </div>

                        <!-- xxxx -->

                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="user-text-detail">                                
                                <div class="text-gray">Address 02:  <span><?= $data->address2 ?></span></div>
                                <div class="text-gray">Province:  <span><?= $data->province ?></span></div>
                                <div class="text-gray">City: <span><?= $data->city ?></span></div>
                                <div class="text-gray">Zip Code: <span><?= $data->postal_code ?></span></div>
                                <div class="text-gray">Country: <span><?= $data->country ?></span></div>
                                <div class="text-gray">About Me: <span><?= $data->about_me?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#customer-list" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                CUSTOMERS LIST
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#product" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                PRODUCT
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#service-offer" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                SERVICE OFFER
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#portfolio" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                PORTFOLIO
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#availivility" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                AVAILABILITY
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">APPOINTMENTS</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#complete-appointments" data-toggle="tab">COMPLETED</a></li>
                                <li><a href="#upcoming-appointments" data-toggle="tab">UPCOMING</a></li>
                            </ul>
                        </li>
                        <li role="presentation">
                            <a href="#sales-history" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                SALES HISTORY
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#employee-info" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                EMPLOYEE INFO
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="customer-list">
                            <div class="service-provider-list">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table main-provider-table">
                                                <tr>
                                                    <td class="pad">
                                                        <table class="table data-table">
                                                            <tr>
                                                                <td colspan="8" class="table-user-wrap">
                                                                    <div class="user-img"><img src="../resource/images/provider06.jpg" alt="user-img" class="img-circle  img-responsive" align="left"></div>
                                                                    <div class="user-detail">
                                                                        <p class="name">Morli Smith</p>
                                                                        <p class="address">Chapel Hill, New York, United States</p>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/makeup-ic.png" alt="makeup-ic"> MAKEUP</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="clr-6">Payment Return</span></td>
                                                                <td valign="middle"><span class="clr-6">Net Banking</span></td>
                                                                <td valign="middle"><span class="clr-6">No Coupon/Gift Card</span></td>
                                                                <td valign="middle"><span class="cancle">Cancelled</span></td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/facial-ic.png" alt="facial-ic"> FACIAL</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                <td valign="middle"><span class="done">Credit Card</span></td>
                                                                <td valign="middle"><span class="done">GC - 2569FCB2013</span></td>
                                                                <td valign="middle"><span class="done">Done</span></td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/haircut-ic.png" alt="haircut-ic"> MAKEUP</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                <td valign="middle"><span class="done">Debit Card</span></td>
                                                                <td valign="middle"><span class="done">GC - 256GTY01COP - 360LTO26</span></td>
                                                                <td valign="middle"><span class="done">Done</span></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <!-- xxxx -->

                                                <tr>
                                                    <td class="pad">
                                                        <table class="table data-table">
                                                            <tr>
                                                                <td colspan="8" class="table-user-wrap">
                                                                    <div class="user-img"><img src="../resource/images/provider06.jpg" alt="user-img" class="img-circle  img-responsive" align="left"></div>
                                                                    <div class="user-detail">
                                                                        <p class="name">Morli Smith</p>
                                                                        <p class="address">Chapel Hill, New York, United States</p>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/makeup-ic.png" alt="makeup-ic"> MAKEUP</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="clr-6">Payment Return</span></td>
                                                                <td valign="middle"><span class="clr-6">Net Banking</span></td>
                                                                <td valign="middle"><span class="clr-6">No Coupon/Gift Card</span></td>
                                                                <td valign="middle"><span class="cancle">Cancelled</span></td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/facial-ic.png" alt="facial-ic"> FACIAL</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                <td valign="middle"><span class="done">Credit Card</span></td>
                                                                <td valign="middle"><span class="done">GC - 2569FCB2013</span></td>
                                                                <td valign="middle"><span class="done">Done</span></td>
                                                            </tr>

                                                            <tr class="user-detail-tr">
                                                                <td valign="middle"><span class="category"><img src="../resource/images/haircut-ic.png" alt="haircut-ic"> MAKEUP</span></td>
                                                                <td valign="middle"><img src="../resource/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                <td valign="middle"><strong>$ 90.00</strong></td>
                                                                <td valign="middle"><span class="review">26 Review </span><img src="../resource/images/rating-ic.png" alt="rating"></td>
                                                                <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                <td valign="middle"><span class="done">Debit Card</span></td>
                                                                <td valign="middle"><span class="done">GC - 256GTY01COP - 360LTO26</span></td>
                                                                <td valign="middle"><span class="done">Done</span></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </table>
                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="loadmore">Load More <i class="fa fa-spinner fa-spin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="product">
                            <div class="row product-status-list">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name">
                                                    MOROCAA FACIAL
                                                </li>
                                                <li class="price">
                                                    <span class="new-price">$50.00</span>/<span class="old-price">$60.00</span>
                                                </li>
                                                <li class="status return">
                                                    RETURNED
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                                <a href="javascript:void(0);" class="loadmore">Load More <i class="fa fa-spinner fa-spin"></i></a>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="service-offer">
                            <div class="table-responsive admintable02 serice-offer-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>CATEGORIES</th>
                                            <th>SUB CATEGORIES</th>
                                            <th>SELECT SUB CATEGORIES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="category-name">
                                                    <div class="category-icon">
                                                        <div class="icon">
                                                            <img src="../resource/images/hair-icon.png" alt="hair">
                                                        </div>
                                                    </div>
                                                    <div class="name">
                                                        Hair & Make Up
                                                    </div>
                                                </div> 
                                            </td>
                                            <td>
                                                <span class="cate-no color-666">14</span>
                                                <div>Sub Categories</div>
                                            </td>
                                            <td>
                                                <span class="cate-no color-orange">14</span>
                                                <div>Sub Categories</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="category-name">
                                                    <div class="category-icon">
                                                        <div class="icon">
                                                            <img src="../resource/images/nails-icon.png" alt="hair">
                                                        </div>
                                                    </div>
                                                    <div class="name">
                                                        Nails
                                                    </div>
                                                </div> 
                                            </td>
                                            <td>
                                                <span class="cate-no color-666">12</span>
                                                <div>Sub Categories</div>
                                            </td>
                                            <td>
                                                <span class="cate-no color-orange">5</span>
                                                <div>Sub Categories</div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <div class="category-name">
                                                    <div class="category-icon">
                                                        <div class="icon">
                                                            <img src="../resource/images/massage-icon.png" alt="hair">
                                                        </div>
                                                    </div>
                                                    <div class="name">
                                                        Massage
                                                    </div>
                                                </div> 
                                            </td>
                                            <td>
                                                <span class="cate-no color-666">12</span>
                                                <div>Sub Categories</div>
                                            </td>
                                            <td>
                                                <span class="cate-no color-orange">5</span>
                                                <div>Sub Categories</div>
                                            </td>
                                        </tr> 
                                    </tbody>   
                                </table>
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="loadmore">Load More <i class="fa fa-spinner fa-spin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="portfolio">
                            <?php
                                //Renders edit detail pop up for customer
                                echo Yii::$app->view->render('_portfolio',['model' => $model,'portfolios' => $portfolios]);
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="availivility">
                            <img src="../resource/images/calender.jpg" class="img-responsive" alt="calender">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="complete-appointments">
                            <div class="appointment-history-list">
                                <div class="row">
                                    <?php
                                        //Renders completed appointments detail
                                        echo Yii::$app->view->render('_completed_appointment',['model' => $model,'completed' => $completed]);
                                    ?>
                                    <!--<div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="list-box">
                                            <div class="img-box">
                                                <div class="provider-image">
                                                    <img src="../resource/images/provider-img01.jpg" class="img-circle img-responsive" alt="provider-image">
                                                </div>
                                            </div>
                                            <div class="provider-info">
                                                <div class="provider-name">
                                                    Kristine Lilly
                                                </div>
                                                <div class="address">
                                                    Chapel Hill, New York, United States
                                                </div>
                                                <div class="timing">
                                                    Hair & Make up - 90 MINUTES - 3 MILES
                                                </div>
                                                <div class="rating">
                                                    <img src="../resource/images/rating-star.png" class="img-responsive center-block" alt="">
                                                    <div class="review">
                                                        17 reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="price-date-box clearfix">
                                                <div class="left">
                                                    <div class="icon">
                                                        <img src="../resource/images/wallet-icon.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Services Price </div>
                                                        <div class="price">$139</div>
                                                    </div>

                                                </div>
                                                <div class="right">
                                                    <div class="icon">
                                                        <img src="../resource/images/time-history.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Friday, May 20</div>
                                                        <div class="time">8:15AM</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="list-box">
                                            <div class="img-box">
                                                <div class="provider-image">
                                                    <img src="../resource/images/provider-img01.jpg" class="img-circle img-responsive" alt="provider-image">
                                                </div>
                                            </div>
                                            <div class="provider-info">
                                                <div class="provider-name">
                                                    Kristine Lilly
                                                </div>
                                                <div class="address">
                                                    Chapel Hill, New York, United States
                                                </div>
                                                <div class="timing">
                                                    Hair & Make up - 90 MINUTES - 3 MILES
                                                </div>
                                                <div class="rating">
                                                    <img src="../resource/images/rating-star.png" class="img-responsive center-block" alt="">
                                                    <div class="review">
                                                        17 reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="price-date-box clearfix">
                                                <div class="left">
                                                    <div class="icon">
                                                        <img src="../resource/images/wallet-icon.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Services Price </div>
                                                        <div class="price">$139</div>
                                                    </div>

                                                </div>
                                                <div class="right">
                                                    <div class="icon">
                                                        <img src="../resource/images/time-history.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Friday, May 20</div>
                                                        <div class="time">8:15AM</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="list-box">
                                            <div class="img-box">
                                                <div class="provider-image">
                                                    <img src="../resource/images/provider-img01.jpg" class="img-circle img-responsive" alt="provider-image">
                                                </div>
                                            </div>
                                            <div class="provider-info">
                                                <div class="provider-name">
                                                    Kristine Lilly
                                                </div>
                                                <div class="address">
                                                    Chapel Hill, New York, United States
                                                </div>
                                                <div class="timing">
                                                    Hair & Make up - 90 MINUTES - 3 MILES
                                                </div>
                                                <div class="rating">
                                                    <img src="../resource/images/rating-star.png" class="img-responsive center-block" alt="">
                                                    <div class="review">
                                                        17 reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="price-date-box clearfix">
                                                <div class="left">
                                                    <div class="icon">
                                                        <img src="../resource/images/wallet-icon.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Services Price </div>
                                                        <div class="price">$139</div>
                                                    </div>

                                                </div>
                                                <div class="right">
                                                    <div class="icon">
                                                        <img src="../resource/images/time-history.png" alt="wallet">
                                                    </div>
                                                    <div class="price-box">
                                                        <div class="label-info">Friday, May 20</div>
                                                        <div class="time">8:15AM</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="upcoming-appointments">
                            <div class="appointment-history-list">
                                <div class="row">
                                   <?php
                                        //Renders upcoming appointments detail
                                        echo Yii::$app->view->render('_upcoming_appointment',['model' => $model,'upcoming' => $upcoming]);
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="sales-history">
                            <div class="row sales-history-list">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="table-responsive sales-history-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:400px"></th>
                                                    <th style="width:284px">Category</th>
                                                    <th style="width:71px">Qty</th>
                                                    <th style="width:142px">Gross</th>
                                                    <th style="width:142px">Discount</th>
                                                    <th style="width:142px">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table sales-history-table-bg">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table sales-history-table-bg">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table sales-history-table-bg">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" class="pad0">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="sales-history-td-user" style="width:400px">
                                                                    <img src="../resource/images/sales-user.png" alt="sales-user" align="left" class="img-responsive">
                                                                    <div class="sales-user-detail">
                                                                        <p>Smith Jonson</p>
                                                                        <p>Chapel Hill, New York</p>
                                                                        <span>Completed</span>
                                                                    </div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:284px">
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                    <div>Nails> Manicure</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:71px">
                                                                    <div>8</div>
                                                                    <div>50</div>
                                                                    <div>10</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$870</div>
                                                                    <div>$550</div>
                                                                    <div>$700</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$70</div>
                                                                    <div>$50</div>
                                                                    <div>$70</div>
                                                                </td>

                                                                <td class="sales-history-td" style="width:142px">
                                                                    <div>$470</div>
                                                                    <div>$550</div>
                                                                    <div>$800</div>
                                                                </td>
                                                            </tr>

                                                            <!-- xxxxx -->

                                                            <tr class="sales-total-table">
                                                                <td class="sales-total-comm" align="left" colspan="3"><div>Commission Earned: <span>30%</span></div></td>
                                                                <td class="sales-total-td" align="right" colspan="3"><div>Total: <span>$1000</span></div></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="employee-info">
                            <div class="row employee-info-list">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="table-responsive employee-info-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:200px">Curriculum Vitae</th>
                                                    <th style="width:200px">Driving License</th>
                                                    <th style="width:200px">Banking Info</th>
                                                    <th style="width:200px">Void Check/PayPal</th>
                                                    <th style="width:200px">Commission</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a class="file-area" href="javascript:void(0);">
                                                            <span class="file-icon">
                                                                <img src='../resource/images/wordfile-icon.png' alt="pdf-icon"> 
                                                            </span>
                                                            <div class="file-name">
                                                                smith_120615.doc
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="file-area" href="javascript:void(0);">
                                                            <span class="file-icon">
                                                                <img src='../resource/images/jpgformat-icon.png' alt="jpgformat-icon"> 
                                                            </span>
                                                            <div class="file-name">
                                                                smith_120615.doc
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="file-area" href="javascript:void(0);">
                                                            <span class="file-icon">
                                                                <img src='../resource/images/pngformat-icon.png' alt="jpgformat-icon"> 
                                                            </span>
                                                            <div class="file-name">
                                                                smith_120615.doc
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="file-area" href="javascript:void(0);">
                                                            <span class="file-icon">
                                                                <img src='../resource/images/pdf-icon.png' alt="jpgformat-icon"> 
                                                            </span>
                                                            <div class="file-name">
                                                                smith_120615.doc
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="file-area commission" href="javascript:void(0);">
                                                            <span class="file-icon color-green">
                                                                30%
                                                            </span>
                                                            <div class="file-name">
                                                                Comminsion Earned
                                                            </div>
                                                        </a>    
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('customer-detail') ?>">
<?php
    //Renders edit detail pop up for customer
    echo Yii::$app->view->render('_edit-detail',['model' => $model,'data' => $data,'province' => $province,'cities' => $cities]);
?>
<?php
$this->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
$this->registerCssFile('@web/css/customer_detail/customer_details.css');
//$this->registerJsFile('@web/js/customer_detail/cropper.js');
$this->registerJsFile('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
$this->registerJsFile('@web/js/customer_detail/customer_detail.js');

/* * ********************************************************************************************************************************** */
// EOF: provider-detail.php
/* * ********************************************************************************************************************************** */
?>