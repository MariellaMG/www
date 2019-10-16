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
	
	if(confirm("Estas seguro que deseas borrar este personaje?")){
		$.get("personaje_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Personajes sin imagen (<?php
	$qt = "SELECT count( * ) FROM `personaje` WHERE imagen='' ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?>) 
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
                     <th>Foto</th>
                    <th>Nombre</th>
                    <th>Permalink</th>
                    <th>Fecha Nacimiento</th>
                    <th>Biografia</th>
                   <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
 
 <?php

	$qt = "SELECT * FROM personaje WHERE imagen='' ORDER BY total DESC LIMIT 50 ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM personaje WHERE nombre LIKE '%$pal%' or bio LIKE '%$pal%' or fecha_nacimiento LIKE '%$pal%'  or permalink LIKE '%$pal%' LIMIT 50";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$id_personaje = $rowt[0];
		$nombre = $rowt[1];
		$roles = $rowt[2];
		$foto = $rowt[3];
		$bio = $rowt[4];
		$fecha_nacimiento = $rowt[5];
		$imagenes = $rowt[6];
		$permalink = $rowt[7];
		
		$nombre = utf8_encode($nombre);
		$bio = utf8_encode($bio);
		
		$poster = $foto;
		
		$total = $rowt[12];
		
		$tp = strrpos($poster,"/");
	$poster_med = substr($poster,0,$tp+1)."med_".substr($poster,$tp+1);
	
	$tp = strrpos($poster,"/");
	$poster_thumb = substr($poster,0,$tp+1)."thumb_".substr($poster,$tp+1);
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    <td>
					
					<?php 
					
					if($foto!=""){
						echo "<img src='".$poster_thumb."' height='70' />";
					}
					
					
					?>
                    
                    </td>
                    
                    <td><?php echo $nombre; ?></td>
                     <td><a href="/personaje/<?php echo $permalink; ?>" target="_blank"><?php echo $permalink; ?></a></td>
                    <td><?php echo $fecha_nacimiento; ?></td>
                    <td><?php echo substr($bio,0,103)."..."; ?></td>
                    
                     <td><?php echo $total; ?></td>
                    
                    
                    <td class="actions">
                    <a href="personaje_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
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