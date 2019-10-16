<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>5 -- traducir intro</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	setTimeout(function(){window.location.reload(1);}, 10000);
}

</script>
</head>

<body>
<?php
include("includes/mysql_infos.php");
?>
<?php 

$id = $_GET['id'];

	$qt = "SELECT * FROM negocio WHERE peso_imagenes=0 AND thumb!='' LIMIT 1";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		$id = $row[0];
		$id_negocio = $row[0];
		$negocio = $row[1];
		$calle = $row[2];
		$email = $row[3];
		$emailcontacto = $row[4];
		$longitud = $row[5];
		$latitud = $row[6];
		$streetview = $row[7];
		$id_tipo = $row[8];
		$id_subtipo = $row[9];
		$telefono = $row[10];
		$paginaweb = $row[11];
		$descripcion = $row[12];
		$rapida = $row[13];
		$domicilio = $row[14];
		$id_paquete = $row[15];
		$thumb = $row[16];
		$internet = $row[17];
		$permalink = $row[18];
		$descdestacado = $row[19];
		$iddestacado = $row[20];
		$keywords = $row[21];
		$esmundial = $row[22];
		$promomundial = $row[23];
		$panel = $row[24];
		$times = $row[25];
		$id_zona = $row[26];
		$imagen = $row[27];
		$fotos = $row[28];
		$id_editor = $row[29];
		$zoom = $row[30];
	}
	
	if($zoom==0){
		$zoom = 16;
	}
	
	echo "<h1>".$negocio."</h1>";
	echo "<h2>".$thumb."</h2>";
	

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

<div class="input medium">

<?php $peso_imagenes = 0; ?>

            <label for="input2">Imagenes Actuales</label>
            <div style="float:left; width:130px; margin-right:5px; background:#FFF;">
            <div style="width:130px; height:80px; overflow:hidden;">
            <a href="../archivos/<?php echo $thumb; ?>" target="_blank">
            <img src="../archivos/<?php echo $thumb; ?>" width="130">
            </a>
            </div><br>
            <b><a href="/archivos/<?php echo $thumb; ?>" target="_blank"><?php echo $thumb; ?></a></b>
            <?php echo FileSizeConvert(filesize("../archivos/".$thumb)); ?>
            <?php $peso_imagenes += filesize("../archivos/".$thumb); ?>
            </div>
            
            <?php
			$qt = "SELECT * FROM imagen WHERE id_negocio = '$id_negocio' ";
			$resultt = mysql_query($qt, $db);
			while ($row = mysql_fetch_row($resultt)){
				//echo utf8_encode($row[0]);
				$t = $row[1];
				?>
                
                <div style="float:left; width:130px; margin-right:5px; background:#FFF;">
                <div style="width:130px; height:80px; overflow:hidden;">
                <a href="/archivos/<?php echo $t; ?>" target="_blank">
                <img src="/archivos/<?php echo $t; ?>" width="130">
                </a>
                </div><br>
                <b><a href="/archivos/<?php echo $t; ?>" target="_blank"><?php echo $t; ?></a></b>
                <?php echo FileSizeConvert(filesize("../archivos/".$t)); ?>
                <?php $peso_imagenes += filesize("../archivos/".$t); ?>
                </div>
                
                <?php
			}
			?>
            
            <div style="clear:both;"></div>
            
            <?php 
			
			if($peso_imagenes<=0){
				$peso_imagenes = 1;
			}
			$qt = "UPDATE `negocio` SET `peso_imagenes` = '$peso_imagenes' WHERE `negocio`.`id_negocio` = '$id_negocio';";
			$resultt = mysql_query($qt, $db);
			
			?>
            
        </div>
        
        
 </body>
</html>