@extends('header')
@section('title','视频播放页')
@section('style')
    <style type="text/css">
        #video{
            float: left;
            width: 740px;
            height: 470px;
            margin-left: 13%;
            margin-top: 30px;
        }
        .list{
            float: left;
            margin-top: 30px;
            width: 20%;
            height: 456px;
            background-color: #222222;
            color: #999999;
            overflow-y:auto;
        }
        .list h1{
            text-align: center;
        }
        .list .chapter{
            width: 90%;
            float: right;
        }
        .list .chapter .video{
            width: 85%;
            float: right;
        }
        .videoAction{
            color: #337ab7;
        }
        .videoHover{
            color: #666666;
        }
        .panel img{
            width: 30px;
            height: 30px;
            border-radius: 22px;
        }
        .student{
            width: 100%;
            color: #337ab7;
        }
        .brief{
            font-size: 22px;
        }
        .brief p{
            font-size: 18px;
            padding-left: 2em;
        }
    </style>
@endsection
@section('content')
    <!--面包屑开始-->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('index') }}">首页</a></li>
            <li class="active">{{ $course->name }}</li>
            <li class="active" id="videoName">视频名</li>
        </ol>
    </div>
    <!--视频播放开始-->
    <div id="video">
        <div class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item"></iframe>
        </div>
    </div>
    <div class="list">
        <h1>{{ $course->name }}</h1>
        @foreach($chapters as $chapter)
        <div class="chapter">
            <h3>{{ $chapter->name }}</h3>
            @foreach($videos as $video)
                @if($video->c_id == $chapter->id)
            <div class="video"><input type="hidden" value="{{ $video->id }}"><h4>{{ $video->name }}</h4></div>
                @endif
                @endforeach
        </div>
            @endforeach
    </div>

    <div class="col-sm-offset-2 col-md-6" style="margin-right: 20px;">
        <div class="brief">
            课程介绍
            <p>{{ $course->brief }}</p>
        </div>
    </div>


    <div class="col-lg-3 col-md-4" style="width: 285px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    授课教师
                </h3>
            </div>
            <div class="panel-body">
                <div class="media media-default">
                    <div class="media-left">
                        <a class=" js-user-card" href="">
                            <img style="width: 30px;height: 30px;border-radius: 22px;" class="avatar-md" src="{{ asset($course->picture) }}">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="title">
                            <a class="link-dark link-light" href="">{{ $course->teacherName }}</a>
                        </div>
                        <div class="content">{{ $course->teacherIntroduce }}</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    最新学员
                </h3>
            </div>
            <div class="panel-body">
                @foreach($students as $student)
                <div class="student">
                    <img class="avatar-sm" src="{{ asset($student->picture) }}">
                    {{ $student->name }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function () {

    var actionDiv = $('.list').find('.video').eq(0);
    changeVideo(actionDiv);
    $('.list').find('.video').unbind('click').on('click',function () {
        changeVideo($(this));
    });
});
    function changeVideo(actionDiv) {
        var videoName = actionDiv.text();
        var videoId = actionDiv.children('input').val();

        $('#videoName').text(videoName);
        $('title').html(videoName);

        $('#video iframe').attr('src','{{ url('videoPlay').'/' }}'+videoId);

        $('.list').find('.video').removeClass('videoAction');
        actionDiv.addClass('videoAction');

        $('.list').find('.video').hover(function () {
            $(this).addClass('videoHover');
        },function () {
            $(this).removeClass('videoHover');
        });
    }

</script>
@endsection