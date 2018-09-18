<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script> 
<link rel="stylesheet" href="/public/css/mobile/search.css">
<style type="text/css">
.irs-line {
    background: linear-gradient(to bottom, #5078b5 -50%, #5078b5 150%); /* W3C */
    border: 1px solid #5078b5;
}
</style>
<div class="container bg">
	<div class="search-result clearfix">
		<?php if (!empty($data)):?>
			<p style="padding-left:10px"><?php if(!lang('is_mobile')):?> 为您找到<?php echo @$count;?>个相关结果<?php else:?>Find <?php echo count($data);?> Results<?php endif;?></p>
			<div id="contentData">
				<?php foreach ($data as $v):?>
				<div class="search-result-content" onclick="document.location.href='/web/schoolDetail/<?=$v['id'];?>'">
					<div class="img-area text-center">
		        		<img src="/upload/<?php echo get_filepath_by_route_id($v['id'],$v['index_hot_cover']); ?>">
		        		<div class="pad-5">
			        		<p class="img-title"><?=$v['name_cn']?><?php echo !empty($v['state_code']) ? ', '.$v['state_code'] : '' ?></p>
			        		<!--<ul class="list-inline img-des font-12 pad-top-5">
							  <li><?=@$area;?></li>
							  <?php 
							  		switch ($v['basic_school_type']){
										case 1:$type="男校";$type_en = 'Male School';break;
										case 2:$type="女校";$type_en = 'Female School';break;
										default:$type="混校";$type_en = 'Co-Education';break;
									}
							  
							  ?>
							  <li><?php if(!lang('is_en')){echo $type;}else{echo $type_en;}?></li>
							  <li>$<?=$v['financial_tuition'];?></li>
							</ul>-->
		        		</div>
		        	</div>
				</div>
				<?php endforeach; ?>
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
			</div>
		<?php endif;?>
	</div>
	<?php if (!empty($data)):?>
	<div class="search-fix-btn" id="switch">
		<div style="padding-bottom:20px">
			<img src="/public/images/mobile/search/1.png" style="width:55px" id="showMenu" />
		</div>
		<div>
			<img src="/public/images/mobile/search/2.png" style="width:55px" id="showMap" />
		</div>
	</div>
	<?php endif;?>
	<!--  
	<div class="text-center foot-img" style="position:fixed;bottom:10px;margin:0px auto;z-index:99;left:50%;margin-left:-37.5px;margin-top:30px">
		<a href="/mobile/common"><img src="/public/images/mobile/index/10.png" style="width:75px"></a>
	</div>
	-->
</div>
<?php if (!empty($data)):?>
<div id="search-menu" class="hide">
	<div class="search-menu-left">&nbsp;</div>
	<div class="search-menu-right">
		<div class="search-menu-content">
			<p class="search-menu-title font-16"><?php echo lang('mobile_search_more_btn');?></p>
		</div>
		<form style="margin-bottom:90px">
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_school_type_message');?></p>
			<div class="row search-menu-row">
				<div class="col-xs-6">
					<div class="rl search-menu-input  <?php if(strstr(@$ret['basic_school_type'], '1')):?>search-menu-input-active<?php endif;?>" data-val="1">
						<span><?php echo lang('search_school_type1_message');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['basic_school_type'], '1')):?>6<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input <?php if(strstr(@$ret['basic_school_type'], '2')):?>search-menu-input-active<?php endif;?>" data-val="2">
						<span><?php echo lang('search_school_type2_message');?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['basic_school_type'], '2')):?>6<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="rl search-menu-input <?php if(strstr(@$ret['basic_school_type'], '3')):?>search-menu-input-active<?php endif;?>" data-val="3">
						<span><?php echo lang('search_school_type3_message');?></span>
						<img class="ab search-menu-chose search-menu-chose-click" src="/public/images/mobile/search/<?php if(strstr(@$ret['basic_school_type'], '3')):?>6<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<input type="hidden" name="basic_school_type" value="<?=@$ret['basic_school_type'];?>"  />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_school_level_message');?></p>
			<div class="row search-menu-row">
				<?php foreach ($grade as $v):?>
				<?php 
					  $s=preg_match_all('/\d+/',$v['remark'],$arr);
					  $result=@$arr[0][0].'-'.@$arr[0][1];
				?>
				<div class="col-xs-6">
					<div class="rl search-menu-input <?php if(strstr(@$ret['basic_grade'], $result)):?>search-menu-input-active<?php endif;?>" data-val="<?=$result?>">
						<span><?=$v['remark'];?></span>
						<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php if(strstr(@$ret['basic_grade'], $result)):?>6<?php else:?>5<?php endif;?>.png" />
					</div>
				</div>
				<?php endforeach;?>
				<input type="hidden" name="basic_grade" value="<?=@$ret['basic_grade'];?>" />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_money_message');?></p>
			<div class="search-menu-row">
				<input type="text" name="" class="edu-price" />
				<input type="hidden" name="financial_tuition_min" />
				<input type="hidden" name="financial_tuition_max" />
			</div>
		</div>
		<div class="search-menu-content">
			<p class="search-menu-title"><?php echo lang('search_peoper_count_message');?></p>
			<div class="search-menu-row">
				<input type="text" name="" class="school-num" />
				<input type="hidden" name="basic_school_enrollments_min" />
				<input type="hidden" name="basic_school_enrollments_max" />
			</div>
		</div>
		<div class="search-menu-content" style="border-bottom:none">
			<p class="search-menu-title"><?php echo lang('school_detail_ap_message');?></p>
			<div class="row search-menu-row">
				<?php foreach ($apList as $item):?>
					<?php 
						$col = 6;
						if(strlen($item['name']) >15){
							$col = 12;
						}
					?>
					<div class="col-xs-<?=$col;?> ap-list <?php if($item['id']>10){echo 'hide';}?>">
						<div class="rl search-menu-input <?php $ap=','.$item['id']; if(strstr(@$ret['ap'], $ap)):?>search-menu-input-active<?php endif;?>" data-val="<?=$item['id']?>">
							<span class="font-12"><?php echo str_replace('AP ', '', $item['name']);?></span>
							<img class="ab search-menu-chose" src="/public/images/mobile/search/<?php  if(strstr(@$ret['ap'], $ap)):?>6<?php else:?>5<?php endif;?>.png" />
						</div>
					</div>
				<?php endforeach;?>
				<div class="text-center search-ap-more col-xs-12" style="padding-bottom:10px">
					<div class="search-ap-more-btn"><?php echo lang('mobile_search_more');?></div>
				</div>
				<input type="hidden" name="ap" value="<?=@$ret['ap'];?>" />
			</div>
		</div>
		<div class="search-menu-content" style="border-bottom:none">
			<p class="search-menu-title"><?php echo lang('school_detail_apply_sat_avg_message');?></p>
			<div class="search-menu-row">
				<input type="text" name="" class="sat" />
				<input type="hidden" name="sat" value="<?=@$ret['sat'];?>" />
				<input type="hidden" name="st_min" />
				<input type="hidden" name="st_max" />
				<input type="hidden" name="type" value="1" />
			</div>
		</div>
		<input type="hidden" name="name" value="<?=@$ret['name'];?>">
		</form>
		<div class="search-menu-foot row">
			<span><img src="/public/images/mobile/search/3.png" style="width:120px;padding-right:10px" id="cancelBtn"></span>
			<span><img src="/public/images/mobile/search/4.png" style="width:120px;" id="subBtn"></span>
		</div>
	</div>		
	
