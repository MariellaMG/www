<?php
include("includes/mysql_infos.php");
?>
<?php

    header("Content-Type: application/vnd.ms-excel");
    header("Expires: 0″");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0″");
    header("content-disposition: attachment;filename=Ventas.xls");

?>


<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Ventas.clt</title>

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

			<td><span class="style1"><strong>ID</strong></span></td>
			<td><span class="style1"><strong>Usuario</strong></span></td>
			<td><span class="style1"><strong>Fecha de alta</strong></span></td>
			<td><span class="style1"><strong>Promocion</strong></span></td>
			<td><span class="style1"><strong>Vigencia</strong></span></td>
            
			<td><span class="style1"><strong>Destino</strong></span></td>
			<td><span class="style1"><strong>Fechas</strong></span></td>
			<td><span class="style1"><strong>Cliente</strong></span></td>
			<td><span class="style1"><strong>Edad</strong></span></td>
			<td><span class="style1"><strong>Ocupacion</strong></span></td>
            
			<td><span class="style1"><strong>Conyuge</strong></span></td>
			<td><span class="style1"><strong>Conyuge_edad</strong></span></td>
			<td><span class="style1"><strong>Conyuge_ocupacion</strong></span></td>
            
            <td><span class="style1"><strong>Direccion</strong></span></td>
			<td><span class="style1"><strong>Ciudad</strong></span></td>
			<td><span class="style1"><strong>Estado</strong></span></td>
			<td><span class="style1"><strong>CP</strong></span></td>
			
			<td><span class="style1"><strong>Telefono oficina</strong></span></td>
			<td><span class="style1"><strong>Telefono casa</strong></span></td>
            
			<td><span class="style1"><strong>Telefono celular</strong></span></td>
			<td><span class="style1"><strong>Ingresos</strong></span></td>
			<td><span class="style1"><strong>Correo</strong></span></td>
			<td><span class="style1"><strong>Comentarios</strong></span></td>
			
			
            
			<td><span class="style1"><strong>Cantidad</strong></span></td>
			<td><span class="style1"><strong>Banco</strong></span></td>
			<td><span class="style1"><strong>Tarjeta</strong></span></td>
			
            <td><span class="style1"><strong>AÑO</strong></span></td>
            <td><span class="style1"><strong>MES</strong></span></td>
			<td><span class="style1"><strong>Titular</strong></span></td>
			<td><span class="style1"><strong>Tipo de tarjeta</strong></span></td>
			<td><span class="style1"><strong>Codigo</strong></span></td>
            
            <td><span class="style1"><strong>Aceptó términos y condiciones</strong></span></td>
            
            
            <td><span class="style1"><strong>Razón Social</strong></span></td>
			<td><span class="style1"><strong>RFC</strong></span></td>
			<td><span class="style1"><strong>Calle</strong></span></td>
			<td><span class="style1"><strong>Colonia</strong></span></td>
            <td><span class="style1"><strong>Ciudad</strong></span></td>
            <td><span class="style1"><strong>CP</strong></span></td>
            
         
	
 <?php

$k = $_GET["k"]; 

