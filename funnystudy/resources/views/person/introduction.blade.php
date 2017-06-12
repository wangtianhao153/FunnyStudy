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
    <div style="margin-top: 50px;">
        <!--左侧-->
        <div class="nav-left">
            <div class="left-head">
                <p>我的学习</p>
                <hr/>
            </div>
            <div class="left-content">
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="{{ url('student')}}">我的课程</a></li>
                    <li><a href="{{ url('collection')}}">我的收藏</a></li>
                    <li><a href="{{ url('reply')}}">我的评论</a></li>
                    <li class="active"><a href="{{ url('introduction')}}">个人信息</a></li>
                </ul>
            </div>
        </div>
        <!--右侧-->
        <div class="nav-right">
            <form action="{{URL::action('IntroductionController@updata')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="nav-right-one">
                    <div class="title">
                       <p>修改资料</p>
                       <hr/>
                    </div>
                    <div class="content">
                        <div class="content-introduction">
                            <p>上传头像</p>
                            <input type="file" name="picture" value="上传头像">

                            @if($pic == NULL)
                                <?php echo '现无头像'; ?>
                           @else
                            <img src=" <?php echo $pic; ?>"  border="0" height="100px" width="100px" style="margin-top: 20px">
                                @endif

                        </div>
                        <div class="content-introduction">
                            <p>用户名</p>
                            <input type="text" value="<?php echo $name;?>" name="name" readOnly="true">
                        </div>
                        <div class="content-introduction">
                            <p>年龄</p>
                            <input type="text" name="age" value="<?php echo $age;?>" />
                        </div>
                        <div class="content-introduction">
                            <p>QQ号</p>
                            <input type="text" name="contact_qq" value="<?php echo $contact;?>" />
                        </div>
                        <div class="content-introduction">
                            <p>自我简介</p>
                            <textarea rows="5" cols="60" name="introduce" ><?php echo $text;?></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" value="提交" name="submit" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
    <!--根部-->
</div>
</body>
</html>