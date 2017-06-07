@extends('header')
@section('title','教师课程管理章节创建')
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
      .edit-pad button{
        padding: 5px 8px;
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
        <label class="col-sm-2 control-label">章节1</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="chapterName[]" placeholder="章节名">
        </div>
        <label class="col-sm-1 edit-pad"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button></label>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-primary">添加章节</button>
          <button type="button" class="btn btn-info">下一步</button>
        </div>
      </div>
      <!-- 警告栏 -->
  <div class="form-group" id="warning"></div>
    </form>
  </div>
@endsection
<!-- 底部 -->
<div></div>

@section('javascript')
  <script>
  function add(index){
    var chapter = index+1;
    var html='<div class="form-group">'+
        '<label class="col-sm-2 control-label">章节'+chapter+'</label>'+
        '<div class="col-sm-9">'+
          '<input type="text" class="form-control" name="chapterName[]" placeholder="章节名">'+
        '</div>'+
        '<label class="col-sm-1 edit-pad"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button></label>'+
      '</div>';
    $('.form-horizontal').children('div').eq(index).before(html);
  }
    $('.btn-primary').click(function(){
      var index=$(this).parent().parent().index();
      add(index);
      closeWarning();
      del();
    });
    // 弹出选择框函数
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

    function del(){
      $('.glyphicon-remove').parent().unbind('click').click(function(){
        var div=$(this).parent().parent();
        Ewin.confirm({ message: "确认要删除这一行么？",btnok: "删除" }).on(function (e) {
          if (!e) {
            return;
          }
          div.remove();
          return;
        });
      });
    }
    del();
    $('.btn-info').unbind('click').click(function(){
      $('.alert-dismissible').alert('close');
      var flag = true;
      $('.form-horizontal input').each(function(){
        if ($(this).val()=='') {
          flag = false;
          addWarning('章节名不能为空。','错误!','danger');
          closeWarning();
          return false;
        }
      });
      if (flag) {
        $('.form-horizontal').attr('method','post');
        $('.form-horizontal').attr('action',"{{ url('teacher/createsecond') }}");
        $('.form-horizontal').submit();
      }    
    });
    function closeWarning(){
      $('input').focus(function(){
        $('.alert-dismissible').alert('close');
      });
    }
    function addWarning(content,title,type){
$('#warning').append('<div class="alert alert-'+type+' alert-dismissible col-sm-offset-2 col-sm-9" role="alert">'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  '<strong>'+title+'</strong>'+content+
'</div>');
}
  </script>
@endsection