<link rel="stylesheet" href="/public/css/web/lesson.css">
<div id="body_box" >
    <div class="main_box">
        <div class="row">

                <div class="col-md-2 check_left_box">
                    <ul class="check_ul row" >
                        <li class="col-xs-6" style="color: #5376ac;font-weight: bold">确认订单</li>
                        <li class="col-xs-6" style="color: #5376ac;font-weight: bold">完成支付</li>
                    </ul>
                </div>
                <div class="col-md-10 check_right_box" style="text-align: center">
                    <h3>支付成功</h3>
                    <p><span id="txt"></span>秒后将为您进入订单中心</p>
                </div>
        </div>
    </div>
</div>
<script>
    var c=3;
    var t;
    $(function(){

        timedCount();
    })


    function timedCount(){
        $('#txt').html(c);
        c--;
        if(c == 0){
            location.href='/mobile/home/mylessons';
            return false;
        }
        t=setTimeout("timedCount()",1000);

    }


</script>