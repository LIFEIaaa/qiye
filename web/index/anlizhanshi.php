<?php
include "header.php";
include "../public/db.php";
if (isset($_GET["t"])) {
    $t = $_GET["t"];
} else {
    $t = 1;
}
$sql = "SELECT project.*,team.tname,team.tename,team.tthumb,team.tpostion
FROM project,team WHERE project.did=team.tid and project.ptype=$t";
$r = $db->query($sql);
$data = $r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/anlizhanshi.css">
    <!-- banner开始 -->
    <div class="banner">
        <div class="mianbao_center">
            <span class="shows">THE CASE SHOWS</span>
            <img src="../static/img/deng.png" alt="" class="deng">
            <span class="anli">案例展示</span>
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
						案例展示
						<br>
						<i class="yingwen">THE CASE SHOWS</i>
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

    <!-- 完成案例开始 -->
    <section class="wancheng">
        <div class="wancheng_center">
            <div class="biaoti wancheng_mc">
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
                <h3>完 成 案 例</h3>
                <div class="zuoxian"></div>
                <img src="../static/img/lingxing_03.png" alt="">
                <div class="youxian"></div>
            </div>
            <div class="wc_fenlei">
                <a href="">
                    <div class="yangtai_kuang ">
                        <a href="anlizhanshi.php?t=1"><span class="yangtai ">阳台展示</span></a>
<!--                        <div class="jindutiao active">-->
<!--                            <div class="yangtai_jd active"></div>-->
<!--                        </div>-->
                    </div>
                    <div class="yangtai_kuang chufang_kuang">
                        <a href="chufangzhanshi.php" class="lianjie1">
                            <a href="anlizhanshi.php?t=2"><span class="yangtai">厨房展示</span></a>
                        </a>
<!--                        <div class="jindutiao">-->
<!--                            <div class="yangtai_jd chufang_jd"></div>-->
<!--                        </div>-->
                    </div>
                    <div class="yangtai_kuang chufang_kuang">
                        <a href="anlizhanshi.php?t=3"><span class="yangtai">客厅展示</span></a>
<!--                        <div class="jindutiao">-->
<!--                            <div class="yangtai_jd keting_jd"></div>-->
<!--                        </div>-->
                    </div>
                    <div class="yangtai_kuang chufang_kuang">
                        <a href="anlizhanshi.php?t=4"><span class="yangtai">书房展示</span></a>
<!--                        <div class="jindutiao">-->
<!--                            <div class="yangtai_jd shufang_jd"></div>-->
<!--                        </div>-->
                    </div>
                    <div class="yangtai_kuang chufang_kuang">
                        <a href="anlizhanshi.php?t=5"> <span class="yangtai">卧室展示</span></a>
<!--                        <div class="jindutiao">-->
<!--                            <div class="yangtai_jd woshi_jd"></div>-->
<!--                        </div>-->
                    </div>
                </a>
            </div>
            <div class="wanchengmenu">
                <div class="wancheng_top active">
                    <a href="">
                        <?php foreach ($data as $v): ?>
                            <div class="sheji1">
                                <div class="sheji_imgkuang">
                                    <img src="../upload/<?php echo $v['pthumb'] ?>" alt="" class="sheji_img">
                                </div>
                                <div class="sheji_bottom">
                                    <h3 class="haozhai"><?php echo $v['pname'] ?></h3>
                                    <p class="xingainian">
                                        <?php
                                        $des=mb_substr($v["pdescription"],0,10,"utf-8")."...";
                                        echo $des;
                                        ?>
                                    </p>
                                    <div class="circle">

                                        <img src="../upload/<?php echo $v['tthumb'] ?>" alt="" class="sheji_ren1">
                                    </div>
                                    <span class="shejishi_name"><?php echo $v['tpostion'] ?>/</span>
                                    <span class="shejishi_name1"><?php echo $v['tename'] ?></span>
                                    <div class="shoucang_hei">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- 完成案例结束 -->
    <!-- 通屏开始 -->
    <div class="tongping">
        <a href="">
            <div class="tongping_l">
                <img src="../static/img/tongping1.png" alt="">
            </div>
            <div class="tongping_r">
                <img src="../static/img/tongping2.png" alt="">
                <div class="zhezhao"></div>
                <div class="say">
                    <span class="youxiu">优秀不是我们的目的/满足你才是我们的目标</span>
                    <p class="daxie">EXCELLENCE IS NOT OUR GOAL</p>
                    <p class="jiacu">TO SATISFY YOU IS OUR GOAL</p>
                    <span class="rensay">GOIND JASK say—</span>
                </div>
            </div>
        </a>
    </div>
    <!-- 通屏结束 -->
<?php
include "footer.php";
?>