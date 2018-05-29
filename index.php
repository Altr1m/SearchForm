<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.css' rel='stylesheet' />
    <title>Test</title>

 <?php require('db/readdb.php'); ?>

  </head>
  <body style="margin:0px; padding:0px;">

<label>Search:</label><br>
<form name="searchbox" action="/" target="" method="post">
    <input type="text" autocomplete="off" placeholder="Search..." name="mapinput" id="pac-input" />
    <input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
    
</form>

  <section class="inmap" id="inmap" >
        
          <div class="leftmapinfo">
          <ul class="leftinfolist">
          <?php foreach (json_decode($docs) as $key=>$dok) { ?>
          <button class="collapsible" onclick="myFunction()">
               <img src="images/<?php echo $dok->logo; ?>"/>
               <h3><?php echo $dok->name; ?></h3>
          </button>
             <div class="content">
              <li id="" class="dokimage">
								<img src="images/<?php echo $dok->image; ?>"></img><br><br>
                <span class="copy-text"><?php echo $dok->description; ?></span><br><br>
                <span class="copy-text"><?php echo $dok->address; ?></span><br><br>
                <span class="copy-text">Tel: <?php echo $dok->tel; ?></span><br><br>
                <a href="mailto:<?php echo $dok->email; ?>" style="color: #1a75ac;"><i class="fas fa-envelope-square" style="font-size: 25px;"></i></a>&nbsp;
                <a href="mailto:<?php echo $dok->website; ?>" style="color: #1a75ac;"><i class="fas fa-globe" style="font-size: 25px;"></i></a>
							</li>
              </div>
              <?php } ?>		   
          </ul>



          </div>

          <div class="rightmapinfo" id="map"></div>
   </section>

<script>
function myFunction() {
var conte = document.getElementsByClassName("content");
var btnact = document.getElementsByClassName("collapsible");
for (var i = 0; i < conte.length; i++) {
  conte[i].style.display = 'none';
  btnact[i].className = btnact[i].className.replace(" active", "");
}
}
</script>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}
</script>
<!-- CATEGORY MAP MARKERS -->
<script type="text/javascript">
 function initMap() {

    var markersData = <?php echo $docs; ?>;
    console.log(markersData);

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(53.594780, 9.884969),
      container: 'map',
      style: 'mapbox://styles/mapbox/basic-v9',
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });


        /*var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          parking: {
            icon: iconBase + 'parking_lot_maps.png'
          },
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };     
        var features = [
          {
            position: new google.maps.LatLng(53.594780, 9.884969),
            type: 'parking'
          }];*/


    var infowindow = new google.maps.InfoWindow();
    var marker, i;

  for (var i = 0; i < markersData.length; i++){
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(markersData[i].lat, markersData[i].lng),
        icon: 'images/'+markersData[i].mapicon,
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(markersData[i].name);
          infowindow.open(map, marker);
        }
      })(marker, i));
  }
  /* AUTO COMPLETE */ 
   var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
   /* END AUTOCOMPLETE  */      
}
</script>
<!--<script type="text/javascript" src="map-marker.js"></script>-->
<!-- END CATEGORY MAP MARKERS -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZnzboD5iPcg-PNQtY4vmWlQZ-9oCCTXc&libraries=places&callback=initMap"></script>
  </body>
</html>
