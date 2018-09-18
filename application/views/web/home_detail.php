<link rel="stylesheet" href="/public/css/web/homedetail.css?v=1">
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="/public/bootstrap/css/swiper.3.2.0.min.css">
<script src="/public/bootstrap/js/swiper.3.2.0.jquery.min.js"></script>
<style>
#map{width:100%;height:290px}
</style>

<div class="head-banner">
	<div class="rl clearfix">
		<div class="hd-div1 container2">
			<div class="title2"><?php echo $house_detail['title'] ?></div>
			<div class="location1">
				<img src="/public/images/web/homedetail/1.png" class="icon14">&nbsp;<?php echo $house_detail['location'] ?>
			</div>
		</div>
		<img style="padding-left:400px" src="/public/images/web/homedetail/homebanner.png" class="bannerImg">
		<!--  <img src="/upload/<?php echo get_filepath_by_route_id($house_detail['id'],$house_detail['cover'],4); ?>" class="bannerImg">-->
	</div>
</div>


<div class="bg-white">
	<div class="container2">
		<table class="hosttab">
			<tr>
				<td class="" data-spy="scroll" data-target=".navbar-list" data-offset="0">
					<!-- 家庭成员 -->
					
					<div class="padTop30" id="familyMem">
						
						<div class="title">
							<div class="serialNum">1</div>  &nbsp;<?php echo lang('home_detail_member_message') ?>&nbsp;&nbsp;
						</div>
						<div class="row marginBtm">
							<table class="sdtab1">
								<tr>
									<td colspan="2"><?php echo lang('home_detail_intro') ?>：<?php echo $house_detail['family_child'] ?></td>
								</tr>
								<tr>
									<td><?php echo lang('home_detail_member_race_message') ?>：<?php echo $house_detail['race'] ?></td><td width="470px"><?php echo lang('home_detail_member_religion_message') ?>：<?php echo $house_detail['religion'] ?></td>
								</tr>
								<tr>
									<td><?php echo lang('home_detail_member_profession_message') ?>：<?php echo $house_detail['profession'] ?></td><td><?php echo lang('home_detail_member_language_message') ?>：<?php echo $house_detail['language'] ?></td>
								</tr>
								<tr>
									<td><?php echo lang('mobile_home_detail_price') ?>：<?php echo $house_detail['price'] ?></td><td><?php echo lang('home_detail_member_num') ?>：<?php echo $house_detail['families']; ?></td>
								</tr>
							</table>
							
						</div>
					</div>
					
					<!-- 房屋信息-->
					<div class="padTop30" id="houseInfo">
						<div class="title" >
							<div class="serialNum">2</div>  &nbsp;<?php echo lang('home_detail_basic_message') ?>
						</div>
						<div class="row">
							<table class="sdtab1">
								<tr>
									<td><?php echo lang('home_detail_basic_address_message') ?>：<?php echo $house_detail['address'] ?></td>
									<td width="470px"><?php echo lang('home_detail_basic_state_message') ?>：<?php echo $house_detail['state_name'] ?></td>
								</tr>
								<tr>
									<td><?php echo lang('home_detail_basic_createtime_message') ?>：<?php echo $house_detail['house_create_time'] ?></td>
									<td><?php echo lang('home_detail_basic_last_decorate_message') ?>：<?php echo $house_detail['house_last_decorate'] ?></td>
								</tr>
								<tr>
									<td><?php echo lang('home_detail_basic_house_type_message') ?>：<?php echo $house_detail['house_type'] ?></td>
									<td><?php echo lang('home_detail_basic_house_room_message') ?>：<?php echo str_replace('<br>', '&nbsp;', $house_detail['house_room']); ?></td>
								</tr>
								<tr>
									<td>
										<div class="row">
											<div class="col-md-3" style="padding:0px"><?php echo lang('home_detail_basic_rules_message') ?></div>
											<div class="col-md-9" style="padding:0px"><?php  foreach($house_detail['rule_names'] as $key =>$item):if($key >0 && $key%5 == 0){echo '<br>';}echo '<span style="padding-right:10px">'.$item.'</span>';endforeach;?></div>
										</div>
										
									</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
					<!-- 照片 视频 地图 -->
					<div class="padTop30" id="picVideoMap">
						<div class="title" >
							<div class="serialNum">3</div>  &nbsp;<?php echo lang('home_detail_photo_message') ?>
						</div>
						<div class="row" style="padding-top:10px">
							<?php foreach($house_detail['images'] as $item): ?>
							<div class="col-md-4 col-sm-4 padding10">
								<?php if($item['file_type'] == $this->config->item('file_type_image')): ?>
								<img src="/upload/<?php echo get_filepath_by_route_id($item['house_id'],$item['file_name'],2); ?>" class="hd-img1">
								<?php endif ?>
								<?php if($item['file_type'] == $this->config->item('file_type_video')): ?>
								
								<?php endif ?>
							</div>
							<?php endforeach; ?>
						</div>
						<!--  
						<div class="text-center content">
							<a class="" href=""><img src="/public/images/web/schooldetail/8.png"></a>
						</div>
						-->
						<div style="padding:10px 10px">
							<div id="map"></div>
						</div>
					</div>
					<!-- 评论 
					<div class="padTop30" id="comment">
						<div class="title" >
							<div class="serialNum">4</div>  &nbsp;评论
						</div>
						<?php foreach($house_detail['comments'] as $item): ?>
						<table class="comtab borderBtm">
							<tr>
								<td width="110px">
									<img src="/upload/<?php echo get_filepath_by_route_id($item['user']['id'],$item['user']['head_image'],5); ?>" class="hd-headimg">
								</td>
								<td>
									<div class="com-username"><?php echo $item['user']['name_cn'] ?></div>
									<div class="com-detail">
										<?php echo $item['content'] ?>
									</div>
									<div class="com-detail">
										<span class="com-date">
											<img src="/public/images/web/homedetail/1.png" class="icon"> <?php echo $item['comment_time'] ?>
										</span>
										<span class="com-place">
											<?php if($item['location']): ?>
											来自：<?php echo $item['location'] ?>
											<?php endif; ?>
										</span>
										
									</div>
								</td>
							</tr>
						</table>
						<?php endforeach; ?>
					</div>
					-->
					<!-- 附近学校 -->
					<div class="padTop30" id="otherSchools">
						<div class="title" >
							<div class="serialNum">4</div>  &nbsp;<?php echo lang('home_detail_near_school_message') ?>
						</div>
						<div class="row">
							<?php foreach($house_detail['suggest_school_item'] as $item): ?>
							<a href="/web/schoolDetail/<?php echo $item['id'] ?>">
							<div class="col-md-4 col-sm-4 div2">
								<div class="border-div1">
									<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover']); ?>" class="indexImg2">
									<div class="padding20">
										<div class="titleGreen1 one-line"><?php echo !lang('is_en')?$item['name_cn']:$item['name_en'];?><?php echo !empty($item['state_code'])?', '.$item['state_code']:'' ?></div>
										<!--<div class="indexDetail2 one-line"><?php echo $item['name_en'];?></div>-->
									</div>
								</div>
							</div>
							</a>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- 专业顾问 
					<div class="padTop30" id="preAdviser">
						<div class="title" >
							<div class="serialNum">6</div>  &nbsp;专业顾问
						</div>
						<div class="swiper-container gwslide">
						    <div class="swiper-wrapper">
						        <div class="swiper-slide">
						        	<div class="border-div1">
										<img src="/public/images/web/homedetail/gw.png" class="indexImg2">
										<div class="padding20">
											<div class="titleGreen1">Tom Hanks</div>
											<div class="indexDetail2">波士顿  马萨诸塞州  美国联邦认证顾问</div>
										</div>
									</div>
						        </div>
						        <div class="swiper-slide">
						        	<div class="border-div1">
										<img src="/public/images/web/homedetail/gw.png" class="indexImg2">
										<div class="padding20">
											<div class="titleGreen1">Tom Hanks</div>
											<div class="indexDetail2">波士顿  马萨诸塞州  美国联邦认证顾问</div>
										</div>
									</div>
						        </div>
						        <div class="swiper-slide">
						        	<div class="border-div1">
										<img src="/public/images/web/homedetail/gw.png" class="indexImg2">
										<div class="padding20">
											<div class="titleGreen1">Tom Hanks</div>
											<div class="indexDetail2">波士顿  马萨诸塞州  美国联邦认证顾问</div>
										</div>
									</div>
						        </div>
						    </div>
						    <div class="swiper-button-prev"></div>
						    <div class="swiper-button-next"></div>
						</div>
					</div>
					-->
					<!-- 相似住家 -->
					<div class="padTop30" id="similarHouse">
						<div class="title" >
							<div class="serialNum">5</div>  &nbsp;<?php echo lang('home_detail_same_house_message') ?>
						</div>
						<div class="row">
							<?php foreach ($otherHouse as $item):?>
							<a href="/web/homeDetail/<?=@$item['id']?>">
								<div class="col-md-4 col-sm-4 div2">
									<div class="border-div1">
										<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],2); ?>" class="sd-img1">
										<div class="padding20">
											<div class="titleGreen1"><?php echo $item['title'];?>, <?php echo $item['state_code'] ?></div>
											<!--<div class="indexDetail2"><?php echo $item['location'];?></div>-->
										</div>
									</div>
								</div>
							</a>
							<?php endforeach;?>
						</div>
					</div>
				</td>
				<td width="250px" style="padding-left:20px">
					<div class="content host-list navbar-example bs-docs-sidebar">
						<ul class="nav nav-tabs navbar-list">
							<li class="active"><a data-href="familyMem" href="#familyMem"><?php echo lang('home_detail_member_message') ?></a></li>
							<li><a data-href="houseInfo" href="#houseInfo"><?php echo lang('home_detail_basic_message') ?></a></li>
							<li><a data-href="picVideoMap" href="#picVideoMap"><?php echo lang('home_detail_photo_message') ?></a></li>
							<!--  <li><a data-href="comment" href="javascript:;">评论</a></li>
							-->
							<li><a data-href="otherSchools" href="#otherSchools"><?php echo lang('home_detail_near_school_message') ?></a></li>
							<!--<li><a data-href="preAdviser" href="javascript:;">专业顾问</a></li>
							-->
							<li><a data-href="similarHouse" href="#similarHouse"><?php echo lang('home_detail_same_house_message') ?></a></li>
							<li><a style="color:#76b26f" data-href="baseInfo" href="#baseInfo"><?php echo lang('home_detail_go_top_message') ?><b>↑</b></a></li>
						</ul>
					</div>
				</td>
			</tr>
		</table>	
	</div>
