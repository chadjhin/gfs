<html>
  <head>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  
  <style> #map_canvas { margin: 0; padding: 0; height: 400px;  /* The height is 400 pixels */
        width: 760px; }</style>
</head>
<body>
Latitude:&nbsp;<input type="text" id="lat" size="18">&nbsp;&nbsp;&nbsp;
Longitude:&nbsp;<input type="text" id="lng" size="18"><br/><br/>
    <div id="map_canvas"></div>
</body>
<script>
          var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(10.315453094212321, 123.88567196449937 ),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapId: '767e2fd520bfc33d'  //https://console.cloud.google.com/google/maps-apis/studio/styles?project=petik-357402
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ 
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ 
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('lati').value=location.lat(); // for the profile form

                document.getElementById('long').value=location.lng();

                document.getElementById('lat').value=location.lat(); //for the modal map
                document.getElementById('lng').value=location.lng();
                //getAddress(location);
            }

      /*function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }*/
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>