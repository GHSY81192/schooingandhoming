	<script src='/public/js/mapbox-gl.js'></script>
	<link href='/public/css/web/mapbox.css' rel='stylesheet' />
	<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
	<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
	<link rel="stylesheet" href="/public/css/web/search.css?v=1">
	<script src="/public/js/ion.rangeSlider.js"></script> 
	<link rel="stylesheet" href="/public/jquery-autocomplete/jquery.autocomplete.css">
	<script src="/public/jquery-autocomplete/jquery.autocomplete.min.js"></script>
	<script src="/public/js/suggest.js"></script>
	<div class="row">
		<div class="col-md-7 slider" style="padding-bottom:250px">
			<form class="form-horizontal search-form" role="form">
			  <div class="form-group row">
			      <div class="col-md-11" style="padding-right:30px">
						<input class="form-control searchInput" name="name" type="text" placeholder="<?php echo lang('search_input_placeholder_message') ?>" value="<?=@$ret['name']?>" autocomplete="off"/>
						<img src="/public/images/web/search/1.png" class="ab s-city-icon" id="subBtn">
						<div class="hide" id="tagInput" data-value="2"></div>
				  </div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('home_detail_basic_house_type_message') ?></div>
			    	<div class="col-md-9">
			    		<div class="row search-menu-row">
					    	<div class="cur col-md-4">
					    		<div class="cur form-control chose-tag" data-val="House"><?php echo lang('search_house_type1') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['house_type'], 'House')):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
								<div class="cur form-control chose-tag" data-val="Apartment"><?php echo lang('search_house_type2') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['house_type'], 'Apartment')):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
						  		<div class="cur form-control chose-tag" data-val="Villa"><?php echo lang('search_house_type3') ?></div>
								<img src="/public/images/web/search/<?php if(strstr(@$ret['house_type'], 'Villa')):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<input type="hidden" name="house_type" value="<?=@$ret['house_type'];?>"  />
					  	</div>
				  	</div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_house_race') ?></div>
				    <div class="col-md-9">
			    		<div class="row search-menu-row">	
					    	<div class="cur col-md-4">
					    		<div class="cur form-control chose-tag" data-val="2" ><?php echo lang('search_house_race1') ?></div>
								<img src="/public/images/web/search/<?php if( strstr(@$ret['race'], '2') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
						  		<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_race2') ?></div>
								<img src="/public/images/web/search/<?php if( strstr(@$ret['race'], '1') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-4">
						  		<div class="cur form-control chose-tag" data-val="3"><?php echo lang('search_house_race3') ?></div>
								<img src="/public/images/web/search/<?php if( strstr(@$ret['race'], '3') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<input type="hidden" name="race" value="<?=@$ret['race'];?>" />
					  	</div>
					  </div>
			  </div>
			  <div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('web_search_house_price') ?></div>
			    	<div class="col-md-9" style="padding:0px 30px">
							<input type="text" class="price" />
				  	</div>
				  	<input type="hidden" name="financial_tuition_min" />
				  	<input type="hidden" name="financial_tuition_max" />
			  </div>
			  <div class="form-group text-center showMore">
			    	<img src="/public/images/web/search/8.png" id="showMore" style="width:140px" class="cur" />
			  </div>
			  <div class="hide" id="moreSearch">
			  	  <div class="form-group row">
				    	<div class="col-md-2 search-title"><?php echo lang('search_house_pet') ?></div>
				    	<div class="col-md-9">
				    		<div class="row search-menu-row">
						    	<div class="cur col-md-4">
									<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_pet1') ?></div>
									<img src="/public/images/web/search/<?php if( strstr(@$ret['family_pet'], '1') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<div class="cur col-md-4">
									<div class="cur form-control chose-tag" data-val="0"><?php echo lang('search_house_pet2') ?></div>
									<img src="/public/images/web/search/<?php if( strpos(@$ret['family_pet'], '0') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<input type="hidden" name="family_pet" value="<?=@$ret['family_pet'];?>" />
						  	</div>
						 </div>
				  </div>
				  <div class="form-group row">
				  		<div class="col-md-2 search-title"><?php echo lang('home_detail_member_language_message') ?></div>
				    	<div class="col-md-9">
				    		<div class="row search-menu-row">
						    	<div class="cur col-md-4">
						    		<div class="cur form-control chose-tag" data-val="2"><?php echo lang('search_house_language1') ?></div>
									<img src="/public/images/web/search/<?php if( strstr(@$ret['language'], '2') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
						    	<div class="cur col-md-4">
									<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_language2') ?></div>
									<img src="/public/images/web/search/<?php if( strstr(@$ret['language'], '1') ):?>2<?php else:?>3<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<input type="hidden" name="language" value="<?=@$ret['language'];?>" />
							 </div>
						</div>
			  	</div>
			  	
			  	<div class="form-group row">
			    	<div class="col-md-2 search-title"><?php echo lang('search_house_job') ?></div>
			    	<div class="col-md-9">
			    		<div class="row search-menu-row">
						    <div class="col-md-4">
								<select class="form-control" id="cityChose" name="profession">
									<?php foreach ($profession as $val):?>
									  <option value="<?=$key;?>" <?php if($ret['profession'] == $profession){echo selected;}?>><?=$val;?></option>
									  <?php endforeach;?>
								</select>
							</div>
						</div>
				  	</div>
			  </div>
			  <div class="form-group row" style="padding-bottom:50px">
			    	<div class="col-md-11 text-right">
			    		<input type="hidden" name="city_id" value="<?=$city_id;?>" />
			    		<a class="btn btn-default cancel-btn"><?php echo lang('search_cancel_message') ?></a><a class="btn btn-primary chose-btn"><?php echo lang('search_filter_message') ?></a>
			    	</div>
			  </div>
			  </div>
			</form>
			<div class="search-content pad-top-30">
				<p style="padding-left:10px"><?php if(!lang('is_en')):?> 为您找到<?php echo $count;?>个相关结果<?php else:?>Find <?php echo $count;?> Results<?php endif;?></p>
				<?php if (!empty($data)):?>
				<div id="contentData">
					<?php foreach ( array_chunk($data, 2)  as $arr ):?>
					<div class="row" style="margin-bottom:20px">
						<?php foreach ($arr as $v):?>
						<div class="col-md-6 col-left">
							<div class="img-area rl">
								<a href="/web/homeDetail/<?=$v['id']?>"><img class="school-img" src="/upload/<?php echo get_filepath_by_route_id($v['id'],$v['index_hot_cover'],2); ?>"></a>
								<div class="pad-10 text-center">
									<h4 class="title"><?= @$v['title'];?>, <?= @$v['state_code'];?></h4>
									<!--<p><?php echo empty($v['address'])?'&nbsp;':$v['address'];?></p>-->
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<?php endforeach;?>
				</div>
				<?php else:?>
					<div class="text-center no-res"> 
						<h4><?php echo lang('search_house_title1_message') ?></h4>
						<p><?php echo lang('search_suggest_title2_message') ?></p>
						<div>
							<img src="/public/images/web/search/9.png" usemap="imgmap">
							<map name="imgmap" id="imgmap">
							    <area class="maparea" shape="rect" coords="0,0,153,321" href="/web/search?type=2&name=波士顿" data-name="波士顿"  />
							    <area class="maparea" shape="rect" coords="153,0,303,147" href="/web/search?type=2&name=加利福尼亚" data-name="加利福尼亚" />
							    <area class="maparea" shape="rect" coords="303,0,432,147" href="/web/search?type=2&name=佛罗里达"  data-name="佛罗里达"/>
							    <area class="maparea" shape="rect" coords="432,0,557,147" href="/web/search?type=2&name=俄亥俄" data-name="俄亥俄" />
							    <area class="maparea" shape="rect" coords="557,0,658,147" href="/web/search?type=2&name=西雅图" data-name="西雅图"/>
							    <area class="maparea" shape="rect" coords="153,147,266,321" href="/web/search?type=2&name=华盛顿" data-name="华盛顿" />
							    <area class="maparea" shape="rect" coords="278,147,366,321" href="/web/search?type=2&name=纽约" data-name="纽约" />
							    <area class="maparea" shape="rect" coords="366,147,449,212" href="/web/search?type=2&name=费城" data-name="费城" />
							    <area class="maparea" shape="rect" coords="366,212,499,321" href="/web/search?type=2&name=旧金山" data-name="旧金山"/>
							    <area class="maparea" shape="rect" coords="449,147,635,321" href="/web/search?type=2&name=德克萨斯" data-name="德克萨斯" />
							    <area class="maparea" shape="rect" coords="635,147,747,321" href="/web/search?type=2&name=迈阿密" data-name="迈阿密" />
							</map>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-md-5">
			<div id="map">
				
			</div>
			<script type="text/javascript">
