<?php
use api\services\Staticservice;
Staticservice::includeAppJsStatic('js/user/set.js',\api\assets\AppAsset::classname());
?>
<p class="layui-elem-quote"><?=$info?'编辑':'新增'?>用户</p>

<div class="layui-form-item layui-row ">
    <div class="layui-inline">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input">
        </div>
    </div>
</div>
<div class="layui-form-item layui-row ">
    <div class="layui-inline">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-inline">
        <label class="layui-form-label">重复密码</label>
        <div class="layui-input-inline">
            <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input">
        </div>
    </div>
</div>
<div class="layui-form-item layui-row" style="text-align: center;margin-top: 30px;">
    <button  class="layui-btn role_add" type="button">提交</button>
</div>