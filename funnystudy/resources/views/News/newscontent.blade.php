@extends('header')
@section('title','资讯内容页')
@section('style')
<style type="text/css">

    .articles{
        margin-top: 30px;
        height: 480px;
        width:1064px;
    }
    .articles img{
        width: 100%;
        height: 100%;
    }
    .articles-conntent{
        margin-top: 50px;
    }
</style>
@endsection
<body>
@section('content')
<div class="con_right col-lg-10 col-md-10 col-md-offset-1">
    <section class="es-section article-content">
        <ol class="breadcrumb">
            <li><a href="{{url('index')}}">首页</a></li>
            <li ><a href="{{url('news/index')}}"> 最新资讯</a></li>
            <li class="active">正文</li>
        </ol>

        <div class="article-metas">
            <div class="metas-body">
                <h2 class="title">
                    {{$new->title}}
                </h2>
                <div class="sns">
                    {{$new->time}}
                </div>
            </div>
        </div>
        <div class="article-text">
            <div class="articles" >
                <img alt="" src="{{$new->picture}}">
            </div>
            <div class="articles-conntent">
                &nbsp&nbsp&nbsp&nbsp&nbsp{{$new->comment}}
            </div>
        </div>

</section>
</div>
@endsection
</body>
</html>