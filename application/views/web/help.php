<link rel="stylesheet" href="/public/css/web/help.css?v=1">
<div class="bg">
	<div class="rl head-banner" id="top">
		<img src="/public/images/web/help/banner.png" />
		<h2 class="ab" style="left:20px;top:30%;color:#fff;">如何预定合适的住家</h2>
	</div>
	<div class="container2 word-content">
		<div class="row">
			<div class="col-md-8">
				<div class="help-content">
					<h4 class="title" id="reg"><span class="item">1</span>注册成为 S&H 用户</h4>
					<p class="des">S&H 是一个寄宿家庭在线预订平台，旨在营造一个值得信赖的在线社区， 请在预订寄宿家庭前先行注册成为我们的用户。</p>
				</div>
				<div class="help-content">
					<h4 class="title" id="search"><span class="item">2</span>搜索发现</h4>
					<p class="des">S&H 拥有覆盖全美 50 个州合计 2000+优质寄宿家庭资源，用户可以根据个人偏好搜索浏览及筛选查看。当然， 您的个性化需求也可以以在线定制需求表的形式提交给我们， 我们的客服人员在收到您的需求表后将会为您筛选最匹配的寄宿家庭，并在一周左右跟您电话反馈， 推荐合适的候选家庭。</p>
				</div>
				<div class="help-content">
					<h4 class="title" id="order"><span class="item">3</span>预定住家</h4>
					<p class="des">如果您已经在我们的平台上找到了心仪的住家，那么现在是时候把它预订下来了。 在您点击预订住家按钮后， 我们将以站内信的形式通知住家该笔新增预订， 同时， 您将会获得住家的具体联系方式， 以便双方预约视频通话增进了解。</p>
				</div>
				<div class="help-content">
					<h4 class="title" id="info"><span class="item">4</span>完善信息</h4>
					<p class="des">为使订单最终生效， 您需要进一步完善个人资料，以便寄宿家庭在查看您的预订信息时，对您的基本情况有所了解。预订住家是双向的选择，部分寄宿家庭会要求入住学生提供已验证的信息以便进行筛选。</p>
				</div>
				<div class="help-content">
					<h4 class="title" id="pay"><span class="item">5</span>支付定金</h4>
					<p class="des">在您与房东沟通明确双方意向以后，若您仍有意向预订该住家，您需要以在线支付总价 15%为定金的形式锁定该预约， 以确保您在启程赴美时有住家可入住。</p>
				</div>
				<div class="help-content">
					<h4 class="title" id="charge"><span class="item">6</span>生成合同</h4>
					<p class="des">在您完成定金支付之后， 我们将会通过电子邮件的形式将寄宿预订合同发送到您的注册邮箱， 订单的详情明细将涵盖于寄宿合同之内。</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="bs-docs-sidebar host-list navbar-example">
					<ul class="list-unstyled navbar-list nav">
						<li class="active list1"><a href="#reg">注册成为 S&H 用户</a></li>
						<li><a href="#search">搜索发现</a></li>
						<li><a href="#order">预定住家</a></li>
						<li><a href="#info">完善信息</a></li>
						<li><a href="#pay">支付定金</a></li>
						<li><a href="#charge">生成合同</a></li>
						<li><a style="color:#76b26f" href="#">返回顶部 <b>↑</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
 	$(document).ready(function(){
 		$('body').scrollspy({ target: '.bs-docs-sidebar' });
 		
 		//导航滚动事件
 		$(window).bind("scroll",function(){
 		    var topHeight = $(".header").height() + $(".head-banner").height();
			var scrollTop = $(window).scrollTop();
 		    if(scrollTop > topHeight){
		    	 $(".host-list").addClass("fixed-list");
 		    }else{
 		        $(".host-list").removeClass("fixed-list");
 		        $(".list1").addClass('active');
 		    }
 		});
		$(".navbar-list > li").click(function(){
 			$(".navbar-list > li").removeClass("active")
 			$(this).addClass("active")
 	 	});
 	 });
		
</script>
