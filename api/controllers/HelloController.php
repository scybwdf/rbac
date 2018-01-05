<?php

namespace api\controllers;
use yii\web\Controller;

class HelloController extends Controller{
    public function actionIndex(){
        $request=\YII::$app->request;
        if($request->isGet){
            echo $request->get('id',20);
            echo $request->userIp;
        }

        $res=\YII::$app->response;
        //$res->statusCode="404";
       // $res->headers->add('pragma','no-cache');
      //  $res->headers->set('pragma','max-age=5');
        $res->headers->remove('pragma');
        //$res->headers->add('location',"https://www.baidu.com");
      //  $this->redirect('https://www.baidu.com',302);
        //$res->headers->add('content-disposition','attachment ;filename="1.jpg"');
        $res->sendFile("./robots.txt");
    }
}