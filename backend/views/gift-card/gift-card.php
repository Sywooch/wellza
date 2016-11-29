<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Gift Card';
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class="">Gift Card</h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                </div>

                <div class="table-responsive admintable">
                     <?php if (Yii::$app->session->hasFlash('gift_card_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('gift_card_message') ?>
                        </div>
                        <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 20%;">SENDER NAME</th>
                                <th style="width: 15%;">RECEIVER NAME</th>
                                <th style="width: 15%;">SENDER EMAIL</th>
                                <th style="width: 15%;">RECEIVER EMAIL</th>
                                <th style="width: 10%;">PRICE</th>                                        
                                <th style="width: 15%;">DATE</th>
                                <th style="">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($gift_cards) && !empty($gift_cards)) {
                                    foreach($gift_cards as $gift_card) {
                                        $from_name = !empty($gift_card->from_name) ? $gift_card->from_name : '' ;
                                        $to_name = !empty($gift_card->to_name) ? $gift_card->to_name : '';
                                        $from_email = !empty($gift_card->from_email) ? $gift_card->from_email : '' ;
                                        $to_email = !empty($gift_card->to_email) ? $gift_card->to_email : '' ;
                                        $amount = !empty($gift_card->amount) ? $gift_card->amount : '';
                                        if(!empty($gift_card->delivery_date)) {
                                            $delivery_date = explode('-',$gift_card->delivery_date);
                                            $date = $delivery_date[2].'-'.$delivery_date[1].'-'.$delivery_date[0];
                                        } else {
                                            $date = '';
                                        }  
                              
                            ?>
                                        <tr>
                                            <td><?=$from_name?></td>
                                            <td><?=$to_name?></td>
                                            <td><?=$from_email?></td>
                                            <td><?=$to_email?></td>
                                            <td>$<?=$amount?></td>
                                            <td><?=$date?></td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li>
                                                        <?php
                                                            if($gift_card->status == 'Active') {
                                                        ?>
                                                        <input id="<?=$gift_card->id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                        <?php
                                                            } else {
                                                        ?>
                                                        <input id="<?=$gift_card->id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="disable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                        <?php
                                                            }
                                                        ?>
                                                    </li>
                                                    <li>
                                                        <a id="<?=$gift_card->id?>" href="javascript:void(0);" data-toggle="modal" data-target=".viewgiftcard-modal" class="view-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/eye-icon.png"></a>
                                                    <li>
                                                    <li>
                                                        <a href="<?php echo Yii::$app->urlManager->createUrl('/')?>gift-card/delete-card/<?=$gift_card->id?>" class="delete-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                                    </li>    
                                                    <li><span id="loader-<?=$gift_card->id?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>    
                                                </ul>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo '<tr><td>No Record Found</td></tr>';
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
    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('gift-card')?>">
</main>
<div class="overlay"></div>
    <div id="preloader">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
<div class="modal admin-modal fade viewgiftcard-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/cross.png" alt="close"></button>
                    <h2 class="modal-title">Detail</h2>
                </div>
                <div id = "fill_content" class="modal-body clearfix">
                    <!--<div class="col-lg-4 col-md-4 col-sm-4 left">
                        <img src="< ?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/giftcard.png" class="img-responsive center-block" alt="image">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="user-text-detail">
                            <div class="text-gray">Sender Name: <span>kristine</span></div>
                            <div class="text-gray">Receiver Name: <span>kristine</span></div>
                            <div class="text-gray">Sender Email: <span>test@gmail.com</span></div>
                            <div class="text-gray">Receiver Email: <span>test@gmail.com</span></div>
                            <div class="text-gray">Price: <span>$200</span></div>
                            <div class="text-gray">Description:  <span>Star ratings are one of those classic UX patterns that everyone has tinkered with at one time or another. I had an idea get the UX part of it done with very little code and no JavaScript.</span></div>
                        </div>
                    </div>-->
                </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 
$this->registerCssFile("@web/css/gift-card/gift-card.css");
$this->registerJsFile('@web/js/gift-card/gift-card.js'); ?>