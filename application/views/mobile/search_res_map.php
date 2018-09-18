<script src='/public/js/mapbox-gl.js'></script>
<link href='/public/css/web/mapbox.css' rel='stylesheet' />
<style type="text/css">
#map {
    position: fixed;
    left: 0;
    top: 0px;
    width: 100%;
	height:800px;
}
.swiper-slide{border-radius:8px;box-shadow:0 1px 5px #cccccc;margin-bottom:1px;margin-left:1px}
.swiper-slide img{border-radius:8px 8px 0px 0px;}
.slider1 img{border-radius:8px}
.btn-goBack{position:fixed;bottom:40px;left:50%;;width:150px;height:40px;line-height:40px;margin-left:-75px;background-color:#fff;border-radius:100px;border:2px solid #5078b5}
</style>

<div id="map">

</div>
<div class="btn-goBack text-center" onclick="history.go(-1);">返回</div>
<script type="text/javascript">
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';

	var zoom = <?=$zoom;?>;
	<?php if(!$lng && !$lat):?>
	var center =  [-85.85, 40];
	var zoom = 3;
	<?php else:?>
	var center = [<?=$lng;?>,<?=$lat;?>];
	<?php endif;?>
	
	//var center =  [-65.017, -16.457];
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
						"name_cn":"<?=$val['name_cn']?>",
						"name_en":"<?=$val['name_en']?>",
		            }
		        },
		        <?php endforeach;?>
		    ]
	};
	
	geojson.features.forEach(function(marker) {
	  // create a DOM element for the marker
	  var el = document.createElement('div');
	//   var html = '22222222';
	//   el.innerHTML =html;
	  el.className = 'marker';
	  el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
	  el.style.width = '30px';
	  el.style.height = '46px';
	  // create the popup
	  var html = '<div class="img-area text-center" onclick="document.location.href=\'/mobile/common/schoolDetail/'+marker.properties.id+'\'">';
		  html +='<img src="'+marker.properties.img_url+'">';
		  html +='<div class="pad-5">';
		  html +='<p class="img-title color1 one-line">'+marker.properties.name_cn+'</p>';
		  html +='<p class="img-des color2 one-line">'+marker.properties.name_en+'</p>';	
		  html +='</div></div>';
	  var popup = new mapboxgl.Popup({offset:[0, -30]})
	      .setHTML(html);
	//   el.addEventListener('click', function() {
	//       window.alert(marker.properties.message);
	//   });
	
	  // add marker to map
	  new mapboxgl.Marker(el, {offset: [30, -30]})
	      .setLngLat(marker.properties.coordinates)
	      .setPopup(popup)
	      .addTo(map);
	});
	<?php endif;?>
</script>
