<?php


namespace common\assets;


use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class BaseMetronicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'vendors/general/perfect-scrollbar/css/perfect-scrollbar.css',
        'vendors/general/tether/dist/css/tether.css',
        'vendors/general/owl.carousel/dist/assets/owl.carousel.css',
        'vendors/general/owl.carousel/dist/assets/owl.theme.default.css',
        'vendors/general/animate.css/animate.css',
        'vendors/general/socicon/css/socicon.css',
        'vendors/custom/vendors/line-awesome/css/line-awesome.css',
        'vendors/custom/vendors/flaticon/flaticon.css',
        'vendors/custom/vendors/flaticon2/flaticon.css',
        'vendors/general/@fortawesome/fontawesome-free/css/all.min.css',
        'css/skins/header/base/light.css',
        'css/skins/header/menu/light.css',
        'css/skins/brand/dark.css',
        'css/skins/aside/dark.css'

    ];


    public $js= [
        //global mandatory
        'vendors/general/popper.js/dist/umd/popper.js',
        'vendors/general/js-cookie/src/js.cookie.js',
        'vendors/general/moment/min/moment.min.js',
        'vendors/general/tooltip.js/dist/umd/tooltip.min.js',
        'vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js',
        'vendors/general/sticky-js/dist/sticky.min.js',
        'vendors/general/wnumb/wNumb.js',

        //global optional
        'vendors/general/jquery-form/dist/jquery.form.min.js',
        'vendors/general/block-ui/jquery.blockUI.js',
        'vendors/general/owl.carousel/dist/owl.carousel.js',
        'vendors/general/autosize/dist/autosize.js',
        'vendors/general/clipboard/dist/clipboard.min.js',
        'vendors/general/raphael/raphael.js',
        'vendors/general/waypoints/lib/jquery.waypoints.js',
        'vendors/general/counterup/jquery.counterup.js',
        'vendors/general/es6-promise-polyfill/promise.min.js',
        'vendors/general/dompurify/dist/purify.js',
        'js/scripts.bundle.js',

    ];
    public $depends =[
        YiiAsset::class,
        BootstrapAsset::class,
        BootstrapPluginAsset::class
    ];
}