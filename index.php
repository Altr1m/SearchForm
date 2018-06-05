<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/fillmap.js"></script>
    <title>Search Map</title>
    <?php require('db/readdb.php'); ?> <!-- FILLS LEFT LIST BY DEFAULT -->
</head>
<body style="margin:0px; padding:0px;">

<form class="searchform" name="searchbox" action="" target="" method="post">
    <img src="images/searchicon.png"/><br>
    <input type="text" autocomplete="off" placeholder="Ort, Addresse oder Postleitzahl eingeben..." name="mapinput" id="pac-input" autofocus="autofocus"/>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZnzboD5iPcg-PNQtY4vmWlQZ-9oCCTXc&libraries=places&style=element:geometry.fill%7Csaturation:-70&style=feature:water%7Celement:geometry.fill%7Ccolor:0x93b8ca&callback=initMap"></script>
  </body>
</html>
