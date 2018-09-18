<!--<script src='/public/js/mapbox-gl.js'></script>-->
<!--<link href='/public/css/web/mapbox.css' rel='stylesheet' />-->
<!--<script src="/public/js/z-mapbox.js"></script>-->
<!--<link rel="stylesheet" href="/public/css/z-mapbox.css">-->
<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<link rel="stylesheet" href="/public/css/mobile/common.css">
<link rel="stylesheet" href="/public/css/mobile/school_detail.css">

<div class="container bg">
	<div class="z_schoolinfo" style='background: url("/upload/<?php echo get_filepath_by_route_id($school_detail['id'],$school_detail['cover'],3); ?>") no-repeat 50% 50%;background-size:cover;height: 155px;width: 100%'>
		<div class="z_newBannerBg"></div>
		<div class="z_newBannertxtBOX">
			<div class="z_newBannerTit"><?php echo @$school_detail['name_en']?></div>
			<div class="banner_info2"><?php echo @$school_detail['city_name']?>&nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp; <?php echo @$school_detail['state_code']?> &nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp; <?php
				switch (@$school_detail['basic_school_type']){
					case 1:$type="男校";$type_en = 'Male School';break;
					case 2:$type="女校";$type_en = 'Female School';break;
					default:$type="混校";$type_en = 'Co-Education';break;
				}

				?><?php if(!lang('is_en')){echo @$type;}else{echo $type_en;}?> &nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp;
				<img style="padding-right: 5px;position: relative;bottom: 2px" src="/upload/default/school/tel.png" alt=""><?php echo @$school_detail['contact_address_number']['number']?></div>
			<div class="banner_info3"><?php echo @$school_detail['url']?></a></div>
		</div>
	</div>

	<div class="row school-des">
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/school_detail/2.png" style="width:50px" />
			<p class="school-cn">学校类型</p>
			<p><?php
				switch (@$school_detail['basic_school_type']){
					case 1:$type="男校";$type_en = 'Male School';break;
					case 2:$type="女校";$type_en = 'Female School';break;
					default:$type="混校";$type_en = 'Co-Education';break;
				}
				if(!lang('is_en')){echo @$type;}else{echo $type_en;}
				?></p>
		</div>
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/school_detail/3.png" style="width:50px" />
			<p class="school-cn">学校年级</p>
			<p><?php echo $school_detail['basic_grade_start']; ?>-<?php echo $school_detail['basic_grade_end']; ?></p>
		</div>
		<div class="col-xs-4 text-center">
			<img src="/public/images/mobile/school_detail/4.png" style="width:50px" />
			<p class="school-cn one-line"><?php echo lang('school_detail_financial_tuition_message1');?></p>
			<p>$<?=@$school_detail['financial_tuition'];?></p>
		</div>
	</div>
	<div class="school-content">
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_intro_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
					<?php echo @$school_detail['intro'] ?>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_basic_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
					<li><?php echo lang('school_detail_basic_createtime_message');?>：<?php echo $school_detail['basic_createtime']; ?></li>
					<li><?php echo lang('school_detail_basic_international_students_message');?>：<?php echo $school_detail['basic_accept_international_students'];?></li>
					<li><?php echo lang('school_detail_basic_school_area_message')?>：<?php echo $school_detail['basic_school_area']; ?></li>
					<li><?php echo lang('search_peoper_count_message');?>：<?php echo $school_detail['basic_school_enrollments']; ?></li>
					<li><?php echo lang('search_school_level_message');?>：<?php echo $school_detail['basic_grade_start']; ?>-<?php echo $school_detail['basic_grade_end']; ?></li>
					<li><?php echo lang('school_detail_basic_religious_tendency_message');?>：<?php echo $school_detail['basic_religious_tendency']; ?></li>
					<li><?php echo lang('search_inter_avg_message');?>：<?php echo $school_detail['basic_proportion_of_individuals']; ?>%</li>
					<li><?php echo lang('school_address');?>：<?php echo $school_detail['contact_address_number']['address'].'&nbsp;,&nbsp;'.$school_detail['state_code'].'&nbsp;,&nbsp;'.$school_detail['zip_code']?></li>
				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_apply_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  	<li><?php echo lang('school_detail_apply_deadline_message');?>：<?php echo empty($school_detail['apply_deadline']) ? '--' : $school_detail['apply_deadline'] ?></li>
					<li><?php echo lang('school_detail_apply_cost'); ?>：<?php echo $school_detail['apply_cost']?$school_detail['apply_cost']:'--' ?></li>
					<li><?php echo lang('school_detail_i20')?>：<?php echo $school_detail['basic_issue_i20']?'是':'否' ;?></li>
					<li><?php echo lang('school_detail_apply_link_email_message')?>：<?php echo empty($school_detail['apply_link_email']) ? '--' : $school_detail['apply_link_email'] ?></li>

					<li>是否提供课后辅导：<?php echo $school_detail['after_school_care']?$school_detail['after_school_care']:'否' ?></li>
					<li><?php echo lang('school_detail_apply_saat_message');?>：<?php echo $school_detail['apply_ssat'] ?></li>

				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_teach_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  <li><?php echo lang('school_detail_teach_pupil_ratio_message');?>：<?php echo $school_detail['teach_pupil_ratio'] ?>:1</li>
				  <li><?php echo lang('school_detail_teach_class_avg_message');?>：<?php echo $school_detail['teach_class_avg'] ?></li>
				  <li><?php echo lang('school_detail_teach_esl_message');?>：<?php echo $school_detail['teach_esl'] ?></li>
				  <li><?php echo lang('school_detail_teach_edu_scale_message');?>：<?php echo $school_detail['teach_edu_scale'] ?>%</li>
				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_financial_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  <li><?php echo lang('school_detail_financial_contribute_message');?>：<?php echo empty($school_detail['financial_contribute']) ? '暂无' : $school_detail['financial_contribute'].'百万' ?></li>
				  <li><?php echo lang('school_detail_financial_tuition_message');?>：<?php echo empty($school_detail['financial_tuition']) ? '暂无' : $school_detail['financial_tuition'] ?></li>
				</ul>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_ap_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				<?php foreach($school_detail['ap_names'] as $k=>$item):?>
				  <li class="<?php echo $k>4?'hide':'';?>"><?php echo $item?></li>
				<?php endforeach;?>
				</ul>
				<?php if(count($school_detail['ap_names']) >5):?>
				<div class="text-center add-more">
					<img src="/public/images/mobile/school_detail/6.png" style="width:100px" />
				</div>
				<?php endif;?>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_sport_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  <?php foreach($school_detail['sport_item_names'] as $k=>$item):?>
				  <li class="<?php echo $k>4?'hide':'';?>"><?php echo $item?></li>
				  <?php endforeach;?>
				</ul>
				<?php if(count($school_detail['sport_item_names']) >5):?>
				<div class="text-center add-more">
					<img src="/public/images/mobile/school_detail/6.png" style="width:100px" />
				</div>
				<?php endif;?>
			</div>
			
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_club_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  <?php foreach($school_detail['club_names'] as $k=>$item):?>
				  <li class="<?php echo $k>4?'hide':'';?>"><?php echo $item?></li>
				  <?php endforeach;?>
				</ul>
				<?php if(count($school_detail['club_names']) >5):?>
				<div class="text-center add-more">
					<img src="/public/images/mobile/school_detail/6.png"  style="width:100px" />
				</div>
				<?php endif;?>
			</div>
			
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php echo lang('school_detail_direction_message');?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="school-list-content hide">
				<ul class="list-unstyled">
				  <?php foreach($school_detail['gd_names'] as $k=>$item):?>
				  <li class="<?php echo $k>4?'hide':'';?>">
				  	<?php 
				  		$count = '(' . $item['count'] . ')';
				  		echo $item['name'] . $count;
				  	?>
				  </li>
				  <?php endforeach;?>
				</ul>
				<?php if(count($school_detail['gd_names']) >5):?>
				<div class="text-center add-more">
					<img src="/public/images/mobile/school_detail/6.png"  style="width:100px" />
				</div>
				<<?php endif;?>
			</div>
		</div>
		<div class="school-list border-bottom">
			<div class="row">
				<div class="col-xs-10">
					<p class="school-list-title font-16"><?php $string = lang('school_detail_photo_message'); echo substr($string, 0,strpos($string, '/',1)) ;?></p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="slider school-list-content  hide">
				<div class="swiper-container slider1">
				    <div class="swiper-wrapper">
				    	<?php foreach($school_detail['images'] as $item): ?>
				        <div class="swiper-slide">
				        	<div class="img-area text-center">
				        		<?php if($item['file_type'] == $this->config->item('file_type_image')): ?>
									<img src="/upload/<?php echo get_filepath_by_route_id($item['school_id'],$item['file_name']); ?>" class="hd-img1">
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
					<p class="school-list-title font-16">推荐学校</p>
				</div>
				<div class="col-xs-2 text-center school-list-title pad-top-5">
					<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
				</div>
			</div>
			<div class="slider hide school-list-content">
				<div class="swiper-container slider3">
				    <div class="swiper-wrapper">

				        <div class="swiper-slide" onclick="document.location.href='/web/schoolDetail/<?php echo $school_detail['res1']['id'] ?>';">
				        	<div class="img-area">
				        		<img src="/upload/<?php echo get_filepath_by_route_id($school_detail['res1']['id'],$school_detail['res1']['index_hot_cover']); ?>">
				        		<div class="pad-5">
					        		<p class="img-title">
										<?php echo $school_detail['res1']['name_cn'] ?>,<?php echo $school_detail['res1']['code']['state_code'] ?>
						        	</p>	
				        		</div>
				        	</div>
				        </div>

						<div class="swiper-slide" onclick="document.location.href='/web/schoolDetail/<?php echo $school_detail['res2']['id'] ?>';">
							<div class="img-area">
								<img src="/upload/<?php echo get_filepath_by_route_id($school_detail['res2']['id'],$school_detail['res2']['index_hot_cover']); ?>">
								<div class="pad-5">
									<p class="img-title">
										<?php echo $school_detail['res2']['name_cn'] ?>,<?php echo $school_detail['res2']['code']['state_code'] ?>
									</p>
								</div>
							</div>
						</div>


						<div class="swiper-slide" onclick="document.location.href='/web/schoolDetail/<?php echo $school_detail['res3']['id'] ?>';">
							<div class="img-area">
								<img src="/upload/<?php echo get_filepath_by_route_id($school_detail['res3']['id'],$school_detail['res3']['index_hot_cover']); ?>">
								<div class="pad-5">
									<p class="img-title">
										<?php echo $school_detail['res3']['name_cn'] ?>,<?php echo $school_detail['res3']['code']['state_code'] ?>
									</p>
								</div>
							</div>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="map">
		
	</div>
	
