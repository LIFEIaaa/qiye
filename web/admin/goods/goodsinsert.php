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
    <li><a href="goodslist.php">商品管理</a></li>
    <li><span>添加商品</span></li>
</ol>
<form action="checkgoodsinsert.php">
    <ul>
        <li><input type="text" name="gname" placeholder="请输入商品名称"></li>
        <li><input type="text" name="gename" placeholder="请输入商品英文名称"></li>
        <li>
            <h4>缩略图</h4>
            <input type="file" id="file" required>
            <input type="button" value="预览" id="preview1" class="btn btn-warning    ">
            <div class="show1"></div>
            <input type="button" value="上传" id="upload1" class="btn btn-large btn-success">
            <input type="hidden" name="gthumb">
        </li>
        <li>
            <h4>多图片</h4>
            <input type="file" id="files" multiple required>
            <input type="button" value="预览" id="preview2" class="btn btn-warning">
            <div class="show2"></div>
            <input type="button" value="上传" id="upload2" class="btn btn-large btn-success">
            <input type="hidden" name="gpictures">
        </li>
        <li>
            <textarea name="gdescription" placeholder="详细内容" required></textarea>
        </li>
        <li><input type="submit" value="提交" class="btn btn-danger"></li>
    </ul>
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
                $("[name=gthumb]").val(r);
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
                    $("[name=gpictures]").val(str);
                }
            })
        })
    })
</script>
</html>