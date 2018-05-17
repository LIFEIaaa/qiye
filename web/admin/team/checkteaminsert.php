<?php
$tname = $_POST["tname"];
$tename = $_POST["tename"];
$tpostion = $_POST["tpostion"];
$tthumb = $_POST["tthumb"];
$tdescription = $_POST["tdescription"];
include "../../public/db.php";
$sql = "INSERT INTO team(tname,tename,tpostion,tthumb,tdescription)
VALUES('{$tname}','{$tename}','{$tpostion}','{$tthumb}','{$tdescription}')";
$db->query($sql);
if ($db->affected_rows === 1) {
    $msg = "添加成功";
    $href = "teamlist.php";
} else {
    $msg = "添加失败";
    $href = "teaminsert.php";
}
include "../message.php";