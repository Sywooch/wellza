<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\web\Session;

$session = Yii::$app->session;
$order_id = $order->id;

$odate = $session->get('appointment_date');
$date_arr = explode('-', $odate);

$order_date = $date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0];
$delivery_address = $session->get('address1');

$order_total = 0;
if($order_detail['appointment']['commodity_type'] == 'appointment') {
    $order_total = $order_total + $order_detail['appointment']['price'];
}

if($order_detail['appointment']['commodity_type'] == 'giftcard') {
    $order_total = $order_total + $order_detail['giftcard']['price'];
}

?>
<main class="inner-content" id="inner-content">
    <div class="order-detail-section">
        <div class="container">
            <h1 class="inner-heading">Thank you for your purchase!</h1>
            <div class="">Your order ID is : <span><b><?= $order_id ?></b></span></div>
            <!--<p>You will receive an order confirmation email with detail of your order.</p>-->
            <div class="panel panel-default">
                <div class="panel-heading"><b>ORDER INFORMATION</b></div>
                <div class="panel-body order_info">
                    <ul class="list-unstyled">
                        <li><b>Order Date:</b> 
                            <span id="date"><?= $order_date ?></span>
                        </li>
                        <li><b>Delivery Address:</b> 
                            <span id="address"><?= $delivery_address.','.$session->get('city').','.$session->get('province').',Canada'; ?></span>
                        </li>
                        <li><b>Order Total:</b> 
                            <span id="address"> $<?= $order_total ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="cart_box">
                <h3>Your Ordered</h3>
                <div class="table-responsive">
                    <!--<h3 class="item_haeding">Product</h3>
                    <table class="table product_table">
                        <thead>
                            <tr>
                                <th class="width30">Product</th>
                                <th class="width20">Price</th>
                                <th class="width25">Quantity</th>
                                <th class="">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pro_cnt">
                                        <div class="pro_image">
                                            <div class="img_box item_image" style="background-image:url('assets/images/product01.jpg');">
                                            </div>
                                        </div>
                                        <div class="product_detail">
                                            <div class="name">Ceramic Mug (350 ml)</div>
                                        </div>
                                    </div>
                                </td>
                                <td>$50</td>
                                <td>
                                    2
                                </td>
                                <td>$250</td>
                            </tr>
                        </tbody>
                    </table>-->
                    <?php
                        
                    if (isset($order_detail) && !empty($order_detail)) {
                        /* echo '<pre/>';
                          echo $order_detail['appointment']['category_image'];
                          die('..'); */
                        //$i = 0;
                        //while ($i < count($order_detail)) {
                        if($order_detail['appointment']['commodity_type'] == 'appointment') {
                            ?>
                            <h3 class="item_haeding">Service Package</h3>
                            <table class="table appointment_table">
                                <thead>
                                    <tr>
                                        <th class="width30">Service Name</th>
                                        <th class="width20">Address</th>
                                        <th class="width25">Date/Time</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="pro_cnt">
                                                <div class="pro_image">
                                                    <div class="img_box service_icon" style="">
                                                        <img src="<?= $order_detail['appointment']['category_image'] ?>">
                                                    </div>
                                                </div>
                                                <div class="product_detail">
                                                    <div class="name"><?= $order_detail['appointment']['product_name'] ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $order_detail['appointment']['shipping_address1'] ?></td>
                                        <td><?= $order_detail['appointment']['appointment_date'] ?>, <?= $order_detail['appointment']['appointment_minutes'] ?> min</td>
                                        <td>$<?= (Int) $order_detail['appointment']['price']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                         //   $i++;
                        //}
                        }
                        if($order_detail['appointment']['commodity_type'] == 'giftcard') {    
                        ?>
                        <h3 class="item_haeding">Gift Card</h3>
                        <table class="table appointment_table">
                            <thead>
                                <tr>
                                    <th class="width20">Gift Card</th>
                                    <th class="width20">Receiver Name</th>
                                    <th class="width25">Message</th>
                                    <th class="width10">Delivery Date</th>
                                    <th class="width10">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        //$i = 0;
                        //while ($i < count($order_detail['giftcard'])) {
                        
                            
                        
                            ?>
                                    <tr>
                                        <td>
                                            <div class="pro_cnt">
                                                <div class="pro_image">
                                                    <div class="img_box service_icon" style="background-image:url('../resource/images/giftcard.png');">
                                                </div>
                                                <div class="product_detail">
                                                    <div class="name">Gift Card</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $order_detail['giftcard']['to_name'] ?></td>
                                        <td><?= $order_detail['giftcard']['message'] ?></td>
                                        <td><?php
                                            $date_array = explode('-',$order_detail['giftcard']['delivery_date']);
                                            echo  $date_array[2].'-'.$date_array[1].'-'.$date_array[0] ?></td>
                                        <td>$<?= (Int)$order_detail['giftcard']['price']?></td>
                                    </tr>
                            <?php
                        //    $i++;
                       // }
                        }
                        ?>
                            </tbody>
                        </table>
                        <?php
                    
                    } 
                    else {
                        ?>
                        <h3 class="item_haeding">Cart is empty</h3>

                        <?php
                    }
                    ?>
                    <!--<h3 class="item_haeding">Wellza  Bundle</h3>
                    <table class="table bundle_table">
                        <thead>
                            <tr>
                                <th class="width30">Bundle Name</th>
                                <th class="width20">Total Number of Services</th>
                                <th class="width25">Total saving</th>
                                <th class="">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pro_cnt">
                                        <div class="pro_image">
                                            <div class="img_box service_icon" style="background-image:url('assets/images/hair-icon.png');">
                                            </div>
                                        </div>
                                        <div class="product_detail">
                                            <div class="name">Wedding</div>
                                        </div>
                                    </div>
                                </td>
                                <td>5</td>
                                <td>50%</td>
                                <td>$60</td>
                            </tr>
                        </tbody>
                    </table>-->

                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <table class="table crattoal-table">
                        <tbody>
                            <tr>
                                <td class="text-right" align="right">
                                    <div class="form-horizontal crattoal-table">
                                        <div class="row">
                                            <label class="col-xs-6 col-sm-9 col-md-10 control-label cart-totalprice">Sub-Total :</label>
                                            <div class="col-sm-3 col-md-2 col-xs-6 pro-price"> $<?= $order_total ?></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>   
                            <tr>
                                <td class="pro_total_price text-right" align="right">
                                    <div class="form-horizontal crattoal-table">
                                        <div class="row">
                                            <label class="col-xs-6 col-sm-9 col-md-10 control-label cart-totalprice">Total :</label>
                                            <div class="col-sm-3 col-md-2 col-xs-6 pro-price color-orange"> $<?= $order_total ?></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot> 
                    </table>
                </div>

                <div class="col-lg-6 col-xs-12 col-md-7 col-sm-9 col-sm-offset-6 couponform col-md-offset-6 col-lg-offset-6">
                    <div class="row">
                        <div class="col-sm-6 col-lg-offset-6"">
                            <a type="button" class="btn btn-info btn-block btn-lg" data-target=".our-services-modal" data-toggle="modal">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal admin-modal fade our-services-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                        <div class="continue-with">
                            <div class="heading">
                                <h2>OUR SERVICES</h2>
                            </div>
                            <div class="wrapper">
                                <a href="<?php echo Yii::$app->urlManager->createUrl('client/book-appointment') ?>" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="../resource/images/appointment_greenicon.png" class="center-block animated pulse infinite" alt="hair">
                                        <h3>Appointment</h3>
                                        <p>It is not just a job, it is art and pleasure to work with woman’s hair
                                        </p>
                                    </div>
                                </a>

                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="../resource/images/product_greenicon.png" class="center-block animated pulse infinite" alt="training">
                                        <h3>Wellza Product</h3>
                                        <p>Beauty sometimes requires pain, but depilation with us can be pain-free
                                        </p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="../resource/images/membership_greenicon.png" class="center-block animated pulse infinite" alt="nails">
                                        <h3>Wellza Membership</h3>
                                        <p>Hands and feet work for you a lot, sometimes they need vacation, too
                                        </p>
                                    </div>
                                </a>

                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="../resource/images/giftcard_greenicon.png" class="center-block animated pulse infinite" alt="massage">
                                        <h3>Gift Cart</h3>
                                        <p>Relaxation and enjoyment make you a different and happier person
                                        </p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="../resource/images/wellza_bundlegreen.png" class="center-block animated pulse infinite" alt="skin">
                                        <h3>Wellza Bundle</h3>
                                        <p>makeup can have a magical effect when performed by real masters
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</main>

