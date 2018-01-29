<?php
namespace api\controllers;
use yii\web\Controller;
class CachetestController extends Controller{
    public function actionIndex(){
        $cache=\YII::$app->cache;
        $cache->add('name',12,15);
      //  $cache->delete('name');
        echo $cache->get('name');
    }
}