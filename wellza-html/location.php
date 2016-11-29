
<?php include 'include/inner-header.php'; ?>
<?php include 'include/right-menu.php'; ?>

<main class="inner-content" id="inner-content">
    <div class="container location-section">
        <h1 class="inner-heading">Your Location</h1>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <form>
                    <div class="row pick-location">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Preferred Location">
                            </div>  
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <a href="javascript:void(0);" class="btn btn-info btn-lg btn-block"><img src="assets/images/location_icon.png" alt="location"> Pick Your Location</a>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address Line 1</label> 
                        <input type="text" class="form-control" placeholder="Address Line 1">
                    </div>
                    <div class="form-group">
                        <label>Address Line 2</label> 
                        <input type="text" class="form-control" placeholder="Address Line 2">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>City</label> 
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Province</label> 
                                <input type="text" class="form-control" placeholder="Province">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Telephone No.</label> 
                                <input type="text" class="form-control" placeholder="Telephone No.">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Postal Code</label> 
                                <input type="text" class="form-control" placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Add Personal Message</label> 
                        <textarea class="form-control" placeholder="Add Personal Message" rows="4"></textarea>
                    </div>
                </form>
            </div>
        </div>

        <div class="center-block text-center btn-bottom clearfix">
            <a class="btn btn-info btn-lg" href="wellza-provider.php">SAVE LOCATION</a>
        </div>
    </div>
</main>


<div class="modal inner-modal fade no-location-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="assets/images/cross.png" alt="close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="assets/images/no-area-location.png" alt="service-pkg-clock">
                            <h2>Sorry we are not available in this area yet <br> <span>would you like to get notified when “WELLZA” gets there?</span></h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="" class="btn btn-info">GET NOTIFIED</a>
                            <a href="" class="btn btn-warning">SELECT ANOTHER LOCATION</a>
                        </div>
                    </div>
                </div>
            </form>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<?php include 'include/inner-footer.php'; ?>
<script>
    $(window).load(function () {
        $('.no-location-popup').modal('show');
    });
</script>
</body>
</html>
