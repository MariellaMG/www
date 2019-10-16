<?php
include("session.php");
?>
<?php
include("includes/mysql_infos2.php");
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
	
	if(confirm("Estas seguro que deseas borrar este usuario?")){
		$.get("usuario_eliminar_get.php?id="+t_id, function(data){
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
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                <a href="#"><?php //include("usuariologeado.php");  ?></a>
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
                
                
                
                <?php
				$qt = " SELECT * FROM `mision` WHERE activa ='1' LIMIT 1  ";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_mision = $rowt[0];
		$id_campana=$rowt[1];
		$titulo=$rowt[2];
		$descripcion=$rowt[3];
		$liga=$rowt[4];
		
		$id_revisar_last = $rowt[8];
	}
				?>
                
        <!--            
              CONTENT 
                        --> 
        <div id="content">
          <h1><img src="img/icons/edit.png" alt="" />Usuarios registrados 
</h1>
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
                

<div class="bloc">
    <div class="title">
        Listado
    </div>
    <div class="content">
        
        
   
        
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Nombre de usuario</th>
                    <th>Contraseña</th>
           
                    <th>Nombre Completo</th>
                    
                    <th>Reviso</th>
                    
                    <th>Activas</th>
                    
                    <th>LIGA</th>
                    
                    <th>ULTIMA MISION (<?php echo $titulo; ?>)</th>
                    
                    <th>CUENTAS A RESPONSABLE</th>
                    
                    <th>CUENTAS por CREAR</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM capturista WHERE usuario NOT LIKE 'anonimo' ORDER BY reviso DESC ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM usuario WHERE usuario LIKE '%$pal%' or descripcion LIKE '%$pal%' or imagen LIKE '%$pal%'  or archivos LIKE '%$pal%'";
	}
	
	
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$nombre = $rowt[1];
		$usuario = $rowt[2];
		$pass = $rowt[3];
	
	
	$reviso = $rowt[7];
	$activo = $rowt[8];
	$inactivo = $rowt[9];
		
	
	
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    
                    <td>
					<a href="usuario_listar.php?id=<?php echo $id; ?>" title="Editar">
					<?php echo $usuario; ?>
                    </a>
                    </td>
                    
                     <td><?php echo $pass; ?>&nbsp;</td>
                   
                    
                    <td><?php echo $nombre; ?></td>
                    
                    <td><?php echo $reviso; ?></td>
                    <td><?php echo $activo; ?></td>
                    
                    
                    <td><a href="http://tinkeringdesigns.com/revisar/?usr=<?php echo $usuario; ?>" target="_blank" ><?php echo $nombre; ?></a></td>
                    
                    <td><a href="http://tinkeringdesigns.com/mision/?idm=<?php echo $id_mision; ?>&usr=<?php echo $usuario; ?>" target="_blank" >
					<?php echo $id_mision; ?>&usr=<?php echo $usuario; ?>
                    </a></td>
                    
                    
                    
                    
                    
                   <td><a href="http://tinkeringdesigns.com/responsable/?usr=<?php echo $usuario; ?>" target="_blank" >Responsable:<?php echo $nombre; ?></a></td>
                   
              <td><a href="http://tinkeringdesigns.com/porcrear/?usr=<?php echo $usuario; ?>" target="_blank" >Responsable:<?php echo $nombre; ?></a></td>
                    
                  
                    <td class="actions">
                    <a href="usuario_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
                    <a href="#" title="Eliminar" onClick="Eliminar('<?php echo $id; ?>');"><img src="img/icons/delete.png" alt="" /></a>
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