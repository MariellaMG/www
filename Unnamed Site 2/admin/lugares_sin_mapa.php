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
		$.get("lugar_eliminar_get.php?id="+t_id, function(data){
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
                
                
                <?php
					$qt = "SELECT count(*) FROM lugar WHERE latitud='19.41036036043098' and longitud='-99.16975378990173' ";
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		$errores = $rowt[0];
	}
				?>
                
                
        <!--            
              CONTENT 
                        --> 
        <div id="content">
          <h1><img src="img/icons/edit.png" alt="" />Lugares sin mapa (<?php echo $errores; ?>)
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
                    <th>Categoria</th>
                    <th>Permalink</th>
                    <th>Descripcion</th>
                    <th>StreetView</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM lugar WHERE latitud='19.41036036043098' and longitud='-99.16975378990173' ORDER BY id_lugar DESC LIMIT 500 ";
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_categoria = $rowt[1];
		$id_estado = $rowt[2];
		$id_ciudad = $rowt[3];
		$nombre = $rowt[4];
		$permalink = $rowt[5];
		$latitud = $rowt[6];
		$longitud = $rowt[7];
		$zoom = $rowt[8];
		$streetview = $rowt[9];
		$descripcion = $rowt[10];
		$imagen = $rowt[11];
		$fotos = $rowt[12];
		$archivos = $rowt[13];
		
	
		
		$q_c = "SELECT nombre FROM categoria WHERE id_categoria='$id_categoria' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$categoria = $rowc[0];
		}
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    <td><a href="lugar_editar.php?id=<?php echo $id; ?>"><?php echo $nombre; ?></a></td>
                     <td><?php echo $categoria; ?></td>
                    <td><a href="/ubicacion/<?php echo $permalink; ?>" target="_blank"><?php echo $permalink; ?></a></td>
                    <td><?php echo substr($descripcion,0,100)."..."; ?></td>
                    
                    <td><a href="<?php echo $streetview; ?>" target="_blank"><?php echo "streetview"; ?></a></td>
                    
                    <td class="actions">
                    <a href="contacto_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
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