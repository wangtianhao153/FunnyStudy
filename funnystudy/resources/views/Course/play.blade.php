@extends('header')
@section('title','视频播放页')
@section('style')
    <style type="text/css">
        #video{
            float: left;
            width: 740px;
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
    </style>
@endsection
@section('content')
    <!--面包屑开始-->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('index') }}">首页</a></li>
            <li class="active">{{ $courseName }}</li>
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
        <h1>{{ $courseName }}</h1>
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