if($k==""){
	$dia = " fecha_alta != 0 ";
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


		  $qc = "SELECT * FROM compra WHERE $dia ORDER BY id_compra DESC LIMIT 50";
	
		  
		  //echo $qc;
		  
		$result = mysql_query($qc, $db);
		$i=0;
		
		while ($i < mysql_num_fields($result)) { 
			$meta = mysql_fetch_field($result, $i); 
			//if($i>2){
			//echo '<th>' . $meta->name . '</th>'; 
			//echo '<td><span class="style1"><strong>'. $meta->name .'</strong></span></td>';
			//}
			$column[$i] = $meta->name ;
			$i = $i + 1; 
		}
		
		?>
                  
                  
                </tr>
         

 
            
            <?php
			
            
			
		
		
		while ($row = mysql_fetch_row($result)){
			//echo "<tr>";
			
				$q_c = "SELECT nombre FROM colaborador WHERE id_colaborador='$row[1]' ";
				//echo $q_c;
				$result_c = mysql_query($q_c, $db);
				while ($rowc = mysql_fetch_row($result_c)){
					$colaborador_nombre = $rowc[0];
				}
				
				if($row[33]==1){
					$tipo="Visa";
				}
				if($row[33]==2){
					$tipo="Master Card";
				}
				if($row[33]==3){
					$tipo="American Express";
				}
			
			?>
            
             <tr><td><span class="style1"><?php echo $row[0]; ?></span></td>
				<td><span class="style1"><?php echo $colaborador_nombre; ?></span></td>
				<td><span class="style1"><?php echo $row[25]; ?></span></td>
				<td><span class="style1"><?php echo $row[4]; ?></span></td>
				<td><span class="style1"><?php echo $row[5]; ?></span></td>
                
				<td><span class="style1"><?php echo $row[6]; ?></span></td>
				<td><span class="style1"><?php echo $row[7]; ?></span></td>
				<td><span class="style1"><?php echo $row[8]; ?></span></td>
				<td><span class="style1"><?php echo $row[9]; ?></span></td>
				<td><span class="style1"><?php echo $row[10]; ?></span></td>
                
				<td><span class="style1"><?php echo $row[11]; ?></span></td>
				<td><span class="style1"><?php echo $row[12]; ?></span></td>
				<td><span class="style1"><?php echo $row[13]; ?></span></td>
                
                
                <td><span class="style1"><?php echo $row[37]; ?></span></td>
                
                
				<td><span class="style1"><?php echo $row[14]; ?></span></td>
				<td><span class="style1"><?php echo $row[15]; ?></span></td>
				<td><span class="style1"><?php echo $row[16]; ?></span></td>
                
				<td><span class="style1"><?php echo "(".$row[17].")".$row[19]; ?></span></td>
				<td><span class="style1"><?php echo "(".$row[18].")".$row[20]; ?></span></td>
                
				<td><span class="style1"><?php echo $row[21]; ?></span></td>
				<td><span class="style1"><?php echo $row[22]; ?></span></td>
				<td><span class="style1"><?php echo $row[23]; ?></span></td>
				<td><span class="style1"><?php echo $row[24]; ?></span></td>
				
				
                <?php 
				$t = $row[30];
				
				if(substr($t,0,1)=="["){
					$tarjeta_ = $t;
				}else{
					$tarjeta_ = "[".substr($t,0,4)."-".substr($t,4,4)."-".substr($t,8,4)."-".substr($t,12,4)."]";
				}
				
				
				$v = $row[31];
				$v_a = substr($v,0, strrpos($v, "/"));
				$v_m = substr($v, strrpos($v, "/") +1);
				
				 ?>
                
                
				<td><span class="style1"><?php echo $row[28]; ?></span></td>
				<td><span class="style1"><?php echo $row[29];?></span></td>
				<td><span class="style1"><?php echo $tarjeta_; ?></span></td>
                
                
				<td><span class="style1"><?php echo $v_a; ?></span></td>
                <td><span class="style1"><?php echo $v_m; ?></span></td>
                
                
				<td><span class="style1"><?php echo $row[32]; ?></span></td>
				<td><span class="style1"><?php echo $tipo; ?></span></td>
				<td><span class="style1"><?php echo $row[34]; ?></span></td>
                
                <td><span class="style1">SI</span></td>
                
                <td><span class="style1"><?php echo $row[38]; ?></span></td>
				<td><span class="style1"><?php echo $row[39];?></span></td>
                <td><span class="style1"><?php echo $row[40]; ?></span></td>
				<td><span class="style1"><?php echo $row[41];?></span></td>
                <td><span class="style1"><?php echo $row[42]; ?></span></td>
				<td><span class="style1"><?php echo $row[43];?></span></td>
                
                
				</tr>
            
            <?php
			
			$j=0;
			
			foreach ($column as $valor) {
				///$valor <<<<< nombre de campo
				//if($j>2){
					
				//echo "<td><span class='style1'>".utf8_encode($row[$j])."</span></td>";
				/*
				echo '<td><span class="style1"><?php echo $row['.$j.']; ?></span></td>';
				//}
				$j++;
				*/
			}
			
			//echo "</tr>";
		
			
			
		}
	   
	   ?>






</table>



</body>
</html>