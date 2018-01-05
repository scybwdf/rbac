<?php

namespace api\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
   /* public $css = [
        '/bootstrap/css/bootstrap.min.css',
    ];
    public $js = [
        "/js/jquery-1.12.2.js",
        "/bootstrap/js/bootstrap.min.js"
    ];*/
   public function registerAssetFiles($view){
       $ver=20180105;

        $this->css=[
            "bootstrap/css/bootstrap.min.css?v={$ver}"
        ];

        $this->js=[
            "js/jquery-1.12.2.js?v={$ver}",
            "bootstrap/js/bootstrap.min.js?v={$ver}"
        ];
        parent::registerAssetFiles($view);
   }
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
