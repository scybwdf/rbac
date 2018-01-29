;layui.use('layer',function () {
    var role_add_opt=(function () {
        function init() {
            bind();
        }
        function bind() {

            $('.role_add').click(function () {
                var role_name=$('#role_name').val();
                if(role_name==''){
                    return false;
                }
                if(role_name.length<1){
                    layer.msg('请填写角色名称！');
                    return false;
                }

                $.ajax({
                    url:'/role/set',
                    type:'post',
                    dataType:'json',
                    data:{
                        name:role_name,
                        id:$('#role_id').val()
                    },
                    success:function (res) {
                        layer.msg(res.msg);
                        if(res.code==200){
                            window.location='/role/index';
                        }
                    }
                });
            })

        }
        return {
            init:init
        }
    })();
    $(document).ready(function () {
        role_add_opt.init();

    });
});
