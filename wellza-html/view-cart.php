<?php include 'include/inner-header.php'; ?>
<?php include 'include/right-menu.php'; ?>

<main class="inner-content" id="inner-content">
    <div class="view-cart-section">
        <div class="container">
            <h1 class="inner-heading">Shopping Cart</h1>
            <div class="cart_box">
                <div class="table-responsive">
                    <h3 class="item_haeding">Product</h3>
                    <table class="table product_table">
                        <thead>
                            <tr>
                                <th class="width30">Product</th>
                                <th class="width20">Price</th>
                                <th class="width25">Quantity</th>
                                <th class="">Total</th>
                                <th class=""></th>
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
                                    <div class="input-group  checkout-spinner">
                                        <span class="input-group-btn data-dwn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>
                                        <input class="form-control text-center" readonly="" name="quantity" value="1" min="1" max="40" type="text">    
                                        <span class="input-group-btn data-up">
                                            <button type="button" class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                </td>
                                <td>$250</td>
                                <td class="text-center">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0);" class="delete-btn" data-toggle="tooltip" title="Delete"><img src="assets/images/delete-icon-btn.png"></a>  
                                        </li>
                                        <!--                                        <li>
                                                                                    <a href="javascript:void(0);" class="update-btn" data-toggle="tooltip" title="Update"><img src="assets/images/update_icon.png"></a>   
                                                                                </li>-->
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="item_haeding">Service Package</h3>
                    <table class="table appointment_table">
                        <thead>
                            <tr>
                                <th class="width30">Service Name</th>
                                <th class="width20">Address</th>
                                <th class="width25">Date/Time</th>
                                <th>Price</th>
                                <th class=""></th>
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
                                            <div class="name">Hair cut</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Chapel Hill, New York, United States</td>
                                <td>09-05-2016, 50 min</td>
                                <td>$60</td>
                                <td class="text-center">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0);" class="delete-btn" data-toggle="tooltip" title="Delete"><img src="assets/images/delete-icon-btn.png"></a>  
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="item_haeding">Wellza  Bundle</h3>
                    <table class="table bundle_table">
                        <thead>
                            <tr>
                                <th class="width30">Bundle Name</th>
                                <th class="width20">Total Number of Services</th>
                                <th class="width25">Total saving</th>
                                <th class="width20">Price</th>
                                <th class="width20"></th>
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
                                <td class="text-center">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0);" class="delete-btn" data-toggle="tooltip" title="Delete"><img src="assets/images/delete-icon-btn.png"></a>  
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 class="item_haeding">Gift  Card</h3>
                    <table class="table bundle_table">
                        <thead>
                            <tr>
                                <th class="width20">Gift Card</th>
                                <th class="width20">Receiver Name</th>
                                <th class="width25">Message</th>
                                <th class="width10">Delivery Date</th>
                                <th class="width10">Amount</th>
                                <th class="width10">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pro_cnt">
                                        <div class="pro_image">
                                            <div class="img_box service_icon" style="background-image:url('assets/images/giftcard.png');">
                                            </div>
                                        </div>
                                        <div class="product_detail">
                                            <div class="name">Gift card</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Name</td>
                                <td>Message</td>
                                <td>15-oct-2016</td>
                                <td>$20</td>
                                <td class="text-center">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0);" class="delete-btn" data-toggle="tooltip" title="Delete"><img src="assets/images/delete-icon-btn.png"></a>  
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-6 col-xs-12 col-sm-6 couponform">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-md-5">
                                <input class="form-control input-lg" name="coupon" id="input-coupon" placeholder="Enter Coupon Code" type="text">
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <button type="button" class="btn btn-primary btn-lg btn-block" id="button-coupon">APPLY COUPON</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-6 couponform">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-offset-8">
                                <button type="button" class="btn btn-info btn-lg btn-block" id="button-coupon">UPDATE CART</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <table class="table crattoal-table">
                        <tbody>
                            <tr>
                                <td class="text-right" align="right">
                                    <div class="form-horizontal crattoal-table">
                                        <div class="row">
                                            <label class="col-xs-6 col-sm-9 col-md-10 control-label cart-totalprice">Sub-Total :</label>
                                            <div class="col-sm-3 col-md-2 col-xs-6 pro-price"> $3,200.00</div>
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
                                            <div class="col-sm-3 col-md-2 col-xs-6 pro-price color-orange"> $3,200.00</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot> 
                    </table>
                </div>

                <div class="col-lg-6 col-xs-12 col-md-7 col-sm-9 col-sm-offset-3 couponform col-md-offset-5 col-lg-offset-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <a type="button" class="btn btn-warning btn-block btn-lg" data-target=".our-services-modal" data-toggle="modal">CONTINUE SHOPPING</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:void(0);" class="btn btn-info btn-block btn-lg" data-toggle='modal' data-target='.checkout-modal'>PROCEED TO CHECKOUT</a>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="assets/images/cross.png" alt="close"></button>
                        <div class="continue-with">
                            <div class="heading">
                                <h2>OUR SERVICES</h2>
                            </div>
                            <div class="wrapper">
                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="assets/images/appointment_greenicon.png" class="center-block animated pulse infinite" alt="hair">
                                        <h3>Appointment</h3>
                                        <p>It is not just a job, it is art and pleasure to work with woman’s hair
                                        </p>
                                    </div>
                                </a>

                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="assets/images/product_greenicon.png" class="center-block animated pulse infinite" alt="training">
                                        <h3>Wellza Product</h3>
                                        <p>Beauty sometimes requires pain, but depilation with us can be pain-free
                                        </p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="assets/images/membership_greenicon.png" class="center-block animated pulse infinite" alt="nails">
                                        <h3>Wellza Membership</h3>
                                        <p>Hands and feet work for you a lot, sometimes they need vacation, too
                                        </p>
                                    </div>
                                </a>

                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="assets/images/giftcard_greenicon.png" class="center-block animated pulse infinite" alt="massage">
                                        <h3>Gift Cart</h3>
                                        <p>Relaxation and enjoyment make you a different and happier person
                                        </p>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="col-md-4 col-sm-6 align">
                                    <div class="icon">
                                        <img src="assets/images/wellza_bundlegreen.png" class="center-block animated pulse infinite" alt="skin">
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
<div class="modal admin-modal fade checkout-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-body clearfix">
                    <div class="payment-section">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 payment-section-body">
                                <div class="payment-section-containt">
                                        <div class="containt-top">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h2>Payment Detail</h2>
                                                    <p>Your card detail is 100% secure.</p>
                                                </div>
                                            </div>
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >Other Card</label>
                                                            <select class="selectpicker">
                                                                <option>Choose your card </option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >Add your Card</label>
                                                            <input type="email" class="form-control" placeholder="Click to add your card here...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- xxx -->

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >Name on Card</label>
                                                            <input type="email" class="form-control" placeholder="Your name on card here...">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >Card Number</label>
                                                            <input type="email" class="form-control"  placeholder="Your card number is here...">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- xxx -->

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >Exp.</label>
                                                            <input type="email" class="form-control" placeholder="Expairy date of card. MM/YY">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label >CCV</label>
                                                            <input type="email" class="form-control"  placeholder="Card security Code (CCV)">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- xxx -->

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <img src="assets/images/card-company.jpg" alt="card-company" class="img-responsive">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="container-bottom">
                                                <div class="col-lg-12 pad0">
                                                    <a href="" class="save">SAVE YOUR CARD</a>
                                                    <a href="" class="pay" data-toggle="modal" data-target=".payment-successful-popup">PAY NOW $16.95</a>
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                    
                    </div>
                </div>
            </form>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include 'include/inner-footer.php'; ?>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        //=============== prodcut qty counter==================//
        var action;
        $(".checkout-spinner button").mousedown(function () {
            btn = $(this);
            input = btn.closest('.checkout-spinner ').find('input');
            btn.closest('.checkout-spinner ').find('button').prop("disabled", false);

            if (btn.attr('data-dir') == 'up') {
                action = setInterval(function () {
                    if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                        input.val(parseInt(input.val()) + 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            } else {
                action = setInterval(function () {
                    if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                        input.val(parseInt(input.val()) - 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            }
        })
                .mouseup(function () {
                    clearInterval(action);
                });
        //===============end prodcut qty counter==================//
    });

</script>
</body>
</html>
