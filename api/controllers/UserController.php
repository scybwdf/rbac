<?php

namespace api\controllers;

use api\controllers\common\BaseController;

use api\services\Urlservice;

use api\models\User;
use yii\web\Controller;

class UserController extends BaseController{

    public function actionIndex(){
        echo "index";
    }

    public function actionLogin(){

        return $this->render("login",[
            'host' => $_SERVER['HTTP_HOST']
        ]);
    }

    /**
     * 伪登录
     * @return mixed
     */
    public function actionVlogin(){

        $uid=$this->get('uid',0);
        $jumpindex=Urlservice::buidUrl('/');
        if(!$uid){
           return $this->redirect($jumpindex);
        }

        $user_info=User::find()->where(['id'=>$uid])->one();

        if(!$user_info){

            return $this->redirect($jumpindex);
        }

        $this->createLoginstatus($user_info);

        return $this->redirect($jumpindex);

    }

    public function actionSet(){
        return $this->render('set',['info'=>'']);
    }


}