<?php
session_start();

include("admin/includes/mysql_infos2.php");

			

extract($_POST);
extract($_GET);

$login = false;

//echo $usr."  -- --  -  ".$pass;

$id_usuario = $_SESSION['idu'];

	$qt = "SELECT * FROM usuario WHERE id_usuario='$id_usuario'  ";
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
	

// $idt <<< id_ticket
// $tt <<<< tipo_ticket
// $aa <<<< alimento
// $pp <<<< precio

if($cc>0){
	
	echo "++".$cc."++";
	
	$sq = "SELECT * FROM cart WHERE id_usuario='$id_usuario' AND id_ticket='$idt' AND alimentos='$aa'  ";
	echo $sq;
	$resul = mysqli_query($link,$sq);
	$ccc=0;
	while ($rowt = mysqli_fetch_row($resul)){
		//echo utf8_encode($rowt[0]);
		$idcart = $rowt[0];
		$ccc++;
	}
	
	echo "--".$ccc."--";
	
	if($ccc<=0){
		$q="INSERT INTO `cart` (`id_cart`, `id_usuario`, `id_ticket`, `tipo_ticket`, `id_transaccion`, `fecha`, `cantidad`, `pagado`,`alimentos`,`precio`) 
		VALUES (NULL, '$id_usuario', '$idt', '$tt', '0', now(), '1', '0', '$aa','$pp' );";
		echo $q;
		$resultt = mysqli_query($link,$q);
	}else{
		$qu="UPDATE `cart` SET cantidad = cantidad+1 WHERE `cart`.`id_cart` = '$idcart';";
		echo $qu;
		$resultt = mysqli_query($link,$qu);
	}
}




?>