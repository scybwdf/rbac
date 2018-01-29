<?php

namespace api\assets;
use api\services\Urlservice;
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
           Urlservice::BuidUrl( "/layui/css/layui.css",['v'=>$ver])
        ];

        $this->js=[
            Urlservice::BuidUrl( "/js/jquery-1.12.2.js",['v'=>$ver]),
            Urlservice::BuidUrl( "/layui/layui.js",['v'=>$ver])
        ];
        parent::registerAssetFiles($view);
   }
   /* public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];*/
}
