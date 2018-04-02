//选项卡
{
    $(".yangtai")
        .mouseenter(function () {
            let index=$(this).index(".yangtai");
            $(".yangtai").removeClass("active").eq(index).addClass("active");
            $(".wancheng_top").removeClass("active").eq(index).addClass("active");
            $(".jindutiao").removeClass("active").eq(index).addClass("active");
        })
}