<?php
include "../../public/db.php";
$sql = "SELECT * FROM team";
$r = $db->query($sql);
$darr = $r->fetch_all(MYSQLI_ASSOC);
$str = "";

$id=$_GET["id"];
$sql="SELECT * FROM project WHERE pid=$id";
$r=$db->query($sql);
$data=$r->fetch_array(MYSQLI_ASSOC);
$pic = $data["ppictures"];
//var_dump($data);
$imgarr = explode(";", $pic);
array_pop($imgarr);
//$imgs = "";

foreach ($darr as $v) {
    if ($v["tid"] === $data["did"]) {
        $str .= "<option value='{$v['tid']}' selected>{$v['tname']}</option>";
    }else{
        $str .= "<option value='{$v['tid']}'>{$v['tname']}</option>";
    }
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
    <li><span>修改项目</span></li>
</ol>
<form action="checkprojectupdate.php" method="post" class="form-horizontal col-sm-8">
    <input type="hidden" name="pid" value="<?php echo $id?>">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2">项目名称</lable>
        <div class="col-sm-10">
            <input type="text" name="pname" id="input1" placeholder="请输入项目名称"  class="form-control" value="<?php echo $data['pname']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="control-label col-sm-2">缩略图</label>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" class="btn btn-warning" value="预览" id="preview1">
            <div class="show1">
                <img src="../../upload/<?php echo $data['pthumb']?>">
            </div>
            <input type="button" class="btn btn-success" value="上传" id="upload1">
            <input type="hidden" name="pthumb" value="<?php echo $data['pthumb']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="file" class="control-label col-sm-2">多图片</label>
        <div class="col-sm-10">
            <input type="file" id="files" multiple class="form-control">
            <input type="button" class="btn btn-warning" value="预览" id="preview2">
            <div class="show2">
                <?php foreach ($imgarr as $img):?>
                    <img src="../../upload/<?php echo $img?>" alt="">
                <?php endforeach;?>
            </div>
            <input type="button" class="btn btn-success" value="上传" id="upload2">
            <input type="hidden" name="ppictures" value="<?php echo $data['ppictures']?>">
        </div>
    </div><div class="form-group">
        <lable for="input4" class="control-label col-sm-2">描述</lable>
        <div class="col-sm-10">
            <textarea name="pdescription" id="input4" class="form-control"><?php echo $data['pdescription']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <input type="submit" class="btn btn-danger" value="提交">
        </div>
    </div>
    <div class="form-group">
        <lable for="input4" class="control-label col-sm-2">请选择设计师</lable>
        <div class="col-sm-10">
            <select name="did" class="form-control" id="" >
                <?php echo $str ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2">请选择类型</lable>
        <div class="col-sm-10">
            <select name="ptype" class="form-control" id="">
                <option value="1" <?php if($data["ptype"]==="1"){echo "selected";}?>>阳台</option>
                <option value="2" <?php if($data["ptype"]==="2"){echo "selected";}?>>厨房</option>
                <option value="3" <?php if($data["ptype"]==="3"){echo "selected";}?>>客厅</option>
                <option value="4" <?php if($data["ptype"]==="4"){echo "selected";}?>>书房</option>
                <option value="5" <?php if($data["ptype"]==="5"){echo "selected";}?>>卧室</option>
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
        $(".show1").empty();
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