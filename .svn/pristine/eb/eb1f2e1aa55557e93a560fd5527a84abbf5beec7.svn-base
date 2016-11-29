<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = "Service Providers";
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class="">Service Providers</h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                    <?php
                        //Renders search products view
                        echo Yii::$app->view->render('_search',['model' => $model, 'search' => $search]);
                    ?> 
                </div>
                    
                <div class="table-responsive admintable">
                    <?php if (Yii::$app->session->hasFlash('provider_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('provider_message') ?>
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 15%;">NAME</th>
                                <th style="width: 10%;">MOBILE</th>
                                <th style="width: 10%;">BIRTHDATE</th>
                                <th style="width: 10%;">GENDER</th>                                        
                                <th style="width: 20%;">LOCATION</th>
                                <th style="width: 10%;">VERIFIED</th>
                                <th style="width: 10%;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                                               
                         $url = \yii\helpers\Url::to('@apilocal', true).'/';
                          
                         if(!empty($dataprovider)) {
                                
                                foreach ($dataprovider as $data) {                                    
                                    if(!empty($data->profile_image_thumb)) {
                                        $image = \Yii::$app->urlManagerFrontEnd->createUrl('/').$data->profile_image_thumb;
                                    } else {
                                        //set default image
                                        $url = \yii\helpers\Url::to('@apilocal', true).Yii::getAlias('@defaultimg');
                                        $image = $url;
                                    }                                    
                                    
                                    $user_id = $data->id;
                                    $first_name = !empty($data->first_name) ? $data->first_name : '';
                                    $last_name = !empty($data->last_name) ? $data->last_name : '';
                                    $name = $first_name.' '.$last_name; 
                                    $mobile = !empty($data->mobile) ? $data->mobile : '';
                                    $birth_date = !empty($data->birth_date) ? $data->birth_date : '';
                                    if(!empty($birth_date)) {
                                        $date_array = explode('-',$birth_date);
                                        $birth_date = $date_array[2].'-'.$date_array[1].'-'.$date_array[0]; 
                                    }                                    
                                    
                                    $gender = !empty($data->gender) ? $data->gender : '';
                                    $address = !empty($data->address) ? $data->address .',' : '';
                                    $country = !empty($data->country) ? $data->country : '';
                                    $status = $data->status;
                                    $verified = $data->verified;
                                    $location = $address.$country; 
                        ?>
                                    <tr>
                                        <td>
                                            <div class="category-name">
                                                <div class="img-box">
                                                    <div class="customer-image">
                                                        <img src="<?=$image?>" class="img-responsive img-circle" alt="hair">
                                                        </div>
                                                    </div>
                                                    <div class="name">
                                                        <a href="<?php echo Yii::$app->urlManager->createUrl('provider-detail').'/'.$user_id ?>" class="view-btn"><?=$name?></a>
                                                        
                                                    </div>
                                                </div> 
                                            </td>
                                            <td>(+012) <?=$mobile?></td>
                                            <td><?=$birth_date?></td>
                                            <td><?=$gender?></td>
                                            <td><?=$location?></td>
                                            <td>
                                                <?php
                                                    if($verified == 'Yes') {
                                                    ?>
                                                <input type="checkbox" id="<?= $user_id ?>" class="verified" name="on-off-checkbox-verified" data-on-color='success' data-label-text="Verified" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                    <?php
                                                        } else {
                                                        ?>
                                                        <input type="checkbox" id="<?= $user_id ?>" class="verified" name="on-off-checkbox-verified" data-on-color='success' data-label-text="Unverified" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                    <?php
                                                        }
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <ul class="list-inline">
                                                    
                                                    <li>
                                                        <?php
                                                            if($status == 10) {
                                                        ?>
                                                        <input type="checkbox" id="<?= $user_id ?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                        <?php
                                                            } else {
                                                        ?>
                                                        <input type="checkbox" id="<?= $user_id ?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                        <?php
                                                            }
                                                        ?>
                                                    </li>
                                                    <!--<li>
                                                        <a href="< ?php echo Yii::$app->urlManager->createUrl('provider-detail').'/'.$user_id ?>" class="view-btn"><img src="< ?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/eye-icon.png"></a>
                                                    <li>-->
                                                    <li>
                                                        <a href="#" id="<?=$user_id ?>" class="delete-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                                    <li>    
                                                        <li><span id="loader<?= $user_id ?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>
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
                <!--<div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>-->              
                <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('/')?>">
                <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('provider')?>">
            </div>
        </div>
    </div>
</main>
<?php $this->registerJsFile('@web/js/provider/provider.js'); ?>