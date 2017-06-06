<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/register.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <title>Funnystudy注册系统</title>
    <style>
        html, body { height: 100%; overflow: hidden; }
    </style>
    <script type="text/javascript">

    </script>
</head>
<body>
    <!--导航栏-->
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
                        <li><a href="register.blade.php"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                    </ul>
                </div>
            </nav>
        </header>

    <!--注册-->
    <div class="login">
    <form action="#" method="post">
        <div class="form-group">
            <ul type="none">
                <li>用户名</li>
                <input type="text" name="name" placeholder="用户名" >
                <li>注册账号</li>
                <input type="text" name="email" placeholder="邮箱" >
                <li>密码</li>
                <input type="password" name="password" placeholder="密码" >
                <li>确认密码</li>
                <input type="password" name="psw" placeholder="确认密码" >
            </ul>
        </div>
        <div class="form-forget">
            <input name="" type="checkbox" id="check" />
            &nbsp;&nbsp;已阅读并同意
            <a href="#" target="_blank">《趣学教育的服务条款》</a>
        </div>
        <div class="text-center">
            <input type="submit" class="login_btn" onclick="return alertMsg('请接收邮件进行验证');" value="注  册">
        </div>
    </form>
</div>
</body>
</html>