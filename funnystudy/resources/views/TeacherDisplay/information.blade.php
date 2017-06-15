@extends('header')
@section('title','教师详情页')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.pwstabs.min.css')}}">

    <style type="text/css">

        .navbar-header .navbar-brand a:link{
            color: #337ab7;
        }

        a:link{
            text-decoration:none;   /* 指正常的未被访问过的链接*/
        }
        a:visited{
            text-decoration:none; /*指已经访问过的链接*/
        }
        a:hover{
            text-decoration:none;/*指鼠标在链接*/
            color: red;
        }
        a:active{
            text-decoration:none;/* 指正在点的链接*/
        }
        .avatar-lg {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            width: 120px !important;
            height: 120px !important;
        }
        .user-center-header {
            position: relative;
            height: 220px;
            padding: 40px 0;
            background-color: #313131;
            z-index: 1;
        }
        .user-center-header .container {
            position: relative;
            z-index: 1;
            padding: 0 70px;
        }
        .user-center-header .user-avatar {
            position: relative;
            float: left;
            width: 66.67%;
            padding-left: 200px;
        }
        .user-center-header .avatar-wrap {
            position: absolute;
            top: 0;
            left: 0;
            border: 5px solid #585560;
            border: 5px solid rgba(255, 255, 255, 0.5);
        }
        .avatar-wrap {
            position: relative;
            display: inline-block;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }
        .user-center-header .name {
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .user-center-header .position {
            margin-bottom: 10px;
            color: #919191;
            color: rgba(255, 255, 255, 0.5);
        }
        .mrm {
            margin-right: 10px !important;
        }
        .user-center-header .mates {
            font-size: 18px;
            margin-bottom: 15px;
            color: #fff;
        }
        .mlm {
            margin-left: 10px !important;
        }
        .user-center-header .user-about {
            float: left;
            width: 33.33%;
            padding: 15px 10px;
            background-color: #919191;
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .user-center-header .user-about-content {
            height: 100px;
            overflow: hidden;
            line-height: 25px;
        }
        .user-center-header .mask {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 0 !important;
        }
        .mbl {
            margin-bottom: 20px !important;
        }
        .nav-pills > li {
            margin: 0 10px;
        }
        .nav-pills > li {
            margin-right: 5px;
        }
        .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
            background-color: #c30d22;
        }
        .nav-pills > li.active > a {
            color: #fff;
            background: #337ab7;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        .nav-pills > li > a {
            padding: 8px 20px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
        }
        .empty
        {
            padding-left: 5%;
        }
        .course-list .course-item:hover {
             -webkit-transform: translateY(-6px);

             box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);
             -webkit-box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);
             -moz-box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);

             transition: all 0.3s ease;
         }
        .qs-teacher-item:hover {
            -webkit-transform: translateY(-6px);

            box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);
            -webkit-box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);
            -moz-box-shadow: 0 26px 40px -24px rgba(0, 36, 100, 0.3);

            transition: all 0.3s ease;
        }
        .course-list .course-item {
            position: relative;
            z-index: 1;
            margin-bottom: 30px;
            border-radius: 4px;
            border: 1px solid #e4ecf3;
            background-color: #fff;
        }
        .course-list .course-item {
            transition: all 0.3s ease;
        }
        a:hover {
            text-decoration: none;
            color: red;
        }
        .course-list .course-item .course-img .img-responsive {
            width: 100%;
            padding: 10px;

        }

        .course-info .title {
            height: 38px;
            padding-top: 5px;

        }
        .title
        {
            font-size: 15px;
            text-align: center;
        }
        .qs-teacher-item {
            position: relative;
            margin-bottom: 20px;
            text-align: center;
            background: #F3F7F6;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            overflow: hidden;
        }
        .qs-teacher-item .teacher-img {
            padding-top: 25px;
            padding-bottom: 20px;
        }
        .avatar-lg {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            width: 100px !important;
            height: 100px !important;
        }
        .qs-teacher-item .teacher-name {
            font-size: 18px;
            color: #626B80;
            margin-bottom: 10px;
        }
        .btn-default {
            /* color: #333; */
            background-color: #ccc;
            border-color: #ccc;
        }
        .pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active {
            background-color: #337ab7;
        }
        .pws_tabs_container ul.pws_tabs_controll li a {
            background-color: #337ab7;

        }
        .course-li
        {
            float: left;
        }
        .course-details-main{
            width: 500px;
        }

    </style>
