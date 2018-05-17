<?php
include "header.php";
include "../public/db.php";
$sql = "SELECT * FROM goods limit 0,6";
$r = $db->query($sql);
$data = $r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/index.css">
    <!-- banner开始 -->
    <section class="banner">
        <a href="">
            <div class="bannerbox">
                <img src="../static/img/banner_02.png" alt="" class="bannerdw select">
                <img src="../static/img/banner2.png" alt="" class="bannerdw">
                <img src="../static/img/banner4.jpg" alt="" class="bannerdw">
                <img src="../static/img/banner5.png" alt="" class="bannerdw">
                <img src="../static/img/banner6.jpg" alt="" class="bannerdw">
            </div>
            <div class="banner_center">
                <div class="shuzi">
                    <div class="shuzi1 select">
                        <img src="../static/img/zbtn.png" alt="" class="zkuohao select">
                        1
                        <img src="../static/img/ybtn.png" alt="" class="ykuohao select">
                    </div>
                    <div class="shuzi1">
                        <img src="../static/img/zbtn.png" alt="" class="zkuohao">
                        2
                        <img src="../static/img/ybtn.png" alt="" class="ykuohao">
                    </div>
                    <div class="shuzi1">
                        <img src="../static/img/zbtn.png" alt="" class="zkuohao">
                        3
                        <img src="../static/img/ybtn.png" alt="" class="ykuohao">
                    </div>
                    <div class="shuzi1">
                        <img src="../static/img/zbtn.png" alt="" class="zkuohao">
                        4
                        <img src="../static/img/ybtn.png" alt="" class="ykuohao">
                    </div>
                    <div class="shuzi1">
                        <img src="../static/img/zbtn.png" alt="" class="zkuohao">
                        5
                        <img src="../static/img/ybtn.png" alt="" class="ykuohao">
                    </div>
                </div>
            </div>
        </a>
    </section>
    <!-- banner结束 -->
    <!-- 产品中心开始 -->
    <div class="chanpin">
        <div class="chanpin_center">
            <div class="biaoti">
                <div class="z_biaoti">
                    <h2 class="livable">LIVABLE</h2>
                    <h2 class="era">ERA</h2>
                </div>
                <img src="../static/img/fangzi.png" alt="" class="fangzi">
                <img src="../static/img/juxing.png" alt="" class="juxing">
                <img src="../static/img/zpzx.png" alt="" class="anli">
                <div class="z_biaoti y_biaoti">
                    <h2 class="something">SOMETHING</h2>
                    <br>
                    <h2 class="something">YOU</h2>
                    <br>
                    <h2 class="dont">DON'T KNOWN</h2>
                </div>
            </div>
            <div class="chanpin_bottom">
                <a href="">
                    <?php foreach ($data as $v): ?>
                        <div class="cp_b1">
                            <img src="../upload/<?php echo $v['gthumb'] ?>" alt="" class="canzhuo">
                            <div class="juzhong">
                                <img src="../static/img/juzhong_z.png" alt="" class="juzhong_z">
                                <img src="../static/img/juzhong_z.png" alt="" class="juzhong_y">
                                <img src="../static/img/canyinkuang.png" alt="" class="canyinkuang">
                                <img src="../static/img/can.png" alt="" class="can">
                                <img src="../static/img/zhuo.png" alt="" class="zhuo">
                                <img src="../static/img/tablez.png" alt="" class="tablez">
                                <img src="../static/img/tuoyuan.png" alt="" class="tuoyuan">
                                <img src="../static/img/tuoyuan.png" alt="" class="tuoyuany">
                                <img src="../static/img/tabley.png" alt="" class="tabley">
                                <img src="../static/img/table.png" alt="" class="table">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </a>
            </div>
        </div>
    </div>
    <!-- 产品中心结束 -->

    <!-- 案例展示开始 -->
    <main class="alzs">
        <div class="alzs_center">
            <div class="biaoti">
                <div class="z_biaoti">
                    <h2 class="livable">LIVABLE</h2>
                    <h2 class="era">ERA</h2>
                </div>
                <img src="../static/img/fangzi.png" alt="" class="fangzi">
                <img src="../static/img/juxing.png" alt="" class="juxing">
                <img src="../static/img/anli.png" alt="" class="anli">
                <div class="z_biaoti y_biaoti">
                    <h2 class="something">SOMETHING</h2>
                    <br>
                    <h2 class="something">YOU</h2>
                    <br>
                    <h2 class="dont">DON'T KNOWN</h2>
                </div>
            </div>
            <div class="alzs_bottom">
                <div class="alzs_left">
                    <a href=""><img src="../static/img/alzsz.png" alt=""></a>
                    <div class="alzs_l1">
                        <a href=""><img src="../static/img/alzs2.jpg" alt="" class="alzs2"></a>
                    </div>
                    <a href="">
                        <div class="btn_l">
                            <span>&lt;</span>
                        </div>
                        <div class="btn_r">
                            <span>&gt;</span>
                        </div>
                    </a>
                </div>
                <div class="alzs_right">
                    <a href="" class="ytwz_yanse">
                        <h2 class="yangtai">LIVABLE ERA</h2>
                        <h2 class="yangtaiz">阳台展示</h2>
                    </a>
                    <p class="kaitou">宜居时代有限公司成立于1984年，1988年
                        进入家居行业，经过三十余年的发展”</p>
                    <a href="">
                        <div class="lanse_more">
                            <span>MORE</span>
                            <div class="more_di">
                                <span>+</span>
                            </div>
                        </div>
                    </a>
                    <div class="sx_xian">
                        <div class="sx_lanxian"></div>
                    </div>
                    <p class="duanluo">
                        宜居时代创造性的引进和提出了先进的服务理念。率先提出“先行赔付”、“绿色环保”、“零延迟”、“一个月无理由退换货”、“没有增项的家装”等服务承诺，从消费者的切身利益出发，踏实认真履行“先行赔付”十数载。“让客户满意”、“向消费者倾斜”是永远不懈的追求。
                        2017年，深圳地铁集团成为公司基石股东，表示将支持公司混合所有制结构和事业合伙人机制，支持公司城市配套服务商战略，支持公司稳定健康发展。未来公司和深圳地铁集团将充分发挥各自优势，共同推进实施
                        “轨道+物业”发展战略，全面提升城市配套服务能力，助推城市经济发展。</p>
                </div>
            </div>
        </div>
    </main>
    <!-- 案例展示结束 -->

    <!-- 团队介绍开始 -->
    <div class="tuandui">
        <div class="tuandui_top">
            <div class="biaoti">
                <div class="z_biaoti">
                    <h2 class="livable">LIVABLE</h2>
                    <h2 class="era">ERA</h2>
                </div>
                <img src="../static/img/fangzi.png" alt="" class="fangzi">
                <img src="../static/img/juxing.png" alt="" class="juxing">
                <img src="../static/img/tdjs.png" alt="" class="anli">
                <div class="z_biaoti y_biaoti">
                    <h2 class="something">SOMETHING</h2>
                    <br>
                    <h2 class="something">YOU</h2>
                    <br>
                    <h2 class="dont">DON'T KNOWN</h2>
                </div>
            </div>
        </div>
        <div class="tuandui_bottom">
            <div class="tuanduib_top">
                <img src="../static/img/sytongping.png" alt="" class="sytongping">
                <img src="../static/img/PROTENA TEAM.png" alt="" class="PROTENA">
                <img src="../static/img/xiangmu.png" alt="" class="xiangmu">
                <a href="">
                    <div class="lanse_more lanse_more1">
                        <span>MORE</span>
                        <div class="more_di more_di1">
                            <span>+</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="tuanduib_left">
                <a href="">
                    <div class="tuanduib_l1">
                        <div class="chengse"></div>
                        <div class="tuanduib_limg">
                            <img src="../static/img/renwu1.png" alt="">
                        </div>
                        <span>JONSON YNAG</span>
                    </div>
                    <div class="tuanduib_l1 tuanduib_l2">
                        <div class="chengse"></div>
                        <div class="tuanduib_limg">
                            <img src="../static/img/td2.png" alt="">
                        </div>
                        <span>JONSON YNAG</span>
                    </div>
                    <div class="tuanduib_l1 tuanduib_l2">
                        <div class="chengse"></div>
                        <div class="tuanduib_limg">
                            <img src="../static/img/renwu2.png" alt="">
                        </div>
                        <span>JONSON YNAG</span>
                    </div>
                    <div class="tuanduib_l1 tuanduib_l2">
                        <div class="chengse"></div>
                        <div class="tuanduib_limg">
                            <img src="../static/img/renwu3.png" alt="">
                        </div>
                        <span>JONSON YNAG</span>
                    </div>
                </a>
            </div>
            <div class="tuanduib_right">
                <img src="../static/img/tiaowenkuang.png" alt="" class="tiaowenkuang">
                <img src="../static/img/tiaowen.png" alt="" class="tiaowen">
                <div class="bj_sekuai">
                    <img src="../static/img/mohu.png" alt="">
                </div>
                <img src="../static/img/heiren.png" alt="" class="heiren">
            </div>
        </div>
    </div>
    <!-- 团队介绍结束 -->

<?php
include "footer.php";
?>