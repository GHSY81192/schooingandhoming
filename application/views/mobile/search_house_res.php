<script src='/public/js/mapbox-gl.js'></script>
<link href='/public/css/web/mapbox.css' rel='stylesheet' />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script> 
<link rel="stylesheet" href="/public/css/mobile/search.css">
<style type="text/css">
.irs-line {
    background: linear-gradient(to bottom, #86cd7e -50%, #86cd7e 150%); /* W3C */
    border: 1px solid #86cd7e;
}
</style>
<div class="container bg">
	<div class="search-result clearfix">
	<?php if (!empty($data)):?>
	<p style="padding-left:10px"><?php if(!lang('is_mobile')):?> 为您找到<?php echo $count;?>个相关结果<?php else:?>Find <?php echo $count;?> Results<?php endif;?></p>
	<div id="contentData">
		<?php foreach ($data as $v):?>
		<div class="search-result-content" onclick="document.location.href='/mobile/common/houseDetail/<?=$v['id'];?>'">
			<div class="img-area text-center">
        		<img height="210px" width="100%" src="/upload/userhome/<?php echo $v['index_hot_cover'] ?>">
        		<div class="pad-5">
	        		<p class="img-title"><?= @$v['title'];?>, <?= @$v['state_code'];?></p>
	        		<!--<ul class="list-inline img-des font-12 pad-top-5">
					  <li><?php if(!empty($v['family_num'])):?><?=$num_change[$v['family_num']]?><?php echo !lang('is_en')?'口之家':' Person'?><?php endif;?></li>
					  <li><?=$race[@$v['family_race']]?></li>
					  <li>$<?=@$v['price']?>/<?php echo !lang('is_en')?'月':' Month'?></li>
					</ul>-->
        		</div>
        	</div>
		</div>
		<?php endforeach;?>
	</div>
	<?php else:?>
			<div class="search-empty-content">
				<div class="text-center search-empty-content-img">
					<img src="/public/images/mobile/search/9.png" style="width:50px"/>
					<p class="font-16 color4"><?php echo lang('mobile_search_suggest_title1_message');?></p>
				</div>
				<div class="search-empty-bottom">
					<p class="text-center empty-title"><?php echo lang('mobile_search_suggest_title1_message');?></p>
					<ul class="list-inline text-center">
					  <li class="empty-bg"><?php echo lang('search_suggest_addr1_message');?></li>
					  <li class="empty-bg"><?php echo lang('search_suggest_addr2_message');?></li>
					  <li class="empty-bg"><?php echo lang('search_suggest_addr3_message');?></li>
					</ul>
					<ul class="list-inline text-center">
					  <li class="empty-bg empty-bg2"><?php echo lang('search_suggest_addr4_message');?></li>
					  <li class="empty-bg empty-bg2"><?php echo lang('search_suggest_addr5_message');?></li>
					</ul>
					<ul class="list-inline text-center">
					  <li class="empty-bg empty-bg3"><?php echo lang('search_suggest_addr6_message');?></li>
					  <li class="empty-bg empty-bg3"><?php echo lang('search_suggest_addr7_message');?></li>
					</ul>
				</div>
				<!--  
				<div class="text-center foot-img"><img src="/public/images/mobile/index/10.png" style="width:75px"></div>
				-->
			</div>
	<?php endif;?>
	</div>
	<?php if (!empty($data)):?>
	<div class="search-fix-btn">
		<div style="padding-bottom:20px">
			<img src="/public/images/mobile/search/1.png" style="width:55px" id="showMenu"  />
		</div>
		<div>
			<img src="/public/images/mobile/search/2.png" style="width:55px" id="showMap" />
		</div>
	</div>
	<?php endif;?>
</div>
<?php if (!empty($data)):?>
<div id="search-menu" class="hide">
	<div class="search-menu-left">&nbsp;</div>
	<div class="search-menu-right">
	<form style="margin-bottom:80px">
		<div class="search-menu-content">
			<p class="search-menu-title font-16"><?php echo lang('mobile_search_more_btn');?></p>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('home_detail_basic_house_type_message');?></p>
			<div class="row search-menu-row">
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="3">
						<span><?php echo lang('search_house_type1');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['house_type'], '3')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="2">
						<span><?php echo lang('search_house_type2');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['house_type'], '2')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="1">
						<span><?php echo lang('search_house_type3');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['house_type'], '1')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>

				<input type="hidden" name="house_type" value="<?=@$ret['house_type'];?>"  />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_house_race');?></p>
			<div class="row search-menu-row">
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="1" >
						<span><?php echo lang('search_house_race1');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['race'], '1')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="2">
						<span><?php echo lang('search_house_race2');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['race'], '2')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="3">
						<span><?php echo lang('search_house_race3');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['race'], '3')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="4">
						<span><?php echo lang('search_house_race5');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['race'], '4')):?>7<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="<?php if(strstr(@$ret['race'], '5')):?>7<?php else:?>5<?php endif;?>">
						<span><?php echo lang('Other');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/5.png" />
					</div>
				</div>
				<input type="hidden" name="race" value="<?=@$ret['race'];?>" />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_house_price');?></p>
			<div class="search-menu-row">
				<input type="text" name="" class="edu-price" />
			</div>
			<input type="hidden" name="financial_tuition_min" />
		  	<input type="hidden" name="financial_tuition_max" />
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_house_pet');?></p>
			<div class="row search-menu-row">
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="1">
						<span><?php echo lang('search_house_pet1');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/5.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="0">
						<span><?php echo lang('search_house_pet2');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/5.png" />
					</div>
				</div>
				<input type="hidden" name="family_pet" value="<?=@$ret['family_pet'];?>" />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('home_detail_member_language_message');?></p>
			<div class="row search-menu-row">
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="2">
						<span><?php echo lang('search_house_language1');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/5.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input" data-val="1">
						<span><?php echo lang('search_house_language2');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/5.png" />
					</div>
				</div>
				<input type="hidden" name="language" value="<?=@$ret['language'];?>" />
			</div>
		</div>
		<div class="search-menu-content" style="border-bottom:0px">
			<p class="search-menu-title"><?php echo lang('search_house_job');?></p>
			<div class="row search-menu-row" style="margin-top:10px">
				<div class="col-xs-12">
						<input type="text" name="profession" class="form-control search-menu-input" placeholder="<?php echo lang('is_mobile')?'Please enter professional name ':'请输入职业名称';?>"/>
				</div>
			</div>
		</div>
	</form>
		<div class="search-menu-foot row">
			<input type="hidden" name="type" value="2" />
			<span><img src="/public/images/mobile/search/3.png" style="width:120px;padding-right:10px" id="cancelBtn"></span>
			<span><img src="/public/images/mobile/search/8.png" style="width:120px;" id="subBtn"></span>
		</div>
	</div>		
