<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
<div class="container">
        <div class="banner_ad clearfix">
            <p class="container-fqa01 h3"> 注册成为S&H用户</p>
           <p class="container-fqa01"> S&H 是一个寄宿家庭在线预订平台，旨在营造一个值得信赖的在线社区，请在预订寄宿家庭前先行注册成为我们的用户。</p>
        </div>
        <div class="faqlist  font-16 clearfix">
            <ul class="list-unstyled ">
                <li>搜索发现<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorDown.png"></li>
                <li>预定住家<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li>完善信息<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li>支付定金<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li>生成合同<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
            </ul>
            <div class="moreHelp"><img src="/public/images/mobile/help/group6.png" ></div>
        </div>
        <div class="help_footer">
            <img src="/public/images/mobile/help/group2.png">.
        </div>
</div>
<script>
    $(document).ready(function(){

        $('.list-unstyled li').click(function(){
            if($(this).index()==0){
             //   location.href="../common/howbookhome"
            }
        });

        $('.help_footer img').click(function() {

            window.history.go(-1);
        })
    })
</script>