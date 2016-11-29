<!DOCTYPE html>
<html>
    <?php include 'include/header-links.php'; ?>
    <body> 
        <?php include 'include/header.php'; ?>

        <?php include 'include/left-menu.php'; ?>

        <main class="content admin-page clearfix" id="content">
            <div class="tabpanel">                    
                <div class="panel-body">
                    <div class="table-container">
                        <div class="panel-heading clearfix"> 
                            <div class="main-heading pull-left">
                                <h4 class="">Membership</h4>
                                <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                            </div>
                            <a data-target=".add-membership" data-toggle="modal" href="javascript:void(0);" class="btn btn-info"> ADD MEMBERSHIP</a>
                        </div>

                        <div class="table-responsive admintable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">DISCOUNT</th>
                                        <th style="width: 20%;">AMOUNT(in $)</th>
                                        <th style="width: 30%;">MEMBERSHIP TYPE </th>
                                        <th style="width: 20%;">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>30%</td>
                                        <td>$ 100</td>
                                        <td>Monthly</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <input type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target=".couponview-modal" class="view-btn"><img src="../assets/images/eye-icon.png"></a>
                                                <li>
                                                <li>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target=".edit_membership" class="edit-btn"><img src="../assets/images/edit_white.png"></a>
                                                <li>
                                                <li>
                                                    <a href="javascript:void(0);" class="delete-btn"><img src="../assets/images/delete-icon-btn.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr>  

                                </tbody>
                            </table>
                        </div>

<!--                        <div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>-->

                        <nav class="admin_pagination clearfix">
                            <ul class="pagination pull-right">
                                <li>
                                    <a aria-label="Previous" href="#" class="prev">
                                        &lt; PREVIOUS
                                    </a>
                                </li>
                                <li class="active"><a href="javascript:void(0);">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li><a href="javascript:void(0);">3</a></li>
                                <li><a href="javascript:void(0);">4</a></li>
                                <li><a href="javascript:void(0);">5</a></li>
                                <li>
                                    <a aria-label="Next" href="#" class="next">
                                        NEXT &gt;
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </main>
        <div class="modal admin-modal fade couponview-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                            <h2 class="modal-title">Detail</h2>
                        </div>
                        <div class="modal-body clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 left">
                                <img src="../assets/images/membership-icon.png" class="img-responsive center-block" alt="image">
                            </div>
                            <div class="col-sm-8 col-md-4 col-lg-4">
                                <div class="user-text-detail">
                                    <div class="text-gray">Discount: <span>30%</span></div>

                                    <div class="text-gray">Amount: <span>$100</span></div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-sm-offset-4 col-lg-offset-0 col-md-4 col-lg-4">
                                <div class="user-text-detail">
                                    <div class="text-gray"> Type: <span>Monthly</span></div>
                                </div>
                            </div>
                        </div>
                    </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal admin-modal fade edit_membership" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                            <h2 class="modal-title">Edit Membership</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Discount">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option>Select Type</option>
                                            <option>Monthly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-lg btn-block">UPDATE</button>
                        </div>


                    </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal admin-modal fade add-membership" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                            <h2 class="modal-title">Add Membership</h2>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" placeholder="Amount(in $)">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker">
                                            <option>membership type</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-lg btn-block">ADD</button>
                        </div>


                    </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php include 'include/footer.php'; ?>  
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

        </script>
    </body>

</html>

