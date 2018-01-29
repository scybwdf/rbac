<?php
namespace api\controllers;
use yii\web\Controller;
use yii;
use api\controllers\common\BaseController;
use api\models\Role;

class   RoleController extends BaseController{

    /**
     * @return mixed
     * 角色列表
     */
    public function actionIndex(){

        if(\yii::$app->request->isPOST){
            $limit=$this->post('limit',10);
            $page=$this->post('page',0);
            $offset=($page-1)*$limit;
            $key=$this->post('key','');
            $filed=$this->post('field','id');
            $sort=$this->post('sort','desc');
            if($key){
                $role_all=Role::find()->where(['or',['id'=>$key],['like','name',$key]]);
            }
            else{
                $role_all=Role::find();
            }

            $count=$role_all->count();
            $list=$role_all->limit($limit)->offset($offset)->orderBy([$filed=>$sort])->asArray()->all();
            header('content-type:application\json');
            echo json_encode([
                'code'=>0,
                'msg'=>'ok',
                'data'=>$list,
                'count'=>intval($count),
                "req_id" =>uniqid()
            ],true);die;


        }
      else{
         $c=\Yii::$app->controller->id;
          return $this->render('index',['c'=>$c]);
      }

    }

    /*
     * 新增角色
     */
    public function actionSet(){

      if(\yii::$app->request->isGet){
          $id=$this->get('id');
          $info=Role::find()->where(['id'=>$id])->one();
          return $this->render('add',['info'=>$info]);
      }
      if(\yii::$app->request->isPost){
         $name=$this->post('name','');
         $id=$this->post('id',0);
         if(!$name){
             return $this->reJSON([],'请输入角色名称',-1);
         }

         $role_info=Role::find()->where(['name'=>$name])->andWhere(['!=','id',$id])->one();
         if($role_info){
             return $this->reJSON([],'角色名称已存在',-1);
         }

         $info_eidt=Role::find()->where(['id'=>$id])->one();
         if($info_eidt){
             //编辑操作
            $role_model=$info_eidt;
         }
         else{
             //新增操作
             $role_model=new Role();
             $role_model->name=$name;
             $role_model->create_time=time();
         }

         $role_model->update_time=time();
         $role_model->save(0);
         return $this->reJSON([],'操作成功',200);
      }

    }

    /**
     * @return mixed
     * 设置状态
     */
    public function actionSetstatus(){
        if(\yii::$app->request->isAjax){
            $id=$this->post('id',0);
            $role_model=Role::find()->where(['id'=>$id])->one();
            if($role_model){
                $role_model->status=$role_model['status']==1 ? 0 : 1;
                $role_model->update_time=time();
                $role_model->save();
                return $this->reJSON([],'设置成功',200);
            }
            else{
                return $this->reJSON([],'设置失败',-1);
            }

        }
    }

    /**
     * @return mixed
     * 删除操作
     */
    public function actionDel(){
        if(\yii::$app->request->isAjax){
            $id=$this->post('id',0);
            $ids=explode(',',$id);

                if(Role::deleteAll(['in', 'id',$ids])){
                    return $this->reJSON([],'删除成功',200);
                }
                else{
                    return $this->reJSON([],'删除失败',-1);
                }

        }
    }
}
