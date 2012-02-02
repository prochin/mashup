<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="http://api4.mapy.cz/loader.js"></script>
        <script type="text/javascript">Loader.load();</script>
    </head>
    <body>
q=Budejovicka%205%2C%20praha
        <div id="mapa" style="width:610px;height:400px"></div>
        <script type="text/javascript">
	/* střed mapy */
	var center = SMap.Coords.fromWGS84(14.400307, 50.071853);
	/* inicializace API */
	var m = new SMap(JAK.gel("mapa"), center, 14);
	/* definujeme pouzivane mapove podklady */
	m.addDefaultLayer(SMap.DEF_OPHOTO);
	m.addDefaultLayer(SMap.DEF_OPHOTO0203);
	m.addDefaultLayer(SMap.DEF_OPHOTO0406);
	m.addDefaultLayer(SMap.DEF_TURIST);
	m.addDefaultLayer(SMap.DEF_HISTORIC);
	m.addDefaultLayer(SMap.DEF_BASE).enable();
	/* pridame zakladni ovladaci prvky */
	m.addDefaultControls();
	/* nastavíme a přidáme přepínač mapových podkladů */
	var layerSwitch = new SMap.Control.Layer();
	layerSwitch.addDefaultLayer(SMap.DEF_BASE);
	layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO);
	layerSwitch.addDefaultLayer(SMap.DEF_TURIST);
	layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO0406);
	layerSwitch.addDefaultLayer(SMap.DEF_OPHOTO0203);
	layerSwitch.addDefaultLayer(SMap.DEF_HISTORIC);
	m.addControl(layerSwitch,{left:"8px", top:"9px"});
</script>	
        
    </body>
</html>
