<html lang="en">
@extends('header')
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/register.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/header.css">
    @section('title','funnystudy注册系统')
    <style>
        html, body { height: 100%; overflow: hidden; }
    </style>
</head>
<body>
    <!--导航栏-->
    @section('header')
        @parent
    @endsection

    <!--注册-->
    @section('content')
    <div class="login">
        @if(Session::has('message'))
            <div style="margin-left: 50px;color: red;"> {{Session::get('message')}}
            </div>
        @endif
    <form action="{{URL::action('RegisterController@register')}}" method="post">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <ul type="none">
                <li>用户名</li>
                <input type="text" name="name" placeholder="用户名"  id="user">
                <li>注册账号</li>
                <input type="text" name="email" placeholder="邮箱" id="email">
                <li>密码</li>
                <input type="password" name="password" placeholder="密码" id="pass">
                <li>确认密码</li>
                <input type="password" name="psw" placeholder="确认密码" id="pswd">
                <li>注册身份</li>
                <input type="radio" name="role" value="1"  style="font-size: 20px;" checked="" />学生
                <input type="radio" name="role" value="0" style="margin-left: 10px"/>教师
            </ul>
        </div>
        <div class="form-forget">
            <input name="" type="checkbox" id="check" id="check"/>
            &nbsp;&nbsp;已阅读并同意
            <a href="#" target="_blank">《趣学教育的服务条款》</a>
        </div>
        <div class="text-center">
            <input type="submit" class="login_btn" onclick="return chk_form();" value="注  册">
        </div>
    </form>
</div>
    @endsection
</body>
@section('javascript')
<script type="text/javascript">
    function chk_form(){
        var user = document.getElementById("user");
        if(user.value==""){
            alert("用户名不能为空！");
            return false;
            //user.focus();
        }
        var pass = document.getElementById("pass");
        if(pass.value==""){
            alert("密码不能为空！");
            return false;
            //pass.focus();
        }
        var psw = document.getElementById("pswd");
        if(!(psw.value==pass.value)){
            alert("两次密码不相同！");
            return false;
            //pass.focus();
        }
        var email = document.getElementById("email");
        if(email.value==""){
            alert("Email不能为空！");
            return false;
            //email.focus();
        }
        var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
        if(!preg.test(email.value)){
            alert("Email格式错误！");
            return false;
            //email.focus();
        }
        var check = document.getElementById("check"); //判断单选

        if(!(check.checked)){
            alert("未同意条款！");
            return false;
            //email.focus();
        }
    }
</script>
@endsection
</html>