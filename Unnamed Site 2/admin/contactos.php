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
	
	if(confirm("Estas seguro que deseas borrar este contacto?")){
		$.get("contacto_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		
	}
}

function BorrarTodo(t_id){
	
	if(confirm("Estas seguro que deseas borrar TODOS los contactos?")){
		$.get("contactos_vaciar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Base de datos 
</h1>
<br><br>


	  <div class="notif warning">
            <strong>Borrar Todo !</strong> para eliminar todos los registros haz click en el icono 
            
            <a href="#" title="Delete this content" onClick="BorrarTodo();"><img src="img/icons/delete.png" alt="" /></a>

        </div>

<br><br>


<br>

<a href="exportar_contactos.php" target="_blank"><span><input name="Exportar" type="button" value="Exportar TODOS"></span></a>

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
<a href="exportar_contactos.php?k=<?php echo $k;  ?>" target="_blank"><span><input name="Exportar" type="button" value="Exportar <?php echo $dianom; ?>"></span></a>
<?php
}
 ?>

         
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
                

<div class="bloc">
    <div class="title">
        Listado
    </div>
    <div class="content">
        
        
   
        
        <table>
            <thead>
                <tr>
                   
                  <th>Usuario</th>
           
               <th><span class="style1">Fecha </span></th>



<th><span class="style1">Cliente</span></th>

<th><span class="style1">Edad</span></th>

<th><span class="style1">Estado civil</span></th>

<th><span class="style1">Ciudad</span></th>

<th><span class="style1">Telefono casa</span></th>

<th><span class="style1">Celular</span></th>

<th><span class="style1">Email</span></th>

<th><span class="style1">Opcion</span></th>

<th><span class="style1">Borrar</span></th>
               
              </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM contacto ORDER BY id_contacto DESC LIMIT 50 ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM contacto WHERE estatus='1' AND titulo LIKE '%$pal%' or descripcion LIKE '%$pal%' or intro LIKE '%$pal%'  or permalink LIKE '%$pal%' LIMIT 50";
	}
	
	
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
		
		$telefono_casa = "(".$rowt[10].") ".$rowt[12];
		
		$celular = $rowt[13];
		$email = $rowt[14];
		$opcion = $rowt[18];
		$fecha_alta = $rowt[11];
		
		/*
		$q_c = "SELECT categoria FROM categoria WHERE id_categoria='$id_categoria' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$categoria = $rowc[0];
		}
		*/
		$q_c = "SELECT nombre FROM colaborador WHERE id_colaborador='$id_colaborador' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$colaborador_nombre = $rowc[0];
		}
	?>
    
    
                  
          <tr id="linea<?php echo $id; ?>" class="lineas">
                    
                    <td><a name="linea<?php echo $id; ?>"></a><a href="usuario_listar.php?id=<?php echo $id_colaborador;?>"><?php echo $colaborador_nombre; ?></a></td>
                   
                   


<td><span class="style1"><?php echo utf8_encode($fecha); ?></span></td>



<td><span class="style1"><?php echo utf8_encode($cliente); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($edad); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($estado_civil); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($ciudad); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($telefono_casa); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($celular); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($email); ?></span></td>

<td><span class="style1"><?php echo utf8_encode($opcion); ?></span></td>
                    
                    
                     <td class="actions">
                    
                    <a href="#linea<?php echo $id; ?>" title="Delete this content" onClick="Eliminar('<?php echo $rowt[0]; ?>');"><img src="img/icons/delete.png" alt="" /></a>
                    </td>
                    
                   
              </tr>
                
       <?php
	   }
	   ?>
                         
                         
                               
                            </tbody>

        </table>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</div>





<h1>&nbsp;</h1>
<h1>&nbsp;</h1></div>
        
        
    </body>
</html>