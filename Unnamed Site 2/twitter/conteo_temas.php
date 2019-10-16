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
	setTimeout(function(){window.location.reload(1);}, 5000);
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


	$qt = "SELECT count(*) FROM express_dato_dos WHERE dato NOT LIKE '% %' AND extra=0 LIMIT 1 ";
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$datt=$rowt[0];
	}
	echo "<h1>RESTAN: ".number_format($datt)."</h1>";


	$qt = "SELECT dato FROM express_dato_dos WHERE dato NOT LIKE '% %' AND extra=0 LIMIT 1 ";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$dato=$rowt[0];
		//echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
	}
	
	echo "<h1>DATO: ".$dato."</h1>";
	
	if($dato!=""){
	
	
	$qt= "UPDATE `express_dato_dos` SET `extra` = 1 WHERE `express_dato_dos`.`dato` = '$dato';";
	$resultt = mysqli_query($link,$qt);
	
	
	$qt = "SELECT count(*) FROM express_dato_dos WHERE dato = '$dato' ";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$conteo=$rowt[0];
		//echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
		echo "<h1>".$conteo."</h1>";
	}
	
	echo "<br />
";
	
	$qt = "INSERT INTO `tinker_db`.`express_conteo_dos` (`id_express_conteo`, `dato`, `conteo`, `extra`) VALUES (NULL, '$dato', '$conteo', '');";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	
	}
	

?>
</body>
</html>