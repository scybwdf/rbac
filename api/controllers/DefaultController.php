<?php
namespace api\controllers;

use yii\web\Controller;

use api\controllers\common\BaseController;

class DefaultController extends BaseController{

    public function actionIndex(){
        return $this->render('index');
    }
}