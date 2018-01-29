<?php

namespace api\services;

use yii\helpers\Url;

class Urlservice{

    public static function buidUrl($url,$param=[]){

        return Url::toRoute(array_merge([$url],$param));
    }

    public static function buidNullUrl(){
        return "javascript:void(0)";
    }
}