<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

//echo "---".isset($_SESSION['login'])."---";

//echo "---".$_SESSION['login']."---";

if(isset($_SESSION['login'])){
	//header("location index.php");
	if($_SESSION['login']=="correcto"){
		//header("location: index.php");
	}else{
		header("location: index.php");
	}
}else{
	header("location: index.php");
}



?>

<div style="width:100%; height:20px; position:absolute; top:0px; left:0px; margin:auto; text-align:right;">
<div style="padding:5px;">
<a href="logout.php">Cerrar sesión</a>
</div>
</div>