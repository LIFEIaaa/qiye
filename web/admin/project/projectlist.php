<?php
include "../../public/db.php";
$sql = "SELECT project.*,team.tname FROM project,team WHERE project.did=team.tid";
$r = $db->query($sql);
$arr = $r->fetch_all(MYSQLI_ASSOC);
$str = "";
foreach ($arr as $v) {
    $des=mb_substr($v["pdescription"],0,10,"utf-8")."...";
//    $sql="SELECT tname FROM team WHERE tid={$v['did']}";
    $pic=$v["ppictures"];
    $imgarr=explode(";",$pic);
    array_pop($imgarr);
    $imgarr=array_slice($imgarr,0,3);
    $imgs="";
    foreach ($imgarr as $img){
        $imgs.="<img src='../../upload/{$img}'>";
    }
    $str .= "<tr>
<td>{$v["pname"]}</td>
<td><img src='../../upload/{$v["pthumb"]}'></td>
<td>{$imgs}</td>
<td>{$des}</td>
<td>{$v["tname"]}</td>
<td>{$v["ptype"]}</td>
<td>
<a href='projectupdate.php?id={$v['pid']}'  class='btn btn-warning'>修改</a>
<a href='projectdel.php?id={$v['pid']}' class='btn btn-danger del'>删除</a>
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
        .table tr td{
            vertical-align: middle!important;
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
    <li><span>主页</span></li>
    <li><span>项目管理</span></li>
</ol>
<div class="col-sm-10">
    <table class="table table-bordered text-center">
        <tr>
            <td>项目名称</td>
            <td>缩略图</td>
            <td>多图片</td>
            <td>项目描述</td>
            <td>设计师</td>
            <td>类型</td>
            <td>管理</td>
        </tr>
        <?php echo $str; ?>
    </table>
</div>
<div class="col-sm-12">
    <a href="projectinsert.php" class="btn btn-success">增加</a>
</div>
</body>
<script src="../../static/js/jquery-3.3.1.min.js"></script>
<script>
    $(".del").click(function (e) {
        if(!confirm("确定删除吗？")){
            e.preventDefault();    //阻止浏览器默认行为
        }
    })
</script>
</html>