@endsection
<body>
@section('content')
<div class="user-center-header has-blurr" >

    <div class="container clearfix" >
        <div class="user-avatar">
            <div class="avatar-wrap">
                <img class="avatar-lg" src="{{$info ->picture}}">
            </div>
            <div class="name">
                {{$info->name}}
            </div>
            <div class="mates">
                <span class="mrm">{{$students}}</span>粉丝
            </div>
            <div class="actions">
                <input id="teacherid" type="hidden" value="{{$info->id}}">
                @if($focus == 0)
                <a class="btn btn-primary follow-btn mrl" href="javascript:;" data-url="/user/2303/follow"style=""value="">关注</a>
                <a class="btn btn-default unfollow-btn mrl" href="javascript:;" data-url="/user/2303/unfollow" style="display: none;"value="">已关注</a>
                @else
                <a class="btn btn-primary follow-btn mrl" href="javascript:;" data-url="/user/2303/follow"style="display: none;"value="">关注</a>
                <a class="btn btn-default unfollow-btn mrl" href="javascript:;" data-url="/user/2303/unfollow" style=""value="">已关注</a>
                @endif
            </div>
        </div>
        <div class="user-about hidden-sm hidden-xs">
            <div class="user-about-content" style="word-wrap:break-word;">
                {{$info->introduce}}
            </div>
        </div>
    </div>
    <div class="mask" style="position: absolute; left: 0px; right: 0px; z-index: 1;"></div>
</div>

<div class="container">

    <!--标题div结束-->
    <div class="course-detail-main col-md-12">
        <div class="course-detail-main-div">
            <div data-pws-tab="course-details" data-pws-tab-name="个人介绍">
                <div class="course-details-main">
                    <div class="course-detail-content" style="word-wrap:break-word;">
                        {{$info->sentence}}
                    </div>
                </div>
            </div>

            <div data-pws-tab="course-list" data-pws-tab-name="在教课程">
                <div class="course-list qs-exellent-course-list tab-content">

                    @if($coursecount>0)
                        @foreach($course as $courses)
                            <div class="course-li"style="margin-left: 50px;">
                                <div class="course-item"style="width:290px;">
                                    <div class="course-img" style="height: 180px;">
                                        <a href="#" target="_blank">
                                            <img src="{{$courses->URL}}"  class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="course-info">
                                        <div class="title">
                                            <a class="link-dark" href="" target="_blank">
                                                {{$courses->name}}
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="rowl">
                            <div class="empty">暂无课程</div>
                        </div>
                    @endif

                </div>
            </div>
            <div data-pws-tab="course-comments" data-pws-tab-name="粉丝">
                <div class="course-lists">
                    @if($students>0)
                        @foreach($fanss as $fans)
                        <div class="col-lg-2 col-md-2 col-sm-2 " style=" height: 211px;">
                            <div class="qs-teacher-item">
                                <div class="teacher-img">
                                    <a href=""> <img class="avatar-lg" src="{{$fans->picture}}" alt=""></a>
                                </div>
                                <a href=""> <div class="teacher-name">{{$fans->name}}</div></a>
                            </div>
                        </div>

                        @endforeach
                            <nav class=" text-center">
                                {{ $fanss->links() }}
                            </nav>
                    @else
                        <div>
                            <div class="row">
                                <div class="empty">还没有粉丝哟</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">登录</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="txt_departmentname">账号</label>
                    <input type="text" name="username" class="form-control" id="txt_departmentname" placeholder="请输入账号">
                </div>
                <div class="form-group">
                    <label for="txt_parentdepartment">密码</label>
                    <input type="password" name="password" class="form-control" id="txt_parentdepartment" placeholder="请输入密码">
                </div>
                <div class="modal-footer"style="text-align: center">
                    <button type="button" id="btn_submit" class="btn btn-primary" data-dismiss="modal">登录</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
@section('javascript')
<script src="{{asset('/js/jquery.pwstabs.js')}}"></script>
<script type="text/javascript">
    jQuery(function($){"display","none"
        $('.course-detail-main-div').pwstabs({
            effect: 'scale',
            defaultTab: 1,
        });
    });

    $('.actions .btn-primary').unbind('click').on('click',function () {
        @if(Session::has('username'))
            $(this).next().show();
            $(this).hide();
            var name=$('#teacherid').val();
            $.post('{{url('teacherdisplay/studentsteachers')}}',{name:name},function (data) {
                if (data == 1){
                    window.history.go(0);
                }
            });
        @else
            $('#myModal').modal();
            $('#btn_submit').unbind('click').on('click',function () {
                var username=$("input[name='username']").val();
                var password=$("input[name='password']").val();
                var name=$('#teacherid').val();
                $.post('{{url('teacherdisplay/teacherLogin')}}',{email:username,password:password,name:name},function (data) {
                    if(data==0){
                        alert('用户名或密码错误');
                    }else if (data==1){
                        window.history.go(0);
                    }
                });

            })
        @endif

    });
    $('.actions .btn-default').unbind('click').click(function () {
        $(this).hide();
        $(this).prev().show();
        var name=$('#teacherid').val();
        $.post('{{url('teacherdisplay/teachersstudents')}}',{name:name},function (data) {
            if(data == 1){
                window.history.go(0);
            }
        });

    });
</script>
@endsection


