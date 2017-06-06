<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>教师课程管理创建课程</title>

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
      a:hover{
        text-decoration: none;
      }
      a:link{
        text-decoration:none;
      }
      .picture{
        height: 210px;
        width: 340px;
      }
      .Spicture{
        border: 3px dashed #e6e6e6;
        line-height: 210px;
        text-align: center;
        color: #9C9C9C;
        font-size: 25px;
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
      <li class="active">创建课程</li>
    </ol>
    <!-- 表单提交 -->
    <form class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-2 control-label">选择年级</label>
        <div class="col-sm-3">
          <select class="form-control" id="grades">
            @foreach( $grades as $grade)
              <option value="{{ $grade->id }}">{{ $grade->name }}</option>
              @endforeach
          </select>
        </div>
        <label class="col-sm-2 control-label">选择学科</label>
        <div class="col-sm-3">
          <select class="form-control" id="subjects">
            @foreach( $subjects as $subject )
              <option value="{{ $subject->id }}">{{ $subject->name }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">课程名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="courseName" name="courseName" placeholder="课程名">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">课程简介</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="briefCourse" name="briefCourse" rows="3"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">封面上传</label>
        <div class="col-sm-10">
          <!-- <button type="button" class="btn btn-primary pick">选择文件</button> -->
          <div class="picture Spicture">点击上传</div>
          <div id="picker" style="display:none;"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-info">下一步</button>
        </div>
      </div>
      <div class="form-group" id="warning"></div>
    </form>
  </div>
<!-- 底部 -->
<div></div>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.js"></script>
  </body>
  <script type="text/javascript">
  $('.btn-info').click(function(){
    if ($('#courseName').val()==''||$('#briefCourse').val()=='') {
      addWarning('请输入课程名和课程简介','错误!','danger')
    }else{
      // var from = $('.form-horizontal');
      // from.attr('method','post');
      // from.attr('action','/test.php');
      // from.submit();
      var courseName = $('#courseName').val();
      var briefCourse = $('#briefCourse').val();
      var gradeID = $('#grades').val();
      var subjectID = $('#subjects').val();
      uploader.option('formData',{
            courseName:courseName,
            briefCourse:briefCourse,
            gradeID:gradeID,
            subjectID:subjectID,
        });
      uploader.upload();
    }
  });
  function addWarning(content,title,type){
$('#warning').append('<div class="alert alert-'+type+' alert-dismissible col-sm-offset-2 col-sm-9" role="alert">'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  '<strong>'+title+'</strong>'+content+
'</div>');
};
$('#courseName').focus(function(){
  $('.alert-dismissible').alert('close');
});
$('#briefCourse').focus(function(){
  $('.alert-dismissible').alert('close');
});
$('.picture').unbind('click').click(function(){
  $('#picker').find('input').unbind('click').click();
});
var $list = $('.picture');
var uploader = WebUploader.create({

    // swf文件路径
    swf: 'https://cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',

    // 文件接收服务端。
    server: '{{ url('teacher/createfirst') }}',

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
            '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
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
    }, 330, 200 );
});
uploader.on( 'uploadSuccess', function( file ) {
    $(location).attr('href', '{{ url('teacher/createchapter') }}');
});
  </script>
</html>