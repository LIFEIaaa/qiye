<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .show img {
            max-width: 100px;
        }
    </style>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
</head>
<body>
<ol class="breadcrumb">
    <li><span>主页</span></li>
    <li><a href="teamlist.php">团队管理</a></li>
    <li><span>增加成员</span></li>
</ol>
<form action="checkteaminsert.php" method="post" class="form-horizontal col-sm-8">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2">姓名</lable>
        <div class="col-sm-10">
            <input type="text" name="tname" id="input1" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <lable for="input2" class="control-label col-sm-2">英文姓名</lable>
        <div class="col-sm-10">
            <input type="text" name="tename" id="input2" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <lable for="input3" class="control-label col-sm-2">职位</lable>
        <div class="col-sm-10">
            <input type="text" name="tpostion" id="input3" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="control-label col-sm-2">头像</label>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" class="btn btn-warning" value="预览" id="preview">
            <div class="show">

            </div>
            <input type="button" class="btn btn-success" value="上传" id="upload">
            <input type="hidden" name="tthumb">
        </div>
    </div>
    <div class="form-group">
        <lable for="input4" class="control-label col-sm-2">描述</lable>
        <div class="col-sm-10">
            <textarea name="tdescription" id="input4" class="form-control"></textarea>
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
                    $(":hidden").val(r);
                }
            }
        })
    })
</script>
</html>