<?php
/************************************************************************************************************************//**
 *  FrontEnd Module Name: Provider
 *  View Name: _request_service.php
 *  Created: Codian Team
 *  Description: Service can provider raise a request to add category from here when category not avaulable in the 
 * provided list
 ***************************************************************************************************************************/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;
?>
<div class="modal inner-modal fade request-service" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <?php $form = ActiveForm::begin([
                'action' => 'service/request-service',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'method' => 'post',
                'options' => [
                    'id' => 'request_service'
                    ]
            ]);         
            ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">SEND REQUEST FOR ADD SERVICE</h2>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                             <?=
                                $form->field($model, 'category_name', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->textInput(['placeholder' => "Service Name", 'class' => "form-control input-lg", 'maxlength' => 50]);
                                ?>
                            <!--<div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Service Name">
                            </div>-->
                        </div>
                    </div>
                    <?=
                        Html::submitButton('ADD', [
                            'class' => 'btn btn-info btn-lg btn-block',
                            'name' => 'add_requestbtn',
                            'id' => 'add_requestbtn'
                        ]);
                    ?>
                    <!--<button type="button" class="btn btn-info btn-lg btn-block">ADD</button>-->
                </div>
            <?php ActiveForm::end(); ?>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
/*************************************************************************************************************************************/
// EOF: request_service.php
/*************************************************************************************************************************************/

