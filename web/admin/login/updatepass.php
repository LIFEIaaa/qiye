<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../../static/js/jquery-3.3.1.min.js"></script>
    <script src="../../static/js/jquery.validate.js"></script>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">密码修改</a></li>
</ol>
<form action="checkupdatepass.php" id="myform" method="post" class="form-horizontal col-sm-6">
<!--<ul>-->
<!--    <li><input type="password" placeholder="请输入原始密码" name="oldpass"></li>-->
<!--    <li><input type="password" placeholder="请输入新密码" name="newpass" id="pass"></li>-->
<!--    <li><input type="password" placeholder="请确认新密码" name="newpass2"></li>-->
<!--    <li><input type="submit" value="确认修改"></li>-->
<!--</ul>-->
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">原始密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="input1" placeholder="请输入原始密码" name="oldpass">
        </div>
    </div>
    <div class="form-group">
        <label for="input2" class="col-sm-2 control-label">新密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="input2" placeholder="请输入新密码" name="newpass">
        </div>
    </div>
    <div class="form-group">
        <label for="input3" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="input3" placeholder="请确认密码" name="newpass2">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">确认修改</button>
        </div>
    </div>
</form>
</body>
<script>
    $("#myform").validate({
        rules:{
            oldpass:{
                required:true
            },
            newpass:{
                required:true
            },
            newpass2:{
                required:true,
                equalTo:"#pass"
            }
        }
    })
</script>
</html>