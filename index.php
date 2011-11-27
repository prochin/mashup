<?php


// nactu udaje dle ICO z ARESu
// pres API naleznu LatLng 
// zobrazim je na maps.google.com


define('ARES',"http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=");
if(!isset($_REQUEST['ico'])) { $ico=63998530; } else { $ico = intval($_REQUEST['ico']); } ;

$file = @file_get_contents(ARES.$ico);
if ($file) $xml = @simplexml_load_string($file);
$a = array();
if ($xml) {
 $ns = $xml->getDocNamespaces();
 $data = $xml->children($ns['are']);
 $el = $data->children($ns['D'])->VBAS;
 if (strval($el->ICO) == $ico) {
  $a['ico'] 	= strval($el->ICO);
  $a['dic'] 	= strval($el->DIC);
  $a['firma'] 	= strval($el->OF);
  $a['ulice']	= strval($el->AA->NU).' '.strval($el->AA->CO);
  $a['mesto']	= strval($el->AA->N);
  $a['psc']	= strval($el->AA->PSC);
  $a['stav'] 	= 'ok';
 } else
  $a['stav'] 	= 'IČ firmy nebylo nalezeno';
} else
 $a['stav'] 	= 'Databáze ARES není dostupná';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=true">
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
    
    
     //var address = document.getElementById("adresa").value;
    //alert(address);
    var address = document.getElementById("address").value;
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

  function codeAddress() {
   
  }

</script>

    </head>
   
<body onload="initialize();">
     
    
    
    ČPP - 63998530
    KOOP - 47116617<br /><br />
    
    <strong><?php echo $a['firma']; ?></strong><br />
    IČO: <?php echo $a['ico']; ?><br />
    DIČ: <?php echo $a['dic']; ?><br />
    Adresa: <?php echo $a['ulice']; ?>, <?php echo $a['psc']; ?> <?php echo $a['mesto']; ?></br>
    
    <?php echo $a['stav']; ?>
        <form method="get" action="index.php">
            IČO: <input type="text" id="ico" name="ico" value="63998530"></input>
            
            <input type="submit" id="odelat" value="odeslat"></input>
            
        </form>
       
  <div id="map_canvas" style="width: 320px; height: 480px;"></div>
  <div>
      <input id="address" type="textbox" value="<?php echo $a['ulice'] . ", " . $a['mesto']; ?>" style="visibility: hidden;">
    
  </div>      
        
        
    </body>
</html>
 