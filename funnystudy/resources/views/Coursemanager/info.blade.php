@extends('header')
@section('title',$course->name)
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
      .courseName{
        text-align:center;
      }
      .brief{
        text-indent:2em;
      }
      .chapter{
        margin-top: 10px;
      }
      .bkgc{
        background-color:#F0F0F0;
      }
      .operate{
        padding-top:2px;
      }
      .edit-operate{
        padding-top: 10px;
      }
      .thumbnail{
        width: 340px;
        height: 210px;
      }
      .thumbnail img{
        width: 330px;
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
      <li role="presentation" class="active"><a href="{{ url('teacher/index') }}">课程列表</a></li>
      <li role="presentation"><a href="{{ url('teacher/createcourse') }}">创建课程</a></li>
    </ul>
  </div>
<!-- 右内容 -->
  <div class="right_content">
    <!-- 路径导航 -->
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li><a href="#">课程管理</a></li>
      <li class="active">课程详情</li>
    </ol>
    <!-- 课程详情 -->
    <div>
      <!-- 课程名及简介 -->
      <div class="col-md-7">
        <div class="col-md-12 courseName"><h1>{{ $course->name }}</h1><input type="hidden" id="courseID" class="id" value="{{ $course->id }}"></div>
        <div class="col-md-12 brief"><p class="lead">{{ $course->brief }}</p><input type="hidden" class="id" value="{{ $course->id }}"></div>
      </div>
      <!-- 课程图片 -->
      <div class="col-md-5" id="Img"><div class="file-item thumbnail"><img src="{{ asset($course->URL) }}" alt="..." class="img-thumbnail"></div></div>
      <!-- 图片上传 -->
      <div id="picker" style="display:none;"></div>
    <!-- 新增章节按钮 -->
      <div class="col-md-5"><button type="button" class="btn btn-primary" onclick="newChapter()">添加章节<input type="hidden" class="id" value="id"></button></div>
      <!-- 章节列表 -->
  <div class="col-md-12" id="list">
    @foreach( $chapters as $chapter )
    <div>
      <div class="col-md-12 chapter">
        <div class="col-md-8"><h3>{{ $chapter->name }}</h3><input type="hidden" class="id" value="{{ $chapter->id }}"></div><div class="operate edit-operate col-md-4"></div>
      </div>
      @foreach( $videos as $video )
        @if( $video->c_id == $chapter->id )
        <div class="col-md-12">
          <div class="col-md-offset-1 col-md-7"><h4>{{ $video->name }}</h4><input type="hidden" class="id" value="{{ $video->id }}"></div><div class="operate col-md-4"></div>
        </div>
        @endif
        @endforeach
    </div>
      @endforeach
  </div>






    </div>
  </div>
@endsection
@section('javascript')

  <script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.js"></script>
  <script type="text/javascript">

$('#Img').hover(function(){
  $(this).append('<div id="editImg" style="background:#000;width: 340px;height:210px;position: absolute;top:0px;color:#FFFAFA;line-height: 210px;text-align: center;filter:alpha(Opacity=50);-moz-opacity:0.5;opacity: 0.5">点击更换图片</div>');
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
    server: '{{ url('teacher/editthumb') }}',

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
            '<div id="' + file.id + '" class="file-item thumbnail" style="width: 340px;height: 210px;">' +
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
    var courseID=$('#courseID').val();
    uploader.option('formData',{
            courseID:courseID,
        });
    uploader.upload();
});
var flag = false;
function edit(dom){
  if (flag){
    return;
  }else{
    $(dom).dblclick(function(){
      flag = true;
      var val = $(this).text();
      var div = $(this).parent();
      div.parent().find('.operate').html('');
      $(this).remove();
      switch(dom){
        case 'p' :div.append('<textarea class="form-control" id="edit" rows="3" placeholder="'+val+'"></textarea>');break;
        default:div.append('<input type="text" class="form-control" id="edit" placeholder="'+val+'">');break;
      }
      $('#edit').focus();
      $('#edit').change(function(){
        var editval = $(this).val();
        var id = $(this).parent().find('.id').val();
        $(this).remove();
        switch(dom){
          case 'p' :div.append('<p class="lead">'+editval+'</p>');break;
          case 'h3':div.append('<h3>'+editval+'</h3>');break;
          case 'h4':div.append('<h4>'+editval+'</h4>');break;
          case 'h1':div.append('<h1>'+editval+'</h1>');break;
        }
        $.post('{{ url('teacher/editCourseInfo') }}',{type:dom,id:id,editval:editval});
        edit(dom);
      });
      $('#edit').blur(function(){
        var editval = $(this).attr('placeholder');
        $(this).remove();
        switch(dom){
          case 'p':div.append('<p class="lead">'+editval+'</p>');break;
          case 'h3':div.append('<h3>'+editval+'</h3>');break;
          case 'h4':div.append('<h4>'+editval+'</h4>');break;
          case 'h1':div.append('<h1>'+editval+'</h1>');break;
        }
        edit(dom);
      });
      flag = false;
    });
  }
}
edit('h3');
edit('h1');
edit('h4');
edit('p');
operate();
function operate(){
  $('#list').children('div').children('div').hover(function(){
  var div=$(this);
  div.addClass('bkgc');
  var thisclass=$(this).attr('class');
  var id=$(this).find('.id').val();
  if(thisclass == 'col-md-12 bkgc'){
    $('#list').find('.operate').html('');
    $(this).find('.operate').append('<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-arrow-up"></span></button><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-arrow-down"></span></button><a class="btn btn-info" href="{{ url('course/play') }}'+'/'+id+'">详情</a><button type="button" class="btn btn-danger">删除</button>');
    $('.btn-danger').click(function(){
      Ewin.confirm({ message: "确认要删除这一个视频吗？",btnok: "删除" }).on(function (e) {
          if (!e) {
            return;
          }
          div.remove();
          // ajax操作
        var url = '{{ url('teacher/videoDelete') }}' + '/' + id ;
          $.post(url);
          return;
        });
    });

    // first 表示当前点击的div  second表示要和它交换的div
    $('.glyphicon-arrow-up').unbind('click').click(function(){
      var first=div.index();
      if (first>1) {
        var second=first-1;
        // 交换前先获取ID
        var firstID = div.parent().children('div').eq(first).find('.id').val();
        var secondID = div.parent().children('div').eq(second).find('.id').val();
        $.post('{{ url('teacher/reorder') }}',{type:1,firstID:firstID,secondID:secondID});
        changeDiv(first,second,div.parent());
      }
    });
    $('.glyphicon-arrow-down').unbind('click').click(function(){
      var first=div.index();
      var last=div.parent().children('div:last-child').index();
      if (first<last) {
        var second = first+1;
        var firstID = div.parent().children('div').eq(first).find('.id').val();
        var secondID = div.parent().children('div').eq(second).find('.id').val();
        $.post('{{ url('teacher/reorder') }}',{type:1,firstID:secondID,secondID:firstID});
        changeDiv(first,second,div.parent());
      }
    });
  }else{
    $('#list').find('.operate').html('');
    var courseID=$('#courseID').val();
    $(this).find('.operate').append('<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-arrow-up"></span></button><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-arrow-down"></span></button><a class="btn btn-info" href="{{ url('teacher/uploadvideo/') }}'+'/'+courseID+'">添加</a><button type="button" class="btn btn-danger">删除</button>');
    $('.btn-danger').click(function(){
      Ewin.confirm({ message: "确认要删除本章吗?视频不可恢复!",btnok: "删除" }).on(function (e) {
          if (!e) {
            return;
          }
          div.parent().remove();
          // ajax操作
        var url = '{{ url('teacher/chapterDelete') }}'+'/'+id;
          $.post(url);
          return;
        });
    });

    $('.glyphicon-arrow-up').unbind('click').click(function(){
      var first=div.parent().index();
      if (first>0) {
        var second=first-1;
        // 交换前先获取ID
        var firstID = $('#list').children('div').eq(first).children('div:first-child').find('.id').val();
        var secondID = $('#list').children('div').eq(second).children('div:first-child').find('.id').val();
        $.post('{{ url('teacher/reorder') }}',{type:2,firstID:firstID,secondID:secondID});
        changeDiv(first,second,$('#list'));
        operate();
      }
    });
    $('.glyphicon-arrow-down').unbind('click').click(function(){
      var first=div.parent().index();      
      var last=div.parent().parent().children('div:last-child').index();
      if (first<last) {
        var second = first+1;
        var firstID = $('#list').children('div').eq(first).children('div:first-child').find('.id').val();
        var secondID = $('#list').children('div').eq(second).children('div:first-child').find('.id').val();
        $.post('{{ url('teacher/reorder') }}',{type:2,firstID:secondID,secondID:firstID});
        changeDiv(first,second,$('#list'));
        operate();
      }
    });
  }
},function(){
  $(this).find('.operate').html('');
  $(this).removeClass('bkgc');
});
}


function changeDiv(first,second,divs){
  var firstDiv = divs.children('div').eq(first);
  var secondDiv = divs.children('div').eq(second);

  var tmpDiv;
  tmpDiv=firstDiv.html();
  firstDiv.html(secondDiv.html());
  secondDiv.html(tmpDiv);
}
function newChapter(){
  var id = $("#courseID").val();
  $('#list').append('<div>'+
      '<div class="col-md-12 chapter">'+
        '<div class="col-md-8"><input type="text" class="form-control" id="newEdit" placeholder="请输入章节名"></div><div class="operate edit-operate col-md-4"></div>'+
      '</div></div>');
  $('#newEdit').focus();
  $('#newEdit').change(function(){
      var editval = $(this).val();
      var div=$(this).parent();
      $(this).remove();
      div.append('<h3>'+editval+'</h3>');
      $.post('{{ url('teacher/editCourseInfo') }}',{type:'newChapter',editval:editval,id:id},function(data){
         div.append('<input type="hidden" class="id" value="'+data+'">');
      });
    });
  operate();
    $('#newEdit').blur(function(){
      $(this).parent().parent().remove();
    });
}



 (function ($) {
 window.Ewin = function () {
 var html = '<div id="[Id]" class="modal fade" role="dialog" aria-labelledby="modalLabel">' +
    '<div class="modal-dialog modal-sm" style="margin-top: 250px;">' +
     '<div class="modal-content">' +
     '<div class="modal-header">' +
      '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
      '<h4 class="modal-title" id="modalLabel">[Title]</h4>' +
     '</div>' +
     '<div class="modal-body">' +
     '<p>[Message]</p>' +
     '</div>' +
     '<div class="modal-footer">' +
 '<button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>' +
 '<button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>' +
 '</div>' +
     '</div>' +
    '</div>' +
    '</div>';
 
 
 var dialogdHtml = '<div id="[Id]" class="modal fade" role="dialog" aria-labelledby="modalLabel">' +
    '<div class="modal-dialog">' +
     '<div class="modal-content">' +
     '<div class="modal-header">' +
      '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
      '<h4 class="modal-title" id="modalLabel">[Title]</h4>' +
     '</div>' +
     '<div class="modal-body">' +
     '</div>' +
     '</div>' +
    '</div>' +
    '</div>';
 var reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
 var generateId = function () {
  var date = new Date();
  return 'mdl' + date.valueOf();
 }
 var init = function (options) {
  options = $.extend({}, {
  title: "操作提示",
  message: "提示内容",
  btnok: "确定",
  btncl: "取消",
  width: 200,
  auto: false
  }, options || {});
  var modalId = generateId();
  var content = html.replace(reg, function (node, key) {
  return {
   Id: modalId,
   Title: options.title,
   Message: options.message,
   BtnOk: options.btnok,
   BtnCancel: options.btncl
  }[key];
  });
  $('body').append(content);
  $('#' + modalId).modal({
  width: options.width,
  backdrop: 'static'
  });
  $('#' + modalId).on('hide.bs.modal', function (e) {
  $('body').find('#' + modalId).remove();
  });
  return modalId;
 }
 
 return {
  alert: function (options) {
  if (typeof options == 'string') {
   options = {
   message: options
   };
  }

  var id = init(options);
  var modal = $('#' + id);
  modal.find('.ok').removeClass('btn-danger').addClass('btn-primary');
  modal.find('.cancel').hide();
 
  return {
   id: id,
   on: function (callback) {
   if (callback && callback instanceof Function) {
    modal.find('.ok').click(function () { callback(true); });
   }
   },
   hide: function (callback) {
   if (callback && callback instanceof Function) {
    modal.on('hide.bs.modal', function (e) {
    callback(e);
    });
   }
   }
  };
  },
  confirm: function (options) {
  var id = init(options);
  var modal = $('#' + id);
  modal.find('.ok').removeClass('btn-primary').addClass('btn-danger');
  modal.find('.cancel').show();
  return {
   id: id,
   on: function (callback) {
   if (callback && callback instanceof Function) {
    modal.find('.ok').click(function () { callback(true); });
    modal.find('.cancel').click(function () { callback(false); });
   }
   },
   hide: function (callback) {
   if (callback && callback instanceof Function) {
    modal.on('hide.bs.modal', function (e) {
    callback(e);
    });
   }
   }
  };
  },
  dialog: function (options) {
  options = $.extend({}, {
   title: 'title',
   url: '',
   width: 800,
   height: 550,
   onReady: function () { },
   onShown: function (e) { }
  }, options || {});
  var modalId = generateId();
 
  var content = dialogdHtml.replace(reg, function (node, key) {
   return {
   Id: modalId,
   Title: options.title
   }[key];
  });
  $('body').append(content);
  var target = $('#' + modalId);
  target.find('.modal-body').load(options.url);
  if (options.onReady())
   options.onReady.call(target);
  target.modal();
  target.on('shown.bs.modal', function (e) {
   if (options.onReady(e))
   options.onReady.call(target, e);
  });
  target.on('hide.bs.modal', function (e) {
   $('body').find(target).remove();
  });
  }
 }
 }();
})(jQuery);

  </script>
  @endsection