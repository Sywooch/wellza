<?php

use yii\web\UrlManager;
?>
<header class="inner-header">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="main-content">
                <div class="left-side pull-left">
                    <a href="<?php echo Yii::$app->urlManager->createUrl('/') ?>" class="logo"><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/innerpage-logo.png" class="img-responsive"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if (!Yii::$app->user->isGuest && (Yii::$app->user->isClient || Yii::$app->user->isProvider)) {
                            $userId = \Yii::$app->user->identity->id;
                            $userdata = \common\models\User::findOne(['id' => $userId]);
                            $full_name = $userdata->first_name.' '.$userdata->last_name;
                            $profile_image = !empty($userdata->profile_image_thumb) ? Yii::getAlias('@web').'/'.$userdata->profile_image_thumb : Yii::getAlias('@web').'/images/default-profile.png';
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <span class="user-image"><img src="<?php echo $profile_image ?>" class="img-circle img-responsive"></span>
                                <span class="user-name hidden-xs"> <?=$full_name?>  <b class=""><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/gear.png" alt="gear"></b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Setting</a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl('auth/login/logout') ?>">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>

                    <li class="dropdown cart">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="cart-image">
                                <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/cart.png" class="img-responsive" alt="cart">  
                                <span id="cartcount" class="count"><?= count(Yii::$app->cart->getPositions()); ?></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="cart-heading">
                                <h4>WELLZA CART</h4>
                            </div>
                            <div id="mincart_block">
                                <!-- Min cart view will show here -->
                            </div>
                            
                        </ul>
                    </li>
                <?php
                if (!Yii::$app->user->isGuest && (Yii::$app->user->isClient || Yii::$app->user->isProvider)) {
                    ?>
                        <li class="dropdown notification">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="cart-image">
                                    <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/notification.png" class="img-responsive" alt="cart">  
                                    <span class="count">2</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu" style="display: none;">
                                <div class="cart-heading clearfix">
                                    <ul class="list-inline">
                                        <li><h4>New notifications</h4></li>
                                        <li class="pull-right"><input id="switch-size"  name="on-off-switch" type="checkbox"></li>
                                    </ul>
                                </div>

                                <li>
                                    <div class="notification-box">
                                        <div class="icon">
                                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/check-icon.png" alt="icon"/>
                                        </div> 
                                        <div class="detail">
                                            <a href="#"><h4>Hair & Make up - 90 MINUTES - 3 MILES</h4></a>
                                            <div class="date-time">06.14.2014 @ 13:02</div>
                                            <p>Opt for our push lorum to aio consectetur adipiscing elit. Vivamus interdum, eget suscipitlectus dictum blandit eleifend. Aenean sapien hi.</p>
                                            <a class="read-more" href="javascript:void(0);">Read More..</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="notification-box">
                                        <div class="icon">
                                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/envelop.png" alt="icon"/>
                                        </div> 
                                        <div class="detail">
                                            <a href="#"><h4>Hair & Make up - 90 MINUTES - 3 MILES</h4></a>
                                            <div class="date-time">06.14.2014 @ 13:02</div>
                                            <p>Opt for our push lorum to aio consectetur adipiscing elit. Vivamus interdum, eget suscipitlectus dictum blandit eleifend. Aenean sapien hi.</p>
                                            <a class="read-more" href="javascript:void(0);">Read More..</a>
                                        </div>
                                    </div>
                                </li>
                                <!--
                                                                    <div class="loadmore">
                                                                        <a href="javascript:void(0);">Load More</a>
                                                                    </div>-->
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="leftmenubutton" checkout-sidebarbtn> 
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                        </li>
                    <?php
                }
                ?>
                </ul>

            </div><!-- /.container-fluid -->
        </div>
    </nav>
</header>