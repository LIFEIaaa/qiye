<?php
$path=$_SERVER["SCRIPT_NAME"];
$pos=strrpos($path,"/");
$name=substr($path,$pos+1);
//var_dump($pos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宜居</title>
    <link rel="stylesheet" href="../static/css/public.css">
    <link rel="stylesheet" href="../static/css/header.css">
</head>
<body>
<!-- 导航开始 -->
<div class="daohang">
    <div class="daohang_center">
        <div class="daohang_left">
            <img src="../static/img/logo_03.png" alt="">
            <h1>宜居<br>时代</h1>
        </div>
        <div class="daohang_right">
            <a href="">
                <div class="shouye">
                    <a href="index.php" class="lianjie1" id="<?php if($name==="index.php"){echo "kuohao";}?>"><i class="">公司首页</i></a>
                </div>

                <div class="shouye danghang_jl">
                    <a href="gongsijianjie.php" class="lianjie1" id="<?php if($name==="gongsijianjie.php"){echo 'kuohao';}?>">公司简介</a>
                </div>

                <div class="shouye danghang_jl">
                    <a href="chanpinjieshao.php" class="lianjie1" id="<?php if($name==="chanpinjieshao.php"||$name==="chanpincontent.php"){echo "kuohao";}?>">产品中心</a>
                </div>

                <div class="shouye danghang_jl ">
                    <a href="anlizhanshi.php" class="lianjie1" id="<?php if($name==="anlizhanshi.php"){echo "kuohao";}?>">案例展示</a>
                </div>

                <div class="shouye danghang_jl ">
                    <a href="tuanduijieshao.php" class="lianjie1" id="<?php if($name==="tuanduijieshao.php"){echo "kuohao";}?>">团队介绍</a>
                </div>

                <div class="shouye danghang_jl">
                    <a href="guanyuwomen.php" class="lianjie1" id="<?php if($name==="guanyuwomen.php"){echo "kuohao";}?>">关于我们</a>
                </div>
            </a>
        </div>
        <div class="biaoge">
            <form action="">
                <input type="text" class="sousuo">
            </form>
            <img src="../static/img/sousuo_03.png" alt="" class="ss_btn">
        </div>
    </div>
</div>
<!-- 导航结束 -->

