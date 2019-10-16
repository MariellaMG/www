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


	$qt = "SELECT * FROM `TABLE 19`  ";
	echo $qt."<br />
";
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$nombre=$rowt[0];
		$mail = $rowt[1];
		$pass_mail = $rowt[2];
		$creado=$rowt[3];
		$usuario=$rowt[4];
		$pass=$rowt[5];
		
		//echo $dato;    
		
		$qt = "SELECT usuario FROM revisar WHERE usuario = '$cuenta' ";
		echo $qt."<br />
";
		$resul = mysqli_query($link,$qt);
		$c=0;
		while ($row = mysqli_fetch_row($resul)){
			$cuenta=$row[0];
			$c++;
		}
		if($c<=0){
			///No existe
			//$qt = "INSERT INTO `amencionar` (`id_amencionar`, `cuenta`, `mencionado`, `id_campana`,`conteo`) VALUES (NULL, '$dato', '0', '0','$conteo');";
			$qt = "
			INSERT INTO `revisar` (`id_revisar`, `nombre`, `usuario`, `pass`, `mail`, `mail_pass`, `revisada`, `suspendia`, `error_correo`, `extra`) VALUES (NULL, '$nombre', '$usuario', '$pass', '$mail', '$pass_mail', '', '', '', '');
			";
			echo $qt."<br />
";
			$resul = mysqli_query($link,$qt);
		}else{
			
		}
		
		
		
		echo $datt;
	}
	echo "<h1>RESTAN: ".number_format($datt)."</h1>";
	

	/*
	$qt = "SELECT dato FROM express_dato WHERE dato NOT LIKE '% %' AND extra=0 LIMIT 1 ";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$dato=$rowt[0];
		//echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
	}
	
	echo "<h1>DATO: ".$dato."</h1>";
	
	if($dato!=""){
	
	
	$qt= "UPDATE `express_dato` SET `extra` = 1 WHERE `express_dato`.`dato` = '$dato';";
	$resultt = mysqli_query($link,$qt);
	
	
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