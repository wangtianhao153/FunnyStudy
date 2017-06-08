<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>教师列表页</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/teacherdisplay.css')}}">

</head>
<body>
<!--导航栏开始-->
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
            <form class="navbar-form pull-right visible-lg" action="" method="get">
                <div class="form-group">
                    <input class="form-control" placeholder="请输入搜索的内容" >
                    <button class="button glyphicon glyphicon-search"></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
            </ul>
        </div>
    </nav>
</header>
<!--导航栏结束-->
<div id="content-container" class="container">
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li><a href="#">求实名师</a></li>
    </ol>
    <div class="teacher-box">
        <ul class="row">

            @foreach($users as $list)
                <li class="col-xs-12 col-sm-12 col-md-6 col-lg-6 es-teacher-list">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{url("teacherdisplay/information/$list->id")}}" style="display: block"><img class="media-object" src="{{$list->picture}}" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <a href="{{url("teacherdisplay/information/$list->id")}}"> <span class="com-author-link">{{$list->name}}</span></a>
                            <a href="{{url("teacherdisplay/information/$list->id")}}"><p class="teacher-info">&nbsp;&nbsp; &nbsp; {{$list ->introduce}}</p></a>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>

    <nav class=" text-center">
        {{ $users->links() }}
    </nav>
</div>
</body>
</html>