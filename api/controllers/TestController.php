<?php
namespace api\controllers;

use yii\web\Controller;

use api\controllers\common\BaseController;

class TestController extends BaseController{

    public function actionPage1(){

       return $this->render('page1');
    }

    public function actionPage2(){
      return  $this->render('page2');
    }

    public function actionPage3(){
        return $this->render('page3');
    }

    public function actionPage4(){
        return $this->render('page4');
    }
}
