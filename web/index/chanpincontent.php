<?php
include "header.php";
include "../public/db.php";
$id = $_GET["id"];
$sql = "SELECT * FROM goods WHERE gid=$id";
//var_dump($sql);
$r = $db->query($sql);
$arr = $r->fetch_array(MYSQLI_ASSOC);
$pics = $arr["gpictures"];
$imgarr = explode(";", $pics);
array_pop($imgarr);
$imgstr = "";
foreach ($imgarr as $img) {
    $imgstr .= "<img src='../upload/$img'>";
}
?>

    <link rel="stylesheet" href="../static/css/chanpinjieshao.css">
    <style>
        .detailp {
            width: 500px;
        }

        .contenttop {
            width: 100%;
            height: 30px;
            border-bottom: 2px solid #eee;
            line-height: 30px;
            text-align: center;
        }

        .contenttitle {
            width: 120px;
            height: 30px;
            background-color: #2D6C8C;
            color: #fff;
        }

        .ctitle {
            width: 50px;
            height: 30px;
            float: left;

        }

        .fenge {
            float: left;
            margin-right: 10px;
        }

        .gthumbimg {
            width: 100%;
            height: 400px;
            margin-top: 30px;
            margin-right: 30px;
            border-bottom: 1px solid #eee;
        }

        .gthumbimg img {
            border: 1px solid #eee;
            height: 400px;
        }

        .gpictures {
            width: 100%;
            height: 400px;
            float: left;
            margin-top: 30px;
        }

        .gpictures img {
            width: 300px;
            height: 400px;
            margin-right: 102px;
            border: 1px solid #eee;
        }
        .gdescription{
            text-align: center;
            float: left;
            width: 100%;
            height: 30px;
            line-height: 30px;
            margin-top: 30px;
        }
    </style>
    <!-- banner开始 -->
    <div class="banner">
        <div class="mianbao_center">
            <span class="shows">PRODUCT CENTER</span>
            <img src="../static/img/dengzi.png" alt="" class="deng">
            <span class="anli">产品中心</span>
            <div class="mianbaoxie">
                <div class="mbx_left detailp">
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
                    <a href="chanpinjieshao.php">
						<span class="sy">
						产品中心
						<br>
						<i class="yingwen">PRODUCT CENTER</i>
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
						产品详情
						<br>
						<i class="yingwen">PRODUCT DETAIL</i>
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

    <!-- 产品中心开始 -->
    <div class="chanpin">
        <div class="chanpin_center">
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
                <h3>产 品 中 心</h3>
                <div class="zuoxian"></div>
                <img src="../static/img/lingxing_03.png" alt="">
                <div class="youxian"></div>
            </div>
            <div class="neirong">
                <div class="contenttop">
                    <div class="contenttitle">
                        <div class="ctitle"><?php echo $arr["gname"] ?></div>
                        <div class="fenge">/</div>
                        <div class="ctitle"><?php echo $arr["gename"] ?></div>
                    </div>
                </div>
                <div class="gthumbimg">
                    <div><img src="../upload/<?php echo $arr["gthumb"] ?>" alt=""></div>
                </div>
                <div class="gpictures">
                    <div><?php echo $imgstr ?></div>
                </div>
                <div class="gdescription"><?php echo $arr["gdescription"] ?></div>
            </div>
        </div>
    </div>
    <!-- 产品中心结束 -->

<?php
include "footer.php";
?>