<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;
?>
<header class="admin-header">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid p-l-0">
            <div class="main-content">
                <div class="left-side pull-left">
                    <a href="javascript:void(0);" class="logo"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/logo-admin.jpg" class="img-responsive"></a>
                    <a href="javascript:void(0);" class="leftmenubutton" checkout-sidebarbtn> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                </div>
                <div class="center pull-left">
                    <h3 class="pull-left hidden-xs">Manage <?=$this->title?></h3>
                </div>
                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse p-0" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <span class="user-image"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/admin.png" class="img-circle img-responsive"></span>
                                <?php
                                    $userId = \Yii::$app->user->identity->id;
                                    $userdata = \common\models\User::findOne(['id' => $userId]);
                                    $full_name = $userdata->first_name.' '.$userdata->last_name;
                                ?>
                                <span class="user-name"> <?=$full_name?>  <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Setting</a></li>
                                <li><a href="<?php echo Yii::$app->urlManager->createUrl('auth/login/logout')?>">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="notification-alert">
                                <img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/notification.png" alt="notification-icon"><span class="count">12</span>
                            </a>
                        </li>

<!--                            <li><a href="#"> Log out <i class="fa fa-power-off" aria-hidden="true"></i></a></li>-->
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
    </nav>

</div>


</header>   