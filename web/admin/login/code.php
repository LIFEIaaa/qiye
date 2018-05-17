<?php
header("Content-Type:image-png");
$width=180;
$height=40;
$image=imagecreatetruecolor($width,$height);
function getcolor($type = "l")
{
    global $image;
    if ($type === "l") {
        return imagecolorallocate($image, mt_rand(120, 255), mt_rand(120, 255), mt_rand(120, 255));
    } else {
        return imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
    }
}
imagefill($image, 0, 0, getcolor());
for ($i = 0; $i < 10; $i++) {
    imageline($image,mt_rand(0, $width), mt_rand(0, $height),mt_rand(0,$width),mt_rand(0,$height),getcolor());
}
for($i=0;$i<100;$i++){
    imagesetpixel($image,mt_rand(0,$width),mt_rand(0,$height),getcolor());
}
$str="qwertyuipaksjdhfgmznxbcv23456789QWERTYUPKJHGFDSAZXCVBNM";
session_start();
$code="";
$len=strlen($str);      //获取字符串长度
for($i=1;$i<5;$i++){
    $pos=mt_rand(0,$len-1);
    $letter=substr($str,$pos,1);
    $code.=strtoupper($letter);
    imagettftext($image,mt_rand(30,40),mt_rand(-15,15),$i*30,mt_rand(25,35),getcolor("d"),"78640_.TTF",$letter);
}
$_SESSION["code"]=$code;
imagepng($image);
imagedestroy($image);