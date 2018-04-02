//banner
{
    $(".shuzi1").mouseenter(function () {
        let index=$(this).index(".shuzi1");
        $(".bannerdw").removeClass("select").eq(index).addClass("select");
        $(".shuzi1").removeClass("select").eq(index).addClass("select");
        $(".zkuohao").removeClass("select").eq(index).addClass("select");
        $(".ykuohao").removeClass("select").eq(index).addClass("select");
        n=index;
    })
    let n=0;
    function move() {
        n++;
        if(n===$(".bannerdw").length){
            n=0;
        }
        if(n<0){
            n=$(".bannerdw").length-1;
        }
        $(".bannerdw").removeClass("select").eq(n).addClass("select");
        $(".shuzi1").removeClass("select").eq(n).addClass("select");
        $(".zkuohao").removeClass("select").eq(n).addClass("select");
        $(".ykuohao").removeClass("select").eq(n).addClass("select");
    }
    move();
    setInterval(move,3000);
}