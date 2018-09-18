<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<link rel="stylesheet" href="/public/css/mobile/index.css">
<div class="container">
	<div class="swiper-container slider-top">
	    <div class="swiper-wrapper" style="width:100%">
	     <?php foreach ($banner as $val):?>
	      <div class="swiper-slide">
	       		<a href="<?php echo $val['link'] ?>"><img src="/upload/<?php echo get_filepath_by_route_id(0,$val['file_name']); ?>" style="width:100%;"/></a>
	      </div>
	      <?php endforeach;?>
	    </div>
	    <div class="swiper-pagination"></div>
	 </div>
	
	<div class="school clearfix border-bottom">
		<div class="top">
			<span class="title font-16"><strong><?php echo lang('index_hot_school_title_message') ?></strong></span>
		</div>
		<div class="slider">
			<div class="swiper-container slider1">
			    <div class="swiper-wrapper">
			    	<?php foreach ($hot_school as $item):?>
			        <div class="swiper-slide" onclick="document.location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$item['id']?>';">
			        	<div class="img-area">
			        		<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover']); ?>">
			        		<div class="pad-5">
				        		<p class="img-title">
				        		<?php echo $item['name_cn'];?>,
				        		<?php echo $item['state_code'];?>
				        		</p>
			        		</div>
			        	</div>
			        </div>
			        <?php endforeach;?>
			    </div>
			</div>
		</div>
	</div>
	
	<div class="school clearfix border-bottom">
		<div class="top">
			<span class="title font-16 title1"><strong><?php echo lang('index_hot_house_title_message') ?></strong></span>
		</div>
		<div class="slider">
			<div class="swiper-container slider2">
			    <div class="swiper-wrapper">
			    	<?php foreach ($hot_house as $item):?>
			        <div class="swiper-slide" onclick="document.location.href='/mobile/common/houseDetail/<?=$item['id']?>';">
			        	<div class="img-area">
			        		<img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],2); ?>">
			        		<div class="pad-5">
				        		<p class="img-title">
				        		<?php echo $item['title'];?>,
				        		<?php echo $item['state_code'];?>

				        		</p>
			        		</div>
			        	</div>
			        </div>
			        <?php endforeach;?>
			    </div>
			</div>
		</div>
	</div>
	<div class="text-center clearfix m-t-10">
		<a href="/mobile/common/personalTailor">
		<img src="/public/images/mobile/index/5.png" />
		</a>
	</div>
	
	<div class="school clearfix border-bottom">
		<div class="top">
			<span class="title font-16 title1"><strong><?php echo lang('index_hot_address_title_message') ?></strong></span>
		</div>
		<div class="slider clearfix">
			<div class="swiper-container slider3">
			    <div class="swiper-wrapper">
			    	<?php foreach($hot_down as $item): ?>
			        <div class="swiper-slide" onclick="document.location.href='/mobile/common/searchResult?type=1&name=<?php echo $item['title'] ?>'">
			        	<div class="img-area rl">
			        		<img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']); ?>" style="height:190px;width:100%">
			        		<div class="pad-5">
				        		<p class="img-title">
				        		<?php echo $item['title'];?>
				        	
				        		</p>
			        		</div>
			        	</div>
			        </div>
			        <?php endforeach;?>
			    </div>
			</div>
		</div>
	</div>

	<div class="school clearfix border-bottom">
		<div class="top">
			<span class="title font-16 title1"><strong>往期专题</strong></span>
		</div>
		<div class="slider clearfix">
			<div class="swiper-container slider3">
			    <div class="swiper-wrapper">
			    	<?php foreach($zt as $item): ?>
			        <div class="swiper-slide" onclick="document.location.href='<?php echo $item['link'] ?>'">
			        	<div class="img-area rl">
			        		<img src="/public/images/special/<?php echo $item['file_name'] ?>" style="height:190px;width:100%">
			        	</div>
			        </div>
			        <?php endforeach;?>
			    </div>
			</div>
		</div>
	</div>


</div>



<script>
  var swiperTop = new Swiper('.slider-top', {
      pagination: '.swiper-pagination',
      paginationClickable: true,
      autoplay: 5000,
  });
  var mySwiper = new Swiper('.slider1',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10
  })
  var mySwiper2 = new Swiper('.slider2',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10
  })
  var mySwiper3 = new Swiper('.slider3',{
      slidesPerView: 'auto',
      paginationClickable: true,
      spaceBetween: 10
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
			    title:'Schooling & Homing', // 分享标题
			    desc: '即 School 和 Home 的结合，是国内首家美国走读中学信息检索及寄宿家庭在线预订平台，意在连接学生、学校及寄宿家庭，致力于为低龄留学生营造一个温馨可信赖的海外之家。', // 分享描述
			    link: '', // 分享链接
			    imgUrl: 'https://www.schoolingandhoming.com/public/images/mobile/help/group5.png', // 分享图标
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
				title:'Schooling & Homing', // 分享标题
			    desc: '即 School 和 Home 的结合，是国内首家美国走读中学信息检索及寄宿家庭在线预订平台，意在连接学生、学校及寄宿家庭，致力于为低龄留学生营造一个温馨可信赖的海外之家。', // 分享描述
			    link: '', // 分享链接
			    imgUrl: 'https://www.schoolingandhoming.com/public/images/mobile/help/group5.png', // 分享图标
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
  </script>