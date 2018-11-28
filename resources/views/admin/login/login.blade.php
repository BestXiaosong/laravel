
@extends('admin.public.common_index')
@section('css')
    <link href="/admin/css/login.min.css" rel="stylesheet">
@endsection

@section('main')
<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">

                </div>
            </div>
            <div class="col-sm-5">
                <form id="form" method="post" action="{{url('login/check')}}">
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到soha后台管理系统</p>

                    <div class="form-group {{$errors->has('user_name')?'has-error':''}}">

                        <input name="user_name" value="{{old('user_name')}}" type="text" class="form-control uname " placeholder="用户名" />

                        @if($errors->has('user_name'))
                            <span class="help-block">
                                <strong>{{$errors->first('user_name')}}</strong>
                            </span>

                        @endif

                    </div>

                    <div class="form-group {{$errors->has('password')?'has-error':''}}">

                        <input name="password" value="{{old('password')}}" type="password" class="form-control pword m-b" placeholder="密码" />

                        @if($errors->has('password'))
                            <span class="help-block">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>

                        @endif
                    </div>


                    @if($errors->has('0'))
                        <div class="form-group has-error">
                                <span class="help-block">
                                <strong>{{$errors->first('0')}}</strong>
                                </span>
                        </div>

                    @endif

                    {{csrf_field()}}

                    <button type="submit" class="btn btn-success btn-block">登录</button>
                </form>
            </div>
        </div>

    </div>
</body>
@endsection