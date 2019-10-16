<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php 

$id = $_GET['id'];

	$qt = "SELECT * FROM negocio WHERE id_negocio = '$id' LIMIT 1";
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
		$peso_imagenes = $row[31];
		$optimizado = $row[32];
	}
	
	if($zoom==0){
		$zoom = 16;
	}

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
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        
        <?php include "forms.php"; ?>
        
       <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});

function Eliminar(t_id){
	if(confirm("Estas seguro que deseas borrar esta ciudad?")){
		$.get("ciudad_eliminar_get.php?id="+t_id, function(data){
			$("#"+t_id).hide();
		});
	}else{
		
	}
}
function Hide(t_id){
	$("#"+t_id).hide("slow");
}

function CambiaStreet(){
	//alert($("#streetview").val());
	/*
	if($("#streetview").val()!=""){
		$("#street_pre").show();
		$("#streetframe").attr("src",$("#streetview").val());
	}
	*/
}

function Validar(){
	
	error = 0;
	
	if($("#nombre").val()==""){
		error = 1;
		$("#nombre").css("border-color","#ff0000");
	}else{
		$("#nombre").css("border-color","#000000");
	}
	
	if($("#extra").val()==""){
		error = 1;
		$("#extra").css("border-color","#ff0000");
	}else{
		$("#extra").css("border-color","#000000");
	}
	
	
	$('textarea').each(function(index) {
    	//alert(index + ': ' + $(this).text());
		if($(this).val()==""){
			error=1;
			$(this).css("border-color","#ff0000");
		}else{
			$(this).css("border-color","#000000");
		}
  	});	
	
	
	
	if(error==1){
		$("#error").show();
	}else{
		$("#error").hide();
		$("#form1").submit();
	}
}




var timestamp = "";
var cont_foto = 0;

var frames_d="";
var archivos_d = "";
var server = "http://solomorelia.com/uploadedimgs/";
var iconos_str="avi.png,bmp.png,divx.png,dll.png,excel.png,file.png,files.png,firefox.png,flv.png,htm.png,html.png,ie7.png,iso.png,jpeg.png,max.png,mov.png,movie.png,mp3.png,mp4.png,mpeg.png,music.png,onenote.png,opera.png,outlook.png,pdf.png,photo.png,png.png,powerpoint.png,ppt.png,psd.png,pub.png,publisher.png,rar.png,rm.png,rtf.png,torrent.png,tr.png,txt.png,visio.png,vob .png,wav.png,wma.png,word.png,zip.png,xls.png";
 
var archivos_array = new Array();
function terminaUploadAll(t_t,t_ext,t_server){
	//alert("terminaUPOAD  ALL MULTI "+t_server); 
	
	server = t_server;
	var icon = t_ext.substr(1);
	var icon_array = new Array();
	icon_array=iconos_str.split(","); 
	//alert(icon_array);
	var c=0;
	for(var i=0;i<icon_array.length;i++){
		if(icon_array[i]==(icon+".png")){
			c++;
		}
	}
	if(c==0){
		icon="file";
	}
	
	if(t_ext==".jpg" || t_ext==".jpeg" || t_ext==".png" || t_ext==".gif" || t_ext==".bmp" || t_ext==".wbmp"){
		//frames_d += "<img src='"+server+"uploaded/"+t_t+".jpg'  width='100'  />";
		frames_d += "<div class='files'><img src='"+server+""+t_t+".jpg'  width='100' id='frame"+cont_foto+"' onclick='Foto("+cont_foto+");'  /></div>";
		if($("#imagen").val()==""){
			//$("#imagen").val(server+"uploaded/"+t_t+".jpg");
		}
		cont_foto++;
	}else{
		archivos_d += "<div class='files'><a href='"+server+""+t_t+t_ext+"'  target='_blank'>";
		archivos_d += "<img src='iconos/"+icon+".png'  width='100' /><br/>"+t_t+t_ext+"</a></div>";
		
		archivos_array[archivos_array.length] = server+t_t+t_ext;
		
		$("#archivos").val(archivos_array.toString());
		//alert($("#archivos").val());
	}
	
	
	
	$("#losarchivos").html(archivos_d+"<div style=' clear:both; '></div>");
	
	$("#thumb").html(frames_d+"<div style=' clear:both; '></div>");
	
	$("#seleccionadas").show();
	$("#generadas").show();	
	terminaUpload(t_t,t_ext);
}


