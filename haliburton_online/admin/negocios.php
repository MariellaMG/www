<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
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
	
	if(confirm("Estas seguro que deseas borrar esta entrada?")){
		$.get("lugar_eliminar_get.php?id="+t_id, function(data){
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
          <h1><img src="img/icons/edit.png" alt="" />Lugares 
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
                    <th>Peso imagenes</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            
            
                <?php
	$qt = "SELECT * FROM negocio WHERE panel = 2 ORDER BY id_negocio DESC LIMIT 200 ";
	
	$pal = $_GET["q"];			
	if($pal!=""){
		$qt = "SELECT * FROM negocio WHERE negocio LIKE '%$pal%' or descripcion LIKE '%$pal%' or calle LIKE '%$pal%'  or permalink LIKE '%$pal%' LIMIT 500";
	}
	
	
	
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $row[0];
		$id_negocio = $row[0];
		$negocio = $row[1];
		$calle = $row[2];
		$email = $row[3];
		$emailcontacto = $row[4];
		$longitud = $row[5];
		$latitud = $row[6];
		$streetview = $row[7];
		$id_subtipo = $row[8];
		$telefono = $row[9];
		$paginaweb = $row[10];
		$descripcion = $row[11];
		$rapida = $row[12];
		$domicilio = $row[13];
		$id_paquete = $row[14];
		$thumb = $row[15];
		$internet = $row[16];
		$permalink = $row[17];
		$descdestacado = $row[18];
		$iddestacado = $row[19];
		$keywords = $row[20];
		$esmundial = $row[21];
		$promomundial = $row[22];
		$zoom = $row[23];
		$peso_imagenes = $row[24];
		$optimizado = $row[25];
		$id_editor = $row[26];
		$imagen = $row[27];
		$fotos = $row[28];
		$archivos = $row[29];
		$html = $row[30];
		$panel = $row[31];
		$mesas = $row[32];
		$terraza = $row[33];
		$pantallas = $row[34];
		$wifi = $row[35];
		$velocidad = $row[36];
		$tipos = $row[37];
		
		$descripcion = utf8_encode($descripcion);
		$negocio = utf8_encode($negocio);
		
		
		$q_c = "SELECT tipo FROM tipo WHERE id_tipo='$id_tipo' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$categoria = $rowc[0];
		}
		
		/*
		 <td><a href="<?php echo $streetview; ?>" target="_blank"><?php echo "streetview"; ?></a></td>
                  
		*/
		
	?>
                  
                  <tr id="linea<?php echo $id; ?>">
                    <td><input type="checkbox" id="check<?php echo $id; ?>" /></td>
                    <td><a href="negocio_editar.php?id=<?php echo $id; ?>"><?php echo $negocio; ?></a></td>
                     <td><?php echo $categoria; ?></td>
                    <td><a href="/visita/<?php echo $permalink; ?>" target="_blank"><?php echo $permalink; ?></a></td>
                    <td><?php echo substr($descripcion,0,10)."..."; ?></td>
                    
                   <td><?php echo FileSizeConvert($peso_imagenes); ?></td>
                   
                    <td class="actions">
                    <a href="negocio_editar.php?id=<?php echo $id; ?>" title="Editar"><img src="img/icons/edit.png" alt="" /></a>
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