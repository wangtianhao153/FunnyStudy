<!DOCTYPE html>

<html lang="en">
@extends('header')
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet" type="text/css" />
    @section('title','funnystudy登录系统')
    <script src="{{URL::asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.cookie.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/header.css')}}">
    <style>
    </style>
</head>
<body>
<!--导航栏-->
@section('header')
    @parent
@endsection
@section('content')
    <!--登录-->
    <div class="login">
        @if(Session::has('message'))
            <div style="margin-left: 50px;color: red;"> {{Session::get('message')}}
            </div>
        @endif
        <form action="{{URL::action('LoginController@validation')}}" method="post" >
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <ul type="none">
                <li>账号</li>
                <input type="text" name="email" placeholder="邮箱" style="border-radius:5px;" id="user">
                <li>密码</li>
                <input type="password" name="password" placeholder="密码" style="border-radius:5px;" id="pass">
                </ul>
            </div>
            <div class="form-forget">
                <a href="#" style="color: #0000FF" ;>忘记密码</a>|<a href="register.html" style="color: #0000FF">还没账号？立即注册</a>
            </div>
            {{--<h5 id="loginError" style="color:red">账号或密码不正确</h5>--}}
            <div class="text-center">
                <input type="submit" class="login_btn" style="border-radius:10px;" onclick="return chk_form();" value="登  录">
            </div>
        </form>
    </div>
@endsection
</body>
@section('javascript')
<script type="text/javascript">
    function chk_form() {
        var user = document.getElementById("user");
        if (user.value == "") {
            alert("用户名不能为空！");
            return false;
            //user.focus();
        }
        var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
        if (!preg.test(user.value)) {
            alert("Email格式错误！");
            return false;
            //email.focus();
        }
        var pass = document.getElementById("pass");
        if (pass.value == "") {
            alert("密码不能为空！");
            return false;
            //pass.focus();
        }
    }
</script>
@endsection
</html>