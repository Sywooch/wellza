<?php
/* * ********************************************************************************************************************* *//**
 *  View Name: inbox.php
 *  Created: Codian Team
 *  Description: Provider can chat with avaiable clients online.
 * ************************************************************************************************************************* */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Messages';
$site_url = \Yii::$app->urlManager->createUrl('');
?>
<main class="inner-content" id="inner-content">
    <div class="container inbox-section">
        <h1 class="inner-heading"><?=$this->title?></h1>
        <div class="inbox-content clearfix">
            <div id="users" class="col-lg-4 col-md-5 col-xs-12 left">
                <div class="input-group search-box">
                    <input class="search" type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <img src="../resource/images/inbox-search-icon.png" alt="search">
                        </button>
                    </span>
                </div><!-- /input-group -->

                <div class="list inbox-list">
                    <?php
                        if(!empty($providers_data)) {
                            
                            foreach($providers_data as $data) {
                                //echo '<pre/>';print_r($data);
                                $provider_id = !empty($data['user']['id']) ? $data['user']['id'] : '';
                                $profile_image = !empty($data['user']['profile_image_thumb']) ? '../'.$data['user']['profile_image_thumb'] : $site_url . '/images/default-profile.png';
                                $firstname = !empty($data['user']['first_name']) ? $data['user']['first_name'] : '';
                                $lastname = !empty($data['user']['last_name']) ? $data['user']['last_name'] : '';
                                $fullname = $firstname.' '.$lastname;
                                $fullname = trim($fullname);
                                $date = '';
                                if(!empty($data['message'][0]['updated_at'])) {
                                    $updateddate = $data['message'][0]['updated_at'];
                                    
                                    $tempdate = explode(' ',$updateddate);
                                    $tempdate = date_create($tempdate[0]);
                                    $date = date_format($tempdate,"M d, Y");
                                }
                                
                                $message = '';
                                if(!empty($data['message'][0]['message'])) {
                                    $message = substr($data['message'][0]['message'], 0, 40);                                    
                                } 
                                
                    ?>
                    <div id="<?=$provider_id?>" class="inbox-cnt-box">
                        <div class="img-box">
                            <img src="<?=$profile_image?>" alt="img">
                        </div>
                        <div class="info">
                            <div class="name-date">
                                <span class="name"><?=$fullname?></span>
                                <span class="date"><?=$date?></span>
                            </div>
                            <div class="message">
                                <?php
                                if(!empty($message) && $data['message'][0]['read_status'] == 'unread') {?>
                                
                                <span class="messagecount">&nbsp;</span>
                                <?php
                                    }
                                ?>
                                 <?=$message?>
                            </div>
                        </div>
                    </div>
                            <?php
                            }
                        } else {
                            echo '<div class="inbox-cnt-box">No Provider Available</div>';
                        }
                        
                   ?>
                </div>

            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 right">
                <div class="chat-box">
                    <div class="text-center"><a href="javascript:void(0);" class="loadmore">Loading Please Wait <i class="fa fa-spinner fa-spin"></i></a></div>
                    <div id="tb-message-box" class="message-box first">
                        <div class="message-box-section">
                            Choose Client to start conversation
                        </div>
                    </div>
                </div>
                <?php
                $form = ActiveForm::begin(
                                [
                                    'id' => 'inbox',
                                    'action' => ''
                ]);
                ?>
                
                    <div class="typing-area clearfix">
                        <!--<textarea class="form-control" rows="4" placeholder="Click here to Reply or Forward......."></textarea>-->
                        <?=
                        $form->field($model, 'notification', [
                            'template' => "{input}\n{hint}\n{error}",
                        ])->textarea(['rows' => '4', 'cols' => '6','placeholder' => 'Click here to Reply or Forward.......']);
                        ?>
                        <div class="chat-box-btn pull-right">
                            <!--< ?=
                            Html::submitButton('Add Photo', [
                                'class' => 'add-photo-btn',
                                'name' => 'attachement-button'
                            ]);
                            ?>-->
                            <?=
                            Html::submitButton('Send', [
                                'class' => 'send-btn',
                                'name' => 'send-button'
                            ]);
                            ?>
                            <!--<a href="#" class=" add-photo-btn"> <img src="../resource/images/file-attech.png" alt="Add Photo"> Add Photo</a>-->
                            <!--<a href="#" class=" send-btn"> Send <img src="../resource/images/send-icon.png" alt="Send"></a>-->
                        </div>
                      
                    </div>
                <?php ActiveForm::end(); ?>
                  <?php
                     $providerprofile_image = !empty($provid_data->profile_image_thumb) ? '../'.$provid_data->profile_image_thumb : $site_url . '/images/default-profile.png';         
                ?>
                        
                    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('provider/inbox') ?>">
                    <input type="hidden" id="currentuser_id" name="currentuser_id" value="<?php echo Yii::$app->user->id ?>">
                    <input type="hidden" id="profile_imgae" name="profile_imgae" value="<?php echo $providerprofile_image ?>"> 
            </div>
        </div>
    </div>  

</main>
<style>
    .messagecount {
        background-color: #52bfb8;
        border-radius: 50%;
        height: 10px;
        line-height: 0;
        text-align: center;
        width: 10px;
        float:right;
    }
</style>
<?php
//$this->registerCssFile('@web/css/client/myprofile.css');
$this->registerJsFile('@web/js/socket.io.js');
$this->registerJsFile('@web/js/client/inbox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/list.min.js');
/* * ********************************************************************************************************************************** */
// EOF: inbox.php
/* * ********************************************************************************************************************************** */
?>