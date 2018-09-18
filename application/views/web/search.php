<!--	<script src='/public/js/mapbox-gl.js'></script>-->
<!--	<link href='/public/css/web/mapbox.css' rel='stylesheet' />-->
<!--	<link rel="stylesheet" href="/public/css/z-mapbox.css">-->
	<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
	<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
	<link rel="stylesheet" href="/public/css/web/search.css?v=1">
	<script src="/public/js/ion.rangeSlider.js"></script> 
	<link rel="stylesheet" href="/public/jquery-autocomplete/jquery.autocomplete.css">
	<script src="/public/jquery-autocomplete/jquery.autocomplete.min.js"></script>
	<script src="/public/js/suggest.js"></script>

	<div class="row">
		<div class="col-md-7 slider" style="padding-bottom:250px">
			<form id="DataForm" class="form-horizontal search-form" role="form">
			  <div class="form-group row">
			      <div class="col-md-11" style="padding-right:30px">
						<input class="form-control searchInput" name="name" type="text" placeholder="<?php echo lang('search_input_placeholder_message') ?>" value="<?=@$ret['name']?>" autocomplete="off"/>
						<img src="/public/images/web/search/1.png" class="ab s-city-icon" id="subBtn">
						<div class="hide" id="tagInput" data-value="1"></div>
				  </div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_school_type_message') ?></div>
			    	<div class="col-md-9">
			    		<div class="row">
					    	<div class="cur col-md-4">
					    		<div class="form-control chose-tag" data-val="1"><?php echo lang('search_school_type1_message') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['basic_school_type'], '1')):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
								<div class="form-control chose-tag" data-val="2"><?php echo lang('search_school_type2_message') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['basic_school_type'], '2')):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
						  		<div class="form-control chose-tag" data-val="3"><?php echo lang('search_school_type3_message') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['basic_school_type'], '3')):?>2<?php else:?>3<?php endif;?>.png".png" class="ab s-school-show-icon">
						  	</div>
						  	<input type="hidden" name="basic_school_type" value="<?=@$ret['basic_school_type'];?>"  />
					  	</div>
				  	</div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_school_level_message') ?></div>
				    <div class="col-md-9">
			    		<div class="row">	
			    			<?php foreach ($grade as $v):?>
					    	<div class="cur col-md-4" style="margin-bottom:10px">
					    		<?php 
					    			$s=preg_match_all('/\d+/',$v['remark'],$arr);
					    			$result=@$arr[0][0].'-'.@$arr[0][1];
					    		?>
					    		<div class="form-control chose-tag" data-val="<?=$result?>" ><?php echo !lang('is_en')?$v['remark']:$v['remark_en']; ?></div>
								<img src="/public/images/web/search/<?php if( strstr(@$ret['basic_grade'], $result) ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<?php endforeach;?>
						  	<input type="hidden" name="basic_grade" value="<?=@$ret['basic_grade'];?>" />
					  	</div>
					  </div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_money_message') ?></div>
			    	<div class="col-md-9" style="padding:0px 30px">
							<input type="text" class="price" />
				  	</div>
				  	<input type="hidden" name="financial_tuition_min" value="<?=@$ret['financial_tuition_min'];?>" />
				  	<input type="hidden" name="financial_tuition_max" value="<?=@$ret['financial_tuition_max'];?>" />
			  </div>
			  <div class="form-group text-center showMore">
			  		<a id="showMore" class="cur img-href" style="background-color:#5377ac;font-weight:bold"><?php echo lang('search_more_btn'); ?></a>
			  </div>
			  <div class="hide" id="moreSearch">
			  	  <div class="form-group row">
				    	<div class="col-md-2 search-title"><?php echo lang('search_address_message') ?></div>
				    	<div class="col-md-9">
				    		<div class="row">
						    	<div class="col-md-4">
									<select class="form-control" id="cityChose">
										<?php if(empty($ret['state'])):?>
									  	<option value="0"><?php echo lang('search_address_message1') ?></option>
									  	<?php endif;?>
										<?php foreach ($stateList as $v):?>
										<option value="<?=$v['id']?>"  <?php echo $v['id'] == @$ret['state'] ?'selected':'';?>><?php echo !lang('is_en') ?$v['name_cn']:$v['name_en'];?></option>
										<?php endforeach;?>
									</select>
							  	</div>
							  	<div class="col-md-4">
									<select class="form-control" name="city" id="cityData">
										<?php if(empty($ret['city_name'])):?>
										<option value="0"><?php echo lang('search_address_message2') ?></option>
										<?php else:?>
										<option value="<?=@$ret['city_id'];?>"><?=$ret['city_name'];?></option>
										<?php endif;?>
									</select>
							  	</div>
						  	</div>
						 </div>
				  </div>
			  	<div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_peoper_count_message') ?></div>
			    	<div class="col-md-9" style="padding:0px 30px">
							<input type="text" class="num" />
				  	</div>
				  	<input type="hidden" name="basic_school_enrollments_min" value="<?=@$ret['basic_school_enrollments_min'];?>" />
				  	<input type="hidden" name="basic_school_enrollments_max" value="<?=@$ret['basic_school_enrollments_max'];?>" />
			  </div>
			  <div class="form-group row">
			  		<div class="col-md-2 search-title"><?php echo lang('school_detail_ap_message') ?></div>
			    	<div class="col-md-9">
			    		<div class="row">
			    			<?php foreach ($apList as $item):?>
			    			<?php $ap=','.$item['id'].',';?>
					    	<div class="cur col-md-4" style="margin-bottom:10px">
					    		<div class="cur form-control chose-tag one-line" data-val="<?=$item['id']?>" title="<?php echo str_replace('AP ', '', $item['name']);?>"><?php echo str_replace('AP ', '', $item['name']);?></div>
								<img src="/public/images/web/search/<?php  if(strstr(@$ret['ap'].',', $ap)):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<?php endforeach;?>
						  	<input type="hidden" name="ap" value="<?=@$ret['ap'];?>" />
						 </div>
					</div>
		  	 </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('school_detail_apply_sat_avg_message') ?></div>
			    	<div class="col-md-9" style="padding:0px 30px">
							<input type="text" class="num2" />
				  	</div>
				  	<input type="hidden" name="st_min" value="<?=@$ret['st_min'];?>" />
				  	<input type="hidden" name="st_max" value="<?=@$ret['st_max'];?>"  />
			  </div>
			  <div class="form-group row" style="padding-bottom:50px">
			    	<div class="col-md-11 text-right">
			    		<a class="btn btn-default cancel-btn"><?php echo lang('search_cancel_message') ?></a><a class="btn btn-primary chose-btn"><?php echo lang('search_filter_message') ?></a>
			    	</div>
			    	<input name="state" value="<?=@$ret['state'];?>" type="hidden" />
			    	<input name="city_id" value="<?=@$ret['city_id'];?>" type="hidden" />
			  </div>
			  </div>
			</form>
			<div class="search-content pad-top-30">
				<p style="padding-left:10px"><?php if(!lang('is_en')):?> 为您找到<?php echo @$count;?>个相关结果<?php else:?>Find <?php echo count($data);?> Results<?php endif;?></p>
				<?php if (!empty($data)):?>
				<div id="contentData">
					<?php foreach ( array_chunk($data, 2)  as $arr ):?>
					<div class="row" style="margin-bottom:20px">
						<?php foreach ($arr as $v):?>
						<div class="col-md-6 col-left">
							<div class="img-area rl">
								<a href="/web/schoolDetail/<?=$v['id']?>"><img class="school-img" src="/upload/<?php echo get_filepath_by_route_id($v['id'],$v['index_hot_cover']); ?>"></a>
								<div class="pad-10 text-center">
									<h4 class="title"><?php echo !lang('is_en')?($v['name_cn']?$v['name_cn']:$v['name_en']):$v['name_en'];?><?php echo !empty($v['state_code']) ? ', '.$v['state_code'] : '' ?></h4>
									<!--<p><?=$v['name_en']?></p>-->
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				<?php endforeach;?>
				</div>
				<?php else:?>
					<div class="text-center no-res"> 
						<h4><?php echo lang('search_suggest_title1_message') ?></h4>
						<p><?php echo lang('search_suggest_title2_message') ?></p>
						<div>
							<img src="/public/images/web/search/9.png" usemap="imgmap">
							<map name="imgmap" id="imgmap">
							    <area class="maparea" shape="rect" coords="0,0,153,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr1_message') ?>" data-name="<?php echo lang('search_suggest_addr1_message') ?>"  />
							    <area class="maparea" shape="rect" coords="153,0,303,147" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr2_message') ?>" data-name="<?php echo lang('search_suggest_addr2_message') ?>" />
							    <area class="maparea" shape="rect" coords="303,0,432,147" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr3_message') ?>"  data-name="<?php echo lang('search_suggest_addr3_message') ?>"/>
							    <area class="maparea" shape="rect" coords="432,0,557,147" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr4_message') ?>" data-name="<?php echo lang('search_suggest_addr4_message') ?>" />
							    <area class="maparea" shape="rect" coords="557,0,658,147" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr5_message') ?>" data-name="<?php echo lang('search_suggest_addr5_message') ?>"/>
							    <area class="maparea" shape="rect" coords="153,147,266,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr6_message') ?>" data-name="<?php echo lang('search_suggest_addr6_message') ?>" />
							    <area class="maparea" shape="rect" coords="278,147,366,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr7_message') ?>" data-name="<?php echo lang('search_suggest_addr7_message') ?>" />
							    <area class="maparea" shape="rect" coords="366,147,449,212" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr8_message') ?>" data-name="<?php echo lang('search_suggest_addr8_message') ?>" />
							    <area class="maparea" shape="rect" coords="366,212,499,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr9_message') ?>" data-name="<?php echo lang('search_suggest_addr9_message') ?>"/>
							    <area class="maparea" shape="rect" coords="449,147,635,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr10_message') ?>" data-name="<?php echo lang('search_suggest_addr10_message') ?>" />
							    <area class="maparea" shape="rect" coords="635,147,747,321" href="/web/search?type=2&name=<?php echo lang('search_suggest_addr11_message') ?>" data-name="<?php echo lang('search_suggest_addr11_message') ?>" />
							</map>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-md-5" style="padding: 0">
			<div id="map" style="width: 100%;top: 14px;">
				
			</div>

		</div>
	</div>

