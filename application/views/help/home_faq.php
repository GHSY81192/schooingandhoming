<link rel="stylesheet" href="/public/css/web/help.css?v=1">
<div class="bg">
	<div class="rl head-banner" id="top">
		<img src="/public/images/web/help/banner.png" />
		<h2 class="ab container2 word-content" style="top: 40%;color: #fff; left: 0px;right: 0; bottom: 0; margin: auto;padding:0px 6px;"><?php echo $title;?></h2>
	</div>
	<div class="container2 word-content">
		<div class="row">
			<div class="col-md-8" style="padding-left:7px;">
				<?php foreach ($content as $key => $val):?>
				<div class="help-content">
					<h4 class="title" id="<?php echo $val['id'];?>"><span class="item"><?php echo $key+1;?></span><?php echo $val['title']?></h4>
					<p class="des"><?php echo $val['des']?></p>
				</div>
				<?php endforeach;?>
			</div>
			<div class="col-md-4">
				<div class="bs-docs-sidebar host-list navbar-example">
					<ul class="list-unstyled navbar-list nav">
						<?php foreach ($content as $key => $val):?>
						<li class="<?php if($key ==0):?>active list1<?php endif;?>"><a href="<?php echo '#'.$val['id'];?>"><?php echo $val['title']?></a></li>
						<?php endforeach;?>
						<li><a style="color:#76b26f" href="#"><?php echo !lang('is_en')?'返回顶部':'Top';?> <b>↑</b></a></li>
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
