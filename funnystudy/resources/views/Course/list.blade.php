<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">
		body{
			font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "微软雅黑", Arial, sans-serif;
		}
		.con_right_list li a:hover{
			color: red;
		}
		.navbar-nav li a:hover{
			background-color: #fff;
		}
		.navbar-letf{
			position: absolute;
			margin-left: 25%;
			font-size: 18px;
		}
		.qs-header{
			height: 80px;
			padding: 15px 0;
			background-color: #fff;
		}
		.navbar-brand{
			font-size: 50px;
		}
		.visible-lg {
			position: absolute;
			margin-left: 70%;
		}
		.navbar-form .form-group {
			position: relative;
		}
		.navbar-form .form-control {
			height: 30px;
			width: 130px;
			border-radius: 20px;
			line-height: 28px;
			padding: 0 24px 0 12px;
			border-color:#C0C0C0;
		}

		.navbar-form .button {
			position: absolute;
			right: 2px;
			top: 6px;
			border: none;
			background: none;
		}

		.qs-header .navbar-header {
			margin-top: 3px;
		}
		.qs-header .container {
			position: relative;
		}
		.qs-header .navbar-nav > li > a {
			color: #000;
		}
		.navbar-form .form-control {
			background-color: #e7e7e7;
		}
		a:hover {
			color: #c30d22;
		}
		.qs-header .navbar-nav > li > a:hover {
			color: #c30d22;
		}

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
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<header class="qs-header">
		<nav class="collapse navbar-collapse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">趣学教育</a>
				</div>
				<ul class="nav navbar-nav navbar-letf">
					<li class=""><a href="#">首页</a></li>
					<li class=""><a href="#">最新资讯</a></li>
					<li class=""><a href="#">找老师</a></li>
					<li class=""><a href="#">看直播</a></li>
					<li class=""><a href="#">选课程</a></li>
				</ul>
				<form class="navbar-form pull-right visible-lg" action="http://www.qswangxiao.com/search" method="get">
					<div class="form-group">
						<input class="form-control" placeholder="请输入搜索的内容" >
						<button class="button glyphicon glyphicon-search"></button>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
				</ul>
			</div>
		</nav>
	</header>
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