
<!DOCTYPE html>
<html>
    <head>
        <title>Panel de administración</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        
        

        
    <style type="text/css">
    body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
    </style>
    </head>

    <body>
    
    <div style="display:none;">
        <?php
include("includes/mysql_infos.php");
?>

<?php

    $qt = "SELECT * FROM contenido WHERE id_contenido='".$_GET['id']."' ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_contenido = $rowt[0];
		$url = $rowt[1];
		$completo = $rowt[2];
		$titulo = $rowt[3];
		$codigo = $rowt[4];
		$nombre = $rowt[5];
		$ciudades = $rowt[6];
		$imagen = $rowt[7];
		$duracion = $rowt[8];
		$precio = $rowt[9];
		$fecha = $rowt[10];
		$vigencia = $rowt[11];
		$avion = $rowt[12];
		$html = $rowt[13];
		$extra = $rowt[14];
		$status = $rowt[15];
		$id_zona = $rowt[16];
		
	}
?>

    </div>
        
        <?php
		
		echo $html;
		
		 ?>
        

    </body>
</html>