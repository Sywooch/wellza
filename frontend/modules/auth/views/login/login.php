<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Login';
?>
<style>
    .login-social-site span{display: inline-block;   margin-right: 15px;padding-top: 5px; vertical-align: middle;}
    .login-social-site #w0{ float: right; margin: 0; padding: 0;}
    .login-social-site ul.auth-clients, .login-social-site ul.auth-clients li{margin: 0; padding: 0;}
    .login-social-site ul.auth-clients a.facebook span.auth-icon{ margin: 0; border-radius: 50%;}
</style>
<!---- Js to close the social login window ---->
<main class="inner-content login-page">
            <h1 class="inner-heading">LOGIN</h1>
            <div class="inner-subheading">Bringing Beauty & Wellness Treatments To Your Door</div>
            <div class="container">
                <div class="login-section clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left">
                        <div class="table">
                            <div class="inner-text">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right">
                        <ul class="list-inline top-btn">
                            <li class="active"><a href="login">LOGIN</a></li>
                            <li><a href="signup">SIGN UP</a></li>
                        </ul>
                        <?php if (Yii::$app->session->hasFlash('info')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('info') ?>
                        </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->hasFlash('login_error')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('login_error') ?>
                        </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                        <?php endif; ?>
                         <?php if (Yii::$app->session->hasFlash('invalid_user')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('invalid_user') ?>
                        </div>
                        <?php endif; ?>
                        <?php
                            $form = ActiveForm::begin(
                                            [
                                                'id' => 'loginform',
                                                'enableAjaxValidation' => true,
                                                'enableClientValidation' => true,
                                            ]);
                        ?>
                            <?=
                            $form->field($model, 'email', [
                                'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                            ])->textInput(['class' => 'form-control', 'placeholder' => "Email"]);
                            ?>

                            <?=
                            $form->field($model, 'password', [
                                'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                            ])->passwordInput(['class' => 'form-control password', 'placeholder' => "Password"]);
                            ?>
                            
                            <div class="form-group forgot-password">
                                <?= Html::a('Forget your password?', ['/forgotpassword']) ?>
                                <!--<a href="javascript:void(0)">Forget your password?</a>-->
                            </div>
                        <input type="hidden" id="slogin" name="slogin" value="socail_login" />
                            <div class="form-group bottom-section">
                                <?=
                                    Html::submitButton('LOGIN', [
                                        'class' => 'btn btn-info'
                                    ]);
                                ?>
                                <div class="login-social-site">
                                    <span>or login with </span>
                                    <?= yii\authclient\widgets\AuthChoice::widget([
                                    'baseAuthUrl' => ['login/auth']
                                    ]) ?>
                                    <!--<ul class="list-inline">
                                        <li>
                                            or login with   
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>-->

                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </main>
