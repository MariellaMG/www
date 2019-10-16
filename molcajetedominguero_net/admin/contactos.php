<?php
include("session.php");
?>
<?php
include("includes/mysql_infos2.php");
?>
<?php
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
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
	
	if(confirm("Estas seguro que deseas borrar este vendor?")){
		$.get("vendor_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		//////
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
          <h1><img src="img/icons/edit.png" alt="" />Eventos 
</h1>
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
           
           <div style="padding:15px; margin-top:10px; background-color:rgba(100, 100, 100, 0.3); border-radius:10px;">
           		
                
                <form action="#" id="search" class="search placeholder">
                    <label></label>
    
                    
               <input name="e" type="hidden" value="1">
                
                  <div class="input">
                      <label for="select"><strong>Evento</strong>:</label>
                        <select name="id_evento" id="id_evento">
                            <option  value="0">Elige uno</option>
                <?php
                $qt = " SELECT * FROM `evento`   ";
                echo $qt;
                $resultt = mysqli_query($link,$qt);
                while ($row = mysqli_fetch_row($resultt)){
                    //echo utf8_encode($row[0]);
					$sel="";
					if($_GET["id_evento"]==$row[0]){
						$sel = ' selected="selected" ';
					}
					
                    echo '<option value="'.$row[0].'" '.$sel.'>'.$row[1].'</option>
                    ';
                }
                ?>
                        </select>
                    </div>
                    
                    <br>
                    <input type="submit" value="Buscar" class="submit"/>
                    
                     </form>
        
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
                    <th>Fecha compra</th>
                    <th>Evento</th>
                    
                    <th>Costo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Address</th>
                    
                    <th>Postal Code</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                  
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM contacto ";
	
	$pal = $_GET["q"];			
	if($pal!=""){
		$qt = "SELECT * FROM contacto WHERE nombre LIKE '%$pal%' or apellido LIKE '%$pal%' or email LIKE '%$pal%'  or address LIKE '%$pal%' LIMIT 500";
	}
	
	$e = $_GET["e"];		
	$id_evento = 	$_GET["id_evento"];	
	if($e==1){
		$qt = "SELECT * FROM contacto WHERE id_evento = '$id_evento' ";
	}
	
	
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$fecha_compra = $rowt[1];
		
		$evento = $rowt[2];
		$id_evento = $rowt[3];
		
		$costo = $rowt[4];
		$nombre = $rowt[5];
		$apellido = $rowt[6];
		$email = $rowt[7];
		$address = $rowt[8];
		
		$postalcode = $rowt[9];
		$ciudad = $rowt[11];
		$estado = $rowt[12];
		
		//$descripcion = utf8_encode($nombre);
		//$nombre = utf8_encode($nombre);
		
		/*
		$q_c = "SELECT tipo FROM tipo WHERE id_tipo='$id_tipo' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$categoria = $rowc[0];
		}
		*/
		/*
		 <td><a href="<?php echo $streetview; ?>" target="_blank"><?php echo "streetview"; ?></a></td>
                  
				  
				  <th>Fecha compra</th>
                    <th>Evento</th>
                    
                    <th>Costo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Address</th>
		*/
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                   
                    <td><?php echo $fecha_compra; ?></td>
                    <td><?php echo $evento; ?></td>
                    <td><?php echo $costo; ?></td>
                    <td><?php echo $nombre." ".$apellido; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $address; ?></td>
                    
                    <td><?php echo $postalcode; ?></td>
                    <td><?php echo $ciudad; ?></td>
                    <td><?php echo $estado; ?></td>
                    
                    <td class="actions">
                    <a href="producto_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
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