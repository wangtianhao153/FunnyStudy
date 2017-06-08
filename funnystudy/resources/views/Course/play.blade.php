@extends('header')
@section('title','课程列表')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/video-js.css') }}">
    <style type="text/css">
    .test{
    width:300px;
    height:400px;
    background-color:#FF0000;
    float:left;
    }
    </style>
@endsection
@section('content')
    <div class="container">
        <!--面包屑开始-->
        <ol class="breadcrumb">
            <li><a href="#">{{$videoinfo[0]->coursename}}</a></li>
            <li><a href="#">{{$videoinfo[0]->chaptername}}</a> </li>
            <li class="active">{{$videoinfo[0]->videoname}}</li>
        </ol>
    </div>
    <!--视频播放开始-->
    <div>
        <video oncontextmenu="return false;" id="my-player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="730" height="456" poster="" data-setup="{}">
            <source type='video/mp4'/>
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video
                </a>
            </p>
        </video>
        <div class="play"></div>
    </div>
@endsection
@section('javascript')
<script type="text/javascript" src="{{ asset('js/video.min.js') }}"></script>
<script type="text/javascript">
    $("#my-player").children("source").attr("src","{{asset($videoUrl[0]->URL)}}");
</script>
@endsection