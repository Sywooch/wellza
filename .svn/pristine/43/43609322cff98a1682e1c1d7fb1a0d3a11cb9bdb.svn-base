<!DOCTYPE html>
<html lang="eng">
   <?php include 'include/header-links.php'; ?>


    <body> 

        <?php include 'include/header.php'; ?>


        <?php include 'include/left-menu.php'; ?>

        <main class="content clearfix" id="content">
            <div class="tabpanel">                    
                <div class="panel-body">
                    <div class="table-container">
                        <div class="panel-heading"> 
                            <div class="search">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="" id="" placeholder="Search">
                                            <div class="input-group-addon"><a href="javascript:void(0);"><i class="fa fa-search"></i></a></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a data-target=".add-category-modal" data-toggle="modal" href="javascript:void(0);" class="btn btn-info"><i class="fa fa-plus"></i> Add</a>
                        </div>
                        <hr>      

                        <div class="sub-category-list">
                            <div class="row">
                                <div class="col-md-3 col-lg-2">
                                    <div class="category-item">
                                        <div class="checkbox cate-01">
                                             <input type="checkbox" name="cate-01" id="cate-01" value="cate-01"> 
                                             <label class="category_icon" for="cate-01"> <span class='cat-icon hair-icon'></span></label>
                                      </div>  
                                        <div class="name">HAIR & MAKE UP</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-lg-2">
                                    <div class="category-item">
                                        <div class="checkbox cate-02">
                                             <input type="checkbox" name="cate-02" id="cate-02" value="cate-02"> 
                                             <label class="category_icon" for="cate-02"> <span class='cat-icon skin-icon'></span></label>
                                      </div>  
                                        <div class="name">HAIR & MAKE UP</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-lg-2">
                                    <div class="category-item">
                                        <div class="checkbox cate-03">
                                             <input type="checkbox" name="cate-03" id="cate-03" value="cate-03"> 
                                             <label class="category_icon" for="cate-03"> <span class='cat-icon nails-icon'></span></label>
                                      </div>  
                                        <div class="name">HAIR & MAKE UP</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loadmore"><a href="javascript:void(0);">Load more <i class="fa fa-spinner fa-spin"></i></a></div>
                    </div>
                </div>
            </div>

        </main>


        <div class="modal admin-modal fade add-category-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                     <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title">Add Category</h2>
                    </div>
                    <div class="modal-body">
                        <div id="add-category" class="owl-carousel owl-theme categoryslider-box">
                            <div class="item">
                                <div class="checkbox cate-01">
                                     <input type="checkbox" name="cate-01" id="cate-01" value="cate-01"> 
                                     <label class="category_icon" for="cate-01"> <span class='cat-icon hair-icon'></span></label>
                                </div>    
                            </div>
                            <div class="item">
                               <div class="checkbox cate-02">
                                     <input type="checkbox" name="cate-02" id="cate-02" value="cate-02"> 
                                     <label class="category_icon" for="cate-02"> <span class='cat-icon nails-icon'></span></label>
                                </div>  
                            </div>
                            <div class="item">
                               <div class="checkbox cate-03">
                                     <input type="checkbox" name="cate-03" id="cate-03" value="cate-03"> 
                                     <label class="category_icon" for="cate-03"> <span class='cat-icon training-icon'></span></label>
                                </div>  
                            </div>
                            <div class="item">
                                <div class="checkbox cate-04">
                                     <input type="checkbox" name="cate-04" id="cate-04" value="cate-04"> 
                                     <label class="category_icon" for="cate-04"> <span class='cat-icon skin-icon'></span></label>
                                </div>  
                            </div>
                            <div class="item">
                               <div class="checkbox cate-05">
                                     <input type="checkbox" name="cate-05" id="cate-05" value="cate-05"> 
                                     <label class="category_icon" for="cate-05"> <span class='cat-icon massage-icon'></span></label>
                                </div>  
                            </div>
                            <div class="item">
                               <div class="checkbox cate-06">
                                     <input type="checkbox" name="cate-06" id="cate-06" value="cate-06"> 
                                     <label class="category_icon" for="cate-06"> <span class='cat-icon bundle-icon'></span></label>
                                </div>  
                            </div>
                        </div>
                        
                      <div class="form-group">
                          <label for="category-name">Category Name</label>
                        <input type="text" class="form-control input-lg" id="category-name" placeholder="Category Name">
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-lg">Save category</button>
                    </div>
                     </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php include 'include/footer.php'; ?>  

        <script>
            $(document).ready(function () {
                $('#add-category').owlCarousel({
                    loop: false,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 4
                        },
                        600: {
                            items: 4
                        },
                        1000: {
                            items: 3
                        }
                    },
               navText: ["<img src='../assets/images/nav-left-arrow.png'>", "<img src='../assets/images/nav-right-arrow.png'>"]

                });
            });
        </script>

    </body>

</html>

