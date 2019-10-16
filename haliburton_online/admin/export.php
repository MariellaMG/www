<?php
//include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

download_send_headers("data_export_" . date("Y-m-d") . ".csv");

?>


<?php

	$qt = "SELECT * FROM combinacion ORDER BY id_combinacion DESC";

	$resultt = mysql_query($qt, $db);
	
	echo "ID,TOP,BOTTOM,NOMBRE,EMAIL,FECHA,SEX
	";
	
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$top = $rowt[1];
		$bot = $rowt[2];
		$nombre = $rowt[3];
		$email = $rowt[4];
		$fecha = $rowt[5];
		$extra = $rowt[6];
		$reenvio = $rowt[7];
		$sexo = $rowt[8];
		
		
		if($sexo==0){
			$sex="men";
		}else{
			$sex="wom";
		}
		
		echo $id.",".$top.",".$bot.",".$nombre.",".$email.",".$fecha.",".$sex."
		";
		
	}
	
?>

