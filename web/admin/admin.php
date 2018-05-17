<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        a {
            color: #666;
            text-decoration: none;
        }

        .top {
            width: 100%;
            height: 100px;
            background: #f2f2f2;
        }

        .top h3 {
            text-align: center;
        }

        .main {
            width: 100%;
            height: 100px;
            flex-grow: 1;
            display: flex;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .left {
            width: 200px;
            height: 100%;
            border-right: 1px solid #000;
        }

        .left li {
            padding-left: 30px;
            line-height: 50px;
        }

        .right {
            height: 100%;
            flex-grow: 1;
        }

        .right iframe {
            width: 100%;
            height: 100%;
            display: block;
            border: none;
        }
    </style>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
</head>
<body>
<div class="top bg-info">
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo "<div>欢迎{$_SESSION['user']}</div><a href='login/logout.php'>退出</a>/<a href='../index/index.php'>网站前台</a>";
    } else {
        $msg = "尚未登录，请先登录";
        $href = "login/login.php";
        include "message.php";
        exit();
    }
    ?>
    <h3>宜居网站后台管理系统</h3>
</div>
<div class="main">
    <div class="left">
        <ul>
            <li><a href="login/updatepass.php" target="main">修改密码</a></li>
            <li><a href="goods/goodslist.php" target="main">商品管理</a></li>
            <li><a href="team/teamlist.php" target="main">团队管理</a></li>
            <li><a href="project/projectlist.php" target="main">项目管理</a></li>

        </ul>
    </div>
    <div class="right">
        <iframe src="login/updatepass.php" name="main"></iframe>
    </div>
</div>
</body>
</html>