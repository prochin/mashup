<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=ABQIAAAAHFzujA2I4xooEsgQ9iEnuhSzmpRnLKDgEjybe_btMrhN9KbcfRT_xBiBjTcjZBXg1ur9ZeUFKfnyUQ&sensor=true">
</script>
<script type="text/javascript">
var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  }

  function codeAddress() {
    var address = 'Budejovicka 64 Praha';
    //var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }

</script>
</head>
<body onload="initialize()">
 <div id="map_canvas" style="width: 320px; height: 480px;"></div>
  <div>
    <input id="address" type="textbox" value="Budejovicka 64, Praha">
    <input type="button" value="Encode" onclick="codeAddress()">
  </div>
</body></html>