<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            list-style: none;
        }
        form{
            margin: 0 auto;
            position: absolute;
            top: 30%;
            left: 40%;
            width: 300px;
            height: 300px;
            background-color: #F2F2F2;
        }
        ul li{
            margin: 10px 0;
        }
        li img{
            margin-top: 30px;
            margin-left: 20px;
        }
        .denglu{
            margin-left: 80px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<form action="checklogin.php" method="post">
    <ul>
        <li>
            <span>账号：</span>
            <input type="text" placeholder="请输入账号" name="user" required>
        </li>
        <li>
            <span>密码：</span>
            <input type="password" placeholder="请输入密码" name="pass" required>
        </li>
        <li>
            <span>验证：</span>
            <input type="text" placeholder="请输入验证码" name="code">
            <img src="code.php" alt="" width="180" height="40" onclick="this.src='code.php?t='+new Date().getTime()">
        </li>
        <li><input type="submit" value="登录" class="denglu"></li>
<!--        <li>还没有账号 请<a href="sign.php">注册</a></li>-->
    </ul>
</form>
</body>
</html>