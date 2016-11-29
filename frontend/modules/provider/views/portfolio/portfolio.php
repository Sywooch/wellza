<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: portfolio.php
 *  Created: Codian Team
 *  Description: Provider can manage his portfolio from here.
 * ************************************************************************************************************************* */

use yii\helpers\Html;
use yii\base\view;
use yii\web\UrlManager;
use yii\widgets\ActiveForm;
use yii\helpers\FileHelper;
use kartik\file\FileInput;
use yii\helpers\Url;

?>
<main class="inner-content" id="inner-content">
    <div class="container">
        <div class="addPortfolipMedia">
            <div class="row">
                <?php if (Yii::$app->session->hasFlash('portfolio_message')): ?>
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?= Yii::$app->session->getFlash('portfolio_message') ?>
                    </div>
                <?php endif; ?> 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 topHeader">
                    <h1 class="inner-heading pull-left">Add Portfolio</h1>
                    <div class="mediauploads">
                     <?php  
                            $form = ActiveForm::begin([
                                        'options' => [
                                            'id' => 'provider_add_portfolio',
                                            ['enctype' => 'multipart/form-data']
                                        ],

                                        'action' => 'portfolio/add-portfolio',
                                        'method' => 'post',
                                        'enableAjaxValidation' => true,
                                        'enableClientValidation' => true,                                        
                            ]);
                            // Usage with ActiveForm and model
                            // With model & without ActiveForm
                           
                            echo FileInput::widget([
                            'id' => 'input-id',    
                            'name' => 'Portfolio[media_url]',
                            'options'=>[
                                'multiple'=>true
                            ],
                            'pluginOptions' => [
                                
                                'showCaption' => false,
                                'browseLabel' =>  'Add Portfolio',
                                'browseClass' => 'btn-info btn pull-right',
                                'uploadUrl' => Url::toRoute(['/provider/portfolio/add-portfolio']),
                                'uploadExtraData' => [
                                    'album_id' => 20,
                                    'cat_id' => 'portfolio'
                                ],
                                'maxFileCount' => 10
                            ]   
                        ]);
                        ?>
                    </div>
                    
                    
                </div>
            </div>
            <div class="row">
                <?php
                    if(!empty($returndata)) {
                        //echo $returndata[0]['media_id'];
                        
                        foreach($returndata as $data) {
                            if(!empty($data['media_url'])){
                                
                ?>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 mediaBox lightbox" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class='lightbox-content'>
                                
                                <a id="portfolio-modal-<?=$data['media_id'];?>" data-target=".portfolio-modal-<?=$data['media_id'];?>" data-toggle="modal" href="javascript:void(0)">
                                   <?php
                                    if($data['media_type'] == 'Video') {
                                ?>
                                <img src="<?=$data['video_thumbnails']?>" alt="gallery-img" class="img-responsive">
                                <?php
                                    }
                                    if($data['media_type'] == 'Image') {
                                ?>
                                <img src="<?=$data['image_thumbnail']?>" alt="gallery-img" class="img-responsive">
                                <?php
                                    }
                                ?>
                                   
                               </a>
                            </div>
                        </div>                        
                <?php
                        }
                        
                        }
                    } else {
                        echo 'No Record Available.';
                    }
                ?>
            </div> 
            <!--div class="row">-->
                <?php
                    if(!empty($returndata)) {
                        //echo $returndata[0]['media_id'];
                        
                        foreach($returndata as $data) {
                            if(!empty($data['media_url'])){
                ?>
                        <div id="portfolio-modal-<?=$data['media_id'];?>" class="modal inner-modal fade portfolio-modal-<?=$data['media_id'];?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../resource/images/cross.png" alt="close"></button>
                            </div>

                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <?php
                                            if($data['media_type'] == 'Video') {
                                        ?>
                                        <video name= "media-video" class="showvideo" width="100%" height="100%" controls preload="auto" width="640" height="264" poster="<?=$data['video_thumbnails']?>">
                                            <source src="<?=$data['media_url']?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                        <?php
                                            }
                                            if($data['media_type'] == 'Image') {
                                        ?>
                                        <img src="<?=$data['media_url']?>" alt="gallery-img" class="img-responsive">
                                        <?php
                                            }
                                        ?>                                       
                                    </div>        
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->                   
                <?php
                        }
                        
                        }
                    } 
                ?>
            <!--</div>--> 
            <!--                <div class="row">
                                <div class="text-center">
                                    <a href="javascript:void(0);" class="loadmore">Load More</a>
                                </div>
                            </div>
            -->
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>
<style>
    .mediauploads {
        display: block;
        clear: both;
        height: 50%;
    }
    .file-error-message{
        display: none !important;    
    }
    .kv-file-upload,.kv-file-zoom,.file-upload-indicator {
        display:none;
    }
</style>
<script>
$(document).ready(function(){
    /*$('#input-id').on('fileuploaderror', function(event, data, msg) {
        var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
        console.log('File upload error');
       // get message
       alert(msg);
    });
    
   
    $('#input-id').on('fileuploaderror', function(event, data, previewId, index, jqXHR) {
        // do your validation and return an error like below
        return {
            message: 'You are not allowed to do that'            
        };       
    });
    $('#input-id').on('filebatchuploadcomplete', function(event, files, extra) {
        event.preventDefault();
        console.log('File batch upload complete');
    });*/
    
});

</script>