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


/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/

	$qt = "SELECT * FROM cuentas ORDER BY usado LIMIT 1  ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_cuenta = $rowt[0];
		$cuenta=$rowt[1];
		$pass=$rowt[2];
	}
	
	
	
	$qt = "UPDATE `cuentas` SET `usado` = usado+1 WHERE `cuentas`.`id_cuenta` = '$id_cuenta';";
	//$resul = mysqli_query($link,$qt);
	
	
	
	$qt = "SELECT * FROM revisar WHERE privada = '1' AND suspendia=0 ORDER BY supervizada LIMIT 1";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_revisar = $rowt[0];
		$nombre=$rowt[1];
		$usuario=$rowt[2];
		$pass=$rowt[3];
		$mail=$rowt[4];
		$mail_pass=$rowt[5];
		
		$cuenta=$usuario;
	}
	$qt = "UPDATE `revisar` SET `privada` = privada+1 WHERE `revisar`.`id_revisar` = '$id_revisar';";
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
	
	
	/*
	$qt = "SELECT count(*) FROM express_dato WHERE dato = '$dato' ";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$conteo=$rowt[0];
		//echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
		echo "<h1>".$conteo."</h1>";
	}
	
	echo "<br />
";
	
	$qt = "INSERT INTO `tinker_db`.`express_conteo` (`id_express_conteo`, `dato`, `conteo`, `extra`) VALUES (NULL, '$dato', '$conteo', '');";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	
	}
	*/
	
	//https://twitter.com/PerdiDogsCDMX
	//https://twitter.com/Milenio/status/1005423514470486018
	

?>

<textarea name="username" cols="" rows="" style="width:300px; height:200px;"><?php echo $cuenta; ?></textarea>

<textarea name="pass" cols="" rows="" style="width:300px; height:200px;"><?php echo $pass; ?></textarea>
<br />
<textarea name="mail" cols="" rows="" style="width:600px; height:80px;"><?php echo $mail; ?></textarea>
<br />
<textarea name="liga" cols="" rows="" style="width:600px; height:80px;">https://twitter.com/JuventudXlaCDMX/status/1006621960170852352</textarea>
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
$qt = "SELECT count(*) FROM revisar WHERE privada >= '2' AND suspendia=0 ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$revizadas = $rowt[0];
	}
?>

<h1>Privada: <?php echo $revizadas; ?></h1>

</body>
</html>