<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'eleana/css/bootstrap-select.min.css',
        'eleana/css/bootstrap-slider.min.css',
        'eleana/css/libs.css',
        'eleana/css/style.css',


    ];
    public $js = [
        'eleana/js/app.js',
        'eleana/js/bootstrap-select.min.js',
       // 'eleana/js/bootstrap-slider.min.js',
       // 'eleana/js/libs.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\jui\JuiAsset',
    ];
}