</div>
<?php endif;?>
<script type="text/javascript">
var index = 1;  
var  index2 = 0;
$('.search-menu-left,#cancelBtn').click(function(){
	$(document.body).css({
		   "overflow-y":"auto"
		});
	$('#search-menu').addClass('hide');
})
$('#subBtn').click(function(){
		var data = $('form').serialize();
		location.href="/mobile/common/searchResult?"+data;
})
$('.search-ap-more-btn').click(function(){
	$('.ap-list').removeClass('hide');
	$(this).parent().hide();
})
$('.search-menu-input').click(function(){
	
	var data_val = $(this).parent().parent().find('input[type=hidden]').val();
	
	if(	$(this).find('img').attr("src") == "/public/images/mobile/search/5.png" ){
  		add_val = $(this).attr('data-val');
  		if(data_val.indexOf(add_val) <0){
  			data_val += ','+add_val;
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
  		$(this).find('img').attr("src","/public/images/mobile/search/6.png");
  		$(this).addClass('search-menu-input-active');
	}else{
		$(this).find('img').attr("src","/public/images/mobile/search/5.png");
		$(this).removeClass('search-menu-input-active');
		del_val = $(this).attr('data-val');
		if(data_val.indexOf(del_val) >=0){	//有就去掉
  			data_val = data_val.replace(','+del_val,'');
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
	}	
})
$('#showMenu').click(function(){
	$(document.body).css({
	   "overflow-y":"hidden"
	});
	$('#search-menu').removeClass('hide');
	$(".edu-price").ionRangeSlider({
		min: 0,
		max: 80000,
		from: <?php echo empty($ret['financial_tuition_min'])?0:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?80000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		grid: true,
	    onChange: saveResult,
	    onFinish: saveResult
	});
	$('.school-num').ionRangeSlider({
		min: 0,
		max: 2000,
		from: <?php echo empty($ret['basic_school_enrollments_min'])?0:$ret['basic_school_enrollments_min']?>,
		to: <?php echo empty($ret['basic_school_enrollments_max'])?2000:$ret['basic_school_enrollments_max']?>,
		type: 'double',//设置类型
		step: 1,
		postfix: "人",//设置数值前缀
		grid: true,
	    onChange: saveResult2,
	    onFinish: saveResult2
	});
	$('.sat').ionRangeSlider({
		min: 0,
		max: 1600,
		from: <?php echo empty($ret['st_min'])?0:$ret['st_min']?>,
		to: <?php echo empty($ret['st_max'])?10000:$ret['st_max']?>,
		type: 'double',//设置类型
		step: 1,
		postfix: "分",//设置数值前缀
		grid: true,
	    onChange: saveResult3,
	    onFinish: saveResult3
	});
	
})
var saveResult = function (data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=financial_tuition_min]').val(from);
    $('input[name=financial_tuition_max]').val(to);
};
var saveResult2 = function (data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=basic_school_enrollments_min]').val(from);
    $('input[name=basic_school_enrollments_max]').val(to);
};
var saveResult3 = function (data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=st_min]').val(from);
    $('input[name=st_max]').val(to);
};
// var search_name = $('#topSearch').val();
// $('#topSearch').blur(function() {
// 	var name = $(this).val();
// 	if(name !=search_name){
// 	  	document.location.href="/mobile/common/searchResult?name="+name+"&type=1";
// 	}
// })
$('#showMap').click(function(){
	document.location.href="/mobile/common/searchMap?<?php echo http_build_query(@$_GET); ?>"
})
$('.empty-bg').click(function(){
	name = $(this).text();
	document.location.href="/mobile/common/searchResult?name="+name+"&type=1";
})
$(window).scroll(function(){
		if( $(this).scrollTop() >3000*index){
			if(index2 == index){
				return false;
			}
			index2 = index;
			$.get('/mobile/common/ajaxSearch?<?php echo http_build_query($_GET).'&index=';?>'+index,function(data){
				if(data.data){
					html = '';
					$.each(data.data,function(k,v){
						html+= '<div class="search-result-content">';
						html+= '<a href="/mobile/common/schoolDetail/'+v.id+'">'
						html+= '<div class="img-area text-center">';
						html+= '<img src="/upload/'+v.imgPath+'">';
						html+= '<div class="pad-5">';
						html+= '<p class="img-title">'+v.name_cn+'</p>';
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