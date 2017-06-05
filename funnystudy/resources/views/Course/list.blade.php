<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">

	</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
<!--页面主体开始-->
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
        		<li><a href="">小学</a></li>
                <li><a href="">初中</a></li>
                <li><a href="">高中</a></li>
                <li><a href="">大学</a></li>
                <li><a href="">其他</a></li>
            </ul>
			<ul class="list-inline">
        		类别：
        
                <li><a href="">同步课程</a></li>
                <li><a href="">专题课程</a></li>
            </ul>
            <ul class="list-inline">
            	课程:
            	<li><a href="#">科目1</a></li>
            	<li><a href="#">科目2</a></li>
            	<li><a href="#">科目3</a></li>
            	<li><a href="#">科目4</a></li>
            	<li><a href="#">科目5</a></li>
            	<li><a href="#">科目6</a></li>
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
                <a href="#" class="thumbnail">
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
    			<li>
      				<a href="#" aria-label="Previous">
        				<span aria-hidden="true">&laquo;</span>
      				</a>
    			</li>
    			<li><a href="#">1</a></li>
    			<li class="active"><a href="#">2</a></li>
    			<li><a href="#">3</a></li>
    			<li><a href="#">4</a></li>
    			<li><a href="#">5</a></li>
    			<li>
      				<a href="#" aria-label="Next">
        				<span aria-hidden="true">&raquo;</span>
      				</a>
    			</li>
  			</ul>
		</nav>
		</div>
  		<!--分页结束-->
		</div>
</div>
<!--页面主体结束-->
</body>