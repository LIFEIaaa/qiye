<?php
$gid = $_GET["id"];
include "../../public/db.php";
$sql = "SELECT * FROM goods WHERE gid=$gid";
$r = $db->query($sql);
$arr = $r->fetch_array(MYSQLI_ASSOC);
$imgs = "";
$pictures = $arr["gpictures"];
$imgarr = explode(";", $pictures);
array_pop($imgarr);
foreach ($imgarr as $v) {
    $imgs .= "<img src='../../upload/{$v}'>";
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
        .show1 img,.show2 img{
            max-width: 100px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><span>主页</span></li>
    <li><a href="goodslist.php">商品管理</a></li>
    <li><span>商品修改</span></li>
</ol>
<form action="checkgoodsupdate.php" class="form-horizontal col-sm-8" method="post">
    <input type="hidden" name="gid" value="<?php echo $arr['gid']?>">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2">名称</lable>
        <div class="col-sm-10">
            <input type="text" name="gname" id="input1" class="form-control" value="<?php echo $arr['gname'] ?>">
        </div>
    </div>

    <div class="form-group">
        <lable for="input2" class="control-label col-sm-2">英文名称</lable>
        <div class="col-sm-10">
            <input type="text" name="gename" id="input2" class="form-control" value="<?php echo $arr['gename'] ?>">
        </div>
    </div>

    <div class="form-group">
        <lable for="input3" class="control-label col-sm-2">缩略图</lable>
        <div class="col-sm-10">
            <input type="file"  class="form-control" id="file">
            <input type="button" class="btn btn-warning" value="预览" id="preview1">
            <div class="show1">
                <img src="../../upload/<?php echo $arr['gthumb'] ?>" alt="">
            </div>
            <input type="button" value="上传" id="upload1" class="btn btn-success">
            <input type="hidden" name="gthumb" value="<?php echo $arr['gthumb'];?>">
        </div>
    </div>

    <div class="form-group">
        <lable for="input4" class="control-label col-sm-2">多图片</lable>
        <div class="col-sm-10">
            <input type="file" class="form-control" multiple id="files">
            <input type="button" class="btn btn-warning" value="预览" id="preview2">
            <div class="show2">
                <?php echo $imgs; ?>
            </div>
            <input type="button" value="上传" id="upload2" class="btn btn-success">
            <input type="hidden" name="gpictures" value="<?php echo $arr['gpictures'];?>">
        </div>
    </div>

    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2">描述</lable>
        <div class="col-sm-10">
            <textarea id="input5" name="gdescription" class="form-control"><?php echo $arr['gdescription'];?></textarea>
        </div>
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
            $(".show1").empty();
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
                $("[name=gthumb]").val(r);
            }
        })
    });
    $("#preview2").click(function () {
        let files = $("#files")[0].files;
        if (file.length === 0) {
            return;
        }
        $(".show2").empty();
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
        let len = files.length;
        let i = 0;
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
                    i++;
                    if (i === len) {
                        alert("上传成功");
                        $("[name=gpictures]").val(str);
                    }
                }
            })
        })
    })
</script>
</html>