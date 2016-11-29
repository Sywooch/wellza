<!DOCTYPE html>
<html lang="eng">
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
                                <h4 class="">Wellza Bundle</h4>
                            </div>

                            <div class="search-box">
                                <div class="form-group">
                                    <select class="selectpicker">
                                        <option>Category</option>
                                        <option>HAIR & MAKEUP</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <a data-target=".add_bundle" data-toggle="modal" href="javascript:void(0);" class="btn btn-info">ADD NEW WELLZA BUNDLE</a>
                            </div>
                        </div>

                        <div class="table-responsive admintable02 admin-wellza-package">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>WELLZA BUNDLE NAME</th>
                                        <th>TOTAL MAIN CATGORIES</th>
                                        <th>TOTAL SAVINGS</th>                                        
                                        <th>WELLZA BUNDLE PRICE</th>
                                        <th>VIEW</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="category-name">
                                                Wedding Package
                                            </div> 
                                        </td>
                                        <td>
                                            <span class="cate-no color-666">05</span>
                                            <div>Categories</div>
                                        </td>
                                        <td>20%</td>
                                        <td>$1000</td>
                                        <td>
                                            <a href="subcategory.php" class="view-more"> 
                                                <img src="../assets/images/plus-green.png" alt="plus">
                                                <div class="color-green">View More</div>
                                            </a>
                                        </td>

                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <input type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="delete-btn"><img src="../assets/images/delete-icon-btn.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="category-name">
                                                Wedding Package
                                            </div> 
                                        </td>
                                        <td>
                                            <span class="cate-no color-666">05</span>
                                            <div>Categories</div>
                                        </td>
                                        <td>20%</td>
                                        <td>$1000</td>
                                        <td>
                                            <a href="subcategory.php" class="view-more"> 
                                                <img src="../assets/images/plus-green.png" alt="plus">
                                                <div class="color-green">View More</div>
                                            </a>
                                        </td>

                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <input type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="delete-btn"><img src="../assets/images/delete-icon-btn.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <div class="category-name">
                                                Wedding Package
                                            </div> 
                                        </td>
                                        <td>
                                            <span class="cate-no color-666">05</span>
                                            <div>Categories</div>
                                        </td>
                                        <td>20%</td>
                                        <td>$1000</td>
                                        <td>
                                            <a href="subcategory.php" class="view-more"> 
                                                <img src="../assets/images/plus-green.png" alt="plus">
                                                <div class="color-green">View More</div>
                                            </a>
                                        </td>

                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <input type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="delete-btn"><img src="../assets/images/delete-icon-btn.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>     

                            </table>
                        </div>
                        <div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="modal admin-modal fade add_bundle" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                                <h2 class="modal-title">Add Wellza Bundle</h2>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Wellza Bundle Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="selectpicker">
                                                <option>Category Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Total Saving">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control input-lg" id="wellza-package-name" placeholder="Wellza Bundle price">
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="button" class="btn btn-info btn-lg ">SAVE BUNDLE</button>
                                </div>
                            </div>


                        </form>     
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </main>

        <?php include 'include/footer.php'; ?>  

        <script type="text/javascript">
            $('.datetimepicker1').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'LT'
            });
        </script>

    </body>

</html>

