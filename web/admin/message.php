<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .information{
            position: absolute;
            top:40%;
            left: 40%;
        }
    </style>
</head>
<body>
<div class="information">
    <span><?php echo $msg;?></span>
    <div>当前页面会在<time>3</time>s后跳转 直接跳转请点击
        <a href="<?php echo $href;?>">点击</a>
    </div>
</div>
<script>
    let time=document.querySelector("time");
    let a=document.querySelector("a");
    let n=3;
    setInterval(function () {
        n--;
        time.innerHTML=n;
        if(n===0){
            location.href=a.href;
        }
    },1000)
</script>
</body>
</html>