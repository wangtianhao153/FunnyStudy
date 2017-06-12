<!DOCTYPE html>
<html>
@extends('header')
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link href="{{URL::asset('css/person.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{URL::asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.cookie.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div>
    <!--首部-->
@section('header')
    @parent
@endsection
@section('content')
<!--中间-->
<div class="nav">
    <!--左侧-->
    <div class="nav-left">
        <div class="left-head">
            <p>我的学习</p>
            <hr/>
        </div>
        <div class="left-content">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="student">我的课程</a></li>
                <li><a href="collection">我的收藏</a></li>
                <li><a href="reply">我的评论</a></li>
                <li><a href="introduction">个人信息</a></li>
            </ul>
        </div>
    </div>
    <!--右侧-->
    <div class="nav-right ">
        <div class="right-head">
            <p>我的课程</p>
            <hr/>
        </div>
        <div class="right-content">
            <div class="content-bottom">
                <!--第一部分-->
                <div id="right-one" style="display: block">
                    <div class="movie">
                        @foreach($data as $value)
                    <div class="video">
                        <div class="picture">
                            <a href="#"><img src="{{$value->URL}}"> </a>
                        </div>
                        <div class="introduce">
                            <p align="center"><a href="#" style="color: #000000">{{$value->name}}</a></p>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="page">
                        {{ $data->links() }}
                    </div>
                    {{--<div class="video">--}}
                        {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                        {{--</div>--}}
                        {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="video">--}}
                        {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                        {{--</div>--}}
                        {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="video">--}}
                        {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                        {{--</div>--}}
                        {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="video">--}}
                        {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                        {{--</div>--}}
                        {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="video">--}}
                        {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                        {{--</div>--}}
                        {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                </div>

                <!--页码-->

            </div>
        </div>
    </div>
</div>
@endsection
<!--根部-->
</div>
</body>
</html>