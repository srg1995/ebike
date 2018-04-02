      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
         var map ;
         var bici;

      function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.6582255, lng:-4.6967732},


          zoom:15
        });

         var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
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
      //  var infoWindow = new google.maps.InfoWindow({map: map});

        //  HTML5 geolocation. Nuestra posicion
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
/*
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
    */
           bici = new google.maps.Marker({
            position: pos,
            icon: "../img/mapa/bici.png",
            map: map
          });
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        /*Dibujasmo las lineas rojas unas cordenadas por punto
        Podemos sacar las coordenadas de aqui
        https://www.latlong.net/
        */
        var coord = [
           {lat: 40.658226, lng: -4.696773},
          {lat: 40.6582255, lng: -4.6967732},
          {lat: 40.663541, lng: -4.695402},
          {lat: 40.662491, lng: -4.698620},

      //cada punto una coordenada
          {lat: 40.656168, lng:-4.706249},
              {lat: 40.654296, lng:-4.699941},
                  {lat: 40.653840,lng: -4.697280},
                  {lat: 40.658226,lng:-4.696773}
        ];
        //se las asignamos a una ruta con un color y demas

        var ruta = new google.maps.Polyline({
          path: coord,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        ruta.setMap(map);

        /*Dibujo de la ruta*/
        /*
        Escribimos los puntos de interes.

        */
        //Uno por punto de interes.
        //Se puede hacer una funcion nuevo punto de interes que le pasemos coordenadas, Titulo, imagen y contenidos y una url a lo mejor.... si no se deja a mano que no seran mas de 10 y vale

             var contenidoHTMLP1 = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Muralla</h1>'+
            '<div id="bodyContent">'+
            '   <img src="../img/mapa/postes.jpg"/><p><b>Muralla</b>, explicacion sobre la muralla que alguien nos pase</p>'+
  '<p><a href="link#">Mas informacion de la puerta</a> <p>'+
  '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contenidoHTMLP1,
          maxWidth: 480
        });

        var marker = new google.maps.Marker({
          position:new google.maps.LatLng(40.6582255,-4.6967732),
          map: map,
          title: 'Avila Murallas'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        //otro punto de interes
                     var contenidoHTMLP2 = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Puerta Principal</h1>'+
            '<div id="bodyContent">'+
            '   <img src="../img/mapa/puerta.jpg"/><p><b>Puerta Principal</b>, explicacion sobre la puerta principal que alguien nos pase</p>'+
            '<p><a href="link#">Mas informacion de la puerta</a> <p>'+
            '</div>'+
            '</div>';

        var infowindow2 = new google.maps.InfoWindow({
          content: contenidoHTMLP2,
          maxWidth: 480
        });

        var marker2 = new google.maps.Marker({
          position:new google.maps.LatLng(40.656168, -4.706249),
          map: map,
          title: 'Avila Murallas'
        });
        marker2.addListener('click', function() {
          infowindow2.open(map, marker2);
        });

            /* Acabamos  los puntos de interes.*/
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      function actualizarPosicionBicicleta(){
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: (position.coords.latitude),
              lng: (position.coords.longitude)
            }
/*
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
    */

          bici.setPosition((pos+0,100));
            map.setCenter((pos+0,100));
        });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }
     setInterval(actualizarPosicionBicicleta,10000);