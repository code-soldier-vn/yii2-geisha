<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/bootstrap/dist/css/bootstrap.min.css',
        'theme/plugins/sidebar-nav/dist/sidebar-nav.min.css',
        'theme/plugins/toast-master/css/jquery.toast.css',
        'theme/plugins/morrisjs/morris.css',
        'theme/plugins/chartist-js/dist/chartist.min.css',
        'theme/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css',
        'theme/css/animate.css',
        'theme/css/style.css',
        'theme/css/colors/default.css'
    ];
    public $js = [
        'theme/plugins/jquery/dist/jquery.min.js',
        'theme/bootstrap/dist/js/bootstrap.min.js',
        'theme/plugins/sidebar-nav/dist/sidebar-nav.min.js',
        'theme/js/jquery.slimscroll.js',
        'theme/js/waves.js',
        'theme/plugins/waypoints/lib/jquery.waypoints.js',
        'theme/plugins/counterup/jquery.counterup.min.js',
        'theme/plugins/chartist-js/dist/chartist.min.js',
        'theme/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js',
        'theme/plugins/jquery-sparkline/jquery.sparkline.min.js',
        'theme/js/custom.js',
        'theme/js/dashboard1.js',
        'theme/plugins/toast-master/js/jquery.toast.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset'
    ];
}







