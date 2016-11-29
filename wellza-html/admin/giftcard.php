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
                                <h4 class="">Gift Card</h4>
                                <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                            </div>
                        </div>

                        <div class="table-responsive admintable">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">SENDER NAME</th>
                                        <th style="width: 15%;">RECEIVER NAME</th>
                                        <th style="width: 15%;">SENDER EMAIL</th>
                                        <th style="width: 15%;">RECEIVER EMAIL</th>
                                        <th style="width: 10%;">PRICE</th>                                        
                                        <th style="width: 15%;">DATE</th>
                                        <th style="">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kristine Lilly</td>
                                        <td>Kristine Lilly</td>
                                        <td>test@gmail.com</td>
                                        <td>test@gmail.com</td>
                                        <td>$100</td>
                                        <td>14-10-2016</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target=".viewgiftcard-modal" class="view-btn"><img src="../assets/images/eye-icon.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <td>Kristine Lilly</td>
                                        <td>Kristine Lilly</td>
                                        <td>test@gmail.com</td>
                                        <td>test@gmail.com</td>
                                        <td>$100</td>
                                        <td>14-10-2016</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="javascript:void(0);" class="view-btn"><img src="../assets/images/eye-icon.png"></a>
                                                <li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kristine Lilly</td>
                                        <td>Kristine Lilly</td>
                                        <td>test@gmail.com</td>
                                        <td>test@gmail.com</td>
                                        <td>$100</td>
                                        <td>14-10-2016</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="javascript:void(0);" class="view-btn"><img src="../assets/images/eye-icon.png"></a>
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
        <div class="modal admin-modal fade viewgiftcard-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/images/cross.png" alt="close"></button>
                            <h2 class="modal-title">Detail</h2>
                        </div>
                        <div class="modal-body clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 left">
                                <img src="../assets/images/giftcard.png" class="img-responsive center-block" alt="image">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="user-text-detail">
                                    <div class="text-gray">Sender Name: <span>kristine</span></div>
                                    <div class="text-gray">Receiver Name: <span>kristine</span></div>
                                    <div class="text-gray">Sender Email: <span>test@gmail.com</span></div>
                                    <div class="text-gray">Receiver Email: <span>test@gmail.com</span></div>
                                    <div class="text-gray">Price: <span>$200</span></div>
                                    <div class="text-gray">Description:  <span>Star ratings are one of those classic UX patterns that everyone has tinkered with at one time or another. I had an idea get the UX part of it done with very little code and no JavaScript.</span></div>
                                </div>
                            </div>
                        </div>
                    </form>     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php include 'include/footer.php'; ?>     



    </body>

</html>

