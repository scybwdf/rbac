<?php
use api\services\Staticservice;
Staticservice::includeAppJsStatic('js/role/add.js',\api\assets\AppAsset::classname());
?>
<p class="layui-elem-quote"><?=$info?'编辑':'新增'?>角色</p>
<div class="layui-form-item">
    <label class="layui-form-label">角色名称：</label>
    <div class="layui-input-inline">
        <input type="text" id="role_name" value="<?=$info ? $info['name']:'';?>" lay-verify="required" autocomplete="off" placeholder="输入角色名称" class="layui-input">
    </div>
    <input id="role_id" type="hidden" value="<?=$info? $info['id']:'';?>">
    <button  class="layui-btn role_add" type="button">提交</button>
</div>