<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title or 'soha后台管理系统'}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/admin/css/page.css?{$stamp}" rel="stylesheet" type="text/css" />
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/admin.css?{$stamp}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="/admin/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link  type="text/css" rel="stylesheet" href="/admin/timePicker/bootstrap-datetimepicker.min.css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    	folder instead of downloading all of them to reduce the load. -->
    <link href="/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/admin/plugins/iCheck/flat/blue.css?{$stamp}" rel="stylesheet" type="text/css" />
    <link href="/admin/plugins/iCheck/all.css?{$stamp}" rel="stylesheet" type="text/css" />

    @yield('css')

    <!-- jQuery 2.1.4 -->

    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/js/layer/layer.js?{$stamp}"></script>
    <script src="/admin/js/zc_util.js?{$stamp}"></script>
    <script src="/admin/js/common.js?{$stamp}"></script>
    
    <script src="/admin/timePicker/bootstrap-datetimepicker.js?{$stamp}"></script>
    <script src="/admin/timePicker/bootstrap-datetimepicker.zh-CN.js?{$stamp}"></script>
    <script type="text/javascript">
	    $(function(){
			//防止事件冒泡
		    $(document).delegate('.timepicker','focusin', function(){
		        $('.timepicker').datetimepicker({
		            format: 'yyyy-mm-dd HH:ii:ss',
		            minView: "month",
		            language:  'zh-CN',
		            weekStart: 1,
		            todayBtn:  0,
		            autoclose: 1,
		            startDate:'2015-01-01',
		            maxView:3,
		            endDate:0,
		            todayHighlight: 1,
		            startView: 2,
		            forceParse: 0,
		            showMeridian: 1
		        });
		    });
		});
    
    
        function delfunc(obj){
            layer.confirm('确认删除？', {
                        btn: ['确定','取消'] //按钮
                    }, function(){
                        $.ajax({
                            type : 'post',
                            url : $(obj).attr('data-url'),
                            data : {act:'del',del_id:$(obj).attr('data-id')},
                            dataType : 'json',
                            success : function(data){
                                if(data==1){
                                    layer.msg('操作成功', {icon: 1});
                                    $(obj).parent().parent().remove();
                                }else{
                                    layer.msg(data, {icon: 2,time: 2000});
                                }
                                layer.closeAll();
                            }
                        })
                    }, function(index){
                        layer.close(index);
                        return false;// 取消
                    }
            );
        }

        //全选
        function selectAll(name,obj){
            $('input[name*='+name+']').prop('checked', $(obj).checked);
        }

        function get_help(obj){
            layer.open({
                type: 2,
                title: '帮助手册',
                shadeClose: true,
                shade: 0.3,
                area: ['90%', '90%'],
                content: $(obj).attr('data-url'),
            });
        }

        function delAll(obj,name){
            var a = [];
            $('input[name*='+name+']').each(function(i,o){
                if($(o).is(':checked')){
                    a.push($(o).val());
                }
            })
            if(a.length == 0){
                layer.alert('请选择删除项', {icon: 2});
                return;
            }
            layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
                        $.ajax({
                            type : 'get',
                            url : $(obj).attr('data-url'),
                            data : {act:'del',del_id:a},
                            dataType : 'json',
                            success : function(data){
                                if(data == 1){
                                    layer.msg('操作成功', {icon: 1});
                                    $('input[name*='+name+']').each(function(i,o){
                                        if($(o).is(':checked')){
                                            $(o).parent().parent().remove();
                                        }
                                    })
                                }else{
                                    layer.msg(data, {icon: 2,time: 2000});
                                }
                                layer.closeAll();
                            }
                        })
                    }, function(index){
                        layer.close(index);
                        return false;// 取消
                    }
            );
        }
    </script>
</head>
<body style="background-color:#ecf0f5;">


<div class="wrapper">
    <style>#search-form > .form-group{margin-left: 10px;}</style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('main')

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="/admin/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})
    });
</script>
@yield('js')

</body>
</html>