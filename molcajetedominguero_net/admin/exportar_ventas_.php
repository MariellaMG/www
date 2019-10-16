<?php
include("includes/mysql_infos.php");
?>
<?
/*
    header("Content-Type: application/vnd.ms-excel");
    header("Expires: 0″");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0″");
    header("content-disposition: attachment;filename=Ventas.xls");
	*/
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
			<td><span class="style1"><strong>id_colaborador</strong></span></td>
			<td><span class="style1"><strong>fecha</strong></span></td>
			<td><span class="style1"><strong>consultor2</strong></span></td>
			<td><span class="style1"><strong>promocion</strong></span></td>
			<td><span class="style1"><strong>vigencia</strong></span></td>
			<td><span class="style1"><strong>destino</strong></span></td>
			<td><span class="style1"><strong>fechas</strong></span></td>
			<td><span class="style1"><strong>cliente</strong></span></td>
			<td><span class="style1"><strong>edad</strong></span></td>
			<td><span class="style1"><strong>ocupacion</strong></span></td>
			<td><span class="style1"><strong>conyuge</strong></span></td>
			<td><span class="style1"><strong>conyuge_edad</strong></span></td>
			<td><span class="style1"><strong>conyuge_ocupacion</strong></span></td>
			<td><span class="style1"><strong>ciudad</strong></span></td>
			<td><span class="style1"><strong>estado</strong></span></td>
			<td><span class="style1"><strong>cp</strong></span></td>
			<td><span class="style1"><strong>lada_oficina</strong></span></td>
			<td><span class="style1"><strong>lada_casa</strong></span></td>
			<td><span class="style1"><strong>telefono_oficina</strong></span></td>
			<td><span class="style1"><strong>telefono_casa</strong></span></td>
			<td><span class="style1"><strong>telefono_celular</strong></span></td>
			<td><span class="style1"><strong>ingresos</strong></span></td>
			<td><span class="style1"><strong>correo</strong></span></td>
			<td><span class="style1"><strong>comentarios</strong></span></td>
			<td><span class="style1"><strong>fecha_alta</strong></span></td>
			<td><span class="style1"><strong>fecha_modificacion</strong></span></td>
			<td><span class="style1"><strong>extra</strong></span></td>
			<td><span class="style1"><strong>cantidad</strong></span></td>
			<td><span class="style1"><strong>banco</strong></span></td>
			<td><span class="style1"><strong>tarjeta</strong></span></td>
			<td><span class="style1"><strong>vencimiento</strong></span></td>
			<td><span class="style1"><strong>titular</strong></span></td>
			<td><span class="style1"><strong>tipo</strong></span></td>
			<td><span class="style1"><strong>codigo</strong></span></td>
			<td><span class="style1"><strong>extra1</strong></span></td>
			<td><span class="style1"><strong>opcion</strong></span></td>
 <?php
		  $qc = "SELECT * FROM compra ORDER BY id_compra DESC LIMIT 50";
	
		  
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
			
			?>
            
             <tr><td><span class="style1"><?php echo $row[0]; ?></span></td>
				<td><span class="style1"><?php echo $row[1]; ?></span></td>
				<td><span class="style1"><?php echo $row[2]; ?></span></td>
				<td><span class="style1"><?php echo $row[3]; ?></span></td>
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
				<td><span class="style1"><?php echo $row[14]; ?></span></td>
				<td><span class="style1"><?php echo $row[15]; ?></span></td>
				<td><span class="style1"><?php echo $row[16]; ?></span></td>
				<td><span class="style1"><?php echo $row[17]; ?></span></td>
				<td><span class="style1"><?php echo $row[18]; ?></span></td>
				<td><span class="style1"><?php echo $row[19]; ?></span></td>
				<td><span class="style1"><?php echo $row[20]; ?></span></td>
				<td><span class="style1"><?php echo $row[21]; ?></span></td>
				<td><span class="style1"><?php echo $row[22]; ?></span></td>
				<td><span class="style1"><?php echo $row[23]; ?></span></td>
				<td><span class="style1"><?php echo $row[24]; ?></span></td>
				<td><span class="style1"><?php echo $row[25]; ?></span></td>
				<td><span class="style1"><?php echo $row[26]; ?></span></td>
				<td><span class="style1"><?php echo $row[27]; ?></span></td>
				<td><span class="style1"><?php echo $row[28]; ?></span></td>
				<td><span class="style1"><?php echo $row[29]; ?></span></td>
				<td><span class="style1"><?php echo $row[30]; ?></span></td>
				<td><span class="style1"><?php echo $row[31]; ?></span></td>
				<td><span class="style1"><?php echo $row[32]; ?></span></td>
				<td><span class="style1"><?php echo $row[33]; ?></span></td>
				<td><span class="style1"><?php echo $row[34]; ?></span></td>
				<td><span class="style1"><?php echo $row[35]; ?></span></td>
				<td><span class="style1"><?php echo $row[36]; ?></span></td>
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