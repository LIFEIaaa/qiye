<?php
$pname=$_POST["pname"];
$pthumb=$_POST["pthumb"];
$ppictures=$_POST["ppictures"];
$pdescription=$_POST["pdescription"];
$did=$_POST["did"];
$ptype=$_POST["ptype"];
include "../../public/db.php";
$sql="INSERT INTO project(pname,pthumb,ppictures,pdescription,did,ptype)
VALUES ('{$pname}','{$pthumb}','{$ppictures}','{$pdescription}',
'{$did}','{$ptype}')";
$db->query($sql);
if($db->affected_rows===1){
    $msg="插入成功";
    $href="projectlist.php";
}else{
    $msg="插入失败";
    $href="projectinsert.php";
}
include "../message.php";
