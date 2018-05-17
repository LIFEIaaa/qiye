<?php
include "../../public/db.php";
$sql = "SELECT * FROM team";
$r = $db->query($sql);
$arr = $r->fetch_all(MYSQLI_ASSOC);
$str = "";
foreach ($arr as $v) {
    $str .= "<option value='{$v['tid']}'>{$v['tname']}</option>";
}
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
        .show1 img {
            max-width: 50px;
            height: auto;
        }

        .show2 img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><span>主页</span></li>
    <li><a href="projectlist.php">项目管理</a></li>
    <li><span>添加项目</span></li>
</ol>
<form action="checkprojectinsert.php" method="post" class="form-horizontal col-sm-8">
    <ul>
        <li><input type="text" name="pname" placeholder="请输入项目名称"></li>
        <li>
            <h4>缩略图</h4>
            <input type="file" id="file" required>
            <input type="button" value="预览" id="preview1" class="btn btn-warning    ">
            <div class="show1"></div>
            <input type="button" value="上传" id="upload1" class="btn btn-large btn-success">
            <input type="hidden" name="pthumb">
        </li>
        <li>
            <h4>多图片</h4>
            <input type="file" id="files" multiple required>
            <input type="button" value="预览" id="preview2" class="btn btn-warning">
            <div class="show2"></div>
            <input type="button" value="上传" id="upload2" class="btn btn-large btn-success">
            <input type="hidden" name="ppictures">
        </li>
        <li>
            <textarea name="pdescription" placeholder="详细内容" required></textarea>
        </li>
        <li><input type="submit" value="提交" class="btn btn-danger"></li>
    </ul>
    <div class="form-group">
        <lable for="input4" class="control-label col-sm-2">请选择设计师</lable>
        <div class="col-sm-10">
            <select name="did" class="form-control" id="">
                <?php echo $str ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2">请选择类型</lable>
        <div class="col-sm-10">
            <select name="ptype" class="form-control" id="">
                <option value="1">阳台</option>
                <option value="2">厨房</option>
                <option value="3">客厅</option>
                <option value="4">书房</option>
                <option value="5">卧室</option>
            </select>
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
    $("#preview1").click(function () {
        let file = $("#file")[0].files[0];
        if (file === undefined) {
            return;
        }
        let fr = new FileReader();
        fr.readAsDataURL(file);
        fr.onload = function () {
            $("<img>").attr("src", fr.result).appendTo(".show1");
        }
    });
    $("#upload1").click(function () {
        let file = $("#file")[0].files[0];
        let formData = new FormData();
        formData.append("f", file);
        $.ajax({
            url: "../upload.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {
                alert("上传成功");
                $("[name=pthumb]").val(r);
            }
        })
    });
    $("#preview2").click(function () {
        let files = $("#files")[0].files;
        if (file.length === 0) {
            return;
        }
        $.each(files, function (index, file) {
            let fr = new FileReader();
            fr.readAsDataURL(file);
            fr.onload = function () {
                $("<img>").attr("src", fr.result).appendTo(".show2");
            }
        })
    });
    $("#upload2").click(function () {
        let files = $("#files")[0].files;
        let str = "";
        $.each(files, function (index, file) {
            let formData = new FormData();
            formData.append("f", file);
            $.ajax({
                url: "../upload.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (r) {
                    str += r + ";";
                    // str.slice(0, -1);
                    $("[name=ppictures]").val(str);
                }
            })
        })
    })
</script>
</html>