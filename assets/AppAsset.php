<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
    public $css = [
        'css/animate.css',
        'css/site.css',
        'css/flexslider.css',
        'css/svg.select.css',
        'css/webuploader.css',
        'css/jPages.css',
        'css/main.css',
        'css/alertify.core.css',
        'css/alertify.default.css',
    ];
    public $js = [
        'js/jquery-2.1.1.js',
        'js/alertify.js',
        "//cdn.bootcss.com/svg.js/2.0.5/svg.js",
        'js/svg.draggable.js',
        'js/svg.select.js',
        'js/bootstrap.js',
        'js/rgbcolor.js',
        'js/canvg.js',
        'js/jquery.flexslider-min.js',
        'js/jPages.min.js',
        'js/webuploader.min.js',
        'js/city.js',
        'js/md5.js',
    ];

}
