<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
	<title>@yield('title')</title>
    @yield('style')
</head>
<body>
<!--导航栏开始-->
@section('header')
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
                @if(Session::has('username'))
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="course"><span class="glyphicon glyphicon-user"></span> {{Session::get('username')}}</a></li>
                        <li><a href="exits"><span class="glyphicon glyphicon-log-in"></span> 注销</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                        <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                    </ul>
                @endif
            </div>
        </nav>
    </header>
@show
<!--导航栏结束-->
    @yield('content')
</body>
@yield('javascript')
</html>