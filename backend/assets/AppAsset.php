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
        '/css/site.css',
        '/assets/f8a6449b/jquery.js',
        '/assets/d8d2944e/css/bootstrap.css',
        '/assets/637af625/yii.js',
        '/assets/637af625/yii.validation.js',
        '/assets/637af625/yii.activeForm.js',
        '/assets/d8d2944e/js/bootstrap.js',
        '/assets/637af625/yii.validation.js',
        '/assets/637af625/yii.activeForm.js',
        '/assets/d8d2944e/js/bootstrap.js',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
