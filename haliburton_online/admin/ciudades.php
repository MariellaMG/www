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
        
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?language=es&key=AIzaSyBDWeh4k3DcbeApzdqiX92bsqMQz4-bBV4"></script>
        
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
	
	if(confirm("Estas seguro que deseas borrar esta ciudad?")){
		$.get("ciudad_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Ciudades
</h1>

<h2><a href="ciudad_agregar.php">Agregar ciudad</a></h2>

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
                    <th>Mapa</th>
                    <th>Nombre</th>
                    <th>Extra</th>
                    <th>Permalink</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
				
	$pal = $_GET["q"];
				
	$qt = "SELECT * FROM ciudad ORDER BY nombre ";
	
	if($pal!=""){
		$qt = "SELECT * FROM ciudad WHERE nombre LIKE '%$pal%' or extra LIKE '%$pal%' or permalink LIKE '%$pal%'";
	}
	
	
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $row[0];
		$ciudad = $row[1];
		$latitud = $row[2];
		$longitud = $row[3];
		$zoom = $row[4];
		$extra = $row[5];
		$permalink = $row[6];
	
	?>
    
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td>
                    
                    <input type="checkbox" id="check<?php echo $id; ?>" />
                    
                    </td>
                    
                    <td width="350">
                    
                    <a href="ciudad_editar.php?id=<?php echo $id; ?>">
                    <img src="http://maps.google.com/maps/api/staticmap?center=<?php echo $latitud; ?>,<?php echo $longitud; ?>&zoom=<?php echo $zoom; ?>&size=320x240&sensor=false&markers=color:red|<?php echo $latitud; ?>,<?php echo $longitud; ?>&key=AIzaSyBDWeh4k3DcbeApzdqiX92bsqMQz4-bBV4" style="border:solid 1px #CCC; margin:4px;" />
                    
                    
                    
                    </a>
                    
                    
                    </td>
                    
                    
                    <td><strong><?php echo $ciudad; ?></strong></td>
                    <td><?php echo $extra; ?></td>
                    <td>
                    <a href="ciudad_editar.php?id=<?php echo $id; ?>"><?php echo $permalink; ?></a>
                    </td>
                    <td class="actions">
                    <a href="ciudad_editar.php?id=<?php echo $id; ?>" title="Edit this content"><img src="img/icons/edit.png" alt="" /></a>
                    <a href="#" title="Delete this content" onClick="Eliminar('<?php echo $id; ?>');"><img src="img/icons/delete.png" alt="" /></a>
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