var lista_fotos = new Array();
var lista_imagenes = new Array();

var cont_fotos = 0;
var imgs = "";
var campo_fotos = "";

function Foto(t_num){

	for(i=0;i<=lista_fotos.length;i++){
		if(lista_fotos[i]==t_num){
			return(0);
		}
	}
	
	lista_fotos[lista_fotos.length] = t_num;
	lista_imagenes[lista_imagenes.length] = timestamp+"_frame"+t_num+".jpg";
	
	if(lista_fotos.length==1){
		$("#imagen").val($("#frame"+t_num).attr("src"));
	}
	

 	imgs += "<img src='"+$("#frame"+t_num).attr("src")+"' height='89' id='elegida"+lista_fotos.length+"'  />";
	
	$("#elegidas").html(imgs);
	
	
	if(campo_fotos==""){
		campo_fotos = $("#frame"+t_num).attr("src");
	}else{
		campo_fotos += ","+$("#frame"+t_num).attr("src");
	}

	
	$("#fotos").val(campo_fotos);
	
}

function LimpiarFotos(){
	lista_fotos = new Array();
	lista_imagenes = new Array();
	$("#elegidas").html("");
	imgs = "";
	campo_fotos = "";
	$("#fotos").val("");
	$("#imagen").val("");
}

//////////VIDEOS
   
function terminaUpload(t_t,t_ext){
	//alert("termina upload: "+t_t+"  "+t_ext);
	t=t_ext;
	if (t==".avi" || t==".mov" || t==".mp4" || t==".ogv" || t==".mpeg" || t==".mjpeg" || t==".mpg"  || t==".wmv" || t==".flv" || t==".mpg"   ){
		terminaSoloFoto_(t_t);
		timestamp = t_t;
		if($("#video").val()==""){
			$("#video").val(server+"imagenes-lugares/"+t_t+"_.flv");
		}
		PreVideo();
	}
}

function terminaSoloFoto(t_t,t_file,t_ext){
	timestamp = t_t;
	//alert(t_t+"  "+t_file+"  "+t_ext);
	t=t_ext;
	if (t==".avi" || t==".mov" || t==".mp4" || t==".ogv" || t==".mpeg" || t==".mjpeg" || t==".mpg"  || t==".wmv" || t==".flv" || t==".mpg"   ){
		$("#seleccionadas").show();
		$("#generadas").show();
		$("#thumb").prepend("<div class='files'><div><b>Generando imagenes...</b></div><br/><img src='loading.gif' /></div>");
		$("#pre_video_ligas").html("<h3>Procesando video...</h3><br/><img src='loading.gif' />");
	}
	//timeMsg();
}     


function terminaSoloFoto_(t_t){
	timestamp = t_t;
	cont_foto++;
	
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame1.jpg' width='133' height='89' id='frame1' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame2.jpg' width='133' height='89' id='frame2' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame3.jpg' width='133' height='89' id='frame3' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame4.jpg' width='133' height='89' id='frame4' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame5.jpg' width='133' height='89' id='frame5' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	frames_d += "<div class='files'>";
	frames_d += "<img src='"+server+"uploaded/"+timestamp+"_frame6.jpg' width='133' height='89' id='frame6' onclick='Foto("+cont_foto+");'  />";
	frames_d += "</div>";
	cont_foto++;
	$("#timestamp").val(t_t);
	//$("#thumb").html(frames_d);
	
	$("#thumb").html(frames_d+"<div style=' clear:both; '></div>");
	
	$("#seleccionadas").show();
	$("#generadas").show();
}

