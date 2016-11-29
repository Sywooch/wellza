<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Forget Password';
?>
<!---- Js to close the social login window ---->
<main class="inner-content top-bg-map">
            <h1 class="inner-heading"><?=$this->title?></h1>
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
                            <h2>FORGET PASSWORD</h2>
                            <a href="<?php echo Yii::$app->urlManager->createUrl('signup') ?>" class="back">Back</a>
                        </div>
                        <?php
                            $form = ActiveForm::begin(
                                            [
                                                'id' => 'forgetpassword',
                                'enableClientValidation'=>true,
                                'enableAjaxValidation'=>true
                            ]);
                        ?>
                            <?=
                            $form->field($model, 'email', [
                                'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                            ])->textInput(['class' => 'form-control', 'placeholder' => "Email"]);
                            ?>              
                        
                            <div class="form-group bottom-section">
                                <?=
                                    Html::submitButton('Send', [
                                        'class' => 'btn btn-info'
                                    ]);
                                ?>
                                
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </main>
