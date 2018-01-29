<?php

namespace api\controllers\common;
use api\services\Urlservice;
use yii\web\Controller;
use api\models\User;
use yii;

class BaseController extends Controller{

    protected $auth_cookie_name='wfuser';
    protected $now_user=null;//当前登录人信息
    protected $allowAllAction=[
     'user/login',
     'user/vlogin'
    ];

    /**
     * 所有页面都需要登录验证
     * @param $action
     * @return bool
     */
    public function beforeAction($action){
        $login_status=$this->checkloginstatus();

        if(!$login_status && !in_array($action->uniqueId,$this->allowAllAction)){

            if(\YII::$app->request->isAjax){
                $this->reJSON([],'用户未登录，请返回用户中心',-302);
            }

            else{
                $this->redirect(Urlservice::BuidUrl('user/login'));
            }
            return false;
        }

        return true;
    }


    /**
     * 验证登录是否有效
     * @return bool
     */
    protected function checkloginstatus(){
    $request=\YII::$app->request;
    $cookies=$request->cookies;
    $auth_cookie=$cookies->get($this->auth_cookie_name);

    if(!$auth_cookie){
        return false;
    }

    list($auth_token,$uid)=explode('#',$auth_cookie);
    if(!$auth_token||!$uid){
        return false;
    }

    if($uid&&preg_match('/^\d+$/',$uid)){


        $user_info=User::findone(['id'=>$uid]);

        if(!$user_info){

            return false;
        }
        $check_key=$this->createAuthtoken($user_info['id'],$user_info['name'],$user_info['email'],$_SERVER['HTTP_USER_AGENT']);

        if($auth_token!==$check_key){

            return false;
        }

        $this->now_user=$user_info;
        $view=\YII::$app->view;
        $view->params['now_user'] = $user_info;
        return true;
    }
    return false;

 }

    /**
     * 设置登录态cookie
     * @param $user_info
     */
    protected function createLoginstatus($user_info){

     $user_auth_token=md5($user_info['id'].$user_info['name'].$user_info['email'].$_SERVER['HTTP_USER_AGENT']);
     $cookie_target=\YII::$app->response->cookies;

     $cookie_target->add(new \yii\web\Cookie([
         'name'=>$this->auth_cookie_name,
         'value'=>$user_auth_token.'#'.$user_info['id']
     ]));

 }

    /**用户信息生成加密校验码
     * @param $uid
     * @param $name
     * @param $email
     * @param $user_agent
     * @return string
     */
    protected function createAuthtoken($uid,$name,$email,$user_agent){
    return md5($uid.$name.$email.$user_agent);
 }



        /**封装get方法
     * @param $key
     * @param string $default
     * @return mixed
     */
    protected function get($key,$default=''){
    return \YII::$app->request->get($key,$default);
 }

    /**
     * 封装post方法
     * @param $key
     * @param string $default
     * @return mixed
     */
    protected function post($key,$default=''){

    return \YII::$app->request->post($key,$default);

 }

    /**
     * 封装json返回数据
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return mixed
     */
 protected function reJSON($data=[],$msg='ok',$code=200){
    header('content-type:application\json');

    echo json_encode([
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
        "req_id" =>uniqid()
    ],true);

    return \YII::$app->end();

 }


}