<script>
var school_type = school_grade = school_price = school_scale = school_num ='';
var showControl = false;
var index =1;
var index2 = 0;
$(function(){
	var W_H = window.innerHeight - 102;
	$('#map').css('height',W_H+'px');

	$('#showMore').click(function(){
		showControl = true;
		$('.showMore,.search-content').hide();
		$('#moreSearch').removeClass('hide');
	  	$(".num").ionRangeSlider({
	  		min: 0,
			max: 2000,
			from:<?php echo empty($ret['basic_school_enrollments_min'])?0:$ret['basic_school_enrollments_min']?>,
			to: <?php echo empty($ret['basic_school_enrollments_max'])?2000:$ret['basic_school_enrollments_max']?>,
			type: 'double',//设置类型
			step: 1,
			postfix: "<?php echo !lang('is_en')?"/人":"/Person" ?>",
			grid: true,
		    onChange: saveResult2,
		    onFinish: saveResult2
		});
		$(".num2").ionRangeSlider({
	  		min: 0,
			max: 1600,
			from:<?php echo empty($ret['st_min'])?0:$ret['st_min']?>,
			to: <?php echo empty($ret['st_max'])?1600:$ret['st_max']?>,
			type: 'double',//设置类型
			step: 1,
			postfix: "<?php echo !lang('is_en')?"/分":"/Score" ?>",
			grid: true,
		    onChange: saveResult3,
		    onFinish: saveResult3
		});
	})
	$('.cancel-btn').click(function(){
		showControl = false;
		$('.showMore,.search-content').show();
		$('#moreSearch').addClass('hide');
	})
	$('.chose-btn').click(function(){
		$('#subBtn').click();
	})
	$(".price").ionRangeSlider({
		min: 0,
		max: 80000,
		from: <?php echo empty($ret['financial_tuition_min'])?0:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?80000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		postfix: "<?php echo !lang('is_en')?"/年":"/Year" ?>",
		grid: true,
	    onChange: saveResult,
	    onFinish: saveResult
	});
	$('.chose-tag').click(function(){
		var data_val = $(this).parent().parent().find('input[type=hidden]').val();

		if(	$(this).next('img').attr("src") == "/public/images/web/search/3.png" ){
	  		add_val = $(this).attr('data-val');
	  		if(data_val.indexOf(add_val) <0){
	  			data_val += ','+add_val;
	  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
	  		}
	  		$(this).next('img').attr("src","/public/images/web/search/2.png");
		}else{
			$(this).next('img').attr("src","/public/images/web/search/3.png");
			del_val = $(this).attr('data-val');
			if(data_val.indexOf(del_val) >=0){	//有就去掉
	  			data_val = data_val.replace(','+del_val,'');
	  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
	  		}

		}
		if(!showControl){	//没有显示更多时点击后直接提交
  			$('#subBtn').click();
	  	}
  	})
  	$('#subBtn').click(function(){
		var data = $('#DataForm').serialize();
		location.href="/web/search?"+data;
  	})


  	$('#cityChose').change(function(){
		var id = $(this).val();
		$('input[name=state]').val(id);
		$('input[name=city_id]').val('');
		ajaxGetCity(id,'');
  	})

  	function ajaxGetCity(id,city_id){
		$.post('/ajax/get_city_list/'+id,{},function(data){
			if(data.length){
				html2 = '';
				if(!city_id){
					html2 = '<option value="0">请选择城市</option>';
				}
				$.each(data,function(k,v){
					if(city_id && city_id == v.id){
						html2 += '<option selected value="'+v.name_cn+'" data-id="'+v.id+'">'+v.name_cn+'</option>';
					}else{
						html2 += '<option value="'+v.name_cn+'" data-id="'+v.id+'">'+v.name_cn+'</option>';
					}
				})
				$('select[name=city]').html(html2);
			}
		},'json')
	}
  	$('#cityData').change(function(){
		var city_id = $(this).find(" option:selected").attr('data-id');
		$('input[name=city_id]').val(city_id);
  	})
  	<?php if($ret['state'] && $ret['city_id']):?>
  	ajaxGetCity(<?php echo $ret['state'];?>,<?php echo $ret['city_id']?>);
  	<?php endif;?>

	$('.slider').scroll(function(){
		var S = $(this).scrollTop();
		if( S > 2800*index ){
			if(index2 == index){
				return false;
			}
			index2 = index;
			$.get('/web/ajaxSearch?<?php echo http_build_query($_GET).'&index=';?>'+index,function(data){
				if(data.data){
					html = '';
					var geojson = {};
					var features = new Array();
					$.each(data.data,function(k,v){
						if(k%2==0){
							html+= '<div class="row" style="margin-bottom:20px">';
						}
						html+= '<div class="col-md-6 col-left">';
						html+= '<div class="img-area rl">';
						html+= '<a href="/web/schoolDetail/'+v.id+'"><img class="school-img" src="/upload/'+v.imgPath+'"></a>';
						html+= '<div class="pad-10 text-center">';
						if(v.name_cn != 'null'){
							html+= '<h4 class="title">'+v.name_en+','+v.state_code+'</h4>';
						}else{
							html+= '<h4 class="title">'+v.name_cn+','+v.state_code+'</h4>';
						}

						html+= '</div>';
						html+= '</div></div>';
						if(k%2!=0){
						   html+= '</div>';
						}

						properties_name = {};
						properties = {};
						properties['coordinates'] = [v.lng,v.lat];
						properties['img_url'] = '/upload/'+v.imgPath;
						properties['id'] = v.id;
						properties['name_cn'] = v.name_cn;
						properties['name_en'] = v.name_en;
						properties_name['properties'] = properties;
						features.push(properties_name);
					})
					$('#contentData').append(html);
					index++;
					//异步加载画地图
					geojson['features'] = features;
					geojson.features.forEach(function(marker) {
					    var el = document.createElement('div');
					    el.className = 'marker';
					    el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
					    el.style.width = '30px';
					    el.style.height = '46px';
					    var html = '<div class="img-area rl">';
					    	html +='<a href="/web/schoolDetail/'+marker.properties.id+'"><img src="'+marker.properties.img_url+'"></a>';
					    	html +='<div class="pad-10" style="padding-top:0px">';
					    	html +='<h4 class="title" style="margin-bottom:5px;font-size:14px">'+marker.properties.name_cn+'</h4>';
					    	html +='<p style="margin:0px">'+marker.properties.name_en+'</p>';
					    	html +='</div></div>';
					    var popup = new mapboxgl.Popup({offset:[0, -30]})
					        .setHTML(html);
					    new mapboxgl.Marker(el, {offset: [30, -30]})
					        .setLngLat(marker.properties.coordinates)
					        .setPopup(popup)
					        .addTo(map);
					});
				}
			},'json')
		}
	});

// 	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';
//
//	<?php //if($ret['state']):?>
//	var zoom = 6;
//	<?php //else:?>
//	var zoom = 12;
//	<?php //endif;?>
<!---->
<!--	--><?php //if(!$lng && !$lat):?>
//	var center =  [-85.85, 40];
//	var zoom = 3;
//	<?php //else:?>
//	var center = [<?//=$lng;?>//,<?//=$lat;?>//];
//	<?php //endif;?>
//
//
//
//	var map = new mapboxgl.Map({
//	    container: 'map',
//	    style: 'mapbox://styles/mapbox/streets-v9',
//	    center: center,
//	    zoom: zoom
//	});
//	map.addControl(new mapboxgl.NavigationControl());
//
//
//	<?php //if (!empty($data)):?>
//	var geojson = {
//		    "features": [
//		        <?php //foreach ($data as $val):?>
//		        {
//		            "properties": {
//		                "coordinates": [
//							<?//=$val['lng']?>//,
//							<?//=$val['lat']?>
//						],
//						"img_url":"/upload/<?php //echo get_filepath_by_route_id($val['id'],$val['index_hot_cover']); ?>//",
//						"id":"<?//=$val['id']?>//",
//						"name_cn":"<?//=$val['name_cn']?>//",
//						"name_en":"<?//=$val['name_en']?>//",
//		            }
//		        },
//		        <?php //endforeach;?>
//		    ]
//	};
//
//	geojson.features.forEach(function(marker) {
//	    // create a DOM element for the marker
//	    var el = document.createElement('div');
//	    el.className = 'marker';
//	    el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
//		el.style.width =  '50px';
//		el.style.height = '50px';
//	    // create the popup
//	    var html = '<div class="img-area rl">';
//	    	html +='<a href="/web/schoolDetail/'+marker.properties.id+'"><img src="'+marker.properties.img_url+'"></a>';
//	    	html +='<div class="pad-10" style="padding-top:0px">';
//	    	html +='<h4 class="title" style="margin-bottom:5px;font-size:14px">'+marker.properties.name_cn+'</h4>';
//	    	html +='<p style="margin:0px">'+marker.properties.name_en+'</p>';
//	    	html +='</div></div>';
//	    var popup = new mapboxgl.Popup({offset:[0, -30]})
//	        .setHTML(html);
//		new mapboxgl.Marker(el, {offset: [-50 / 2, -50 /1.2]})
//	        .setLngLat(marker.properties.coordinates)
//	        .setPopup(popup)
//	        .addTo(map);
//	});
//	<?php //endif;?>

});

