<?php if($needFoot):?>
<div class="foot">
	<div class="rl">
		<div class="footer-language text-center color3 rl" id="changeLanguage"><span id="languageName"><?php echo lang('language_name'); ?></span><span class="caret ab language-caret"></span></div>
		<ul class="ab list-unstyled language_list text-center hide" id="language_list">
			  <li data-lng="zh_cn" style="border-bottom:1px solid #f1f1f1"><?php echo lang('footer_language_zh_cn_message') ?></li>
			  <li data-lng="english"><?php echo lang('footer_language_english_message') ?></li>
		</ul>
	</div>
	
	<div class="footer-qr text-center color4">
		<img src="/public/images/web/qr.jpg" style="width:50%">
		<p><?php echo lang('footer_wechat_message') ?></p>
	</div>
	<div class="footer-share text-center">
		<span><img src="/public/images/mobile/index/6.png"></span>
		<span><img src="/public/images/mobile/index/7.png"></span>
		<span><img src="/public/images/mobile/index/8.png"></span>
		<span><img src="/public/images/mobile/index/9.png"></span>
	</div>
	<ul class="footer-list list-inline text-center color2 font-12">
	  <li><?php echo lang('footer_aboutus_title_message') ?></li>
	  <li>|</li>
	  <li><?php echo lang('footer_joinus_title_message') ?></li>
	  <li>|</li>
	  <li><?php echo lang('footer_contactus_title_message') ?></li>
	  <li>|</li>
	  <li><?php echo lang('footer_secret_message') ?></li>
	</ul>
	<div class="text-center color2 font-12">Schooling & Homing Ltd.,</div>
	<div style="height:78px;"></div>
</div>
<!--  
<div class="text-center foot-img" style="position:fixed;bottom:10px;margin:0px auto;z-index:99;width:100%;">
	<a href="/mobile/common"><img src="/public/images/mobile/index/10.png" style="width:75px"></a>
</div>
-->
<?php endif;?>
<?php 
if(!empty($user)){
	if(strstr($user['head_image'],'http')){
		$face = $user['head_image'];
	}else{
		$face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
	}
}
?>
<div id="menu" class="clearfix animated">
	<div class="common-menu rl">
		<div class="menu-list">
			<ul class="list-unstyled font-18" style="color:#484848;margin:0px 23px;">
			  	<li style="padding-bottom:30px;padding-top:0px" class="border-bottom1" onclick="document.location.href='/';">
					<div><?php echo lang('mobile_munu_list1') ?></div>
				</li>
			  	<li style="padding-top:30px" onclick="document.location.href='/web/schoolList';">
					<div><?php echo lang('header_school') ?></div>
				</li>
				<li<?php if(@$active==3): ?> class="active"<?php endif;?>  onclick="document.location.href='/web/homeList';">
					<div><?php echo lang('header_home') ?></div>
			  	</li>
				<li onclick="document.location.href='/web/SummerMore';">
					<div><?php echo lang('summer_program') ?></div>
				</li>
				<li onclick="document.location.href='/web/LessonList';">
					<div><?php echo lang('Bridge_Program') ?></div>
				</li>

				<li onclick="document.location.href='/web/CampList';">
					<div><?php echo lang('Summer_Camp') ?></div>
				</li>
			  	<!-- <li onclick="document.location.href='/web/serviceList';" <?php if(@$active==4): ?> class="active"<?php endif;?>>
			  		<div><?php echo lang('header_service') ?></div>
			  	</li> -->

			  	<li onclick="document.location.href='/web/personalTailor';">
			  		<div><?php echo lang('mobile_munu_list5') ?></div>
			  	</li>
			  <?php if(!empty($user)):?>
			  	<li onclick="document.location.href='/mobile/home';">
			  		<div><span style="color: #484848"><img style="width:30px;height:30px;margin-right:10px" src="<?=$face;?>" /><?php echo $user['name_cn'];?></span></div>
			  	</li>
			  <?php else: ?>
				  <li onclick="document.location.href='/mobile/common/userlogin';">
					  <div><?php echo lang('header_login_message') ?></div>
				  </li>
			  <?php endif;?>

			  	<li style="padding-top:30px" onclick="document.location.href='/mobile/help';">
			  		<div><?php echo lang('mobile_munu_list7') ?></div>
			  	</li>
			  	<li>
			  		<div><?php echo lang('mobile_munu_list8') ?>：021-58850798</div>
			 	</li>
			</ul>
		</div>
		<!--  
		<div class="menu-logo text-center">
			<img src="/public/images/mobile/index/18.png" style="width:100px">
		</div>
		-->
	</div>
	<!--  <div class="common-menu-right">&nbsp;</div>-->
</div>
<script type="text/javascript">
	var top_menu = 1;
	$('#tap-img').click(function(){
		if(top_menu == 1){
			$('#menu').show().removeClass('slideOutUp').addClass('slideInDown');
			$('#top-tag').removeClass('top-tag-default').addClass('top-tag-active');
			$('#top-hide-search').addClass('hide');
			top_menu = 2;
		}else{
			$('#menu').removeClass('slideInDown').addClass('slideOutUp');
			$('#top-tag').removeClass('top-tag-active').addClass('top-tag-default');
			$('#top-hide-search').removeClass('hide');
			top_menu = 1;
		}
	})
	$('#menu_hide').click(function(){
		$('#menu').animate({top:"-1000px"},300); 
	})
	$('#changeLanguage').click(function(){
		$('#language_list').removeClass('hide');
	})
	$('#language_list li').click(function(){
		$.get('/ajax/set_lang',{lang:$(this).attr('data-lng')},function(resp){
			window.location.reload();
		});
	})
	<?php //if($searchJump):?>
  	$('#topSearch').click(function() {
		var name = $(this).val();
	  	document.location.href="/mobile/common/search?name="+name;
	})
	<?php //endif;?>

	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?e741935dc5ec29e08802c2a9453b1fa1";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
</body>
</html>