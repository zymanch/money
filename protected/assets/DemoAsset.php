<?php

namespace assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class DemoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $baseUrl = '@web';
    public $css = [
        'css/mobile.css',
        'css/demo.css'
    ];
    public $js = [
        'js/demo.js',

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}