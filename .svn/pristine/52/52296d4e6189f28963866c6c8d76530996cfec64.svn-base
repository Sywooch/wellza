<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Main backend application asset bundle.
 */
//class AppAsset extends AssetBundle
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'resource/css/all.min.css',
        'resource/css/bootstrap-toggle.css',
        'vendor/owl.carousel/dist/assets/owl.carousel.min.css',
        'resource/css/bootstrap-switch.css',
        'resource/css/bootstrap-select.min.css',
        'resource/css/bootstrap-datetimepicker.min.css'
        
    ];
    //public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $js = [
        //'themes/admin_theme/js/forms.js',
        'resource/js/bootstrap-switch.min.js',
        'vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'vendor/owl.carousel/dist/owl.carousel.min.js',
        'resource/js/jquery.equalizer.min.js',
        'resource/js/bootstrap-select.min.js',
        'resource/js/moment.js',
        //'resource/js/bootstrap-datepicker.min.js',
        'resource/js/bootstrap-datetimepicker.min.js'
    ];
    public $jsOptions = [
       'position' => View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
