<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
<div class="container">
         <div class="banner_ad clearfix">
           <img src="/public/images/mobile/help/group3.png">
        </div>
        <div class="faqlist font-16">
            <ul class="list-unstyled">
                <li data-type="1">如何预定寄宿家庭？<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li data-type="2">如何成为寄宿家庭？<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li data-type="3">一般FAQ<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li data-type="4">寄宿家庭FAQ<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
                <li data-type="5">房客FAQ<img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png"></li>
            </ul>
        </div>
        <!--  
        <div class="help_footer graybg">
            <img src="/public/images/mobile/help/group5.png">
        </div>
        -->
    <!-- /#page-content-wrapper -->
</div>
<script>
    $(document).ready(function(){
        $('.list-unstyled li').click(function(){
			type = $(this).attr('data-type');
            location.href="/mobile/help/content/"+type;
        });

        $('.help_footer img').click(function(){

             location.href="/mobile/common/index"
        });

    })
</script>