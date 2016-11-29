<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Coupon';
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?=$this->title?></h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                    <div class="panel-heading clearfix">
                        <a title="Add Coupon" data-target=".add_coupon" data-toggle="modal" href="javascript:void(0);" class="btn btn-info"> ADD COUPON</a>
                    </div>
                </div>
                
                <div class="table-responsive admintable">
                    <?php if (Yii::$app->session->hasFlash('coupon_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('coupon_message') ?>
                        </div>
                        <?php endif; ?> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 20%;">NAME</th>
                                <th style="width: 15%;">CODE</th>
                                <th style="width: 15%;">DISCOUNT</th>
                                <th style="width: 10%;">START DATE</th>                                        
                                <th style="width: 15%;">END DATE</th>
                                <th style="width: 15%;">TOTAL USES</th>
                                <th style="">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($dataprovider)){
                                    foreach ($dataprovider as $data) {
                                        $id = $data->id;
                                        $name = !empty($data->name) ? $data->name : '';
                                        $code = !empty($data->code) ? $data->code : '';
                                        $discount = !empty($data->discount) ? $data->discount : '';
                                        $date_start = '';
                                        if(!empty($data->date_start)) {
                                            $date_start_array = explode('-', $data->date_start);
                                            $date_start = $date_start_array[2].'-'.$date_start_array[1].'-'.$date_start_array[0];
                                        }
                                        $date_end = '';
                                        if(!empty($data->date_end)) {
                                            $date_end_array = explode('-', $data->date_end);
                                            $date_end = $date_end_array[2].'-'.$date_end_array[1].'-'.$date_end_array[0];
                                        }
                                        
                                        $uses_total = !empty($data->uses_total) ? $data->uses_total : '';
                                        $status = $data->status;
                                
                            ?>
                            <tr>
                                <td><?=$name?></td>
                                <td><?=$code?></td>
                                <td><?=(int)$discount?>%</td>
                                
                                <td><?=$date_start?></td>
                                <td><?=$date_end?></td>
                                <td><?=$uses_total?></td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <?php
                                                if($status == 'Active') {
                                            ?>
                                            <input data-title="<?=$id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                            <?php
                                                } else {
                                            ?>
                                            <input data-title="<?=$id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="disable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                            <?php
                                                }
                                            ?>
                                        </li>
                                        <li>
                                            <a data-title="<?=$id?>" href="javascript:void(0);" data-toggle="modal" data-target=".couponview-modal" class="view-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/eye-icon.png"></a>
                                        <li>
                                        <li>
                                            <a data-title="<?=$id?>" href="javascript:void(0);" data-toggle="modal" data-target=".edit_coupon" class="edit-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/edit_white.png"></a>
                                        <li>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl('/')?>coupon/delete-coupon/<?=$id?>" class="delete-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                        </li>
                                        <li><span id="loader-<?=$id?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                    }
                                
                                }
                            ?>                            
                        </tbody>
                    </table>
                </div>
                <?php
                        echo \yii\widgets\LinkPager::widget([
                            'pagination'=>$pagination
                            
                        ]);
                    ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('/')?>">
    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('coupon')?>">
</main>
<div class="overlay"></div>
<div id="preloader">
    <i class="fa fa-spinner fa-spin"></i>
</div>
<!-- Renders view to show coupon details -->
<?php
    echo Yii::$app->view->render('_coupon-detail',['model' => $model]);
?>
<!-- Renders view to add coupon in the database -->
<?php
    echo Yii::$app->view->render('_add-coupon',['model' => $model,'code' =>$code]);
?>

<!-- Renders view to edit coupon in the database -->
<?php
    echo Yii::$app->view->render('_edit_coupon',['model' => $model]);
?>

<?php 
$this->registerCssFile("@web/css/coupon/coupon.css");
$this->registerJsFile('@web/js/coupon/coupon.js'); ?>