</div>
<script type="text/javascript">
 	$(document).ready(function(){
 		$('body').scrollspy({ target: '.bs-docs-sidebar' });
 		//地图
		mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';

 		<?php if(!empty($house_detail['lng']) && !empty($house_detail['lat']) ):?>
		 	var center =  [<?=@$cityLocation['lng']?>,<?=@$cityLocation['lat']?>];
		 	var map = new mapboxgl.Map({
		 	    container: 'map',
		 	    style: 'mapbox://styles/mapbox/streets-v9',
		 	    center: center,
		 	    zoom: 8
		 	});
		 	var el = document.createElement('div');
		 	    el.className = 'marker';
		 	    el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
		 	    el.style.width = '30px';
		 	    el.style.height = '46px';
		 	    var popup = new mapboxgl.Popup({offset:[0, -30]})
		
		 	    // add marker to map
		 	    new mapboxgl.Marker(el, {offset: [30, -30]})
		 	        .setLngLat([<?php echo $house_detail['lng'] ?>,<?php echo $house_detail['lat'] ?>])
		 	        .setPopup(popup)
		 	        .addTo(map);
		<?php endif;?>
 	 	
 		//导航滚动事件
 		$(window).bind("scroll",function(){
 		    var topHeight = $(".header").height() + $(".head-banner").height();
			var scrollTop = $(window).scrollTop();
 		    if(scrollTop > topHeight){
 		        $(".host-list").addClass("fixed-list");
 		    }else{
 		        $(".host-list").removeClass("fixed-list");
 		    }
 		});
 		//头部轮播图片
		   	 var mySwiper = new Swiper('.hdpslide',{
				slidesPerView : 1,   //显示张数
				slidesPerGroup : 1,   //轮播张数
				direction: 'horizontal',    //水平
				loop: true,   //循环
				// 如果需要前进后退按钮
			    nextButton: '.swiper-button-next',
			    prevButton: '.swiper-button-prev',
				autoplay :10000,      //3秒自动切换
				autoplayDisableOnInteraction : false,    //用户操作swiper之后自动切换不会停止
				grabCursor : true,           //鼠标覆盖Swiper时指针会变成手掌形状
				effect : 'slide',             //淡入效果
				}); 
 		
 		//顾问轮播
 		var mySwiper = new Swiper('.gwslide',{
				slidesPerView : 3,   //显示张数
				slidesPerGroup : 1,   //轮播张数
				direction: 'horizontal',    //水平
				loop: true,   //循环
				// 如果需要前进后退按钮
			    nextButton: '.swiper-button-next',
			    prevButton: '.swiper-button-prev',
			    //如果需要分页器
				//pagination: '.swiper-pagination',   //分页器
				//paginationClickable: true,			//点击分页器的指示点分页器会控制Swiper切换
				autoplay :8000,      //3秒自动切换
				autoplayDisableOnInteraction : false,    //用户操作swiper之后自动切换不会停止
				spaceBetween: 20,    //图片之间的间距
				grabCursor : true,           //鼠标覆盖Swiper时指针会变成手掌形状
				effect : 'slide',             //淡入效果
				}); 
 		//$('.hosttab > tbody > tr > td:first:child').scrollspy({ target: '.navbar-example' })
 		/* $('[data-spy="scroll"]').each(function () {
		  var $spy = $(this).scrollspy('refresh')
		}) */

 		

		$(".navbar-list > li").click(function(){
 			$(".navbar-list > li").removeClass("active")
 			$(this).addClass("active")
 	 	});
 	 });
		
</script>
