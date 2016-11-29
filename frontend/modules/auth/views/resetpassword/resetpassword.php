<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\widgets\Pjax;
use yii\web\UploadedFile;

$this->title = 'Reset Password';
?>
<main class="inner-content top-bg-map">
    <h1 class="inner-heading">RESET PASSWORD</h1>
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
                    <h2>RESET PASSWORD</h2>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('signup') ?>" class="back">Back</a>
                </div>

                <?php
                $form = ActiveForm::begin(
                                [
                                    'id' => 'resetpassword',
                                    'enableAjaxValidation' => true,
                                    'enableClientValidation' => true                                    
                ]);
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
                        <?=
                        Html::submitButton('SUBMIT', [
                            'class' => 'btn btn-info'
                        ]);
                        ?>                        
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</main>

             