<?php

namespace api\services;

use yii;

class Staticservice {

    public static function includeAppStatic($type,$path,$depend){
        $RE_VERSION=defined('RE_VERSION') ? RE_VERSION :time();
        if(stripos($path,'?')!==false){
            $path=$path."&v={$RE_VERSION}";
        }
        else{
            $path=$path."?v={$RE_VERSION}";
        }
        if($type=='css'){
            \YII::$app->getView()->registerCssFile($path,['depends'=>$depend]);
        }
        else{
            \YII::$app->getView()->registerJsFile($path,['depends'=>$depend]);
        }
    }

    public static function includeAppJsStatic($path,$depend){
        self::includeAppStatic('js',$path,$depend);
    }

    public static function includeAppCssStatic($path,$depend){
        self::includeAppStatic('css',$path,$depend);
    }
}