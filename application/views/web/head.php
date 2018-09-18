<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="google-site-verification" content="lMKltawC9c6GGLbZ6kMWJNChy9TyqptSisLr2JKAInA" />
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" name="viewport">
        <title><?=@$title?></title>
        <link href="/public/images/web/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
        <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
		<script src="/public/layer/layer.js"></script>
		<link rel="stylesheet" href="/public/css/web/service/iconfont.css">
        <link rel="stylesheet" type="text/css" href="/public/css/web/common.css" media="all">
		<script src="/public/layui/layui.js" charset="utf-8"></script>
        <?php if($this->router->method == 'index'): ?>
			<link rel="stylesheet" href="/public/jquery-autocomplete/jquery.autocomplete.css">
			<script src="/public/jquery-autocomplete/jquery.autocomplete.min.js"></script>
<!--			<script src="/public/js/suggest.js"></script>-->
		<?php endif; ?>
		<style type="text/css">
			@font-face {font-family: "iconfont";src: url('/public/css/web/service/iconfont.eot'); src: url('/public/css/web/service/iconfont.eot#iefix') format('embedded-opentype'), url('/public/css/web/service/iconfont.woff') format('woff'),url('/public/css/web/service/iconfont.ttf') format('truetype'),url('/public/css/web/service/iconfont.svg#iconfont') format('svg');}
			.iconfont {font-family:"iconfont" !important;font-size:16px;font-style:normal;-webkit-font-smoothing: antialiased;-webkit-text-stroke-width: 0.2px;-moz-osx-font-smoothing: grayscale;}
		</style>
    </head>
	<body<?php if ($relative):?> style="position:relative;"<?php endif;?>>
	<div class="header-top" style="position: fixed;width: 100%;z-index: 900">
		<div class="top-box">
			<ul class="list-inline top-ul">
				<li><div class="dropdown">
						<a id="dropdownMenu1" class="cur" data-toggle="dropdown">
							<?php echo lang('header_helper_message') ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							<li class="drop" role="presentation"><a role="menuitem" tabindex="-1" href="/help/order"><?php echo lang('header_helper_order_message') ?></a></li>
							<li class="drop" role="presentation"><a role="menuitem" tabindex="-1" href="/help/toBeHoming"><?php echo lang('header_helper_tobehoming_message') ?></a></li>
							<li class="drop" role="presentation"><a role="menuitem" tabindex="-1" href="/help/normalFaq"><?php echo lang('header_helper_normalfaq_message') ?></a></li>
							<li class="drop" role="presentation"><a role="menuitem" tabindex="-1" href="/help/homeFaq"><?php echo lang('header_helper_homefaq_message') ?></a></li>
							<li class="drop" role="presentation"><a role="menuitem" tabindex="-1" href="/help/userFaq"><?php echo lang('header_helper_userfaq_message') ?></a></li>

						</ul>
					</div>
				</li>
				<?php if (empty($headUser)):?>
					<li><a href="javascript:void(0)" id="headerLoginBtn"><?php echo lang('header_login_message') ?></a></li>
				<?php else:?>
					<li style="cursor: pointer">
						<div class="dropdown">
							<div class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<?=$headUser['name_cn']?>
								<span class="caret"></span>
							</div>
							<ul class="dropdown-menu userCenter" aria-labelledby="dropdownMenu1">
								<li><a href="/home"><i class="glyphicon glyphicon-user" aria-hidden="true"></i><span><?=lang('Personal_Homepage')?></span></a></li>
								<li><a href="/home/setting"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i><span><?=lang('Account_Setting')?></span></a></li>
								<li><a href="/home/loginOut"><i class="glyphicon glyphicon-off" aria-hidden="true"></i><span><?=lang('Log_out')?></span></a></li>
							</ul>
						</div>
					</li>
				<?php endif;?>



				<li style="position: relative">
					<div class="dropdown">
						<button style="background-color:#f7f7f7;border:none" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="/public/images/web/<?php echo lang('is_en')?'en':'cn' ?>.png" width="25px" alt="">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="left: -100px;">
							<li style="padding: 5px 0"><a href="javascript:;" onclick="set_lang('zh_cn');"><img src="/public/images/web/cn.png" width="25px" alt=""> <span style="font-size:14px">简体中文</span></a></li>
							<li style="padding: 5px 0"><a href="javascript:;" onclick="set_lang('english')"><img src="/public/images/web/en.png" width="25px" alt=""> <span style="font-size:14px">English(US)</span></a></li>
						</ul>
					</div>

				</li>

			</ul>
		</div>
	</div>
	<div style="height: 30px;"></div>
	<div class="header" style="position: fixed;width: 100%;z-index: 500;background: #FFF;">
		<div class="container2">
			<div class="row">
				<div class="col-xs-4 col-lg-6 nav-z" style="padding-right: <?=lang('is_en')?'70px':'99px'?>;">

					<a style="float: left" href="/web/index"><img src="/public/images/web/logo.png" /></a>
					<ul class="list-inline visible-lg-block" style="margin-bottom:0px;padding-left: 15px;float: left;padding-top: 15px">
						<li class="nav-li"><a style="<?php echo lang('is_en')?'padding-left:0':''?>" href="/web/schoolList"><?php echo lang('header_school') ?></a></li>
						<li class="nav-li"><a style="<?php echo lang('is_en')?'padding-left:0':''?>" href="/web/homeList"><?php echo lang('header_home') ?></a></li>
						<li class="nav-li"><a style="<?php echo lang('is_en')?'padding-left:0':''?>" href="/web/SummerMore"><?php echo lang('summer_program') ?></a></li>
						<li class="nav-li"><a style="<?php echo lang('is_en')?'padding-left:0':''?>" href="/web/LessonList"><?php echo lang('Bridge_Program') ?></a></li>
						<li class="nav-li"><a style="<?php echo lang('is_en')?'padding-left:0':''?>" href="/web/CampList"><?php echo lang('Summer_Camp') ?></a></li>
