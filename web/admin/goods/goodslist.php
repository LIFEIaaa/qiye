<?php
include "../../public/db.php";
$sql = "SELECT * FROM goods";
$r = $db->query($sql);
$arr = $r->fetch_all(MYSQLI_ASSOC);
$str = "";
foreach ($arr as $v) {
    $pics = $v['gpictures'];
    $arr = explode(";", $pics);
    array_pop($arr);
    array_slice($arr,0,3);
    $imgs = "";
    foreach ($arr as $src) {
        $imgs .= "<img src='../../upload/{$src}'>";
    }
    $des = mb_substr($v["gdescription"], 0, 10, "utf-8")."...";
    $str .= "<tr valign='middle'>
<td>{$v["gname"]}</td>
<td>{$v["gename"]}</td>
<td><img src='../../upload/{$v["gthumb"]}' alt=''></td>
<td>{$imgs}</td>
<td>{$des}</td>
<td><a href='goodsupdate.php?id={$v['gid']}' class='btn btn-warning'>修改</a> <a href='goodsdel.php?id={$v["gid"]}' class='btn btn-danger'>删除</a></td>
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
        td img {
            width: 100px;
            height: auto;
        }

        .table tbody tr td {
            vertical-align: middle;
        }

        tr th {
            text-align: center;
        }
        td img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">商品管理</a></li>
</ol>
<div class="col-sm-10">
    <table class="table table-bordered text-center">
        <tr>
            <th>名称</th>
            <th>英文名称</th>
            <th>缩略图</th>
            <th>多图片</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        <?php echo $str; ?>
    </table>
</div>
<div class="col-sm-12">
    <a href="goodsinsert.php" class="btn btn-large btn-success">添加</a>
</div>
</body>
</html>