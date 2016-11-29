<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\widgets\Pjax;
use yii\web\UploadedFile;

$this->title = 'Client SignUp';

?>

<main class="inner-content signup-page">
    <h1 class="inner-heading">SIGN UP</h1>
    <div class="inner-subheading">Bringing Beauty & Wellness Treatments To Your Door</div>
    <div class="container">
        <div class="clientsignup-section clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left">
                <div class="table">
                    <div class="inner-text">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right">
                <div class="top-heading clearfix">
                    <h2>CLIENT SIGN UP</h2>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('auth/signup')?>" class="back">Back</a>
                </div>
                 <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                        <?php endif; ?>                 
                <?php
                $form = ActiveForm::begin(
                                [
                                    'id' => 'clientform',
                                    'enableAjaxValidation' => true,
                                    'enableClientValidation' => true                                    
                                ]);
                ?>                    
                    <?=
                    $form->field($model, 'first_name', [
                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                    ])->textInput(['class' => 'form-control user', 'autofocus' => true, 'placeholder' => "First Name"]);
                    ?>

                    <?=
                    $form->field($model, 'last_name', [
                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                    ])->textInput(['class' => 'form-control user', 'placeholder' => "Last Name"]);
                    ?>

                    <?=
                    $form->field($model, 'email', [
                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                    ])->textInput(['class' => 'form-control', 'placeholder' => "Email Address"]);
                    ?>

                    <?=
                    $form->field($model, 'password', [
                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                    ])->passwordInput(['class' => 'form-control password', 'placeholder' => "Password"]);
                    ?>
                    <?=
                        $form->field($model, 'user_type')->hiddenInput(['value'=> 'Provider'])->label(false);
                    ?>
                
                    <?=
                    $form->field($model, 'confirm_password', [
                        'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                    ])->passwordInput(['class' => 'form-control password', 'placeholder' => "Confirm Password"]);
                    ?>
                    <?=
                        $form->field($model, 'user_type')->hiddenInput(['value'=> 'Client'])->label(false);
                    ?>
                    <div class="form-group bottom-section">
                        <!--<button type="submit" class="btn btn-info">SIGN UP</button>-->
                        <?=
                        Html::submitButton('SIGN UP', [
                            'class' => 'btn btn-info'
                        ]);
                        ?>
                        <div class="login-social-site">
                            <?= yii\authclient\widgets\AuthChoice::widget([
                                    'baseAuthUrl' => ['signup/auth']
                            ]) ?>
                            <!--<ul class="list-inline">
                                <li>
                                    or login   
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