</div>
<?php endif;?>
<script type="text/javascript">

var index = 1;  
var  index2 = 0;

$('.search-menu-input').click(function(){
	
	var data_val = $(this).parent().parent().find('input[type=hidden]').val();
	
	if(	$(this).find('img').attr("src") == "/public/images/mobile/search/5.png" ){
  		add_val = $(this).attr('data-val');
  		if(data_val.indexOf(add_val) <0){
  			data_val += ','+add_val;
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
  		$(this).find('img').attr("src","/public/images/mobile/search/7.png");
	}else{
		$(this).find('img').attr("src","/public/images/mobile/search/5.png");
		del_val = $(this).attr('data-val');
		if(data_val.indexOf(del_val) >=0){	//有就去掉
  			data_val = data_val.replace(','+del_val,'');
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
	}	
})
$('.search-menu-left,#cancelBtn').click(function(){
	$(document.body).css({
		   "overflow-y":"auto"
		});
	$('#search-menu').addClass('hide');
})
$('#subBtn').click(function(){
		var data = $('form').serialize();
		location.href="/mobile/common/searchResult?type=2&"+data;
})
$('#showMenu').click(function(){
	$(document.body).css({
	   "overflow-y":"hidden"
	});
	$('#search-menu').removeClass('hide');
	$(".edu-price").ionRangeSlider({
		min: 500,
		max: 3000,
		from: <?php echo empty($ret['financial_tuition_min'])?500:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?3000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		postfix: "/月",//设置数值前缀
		grid: true,
	    onChange: saveResult,
	    onFinish: saveResult
	});
})
var saveResult = function (data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=financial_tuition_min]').val(from);
    $('input[name=financial_tuition_max]').val(to);
};
// $('#topSearch').blur(function() {
// 	var name = $(this).val();
//   	document.location.href="/mobile/common/searchResult?name="+name+"&type=2";
// })
$('#showMap').click(function(){
	document.location.href="/mobile/common/searchMap?<?php echo http_build_query(@$_GET); ?>"
})
$(window).scroll(function(){
		if( $(this).scrollTop() >3000*index){
			if(index2 == index){
				return false;
			}
			index2 = index;
			$.get('/mobile/common/ajaxSearchHome?<?php echo http_build_query($_GET).'&index=';?>'+index,function(data){
				if(data.data){
					html = '';
					$.each(data.data,function(k,v){
						html+= '<div class="search-result-content">';
						html+= '<a href="/mobile/common/houseDetail/'+v.id+'">'
						html+= '<div class="img-area text-center">';
						html+= '<img src="/upload/'+v.imgPath+'">';
						html+= '<div class="pad-5">';
						html+= '<p class="img-title">'+v.title+','+v.state_code+'</p>';
						html+= '</div>';
						html+= '</div></a>';
						
						html+= '</div>';
					})
					$('#contentData').append(html);
					index++;
				}
			},'json')
		}
	})
	
</script>

<!--  
<div id="map">

</div>

<script type="text/javascript">
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';
	var center =  [-65.017, -16.457];
	var map = new mapboxgl.Map({
	    container: 'map',
	    style: 'mapbox://styles/mapbox/streets-v9',
	    center: center,
	    zoom: 6
	});
	map.addControl(new mapboxgl.NavigationControl());
</script>
-->