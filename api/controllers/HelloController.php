<?php
namespace api\controllers;
use yii\web\Controller;
use yii\web\Cookie;
use api\models\Test;
class HelloController extends Controller{

    public $layout='common';
    public function actionIndex(){
   /*     $request=\YII::$app->request;
        if($request->isGet){
          //  echo $request->get('id',20);
         //   echo $request->userIp;
        }

        $res=\YII::$app->response;
        //$res->statusCode="404";
       // $res->headers->add('pragma','no-cache');
      //  $res->headers->set('pragma','max-age=5');
        $res->headers->remove('pragma');
        //$res->headers->add('location',"https://www.baidu.com");
      //  $this->redirect('https://www.baidu.com',302);
        //$res->headers->add('content-disposition','attachment ;filename="1.jpg"');
        //$res->sendFile("./robots.txt");下载文件
       $session=\YII::$app->session;
       $session->open();
       if($session->isActive){
           echo "session is active";

       }
       else{
           echo "session 未开启";
       }
     $session->set('wf',123);
     $session['user']=123;//设置session
     echo $session['wf'];//获取session
      unset($session['wf']);
     $session->remove('wf');//移除session
    $cookies=\YII::$app->response->cookies;
    $arr=array('name'=>'user','value'=>'wf');
    $cookies->add(new Cookie($arr));
  //  $cookies->remove('user');//删除cookie
    $rookie=\YII::$app->request->cookies;
   echo  $cookies->getValue('user',20);*/
    $data['view_test1']="1223 <script>alert(1);</script>";
    $data['view_test2']=array(7,8);
    $sql="select * from wf_test where id=:id";

   // $res=Test::findBysql($sql,array(':id'=>1))->all();
    //$res=Test::find()->where(array('id'=>2))->all();

   // $res=Test::find()->where(array('>','id',0))->all();//id>0
     //$res=Test::find()->where(array('between','id',0,1))->all();//1=>id>=0
        //$res=Test::find()->where(array('like','name','2'))->asArray()->all();//1=>id>=0 转化为数组
        // $res=Test::find()->where(array('id'=>1))->andWhere(array('like','name','2'))->asArray()->all();//id>0

        //批量查询
      /*  foreach (Test::find()->asArray()->batch(1) as $tests){
            var_dump($tests);
        }*/
        $where=Test::find()->where(array('id'=>1))->all();
       //$where[0]->delete();
       Test::deleteAll('id>1');
       // var_dump($res);
        //return $this->renderPartial('index',$data);
     //   return $this->render('index',$data);
    }
}