<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panel de administración</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        <link rel="stylesheet" href="css/reset.css" />
        
        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="css/style.css" />

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/jqueryui/jqueryui.css" />
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->
        <link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>

        
        
        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script type="text/javascript" src="js/tooltipsy.min.js"></script>
        
        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script type="text/javascript" src="js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="js/excanvas.js"></script>
        
        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script type="text/javascript" src="js/zoombox/zoombox.js"></script>

        <link rel="stylesheet" href="js/zoombox/zoombox.css" />
        
        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script type="text/javascript" src="js/visualize.jQuery.js"></script>
        
        <!-- Uniform - http://uniformjs.com/ -->
       <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
});


function Hide(t_id){
	$("#"+t_id).hide("slow");
}

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar esta entrada?")){
		$.get("venta_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		
	}
}

function BorrarTodo(t_id){
	
	if(confirm("Estas seguro que deseas borrar TODAS las ventas?")){
		$.get("ventas_vaciar_get.php?id="+t_id, function(data){
			$(".lineas").hide("slow");
		});
	}else{
		
	}
}

</script>
        
    </head>

    <body class="white">
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                <a href="#">Administrador</a>
                |
                <a href="logout.php">Logout</a>

            </div>
            <div class="right">
                <form action="#" id="search" class="search placeholder">
                    <label></label>
                    <input type="text" value="<?php echo $_GET['q']; ?>" name="q" class="text"/>
                    <input type="submit" value="rechercher" class="submit"/>
                </form>
            </div>

        </div>
                
                
        <!--            
                SIDEBAR
                         --> 
        <div id="sidebar">
        
<?php	include "menu.php"; ?>


        </div>
                
                
                
                
        <!--            
              CONTENT 
                        --> 
        <div id="content">
          <h1><img src="img/icons/edit.png" alt="" />Ventas 
</h1><br><br>

  <div class="notif warning">
            <strong>Borrar Todo !</strong> para eliminar todos los registros haz click en el icono 
            
            <a href="#" title="Delete this content" onClick="BorrarTodo();"><img src="img/icons/delete.png" alt="" /></a>

        </div>

<br><br>



<a href="exportar_ventas.php" target="_blank"><span><input name="Exportar" type="button" value="Exportar TODOS"></span></a>

<?php
for($k=0;$k<=3;$k++){


if($k==0){
	$dia="DATE(fecha) >= CURDATE()-7";
	$dianom = "los ultimos 7 dias";
}

if($k==1){
	$dia="DATE(fecha) >= CURDATE()-15";
	$dianom = "los ultimos 15 dias";
}
if($k==2){
	$dia="MONTH(fecha) = MONTH(CURRENT_DATE)";
	$dianom = "este mes";
}
if($k==3){
	$dia="MONTH(fecha) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
	$dianom = "el mes pasado";
}

?>
<a href="exportar_ventas.php?k=<?php echo $k;  ?>" target="_blank"><span><input name="Exportar" type="button" value="Exportar <?php echo $dianom; ?>"></span></a>
<?php
}
 ?>




  
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
                

<div class="bloc">
    <div class="title">
        Listado
    </div>
    <div class="content">
        
        
   
   
        
      

<table >

<tr>

			<td><span class="style1"><strong>Usuario</strong></span></td>
			<td><span class="style1"><strong>Fecha</strong></span></td>
			
			<td><span class="style1"><strong>Promocion</strong></span></td>
			<td><span class="style1"><strong>Vigencia</strong></span></td>
			<td><span class="style1"><strong>Destino</strong></span></td>
			<td><span class="style1"><strong>Fechas</strong></span></td>
			<td><span class="style1"><strong>Cliente</strong></span></td>
			<td><span class="style1"><strong>Edad</strong></span></td>
			<td><span class="style1"><strong>Ocupacion</strong></span></td>
		
			
			<td><span class="style1"><strong>Telefono oficina</strong></span></td>
			<td><span class="style1"><strong>Telefono casa</strong></span></td>
            
            
            <td align="center"><span class="style1"><strong>Formato</strong></span></td>
            <td align="center"><span class="style1"><strong>Borrar</strong></span></td>
			
       
	
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
            
             <tr id="linea<?php echo $row[0]; ?>" class="lineas">
             
				<td><span class="style1"><a href="usuario_listar.php?id=<?php echo $row[0]; ?>"><?php echo $colaborador_nombre; ?></a></span></td>
				<td><span class="style1"><?php echo $row[25]; ?></span></td>
				
				<td><span class="style1"><?php echo $row[4]; ?></span></td>
				<td><span class="style1"><?php echo $row[5]; ?></span></td>
				<td><span class="style1"><?php echo $row[6]; ?></span></td>
				<td><span class="style1"><?php echo $row[7]; ?></span></td>
				<td><span class="style1"><?php echo $row[8]; ?></span></td>
				<td><span class="style1"><?php echo $row[9]; ?></span></td>
				<td><span class="style1"><?php echo $row[10]; ?></span></td>
		

                
				<td><span class="style1"><?php echo "(".$row[17].")".$row[19]; ?></span></td>
				<td><span class="style1"><?php echo "(".$row[18].")".$row[20]; ?></span></td>
               
               
                <td align="right" style="text-align:right;">
                    <a href="/html/ventas3.php?id=<?php echo $row[0]; ?>" target="_blank" ><img src="img/icons/posts.png" width="17" alt=""  /></a>
                    </td>
                
               <td align="right" style="text-align:right;">
                    <a href="#" title="Delete this content" onClick="Eliminar('<?php echo $row[0]; ?>');"><img src="img/icons/delete.png" alt="" /></a>
                    </td>
	
				
                
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</div>





<h1>&nbsp;</h1>
<h1>&nbsp;</h1></div>
        
        
    </body>
</html>