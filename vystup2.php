<?php
//header("Content-Type: text/html; charset=UTF-8");
define('ARES',"http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=");
$obchodni_firma = intval($_REQUEST['obchodni_firma']);

$file = @file_get_contents(ARES.$obchodni_firma);
if ($file) $xml = @simplexml_load_string($file);
$a = array();
if ($xml) {
 $ns = $xml->getDocNamespaces();
 $data = $xml->children($ns['are']);
 $el = $data->children($ns['D'])->VBAS;
 if (strval($el->OF) == $obchodni_firma) {
  $a['ico'] 	= strval($el->ICO);
  $a['dic'] 	= strval($el->DIC);
  $a['firma'] 	= strval($el->OF);
  $a['stav'] 	= 'ok';
 } else
  $a['stav'] 	= 'IČ firmy nebylo nalezeno';
} else
 $a['stav'] 	= 'Databáze ARES není dostupná';


echo ">>>" . $a['firma'];
//echo json_encode($a);
