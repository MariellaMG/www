<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php

$qt = "SELECT * FROM Paquetes WHERE id_paquete='".$_GET['id']."' ";
	
	$pal = $_GET["q"];
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		
		$id_paquete = $rowt[0];
		$region = $rowt[1];
		$ciudad = $rowt[2];
		$duracion = $rowt[3];
		$titulo = $rowt[4];
		$subtitulo = $rowt[5];
		$precio = $rowt[6];
		$tipo = $rowt[7];
		$id_categoria = $rowt[8];
		$popular = $rowt[9];
		$destacado = $rowt[10];
		$poster = $rowt[11];
		$imagen = $rowt[12];
		$descripcion = $rowt[13];
		$fotos = $rowt[14];
		$permalink = $rowt[15];
		$id_zona = $rowt[16];
		
		$latitud=$rowt[17];
		$longitud=$rowt[18];
		$zoom=$rowt[19];
		
		$vigencia=$rowt[22];
		$fecha=$rowt[21];
		
		$imagen = $rowt[12];
		
	}
	
	if($zoom==0){
		$zoom=10;
	}
	if($latitud==0){
		$latitud=16.7790069;
		$longitud=-93.105300;
	}
	
	
	$titulo = utf8_encode($titulo);
	$subtitulo = utf8_encode($subtitulo);
	$duracion = utf8_encode($duracion);
	$descripcion = utf8_encode($descripcion);
	$region = utf8_encode($region);
	$ciudad = utf8_encode($ciudad);

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
        <script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
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

var archivos_array = new Array();

var server="http://universaltravel.com.mx/uploaded/";

