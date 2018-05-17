<?php
$id=$_GET["id"];
include "../../public/db.php";
$sql="SELECT * FROM team WHERE tid=$id";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
    <style>
        .show img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><span>主页</span></li>
    <li><a href="teamlist.php">团队管理</a></li>
    <li><span>修改成员</span></li>
</ol>
<form action="checkteamupdate.php" method="post" class="form-horizontal col-sm-8">
    <input type="hidden" name="tid" value="<?php echo $id?>">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2">姓名</lable>
        <div class="col-sm-10">
            <input type="text" name="tname" id="input1" class="form-control" value="<?php echo $arr['tname']?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input2" class="control-label col-sm-2">英文姓名</lable>
        <div class="col-sm-10">
            <input type="text" name="tename" id="input2" class="form-control" value="<?php echo $arr['tename']?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input3" class="control-label col-sm-2">职位</lable>
        <div class="col-sm-10">
            <input type="text" name="tpostion" id="input3" class="form-control" value="<?php echo $arr['tpostion']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="control-label col-sm-2">头像</label>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" class="btn btn-warning" value="预览" id="preview">
            <div class="show">
                <img src="../../upload/<?php echo $arr['tthumb']?>">
            </div>
            <input type="button" class="btn btn-success" value="上传" id="upload">
            <input type="hidden" name="tthumb" value="<?php echo $arr['tthumb']?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input4" class="control-label col-sm-2">描述</lable>
        <div class="col-sm-10">
            <textarea name="tdescription" id="input4" class="form-control"><?php echo $arr['tdescription']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <input type="submit" class="btn btn-success" value="提交">
        </div>
    </div>
</form>
</body>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $("#preview").click(function () {
        let file = $(":file")[0].files[0];
        if (!file) {
            return;
        }
        let fr = new FileReader();
        fr.readAsDataURL(file);
        fr.onload = function () {
            $(".show").empty();
            $("<img>").attr("src", fr.result).appendTo(".show");
        }
    })
    $("#upload").click(function () {
        let file = $(":file")[0].files[0];
        if (!file) {
            return;
        }
        let fd = new FormData();
        fd.append("f", file);
        $.ajax({
            url: "../upload.php",
            data: fd,
            type: "post",
            processData: false,
            contentType: false,
            success: function (r) {
                let reg = /^\d{4}\-\d{2}-\d{2}\/[a-f0-9]{32}\.(jpe?g|png|gif)$/;
                if (reg.test(r)) {
                    alert("上传成功");
                    $("[name=tthumb]").val(r);
                }
            }
        })
    })
</script>
</html>