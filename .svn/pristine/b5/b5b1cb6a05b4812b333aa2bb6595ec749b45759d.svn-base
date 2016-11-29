<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Service Package';
?>

<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?= $this->title; ?></h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                    <?php
                    
                    $form = ActiveForm::begin([
                                'action' => '',
                                // 'action' => 'manage-product',
                                //'enableAjaxValidation' => true,
                                //'enableClientValidation' => true,
                                'method' => 'post',
                                'options' => [
                                    ['enctype' => 'multipart/form-data'],
                                    'class' => 'form-inline',
                                    'id' => 'package_category'
                                ]
                    ]);
                    ?>
                    <div class="search-box">
                        <div class="form-group">
                            <?= $form->field($model, 'category_name')->dropDownList($category, ['prompt' => 'Select Category', 'class' => 'selectpicker'])->label(false); ?>
                        </div>
                        <a id="addpackage" data-target=".add_pacakge" data-toggle="modal" href="javascript:void(0);" class="btn btn-info">ADD PACKAGE</a>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="table-responsive admintable02 admin-wellza-package">
                    <?php if (Yii::$app->session->hasFlash('packages_message')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('packages_message') ?>
                        </div>
                    <?php endif; ?> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>MAIN CATEGORIES</th>
                                <th>SUB CATEGORIES</th>
                                <th>VIEW</th>                                        
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($dataprovider)) {
                                    foreach ($dataprovider as $data){
                                        //$data->service->category_name;
                                        $sub_category_id = !empty($data->service->category_id) ? $data->service->category_id : '';
                                        $category_name = !empty($data->service->category_name) ? $data->service->category_name : '';
                                        //echo $category_name;die;
                                        //echo '<pre/>';print_r($data->service);die('...');                                
                            ?>
                            <tr>
                                <td>
                                    <div class="category-name">
                                        <div class="category-icon">
                                            <div class="icon">
                                                <img src="<?=$data->parent0->category_image?>" alt="<?=$data->parent0->category_name?>">
                                            </div>
                                        </div>
                                        <div class="name">
                                            <?=$data->parent0->category_name?>
                                        </div>
                                    </div> 
                                </td>
                                <td>
                                    <?= $category_name;?>
                                </td>
                                <td>
                                    <a id="<?=$data->parent?>" data-subcategory = "<?=$sub_category_id?>" href="javascript:void(0);" class="view-more" data-target=".view_add_pacakge" data-toggle="modal"> 
                                        <img src="resource/images/plus-green.png" alt="plus">
                                        <div class="color-green">View More/Edit</div>
                                    </a>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <?php
                                                if($data->status == 'Active') {
                                            ?>
                                            <input id="<?=$data->package_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                            <?php
                                                } else {
                                            ?>
                                            <input id="<?=$data->package_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                            <?php
                                                }
                                            ?>
                                        </li>
                                        <li>
                                            <a id="<?=$data->package_id?>" href="<?php echo Yii::$app->urlManager->createUrl('service-package').'/delete-package/'.$data->package_id?>" class="delete-btn"><img src="resource/images/delete-icon-btn.png"></a>
                                        <li>
                                        <li><span id="loader-<?=$data->package_id?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>    
                                    </ul>
                                </td>
                            </tr>
                            <?php
                                    
                                    }
                                } else {
                                    echo '<tr><td>No Record Found!</td></tr>';
                                }
                            ?>
                        </tbody>     

                    </table>
                </div>                
            </div>
        </div>
    </div>
    
    <input type="hidden" id="add_package_counter" name="add_package_counter" value=""/>
    <input type="hidden" id="current_operation" name="current_operation" value=""/>
    
    <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
    <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('service-package') ?>">
    <div class="overlay"></div>
    <div id="preloader">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
    <?php
        //Renders add package view
        echo Yii::$app->view->render('_add_package',['model' => $model_packages]);

        //Renders edit package view
        echo Yii::$app->view->render('_edit_package',['model' => $model_packages]);
    ?>

</main>
<?php
$this->registerCssFile("@web/css/service-package/service-package.css");
$this->registerJsFile('@web/js/service-package/service-package.js');
?>

