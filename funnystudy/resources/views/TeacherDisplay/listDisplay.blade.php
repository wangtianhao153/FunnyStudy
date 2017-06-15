@extends('header')
@section('title','教师列表页')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/teacherdisplay.css')}}">
@endsection
<body>
@section('content')
<div id="content-container" class="container">
    <ol class="breadcrumb">
        <li><a href="{{url('index')}}">首页</a></li>
        <li class="active">求实名师</li>
    </ol>
    <div class="teacher-box">
        <ul class="row">

            @foreach($users as $list)
                <li class="col-xs-12 col-sm-12 col-md-6 col-lg-6 es-teacher-list">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{url("teacherdisplay/information/$list->id")}}" style="display: block"><img class="media-object" src="{{$list->picture}}" alt="..."></a>
                        </div>
                        <div class="media-body" >
                            <div class="media-boy" style="width: 340px;">
                                <a href="{{url("teacherdisplay/information/$list->id")}}"> {{$list->name}}</a>
                            </div>
                           <div class="media-bod"style="word-wrap:break-word;width: 340px;">
                               <a href="{{url("teacherdisplay/information/$list->id")}}">&nbsp;&nbsp; &nbsp; {{$list ->introduce}}</a>
                           </div>

                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
    <nav class=" text-center">
        {{ $users->links() }}
    </nav>
</div>
@endsection
</body>
</html>