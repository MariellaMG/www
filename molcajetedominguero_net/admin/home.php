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
                                                <h1><img src="img/icons/dashboard.png" alt="" />Tablero
</h1>
                

<div class="bloc left">
    <div class="title">
        Dashboard
    </div>
    <div class="content dashboard">
    	
        <div class="center">
           
             <a href="vendors.php" class="shortcut">
                <img src="img/contact.png" alt="" width="48" height="48" />
                Vendors Destacados
            </a>
            
             <a href="productos.php" class="shortcut">
                <img src="img/picture.png" alt="" width="48" height="48" />
                Productos Destacados
            </a>
      
          <div class="cb"></div>
        </div>
        
    </div>
</div>






                

<div class="bloc right">
    <div class="title">
        Resumén
    </div>
    <div class="content">
    
        <div >
    
            <table class="noalt">
                <thead>
                    <tr>
                        <th colspan="2"><em>Contenido</em></th>

                    </tr>
                </thead>
                <tbody>
                
                
                  <tr>
                        <td width="16%"><h4><?php
	$qt = "SELECT count( * ) FROM `categoria` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td width="84%">Categorias</td>
                    </tr>
                    
                
                <tr>
                        <td width="16%"><h4><?php
	$qt = "SELECT count( * ) FROM `losproductos` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td width="84%">Los productos</td>
                    </tr>
                
                
                    <tr>
                        <td width="16%"><h4><?php
	$qt = "SELECT count( * ) FROM `losvendor` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td width="84%">Vendors</td>
                    </tr>
                
                
                
                    <tr>
                        <td><h4><?php
	$qt = "SELECT count( * ) FROM `marcas` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo number_format($rowt[0]);
	}
	?></h4></td>
                        <td>Marcas</td>
                    </tr>
                    
                    
                
                    <tr>
                        <td><h4><?php
	$qt = "SELECT count( * ) FROM `producto` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td>Productos destacados</td>
                    </tr>
                
                    <tr>
                        <td><h4><?php
	$qt = "SELECT count( * ) FROM `usuario` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td>Usuario</td>
                    </tr>
                    
                
                    <tr>
                        <td><h4><?php
	$qt = "SELECT count( * ) FROM `vendor` ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo $rowt[0];
	}
	?></h4></td>
                        <td>Vendors Destacados</td>
                    </tr>
                
  
                    
                     <tr>
                        <td><h4>&nbsp;</h4></td>
                        <td>&nbsp;</td>
                    </tr>
                    
             

                    
                    
                </tbody>
            </table>
        </div>
        
        
        <div class="cb"></div>

    </div>
</div>




<div class="cb"></div>
<div class="notif tip bloc" id="tip">

    <strong>Tips :</strong> 
    
    <?php
	//SELECT count( * ) FROM `entrada`;
	$qt = "SELECT tip FROM tip ORDER BY RAND() LIMIT 1 ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		echo utf8_encode($rowt[0]);
	}
	?>
    
    <a href="#" class="close" onClick="Hide('tip');"></a>
</div>

<h1>&nbsp;</h1>
<h1>&nbsp;</h1></div>
        
        
    </body>
</html>