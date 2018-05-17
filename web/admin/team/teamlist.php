<?php
include "../../public/db.php";
$sql = "SELECT * FROM team";
$r = $db->query($sql);
$arr = $r->fetch_all(MYSQLI_ASSOC);
$str = "";
foreach ($arr as $v) {
    $des = mb_substr($v["tdescription"], 0, 10, "utf-8") . "...";
    $str .= "<tr>
<td>{$v["tname"]}</td>
<td>{$v["tename"]}</td>
<td>{$v["tpostion"]}</td>
<td><img src='../../upload/{$v["tthumb"]}'></td>
<td>{$des}</td>
<td>
<a href='teamupdate.php?id={$v['tid']}'  class='btn btn-warning'>修改</a>
<a href='teamdel.php?id={$v['tid']}' class='btn btn-danger del'>删除</a>
</td>
</tr>";
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
        .table tr td {
            vertical-align: middle !important;
        }

        tr td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><span>主页</span></li>
    <li><span>团队管理</span></li>
</ol>
<div class="col-sm-10">
    <table class="table table-bordered text-center">
        <tr>
            <td>姓名</td>
            <td>英文名称</td>
            <td>职位</td>
            <td>缩略图</td>
            <td>描述</td>
            <td>管理</td>
        </tr>
        <?php echo $str; ?>
    </table>
</div>
<div class="col-sm-12">
    <a href="teaminsert.php" class="btn btn-success">增加</a>
</div>
</body>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $(".del").click(function (e) {
        if (!confirm("确定删除吗？")) {
            e.preventDefault();    //阻止浏览器默认行为
        }
    })
</script>
</html>