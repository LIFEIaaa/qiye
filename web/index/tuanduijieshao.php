<?php
include "header.php";
include "../public/db.php";
$sql = "SELECT count(*) as total FROM team";
$r = $db->query($sql);
$arr = $r->fetch_array(MYSQLI_ASSOC);
$count = $arr["total"];
$pages = ceil($count / 8);
$pagestr = "";
if(isset($_GET["p"])){
    $p=$_GET["p"];
}else{
    $p=0;
}
for ($i = 0; $i < $pages; $i++) {
    $n = $i + 1;
    if($i==$p){
        $pagestr .= "<span>{$n}</span>";
    }else{
        $pagestr .= "<a href='tuanduijieshao.php?p={$i}'>{$n}</a>";
    }
}
$num=$p*8;
$sql = "SELECT * FROM team limit {$num},8";
$r = $db->query($sql);
$data = $r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/tuanduijieshao.css">
    <style>
        .pagerbox{
            width: 200px;
            height: 30px;
            float: left;
            display: flex;
            justify-content: center;
        }
        .pagerbox a{
            display: block;
            margin: 0 10px;
            width: 30px;
            height: 30px;
            background: #ccc;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
        }
        .pagerbox span{
            display: block;
            margin: 0 10px;
            width: 30px;
            height: 30px;
            background: #255974;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            color: #fff;
        }

    </style>
    <!-- banner开始 -->
    <div class="banner">
        <div class="mianbao_center">
            <img src="../static/img/tuandui.png" alt="" class="deng">
            <span class="guanyu">TEAM TO INTRODUCE</span>
            <span class="anli">团队介绍</span>

            <div class="mianbaoxie">
                <div class="mbx_left">
                    <div class="fengexian"></div>
                    <a href="">
						<span class="sy">
						首页
						<br>
						<i class="yingwen">HOME</i>
						</span>
                    </a>
                    <div class="sgd">
                        <div class="sgd1"></div>
                        <div class="sgd1 sgd2"></div>
                        <div class="sgd1 sgd2 sgd3"></div>
                    </div>
                    <div class="fengexian"></div>
                    <a href="">
						<span class="sy">
						团队介绍
						<br>
						<i class="yingwen">TEAM TO INTRODUCE</i>
						</span>
                    </a>
                </div>
                <div class="mbx_right">
                    <img src="../static/img/yizi.png" alt="" class="yizi">
                    <img src="../static/img/huangse.png" alt="" class="huangse">
                </div>
            </div>
        </div>
    </div>
    <!-- banner结束 -->

    <!-- 团队介绍开始 -->
    <section class="tuandui">
        <div class="tuandui_center">
            <div class="biaoti">
                <div class="xiahengxian"></div>
                <div class="zuohengxian"></div>
                <div class="zuohengxian1"></div>
                <div class="youhengxian"></div>
                <div class="youhengxian1"></div>
                <div class="shanghengxian1"></div>
                <div class="shanghengxian2"></div>
                <img src="../static/img/lingxing_03.png" alt="" class="lingxing">
                <h2>ABOUT THE BRAND</h2>
            </div>
            <div class="cganli">
                <h3>团 队 介 绍</h3>
                <div class="zuoxian"></div>
                <img src="../static/img/lingxing_03.png" alt="">
                <div class="youxian"></div>
            </div>
            <div class="tuandui_top">
                <div class="tuandui_left">
                    <a href=""><img src="../static/img/tuandui1.png" alt=""></a>
                    <div class="tuandui_title">
                        <img src="../static/img/Commercial.png" alt="">
                        <img src="../static/img/shinei.png" alt="">
                    </div>
                </div>
                <div class="tuandui_right">
                    <?php foreach ($data as $v): ?>
                        <div class="td_img1">
                            <div class="td_tu">
                                <a href=""><img src="../upload/<?php echo $v['tthumb'] ?>" alt=""></a>
                            </div>
                            <div class="td_ming">
                                <span><?php echo $v['tename'] ?></span>
                                <h2><?php echo $v['tname'] ?></h2>
                                <div class="fenjiexian">
                                    <div class="fjx"></div>
                                </div>
                                <p><?php echo $v['tpostion'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tuandui_top">
                <div class="tuandui_left tuandui_left1">
                    <a href=""><img src="../static/img/jiaju.png" alt=""></a>
                    <div class="tuandui_title">
                        <img src="../static/img/Commercial.png" alt="">
                        <img src="../static/img/jiajusheji.png" alt="">
                    </div>
                </div>
                <div class="tuandui_right tuandui_right1">
                    <?php foreach ($data as $v): ?>
                        <div class="td_img1">
                            <div class="td_tu">
                                <a href=""><img src="../upload/<?php echo $v['tthumb'] ?>" alt=""></a>
                            </div>
                            <div class="td_ming">
                                <span><?php echo $v['tename'] ?></span>
                                <h2><?php echo $v['tname'] ?></h2>
                                <div class="fenjiexian">
                                    <div class="fjx"></div>
                                </div>
                                <p><?php echo $v['tpostion'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- 团队介绍结束 -->

    <!-- 通屏开始 -->
    <div class="tongping">
        <div class="tongping_img">
            <a href="">
                <img src="../static/img/tuandui_tp.png" alt="">
                <div class="zhezhao"></div>
            </a>
        </div>
    </div>
    <!-- 通屏结束 -->

    <!-- 人物开始 -->
    <main class="td_man">
        <div class="td_man_center">
            <div class="biaoti biaoti2">
                <div class="xiahengxian"></div>
                <div class="zuohengxian"></div>
                <div class="zuohengxian1"></div>
                <div class="youhengxian"></div>
                <div class="youhengxian1"></div>
                <div class="shanghengxian1"></div>
                <div class="shanghengxian2"></div>
                <img src="../static/img/lingxing_03.png" alt="" class="lingxing">
                <h2>ABOUT THE BRAND</h2>
            </div>
            <div class="cganli">
                <h3>团 队 介 绍</h3>
                <div class="zuoxian"></div>
                <img src="../static/img/lingxing_03.png" alt="">
                <div class="youxian"></div>
            </div>
            <div class="td_man_bottom">
                <?php foreach ($data as $v): ?>
                    <div class="td_man1">
                        <a href="">
                            <div class="circle">
                                <img src="../upload/<?php echo $v['tthumb'] ?>" alt="" class="sheji_ren1">
                            </div>
                        </a>
                        <div class="tdman_title">
                            <a href=""><span><?php echo $v['tname'] ?></span></a>
                            <p><?php echo $v['tdescription'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="wancheng_bottom">
                <div class="pagerbox">
                    <?php echo $pagestr; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- 人物结束 -->

<?php
include "footer.php";
?>