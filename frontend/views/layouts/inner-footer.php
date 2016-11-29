<?php
/************************************************************************************************************************//**
 *  View Name: inner-footer.php
 *  Created: Codian Team
 *  Description: This is the inner footer file which will be shown to all the inner pages.It also consists of section which
 *  are common in the site and will be used by many pages in the site.
 ***************************************************************************************************************************/
use yii\web\View;
?>
<footer class="inner-footer">
    <ul class="list-inline footer-links">
        <li>
            <a href="index.html">Home</a> 
        </li>
        <li>
            <a href="javascript:void(0)">Products</a> 
        </li>
        <li>
            <a href="javascript:void(0)">Promotions</a> 
        </li>
        <li>
            <a href="javascript:void(0)"> Portfolio</a> 
        </li>
        <li>
            <a href="javascript:void(0)">Services</a> 
        </li>
        <li>
            <a href="javascript:void(0)">Blog  </a> 
        </li>
        <li>
            <a href="javascript:void(0)">Careers </a>  
        </li>
        <li>
            <a href="javascript:void(0)">Contact Us </a>  
        </li>
        <li>
            <a href="javascript:void(0)"> Login </a>  
        </li>
        <li>
            <a href="javascript:void(0)"> Sign Up </a>  
        </li>
    </ul>

    <div class="modal admin-modal fade wellza-memebership-popup" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/cross.png" alt="close"></button>
                        <div class="col-lg-6 membership-left">
                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/membership-icon.png" class="img-responsive" alt="membership-icon" align="center">
                        </div>

                        <div class="col-lg-6 membership-right">
                            <div class="membership-info">
                                <div class="heading">
                                    <h2>Wellza Membership</h2>
                                    <p>Join today & save 15-25% on all Service. Monthly credits roll over, never expire, can be gifted to others</p>
                                </div>


                                <div class="price-box">
                                    <h2>$49.90</h2>
                                    <p>PAY EVERY 30DAYS</p>
                                </div>

                                <div class="bottom">
                                    <h2>Membership Benefits</h2>
                                    <p>Lorem Ipsum has been the industry’s  when an unknown printer took a galley</p>
                                </div>
                            </div>

                            <div class="membership-info-next">
                                <div class="heading">
                                    <h2> Annual Membership</h2>
                                </div>


                                <div class="price-box">
                                    <p>Massage a month at special rate (15 to 25% off).</p>
                                    <hr>
                                    <p>FREE makeup and massage table and sheet set ($340 value), yours to keep.</p>
                                    <hr>
                                    <p>Preferred pricing on all massages.</p>
                                    <hr>
                                    <p>Credits roll over, never expire, can be gifted to others.</p>
                                </div>

                            </div>

                            <div class="bottom-btn">
                                <a id="start_membership" href="javascript:void(0)" class="btn-info">START NOW</a>
                                <a href="javascript:void(0)" class="btn-warning next-div">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

<!---------------------------------------------- Add Service Confirmation pop up starts here ------------------------------------------------------------->
    <div class="modal inner-modal add-otherservice-dialog fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/cross.png" alt="close"></button>
                        <div class="col-lg-12 dialog_box text-center">
                            <div class="dialog_box_pera">
                                WOULD YOU LIKE TO ADD ANOTHER
                                <div class="highlight_txt">SERVICE/PRODUCT?</div>
                            </div>
                            <div class="dialog_box_btn">
                                <a href="javascript:void(0)" class="btn btn-info">YES</a>
                                <a href="<?php echo Yii::$app->urlManager->createUrl('cart/view-cart')?>" class="btn btn-warning">NO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

<!------------------------------------------- Add Service Confirmation pop up ends here -------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------- View/Edit Profile starts here -------------------------------------------------------------------->

    <div id="manage-profile-modal" class="modal inner-modal fade manage-profile-modal" tabindex="-1" role="dialog">
        <!--Please don't delete this section-->
        <!--This will be filled automatically through ajax-->
    </div><!-- /.modal -->
<!---------------------------------------------------------- View/Edit Profile ends here -------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->

    <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
    <?php
        if(!Yii::$app->user->isGuest && Yii::$app->user->isProvider){
    ?>
        <input type="hidden" id="current_user_url" name="current_user_url" value="<?php echo Yii::$app->urlManager->createUrl('/provider') ?>">
    <?php
        } else {
    ?>
        <input type="hidden" id="current_user_url" name="current_user_url" value="<?php echo Yii::$app->urlManager->createUrl('/client') ?>">
    <?php
        }
    ?>
    <input type="hidden" id="cart_url" name="cart_url" value="<?php echo Yii::$app->urlManager->createUrl('cart') ?>">
    <div class="copyright">
        Copyright © Wellza 2016 . All Rights Reserved.
    </div>

</footer>
<?php
$this->registerJsFile('@web/js/inner_footer.js');
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
/*************************************************************************************************************************************/
// EOF: inner-footer.php
/*************************************************************************************************************************************/
?>
