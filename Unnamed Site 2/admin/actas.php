<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Panel de administración</title>
        

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
	
	if(confirm("Estas seguro que deseas borrar esta pregunta?")){
		$.get("acta_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		
	}
}
function Modificar(t_id){
	
	if(confirm("Se va a Modificar")){
		
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
          <h1><img src="img/icons/edit.png" alt="" />Actas 
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
                     <th>Fecha de Alta</th>
                     <th>Acta</th>
                    <th>Respuesta</th>
                    <th>Clasificaci��n</th>
                    <th>Tomo</th>
                       <th>Fecha</th>
                    <th>Hojas</th>
                    <th>Sesi��n</th>
                    <th>Periodo Administrativo</th>
                    <th>Asunto</th>
                    <th>Anexo</th>
                    <th>Observaciones</th>
                    <th>No. Sesi��n</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM acta ORDER BY id_acta DESC ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * acta WHERE pregunta LIKE '%$pal%' or opcion1 LIKE '%$pal%' or opcion2 LIKE '%$pal%'  or opcion3 LIKE '%$pal%'";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$pregunta = $rowt[17];
		$imagen = $rowt[2];
		$respuesta = $rowt[3];
		$opcion1 = $rowt[4];
		$opcion2 = $rowt[5];
		$opcion3 = $rowt[6];
		$opcion4 = $rowt[7];
		
		$sesion = $rowt[8];
		$periodo = $rowt[10];
		$asunto = $rowt[11];
		$anexo = $rowt[12];
		$observ = $rowt[13];
		$nosesion = $rowt[14];
		
		$imagen = $rowt[18];
		
		$rest = substr($asunto, 0, 100); 
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    <td><?php echo utf8_encode($pregunta); ?></td>
                    
                    <td>
                    <a href="/uploaded/<?php echo $imagen; ?>" target="_blank" >
                    <img src="/uploaded/thumb_<?php echo $imagen; ?>" width="100"/>
                    </a>
                    </td>
                    
                     <td><?php echo $respuesta; ?></td>
                    <td><?php echo utf8_encode($opcion1); ?></td>
                    
                    <td><?php echo utf8_encode($opcion2); ?></td>
                    
                      <td><?php echo utf8_encode($opcion3); ?></td>
                    
                    <td><?php echo utf8_encode($opcion4); ?></td>
                    
                     <td><?php echo utf8_encode($sesion); ?></td>
                    <td><?php echo utf8_encode($periodo); ?></td>
                    <td><?php echo utf8_encode($rest); ?></td>
                    <td><?php echo utf8_encode($anexo); ?></td>
                    <td><?php echo utf8_encode($observ); ?></td>
                    <td><?php echo utf8_encode($nosesion); ?></td>
                    <td class="actions">
                    
                   
                    <a href="#" title="Eliminar" onClick="Eliminar('<?php echo $id; ?>');"><img src="img/icons/delete.png" alt="" /></a>
                    <a href="acta_editar.php?id=<?php echo $rowt[0]; ?>" title="Modificar" onClick="Modificar('<?php echo $id; ?>');"><img src="img/icons/edit.png" alt="" /></a>
                    
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