function PreVideo(){
	var ligas ="";
	
	ligas += ' <video width="320" height="240" autobuffer controls poster="'+server+"uploaded/"+timestamp+'_frame1.jpg" >';
	ligas += '<source src="'+server+"uploaded/"+timestamp+'_.mp4" type="video/mp4" />';
  	ligas += '<source src="'+server+"uploaded/"+timestamp+'_.ogv" type="video/ogg" />';
	ligas += '</video><br/><br/>';
	
	ligas += "<a href='"+server+"uploaded/"+timestamp+"_.flv"+"' target='_blank' >"+server+"uploaded/"+timestamp+"_.flv</a><br/>";
	ligas += "<a href='"+server+"uploaded/"+timestamp+"_.mp4"+"'  target='_blank' >"+server+"uploaded/"+timestamp+"_.mp4</a><br />";
	//ligas += "<a href='"+server+"uploaded/"+timestamp+"_hd.mp4"+"'  target='_blank' >"+server+"uploaded/"+timestamp+"_hd.mp4</a><br/>";
	ligas += "<a href='"+server+"uploaded/"+timestamp+"_.ogv"+"'  target='_blank' >"+server+"uploaded/"+timestamp+"_.ogv</a><br/>";
	
	$("#pre_video_ligas").html(ligas);
}


function OnClickStreet(){
	if($("#streetview").val()!=""){
		var t_str = String($("#streetview").val());
		if(t_str.indexOf("@")!=-1){
			var t_liga = t_str.substring(t_str.indexOf("@")+1);
			var res = t_liga.split(",");
			
			$("#latitud").val(res[0]);
			$("#longitud").val(res[1]);
			
			//alert($("#latitud").val()+"  "+$("#longitud").val());
			
			var myLatlng = new google.maps.LatLng($("#latitud").val(), $("#longitud").val());
			map.setCenter(myLatlng);
			map.setZoom(16);
			marker.setPosition(myLatlng);
			
			$("#latitud").val(res[0]);
			$("#longitud").val(res[1]);
			
			posicion();
		}
		
	}
}

</script>
        
        
        
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
<script type="text/javascript">

