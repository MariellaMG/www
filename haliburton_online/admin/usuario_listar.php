<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");


$id = $_GET['id'];

$q_c = "SELECT id_colaborador,nombre,foto FROM colaborador WHERE id_colaborador='$id' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$colaborador_id = $rowc[0];
			$colaborador_nombre = $rowc[1];
			$colaborador_foto = $rowc[2];
		}
		
		
	$q_c = "SELECT count(*) FROM contacto WHERE id_colaborador='$id' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$contactos = $rowc[0];
		}
		
			$q_c = "SELECT count(*) FROM compra WHERE id_colaborador='$id' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$compras = $rowc[0];
		}

		
		
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panel de administración</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        <link rel="stylesheet" href="../cms/css/reset.css" />
        
        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="../cms/css/style.css" />

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="../cms/css/jqueryui/jqueryui.css" />
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->
        <link rel="stylesheet" href="../cms/js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="../cms/js/jwysiwyg/jquery.wysiwyg.js"></script>

        
        
        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script type="text/javascript" src="../cms/js/tooltipsy.min.js"></script>
        
        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script type="text/javascript" src="../cms/js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="../cms/js/excanvas.js"></script>
        
        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script type="text/javascript" src="../cms/js/zoombox/zoombox.js"></script>

        <link rel="stylesheet" href="../cms/js/zoombox/zoombox.css" />
        
        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script type="text/javascript" src="../cms/js/visualize.jQuery.js"></script>
        
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
		$.get("entrada_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
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
                <a href="" class="button profile"><img src="../cms/img/icons/huser.png" alt="" /></a>
                Hola, 
                <a href="#"><?php include("usuariologeado.php");  ?></a>
                |
                <a href="../cms/logout.php">Logout</a>

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
        
        <div style="margin-top:50px;">
        
        <div style="float:left; width:120px;">
        
        <a href="http://escapeposadas.info/uploaded/<?php echo $colaborador_foto; ?>.jpg" target="_blank">
        <img src="http://escapeposadas.info/uploaded/thumb_<?php echo $colaborador_foto; ?>.jpg" width="100" />
        </a>
        
        </div>
        
        <div style="float:left;">
        
          <h1 style="padding-top:5px;"><?php echo $colaborador_nombre; ?></h1>
          
          <h2 style="font-size:14px; margin:2px;">Contactos totales: <?php echo $contactos; ?></h2>
          
          <h2 style="font-size:14px; margin:2px;">Compras publicadas: <?php echo $compras; ?></h2>
          
       
        </div>  
         <div style="clear:both"></div>
         
         </div>
          
          
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
                

<div class="bloc">
    <div class="title">
        Contactos (Base de datos)
    </div>
    <div class="content">
        
        
   
        
        <table>
            <thead>
                <tr>
                    
                    <th>Cliente</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Consultor</th>
                    
              </tr>
            </thead>

            <tbody>
            
            
                <?php
				
				$id = $_GET['id'];
				
	$qt = "SELECT * FROM contacto WHERE id_colaborador = '$id' ORDER BY id_contacto DESC LIMIT 50 ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM contacto WHERE id_colaborador = '$id' AND  titulo LIKE '%$pal%' or descripcion LIKE '%$pal%' or intro LIKE '%$pal%'  or permalink LIKE '%$pal%' LIMIT 50";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$fecha = $rowt[1];
		$evento = $rowt[2];
		$consultor = $rowt[3];
		$cliente = $rowt[4];
		$edad = $rowt[5];
		$estado_civil = $rowt[6];
		$ciudad = $rowt[7];
		
		$telefono_casa = $rowt[11];
		$celular = $rowt[9];
		$email = $rowt[10];
		$fecha_alta = $rowt[11];
		
		
		
		
	?>
                  
              <tr id="linea<?php echo $id; ?>">
                   
                    <td><?php echo $cliente; ?></td>
                     <td><?php echo $edad; ?></td>
                    <td><?php echo $telefono_casa; ?></td>
                    <td><?php echo $consultor; ?></td>
                    
                  
              </tr>
                
       <?php
	   }
	   ?>
                         
                         
                               
                            </tbody>

        </table>
    

        
    </div>
</div>
<br>


<div class="bloc">
    <div class="title">
        Listado (Ventas)
    </div>
    <div class="content">
        
        
   
        
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Ocupacion</th>
                    <th>Ingresos</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM compra WHERE id_colaborador='$colaborador_id' ORDER BY id_compra DESC LIMIT 50 ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM compra WHERE id_colaborador='$colaborador_id' ( AND titulo LIKE '%$pal%' or cliente LIKE '%$pal%' or destino LIKE '%$pal%'  or ocupacion LIKE '%$pal%') LIMIT 50";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_colaborador = $rowt[1];
		
		$destino  = $rowt[6];
		$cliente =  $rowt[8];
		
		$ocupacion  = $rowt[10];
		$ingresos  = $rowt[22];
		
		
		$q_c = "SELECT nombre FROM colaborador WHERE id_colaborador='$id_colaborador' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$colaborador_nombre = $rowc[0];
		}
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    
                     <td><?php echo $cliente; ?></td>
                    <td><?php echo $destino; ?></td>
                    <td><?php echo $ocupacion; ?></td>
                    <td><?php echo $ingresos; ?></td>
                    
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