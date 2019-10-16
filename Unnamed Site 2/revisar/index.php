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
	
	echo "<h2>".$nombre."</h2> <h3> Reviso: ".$reviso." Activas: ".$activa." Suspendidas: ".$inactiva." en proceso: ".$enproceso. 
	
	"</h3>";
	
	
	$qt= "UPDATE `capturista` SET `enproceso` = enproceso+1 WHERE `id_capturista` = '$id_capturista';";
	$resultt = mysqli_query($link,$qt);
	
	
	
/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/

	$qt = "SELECT * FROM revisar WHERE revisada = '0' AND enproceso=0 ORDER BY rand() LIMIT 1";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_revisar = $rowt[0];
		$nombre=$rowt[1];
		$usuario=$rowt[2];
		$pass=$rowt[3];
		$mail=$rowt[4];
		$mail_pass=$rowt[5];
	}
	
	
	$qt = "UPDATE `cuentas` SET `usado` = usado+1 WHERE `cuentas`.`id_cuenta` = '$id_cuenta';";
	//$resul = mysqli_query($link,$qt);
	
	
	$qt= "UPDATE `revisar` SET `enproceso` = 1 WHERE `id_revisar` = '$id_revisar';";
	$resultt = mysqli_query($link,$qt);

	
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>A revisar</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	//setTimeout(function(){window.location.reload(1);}, 5000);
}

function Suspendida(t_id){
	if(confirm("Estas seguro que es una cuenta SUSPENDIDA?")){
		$.get("suspendida.php?id="+t_id+"&idc="+<?php echo $id_capturista; ?>, function(data){
			//alert(data);
			location.reload();
		});
	}else{
		
	}
}

function Activa(t_id){
	if(confirm("Estas seguro que es una cuenta ACTIVA?")){
		$.get("activa.php?id="+t_id+"&idc="+<?php echo $id_capturista; ?>, function(data){
			//alert(data);
			location.reload();
		});
	}else{
		
	}
}




</script>


</head>

<body>




<p>Nombre</p>
<input name="username" type="text" style="width:400px;" value="<?php echo $nombre ?>" />
<p>Mail</p>
<input name="mail" type="text" style="width:400px;" value="<?php echo $mail ?>" />
<p>Mail PASS</p>
<input name="mail_pass" type="text" style="width:400px;" value="<?php echo $mail_pass ?>" />
<p>TWITTER</p>
<input name="usuario" type="text" style="width:400px;" value="<?php echo $usuario ?>" />
<p>TWITTER PASS</p>
<input name="pass" type="text" style="width:400px;" value="<?php echo $pass ?>" />
<br />
<br />
<input name="ACTIVA" value="ACTIVA" type="button" style=" background:#09F; width:120px; height:30px;" onclick="Activa(<?php echo $id_revisar; ?>);" />
<br /><br />


<input name="SUSPENDIDA" value="SUSPENDIDA" type="button" style="background-color:#F00; width:150px; height:30px;"
 onclick="Suspendida(<?php echo $id_revisar; ?>);"  />
 
 
 <?php
 $qt = "SELECT count(*) FROM revisar WHERE revisada = '0' ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$sinrevisar = $rowt[0];
	}
 ?>
 
 <?php
 $qt = "SELECT count(*) FROM revisar WHERE revisada = '1' ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$revisadas = $rowt[0];
	}
 ?>
 
 <?php
 $qt = "SELECT count(*) FROM revisar WHERE suspendia = '1' ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$suspendida = $rowt[0];
	}
 ?>
 

 <h2>Revisadas: <?php echo $revisadas; ?></h2>
 <h2>Suspendidas: <?php echo $suspendida; ?></h2>
  <h2>Activas: <?php echo $revisadas-$suspendida; ?></h2>
<h2>Sin revisar: <?php echo $sinrevisar; ?></h2>

</body>
</html>