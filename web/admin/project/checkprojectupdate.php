<?php
$id=$_POST["pid"];
$pname=$_POST["pname"];
$pthumb=$_POST["pthumb"];
$ppictures=$_POST["ppictures"];
$pdescription=$_POST["pdescription"];
$did=$_POST["did"];
$ptype=$_POST["ptype"];
include "../../public/db.php";
$sql="UPDATE project SET pname='{$pname}',pthumb='{$pthumb}',
ppictures='{$ppictures}',pdescription='{$pdescription}',
did='{$did}',ptype='{$ptype}' WHERE pid=$id";
$db->query($sql);
//var_dump($sql);
if($db->affected_rows===1){
    $msg="修改成功";
    $href="projectlist.php";
}else{
    $msg="修改失败";
    $href="projectupdate.php?id=$id";
}
include "../message.php";
