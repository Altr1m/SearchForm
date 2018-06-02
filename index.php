<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Search Map</title>

 <?php require('db/readdb.php'); ?>

  </head>
  <body style="margin:0px; padding:0px;">


<form class="searchform" name="searchbox" action="" target="" method="post">
    <img src="images/searchicon.png"/><br>
    <input type="text" autocomplete="off" placeholder="Ort, Addresse oder Postleitzahl eingeben..." name="mapinput" id="pac-input" />
    <input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
    <select id="distance" hidden>
      <option value="0">select distance</option>
      <option value="10">10 km</option>
      <option value="20">20 km</option>
      <option value="40">40 km</option>
      <option value="60">60 km</option>
      <option value="80">80 km</option>
      <option value="100" selected>100 km</option>
    </select>
    <input type="hidden" name="latitude" id="latitude" />
    <input type="hidden" name="longitude" id="longitude" />
</form>

  <section class="inmap" id="inmap" style="display:none;">     
        <div class="leftmapinfo">
          <ul class="leftinfolist">
          <?php foreach (json_decode($docs) as $key=>$dok) { ?>
          <button class="collapsible" onclick="myFunction()">
               <img src="images/<?php echo $dok->logo; ?>"/>
               <h3><?php echo $dok->name; ?>
              </h3>             
          </button>
           <div class="content">
              <li id="" class="dokimage">
								<img src="images/<?php echo $dok->image; ?>" /><br><br>
                <span class="copy-text"><?php echo $dok->description; ?></span><br><br>
                <span class="copy-text"><?php echo $dok->address; ?></span><br><br>
                <span class="copy-text">Tel: <?php echo $dok->tel; ?></span><br><br>
                <a href="mailto:<?php echo $dok->email; ?>"><i class="fas fa-envelope-square"></i></a>&nbsp;&nbsp;
                <a href="<?php echo $dok->website; ?>" target="_blank" ><i class="fas fa-globe"></i></a>
                <a href="https://www.google.com/maps/?q=<?php echo $dok->lat; ?>,<?php echo $dok->lng; ?>" target="_blank" class="mapdirection"><i class="fas fa-map-marker-alt"></i></a><br><br>
                <button class="closetab" onclick="myFunction()"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
							</li>
            </div>
              <?php } ?>
          </ul>
          </div>
          <div class="rightmapinfo" id="map"></div>
   </section>
<script>
var btnact = "";
function myFunction() {
/* DEACTIVATE ACTVIE CLASS */
var conte = document.getElementsByClassName("content");
btnact = document.getElementsByClassName("collapsible");
for (var i = 0; i < conte.length; i++) {
  conte[i].style.display = 'none';
  btnact[i].className = btnact[i].className.replace(" active", "");
}
activateTab();
/* END DEACTIVATE ACTVIE CLASS */
}

function activateTab() {
/* ACTIVATE CURRENT CLASS */
for (var i = 0; i < btnact.length; i++) {
  btnact[i].addEventListener("click", function() { 
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
}
/* END ACTIVATE CURRENT CLASS */
}
</script> 
<!-- CATEGORY MAP MARKERS -->
<script type="text/javascript">

 function initMap() {
  var map = createMap(53.594780, 9.884969);

  /* AUTO COMPLETE SEARCH */ 
  var input = document.getElementById('pac-input');
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);
   /* END AUTOCOMPLETE SEARCH */ 

  google.maps.event.addListener(autocomplete, 'place_changed', function () {
      showResults(autocomplete);

  });

    $( "#distance" ).change(function() {
      showResults(autocomplete);
    });

}

function createMap(lat, lng) {
  var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(lat, lng),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles:  [
  {
    "elementType": "geometry.fill",
    "stylers": [
      {
        "saturation": -70
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#93b8ca"
      }
    ]
  }
]
    });
   

  return map;
}

function createMarker(map, data) {
    var infowindow = new google.maps.InfoWindow();
    var marker, i;

     marker = new google.maps.Marker({
          position: new google.maps.LatLng(data.lat, data.lng),
          icon: 'images/'+data.mapicon,
          map: map
        });


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            for (var i = 0; i < infowindow.length; i++) {
              infowindow[i].close();
            }
            infowindow.setContent(data.name + '<br><br>' + '<b>Address:</b><br>' + data.address);
            infowindow.open(map, marker);
          }
        })(marker, i));


}


function showResults(autocomplete) {

    var showmap = document.getElementById("inmap"); 
    var place = autocomplete.getPlace(); 
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
    document.getElementById("latitude").value = lat;
    document.getElementById("longitude").value = lng;
    dst = document.getElementById("distance").value;
    dstToKm = dst / 1.62137119224; //convert km to miles
    showmap.style.display = "block";

    if((document.getElementById("latitude").value != '') && (document.getElementById("longitude").value != '')) {
      $.ajax({
              type: 'POST',
              data: { latitude: lat,
                      longitude: lng,
                      distance: dstToKm,
                  },
              url: 'read.php',
              dataType: 'json',
              success: function(result){
                    
                    var map = createMap(lat, lng);

                    $( ".collapsible" ).remove();
                    $( ".content" ).remove();

                    if(result.length > 0) {
                        $.each(result, function(i, item) {
                          /*var html ='<button class="collapsible" data-toggle="collapse" data-target="#collapse'+item.id+'" onclick="myFunction()"><img src="images/'+ item.logo +'"/><h3>'+ item.name +'</h3></button><div class="content" id="collapse'+item.id+'"><li class="dokimage"><img src="images/'+ item.image +'" /><br><br><span class="copy-text">'+ item.description +'</span><br><br><span class="copy-text">'+ item.address +'</span><br><br><span class="copy-text">Tel: '+ item.tel +'</span></li></div>';*/
                          var html = '<button class="collapsible" onclick="myFunction()"><img src="images/'+ item.logo +'"/><h3>'+ item.name +'</h3></button> <div class="content"><li class="dokimage"><img src="images/'+ item.image +'" /><br><br><span class="copy-text">'+ item.description +'</span><br><br><span class="copy-text">'+ item.address +'</span><br><br><span class="copy-text">Tel: '+ item.tel +'</span><br><br><a href="mailto:'+ item.email +'"><i class="fas fa-envelope-square"></i></a>&nbsp;&nbsp;<a href="'+ item.website +'" target="_blank"><i class="fas fa-globe"></i></a> <a href="https://www.google.com/maps/?q='+ item.lat +','+ item.lng +'" target="_blank" class="mapdirection"><i class="fas fa-map-marker-alt"></i></a><br><br> <button class="closetab" onclick="myFunction()"><i class="fa fa-chevron-up" aria-hidden="true"></i></button></li></div>';
                          $( ".leftinfolist" ).append( html );
                          createMarker(map, item);
                        });

                    } else {
                      var html ='<button class="collapsible"><h3>No results found</h3></button>';

                        $( ".leftinfolist" ).append( html );
                    }
              },

              error: function(){
                  //window.alert("Wrong");
                  console.log("Wrong");
              }
            });
    }

    /* SHOW MAP AFTER SELECTING ADDRESS */
/*var btnact = document.getElementById("inmap");
if (btnact.style.display === "none") {
  btnact.style.display = "inline-block";
}*/
/* END SHOW MAP AFTER SELECTING ADDRESS */
}

</script>
<!-- END CATEGORY MAP MARKERS -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZnzboD5iPcg-PNQtY4vmWlQZ-9oCCTXc&libraries=places&style=element:geometry.fill%7Csaturation:-70&style=feature:water%7Celement:geometry.fill%7Ccolor:0x93b8ca&callback=initMap"></script>
    
  </body>
</html>
