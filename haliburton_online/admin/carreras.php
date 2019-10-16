<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>

<?php

/*
$qt = "TRUNCATE TABLE `carrera` ";
$result = mysql_query($qt, $db);
	



	$qt = "SELECT DISTINCT (plandeestudios) FROM uni";
	
	
	$carreras = "";
	
	$result = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($result)){
			$carreras .= ",".$row[0];
	}
	$carreras = str_replace(" y ",",",$carreras);
	$carreras = str_replace(" Y ",",",$carreras);
	$carreras = str_replace(" y  ",",",$carreras);
	$carreras = str_replace("  y ",",",$carreras);
	$carreras = str_replace(" , ",",",$carreras);
	$carreras = str_replace(" ,",",",$carreras);
	$carreras = str_replace(", ",",",$carreras);
	$carreras = str_replace("\n",",",$carreras);
	$carreras = str_replace("\n","",$carreras);
	
	//echo $carreras;
	
	$carr = split(",",$carreras);
	$carr = array_unique($carr);
	
	//print_r($carr);
	
	foreach ($carr as $clave => $valor) {
		
		
		
    	if($valor != "muchos" && $valor != "Licenciaturas" && $valor != "licenciaturas" && $valor != "Licenciaturas" && $valor != "Semestral" && $valor!="semestral" && $valor !="1"){
			
			$valor = str_replace("\n","",$valor);
			$valor = trim($valor);
			$qi = "INSERT INTO `carrera` (`id_carrera` ,`carrera`) VALUES (NULL , '$valor');
			";
			//echo $qi;
			$result = mysql_query($qi, $db);
		}
	}
	*/

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
	
	if(confirm("Estas seguro que deseas borrar esta carrera?")){
		$.get("carrera_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Categorías
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
                    
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM carrera ORDER BY carrera ";
	
	$pal = $_GET["q"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM carrera WHERE carrera LIKE '%$pal%'";
	}
	
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
	
	?>
                  
                  <tr id="linea<?php echo $rowt[0]; ?>">
                    <td><input type="checkbox" id="check<?php echo $rowt[0]; ?>" /></td>
                    <td><?php echo $rowt[1]; ?></td>
      
      
                    <td class="actions">
                    <a href="categoria_editar.php?id=<?php echo $rowt[0]; ?>" title="Edit this content"><img src="img/icons/edit.png" alt="" /></a>
                    <a href="#" title="Delete this content" onClick="Eliminar('<?php echo $rowt[0]; ?>');"><img src="img/icons/delete.png" alt="" /></a>
                    </td>
                </tr>
                
       <?php
	   }
	   ?>
                         
                         
                               
                            </tbody>

        </table>
        
        
        
        
       <br><br>
       
       <h2>Para regenerar las carreras haz click <a href="carreras_regenerar.php">aqui</a>. Esto eliminará todas las carreras creadas y las creará de nuevo
       <h2>
        
        
        
        
        
        
    </div>
</div>






<h1>&nbsp;</h1>
<h1>&nbsp;</h1></div>
        
        
    </body>
</html>