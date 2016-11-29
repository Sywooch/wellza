<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: customer-detail.php
 *  Created: Codian Team
 *  Description: Admin can view customer profile from here.
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
$this->title = 'Customer Details';
$birth_date = '';
if(empty($dob)) {
    $dob = '';
}
if(!empty($data->birth_date)) {
$birth_date = explode('-', $data->birth_date);
$dob = $birth_date[2].'-'.$birth_date[1].'-'.$birth_date[0];    
}

?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container admin-customer-detail">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class="">Customers</h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                </div>
                <?php
                    $profile_thumb = !empty($data->profile_image_thumb) ? \Yii::$app->urlManagerFrontEnd->createUrl('/').$data->profile_image_thumb : \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');
                    //$city_data = \common\models\MasterCities::getCitiesByName($data->city); 
                    $city_data = $data->city; 
                    //$province_data = \common\models\MasterStates::getProvinceName($data->province);
                    $province_data = $data->province;
                    
                ?>    
                <div class="customer-detail">
                    <?php if (Yii::$app->session->hasFlash('customer_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('customer_message') ?>
                        </div>
                    <?php endif; ?> 
                    <a class="edit-btn text-center" href="javascript:void(0);" data-target=".edit-customerdetail-modal" data-toggle="modal"><img src="../resource/images/edit-icon.png" alt="edit-icon"></a>
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
                                            <input id="<?=$data->id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="disable" data-on-text="&nbsp;" data-off-text="&nbsp;"/>
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
                                <div class="text-gray">Mobile Number:  <span>+1<?= $data->cell_phone ?></span></div>
                                <div class="text-gray">Address 01:  <span><?= $data->address ?></span></div>
                            </div>
                        </div>

                        <!-- xxxx -->

                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="user-text-detail">                                        
                                <div class="text-gray">Address 02:  <span><?= $data->address2 ?></span></div>
                                <div class="text-gray">Province:  <span><?= $province_data ?></span></div>
                                <div class="text-gray">City: <span><?= $city_data ?></span></div>
                                <div class="text-gray">Zip Code: <span><?= $data->postal_code ?></span></div>
                                <div class="text-gray">Country: <span><?= $data->country ?></span></div>
                                <div class="text-gray">About Me: <span><?= $data->about_me?></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- xxxxxxxxxxx -->

                <div class="admin-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#service-provider" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                SERVICE PROVIDER LIST
                            </a>
                        </li>

                        <li role="presentation">
                            <a href="#product-item" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                PRODUCTS
                            </a>
                        </li>

                        <li role="presentation">
                            <a href="#total-referrall" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                TOTAL REFERRAL
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="service-provider">
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

                        <!-- xxxx -->

                        <!-- xxxx -->

                        <div role="tabpanel" class="tab-pane" id="product-item">
                            <div class="row product-status-list">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="item">
                                        <div class="product-detail">
                                            <div class="product-image">
                                                <img src="../resource/images/product01.jpg" alt="product-image" class="img-responsive center-block">
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="product-name" data-toggle="modal" data-target="#product-popup">
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
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
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
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
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
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
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
                        <!-- xxx -->

                        <div role="tabpanel" class="tab-pane" id="total-referrall">
                            <div class="total-referral">
                                <div class="referral-box-list">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6 box-five"> 
                                            <div class="item">
                                                <div class="referral-box">
                                                    <div class="customer-image">
                                                        <img src="../resource/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
                                                    </div>
                                                    <p class="name">Kristine Lilly</p>
                                                    <p class="mail">kristinelilly@ gmail.com</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6 box-five">
                                            <div class="item">
                                                <div class="referral-box">
                                                    <div class="customer-image">
                                                        <img src="../resource/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
                                                    </div>
                                                    <p class="name">Kristine Lilly</p>
                                                    <p class="mail">kristinelilly@ gmail.com</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6 box-five">
                                            <div class="item">
                                                <div class="referral-box">
                                                    <div class="customer-image">
                                                        <img src="../resource/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
                                                    </div>
                                                    <p class="name">Kristine Lilly</p>
                                                    <p class="mail">kristinelilly@ gmail.com</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6 box-five">
                                            <div class="item">
                                                <div class="referral-box">
                                                    <div class="customer-image">
                                                        <img src="../resource/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
                                                    </div>
                                                    <p class="name">Kristine Lilly</p>
                                                    <p class="mail">kristinelilly@ gmail.com</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6 box-five">
                                            <div class="item">
                                                <div class="referral-box">
                                                    <div class="customer-image">
                                                        <img src="../resource/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
                                                    </div>
                                                    <p class="name">Kristine Lilly</p>
                                                    <p class="mail">kristinelilly@ gmail.com</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="javascript:void(0);" class="loadmore">Load More <i class="fa fa-spinner fa-spin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>


<div class="modal admin-modal admin-product-view-modal fade " tabindex="-1" role="dialog"  id="product-popup">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="../resource/images/popup-product.jpg" alt="popup-product" class="img-responsive">
                        </div>
                        <!-- xxxxxxx -->
                        <div class="col-lg-7">
                            <div class="details">
                                <h2>Product Status</h2>
                                <p>Moroccanoil Hairspray moisture</p>
                                <ul class="list-unstyled">
                                    <li>Price: <span>$50.00</span></li>
                                    <li>Status: <span>Canceled</span></li>
                                    <li>Quantity: <span>02</span></li>
                                    <li>Order Date: <span>02/05/2016</span></li>
                                    <li>Cancellation Date: <span>04/05/2016</span></li>
                                    <li>Coupon Code:<span>02568FCB20</span></li>
                                    <li>Description: <span>Lorem ipsum dolor sit amet, polip consectetuer adipiscing elit, sed diam kolpot ir </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
<input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('customer-detail') ?>">
<?php
    //Renders edit detail pop up for customer
    echo Yii::$app->view->render('_edit-detail',['model' => $model,'data' => $data,'province' => $province,'cities' => $cities]);
?> 
<?php
$this->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
$this->registerCssFile('@web/css/customer_detail/customer_details.css');
$this->registerJsFile('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
$this->registerJsFile('@web/js/customer_detail/customer_detail.js');

/* * ********************************************************************************************************************************** */
// EOF: customer-detail.php
/* * ********************************************************************************************************************************** */