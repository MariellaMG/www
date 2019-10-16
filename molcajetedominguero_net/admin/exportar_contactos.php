<?php
include("includes/mysql_infos.php");
?>
<?

    header("Content-Type: application/vnd.ms-excel");
    header("Expires: 0″");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0″");
    header("content-disposition: attachment;filename=BaseDeDatos.xls");
	
?>


<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BaseDeDatos.clt</title>

<style type="text/css">

<!–

.style1 {

font-family: Verdana, Arial, Helvetica, sans-serif;

font-weight: bold;

}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

–>

</style>

</head>

<body>

<table >

<tr>


<td><span class="style1"><strong>ID</strong> </span></td>

<td><span class="style1"><strong>Usuario</strong></span></td>

<td><span class="style1"><strong>Fecha</strong></span></td>

<td><span class="style1"><strong>Cliente</strong></span></td>

<td><span class="style1"><strong>Edad</strong></span></td>

<td><span class="style1"><strong>Estado civil</strong></span></td>

<td><span class="style1"><strong>Ciudad</strong></span></td>

<td><span class="style1"><strong>Estado</strong></span></td>

<td><span class="style1"><strong>Telefono casa</strong></span></td>

<td><span class="style1"><strong>Telefono</strong></span></td>

<td><span class="style1"><strong>Celular</strong></span></td>

<td><span class="style1"><strong>Email</strong></span></td>

<td><span class="style1"><strong>Comentarios</strong></span></td>

<td><span class="style1"><strong>Opcion</strong></span></td>

<td><span class="style1"><strong>Aceptó términos y condiciones</strong></span></td>





</tr>


                <?php
				
				
				
$k = $_GET["k"]; 

if($k==""){
	$dia = " fecha_alta != 0 ";
	$k=99;
}

if($k==0){
	$dia="DATE(fecha_alta) >= CURDATE()-7";
	$dianom = "los ultimos 7 dias";
}

if($k==1){
	$dia="DATE(fecha_alta) >= CURDATE()-15";
	$dianom = "los ultimos 15 dias";
}
if($k==2){
	$dia="MONTH(fecha_alta) = MONTH(CURRENT_DATE)";
	$dianom = "este mes";
}
if($k==3){
	$dia="MONTH(fecha_alta) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
	$dianom = "el mes pasado";
}
				
				
	$qt = "SELECT * FROM contacto WHERE $dia ORDER BY id_contacto ASC ";
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_colaborador = $rowt[1];
		$fecha = $rowt[2];
		$evento = $rowt[3];
		$consultor = $rowt[4];
		$cliente = $rowt[5];
		$edad = $rowt[6];
		$estado_civil = $rowt[7];
		$ciudad = $rowt[8];
		$lada = $rowt[9];
		$casa_lada = $rowt[10];
		
		$telefono = $rowt[11];
		$telefono_casa = $rowt[12];
		$celular = $rowt[13];
		
		$email = $rowt[14];
		$opcion = $rowt[18];
		$fecha = $rowt[15];
		

		$q_c = "SELECT nombre FROM colaborador WHERE id_colaborador='$id_colaborador' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$colaborador_nombre = $rowc[0];
		}
	
		$estado = $rowt[19];
		$comentarios = $rowt[20];
		
	?>
                  
                
                
                <tr>

<td><span class="style1"><?php echo utf8_encode($id); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($colaborador_nombre); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($fecha); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($cliente); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($edad); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($estado_civil); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($ciudad); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($estado); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($casa_lada."-".$telefono_casa); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($lada."-".$telefono); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($celular); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($email); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($comentarios); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($opcion); ?></span></td>

<td><span class="style1">SI</span></td>





</tr>
                
                
                
       <?php
	   }
	   ?>
             

</table>
</body>
</html>