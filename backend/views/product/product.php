<?php
/* @var $this yii\web\View */
$this->title = 'Products';
?>
<main class="content admin-page clearfix" id="content">
    <div class="tabpanel">                    
        <div class="panel-body">
            <div class="table-container">
                <div class="panel-heading clearfix"> 
                    <div class="main-heading pull-left">
                        <h4 class=""><?=$this->title;?></h4>
                        <p class="subline">Lorum Ipsum kolcomi chompica tori edo kopari to matoi</p>
                    </div>
                    <?php
                        //Renders search products view
                        echo Yii::$app->view->render('_search',['model' => $model,'category' => $category,'subcategory' => $subcategory,'category_id' => $category_id,'sub_category_id' => $sub_category_id]);
                    ?>              

                </div>
                <div class="table-responsive admintable02">
                    <?php if (Yii::$app->session->hasFlash('category_success')): ?>
                        <div class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?= Yii::$app->session->getFlash('category_success') ?>
                        </div>
                        <?php endif; ?> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th>SR. NUMBER</th>
                                <th>MAIN CATEGORY</th>
                                <th>SUB CATEGORY</th>                                        
                                <th>PRICE</th>
                                <th>DISC. PRICE</th>
                                <th>QUT.</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //echo $dataprovider[0]['id'];
                               // echo '<pre/>';print_r($dataprovider);die('....');
                               // for($i=0;$i<count($dataprovider);$i++) {
                            if(!empty($dataprovider)){
                                foreach($dataprovider as $data){
                                    //echo "<pre>";
                                    //print_r($data);die('...');
                                   //echo  $data->services->category_name."<br>";
                                    $product_id = $data->id;

                                    $product_name   = !(empty($data->product_name))? $data->product_name : '';
                                    $quantity       = !(empty($data->quantity))? $data->quantity : '';
                                    $category_name = !(empty($data->services->category_name))? $data->services->category_name : '';
                                    $sub_category_name = !(empty($data->subCategory->category_name))? $data->subCategory->category_name : ''; 
                                    $gross_price    = !(empty($data->price))? $data->price : '';
                                    $discount_price = !(empty($data->selling_price))? $data->selling_price : '';
                                    $sr_number       = !(empty($data->sr_number))? $data->sr_number : '';
                                    $status    = !(empty($data->status)) ? $data->status : '';

                                    $url = \yii\helpers\Url::to('@web', true);
                                    //echo  $data->productImage[0]->product_image;die('...');   
                                   if(!empty($data->productImage[0]->product_image)) {

                                        $image_url = $url. $data->productImage[0]->product_image;
                                    } else {
                                        $image_url = $url . '/uploads/products/default-thumb.jpg';
                                    }

                                    if(!empty($data->long_description)) {
                                        $description = $data->long_description;
                                        $description = yii\helpers\StringHelper::truncate($description, 50);
                                    }
                            ?>
                            <tr>
                                <td>
                                    <div class="product-name">
                                        <div class="product-icon">
                                            <div class="icon">
                                                <img src="<?=$image_url?>" alt="product" class="img-circle img-responsive">
                                            </div>
                                            <div class="product-name"><?=$product_name?></div> 
                                        </div>
                                    </div> 
                                </td>
                                <td>

                                    <div><?=$sr_number?></div>
                                </td>
                                <td>

                                    <div><?=$category_name?></div>
                                </td>
                                <td>

                                    <div><?=$sub_category_name?></div>

                                </td>
                                <td>

                                    <div class="color-orange">$<?=$gross_price?></div>

                                </td>
                                <td>

                                    <div class="color-green">$<?=$discount_price?></div>

                                </td>
                                <td>

                                    <div class="color-666"><?=$quantity?></div>

                                </td>
                                <td class="discription-area">

                                    <div class="discription"><?=$description?></div>

                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <?php
                                                if(!empty($status) && $status == 'Active') {
                                                    
                                                
                                            ?>
                                            <input id="<?=$product_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="enable" data-on-text="&nbsp;" data-off-text="&nbsp;" checked>
                                            <?php
                                                } else {
                                            ?>
                                            <input id="<?=$product_id?>" type="checkbox" name="on-off-checkbox" data-on-color='success' data-label-text="disable" data-on-text="&nbsp;" data-off-text="&nbsp;">
                                            <?php
                                                }
                                            ?>
                                        </li>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl('product').'/delete-product/'.$product_id?>" class="delete-btn"><img src="<?php echo Yii::$app->urlManager->createUrl('/')?>resource/images/delete-icon-btn.png"></a>
                                        <li>
                                        <li>
                                            <!--<a href="< ?php echo yii\helpers\Url::toRoute(['product/manage-product',['id' => $product_id]]);?>">Edit</a>-->
                                            <!--<a data-toggle="modal" data-target=".add-product-modal" href="< ?php echo Yii::$app->urlManager->createUrl('product/manage-product').'/'.$product_id?>">Edit</a>-->
                                            <a class="editproduct" title="<?=$product_id?>" data-toggle="modal" data-target=".add-product-modal" href="#">Edit</a>
                                        <li>
                                        <li><span id="loader<?= $product_id ?>" class="loaderclass"><i class="fa fa-spinner fa-spin"></i></span></li>     
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
                <input type="hidden" id="siteurl" name="siteurl" value="<?php echo Yii::$app->urlManager->createUrl('') ?>">
                <input type="hidden" id="pageurl" name="pageurl" value="<?php echo Yii::$app->urlManager->createUrl('product') ?>">
                <div class="text-center"><a href="javascript:void(0);" class="loadmore">Load more <i class="fa fa-spinner fa-spin"></i></a></div>
            </div>
        </div>
    </div>
</main>
<?php
    //Renders add/edit products view

   echo Yii::$app->view->render('_manage_product',['model' => $model,'category' => $category, 'subcategory' => $subcategory]);
?>