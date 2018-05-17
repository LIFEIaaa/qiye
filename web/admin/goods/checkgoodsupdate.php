<?php
$gid=$_POST["gid"];
$gname=$_POST["gname"];
$gename=$_POST["gename"];
$gthumb=$_POST["gthumb"];
$gpictures=$_POST["gpictures"];
$gdescription=$_POST["gdescription"];
include "../../public/db.php";
$sql="UPDATE goods SET gname='{$gname}',
gename='{$gename}',gthumb='{$gthumb}',
gpictures='{$gpictures}',gdescription='{$gdescription}' WHERE gid=$gid";
$db->query($sql);
if($db->affected_rows===1){
    $msg="修改成功";
    $href="goodslist.php";
}else{
    $msg="修改失败";
    $href="goodsupdate.php?id=".$gid;
}
include "../message.php";