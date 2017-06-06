<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>视频上传页</title>

    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .tmp_nav{
        height: 130px;
      }
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
      .edit-progress{
        padding: 0px;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
  <!-- 导航栏 -->
<div class="tmp_nav"></div>


<!-- 内容主题 -->

<!-- 左导航 -->
  <div class="left_nav">
    <ul class="nav nav-pills nav-stacked">
      <li role="presentation"><a href="{{ url('teacher/index') }}">课程列表</a></li>
      <li role="presentation" class="active"><a href="{{ url('teacher/createcourse') }}">创建课程</a></li>
    </ul>
  </div>
<!-- 右内容 -->
  <div class="right_content">
    <!-- 路径导航 -->
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li><a href="#">课程管理</a></li>
      <li class="active">上传视频</li>
    </ol>
    <!-- 表单提交 -->
<form class="form-horizontal">
  <div class="form-group">
    <label for="chapterName" class="col-sm-2 control-label">选择章节</label>
    <div class="col-sm-3">
      <select class="form-control" id="chapterName">
        @foreach( $chapters as $chapter )
          <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
        @endforeach
      </select>
    </div>
    <label for="videoName" class="col-sm-2 control-label">视频名称</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="videoName" placeholder="视频名称">
    </div>
    <div class="col-sm-2">
      <div class="btn btn-primary pick">选择文件</div>
    </div>
  </div>
  <!-- 警告栏 -->
  <div class="form-group" id="warning"></div>
<!-- 上传列表 -->
  <div class="form-group" id="thelist"></div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" id="ctlBtn">上传视频</button>
      <button type="button" class="btn btn-info">完成</button>
      <div id="picker" style="display:none;"></div>
    </div>
  </div>
</form>
  </div>
<!-- 底部 -->
<div></div>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  </body>
  <script type="text/javascript">
  var list = $('#thelist');
  $('.btn-info').unbind('click').click(function () {
    $(location).attr('href', '{{ url('teacher/index') }}');
  });
$('.pick').unbind('click').click(function(){
  if($("#videoName").val() == ''){
    addWarning('请输入视频名称。','错误!','danger');
  }else{
    $('#picker').find('input').unbind('click').click();
  }
});
$('#videoName').focus(function(){
  $('.alert-dismissible').alert('close');
});
function addWarning(content,title,type){
$('#warning').append('<div class="alert alert-'+type+' alert-dismissible col-sm-offset-2 col-sm-9" role="alert">'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  '<strong>'+title+'</strong>'+content+
'</div>');
}

var uploader = WebUploader.create({

    // swf文件路径
    swf: 'https://cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',

    // 文件接收服务端。
    server: '{{ url('teacher/createthird') }}',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#picker',

    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
    resize: false,
    produces:"charset=UTF-8",
    accept: {
      title: 'Videos',
      extensions: 'mp4,flv,jpeg,bmp,doc,docx,rar,pdf',
      mimeTypes: 'video/*'
    },
});
// 选择文件之后的操作
  uploader.on( 'fileQueued', function( file ) {
    // 添加到上传列表
    list.append('<div id="'+file.id+'" class="item">'+
    '<label for="chapterName" class="col-sm-2 control-label">章节:</label><div class="col-sm-10"><p class="form-control-static">'+$('#chapterName').children('option:selected').text()+'</p><input type="hidden" class="chapterID" value="'+$('#chapterName').val()+'"/></div>'+
    '<label for="videoName" class="col-sm-2 control-label">视频名称:</label><div class="col-sm-10"><p class="form-control-static videoName">'+$("#videoName").val()+'</p></div>'+
    '<label for="fileName" class="col-sm-2 control-label">文件名:</label><div class="col-sm-10"><p class="form-control-static">'+file.name+'</p></div>'+
    '<label for="condition" class="col-sm-2 control-label condition">等待上传</label>'+
    '<div class="progress col-sm-10 edit-progress">'+
      '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">'+
      '0%'+
      '</div>'+
    '</div>'+
  '</div>');
  // 重置select选择器,文本输入框
  $("#chapterName:first option:first").attr("selected",true);
  $('#videoName').val('');
  });
// 文件上传过程中创建进度条实时显示。
uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
    $percent = $li.find('.progress .progress-bar');

    $li.find('.condition').text('上传中');

    $percent.css( 'width', parseInt(percentage * 100) + '%' );
    $percent.text( parseInt(percentage * 100) + '%' );
});
//  上传参数设置
  uploader.on( 'uploadBeforeSend', function( block, data ) {
    // block为分块数据。

    // file为分块对应的file对象。
    var file = block.file;


    // 修改data可以控制发送哪些携带数据。
    var fileid = file.id;
    data.chapterID = $('#'+fileid).find('.chapterID').val();
    data.videoName = $('#'+fileid).find('.videoName').text();
  });
//  点击上传视频
  $('#ctlBtn').on( 'click', function() {
  uploader.upload();
});
//  上传成功操作
uploader.on( 'uploadSuccess', function( file ) {
    $( '#'+file.id ).find('.condition').text('上传成功');
});
//上传错误操作
uploader.on( 'uploadError', function( file ) {
    $( '#'+file.id ).find('.condition').text('上传出错');
});
  </script>
</html>