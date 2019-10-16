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



	$qt = "SELECT * FROM `nombre`  ";
	echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$nombre=$rowt[1];
		echo "<h1>DATO: ".$dato."</h1>";
	
		$qt = "SELECT * FROM `apellido` ORDER BY rand() LIMIT 1   ";
		$result = mysqli_query($link,$qt);
		while ($row = mysqli_fetch_row($result)){
			$apellido_uno_id=$row[0];
			$apellido_uno=$row[1];
		}
		
		$qt = "UPDATE `apellido` SET `usado` = usado+1 WHERE `apellido`.`id_apellido` = '".$apellido_uno_id."';";
		$result = mysqli_query($link,$qt);
		
		$qt = "SELECT * FROM `apellido` ORDER BY rand() LIMIT 1   ";
		$result = mysqli_query($link,$qt);
		while ($row = mysqli_fetch_row($result)){
			$apellido_dos_id = $row[0];
			$apellido_dos=$row[1];
		}
		$qt = "UPDATE `apellido` SET `usado` = usado+1 WHERE `apellido`.`id_apellido` = '".$apellido_dos_id."';";
		$result = mysqli_query($link,$qt);
		
		$anio=rand(1970,1990);
		$mes=rand(1,12);
		$dia=rand(1,28);
		
		$nacimiento = $anio."-".$mes."-".$dia;
		
		$qt = "SELECT * FROM `rango` ORDER BY rand() LIMIT 1   ";
		$result = mysqli_query($link,$qt);
		while ($row = mysqli_fetch_row($result)){
			$rango_id=$row[0];
			$rango=$row[1];
		}
		
		$qt = "UPDATE `rango` SET `usado` = usado+1 WHERE `rango`.`id_rango` = '".$rango_id."';";
		$result = mysqli_query($link,$qt);
		
		$numero = rand(120,199);
		$num = rand(301,390);
		
		
		$twitter = $nombre.$apellido_dos.$numero.$rango;
		
		$email = $nombre.$apellido_dos.$numero.$rango;
		
		$pass = "PC".$apellido_uno.$num;
		
		$facebook = $nombre.$apellido_dos.$apellido_uno.$numero;
		
		
		
		
		//$resultt = mysqli_query($link,$qt);
		
		
		$qt = "INSERT INTO `porcrear` (`id_porcrear`, `nombre`, `email`, `nacimiento`, `twitter`, `pass`, `facebook`, `pass_fb`, `creada`, `extra`) VALUES (NULL, '$nombre $apellido_uno $apellido_dos', '$email', '$nacimiento', '$twitter', '$pass', '$facebook', '$pass', '0', '0');";
		$resu = mysqli_query($link,$qt);
		
		echo $qt;
		
		
		
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
	

?>
</body>
</html>