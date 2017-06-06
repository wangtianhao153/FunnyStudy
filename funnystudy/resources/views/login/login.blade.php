<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet" type="text/css" />
    <title>Funnystudy登录系统</title>
    <script src="{{URL::asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.cookie.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/header.css')}}">

    <style>
    </style>

    <script src="{{URL::asset('js/Ajax.js')}}"></script>
</head>
<body>
<!--导航栏-->
<header class="qs-header">
    <nav class="collapse navbar-collapse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">趣学教育</a>
            </div>
            <ul class="nav navbar-nav navbar-letf">
                <li class=""><a href="#">首页</a></li>
                <li class=""><a href="#">最新资讯</a></li>
                <li class=""><a href="#">找老师</a></li>
                <li class=""><a href="#">看直播</a></li>
                <li class=""><a href="#">选课程</a></li>
            </ul>
            <form class="navbar-form pull-right visible-lg" action="http://www.qswangxiao.com/search" method="get">
                <div class="form-group">
                    <input class="form-control" placeholder="请输入搜索的内容" >
                    <button class="button glyphicon glyphicon-search"></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
            </ul>
        </div>
    </nav>

</header>
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
</body>
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
</html>