<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\view;
use yii\web\UrlManager;

$this->title = 'Wellza Bundles';
//echo '<pre/>';
//print_r($dataprovider);die('...');
?>
<main class="inner-content" id="inner-content">
    <div class="container wellza-bundle-section">
        <h1 class="inner-heading"><?=$this->title?></h1>
        <div class="inner-subheading">Select your bundle today and save on your favorite services! </div>
        <div class="wellzabundle-tabs">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <?php
                            if(!empty($dataprovider)) {
                                $i=0;
                                foreach ($dataprovider as $data) {
                        ?>
                        <li role="presentation" class="<?php if($i==0) echo 'active'?>">
                            <a href="#wedding-package" aria-controls="hair-makeup" role="tab" data-toggle="tab">
                                <?= strtoupper($data->bundle_name)?>
                            </a>
                        </li>
                        <?php
                                $i++;
                                }
                            }
                        ?>
                        <!--<li role="presentation">
                            <a href="#spa-package" aria-controls="training" role="tab" data-toggle="tab">
                                SPA PACKAGE
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#massage-package" aria-controls="nails" role="tab" data-toggle="tab">
                                MASSAGE PACKAGE
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#daily-package" aria-controls="skin" role="tab" data-toggle="tab">
                                DAILY PACKAGE
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#weekly-package" aria-controls="massage" role="tab" data-toggle="tab">
                                WEEKLY PACKAGE
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#monthly-package" aria-controls="bundle" role="tab" data-toggle="tab">
                                MONTHLY PACKAGE
                            </a>
                        </li>-->
                        
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="wedding-package">
                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <?php
                                        if(!empty($bundle_categories)) {
                                            $i=0;
                                            for($i=0;$i<count($bundle_categories);$i++) {
                                               echo '<pre/>';print_r($data);die('...'); 
                                        ?>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/hair-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/nails-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/skin-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/training-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/brow_shaping_icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="spa-package">

                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="massage-package">
                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="daily-package">

                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="weekly-package">
                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="monthly-package">
                            <div class="bundle-boxes-slider owl-carousel owl-theme">
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="list-unstyled clearfix">
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <div class="service-detail">
                                                    <div class="price">$80</div>
                                                    <div class="category-name">
                                                        Hair & Make up
                                                        <div class="saving">save 25%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="icon-box">
                                                    <img src="../resource/images/bundle-icon.png" alt="bundle-icon">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                        }
                                        
                                    }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="center-block text-center btn-bottom">
                <a href="javascript:void(0);" class="btn btn-primary btn-lg">ADD TO CART</a>
            </div>


        </div>
    </div>
</main>
<?php $this->registerJsFile('@web/js/client/bundle.js'); ?>