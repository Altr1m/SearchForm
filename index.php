<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Google Maps</title>
  </head>
<body>
<label>Search:</label><br>
<form name="searchbox" action="" target="" method="post">
    <input type="text" autocomplete="off" placeholder="Search..." name="mapq" id="pac-input" />
    <input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
</form>

   <section class="inmap" id="inmap">
          <div class="leftmapinfo"> 
					<ul class="leftinfolist">

					<li><h2>Doctors</h2><br></li>
							<li id="haendler-0" class="haendlerausgabe" onclick="haendlerv2_myClick(0);return false;" style="background:url(//www.casio-europe.com/haendler_api/v2/pin.php?seite=protrek&amp;nr=1) 6px 10px no-repeat;">
								<h4 class="subheader underline" style="display:inline-block;">UHRZEIT.ORG GMBH</h4><br>
								<span class="copy-text">GAENSEMARKT 50 / GAENSEMARKT PASSAGE<br>								20354 HAMBURG<br>								Tel: 040 - 24424940<br>																E-Mail: SHOP@UHRZEIT.ORG<br></span>
							</li>

							
							<li id="haendler-1" class="haendlerausgabe" onclick="haendlerv2_myClick(1);return false;" style="background:url(//www.casio-europe.com/haendler_api/v2/pin.php?seite=protrek&amp;nr=2) 6px 10px no-repeat;">
								<h4 class="subheader underline" style="display:inline-block;">JUWELIER KRAEMER</h4><br>
								<span class="copy-text">MOENCKEBERGSTR. 5<br>								20095 HAMBURG<br>								Tel: 040   - 337120<br>																E-Mail: HAMBURG34@JUWELIERE-KRAEMER.DE<br></span>
							</li>

							
							<li id="haendler-2" class="haendlerausgabe" onclick="haendlerv2_myClick(2);return false;" style="background:url(//www.casio-europe.com/haendler_api/v2/pin.php?seite=protrek&amp;nr=3) 6px 10px no-repeat;">
								<h4 class="subheader underline" style="display:inline-block;">MEISTER LALLA</h4><br>
								<span class="copy-text">LANGE REIHE 28<br>								20099 HAMBURG<br>								Tel: 040   - 245976<br>																E-Mail: INFO@MEISTER-LALLA.DE<br></span>
							</li>			
					</ul>
          </div>

          <div class="rightmapinfo" id="map"></div>
   </section>
    
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
       /* AUTO COMPLETE */ 
       var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: 53.594780, lng:  9.884969},
          zoom: 13
        });
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        /* END AUTOCOMPLETE  */

        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(53.594780, 9.884969),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('docs.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9ZRlVlsODKlPKvWz5Bv0Y8b4gsmY3qZw&libraries=places&callback=initMap">
    </script>
  </body>
</html>