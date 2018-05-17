<?php
//header("Content-Type:text/html;charset=utf-8");
//$db=new mysqli("sqld.duapp.com","39b205d4f3d040769a85e8f5d6b19c44","99bfc483312d41709b1330f2964f20f0","TPiYYCmxgJzrsHzseVdY",4050);
//$db->query("set names utf8");
//if($db->connect_errno){
//    echo "数据库连接错误".$db->connect_error;
//    exit();
//}
header("Content-Type:text/html;charset=utf-8");
$db=new mysqli("localhost","root","","web");
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接错误".$db->connect_error;
    exit();
}