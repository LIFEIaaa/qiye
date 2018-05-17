<?php
include "header.php";
include "../public/db.php";
//$sql = "SELECT * FROM goods limit 0,8";
//$r = $db->query($sql);
//$data = $r->fetch_all(MYSQLI_ASSOC);
//分页效果
//获取总条数
$sql = "SELECT count(*) as total FROM goods";
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
        $pagestr .= "<a href='chanpinjieshao.php?p={$i}'>{$n}</a>";
    }

}
$num=$p*8;
$sql = "SELECT * FROM goods limit {$num},8";
$r = $db->query($sql);
$data = $r->fetch_all(MYSQLI_ASSOC);
?>
    <style>
        .pagerbox{
            width: 290px;
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
    <link rel="stylesheet" href="../static/css/chanpinjieshao.css">
    <!-- banner开始 -->
    <div class="banner">
        <div class="mianbao_center">
            <span class="shows">PRODUCT CENTER</span>
            <img src="../static/img/dengzi.png" alt="" class="deng">
            <span class="anli">产品中心</span>
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
						产品中心
						<br>
						<i class="yingwen">PRODUCT CENTER</i>
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

                <a href="">
                    <?php foreach ($data as $v): ?>
                        <div class="nr_1">
                            <div class="nr_1kuang1"></div>
                            <img src="../upload/<?php echo $v['gthumb'] ?>" alt="" class="nr1">
                            <div class="nr_1kuang"></div>
                            <div class="yiru"></div>
                            <div class="yiru_title">
                                <h2><?php echo $v['gname'] ?></h2>
                                <span class="chair"><?php echo $v['gename'] ?></span>
                                <div class="nr_shoucang">
                                    <span><a href="chanpincontent.php?id=<?php echo $v['gid'] ?>">+</a></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="wancheng_bottom">
                        <div class="pagerbox">
                            <?php echo $pagestr; ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- 产品中心结束 -->

<?php
include "footer.php";
?>