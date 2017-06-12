<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="" />
    <title>首页</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
</head>
<body class="homepage">

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
            <form class="navbar-form pull-right visible-lg" action="http://www.qswangxiao.com/search" method="get">
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

<!-- 轮播图开始 -->
<div id="myCarousel" class="carousel slide" style="height: 414px;">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner"style="height: 414px;">
        <div class="item active">
            <img src="{{$news[0]->picture}}" alt="First slide">
        </div>
        <div class="item">
            <img src="{{$news[1]->picture}}" alt="Second slide">
        </div>
        <div class="item">
            <img src="{{$news[2]->picture}}" alt="Third slide">
        </div>
    </div>
</div>
<script>
    $(function(){

        $('#myCarousel').carousel({
            interval: 6000
        });
    });
</script>
<!-- 轮播图结束 -->

<!-- 最新资讯开始 -->

<div class="qs-panel-title">最新资讯<small>NEWS</small></div>


<div class="InformationFigure">
    <div id="myCarousel1" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel1" data-slide-to="1"></li>
            <li data-target="#myCarousel1" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner" >

            <div class="item active">
                <a href="">
                    <img  src="{{$news[0]->picture}}" alt="First slide">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img  src="{{$news[1]->picture}}" alt="Second slide">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img  src="{{$news[2]->picture}}" alt="Third slide">
                </a>
            </div>
        </div>
    </div>
    <ul class="list-group">
    @foreach($news as $new)
        <a href="#">
            <li>{{$new->title}}
            <span class="badge">{{$new->time}}</span>
            </li>
        </a>
    @endforeach
    </ul>
</div>
<script>
    $(function(){

        $('#myCarousel1').carousel({
            interval: 4000
        });
    });
</script>
<!-- 最新资讯结束 -->

<!-- 精品课程开始 -->
<section class="qs-section">

    <div class="container">
        <div class="qs-section-header">
            <div class="title">精品课程</div>
            <div class="subtitle">EXELLENT COURSE</div>
        </div>
        <div class="qs-course-cat">
            <ul class="nav nav-pills" id="category-tab">
                <li role="presentation" class="active">
                    <a href="" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">全部课程</a>
                </li>
                <li role="presentation">
                    <a href="" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">高一</a>
                </li>
                <li>
                    <a href="" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">高二</a>
                </li>
                <li>
                    <a href="" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">高三</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="course-list qs-exellent-course-list tab-content">

        @foreach($course as $cour)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="course-item">
                <div class="course-img">
                    <a href="#" target="_blank">
                        <img src="{{$cour->URL}}"  class="img-responsive">
                    </a>
                </div>
                <div class="course-info">
                    <div class="title">
                        <a class="link-dark" href="#" target="_blank">
                            {{$cour->name}}
                        </a>
                    </div>
                    <div class="metas clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="section-more">
        <a class="btn btn-ghost-default" href="">更多课程</a>
    </div>
</section>
<!-- 精品课程结束 -->

<!-- 求实名师开始 -->
<section class="qs-section section-white hidden-xs hidden-sm">
    <div class="container">
        <div class="qs-section-header">
            <div class="title">求是名师</div>
            <div class="subtitle">OUR TEACHERS</div>
        </div>
        <div class="qs-teacher-list">
            <div class="swiper-container row">
                @foreach($users as $user)
                <div class="col-lg-3 col-md-4 col-sm-6 swiper-slide swiper-slide-duplicate" style="width: 285px; height: 371px;">
                    <div class="qs-teacher-item">
                        <div class="teacher-img">
                            <img class="avatar-lg" src="{{$user->picture}}" alt="">
                        </div>
                        <div class="teacher-name">{{$user->name}}</div>
                        <div class="teacher-bottom">
                            <div class="teacher-about" style="word-wrap:break-word;">
                               {{$user->introduce}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section-more">
            <a class="btn btn-ghost-default" href="#">更多名师</a>
        </div>
    </div>
</section>
<!-- 求实名师结束 -->

</body>
<script type="text/javascript">

</script>
</html>