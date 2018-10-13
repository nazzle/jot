<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/icomoon-social.css',
       // 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
        'css/leaflet.css',
        'css/main.css',
        'css/style.css',
        'css/font-awesome.min.css',
        'css/owl-carousel-min.css',
        'css/animate.css',
        'css/slicknav.min.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/main.js',
        'js/modernizr-2.6.2-respond-1.1.0.min.js',
        'js/bootstrap.min.js',
       // 'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        'js/jquery.fitvids.js',
        'js/jquery.sequence-min.js',
        'js/jquery.bxslider.js',
        'js/main-menu.js',
        'js/template.js',
        'js/owl-carousel-min.js',
        'js/wow.1.3.0.js',
       // 'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js',
        'js/jquery.counterup.min.js',
        'js/jquery.slicknav.min.js',
        'js/active.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
