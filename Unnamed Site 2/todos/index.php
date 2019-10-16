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
	///$resultt = mysqli_query($link,$qt);
	
	
	
/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/

	
	
	
	
	
	

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



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>ID</td>
    <td>NOMBRE</td>
    <td>USUARIO</td>
    <td>PASS</td>
    <td>MAIL</td>
    <td>MAIL PASS</td>
  </tr>
  
  <?php
  
  $qt = "SELECT * FROM revisar ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_revisar = $rowt[0];
		$nombre=$rowt[1];
		$usuario=$rowt[2];
		$pass=$rowt[3];
		$mail=$rowt[4];
		$mail_pass=$rowt[5];
	
  
  ?>
  
  
   <tr style="height:40px;">
    <td><input type="text" style="width:80%;" value="<?php echo $id_revisar; ?>" /></td>
    <td><input type="text" style="width:80%;" value="<?php echo $nombre ?>" /></td>
    <td><input type="text" style="width:80%;" value="<?php echo $usuario ?>" /></td>
    <td><input type="text" style="width:80%;" value="<?php echo $pass ?>" /></td>
    <td><input type="text" style="width:80%;" value="<?php echo $mail ?>" /></td>
    <td><input type="text" style="width:80%;" value="<?php echo $mail_pass; ?>" /></td>
  </tr>
  
  <?php
	}
  ?>
  
</table>


<br /><br /><br /><br />

</body>
</html>