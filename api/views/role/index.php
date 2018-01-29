<?php
use api\services\Urlservice;
?>
<script>
    var c="<?=$c;?>";
</script>
<div class="demoTable">
    <div class="layui-inline">
        <button  class="layui-btn" data-type="alldel">删除</button>
    </div>
    &nbsp; &nbsp; &nbsp;搜索：
    <div class="layui-inline">
        <input class="layui-input" name="id" id="demoReload" autocomplete="off">
    </div>
    <button class="layui-btn" data-type="reload">搜索</button>
    <div class="layui-inline">
        <a href="<?=Urlservice::BuidUrl('role/set');?>" class="layui-btn" >新增角色</a>
    </div>

</div>

<table class="layui-hide" id="LAY_table_user" lay-filter="table_main" ></table>

<script type="text/html" id="iseffect">
    <input type="checkbox" name="status" value="{{d.id}}" lay-filter="setstatus"  lay-skin="switch" lay-text="有效|无效"  {{d.status == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="table_act">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table,form = layui.form;

        //方法级渲染
        table.render({
            elem: '#LAY_table_user',
            cellMinWidth: 80
            ,url: "/"+c+"/index",
            method:'post'
            ,cols: [[

               {checkbox: true, fixed: true}
                ,{field:'id', title: 'ID', width:80, sort: true, fixed: true}
                ,{field:'name', title: '角色', sort: true}
                ,{field:'status', title:'是否有效', width:100, templet: '#iseffect', unresize: true, sort: true, }
                ,{title:'操作',width:200,templet: '#table_act'}

            ]]
            ,id: 'testReload'
            ,page: true
            ,height: 315
        });

        var $ = layui.$, active = {
            reload: function(){
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('testReload', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        key:demoReload.val()

                    }
                });
            },
            alldel: function(){ //获取选中数据
                var checkStatus = table.checkStatus('testReload')
                    ,data = checkStatus.data,ids = [];
                 $.each(data,function (i,n) {
                    ids.push(n.id);
                });
                 if(ids.length<1){
                     layer.msg('请选择需要删除的数据！');
                     return false;
                 }
                 layer.confirm('确定要删除&nbsp;'+ids.length+'&nbsp;条数据吗?', function(index){
                     id=ids.join(",");
                     $.ajax({
                         url: '/'+c+'/del',
                         type:'post',
                         dataType:'json',
                         data:{
                             id:id
                         },
                         success:function (res) {
                             if(res.code==200){
                                 layer.msg('删除成功');
                                 //执行重载
                                 table.reload('testReload', {

                                 });
                             }
                             else{
                                 layer.msg('删除失败');
                             }
                         }
                     })

                });

            }
        };

        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        //监听性别操作
        form.on('switch(setstatus)', function(obj){
            $.ajax({
               url: '/'+c+'/setstatus',
                type:'post',
                dataType:'json',
                data:{
                   id:obj.value
                },
                success:function (res) {
                    if(res.code==200){
                        layer.msg('设置成功');
                    }
                    else{
                        layer.tips('设置失败',obj.othis);
                    }
                }
            })
        });

        table.on('tool(table_main)', function(obj){
            var data = obj.data;
                if(obj.event === 'del'){
                layer.confirm('真的删除该条记录吗？', function(index){
                    $.ajax({
                        url: '/'+c+'/del',
                        type:'post',
                        dataType:'json',
                        data:{
                            id:data.id
                        },
                        success:function (res) {
                            if(res.code==200){
                               obj.del();
                               layer.close(index);
                                layer.msg('删除成功');
                            }
                            else{
                                layer.msg('删除失败');
                            }
                        }
                    });

                });
            } else if(obj.event === 'edit'){
                window.location="/"+c+"/set?id="+data.id;
            }
        });
        table.on('sort(table_main)', function(obj){
            table.reload('testReload', {
                initSort: obj
                ,where: {
                    field: obj.field
                    ,order: obj.type
                }
            });
        });

    });
    </script>