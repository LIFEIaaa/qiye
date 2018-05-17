

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        #allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=bTgE9HkVK7sTxDVQUVyTrTtmpl4tAMgA"></script>
    <title>地图展示</title>
</head>
<body>

<!-- 站点地图开始 -->
<main class="zhandian">
    <div class="ditu">
        <div id="allmap"></div>
        <div id="allmap"></div>
<!--        <div class="dizhi">-->
<!--            <span class="gzs">工 作 室 地 址</span>-->
<!--            <br>-->
<!--            <span class="gzs">山西省太原市小店区平阳路220号</span>-->
<!--        </div>-->
    </div>
</main>
<!-- 站点地图结束 -->

<!-- 底部开始 -->
<div class="footer">
    <a href="">
        <span>京ICP备11017824</span>
        <span class="jing">京ICP证130164</span>
    </a>
    <span class="jing">北京市公安局朝阳分局备案编号：11010502000501</span>
    <br>
    <span>网络文化经营许可证</span>
    <span class="jing">京网文[2016]6173-844号</span>
    <span class="jing">广播电视节目制作经营许可证</span>
    <span class="jing">（京）字第06990号</span>
</div>
<!-- 底部结束 -->
</body>
<script src="../static/js/jquery-3.3.1.min.js"></script>
<script src="../static/js/index.js"></script>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(112.560388,37.813583), 11);  // 初始化地图,设置中心点坐标和地图级别
    //添加地图类型控件
    map.addControl(new BMap.MapTypeControl({
        mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));
    map.setCurrentCity("太原");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
<script type="text/javascript">
    // 百度地图API功能
    var point = new BMap.Point(112.560388,37.813583);
    map.centerAndZoom(point, 15);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
</script>
</html>