</div>


<script type="text/javascript">
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
				    title:"<?php echo @$school_detail['name_en'] ?>", // 分享标题
				    desc: "<?php echo str_replace("\n",'',(@$school_detail['intro']));  ?>", // 分享描述
				    link: '', // 分享链接
				    imgUrl: 'http://www.schoolingandhoming.com//upload/<?php echo get_filepath_by_route_id($school_detail['id'],$school_detail['cover'],3); ?>', // 分享图标
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
					title:"<?php echo @$school_detail['name_en'] ?>", // 分享标题
					desc: "<?php echo str_replace("\n",'',(@$school_detail['intro']));  ?>", // 分享描述
				    link: '', // 分享链接
				    imgUrl: 'http://www.schoolingandhoming.com//upload/<?php echo get_filepath_by_route_id($school_detail['id'],$school_detail['cover'],3); ?>', // 分享图标
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

//  $(function(){
//	  mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';
//	  <?php //if (!empty($school_detail['lng'])):?>
//	  var center = [<?php //echo $school_detail['lng'] ?>//,<?php //echo $school_detail['lat'] ?>//];
//	  var map = new mapboxgl.Map({
//		  container: 'map',
//		  style: 'mapbox://styles/mapbox/streets-v9',
//		  center: center,
//		  zoom: 10
//	  });
//	  map.addControl(new mapboxgl.NavigationControl());
//
//	  var el = document.createElement('div');
//	  el.className = 'marker';
//	  el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
//	  el.style.width =  '50px';
//	  el.style.height = '50px';
//	  // 	    var popup = new mapboxgl.Popup({offset:[0, -30]})
//
//	  $('.mapboxgl-marker').each(function(){
//		  $(this).css('transform').replace(/[^0-9\-,]/g,'').split(',');
//	  })
//	  // add marker to map
//	  new mapboxgl.Marker(el, {offset: [-50 / 2, -50 /1.2]})
//		  .setLngLat([<?php //echo $school_detail['lng'] ?>//,<?php //echo $school_detail['lat'] ?>//])
//		  .addTo(map);
//	  <?php //else: ?>
//	  var map = new mapboxgl.Map({
//		  container: 'map', // container id
//		  style: 'mapbox://styles/mapbox/streets-v9', //stylesheet location
//		  center: [-95.50, 40], // starting position
//		  zoom: 3 // starting zoom
//	  });
//	  <?php //endif;?>
//  })
  </script>

<script>
	var lat = <?php echo $school_detail['lat']?$school_detail['lat']:40 ?>;
	var lng = <?php echo $school_detail['lng']?$school_detail['lng']:-100 ?>;
	var zoom = 12;
	if (lat ==40 && lng == -100){
		zoom = 4;
	}
	function initMap() {
		var uluru = {lat:lat , lng: lng};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: zoom,
			center: uluru
		});
		if(zoom == 12){
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		}

	}
</script>
<script async defer
		src="http://maps.google.cn/maps/api/js?key=AIzaSyBDZ46dfZl4risY5T_aoOol-iEB1ConUEc&callback=initMap">
</script>