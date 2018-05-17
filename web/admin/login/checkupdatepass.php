<?php
$oldpass=$_POST["oldpass"];
$newpass=$_POST["newpass"];
include "../../public/db.php";
$sql="SELECT * FROM admin";
$r=$db->query($sql);
$r=$r->fetch_array(MYSQLI_ASSOC);
if($r['password']===$oldpass){
    $sql="UPDATE admin SET password='{$newpass}'";
    $r=$db->query($sql);
    if($db->affected_rows===1){
        $msg="修改成功";
    }else{
        $msg="修改失败";
    }
}else{
    $msg="原始密码错误";

}
$href="updatepass.php";
include "../message.php";
