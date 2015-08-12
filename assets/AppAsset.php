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
        'css/main.css'
    ];
    public $js = [
        'js/jquery-2.1.1.js',
        'js/bootstrap.js',
        'js/jquery.flexslider-min.js'

    ];

}
