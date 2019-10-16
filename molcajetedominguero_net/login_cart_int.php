<?php
session_start();

include("admin/includes/mysql_infos2.php");


/*
if($_SESSION['login']  == "correcto"){
	header("location: home.php");
}else{
	$_SESSION['login'] = "out";
}
*/




extract($_POST);
extract($_GET);

$login = false;

//echo $usr."  -- --  -  ".$pass;


	$qt = "SELECT * FROM usuario WHERE nombre='$usr' AND pass='$pass' LIMIT 1 ";
	//echo $qt;
	$resultt = mysqli_query($link,$qt);
	$cc=0;
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id_usuario = $rowt[0];
		
		$nombre = $rowt[1];
		$imagen = $rowt[2];
		$fotos = $rowt[3];
		$archivos = $rowt[4];
		$descripcion = $rowt[5];
		$permalink = $rowt[6];
		$html = $rowt[7];
		
		$cc++;
		
	}
	
	if($cc==0){
		echo "error";
		$_SESSION['login'] = "out";
	}else{
		echo "ok";
		$_SESSION['login']  = "correcto";
		$_SESSION['idu']  = $id_usuario;
		$_SESSION['nombre']  = $nombre;
		
	}

/*
if($usr=="admin" && $pass=="4dm1n"){
	$_SESSION['login']  = "correcto";
	$login = true;
	$index = 1;
	header("location: home.php");
}else{
	$login = false;
	$index=1;
}
*/


?>