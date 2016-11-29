<?php
/* @var $this yii\web\View */
$this->title = 'Categories';
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?= $this->title ?></h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                    <?php
                    echo Yii::$app->view->render('_search', ['model' => $model, 'search' => $search]);
                    ?>
                    <a data-target=".add-category-modal" data-toggle="modal" href="javascript:void(0);" class="btn btn-info"> ADD CATEGORIES</a>
                </div>
                <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('category') ?>">    
                <div class="table-responsive admintable02">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>CATEGORIES</th>
                                <th>SUB CATEGORIES</th>
                                <th>SELECT SUB CATEGORIES</th>
                                <th>VIEW</th>                                        
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            if (!empty($dataprovider)) {

                                foreach ($dataprovider as $category) {
                                    $category_id = !empty($category->category_id) ? $category->category_id : '';
                                    $category_image = !empty($category->category_image) ? $category->category_image : '';
                                    $category_name = !empty($category->category_name) ? $category->category_name : '';
                                    $status = !empty($category->status) ? $category->status : '';
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="category-name">
                                                <div class="category-icon">
                                                    <div class="icon">
                                                        <img src="<?= $category_image ?>" alt="hair">
                                                    </div>
                                                </div>
                                                <div class="name">
                                                    <?= $category_name ?>
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                            <span class="cate-no color-666">14</span>
                                            <div>Sub Categories</div>
                                        </td>
                                        <td>
                                            <span class="cate-no color-orange">14</span>
                                            <div>Sub Categories</div>
                                        </td>
                                        <td>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl('category/subcategories') ?>/<?= $category_id ?>" class="view-more"> 
                                                <img src="resource/images/plus-green.png" alt="plus">
                                                <div class="color-green">View More</div>
                                            </a>
                                        </td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <?php
                                                    if ($status == 'Active') {
                                                        ?>
                                                        <input type="checkbox" id="<?= $category_id ?>" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="checkbox" id="<?= $category_id ?>" name="on-off-checkbox" data-on-color='success' data-label-text="disable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                                        <?php
                                                    }
                                                    ?>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" name="<?= $category_id ?>" class="delete-btn"><img src="resource/images/delete-icon-btn.png"></a>
                                                <li>
                                                <li><span id="loader<?= $category_id ?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>    
                                            </ul>

                                        </td>
                                    </tr> 
                                    <?php
                                    //$i++;
                                }
                            } else {
                                ?>
                                <tr>No Record Found</tr>
                                <?php
                            }
                            ?>                                    
                        </tbody>     

                    </table>
                </div>
                <div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>
            </div>
        </div>
    </div>

</main>
<!-- Add category section -->
<?php
echo Yii::$app->view->render('@app/views/category/_addcategory', ['model' => $model, 'icon_class' => $icon_class]);
?>
<?php $this->registerJsFile('@web/js/category.js'); ?>