function terminaUpload(t_t){
	//alert("terminaUPOAD  ALL MULTI "+t_t); 
	
	//alert("terminaUpload");
	
	frames_d += "<div class='files'><img src='"+server+""+t_t+".jpg'  width='100' id='frame"+cont_foto+"' onclick='Foto("+cont_foto+");'  /></div>";
	if($("#imagen").val()==""){
		$("#imagen").val(server+"uploaded/"+t_t+".jpg");
	}
	cont_foto++;

	
	
	
	//$("#losarchivos").html(archivos_d+"<div style=' clear:both; '></div>");
	
	$("#thumb").html(frames_d+"<div style=' clear:both; '></div>");
	
	$("#seleccionadas").show();
	$("#generadas").show();	
	//terminaUpload(t_t,t_ext);
	
	
	//alert("fin");
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
   
function terminaUploadPreVideo(t_t,t_ext){
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

function terminaPDF(t_t,t_ext,t_server){
	//alert("terminaPDF");
	$("#pdf").val("http://cushman.pro/uploaded/"+t_t+t_ext);
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

function posicion(){
	pos = marker.getPosition();
  	$("#latitud").val(pos.lat());
  	$("#longitud").val(pos.lng());
	$("#zoom").val(map.getZoom());
}

function terminaUploadOLD(t_t){
	
	
	
	frames_d = "<img src='"+server+"archivos/"+t_t+".jpg'  width='160'  />";
	
	
	$("#thumb").html(frames_d);
	$("#imagen").val(t_t);
	$("#seleccionadas").show();
	$("#generadas").show();	
}

//ExternalInterface.call("terminaUploadAll",timestamp,extension,"http://nice-n-easy.co/archivos/");

function terminaSilueta(t_datos){
	//alert(t_datos);
	$("#silueta").val(t_datos);
}

function terminaUploadAllSilueta(t_time,t_ext,t_server){
	//CargaLaImagenDelFondoDeLaSilueta
	$("#silueta_img").val(t_server+t_time+t_ext);
	//alert($("#silueta_img").val());
}

function terminaUploadAll(t_time,t_ext,t_server){
	
	t_ext = t_ext.substr(1);
	
	//frames_d = "<a href='"+t_server+t_time+"."+t_ext+"'><img src='../iconos/"+t_ext+".png'  width='120'  /></a>";
	
	ligas = "";
	
	ligas += ' <video width="320" height="240" autobuffer controls poster="'+$("#imagen").val()+'" >';
	ligas += '<source src="'+t_server+t_time+"."+t_ext+'" type="video/mp4" />';
	ligas += '</video><br/><br/>';
	
	
	//$("#thumbs").html(frames_d);
	
	
	$("#thumbs").html(ligas);
	
	//alert(t_server+t_time+t_ext);

	$("#video").val(t_server+t_time+"."+t_ext);
	//$("#seleccionadas").show();
	//$("#generadas").show();	
}

</script>
        
        
        

<script type="text/javascript" src="http://maps.google.com/maps/api/js?language=es&key=AIzaSyBDWeh4k3DcbeApzdqiX92bsqMQz4-bBV4"></script>

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
function Centrar(lat,long){
	//alert("CEntrar: "+lat+"  -  "+long);
	var myLatlng = new google.maps.LatLng(lat, long);
	marker.setPosition(myLatlng);
	map.setCenter(myLatlng);
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar paquete '<?php echo $titulo; ?>' </h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="paquete_editar_form.php">

<input name="id_paquete" id="id_paquete" type="hidden" value="<?php echo $id_paquete; ?>" >

<input name="permalink" id="permalink" type="hidden" value="<?php echo $permalink; ?>" >

	
<input name="video" id="video" type="hidden" value="<?php echo $video; ?>" >
<input name="silueta_img" id="silueta_img" type="hidden" value="<?php echo $imagen; ?>">


    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">

        
        
      
        <div class="input medium">

            <label for="input2">Titulo</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" />
            <span>Nombre del paquete</span>
        </div>
        
          <div class="input medium">

            <label for="input2">Sub Titulo</label>
            <input type="text" id="subtitulo" name="subtitulo" value="<?php echo $subtitulo; ?>" />
            <span>Subtitulo del paquete</span>
        </div>
        
         <div class="input medium">

            <label for="input2">Precio</label>
            <input type="text" id="precio" name="precio" value="<?php echo $precio; ?>" />
            <span>Precio del paquete</span>
        </div>
       
        
        
        <div class="input medium">

            <label for="input2">Región/País</label>
            <input type="text" id="region" name="region" value="<?php echo $region; ?>" />
            <span>Ingresa la región o país del viaje</span>
        </div>
        
        
        <div class="input medium">

            <label for="input2">Ciudad</label>
            <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad; ?>" />
            <span>Ingresa la ciudad del paquete</span>
        </div>
        
        
         <div class="input medium">

            <label for="input2">Duración</label>
            <input type="text" id="duracion" name="duracion" value="<?php echo $duracion; ?>" />
            <span>Duración del viaje</span>
        </div> 
        
         <div class="input medium">

            <label for="input2">Vigencia:</label>
            <input type="text" id="vigencia" name="vigencia" value="<?php echo $vigencia; ?>" />
            <span>Duración del viaje</span>
        </div> 
        
        
         <div class="input medium">

            <label for="input2">Fechas:</label>
          
            <textarea name="fecha" id="fecha" cols="" rows="" style="height:100px;"><?php echo $fecha; ?></textarea>
            
            <span>Duración del viaje</span>
        </div> 
        
        
      	
        
        
        
            
        <div class="input">
            <label for="select">Categor&iacute;a</label>
            <select name="id_categoria" id="id_categoria">
            	<option value="0">Elige una</option>
    <?php
	$qt = "SELECT * FROM categoria ORDER BY categoria ";
	$resultt = mysql_query($qt, $db);
	
	//$id_categoria="";
	
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		
		$sel="";
		if($id_categoria==$row[0]){
			$sel=" selected ";
		}
		
		echo '<option value="'.$row[0].'" '.$sel.'>'.utf8_encode($row[1]).'</option>
		';
	}
	?>
            </select>
        </div> 
        
        
        <div class="input">
            <label for="select">Tipo</label>
            <select name="tipo" id="tipo">
            	<option value="0">Elige un tipo</option>
    <?php
	$qt = "SELECT * FROM tipo ORDER BY tipo ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		
		$sel="";
		if($tipo==$row[0]){
			$sel=" selected ";
		}
		
		echo '<option value="'.$row[0].'" '.$sel.' >'.utf8_encode($row[1]).'</option>
		';
	}
	?>
            </select>
        </div> 
        
          <div class="input">
            <label for="select">Zona</label>
            <select name="id_zona" id="id_zona">
            	<option value="0">Elige una zona del mapa</option>
    <?php
	$qt = "SELECT * FROM zona ORDER BY id_zona ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		
		$sel="";
		if($id_zona==$row[0]){
			$sel=" selected ";
		}
		
		echo '<option value="'.$row[0].'" '.$sel.'>'.utf8_encode($row[1]).'</option>
		';
	}
	?>
            </select>
        </div>  
        
        

		<div class="input medium">

            <label for="input2">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="10" rows="10"><?php echo $descripcion; ?></textarea>
            
        </div>
        
     
        
        
        
        <br>
        
        
         <div class="input">
            <label for="select">Popular </label>
            
            <select name="popular" id="popular" >
          
            	<option value="0" <?php if($popular==0){	echo " selected ";	}  ?> >No</option>
                <option value="1" <?php if($popular==1){	echo " selected ";	}  ?> >Si</option>
                
            </select>
        </div>  
        
         <div class="input">
            <label for="select">Destacado </label>
            
            <select name="destacado" id="destacado" >
            	
                <option value="0" <?php if($destacado==0){	echo " selected ";	}  ?> >No</option>
                <option value="1" <?php if($destacado==1){	echo " selected ";	}  ?> >Si</option>
                
                
            </select>
        </div>  
        
        <div class="input">
            <label for="select">Poster </label>
            
            <select name="poster" id="poster" >
            	
                <option value="0" <?php if($poster==0){	echo " selected ";	}  ?> >No</option>
                <option value="1" <?php if($poster==1){	echo " selected ";	}  ?> >Si</option>
                
            </select>
        </div>
        
        
        
        
        
      
      <input name="latitud" id="latitud" type="hidden" value="<?php echo $latitud; ?>" >
<input name="longitud" id="longitud" type="hidden" value="<?php echo $longitud; ?>">
  <input name="zoom" id="zoom" type="hidden" value="<?php echo $zoom; ?>">    
  <br>
  <div id="map_canvas" style="width:100%; height:450px;">


</div>

<br>
<div id="street_pre" style="width:100%; display:none;">
          <iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="" id="streetframe"></iframe>

            
    </div>
        

<br><br>


<div class="input medium" >

     <input name="archivos" id="archivos" type="hidden" value="<?php echo $archivos; ?>">
     <input name="fotos" id="fotos" type="hidden" value="<?php echo $fotos; ?>">
     <input name="imagen" id="imagen" type="hidden" value="<?php echo $imagen; ?>">
     

           <label for="input2">Fotos</label>
      
            
           
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" id="div_imagen">
            
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_solofotos.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="15.0.0.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_solofotos.swf" width="400" height="50">
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
            
           
            
            <div id="seleccionadas" style="">    
<h2>Fotos seleccionadas:</h2><br />
<div id="elegidas" style="background-color:#CCC; min-height:93px; min-width:133px; padding-top:3px;">
<img src="<?php echo $imagen; ?>" width="150" />
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
            <input value="Guardar" onClick="Validar();" />
        </div>
        <br><br>
        
    </div>
    </form>
</div>

<br><br>


<div class="cb"></div>





</div>
        
        
    <script type="text/javascript">
swfobject.registerObject("FlashID3");
    </script>
    </body>
</html>