function initMap() {
	var myLatLng = {lat: 35, lng: -95.85};
	var data = [];
	var is_open = false;
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: myLatLng
	});
	<?php if (!empty($data)):?>
		<?php foreach($data as $k => $v):?>
			data[<?=$k?>] = {lat:<?=$v['lat']?>,lng:<?=$v['lng']?>};

			var contentString = '<div id="content">'+
				'<a href="/web/schoolDetail/<?=$v['id']?>">'+
				'<h3 id="firstHeading" class="firstHeading" style="margin: 5px 0"><?=$v['name_cn']?></h3>'+
				'</a>'+
				'<div id="bodyContent">'+
				'<a href="/web/schoolDetail/<?=$v['id']?>">'+
				'<p style="margin: 0"><?=$v['name_en']?></p>'+
				'</a>'+
				'</div>'+
				'</div>';

			var infowindow<?=$k?> = new google.maps.InfoWindow({
				content: contentString
			});

			var marker<?=$k?> = new google.maps.Marker({
				position: data[<?=$k?>],
				map: map,
				title: '<?=$v['name_cn']?>'
			});

			marker<?=$k?>.addListener('click', function() {
				if(is_open){
					is_open.close();
				}
				infowindow<?=$k?>.open(map, marker<?=$k?>);
				is_open = infowindow<?=$k?>;
			});
		<?php endforeach;?>

	<?php endif;?>


}

var saveResult = function (data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=financial_tuition_min]').val(from);
    $('input[name=financial_tuition_max]').val(to);
};
var saveResult2 = function (data) {
    from2 = data.fromNumber;
    to2 = data.toNumber;
    $('input[name=basic_school_enrollments_min]').val(from2);
    $('input[name=basic_school_enrollments_max]').val(to2);
};
var saveResult3 = function (data) {
    from3 = data.fromNumber;
    to3 = data.toNumber;
    $('input[name=st_min]').val(from3);
    $('input[name=st_max]').val(to3);
};
document.onkeydown=function(event){
	var e = event || window.event || arguments.callee.caller.arguments[0];
    if(e && e.keyCode==13){
       $('#subBtn').click();
    }
}


</script>
<script async defer
		src="http://maps.google.cn/maps/api/js?key=AIzaSyBDZ46dfZl4risY5T_aoOol-iEB1ConUEc&callback=initMap">
</script>
<script type="text/javascript">
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cspan id='cnzz_stat_icon_1261250305'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261250305%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
</script>