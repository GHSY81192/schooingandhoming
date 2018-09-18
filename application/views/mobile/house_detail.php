<script src='/public/js/mapbox-gl.js'></script>
<link href='/public/css/web/mapbox.css' rel='stylesheet' />
<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<link rel="stylesheet" href="/public/css/mobile/common.css">
<link rel="stylesheet" href="/public/css/mobile/school_detail.css">
<div class="container bg">
	<div class="rl" style="position: inherit">
		<!--  <img src="/public/images/mobile/home_detail/1.png" />-->
		<img src="/upload/<?php echo get_filepath_by_route_id($house_detail['id'],$house_detail['cover_mobile'],4); ?>" />
	</div>	
	<div class="ab school-top color3 text-center" style="position:inherit;color:#333;font-weight:bold;padding-top:10px;background-color: #fff;">
		<p class="school-top-title font-18" style="font-size:22px;font-weight:normal;"><?php echo $house_detail['title'] ?></p>
	</div>
	<div class="row school-des">
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/home_detail/2.png" style="width:40px" />
			<p class="school-cn"><?php echo $house_detail['location'] ?></p>
			<!--<p class="school-en"><?php /*echo $house_detail['location_en'] */?></p>-->
		</div>
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/home_detail/5.png" style="width:40px" />
			<!--<p class="school-cn"><?php echo lang('mobile_home_detail_race');?></p>-->
			<p class="school-cn"><?php echo @$house_detail['race'] ?></p>
		</div>
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/home_detail/4.png" style="width:40px" />
			<!--<p class="school-cn"><?php echo lang('mobile_home_detail_price');?></p>-->
			<p class="school-cn">$<?php echo $house_detail['price'] ?>/月</p>
		</div>
	</div>
	<div class="school-content">
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('mobile_home_member_messag');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
					<li><?php echo lang('home_detail_intro') ?>：<?php echo $house_detail['family_child'] ?></li>
					<li><?php echo lang('home_detail_member_race_message') ?>：<?php echo $house_detail['race'] ?></li>
					<li><?php echo lang('home_detail_member_religion_message') ?>：<?php echo $house_detail['religion'] ?></li>
					<li><?php echo lang('home_detail_member_profession_message') ?>：<?php echo $house_detail['profession'] ?></li>
					<li><?php echo lang('home_detail_member_language_message') ?>：<?php echo $house_detail['language'] ?></li>
					<li><?php echo lang('mobile_home_detail_price') ?>：<?php echo $house_detail['price'] ?></li>
					<li><?php echo lang('home_detail_member_num') ?>：<?php echo $house_detail['families']; ?></li>
				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('home_detail_basic_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
					<li style="line-height:20px;height:<?php echo count($house_detail['rule_names'])/3*70;?>px"><?php //echo lang('home_detail_basic_rules_message');?>
						<div style="">
							<?php foreach(array_chunk($house_detail['rule_names'], 4) as $arr):?>
								<div class="row" style="margin:10px 0px;">
									<?php foreach ($arr as $item): ?>
										<div class="col-xs-3 text-center">
											<img src="/upload/<?php echo get_filepath_by_route_id(0,$item['image'],2); ?>" style="height:40px">
											<?php echo $item['name'] ?>
										</div>
									<?php endforeach;?>
								</div>
							<?php endforeach;?>
						</div>
					</li>
				  <li><?php echo $house_detail['address']; ?></li>
				  <li><?php echo lang('home_detail_basic_createtime_message');?>：<?php echo $house_detail['house_create_time']; ?></li>
				  <li><?php echo lang('home_detail_basic_last_decorate_message');?>：<?php echo $house_detail['house_last_decorate']; ?></li>
				  <li><?php echo lang('home_detail_basic_house_type_message');?>：<?php echo $house_detail['house_type']; ?></li>
				  <li><?php echo lang('home_detail_basic_house_room_message');?>：<?php echo str_replace('<br>', '&nbsp;', $house_detail['house_room']); ?></li>

				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php $string = lang('home_detail_photo_message'); echo substr($string, 0,strpos($string, '/',1)) ;?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="slider hide school-list-content">
				<div class="swiper-container slider1">
				    <div class="swiper-wrapper">
				    	<?php foreach($house_detail['images'] as $item): ?>
				        <div class="swiper-slide">
				        	<div class="img-area text-center">
				        		<?php if($item['file_type'] == $this->config->item('file_type_image')): ?>
								<img src="/upload/<?php echo get_filepath_by_route_id($item['house_id'],$item['file_name'],2); ?>" />
								<?php endif ?>
								<?php if($item['file_type'] == $this->config->item('file_type_video')): ?>
								
								<?php endif ?>
				        		
				        	</div>
				        </div>
				        <?php endforeach;?>
				    </div>
				</div>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('home_detail_near_school_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="slider hide school-list-content">
				<div class="swiper-container slider2">
				    <div class="swiper-wrapper">
						<?php foreach($house_detail['suggest_school_item'] as $item): ?>			    
				        <div class="swiper-slide" onclick="document.location.href='/mobile/common/schoolDetail/<?=$item['id']?>';">
				        	<div class="img-area text-center">
				        		<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover']); ?>">
				        		<div class="pad-5">
					        		<p class="img-title">
						        		<?php echo @$item['name_cn'];?>, <?php echo @$item['state_code'];?>
						        	</p>	
				        		</div>
				        	</div>
				        </div>
				        <?php endforeach;?>
				    </div>
				</div>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('home_detail_same_house_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="slider hide school-list-content">
				<div class="swiper-container slider3">
				    <div class="swiper-wrapper">
				    	<?php foreach($otherHouse as $item): ?>
				        <div class="swiper-slide" onclick="document.location.href='/mobile/common/houseDetail/<?=$item['id']?>';">
				        	<div class="img-area text-center">
				        		<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],2); ?>">
				        		<div class="pad-5">
					        		<p class="img-title">
						        		<?php echo @$item['title'];?>, <?php echo @$item['state_code'];?>
						        	</p>
				        		</div>
				        	</div>
				        </div>
				        <?php endforeach;?>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="map">
		
	</div>
	
</div>



<script>
  var mySwiper = new Swiper('.slider1',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10,
      observer:true,
      observeParents:true
  })
  var mySwiper2 = new Swiper('.slider2',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10,
      observer:true,
      observeParents:true
  })
  var mySwiper3 = new Swiper('.slider3',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10,
      observer:true,
      observeParents:true
  })
  $('.school-list .row').click(function(){
		hideClass = $(this).parent().find('.school-list-content');
	  	if(hideClass.hasClass('hide')){
			hideClass.removeClass('hide');
			$(this).parent().find('.school-list-title img').attr('src','/public/images/mobile/school_detail/7.png');
	  	}else{
	  		hideClass.addClass('hide');
	  		$(this).parent().find('.school-list-title img').attr('src','/public/images/mobile/school_detail/5.png');
		}
  })
  $('.school-list .add-more').click(function(){
		$(this).parent().find('li').removeClass('hide');
		$(this).hide();
  })
  //微信分享API
		$.ajax({
			type:'POST',
			url:'/weixin/getWeiXinSign',
			cache:false,
			dataType:'JSON',
			success:function(res){
				data = res.data;
				wx.config({
				    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
				    appId: data.appId, // 必填，公众号的唯一标识
				    timestamp: data.timestamp, // 必填，生成签名的时间戳
				    nonceStr: data.nonceStr, // 必填，生成签名的随机串
				    signature: data.signature,// 必填，签名，见附录1
				    jsApiList: [	// 必填，需要使用的JS接口列表，所有JS接口列表见附录2
								'checkJsApi',
								'onMenuShareTimeline',
								'onMenuShareAppMessage',
				    ]
				});	
			}
		});
		wx.ready(function () {
			    //分享给朋友
				wx.onMenuShareAppMessage({
				    title:"<?php echo @$house_detail['title'] ?>", // 分享标题
				    desc: "<?php echo @$house_detail['family_child'] ?>", // 分享描述
				    link: '', // 分享链接
				    imgUrl: 'https://www.schoolingandhoming.com/upload/<?php echo get_filepath_by_route_id($house_detail['id'],$house_detail['cover'],4); ?>', // 分享图标
				    type: '', // 分享类型,music、video或link，不填默认为link
				    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				    success: function () { 
				    	  // 用户确认分享后执行的回调函数
				    },
				    cancel: function () { 
				        // 用户取消分享后执行的回调函数
				    }
				});
				//分享到朋友圈
				wx.onMenuShareTimeline({
					title:"<?php echo @$house_detail['title'] ?>", // 分享标题
				    desc: "<?php echo @$house_detail['family_child'] ?>", // 分享描述
				    link: '', // 分享链接
				    imgUrl: 'https://www.schoolingandhoming.com/upload/<?php echo get_filepath_by_route_id($house_detail['id'],$house_detail['cover'],4); ?>', // 分享图标
				    type: '', // 分享类型,music、video或link，不填默认为link
				    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				    success: function () { 
				    	  // 用户确认分享后执行的回调函数
				    },
				    cancel: function () { 
				        // 用户取消分享后执行的回调函数
				    }
				});
				
		});
	//地图
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';
	
	var center =  [<?=@$cityLocation['lng']?>,<?=@$cityLocation['lat']?>];
	var map = new mapboxgl.Map({
	    container: 'map',
	    style: 'mapbox://styles/mapbox/streets-v9',
	    center: center,
	    zoom: 10
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
  	
  </script>