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
	if(confirm("Estas seguro que deseas borrar este paquete?")){
		$.get("paquetes_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Paquetes
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
                    <th>Region</th>
                    <th>Ciudad</th>
                    <th>Duracion</th>
                     <th>Titulo</th>
                    <th>Sub-Titulo</th>
                    <th>Imagen</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM Paquetes WHERE id_contenido!='0'  ";
	
	$pal = $_GET["q"];
	
	if($pal!=""){
		$qt = "SELECT * FROM Paquetes WHERE titulo LIKE '%$pal%' or descripcion LIKE '%$pal%' or permalink LIKE '%$pal%' AND id_contenido!=0 ";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		
		$id_paquete = $rowt[0];
		$region = $rowt[1];
		$ciudad = $rowt[2];
		$duracion = $rowt[3];
		$titulo = $rowt[4];
		$subtitulo = $rowt[5];
		
		$imagen = $rowt[12];
		
				
		/*
		$qcat = "SELECT count(*) FROM entrada WHERE id_categoria='$id_categoria'";
		//echo $qcat;
		$cont = 0;
		$resultta = mysql_query($qcat, $db);
		while ($rowta = mysql_fetch_row($resultta)){
			$cont = $rowta[0];
		}
		*/
		$color = $rowt[6];
	
	?>
                  
                  <tr id="linea<?php echo $rowt[0]; ?>" >
                  
                    <td><input type="checkbox" id="check<?php echo $rowt[0]; ?>" /></td>
                    <td><?php echo utf8_encode($region); ?></td>
                    <td> &nbsp; <?php echo utf8_encode($ciudad); ?></td>
                    <td><?php echo utf8_encode($duracion); ?></td>
                    <td><?php echo utf8_encode($titulo); ?></td>
                     <td><?php echo utf8_encode($subtitulo); ?></td>
                     
                      <td><img src="<?php echo $imagen; ?>" height="150" /></td>
                    
                    <td class="actions">
                    <a href="paquete_editar.php?id=<?php echo $rowt[0]; ?>" title="Edit this content"><img src="img/icons/edit.png" alt="" /></a>
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