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
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/_all-skins.min.css',
        'css/leaflet.css',
        'css/main.css',
        'css/font-awesome.min.css',
        'css/style.css',        
    ];
    public $js = [
        //'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        //'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        'js/jquery1.9.1.min.js',
        'js/main.js',
        'js/modernizr-2.6.2-respond-1.1.0.min.js',
        'js/bootstrap.min.js',
        'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        'js/jquery.fitvids.js',
        'js/jquery.sequence-min.js',
        'js/jquery.bxslider.js',
        'js/main-menu.js',
        'js/template.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
