@extends('header')
@section('title', '教师修改密码')
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
            <li role="presentation"><a href="{{ url('teacher/index') }}">基本资料</a></li>
            <li role="presentation"><a href="{{ url('teacher/list') }}">课程列表</a></li>
            <li role="presentation"><a href="{{ url('teacher/createcourse') }}">创建课程</a></li>
            <li role="presentation" class="active"><a href="{{ url('teacher/pswd') }}">修改密码</a></li>
        </ul>
    </div>
    <!-- 右内容 -->
    <div class="right_content">
        <!-- 路径导航 -->
        <ol class="breadcrumb">
            <li><a href="{{ url('index') }}">首页</a></li>
            <li class="active">修改密码</li>
        </ol>

        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">原密码</label>
                <div class="col-sm-9">
                    <input type="password" id="oldpswd" class="form-control edit">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新密码</label>
                <div class="col-sm-9">
                    <input type="password" id="newpswd" class="form-control edit">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新密码确认</label>
                <div class="col-sm-9">
                    <input type="password" id="repswd" class="form-control edit">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="button" class="btn btn-Primary">保存</button>
                </div>
            </div>
            <div class="form-group" id="warning"></div>
        </form>

    </div>
@endsection
{{--底部--}}
<div></div>
@section('javascript')
    <script type="text/javascript">
        $('#button').unbind('click').on('click',function () {
            var oldpswd = $('#oldpswd').val();
            var newpswd = $('#newpswd').val();
            var repswd = $('#repswd').val();
            if (oldpswd==''||newpswd==''||repswd=='') {
                addWarning('密码不能为空。', '错误!', 'danger');
                closeWarning();
            }else {
                if (newpswd == repswd) {
                    $.post('{{ url('teacher/editPassword') }}',{oldpswd:oldpswd,newpswd:newpswd},function (data) {
                        if (data==0)
                        {
                            addWarning('原密码错误。', '错误!', 'danger');
                            closeWarning();
                        }else if(data==1)
                        {
                            $('.edit').val('');
                            addWarning('密码修改成功。', '成功!', 'success');
                            closeWarning();
                        }
                    });
                } else {
                    addWarning('两次输入的新密码不一致。', '错误!', 'danger');
                    closeWarning();
                }
            }
        });
        function closeWarning(){
            $('input').focus(function(){
                $('.alert-dismissible').alert('close');
            });
        }
        function addWarning(content,title,type){
            $('#warning').html('<div class="alert alert-'+type+' alert-dismissible col-sm-offset-2 col-sm-9" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<strong>'+title+'</strong>'+content+
                    '</div>');
        }
    </script>
@endsection