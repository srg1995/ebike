<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include '../partials/head.php';
     ?>
    <title>Geolocation | Ebike</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
     <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 70%;
        margin:20px 15%;
      }

      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      @media (max-width: 768px) {
        #map{
            height: 92%;
            margin:20px 4%;
        }
    }
    @media (max-width: 576px) {
        #map{
            height: 100%;
            margin:20px 0;
        }
    }
    </style>
</head>
<body>
    <?php
        include '../partials/header.php';
    ?>
        <h1 class="text-center mt-4 mb-4"><?php echo _("Our route");?></h1>
            <div id="map"></div>

    <?php
        include '../partials/footer.php';
    ?>
    <script src="../js/mapa.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMZBfSYkAJDOsCFJKhAvqscn9nHIos2H4&callback=initMap">
    </script>
</body>
</html>