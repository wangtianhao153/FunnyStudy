@extends('header')
@section('title','资讯列表页')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css')}}">
@endsection
<body>
@section('content')
<div class="container">
    <div class="con_right col-lg-10 col-md-10 col-md-offset-1">
        <!--面包屑开始-->
        <ol class="breadcrumb">
            <li><a href="{{url('index')}}">首页</a></li>
            <li class="active">最新资讯</li>
        </ol>
        <!--面包屑结束-->
        <div class="con_right_bread">
            <h1>最新资讯</h1>
        </div>
        <div class="con_right_list">
            <ul>
                @foreach($news as $new)
                <li><a href="{{url("news/newscontent/$new->id")}}">{{$new->title}}</a><span>{{$new->time}}</span></li>
                @endforeach
            </ul>

        </div>
        <nav class=" text-center">
            {{ $news->links() }}
        </nav>
    </div>
</div>
@endsection
</body>
</html>