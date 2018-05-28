
  
 var map = L.map( 'map', {    
  center: [30.0, 5.0],
  minZoom: 2,
  maxZoom: 17,     
  zoom: 3,
  disableDefaultUI: false,      
  scrollWheelZoom: false,     
});

L.tileLayer( 'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
/*'http://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/hybrid.day/{z}/{x}/{y}/{size}/{format}&lg={language}'
https://leaflet-extras.github.io/leaflet-providers/preview/*/,
{
    scrollWheelZoom: false,
    disableDefaultUI: false,
	attribution: '&copy; All Rights Reserved</a>',
}).addTo( map );

/*var myURL = jQuery( 'script[src$="map-marker.js"]' ).attr( 'src' ).replace( 'map-marker.js', '' );*/

var mapOptions = {
      center: new google.maps.LatLng(48.099200,11.523938),
      zoom: 5,
      /*mapTypeId: 'satellite',*/
      /*mapTypeId: google.maps.MapTypeId.ROADMAP*/
      /*mapTypeId: google.maps.MapTypeId.SATELLITE*/
      /*mapTypeId: google.maps.MapTypeId.HYBRID*/   
      /*mapTypeId: google.maps.MapTypeId.TERRAIN*/   
      mapTypeId: google.maps.MapTypeId.HYBRID,
      scrollwheel: false,
      disableDefaultUI: false,
      featureType: "poi.business",
      stylers: [{ visibility: "off" }], 
   };

var myIcon = L.icon({
  iconUrl:'http://pro-group.ch/map-icon2.png',
  iconRetinaUrl: 'http://pro-group.ch/map-icon2.png',    
  iconSize: [30, 35],
  iconAnchor: [9, 21],
  popupAnchor: [0, -14]
});

var markerClusters = L.markerClusterGroup();
 
for ( var i = 0; i < markers.length; ++i )
{
  var popup = '<br/><b>Name:' + markers[i].name + '</b>' +            
              '<br/><b>Email:</b> ' + markers[i].address +
              '<br/><b>ID:</b> ' + markers[i].id +
              '<br/><b><a href="" style="    color:#bbbbbb;text-decoration:none;">View Profile</a></b>';
             /* '<br/><b>Altitude:</b> ' + Math.round( markers[i].alt * 0.3048 ) + ' m' +
              '<br/><b>Timezone:</b> ' + markers[i].tz;*/

var m = L.marker( [markers[i].lat, markers[i].lng], {icon: myIcon} )
                  .bindPopup( popup );
  markerClusters.addLayer( m );
}

map.addLayer( markerClusters );  


	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;
			showMap(lat, lon);
		});
	} else {
		document.write('Your browser does not support GeoLocation :(');
	}

function showMap(lat, lon) {
  var myLatLng = new google.maps.LatLng(lat, lon);
  /*var mapOptions = {
    zoom: 8,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };*/
  map = document.getElementById('map');
  var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: "http://pro-group.ch/map-icon2.png",
      title: 'Approx. Location. Range=500m',
      content: "Approx. Location. Range=500m"
  });
    var infowindow = new google.maps.InfoWindow({
                    content: "Approx. Location. Range=500m"
                });
				google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(marker.get('map'), marker);
                });
}
map.addLayer( map ); 