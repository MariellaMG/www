<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>


<?php

$mes[1] = "Enero";
$mes[2] = "Febrero";
$mes[3] = "Marzo";
$mes[4] = "Abril";
$mes[5] = "Mayo";
$mes[6] = "Junio";
$mes[7] = "Julio";
$mes[8] = "Agosto";
$mes[9] = "Septiembre";
$mes[10] = "Octubre";
$mes[11] = "Noviembre";
$mes[12] = "Diciembre";

$fecha = date("j")." de ".$mes[date("n")]." de ".date("Y");



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

function MarcarTodos(){

	$('#keywords option').prop('selected', true);
	$('#keywords option').attr('selected', 'selected');
	
	$('#escritores option').prop('selected', true);
	$('#escritores option').attr('selected', 'selected');
	
	$('#directores option').prop('selected', true);
	$('#directores option').attr('selected', 'selected');
	
	$('#protagonistas option').prop('selected', true);
	$('#protagonistas option').attr('selected', 'selected');
	
	$('#proveedores option').prop('selected', true);
	$('#proveedores option').attr('selected', 'selected');

}

function Validar(){
	
	MarcarTodos();
	
	error = 0;
	
	if($("#nombre").val()==""){
		error = 1;
		$("#nombre").css("border-color","#ff0000");
	}else{
		$("#nombre").css("border-color","#000000");
	}
	
	if($("#sucesotipo").val()=="0"){
		error = 1;
		$("#sucesotipo").css("border-color","#ff0000");
	}else{
		$("#sucesotipo").css("border-color","#000000");
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
var server = "http://ffmpeg.cbtelevision.com.mx/contenido_inmortales/";
var iconos_str="avi.png,bmp.png,divx.png,dll.png,excel.png,file.png,files.png,firefox.png,flv.png,htm.png,html.png,ie7.png,iso.png,jpeg.png,max.png,mov.png,movie.png,mp3.png,mp4.png,mpeg.png,music.png,onenote.png,opera.png,outlook.png,pdf.png,photo.png,png.png,powerpoint.png,ppt.png,psd.png,pub.png,publisher.png,rar.png,rm.png,rtf.png,torrent.png,tr.png,txt.png,visio.png,vob .png,wav.png,wma.png,word.png,zip.png,xls.png";
 
var archivos_array = new Array();
function terminaUploadAll(t_t,t_ext,t_server){
	
	//alert("terminaUPOAD  ALL MULTI "+t_t+"  -  "+t_ext); 
	
	t_server = "http://peliculas-series.info/uploaded-contenido/";
	
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
			$("#imagen").val(server+"uploaded/"+t_t+".jpg");
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
	//terminaUpload(t_t,t_ext);
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
		$("#poster").val($("#frame"+t_num).attr("src"));
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
	$("#poster").val("");
}


function ElTrailer(){
	//https://www.youtube.com/embed/xe1LrMqURuw
	$("#trailer_iframe").attr("src","https://www.youtube.com/embed/"+$("#trailer").val());
	$("#trailer_div").show();
	
}


//////////////
//////////////Predictivos

function Predictivo(t_text,t_get,t_listado){
	var t_id = $("#"+t_text).val();
	$.get(t_get+"_como_get.php?id="+t_id, function(data){
		$("#"+t_listado).html(data);
	});
}

function DobleClick(t_t,t_dest){
	var t_n = '<option value="'+$(t_t).attr("value") +'"  ondblclick="DobleClickRemove(this);"  >'+$(t_t).html() +'</option>';
	var e=0;
	$("#"+t_dest+" option").each(function( index ) {
		if($(t_t).attr("value")==$(this).val()){
			e=1;
		}
	});
	if(e==0){
		$("#"+t_dest).html( $("#"+t_dest).html()+t_n );
	}
}
function DobleClickRemove(t_t){
	$(t_t).remove();
}
function LimpiarID(t_id){
	$("#"+t_id).html("");
}
function AgregarElem(t_id,t_dest,t_add,t_addd){
	
	var t_text = $("#"+t_id).val();
	$.get(t_dest+"_agregar_get.php?id="+t_text, function(data){
	
		var tt_n =  '<option value="'+data+'" ondblclick="DobleClick(this);" >'+t_text+'</option>';
		$("#"+t_add).html( $("#"+t_add).html()+tt_n );
		
		var t_n = '<option value="'+ data +'"  ondblclick="DobleClickRemove(this);"  >'+ t_text +'</option>';
		$("#"+t_addd).html( $("#"+t_addd).html()+t_n );
	});
}



</script>

        
<style type="text/css">
.files{
	float:left;
	width:100px;
	height:120px;
	margin:5px;
	overflow:hidden;
}
</style>
      

        
        
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
       

<h1><img src="img/icons/posts.png" alt="" />Agregar entrada</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">

<form id="form1" method="post" enctype="multipart/form-data" action="pelicula_agregar_form.php">

<input name="imagen" id="imagen" type="hidden" value="">
<input name="poster" id="poster" type="hidden" value="">
<input name="fotos" id="fotos" type="hidden" value="">

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

            <label for="input2">Tipo</label>
            <select name="tipo" id="tipo">
            	<option value="1">Pelicula</option>
                <option value="2">Serie</option>
                </select>
        </div>
        
        
         <div class="input medium">
            <label for="input2">Titulo</label>
            <input type="text" id="titulo" name="titulo" />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Titulo Original</label>
            <input type="text" id="titulo_original" name="titulo_original" />
        </div>
        
        
        
      <div class="input">
            <label for="select">Generos</label>
            <select name="generos[]" id="generos" multiple size="10" style=" width:150px;"  >
    <?php
	$qt = "SELECT * FROM genero ORDER BY genero ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		echo '<option value="'.$row[0].'">'.utf8_encode($row[1]).'</option>
		';
	}
	?>
            </select>
        </div>
        
        
        
         <div class="input medium">
            <label for="input2">Año</label>
            <input type="text" id="anio" name="anio" style="width:90px;" />
        </div>
        
         <div class="input medium">
            <label for="input2">Clasificación</label>
            <input type="text" id="clasificacion" name="clasificacion" style="width:90px;" />
        </div>
        
         <div class="input medium">
            <label for="input2">Duración en minutos</label>
            <input type="text" id="duracion" name="duracion" style="width:110px;" />
        </div>
        
         <div class="input medium">
            <label for="input2">Rating IMDB (0-100)</label>
            <input type="text" id="rating_imdb" name="rating_imdb" style="width:110px;" />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Rating Meta (0-100)</label>
            <input type="text" id="rating_meta" name="rating_meta" style="width:110px;" />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" rows="4" cols="2" style="width:470px;"></textarea>
        </div>
        
        
        <div class="input medium">
            <label for="input2">Geek facts</label>
            <textarea name="geek_facts" id="geek_facts" rows="4" cols="2" style="width:470px;"></textarea>
        </div>
          
        
        <div class="input medium">
            <label for="input2">Trailer id de youtube (Ejemplo: xe1LrMqURuw)</label>
            <input type="text" id="trailer" name="trailer" style="width:110px;" onChange="ElTrailer();" onBlur="ElTrailer();" />
        </div>
        
        <div id="trailer_div" style="display:none;">
        
        <iframe width="600" height="300" src="" frameborder="0" allowfullscreen id="trailer_iframe">
        </iframe><br><br>
        
        </div>
        
        
          <div class="input medium">
            <label for="input2">Budget (Ejemplo: 60000000)</label>
            <input type="text" id="budget" name="budget" style="width:150px;" />
        </div>
        
        
        
         <div class="input medium" >

           <label for="input2">Imagen</label>
            
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" id="div_imagen">
            
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_entrada.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="15.0.0.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_entrada.swf" width="400" height="50">
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
<h2>Fotos seleccionadas:</h2>
<h3 style="font-size:12px !important;">
<strong>1.</strong> Poster (214×317)
<strong>2.</strong> Galeria 
</h3>
<br />
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
   <br>
   
   
   
   
    
      <div class="input">
            <label for="select">Keywords</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="keywords[]" id="keywords" multiple size="10" style=" width:200px;"  >
            
			<?php
            
               $loskeywords = explode(",",$keywords);
                foreach ($loskeywords as &$valor) {
                    $qt = "SELECT * FROM keyword WHERE id_keyword = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('keywords');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;"> 
            <input type="text" id="keyword" name="keyword" style="width:210px;" onKeyUp="Predictivo('keyword','keywords','listado');" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('keyword','keyword','listado','keywords');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="listado[]" id="listado" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        
        
        
        
      
      
      
       
       <div class="input">
            <label for="select">Directores</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="directores[]" id="directores" multiple size="10" style=" width:200px;"  >
            
			<?php
            
			if(strrpos($directores,",")!=false){
               $losdirectores = explode(",",$directores);
                foreach ($losdirectores as &$valor) {
					
					//echo $valor;
					
                    $qt = "SELECT * FROM personaje WHERE id_personaje = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
			}else{
				$qt = "SELECT * FROM personaje WHERE id_personaje = '$directores' LIMIT 1";
				$resultt = mysql_query($qt, $db);
				while ($row = mysql_fetch_row($resultt)){
					echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
					';
				}
			}
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('directores');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;"> 
            <input type="text" id="director" name="director" style="width:210px;" onKeyUp="Predictivo('director','director','listadod');" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('director','director','listadod','directores');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="listadod[]" id="listadod" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        
        
        
        
        
        
        
        
        
              <div class="input">
            <label for="select">Escritores</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="escritores[]" id="escritores" multiple size="10" style=" width:200px;"  >
            
			<?php
            
			if(strrpos($escritores,",")!=false){
               $losescritores = explode(",",$escritores);
                foreach ($losescritores as &$valor) {
					
                    $qt = "SELECT * FROM personaje WHERE id_personaje = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
			}else{
				$qt = "SELECT * FROM personaje WHERE id_personaje = '$escritores' LIMIT 1";
				$resultt = mysql_query($qt, $db);
				while ($row = mysql_fetch_row($resultt)){
					echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
					';
				}
			}
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('escritores');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;"> 
            <input type="text" id="escritor" name="escritor" style="width:210px;" onKeyUp="Predictivo('escritor','escritor','listadoe');" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('escritor','director','listadoe','escritores');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="listadoe[]" id="listadoe" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        
        
        
        
        
        
        
           <div class="input">
            <label for="select">Protagonistas</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="protagonistas[]" id="protagonistas" multiple size="10" style=" width:200px;"  >
            
			<?php
            
			if(strrpos($protagonistas,",")!=false){
               $losprotagonistas = explode(",",$protagonistas);
                foreach ($losprotagonistas as &$valor) {
					
                    $qt = "SELECT * FROM personaje WHERE id_personaje = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
			}else{
				$qt = "SELECT * FROM personaje WHERE id_personaje = '$protagonistas' LIMIT 1";
				$resultt = mysql_query($qt, $db);
				while ($row = mysql_fetch_row($resultt)){
					echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
					';
				}
			}
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('protagonistas');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;"> 
            <input type="text" id="protagonista" name="protagonista" style="width:210px;" onKeyUp="Predictivo('protagonista','protagonista','listadop');" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('protagonista','director','listadop','protagonistas');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="listadop[]" id="listadop" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        
        
        
        
        
        
           <div class="input">
            <label for="select">Proveedores</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="proveedores[]" id="proveedores" multiple size="10" style=" width:200px;"  >
            
			<?php
            
			if(strrpos($proveedores,",")!=false){
               $losprotagonistas = explode(",",$proveedores);
			   
                foreach ($losprotagonistas as &$valor) {
					
                    $qt = "SELECT * FROM proveedor WHERE id_proveedor = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
			}else{
				$qt = "SELECT * FROM proveedor WHERE id_proveedor = '$proveedores' LIMIT 1";
				$resultt = mysql_query($qt, $db);
				while ($row = mysql_fetch_row($resultt)){
					echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
					';
				}
			}
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('proveedores');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;"> 
            <input type="text" id="proveedor" name="proveedor" style="width:210px;" onKeyUp="Predictivo('proveedor','proveedor','listador');" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('proveedor','proveedor','listador','proveedores');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="listador[]" id="listador" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        
        
        
        
        
   
   
   
   
   
   
   <br><br>

        
        <div class="submit">
            <input value="Agregar" onClick="Validar();" />
        </div>
    </div>
    </form>
</div>




<div class="cb"></div>





</div>

    <script type="text/javascript">
swfobject.registerObject("FlashID");
        </script>
    </body>
</html>