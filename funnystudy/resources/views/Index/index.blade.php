@extends('header')
@section('title','首页')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
@endsection
<body class="homepage">
@section('content')
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
        @foreach($news as $new)
            @if( $loop->first)
                <div class="item active">
                    <a href="{{url("/news/newscontent/$new->id")}}">
                        <img  src="{{$new->picture}}">
                    </a>
                </div>
            @else
                <div class="item">
                    <a href="{{url("/news/newscontent/$new->id")}}">
                        <img  src="{{$new->picture}}">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
<script>
    $(function(){

        $('#myCarousel').carousel({
            interval: 5000
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
            @foreach($news as $new)
                @if( $loop->first)
            <div class="item active">
                <a href="{{url("/news/newscontent/$new->id")}}">
                    <img  src="{{$new->picture}}" style="height: 250px;width: 350px;">
                </a>
            </div>
                @else
                    <div class="item">
                        <a href="{{url("/news/newscontent/$new->id")}}">
                            <img  src="{{$new->picture}}" style="height: 250px;width: 350px;">
                        </a>
                    </div>
                @endif
                @endforeach
        </div>
    </div>
    <ul class="list-group">
    @foreach($news as $new)
        <a href="{{url("/news/newscontent/$new->id")}}">
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

    <div class="container" >
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
        <a class="btn btn-ghost-default" href="{{url('course/list')}}">更多课程</a>
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
                            <a href="{{url("teacherdisplay/information/$user->id")}}"> <img class="avatar-lg" src="{{$user->picture}}" alt=""></a>
                        </div>
                        <div class="teacher-name"><a href="{{url("teacherdisplay/information/$user->id")}}">{{$user->name}}</a> </div>
                        <div class="teacher-bottom">
                            <div class="teacher-about" style="word-wrap:break-word;  height: 34px;width: 215px;">
                              <a href="{{url("teacherdisplay/information/$user->id")}}">{{$user->introduce}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section-more">
            <a class="btn btn-ghost-default" href="{{url('teacherdisplay/listdisplay')}}">更多名师</a>
        </div>
    </div>
</section>
<!-- 求实名师结束 -->

</body>
@endsection

<script type="text/javascript">

</script>
</html>