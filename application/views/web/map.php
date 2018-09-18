<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.27.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<style>

#marker {
    background-image: url('https://z2.muscache.com/im/pictures/22315dc7-e9a7-4f17-979b-c0d64f1b8cb7.jpg?aki_policy=x_medium');
    background-size: cover;
    width: 225px;
    height: 150px;
    cursor: pointer;
}

.mapboxgl-popup {
    max-width: 200px;
}
    
</style>

<div id='map'></div>

<script>

var geojson = {
	    "type": "FeatureCollection",
	    "features": [
	        {
	            "type": "Feature",
	            "properties": {
	                "message": "Foo",
	                "iconSize": [60, 60]
	            },
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                    -66.324462890625,
	                    -16.024695711685304
	                ]
	            }
	        },
	        {
	            "type": "Feature",
	            "properties": {
	                "message": "Bar",
	                "iconSize": [50, 50]
	            },
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                    -61.2158203125,
	                    -15.97189158092897
	                ]
	            }
	        },
	        {
	            "type": "Feature",
	            "properties": {
	                "message": "Baz",
	                "iconSize": [40, 40]
	            },
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                    -63.29223632812499,
	                    -18.28151823530889
	                ]
	            }
	        }
	    ]
	};
	

mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';

var monument =  [-65.017, -16.457];
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v9',
    center: monument,
    zoom: 4
});

// create the popup
var popup = new mapboxgl.Popup({offset:[0, -30]})
    .setHTML('<a href="http://www.baidu.com">Construction on the Washington Monument began in 1848.</a>');




geojson.features.forEach(function(marker) {
    // create a DOM element for the marker
    var el = document.createElement('div');
    var html = '22222222';
    el.innerHTML =html;
    el.className = 'marker';
    el.style.backgroundImage = 'url(https://placekitten.com/g/' + marker.properties.iconSize.join('/') + '/)';
    el.style.width = marker.properties.iconSize[0] + 'px';
    el.style.height = marker.properties.iconSize[1] + 'px';

//     el.addEventListener('click', function() {
//         window.alert(marker.properties.message);
//     });

    // add marker to map
    new mapboxgl.Marker(el, {offset: [-marker.properties.iconSize[0] / 2, -marker.properties.iconSize[1] / 2]})
        .setLngLat(marker.geometry.coordinates)
        .setPopup(popup)
        .addTo(map);
});
</script>

</body>
</html>