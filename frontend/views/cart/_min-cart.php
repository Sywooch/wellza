<?php
/*
 * Min cart will shows the commodities added by the client
 */ 
use yii\web\UrlManager;

 if (count(Yii::$app->cart->getPositions()) > 0) { 
    
    
    foreach (Yii::$app->cart->getPositions() as $cart) {
        $id = $cart->getId();
        $category_data = \common\models\Packages::getPackageName($id);
        $gift_card_data = \common\models\GiftVoucher::findAll($id);
        $commodity_type = $cart->getType();
        
        if($commodity_type == 'appointment') {
            $subcategory_data = \common\models\Packages::getPackageSubName($id);
            $category_name = $category_data->parent0->category_name;
            $subcategory_name = $subcategory_data->service->category_name;
            
        ?>
            <li>
                <a href="#">
                    <div class="package-detail">
                        <h4><?= $category_name ?></h4>
                        <p><?= $subcategory_name ?></p>
                        <div class="price">$<?= $cart->appointment_price ?></div>
                    </div>
                    <div class="delete">
                        <button onclick="removeFromCart('<?= $cart->getId(); ?>','appointment');" class="btn delete-btn">
                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/delete-icon.png" alt="delete"/>
                        </button>
                    </div> 

                </a>
            </li>                       
        <?php
        }
        if ($commodity_type == 'giftcard') {
        ?>
            <li>
                <a href="#">
                    <div class="package-detail">
                        <h4>Gift Card</h4>
                        <p><?= $cart->from_name ?></p>
                        <div class="price">$<?= $cart->amount ?></div>
                    </div>
                    <div class="delete">
                        <button onclick="removeFromCart('<?= $cart->getId(); ?>','giftcard');" class="btn delete-btn">
                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/delete-icon.png" alt="delete"/>
                        </button>
                    </div> 

                </a>
            </li>                       
        <?php    
        }
        if ($commodity_type == 'wellza_membership') {
            //echo '<pre/>';
            //            print_r($cart);die;
        ?>    
            <li>
                <a href="#">
                    <div class="package-detail">
                        <h4>Wellza Membership</h4>
                        <p><?= $cart->duration ?></p>
                        <div class="price">$<?= $cart->price ?></div>
                    </div>
                    <div class="delete">
                        <button onclick="removeFromCart('<?= $cart->getId(); ?>','wellza_membership');" class="btn delete-btn">
                            <img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/delete-icon.png" alt="delete"/>
                        </button>
                    </div> 

                </a>
            </li> 
        <?php
        
        }
    
    }
        ?>
        <div id="checkout-btn" class="checkout-btn">
            <a href="<?php echo Yii::$app->urlManager->createUrl('cart/view-cart') ?>" class="btn btn-warning">View Cart</a>
            <a href="javascript:void(0)" class="btn btn-warning" data-target=".add-otherservice-dialog" data-toggle="modal">Checkout</a>
        </div>
    <?php
} else {
    ?>
        <div class="no-item-cart">
            <div class="zero-item">
                <div class="zero"><span>0</span></div>
                <div><img src="<?php echo Yii::getAlias('@web'); ?>/resource/images/cart-zero.png" alt="cart-zero" ></div>  
            </div>

            <div class="cart-msg">
                <h2>CART HAVE <br><span>NO ITEM</span></h2>
            </div>

        </div>
    <?php
}
?>


