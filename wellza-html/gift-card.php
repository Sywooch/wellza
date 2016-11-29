<?php include 'include/inner-header.php'; ?>
<?php include 'include/right-menu.php'; ?>

<main class="inner-content" id="inner-content">

    <div class="container wellza-gift-card">

        <div class="row">
            <div class="col-lg-12">
                <div class="gift-card-banner">
                    <div class="gift-card-content">
                        <h2>GIFT CARD</h2>
                        <p>LOREM IPSUM DOLOR SIT AMET, IT<br>CONSECTETUER ADIPISCING </p>
                    </div>
                </div>
            </div>
        </div> 

        <!-- xxxxx -->

        <div class="row">
            <div class="col-lg-12">
                <div class="gift-card-heading">
                    <h2>Gift Card</h2>
                    <p>Lorem ipsum dolor sit amet, it consectetuer adipiscing </p>
                </div>

            </div>
        </div>

        <!-- xxxxx -->

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="Price here...">
                </div>
            </div>

            <!--  <div class="col-lg-4">
                 <div class="form-group">
                     <label>Gift Delivery Date</label>
                     <input type="text" class="form-control" placeholder="Email">
                 </div>
             </div> -->

            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Gift Delivery Date</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="delivery_date">
                        <div class="input-group-addon" ><img src="assets/images/calender-color.png" alt="calender-color"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Who is your gift for...?">
                </div>
            </div>

            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" placeholder="Email Address of Sender...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10">
                <div class="form-group">
                    <label>Personal Message (Optional)</label>
                    <input type="text" class="form-control" placeholder="Description....">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" class="form-control" placeholder="Your Full Name Here...">
                </div>
            </div>

            <div class="col-lg-4 col-md-5">
                <div class="form-group">
                    <label>Your Email Address (For Receipt)</label>
                    <input type="text" class="form-control" placeholder="Your Email For Receipt...">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a href="" class="btn-warning">ADD TO CART</a>
            </div>
        </div>



    </div>

</main>


<?php include 'include/inner-footer.php'; ?>

<script>
    $('#delivery_date').datetimepicker({
        format: 'L'
    });
</script>
</body>
</html>
