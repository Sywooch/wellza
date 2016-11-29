<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\widgets\Pjax;
use yii\web\UploadedFile;

$this->title = 'Provider SignUp';
?>
<main class="inner-content signup-page">
    <h1 class="inner-heading">SIGN UP</h1>
    <div class="inner-subheading">Bringing Beauty & Wellness Treatments To Your Door</div>
    <div class="container">
        <div class="serviceprovider-signup-section clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left">
                <div class="table">
                    <div class="inner-text">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right"> 
                <div class="top-heading clearfix">
                    <h2>SERVICE PROVIDER SIGN UP</h2>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('signup') ?>" class="back">Back</a>
                </div>

                <?php
                $form = ActiveForm::begin(
                                [
                                    'id' => 'providerform',
                                    'enableAjaxValidation' => true,
                                    'enableClientValidation' => true,
                                    'options' => [
                                        ['enctype' => 'multipart/form-data']
                                    ]
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

                    <div class="form-group bottom-section">
                        <!--<div class="fileUpload btn btn-primary">
                            <span>ATTACH CV</span>

                            < ?=
                            $form->field($model, 'attached_cv', [ 'template' => "{input}\n{hint}\n{error}",
                            ])->fileInput(['id' => 'attached_cv', 'class' => 'upload btn btn-warning']);
                            ?>
                        </div>-->                                          

                        <?=
                        Html::submitButton('SIGN UP', [
                            'class' => 'btn btn-info'
                        ]);
                        ?>
                        <label id="uploadFile"></label>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</main>
<?php $this->registerCssFile('@web/common/css/common.css'); ?>
<?php $this->registerJsFile('@web/common/js/common.js'); ?>
             