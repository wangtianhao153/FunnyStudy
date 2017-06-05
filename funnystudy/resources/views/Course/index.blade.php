<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>教师课程管理首页</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body{
        padding-top: 70px;
      }
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
      .butt{
        width: 100%;
        height: 35px;
      }
      .butt button{
        width: 100%;
      }
      .none{
        display:none;
      }

      </style>
  <body>
<!-- 导航栏 -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header col-md-1.5">
      <a class="navbar-brand" href="#">趣学教育</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <div class="navbar-left col-md-7">
      <ul class="nav navbar-nav navbar-right col-md-12 text-center">
        <li class="active col-md-3"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
        <li class="col-md-3"><a href="#">找老师</a></li>
        <li class="col-md-3"><a href="#">选课程</a></li>
        <li class="col-md-3.5"><a href="#">最新资讯</a></li>
      </ul>
    </div>
      <form class="navbar-form navbar-right col-md-3">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" value="请输入想要搜索的课程">
        </div>
        <button type="submit" class="btn btn-default">serch</button>
      </form>    
      <ul class="nav navbar-nav navbar-right col-md-1.5">
      
      <li class="dropdown">  
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding:0px 15px 0px 15px"><img src="image/test.png" height="50" width="50" class="img-circle"> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">个人中心</a></li>
            <li><a href="#">账户管理</a></li>
            <li><a href="#">退出登录</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- 内容主题 -->

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
      <li class="active">课程列表</li>
    </ol>
    <!-- 课程列表 -->
<div class="row">
  @foreach ( $courses as $course)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="{{ url("teacher/info/$course->id") }}">
        <img src="{{ $course->URL }}" alt="">
        <div class="caption">
          <h3>{{ $course->name }}</h3>
          <p>{{ $course->brief }}</p>
        </div>
      </a>
        <div class='butt'>
          <input type="hidden" value="{{ $course->id }}">
          <button type="button" class="btn btn-danger none">删除</button>
        </div>
    </div>
  </div>
  @endforeach
</div>
  </div>
    


<!-- 底部 -->
<div></div>


    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
  </body>
  <script type="text/javascript">
      $('.row .thumbnail').hover(function(){
        $(this).find('button').removeClass('none');
      },function(){
        $(this).find('button').addClass('none');
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

      $('.btn-danger').unbind('click').click(function(){
        var div=$(this).parent().parent().parent();
        var id = $(this).parent().children('input').val();
        Ewin.confirm({ message: "确认要删除选择的课程吗？",btnok: "删除" }).on(function (e) {
          if (!e) {
            return;
          }
//          post访问无返回值
          $.post('{{ url('teacher/listdelete') }}'+'/'+id);
          div.remove();
          window.location.reload();
        });
      });
  </script>
</html>