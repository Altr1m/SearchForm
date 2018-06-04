
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


/* CATEGORY MAP MARKERS */
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
            /*for (var i = 0; i < infowindow.length; i++) {
              infowindow[i].close();
            }*/
      
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
              url: 'db/filterdb.php',
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

}

