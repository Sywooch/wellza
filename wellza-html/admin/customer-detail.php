<!DOCTYPE html>
<html lang="eng">
    <?php include 'include/header-links.php'; ?>
    <body> 

        <?php include 'include/header.php'; ?>

        <?php include 'include/left-menu.php'; ?>

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

                        <div class="customer-detail">
                            <a class="edit-btn text-center" href="javascript:void(0);" data-target=".edit-customerdetail-modal" data-toggle="modal"><img src="../assets/images/edit-icon.png" alt="edit-icon"></a>
                            <div class="row">
                                <div class="col-lg-3 col-ms-3 col-sm-3 text-center">
                                    <div class="customer-left">
                                        <div class="customer-image">
                                            <img src="../assets/images/provider-detail-img.jpg" alt="customer-image" class="img-circle img-responsive" align="left">
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class="name">Kristine Lilly</li>
                                            <li class="wellza-member">Wellza member</li>

                                            <li>
                                                <input type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="Enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- xxx -->

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="user-text-detail">
                                        <div class="text-gray">First Name: <span>kristine</span></div>
                                        <div class="text-gray">Last Name: <span>Lilly</span></div>
                                        <div class="text-gray">Gender: <span>Female</span></div>
                                        <div class="text-gray">Birth Date: <span>6/9/1988</span></div>
                                        <div class="text-gray">Year of Exprience: <span>05 Years</span></div>
                                        <div class="text-gray">Mobile Number:  <span>+12345678901</span></div>
                                    </div>
                                </div>

                                <!-- xxxx -->

                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <div class="user-text-detail">
                                        <div class="text-gray">Address 01:  <span>Chapel Hill, New York, United St...</span></div>
                                        <div class="text-gray">Address 02:  <span>Chapel Hill, New York, United St...</span></div>
                                        <div class="text-gray">Prvince:  <span>Chapel Hill</span></div>
                                        <div class="text-gray">City: <span>New York</span></div>
                                        <div class="text-gray">Zip Code: <span>13254</span></div>
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
                                                                            <div class="user-img"><img src="../assets/images/provider06.jpg" alt="user-img" class="img-circle  img-responsive" align="left"></div>
                                                                            <div class="user-detail">
                                                                                <p class="name">Morli Smith</p>
                                                                                <p class="address">Chapel Hill, New York, United States</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/makeup-ic.png" alt="makeup-ic"> MAKEUP</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
                                                                        <td valign="middle"><span class="clr-6">Payment Return</span></td>
                                                                        <td valign="middle"><span class="clr-6">Net Banking</span></td>
                                                                        <td valign="middle"><span class="clr-6">No Coupon/Gift Card</span></td>
                                                                        <td valign="middle"><span class="cancle">Cancelled</span></td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/facial-ic.png" alt="facial-ic"> FACIAL</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
                                                                        <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                        <td valign="middle"><span class="done">Credit Card</span></td>
                                                                        <td valign="middle"><span class="done">GC - 2569FCB2013</span></td>
                                                                        <td valign="middle"><span class="done">Done</span></td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/haircut-ic.png" alt="haircut-ic"> MAKEUP</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
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
                                                                            <div class="user-img"><img src="../assets/images/provider06.jpg" alt="user-img" class="img-circle  img-responsive" align="left"></div>
                                                                            <div class="user-detail">
                                                                                <p class="name">Morli Smith</p>
                                                                                <p class="address">Chapel Hill, New York, United States</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/makeup-ic.png" alt="makeup-ic"> MAKEUP</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
                                                                        <td valign="middle"><span class="clr-6">Payment Return</span></td>
                                                                        <td valign="middle"><span class="clr-6">Net Banking</span></td>
                                                                        <td valign="middle"><span class="clr-6">No Coupon/Gift Card</span></td>
                                                                        <td valign="middle"><span class="cancle">Cancelled</span></td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/facial-ic.png" alt="facial-ic"> FACIAL</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
                                                                        <td valign="middle"><span class="done">Payment Successfully</span></td>
                                                                        <td valign="middle"><span class="done">Credit Card</span></td>
                                                                        <td valign="middle"><span class="done">GC - 2569FCB2013</span></td>
                                                                        <td valign="middle"><span class="done">Done</span></td>
                                                                    </tr>

                                                                    <tr class="user-detail-tr">
                                                                        <td valign="middle"><span class="category"><img src="../assets/images/haircut-ic.png" alt="haircut-ic"> MAKEUP</span></td>
                                                                        <td valign="middle"><img src="../assets/images/time-ic.png" alt="time-ic"> 8:00 PM 9:00 PM / jan 16, 2014</td>
                                                                        <td valign="middle"><strong>$ 90.00</strong></td>
                                                                        <td valign="middle"><span class="review">26 Review </span><img src="../assets/images/rating-ic.png" alt="rating"></td>
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
                                        <div class="col-lg-3 col-md-4 col-sm-6 box-resize">
                                            <div class="item">
                                                <div class="product-detail">
                                                    <div class="product-image">
                                                        <img src="../assets/images/product01.jpg" alt="product-image" class="img-responsive center-block">
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
                                        <div class="col-lg-3 col-md-4 col-sm-6 box-resize">
                                            <div class="item">
                                                <div class="product-detail">
                                                    <div class="product-image">
                                                        <img src="../assets/images/product01.jpg" alt="product-image" class="img-responsive center-block">
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
                                        <div class="col-lg-3 col-md-4 col-sm-6 box-resize">
                                            <div class="item">
                                                <div class="product-detail">
                                                    <div class="product-image">
                                                        <img src="../assets/images/product01.jpg" alt="product-image" class="img-responsive center-block">
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
                                        <div class="col-lg-3 col-md-4 col-sm-6 box-resize">
                                            <div class="item">
                                                <div class="product-detail">
                                                    <div class="product-image">
                                                        <img src="../assets/images/product01.jpg" alt="product-image" class="img-responsive center-block">
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
                                                                <img src="../assets/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
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
                                                                <img src="../assets/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
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
                                                                <img src="../assets/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
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
                                                                <img src="../assets/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
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
                                                                <img src="../assets/images/provider06.jpg" alt="customer-image" class="img-circle img-responsive">
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <img src="../assets/images/popup-product.jpg" alt="popup-product" class="img-responsive">
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

        <div class="modal admin-modal fade edit-customerdetail-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                            <h2 class="modal-title">Edit Detail</h2>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="addproduct-box">
                                <div class="row">
                                    <div class="customer-image">
                                     <img src="../assets/images/provider-detail-img.jpg" alt="customer-image" class="img-circle img-responsive" align="left">
                                     <a class="edit-btn text-center" href="javascript:void(0);"><img src="../assets/images/edit-icon.png" alt="edit-icon"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="upload-product-fields">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="First Name" value="kristine">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Last Name" value="Lilly">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Gender" value="Female">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Birth Date" value="6/9/1988">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Year of Exprience" value="05 Years">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Mobile Number" value="+12345678901">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Address 01" value="Chapel Hill, New York, United St...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Address 02" value="Chapel Hill, New York, United St...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Prvince" value="Chapel Hill">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder='City' value="New York">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" placeholder="Zip Code" value="13254">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-info btn-lg ">Save </button>
                                                    </div>
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

        <?php include 'include/footer.php'; ?>  

        <script>
            $(document).ready(function () {
                $('#product-status-slider').owlCarousel({
                    loop: false,
                    nav: true,
                    dots: false,
                    margin: 25,
                    responsive: {
                        0: {
                            items: 3
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 3
                        }
                    },
                    navText: ["<img src='../assets/images/modal-arrow-left.png'>", "<img src='../assets/images/modal-arrow-right.png'>"]

                });
            });

        </script>

    </body>

</html>

