<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Info windows</title>
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
<div id="map"></div>
<script>

  // This example displays a marker at the center of Australia.
  // When the user clicks the marker, an info window opens.

  function initMap() {
    var uluru = {lat: 42.542473, lng: -72.5921587};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: uluru
    });



    var data = [['Rumsey Hall School',41.678232,-73.2957117],['Indian Mountain School',41.936677,-73.4674927],['The Rectory School',41.893041,-71.9646753],['Eaglebrook School',42.542473,-72.5921587],['Hillside School',42.352177,-71.6058647],['The Fessenden School',42.3574934,-71.2205645],['Fay School',42.3037932,-71.5362328],['North Country School',44.224744,-73.8966757],['Cardigan Mountain School',43.6750745,-72.0398196],['Bement School',42.5482827,-72.6039389]];
    for(var i =0; i<data.length;i++){
      var marker = new google.maps.Marker({
        position: {lat: data[i][1], lng: data[i][2]},
        map: map,
        title: data[i][0],
        content:111
      });

    }


  }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDZ46dfZl4risY5T_aoOol-iEB1ConUEc&callback=initMap">
</script>
</body>
</html>