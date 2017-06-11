<!DOCTYPE html>
<html>
@extends('header')
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <script src="{{URL::asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.cookie.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="{{URL::asset('css/person.css')}}" rel="stylesheet" type="text/css" />
    <script language="JavaScript" type="text/javascript">
    </script>
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
                    <li ><a href="student">我的课程</a></li>
                    <li><a href="collection">我的收藏</a></li>
                    <li class="active"><a href="reply">我的评论</a></li>
                    <li><a href="introduction">个人信息</a></li>
                </ul>
            </div>
        </div>
        <!--右侧-->
        <div class="nav-right">
            <div class="nav-right-one">
                <div class="title">
                    <p>我的评论</p>
                    <hr/>
                </div>
                <div>
                    <table class="table">
                        <tr class="active">
                            <td>回复位置</td>
                            <td>回复内容</td>
                        </tr>
                        @foreach($data as $v)
                        <tr class="info">
                            <td><a href="#" style="color: black">{{$v->name}}</a></td>
                            <td><a href="#" style="color: black">{{$v->comment}}</a></td>
                        </tr>
                        @endforeach
                        {{--<tr class="info">--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="info">--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="info">--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                        {{--</tr>--}}
                        {{--<tr class="info">--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                            {{--<td><a href="#" style="color: black">123</a></td>--}}
                        {{--</tr>--}}
                    </table>
                </div>
                <div class="page">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
    <!--根部-->
</div>
</body>
</html>