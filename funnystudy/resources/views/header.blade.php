<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
    <style>
        html{
            height: 100%;
        }
        body{
            padding-top: 70px;
            padding-bottom: 70px;
            height: 100%;
        }
        #edit-brand{
            color: #337ab7;
            font-size: 40px;
            font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "微软雅黑", Arial, sans-serif;
        }
        #edit-brand:hover {
            color: #c30d22;
        }
        .footer_bkgd{
            background-color: #777777;
            width: 100%;
            padding: 20px;
            height: 58px;
            position:absolute;bottom:-70px;left:0px;
            color: #ffffff;
            font-family: "Helvetica Neue",Helvetica,Tahoma,Arial,sans-serif;
            font-size: 13px;
        }
        .container{
            position:relative;
            width:100%;
            min-height:100%;
        }
    </style>
    @yield('style')
</head>
<body>
@section('header')
{{--顶部导航栏--}}
<div class="container">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="navbar-header">
            <a class="navbar-brand" id="edit-brand" href="{{Url('index/')}}">趣学教育</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="col-sm-1"></div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{Url('index/')}}">首页 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">最新资讯</a></li>
                <li><a href="{{Url('teacherdisplay/listdisplay')}}">找老师</a></li>
                <li><a href="{{Url('course/list')}}">课程列表</a></li>
            </ul>

            <div class="col-sm-1 navbar-right"></div>

            @if(Session::has('username'))
                <ul class="nav navbar-nav navbar-right">
                    @if(Session::get('userRole') == 1)
                        <li><a href="course"><span class="glyphicon glyphicon-user"></span> {{Session::get('username')}}</a></li>
                    @else
                        <li><a href="course"><span class="glyphicon glyphicon-user"></span> {{Session::get('username')}}</a></li>
                    @endif
                    <li><a href="exits"><span class="glyphicon glyphicon-log-in"></span> 注销</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="register"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                    <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                </ul>
            @endif

            <form class="navbar-form navbar-right" action="#">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="课程、名师">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
{{--底部状态栏--}}
<footer class="footer_bkgd">
    <div class="address text-center">
    <span>
        地址: 河北师范大学软件学院
    </span>&nbsp;&nbsp;
        <span>
        实训小组
    </span>
    </div>
</footer>
@show
@yield('content')


</div>
</body>
@yield('javascript')
</html>