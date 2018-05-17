<?php
$gname=$_GET["gname"];
$gename=$_GET["gename"];
$gthumb=$_GET["gthumb"];
$gpictures=$_GET["gpictures"];
$gdescription=$_GET["gdescription"];
include "../../public/db.php";
$sql="INSERT INTO goods(gname,gename,gthumb,gpictures,gdescription)
VALUES ('{$gname}','{$gename}','{$gthumb}','{$gpictures}','{$gdescription}')";
$db->query($sql);
if($db->affected_rows===1){
    $msg="插入成功";
    $href="goodslist.php";
}else{
    $msg="插入失败";
    $href="goodslist.php";
}
include "../message.php";
