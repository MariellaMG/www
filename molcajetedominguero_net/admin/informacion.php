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

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar este negocio?")){
		$.get("negocio_eliminar_get.php?id="+t_id, function(data){
			$("#"+t_id).hide();
		});
	}else{
		
	}
}
function Hide(t_id){
	$("#"+t_id).hide("slow");
}

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar esta categoría?")){
		$.get("categoria_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Información
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
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                     <th>Región</th>
                     <th>Codigo Postal</th>
                    <th>Telefono</th>
                     
                    
                    
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM informacion ORDER BY rand() LIMIT 500 ";
	
	$pal = $_GET["q"];
	
	if($pal!=""){
		$qt = "SELECT * FROM informacion WHERE nombre LIKE '%$pal%' or addressLocality LIKE '%$pal%' ORDER BY nombre";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		
		$id_informacion = $rowt[0];
		$id_liga = $rowt[1];
		$nombre = $rowt[2];
		$streetAdress = $rowt[3];
		$adresLocality = $rowt[4];
		$addresRegion = $rowt[5];
		$postalCode= $rowt[6];
		$laimage= $rowt[7];
		$nombrefile= $rowt[8];
		$telefono= $rowt[9];
		$horarios= $rowt[10];
		$categorias= $rowt[11];
		
		$color = $rowt[6];
	
	?>
                  
                  <tr id="linea<?php echo $rowt[0]; ?>" >
                  
                    <td><input type="checkbox" id="check<?php echo $rowt[0]; ?>" /></td>
                    <td><?php echo utf8_encode($nombre); ?></td>
                    <td><?php echo utf8_encode($streetAdress); ?></td>
                    <td><?php echo $adresLocality; ?></td>
                    <td><?php echo utf8_encode($addresRegion); ?></td>
                    <td><?php echo utf8_encode($postalCode); ?></td>
                    <td><?php echo utf8_encode($telefono); ?></td>
                    
                    <td class="actions">
                    <a href="info_editar.php?id=<?php echo $rowt[0]; ?>" title="Edit this content"><img src="img/icons/edit.png" alt="" /></a>
                    <a href="#" title="Delete this content" onClick="Eliminar('<?php echo $rowt[0]; ?>');"><img src="img/icons/delete.png" alt="" /></a>
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