<!--						<li class="nav-li"><a style="--><?php //echo lang('is_en')?'padding-left:0':''?><!--" href="/web/serviceList">--><?php //echo lang('header_service') ?><!--</a></li>-->
					</ul>
					<button type="button" class="navbar-toggle collapsed hidden-lg" data-toggle="collapse" data-target="#pad-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="col-xs-4 col-lg-4 row head-search-box" style="<?=lang('is_en')?'width:315px;right:-60px;padding-left:0px;':''?>">
					<div class="dropdown col-xs-3 col-lg-3" style="padding: 0;width: auto;">
						<button class="btn btn-default dropdown-toggle nav-search"  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<span id="tagInput" data-value="1"><?php echo lang('header_school') ?></span>
							<div class="caret_box">
								<span class="caret caret-nav" style=""></span>
							</div>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="min-width: 80px">
							<li><a class="nav-option tagdiv borderBtm" data-value="1"><?php echo lang('header_school') ?></a></li>
							<li role="separator" class="divider" style="margin: 5px 0;"></li>
							<li><a class="nav-option tagdiv" data-value="2"><?php echo lang('header_home') ?></a></li>
						</ul>
					</div>
					<div class="col-xs-9 head_search" style="padding: 0;">
						<div class="input-group">
							<input type="text" class="form-control nav-search-input searchInput">
							  <span class="input-group-btn">
								<div class="btn  nav-search-icon-btn" >
									<span class="glyphicon glyphicon-search goSearch" style="color: #76b26f" aria-hidden="true" ></span>
								</div>
							  </span>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-lg-2 text-right" style="padding-right: 0px;float: right;<?=lang('is_en')?'width:180px;padding-top: 5px;':'padding-top: 15px;'?>">
					<ul class="list-inline" style="margin-bottom:0px;padding: 0">
					  <li style="<?php echo $headUser['identity']==3?'display:none':''?>;<?=lang('is_en')?'margin-bottom:6px;':''?>"><a style="<?php echo lang('is_en')?'width:auto;':'' ?>" href="/web/becomeHostFamily" ><?php echo lang('Become_a_Host_Family') ?></a></li>
						<?=lang('is_en')?'':'<li>|</li>'?>
					  <li style="<?php echo $headUser['identity']==2?'display:none':''?>"><a href="/web/personalTailor" ><?php echo lang('header_person_tailor') ?></a></li>
					</ul>
				</div>

			</div>
			<div id="pad-nav" class="collapse">
				<ul>
					<li><a href="/web/schoolList"><?php echo lang('header_school') ?></a></li>
					<li><a href="/web/homeList"><?php echo lang('header_home') ?></a></li>
					<li><a href="/web/LessonList"><?php echo lang('Bridge_Program') ?></a></li>
					<li><a href="/web/SummerList"><?php echo lang('summer_program') ?></a></li>
					<li><a href="/web/CampList"><?php echo lang('Summer_Camp') ?></a></li>
<!--					<li><a href="/web/serviceList">--><?php //echo lang('header_service') ?><!--</a></li>-->
				</ul>
			</div>
			<div style=" clear: both"></div>
		</div> 
	</div>
	<script>
		$(document).ready(function(){
			$(".tagdiv").click(function(){
				$("#tagInput").val($(this).html());
				$("#tagInput").attr("data-value",$(this).attr("data-value"));
				$(".tagDetail").hide();
			});
			$('#tagInput').val('<?php echo lang('index_search_value_message') ?>')
			$(".goSearch").click(function(){
				var type = $("#tagInput").attr("data-value");
				var name = $(".searchInput").val();

				if(type == 2){
					window.location.href = "/web/searchHome?type="+type+"&name="+name;
				}else{
					window.location.href = "/web/schoolList?type="+type+"&name="+name;
				}
			});
			$('.autocomplete-suggestions').css('width','330px');
		});
		document.onkeydown=function(event){
			var e = event || window.event || arguments.callee.caller.arguments[0];
			if(e && e.keyCode==13){
				$('.goSearch').click();
			}
		}
		$('.nav-li').hover(function(){
			$(this).find('a').css({color:'#d0b784'});
		},function(){
			$(this).find('a').css({color:'#4b4b4b'});
		});

		$('.nav-option').click(function(){
			var txt = $(this).html();

			$('#tagInput').html(txt);
		});
	</script>
	<div style="height: 58px;"></div>