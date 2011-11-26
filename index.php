<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get" action="#">
            <input type="text" id="obchodni_firma" name="obchodni_firma" value="http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_std.cgi?obchodni_firma=&xml=1"></input>
            <input type="button" id="vyhledat" value="vyhledat"></input></br>
            
            <input type="submit" id="odelat" value="odeslat"></input>
            
        </form>
        <a href="http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_std.cgi?obchodni_firma=<?php echo $_GET['obchodni_firma']; ?>&xml=1">
        http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_std.cgi?obchodni_firma=<?php echo $_GET['obchodni_firma']; ?>&xml=1
        </a>
  
        <?php
        
        ?>
  Hallo world      
        
        
    </body>
</html>
 