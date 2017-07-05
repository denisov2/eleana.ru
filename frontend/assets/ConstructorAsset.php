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
class ConstructorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'constructor/css/style.css',
        'constructor/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Aguafina+Script%7CAkronim%7CAlex+Brush%7CAnton%7CRaleway:300,400,500,700',
        'https://fonts.googleapis.com/css?family=Russo+One',
        'https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css',


    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js',
        'constructor/js/fabric.min.js',
        'constructor/js/script.js',


    ];
    public $depends = [
  //      'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}