var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cspan id='cnzz_stat_icon_1261250305'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261250305%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
</script>
		</div>
	</div>

<script>
var index =1;
var index2 = 0;
$('.slider').scroll(function(){
	if( $(this).scrollTop() >1500*index){
		if(index2 == index){
			return false;
		}
		index2 = index;
		$.get('/web/ajaxSearchHome?<?php echo http_build_query($_GET).'&index=';?>'+index,function(data){
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
					html+= '<a href="/web/homeDetail/'+v.id+'"><img class="school-img" src="/upload/'+v.imgPath+'"></a>';
					html+= '<div class="pad-10 text-center">';
					html+= '<h4 class="title">'+v.title+','+v.state_code+'</h4>';
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
					properties['name_cn'] = v.location;
					properties['name_en'] = v.address;
	
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
				    // create the popup
				    var html = '<div class="img-area rl">';
				    	html +='<a href="/web/homeDetail/'+marker.properties.id+'"><img src="'+marker.properties.img_url+'"></a>';
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
})


mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';

var zoom = <?=$zoom;?>;
<?php if(!$lng && !$lat):?>
var center =  [-85.85, 40];
var zoom = 3;
<?php else:?>
var center = [<?=$lng;?>,<?=$lat;?>];
<?php endif;?>


var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: center,
    zoom: zoom
});
map.addControl(new mapboxgl.NavigationControl());

<?php if (!empty($data)):?>
var geojson = {
	    "features": [
	        <?php foreach ($data as $val):?>
	        {
	            "properties": {
	                "coordinates": [
						<?=$val['lng']?>,
						<?=$val['lat']?>
					],
					"img_url":"/upload/<?php echo get_filepath_by_route_id($val['id'],$val['index_hot_cover']); ?>",
					"id":"<?=$val['id']?>",
					"title":"<?=@$val['title']?>",
	            }
	        },
	        <?php endforeach;?>
	    ]
};

geojson.features.forEach(function(marker) {
    // create a DOM element for the marker
    var el = document.createElement('div');
//     var html = '22222222';
//     el.innerHTML =html;
    el.className = 'marker';
    el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
    el.style.width = '30px';
    el.style.height = '46px';
    // create the popup
    var html = '<div class="img-area rl">';
    	html +='<a href="/web/homeDetail/'+marker.properties.id+'"><img src="'+marker.properties.img_url+'"></a>';
    	html +='<div class="pad-10" style="padding-top:0px">';
    	html +='<h4 class="title" style="margin-bottom:5px;font-size:14px">'+marker.properties.title+'</h4>';
    	html +='<p style="margin:0px">'+marker.properties.name_en+'</p>';
    	html +='</div></div>';
    var popup = new mapboxgl.Popup({offset:[0, -30]})
        .setHTML(html);
//     el.addEventListener('click', function() {
//         window.alert(marker.properties.message);
//     });

    // add marker to map
    new mapboxgl.Marker(el, {offset: [30, -30]})
        .setLngLat(marker.properties.coordinates)
        .setPopup(popup)
        .addTo(map);
});
<?php endif;?>

var school_type = school_grade = school_price = school_scale = school_num ='';


$(function(){
	$('#showMore').click(function(){
		$('.showMore,.search-content').hide();
		$('#moreSearch').removeClass('hide');
	})
	$('.cancel-btn').click(function(){
		$('.showMore,.search-content').show();
		$('#moreSearch').addClass('hide');
	})
	$('.chose-btn').click(function(){
		$('#subBtn').click();
	})
	$(".price").ionRangeSlider({
		min: 0,
		max: 10000,
		from: <?php echo empty($ret['financial_tuition_min'])?0:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?10000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
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
  	})
  	$('#subBtn').click(function(){
		var data = $('form').serialize();
		location.href="/web/searchHome?"+data;
  	})
  	
})

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
document.onkeydown=function(event){
	var e = event || window.event || arguments.callee.caller.arguments[0];
    if(e && e.keyCode==13){  
       $('#subBtn').click();
    }	             
}
</script>
