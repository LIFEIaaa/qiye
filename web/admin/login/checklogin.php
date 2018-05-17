<?php
session_start();
$user=$_POST["user"];
$pass=$_POST["pass"];
$code=$_POST["code"];
if(strtoupper($code)!==$_SESSION["code"]){
    $msg="验证码错误";
    $href="login.php";
    include "message.php";
    exit();     //退出脚本
}
include "../../public/db.php";
$sql="SELECT * FROM admin WHERE name='{$user}'";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
if(isset($arr)){
    if($arr["password"]===$pass){
        $msg="登录成功";
        $href="../admin.php";
        $_SESSION["user"]=$user;
    }else{
        $msg="密码错误";
        $href="login.php";
    }
}else{
    $msg="账号不存在";
    $href="login.php";
}
include "../message.php";