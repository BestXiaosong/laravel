<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>soha后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/page.css?{$stamp}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/bootstrap/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/ionicons.min.css">-->

    <link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini" style="overflow-y:hidden;">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{$dt}}soha后台管理系统</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">

                    <!-- Notifications: style can be found in dropdown.less -->


                    <li>
                        <a target="rightContent" href="javascript:editPassword(this)">
                            <i class="glyphicon glyphicon glyphicon-refresh"></i>
                            <span>修改密码</span>
                        </a>
                    </li>
                    <li>
                        <a href="/index/logout">
                            <i class="glyphicon glyphicon-off "></i>
                            <span>退出登录</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                    <h4 class="modal-title" id="myModalLabel"> 修改权限</h4></div>
                <div class="modal-body">
                    <form id="bjy-form1" class="form-inline" action="{:url('index/editPassword')}" method="post">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th width="15%">原密码：</th>
                                <td><input class="form-control" type="text" name="old"></td>
                            </tr>
                            <tr>
                                <th>新密码：</th>
                                <td><input class="form-control" type="text" name="password">
                                </td>
                            </tr>
                            <tr>
                                <th>确认密码：</th>
                                <td><input class="form-control" type="text" name="check">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="btn btn-success submit" type="submit" value="修改"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    @include('public.left')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @section('main')

        @endsection



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--<footer class="main-footer">-->
    <!--<div class="pull-right hidden-xs">-->
    <!--<b>Version</b>-->
    <!--</div>-->
    <!--<strong>Copyright &copy; 2016<a href="http://www.cogian.com" target="_blank">产品</a>.</strong>保留所有权利。-->
    <!--reserved-->
    <!--</footer>-->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/plugins/fastclick/fastclick.js?{$stamp}"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js?{$stamp}"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js?{$stamp}"></script>
<script src="admin/js/layer/layer.js?{$stamp}"></script>
<script src="admin/js/zc_util.js?{$stamp}"></script>


<script type="text/javascript">

    $(document).ready(function(){
        $("#riframe").height($(window).height()-100);//浏览器当前窗口可视区域高度
        $("#rightContent").height($(window).height()-100);
        $('.main-sidebar').height($(window).height()-50);
        // 修改菜单

    });
    function editPassword(obj) {
        $('#editPassword').modal('show');
    }
    var tmpmenu = 'index_Index';
    function makecss(obj) {
        $('li[data-id="' + tmpmenu + '"]').removeClass('active');
        $(obj).addClass('active');
        tmpmenu = $(obj).attr('data-id');
    }

</script>
@section('js')

@endsection

</body>
</html>