var map;
var marker;
//var image = "../imagenes/iconos/restaurant.png";

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>);
  var myOptions = {
    zoom: <?php echo $zoom; ?>,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  
  google.maps.event.addListener(map, 'dragend', function(event) {
	posicion();
  });  
  
  google.maps.event.addListener(map, 'zoom_changed', function(event) {
	posicion();
  });
  
	marker = new google.maps.Marker({
		position: myLatlng, 
		map: map
	});
	marker.setDraggable(true);
	google.maps.event.addListener(marker, 'dragend', function(event) {
		posicion();
	});  
	
	
  $("#latitud").val(myLatlng.lat());
  $("#longitud").val(myLatlng.lng());
  
}
function posicion(){
	pos = marker.getPosition();
  	$("#latitud").val(pos.lat());
  	$("#longitud").val(pos.lng());
	$("#zoom").val(map.getZoom());
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar Negocio '<?php echo $negocio; ?>'</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="lugar_agregar_form.php">



    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
       
   		<div class="input">
            <label for="select">Editor</label>
            <select name="id_editor" id="id_editor">
            	<option value="0">Elige uno</option>
    <?php
	$qt = "SELECT * FROM editor ORDER BY editor ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div> 
        
        
      
        <div class="input medium">

            <label for="input2">Nombre</label>
            <input type="text" id="negocio" name="negocio" value="<?php echo $negocio; ?>" />
            <span>Ingresa el nombre del negocio</span>
        </div>
        
        
            
        <div class="input">
            <label for="select">Tipo de negocio</label>
            <select name="id_tipo" id="id_tipo">
            	<option value="0">Elige una</option>
    <?php
	$qt = "SELECT * FROM tipo ORDER BY tipo ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div>  
        
        
        <div class="input">
            <label for="select">Sub-Tipo de negocio</label>
            <select name="id_subtipo" id="id_subtipo">
            	<option value="0">Elige una</option>
    <?php
	$qt = "SELECT * FROM tipo ORDER BY tipo ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div>  
        
        

		<div class="input medium">

            <label for="input2">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="10" rows="20" style="height:300px;"><?php echo utf8_encode($descripcion); ?></textarea>
            
        </div>
        
        
	  
        
        
      
      <input name="latitud" id="latitud" type="hidden">
<input name="longitud" id="longitud" type="hidden">
  <input name="zoom" id="zoom" type="hidden" value="12">    
  <br>
  <div id="map_canvas" style="width:100%; height:450px;">


</div>

<br>
        <div class="input medium">

            <label for="input2">StreetView</label>
         
              
               <textarea name="streetview" id="streetview" cols="10" rows="10"></textarea>
               
             <br>
          
               <input type="button" name="actualizar_mapa" id="actualizar_mapa" value="Tomar ubicacion del streetview" onClick="OnClickStreet();" >
            
        </div>
        
           <div id="street_pre" style="width:100%; display:none;">
                    <iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="" id="streetframe"></iframe>

            
            </div>
        

<br><br>


<div class="input medium">

<?php $peso_imagenes = 0; ?>

            <label for="input2">Imagenes Actuales</label>
            <div style="float:left; width:130px; margin-right:5px; background:#FFF; border:solid 2px #CCCCCC;">
            <div style="width:130px; height:80px; overflow:hidden;">
            <a href="/archivos/<?php echo $thumb; ?>" target="_blank">
            <img src="/archivos/<?php echo $thumb; ?>" width="130">
            </a>
            </div><br>
            <b><a href="/archivos/<?php echo $thumb; ?>" target="_blank"><?php echo $thumb; ?></a></b>
            <?php echo FileSizeConvert(filesize("../archivos/".$thumb)); ?>
            <?php $peso_imagenes += filesize("../archivos/".$thumb); ?>
            </div>
            
            <?php
			$qt = "SELECT * FROM imagen WHERE id_negocio = '$id_negocio' ";
			$resultt = mysql_query($qt, $db);
			$conta = 0;
			while ($row = mysql_fetch_row($resultt)){
				$conta++;
				//echo utf8_encode($row[0]);
				$id_imagen = $row[0];
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
                <?php $thumbNew = OptimizarImagen($optimizado,"../archivos/".$t,$conta,$permalink); ?>
                <?php
					
					if($thumbNew!=""){
						$qt = "UPDATE `imagen` SET `imagen` = '$thumbNew' WHERE `imagen`.`id_imagen` = '$id_imagen';";
						mysql_query($qt, $db);
						
						$qt = "UPDATE `negocio` SET `optimizado` = '1' WHERE `negocio`.`id_negocio` = '$id_negocio';";
						mysql_query($qt, $db);
					}
					
				?>
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
 

<?php
function OptimizarImagen($opt,$img,$c,$permalink){
	//echo "<h1>Optimizar iumagen</h1>";
	$extension = substr (strrchr ($img, "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	$imageRoute = "../archivos/".$permalink."_imagen_".$c.".jpg";
	$imageRouteName = $permalink."_imagen_".$c.".jpg";
	$uploadedfile = $img;
	
	if($opt==0){
	
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="wbmp"){
		
		if($ext=="png"){
			$src = imagecreatefrompng($uploadedfile);
		}else if($ext=="jpeg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="jpg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="gif"){
			$src = imagecreatefromgif($uploadedfile);
		}else if($ext=="bmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else if($ext=="wbmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else{
			$src = imagecreatefrompng($uploadedfile);
		}
	
		
		// Capture the original size of the uploaded image
		list($width,$height)=getimagesize($uploadedfile);
		
		
		$newwidth=640;
		$newheight = ($newwidth*$height)/$width;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		
		$src2 = imagecreatetruecolor(640,$newheight);
		imagecopyresampled($src2,$src,0,0,0,0,640,$newheight,$width,$height);
		
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		
		imagejpeg($tmp,$imageRoute,60);	
		
	
		echo "<img src='".$imageRoute."' width='100' />";
		echo FileSizeConvert(filesize($imageRoute));
		
		imagedestroy($src);
		imagedestroy($tmp);
		
		return ($imageRouteName);
	}	
	}
}
if($optimizado==0){
    $extension = substr (strrchr ( $thumb , "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	
	$uploadedfile = "../archivos/".$thumb;

	$imageRouteTmbMed = "../archivos/".$permalink."_thumb.jpg";
	
	$thumbDos = $permalink."_thumb.jpg";
	
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="wbmp"){
		
		
		if($ext=="png"){
			$src = imagecreatefrompng($uploadedfile);
		}else if($ext=="jpeg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="jpg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="gif"){
			$src = imagecreatefromgif($uploadedfile);
		}else if($ext=="bmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else if($ext=="wbmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else{
			$src = imagecreatefrompng($uploadedfile);
		}
		list($width,$height)=getimagesize($uploadedfile);
		
		$newwidth2=180;
		$newheight2 = ($newwidth2*$height)/$width;
		$thumbNew=imagecreatetruecolor($newwidth2,$newheight2);
		
		$altobase = (180*$height)/$width;
		$src3 = imagecreatetruecolor(180,$newheight2);
		imagecopyresampled($src3,$src,0,0,0,0,180,$newheight2,$width,$height);
	
		imagecopyresampled($thumbNew,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
		imagejpeg($thumbNew,$imageRouteTmbMed,60);

	
		echo "<img src='".$imageRouteTmbMed."' />";
		echo FileSizeConvert(filesize($imageRouteTmbMed));
		
		
		imagedestroy($src);
		imagedestroy($thumbNew); 
	}
	$qt = "UPDATE `negocio` SET `thumb` = '$thumbDos' WHERE `negocio`.`id_negocio` = '$id_negocio';";
	//echo $qt;
	mysql_query($qt, $db);
	
	$qt = "UPDATE `negocio` SET `optimizado` = '1' WHERE `negocio`.`id_negocio` = '$id_negocio';";
	mysql_query($qt, $db);
}
?>
        
        

<div class="input medium" >

     <input name="archivos" id="archivos" type="hidden" value="">
     <input name="fotos" id="fotos" type="hidden" value="">
     <input name="imagen" id="imagen" type="hidden" value="">

           <label for="input2">Archivos</label>
      
            
           
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" id="div_imagen">
            
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_all.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="15.0.0.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_all.swf" width="400" height="50">
                <!--<![endif]-->
                <param name="quality" value="high">
                <param name="wmode" value="opaque">
                <param name="swfversion" value="15.0.0.0">
                 <param name="allowScriptAccess" value="allways" />
                <param name="expressinstall" value="../Scripts/expressInstall.swf">
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                
                
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
            
            </div>
           
            
            
            <div id="losarchivos" style="width:100%; background:#FFF; margin-top:10px;">
          
            </div>
            <div style="clear:both;"></div>
            
            
            <div id="thumb" style="width:100%; background:#FFF; margin-top:10px;">
          
            </div>
            <div style="clear:both;"></div>
            
            <br><br>
            
            <div id="seleccionadas" style="display:none;">    
<h2>Fotos seleccionadas:</h2><br />
<div id="elegidas" style="background-color:#CCC; min-height:93px; min-width:133px; padding-top:3px;">

</div> 
<input name="" type="button" onclick="LimpiarFotos();" value="Limpiar fotos" />
<br />
</div>



<div id="video_pre">

</div>


<div id="pre_video_ligas">

</div>
 

<div id="ligasvideo" style="display:none;">
<h2>Ligas de video:</h2><br />
<div id="ligasvideo_int">
</div>
</div>



<br /><br />


            
            
            
        </div>


        <div class="submit">
            <input value="Agregar" onClick="Validar();" />
        </div>
        <br><br>
        
    </div>
    </form>
</div>

<br><br>


<div class="cb"></div>





</div>
        
        
    </body>
</html>