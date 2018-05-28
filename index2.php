<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Creating a Store Locator on Google Maps</title>
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
      width:100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
 </style>

 <?php require('db/readdb.php'); ?>

  </head>
  <body style="margin:0px; padding:0px;">
  <label>Search</label>
  <input type="text" placeholder="Write address..."/>

    <div id="map" style="width:300px; height:300px;"></div>

    <?php var_dump(json_encode($docs, JSON_FORCE_OBJECT)) ?>
<!-- CATEGORY MAP MARKERS -->
<script type="text/javascript"> 
 function initMap() { 
    var markers = [];
    var markersData = JSON.parse(<?php print_r(json_encode($docs, JSON_FORCE_OBJECT)); ?>);
  for (var i = 0; i < markersData.length; i++){
    var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var name = markersData[i].name;
      var address = markersData[i].address;  
      userid = markersData[i].id;   
      phone = markersData[i].type;  
    /*console.log(markersData);*/
  var marker = new google.maps.Marker({
       position: new google.maps.LatLng(latlng[3], latlng[4]),
       setMap: map,
  }); 
      var markerc = new google.maps.Marker(
        {  
         "userid": markersData[i].id,     
         "name": markersData[i].name,
         "address": markersData[i].address,
         "type": markersData[i].type,
         "lat": markersData[i].lat,
         "lng": markersData[i].lng     
        });
        markers.push(markerc);  
}
}
</script>
<!--<script type="text/javascript" src="map-marker.js"></script> -->
<!-- END CATEGORY MAP MARKERS -->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9ZRlVlsODKlPKvWz5Bv0Y8b4gsmY3qZw&libraries=places&callback=initMap"></script>
  </body>
</html>