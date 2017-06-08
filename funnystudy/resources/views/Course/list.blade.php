@extends('header')
@section('title','课程列表')
@section('style')
	<style type="text/css">
		.list{
			margin-top: 70px;
		}
		.thumbnail{
			margin-top: 20px;
		}
		a:link {
			color: #000000;
			text-decoration: none;
		}
		a:visited {
			color: #000000;
			text-decoration: none;
		}
		a:hover {
			color: #999999;
			text-decoration: underline;
		}
		a{
			text-align: center;
		}
		.nav-stacked{
			padding-left: 50px;
			padding-bottom: 20px;
		}
		.nav-stacked ul{
			border-bottom: 1px dashed #dedede;
			line-height: 2;
			margin-right: 15px;
		}
		.page{
			text-align: center;
		}
		.pagination-lg>li>a{
			margin-left: 5px;
		}
		body{
			padding-top: 70px;
		}
		</style>
	@endsection
</head>
<nav class="navbar navbar-default navbar-fixed-top">
<!--页面主体开始-->
		@section('content')
<div class="container">
		<!--面包屑开始-->
		<ol class="breadcrumb">
  			<li><a href="#">首页</a></li>
  			<li class="active">选课程</li>
		</ol>
		<!--面包屑结束-->
		<!--课程筛选开始-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nav-stacked">
      		<ul class="list-inline">
        		年级：
				@foreach($grade as $vi)
        		<li class="grade"><a href="{{Url('/course/list/graserch/'.$vi->id)}}">{{$vi->name}}</a></li>
				@endforeach
            </ul>
			<ul class="list-inline">
        		类别：
        
                <li><a href="">同步课程</a></li>
                <li><a href="">专题课程</a></li>
            </ul>
            <ul class="list-inline">
            	课程:
				@foreach($subject as $vi)
					<li class="subject"><a href="{{Url('course/list/subserch/'.$vi->id)}}">{{$vi->name}}</a></li>
				@endforeach
            </ul>
    	</div>
		<!--课程筛选结束-->
		<div class="list">
		<!--标签开始-->
		<div class="tabs">
			<ul class="nav nav-tabs">
  				<li role="presentation" class="active"><a href="#">最新</a></li>
  				<li role="presentation"><a href="#">热门</a></li>
  				<li role="presentation"><a href="#">推荐</a></li>
			</ul>
		</div>
		<!--标签结束-->
		<!--缩略图开始-->
		<div class="row">
			@foreach ($courselist as $course)
            <div class="col-xs-6 col-md-3">
                <a href="{{Url('course/'.$course->id)}}" class="thumbnail">
                    <h3>{{$course->name}}</h3>
                    <img src= '{{$course->URL}}' alt="#">
                    <p>{{$course->brief}}</p>
                </a>
            </div>
            @endforeach
  		</div>
  		<!--缩略图结束-->
  		<!--分页开始-->
  		<div class="page">
  		<nav aria-label="Page navigation">
  			<ul class="pagination pagination-lg">
				@if($page->LastPage()>1)
    			<li>
      				<a href="{{$page->Url($page->last)}}" aria-label="Previous">
        				<span aria-hidden="true">&laquo;</span>
      				</a>
    			</li>
				@for($i = 1;$i <= $page->LastPage();$i++)
    				<li class="{{($data->CurrentPage() == $i)?'active':''}}"><a href="{{$page->Url($i)}}">{{$i}}</a></li>
				@endfor
    			<li>
      				<a href="{{$page->Url($page->next)}}" aria-label="Next">
        				<span aria-hidden="true">&raquo;</span>
      				</a>
    			</li>
				@endif
  			</ul>
		</nav>
		</div>
  		<!--分页结束-->
		</div>
</div>
	@stop
<!--页面主体结束-->