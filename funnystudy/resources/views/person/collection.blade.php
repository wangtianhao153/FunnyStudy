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
                        <li><a href="{{ url('student') }}">我的课程</a></li>
                        <li class="active"><a href="{{ url('collection') }}">我的收藏</a></li>
                        <li><a href="{{ url('reply') }}">我的评论</a></li>
                        <li><a href="{{ url('introduction') }}">个人信息</a></li>
                    </ul>
                </div>
            </div>
            <!--右侧-->
            <div class="nav-right ">
                <div class="right-head">
                    <p>我的收藏</p>
                    <hr/>
                </div>
                <div class="right-content">
                    <div class="content-bottom">
                        <!--第三部分-->
                        <div id="right-three" >
                            <div class="movie">
                                @foreach($data as $v)
                                    <div class="video">
                                        <div class="picture">
                                            <a href="{{ url('course/play/'.$value->id) }}"><img src="{{$v->URL}}"> </a>
                                        </div>
                                        <div class="introduce">
                                            <p align="center"><a href="{{ url('course/play/'.$value->id) }}" style="color: #000000">{{$v->name}}</a></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="page">
                                {{ $data->links() }}
                            </div>
                            {{--<div>--}}
                            {{--<div class="video">--}}
                            {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                            {{--</div>--}}
                            {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第三课</a></p>--}}
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
                            {{--<div class="video">--}}
                            {{--<div class="picture">--}}
                            {{--<a href="#"><img src="images/loginbg_01.jpg"> </a>--}}
                            {{--</div>--}}
                            {{--<div class="introduce">--}}
                            {{--<p align="center"><a href="#" style="color: #000000">第一课</a></p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="page">--}}
                            {{--<ul class="pagination">--}}
                            {{--<li><a href="#">&laquo;</a></li>--}}
                            {{--<li><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">&raquo;</a></li>--}}
                            {{--</ul>--}}
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