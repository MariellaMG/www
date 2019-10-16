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
	
	if(confirm("Estas seguro que deseas borrar este video?")){
		$.get("video_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Correos 
</h1>

<h2 style="font-size:20px;"><a href="export.php">Descargar CSV</a></h2>
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
            
                
       <div style="margin-top:20px; font-size:12px;">
       
       <?php 
	   
	   $qt = "SELECT count(*) FROM combinacion";
	   $resultt = mysql_query($qt, $db);
	   while ($rowt = mysql_fetch_row($resultt)){
			$totales = $rowt[0];
	   }
	   
	   $pags=$totales/50;
	   
	   for($i=1;$i<$pags;$i++){
		   
		   ?>
		   
		   <div style="float:left; width:30px; height:25px; background:#CCC; margin:5px; text-align:center; padding-top:7px; font-size:16px;">
           
           <a href="videos.php?p=<?php echo $i; ?>">
           <?php 
		   
		   echo $i;
		   
		   ?>
           
           </a>
           </div>
		   
           <?php
           
	   }
	   
	   //echo $totales;
	   
	   ?>
       <div style="clear:both"></div>
       
       </div>

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
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Combinacion</th>
                    <th style="display:none;">Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM combinacion ORDER BY id_combinacion DESC LIMIT 50";
	
	$pal = $_GET["q"];
	$p=$_GET["p"];
				
	
	if($pal!=""){
		$qt = "SELECT * FROM combinacion WHERE nombre LIKE '%$pal%' OR ail LIKE '%$pal%' order by video desc ";
	}
	
	if($p!=""){
		$pos=($p-1)*50;
		$qt = "SELECT * FROM combinacion ORDER BY id_combinacion DESC LIMIT  $pos,50";
	}
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$top = $rowt[1];
		$bot = $rowt[2];
		$nombre = $rowt[3];
		$email = $rowt[4];
		$fecha = $rowt[5];
		$extra = $rowt[6];
		$reenvio = $rowt[7];
		$sexo = $rowt[8];
		
		
		if($sexo==0){
			$sex="men";
		}else{
			$sex="wom";
		}
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    <td>
                    <?php echo ucfirst($nombre); ?>
                    </td>
                     <td><?php echo $email; ?></td>
                    <td>
                    
                   <?php echo $fecha; ?>
                   
                    </td>
                    
                    <td>
                    
                    <a href="/previo/?t=<?php echo $top; ?>&b=<?php echo $bot; ?>&s=<?php echo $sexo; ?>&n=<?php echo $nombre; ?>" target="_blank">
                    <img src="../catalogo_dos/<?php echo $sex; ?>/top<?php echo $top; ?>_bot<?php echo $bot; ?>.jpg" width="100" />
                    </a>
                    
                    </td>
                    
                    <td class="actions" style="display:none;">
                    
                    <a href="video_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
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