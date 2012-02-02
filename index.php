<?php

// nactu udaje dle ICO z ARESu
// pres API naleznu LatLng 
// zobrazim je na maps.google.com


define('ARES',"http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=");
if($_GET['ico'] == "zadejte+IČO") {echo "aaa"; break; }
if(!isset($_REQUEST['ico'])) { $ico=26479800; } else { $ico = intval($_REQUEST['ico']); } ;

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
  $a['stav'] 	= 'IČO firmy nebylo nalezeno';
} else
 $a['stav'] 	= 'Databáze ARES není dostupná';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ARESmap</title>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=ABQIAAAAzr2EBOXUKnm_jVnk0OJI7xSosDVG8KKPE1-m51RBrvYughuyMxQ-i1QfUnH94QxWIa6N4U6MouMmBA&sensor=true"></script>
        <script type="text/javascript" src="js/maps.js"></script>
        <link rel="stylesheet" href="css/frontend.css">
    </head>
   
<body onload="initialize();">
    <div id="top">
	
		<img src="images/img_title.png">
	</div>
    
   <div id="obsah">
		<div id="left_box" class="podBox">
                <div id="infoSubjekt" class="small">
				<input id="address" type="textbox" value="<?php echo $a['ulice'] . ", " . $a['mesto']; ?>" style="display: none;">
				<form method="get" action="index.php">
						IČO: <input type="text" id="ico" name="ico" value="zadejte IČO" onFocus="if(this.value==this.defaultValue)this.value=''"></input>
						<input type="submit" id="odelat" value="" class='btn_sipka'></input>
				 </form>   
				 <br />
				<br />

				<?php 
				 if($a['stav'] == "ok") {
					 ?>

					  <table border="1">
					  <tr>
						<td colspan="2"><strong><span class="vseVelka"><?php echo $a['firma']; ?></span></strong><br /></td>
					  </tr>
					  <tr>
						<td class="title">IČO:</td>
						<td><?php echo $a['ico']; ?></td>
					  </tr>
					  <tr>
						<td class="title">DIČ:</td>
						<td><?php echo $a['dic']; ?></td>
					  </tr>
					  <tr>
						<td class="title">Adresa</td>
						<td><?php echo $a['ulice']; ?>, <?php echo $a['psc']; ?> <?php echo $a['mesto']; ?></td>
					  </tr>
					</table>
                </div>
                </div>
					
				<div id="box1" class="podBox">
                     <div id="map_canvas" style="width: 300px; height: 300px; "></div>
                </div>
                
        <?php
     } else {
         ?>
		            <span class="dulezite"><?php echo $a['stav']; ?></span>
				</div>
			</div>
            <?php
     }
     ?>   
	 
      </div>
	  <div id="footer" class="verySmall">2011 - Pavel Procházka | support@prochin.cz </div>
    </body>
</html>
 