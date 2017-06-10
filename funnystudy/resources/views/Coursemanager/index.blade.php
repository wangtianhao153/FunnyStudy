@extends('header')
@section('title', '教师基本资料')
@section('style')
    <style type="text/css">
        .left_nav{
            width:15%;
            margin-left: 8%;
            margin-top:50px;
            float: left;
            position: fixed;
        }
        .right_content{
            margin-top:10px;
            float: right;
            width: 67%;
            margin-right: 8%;
        }
        a:hover{
            text-decoration: none;
        }
        a:link{
            text-decoration:none;
        }
        #Img img{
            width: 200px;
            height: 200px;
        }
    </style>
@endsection
@section('header')
    @parent
@endsection
@section('content')
    <!-- 左导航 -->
    <div class="left_nav">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="{{ url('teacher/index') }}">基本资料</a></li>
            <li role="presentation"><a href="{{ url('teacher/list') }}">课程列表</a></li>
            <li role="presentation"><a href="{{ url('teacher/createcourse') }}">创建课程</a></li>
            <li role="presentation"><a href="{{ url('teacher/pswd') }}">修改密码</a></li>
        </ul>
    </div>
    <!-- 右内容 -->
    <div class="right_content">
        <!-- 路径导航 -->
        <ol class="breadcrumb">
            <li><a href="{{ url('index') }}">首页</a></li>
            <li class="active">基本资料</li>
        </ol>

        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">昵称</label>
                <div class="col-sm-9">
                    <input type="text" id="name" class="form-control edit" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">注册邮箱</label>
                <div class="col-sm-9">
                    <input type="email" id="username" class="form-control edit" value="{{ $user->username }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">个人头像</label>
                <div class="col-sm-9">
                    <!-- 个人头像 -->
                    <div class="col-md-5" id="Img"><img src="{{ asset($user->picture) }}" class="img-thumbnail"></div>
                    <!-- 图片上传 -->
                    <div id="picker" style="display:none;"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">个人签名</label>
                <div class="col-sm-9">
                    <input type="text" id="sentence" class="form-control edit" value="{{ $user->sentence }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">个人介绍</label>
                <div class="col-sm-9">
                    <textarea rows="3" id="introduce" type="text" class="form-control edit">{{ $user->introduce }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">年龄</label>
                <div class="col-sm-9">
                    <input type="text" id="age" class="form-control edit" onkeyup="value=value.replace(/[^\d]/g,'')" value="{{ $user->age }}">
                </div>
            </div>
        </form>

    </div>
@endsection
{{--底部--}}
<div></div>
@section('javascript')
<script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.js"></script>
<script type="text/javascript">

$('.edit').unbind('click').on('change',function () {
    var field = $(this).attr('id');
    var val = $(this).val();
    $.post('{{ url('teacher/editUser') }}',{field:field,val:val});
});


//图片上传
$('#Img').hover(function(){
    $(this).append('<div id="editImg" style="background:#000;width: 200px;height:200px;position: absolute;top:0px;color:#FFFAFA;line-height: 200px;text-align: center;filter:alpha(Opacity=50);-moz-opacity:0.5;opacity: 0.5">点击更换头像</div>');
    $('#editImg').unbind('click').click(function(){
        $('#picker').find('input').unbind('click').click();
    });
},function(){
    $('#editImg').remove();
});
var $list = $('#Img');
var uploader = WebUploader.create({

    // swf文件路径
    swf: 'https://cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',

    // 文件接收服务端。
    server: '{{ url('teacher/editHead') }}',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: {id : '#picker',multiple : false},

    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
    resize: false,
    produces:"charset=UTF-8",
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    },
});
uploader.on( 'fileQueued', function( file ) {
    var $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail" style="width: 200px;height: 200px;margin-bottom: 0px;">' +
                    '<img style="height: 190px;">' +
                    '</div>'
            ),
            $img = $li.find('img');


    // $list为容器jQuery实例
    $list.html( $li );
    $list.removeClass('Spicture');

    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    // thumbnailWidth x thumbnailHeight 为 100 x 100
    uploader.makeThumb( file, function( error, src ) {
        if ( error ) {
            $img.replaceWith('<span>不能预览</span>');
            return;
        }

        $img.attr( 'src', src );
    }, 200, 200 );
    var courseID=$('#courseID').val();
    uploader.upload();
});
</script>
@endsection