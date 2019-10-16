<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	//setTimeout(function(){window.location.reload(1);}, 5000);
}

</script>


</head>

<body>


<?php



$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');



	$usr = $_GET['usr'];

	$qt = "SELECT * FROM capturista WHERE usuario = '$usr' ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	$c=0;
	while ($rowt = mysqli_fetch_row($resul)){
		$id_capturista = $rowt[0];
		$nombre=$rowt[1];
		$usuario=$rowt[2];
		$pass=$rowt[3];
		
		$reviso=$rowt[7];
		$activa=$rowt[8];
		$inactiva=$rowt[9];
			$enproceso=$rowt[10];
		$c++;
	}
	
	if($c==0){
		$qt = "SELECT * FROM capturista WHERE usuario = 'anonimo' ";
		//echo $qt;
		$resul = mysqli_query($link,$qt);
		$c=0;
		while ($rowt = mysqli_fetch_row($resul)){
			$id_capturista = $rowt[0];
			$nombre=$rowt[1];
			$usuario=$rowt[2];
			$pass=$rowt[3];
			
			$reviso=$rowt[7];
			$activa=$rowt[8];
			$inactiva=$rowt[9];
			$enproceso=$rowt[10];
			$c++;
		}
	}
	
/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/

	$idm = $_GET['idm'];
	$qt = " SELECT * FROM `mision` WHERE id_mision ='$idm' LIMIT 1  ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_mision = $rowt[0];
		$id_campana=$rowt[1];
		$titulo=$rowt[2];
		$descripcion=$rowt[3];
		$liga=$rowt[4];
		
		$id_revisar_last = $rowt[8];
	}
	
	
    $qt = "SELECT count(*) FROM mision_capturista WHERE id_capturista = '$id_capturista' AND id_mision='$id_mision' ";
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$contadas = $rowt[0];
	}

	
	$qt = "UPDATE `mision` SET `conteo` = conteo+1 WHERE `mision`.`id_mision` = '$id_mision';";
	$resul = mysqli_query($link,$qt);
	
	
	$qt = "SELECT * FROM revisar WHERE id_revisar > '$id_revisar_last' AND suspendia=0 LIMIT 1";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_revisar = $rowt[0];
		$revisar_nombre=$rowt[1];
		$revisar_usuario=$rowt[2];
		$pass=$rowt[3];
		$mail=$rowt[4];
		$mail_pass=$rowt[5];
		
		$cuenta=$usuario;
	}
	
	$qt = "UPDATE `mision` SET `id_revisar_last` = '$id_revisar' WHERE `mision`.`id_mision` = '$id_mision';";
	$resul = mysqli_query($link,$qt);
	
	$qt = "INSERT INTO `mision_capturista` (`id_mision_capturista`, `id_mision`, `id_capturista`, `fecha`) VALUES (NULL, '$id_mision', '$id_capturista', now());";
	$resul = mysqli_query($link,$qt);
	
	$qt = "INSERT INTO `mision_revisar` (`id_mision_revisar`, `id_mision`, `id_revisar`, `fecha`) VALUES (NULL, '$id_mision', '$id_revisar', now());";
	$resul = mysqli_query($link,$qt);
	
	
	$qt = "SELECT * FROM amencionar ORDER BY rand() LIMIT 1  ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		//$cuenta=$rowt[1];
		$aseguir=$rowt[1];
	}
	
	//echo "<h1>DATO: ".$dato."</h1>";
	
	//if($dato!=""){
	
	
	$qt= "UPDATE `express_dato` SET `extra` = 1 WHERE `express_dato`.`dato` = '$dato';";
	//$resultt = mysqli_query($link,$qt);
	
	
	//https://twitter.com/PerdiDogsCDMX
	//https://twitter.com/Milenio/status/1005423514470486018
	
?>

<h2>Mision: <?php echo $titulo; ?></h2>
<h3>Capturista: <?php echo $nombre; ?> <strong style="color:#930;">Contadas: <?php echo $contadas; ?></strong></h3>

<textarea name="username" cols="" rows="" style="width:300px; height:100px;"><?php echo $revisar_usuario; ?></textarea>

<textarea name="pass" cols="" rows="" style="width:300px; height:100px;"><?php echo $pass; ?></textarea>
<br />
<textarea name="mail" cols="" rows="" style="width:600px; height:80px;"><?php echo $mail; ?></textarea>
<br />
<textarea name="liga" cols="" rows="" style="width:600px; height:80px;"><?php echo $liga; ?></textarea>
<br />
<textarea name="liga" cols="" rows="" style="width:600px; height:80px;">https://twitter.com/LillyTellez/status/1006741418700926976</textarea>
<br />

<textarea name="aseguir" cols="" rows="" style="width:600px; height:100px;">


<?php

	$qt = "SELECT * FROM amencionar WHERE extra=1 ORDER BY rand() LIMIT 2";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		//$cuenta=$rowt[1];
		$aseguir=$rowt[1];
		echo " ".$aseguir;
	}
	
?>

<?php

	$qt = "SELECT * FROM amencionar ORDER BY rand() LIMIT 3";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		//$cuenta=$rowt[1];
		$aseguir=$rowt[1];
		echo " @".$aseguir;
	}
	
?>

</textarea>

<?php
$qt = "SELECT count(*) FROM mision_revisar WHERE id_mision = '$id_mision'";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$revizadas = $rowt[0];
	}
?>

<h1>Totales contadas: <?php echo $revizadas; ?></h1>

</body>
</html>