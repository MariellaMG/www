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

<?php

	$id = $_GET['id'];

    $qt = "SELECT * FROM contenido WHERE id_contenido =  '$id' ";
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_contenido = $rowt[0];
		$tipo = $rowt[1];
		$titulo = $rowt[2];
		$titulo_original = $rowt[3];
		$anio = $rowt[4];
		$clasificacion = $rowt[5];
		$duracion = $rowt[6];
		$generos = $rowt[7];
		$rating_imdb = $rowt[8];
		$rating_meta = $rowt[9];
		$sinopsis = $rowt[10];
		$directores = $rowt[11];
		$escritores = $rowt[12];
		$protagonistas = $rowt[13];
		$poster = $rowt[14];
		$trailer = $rowt[15];
		$fotos = $rowt[16];
		$keywords = $rowt[17];
		$budget = $rowt[18];
		$permalink = $rowt[19];
		$id_editor = $rowt[20];
		
		$geek_facts = $rowt[22];
		
		$titulo = utf8_encode($titulo);
		$titulo_original = utf8_encode($titulo_original);
		$sinopsis = utf8_encode($sinopsis);
		$geek_facts = utf8_encode($geek_facts);
		
		
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

function Validar(){
	
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar contenido '<?php echo $titulo; ?>'</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">

<form id="form1" method="post" enctype="multipart/form-data" action="pelicula_editar_form.php">

<input id="id" name="id" type="hidden" value="<?php echo $id_contenido; ?>"  />

<input id="directores" name="directores" type="hidden" value="<?php echo $directores; ?>"  />
<input id="escritores" name="escritores" type="hidden" value="<?php echo $escritores; ?>"  />
<input id="protagonistas" name="protagonistas" type="hidden" value="<?php echo $protagonistas; ?>"  />
<input name="imagen" id="imagen" type="hidden" value="<?php echo $poster; ?>" >
<input name="poster" id="poster" type="hidden" value="<?php echo $poster; ?>">
<input name="fotos" id="fotos" type="hidden" value="<?php echo $fotos; ?>">


    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    

 
      
        <div class="input medium">

            <label for="input2">Tipo</label>
            <select name="tipo" id="tipo">
            	<option value="1" <?php if($tipo==1){  echo " selected ";     } ?> >Pelicula</option>
                <option value="2" <?php if($tipo==2){  echo " selected ";     } ?> >Serie</option>
                </select>
        </div>
        
        
         <div class="input medium">
            <label for="input2">Titulo</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>"  />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Titulo Original</label>
            <input type="text" id="titulo_original" name="titulo_original" value="<?php echo $titulo_original; ?>" />
        </div>
        
        <?php 
		
		//echo $generos; 
		
		$losgeneros = explode(",",$generos);
		
		
		
		?>
        
        
      <div class="input">
            <label for="select">Generos</label>
            <select name="generos[]" id="generos" multiple size="10" style=" width:150px;"  >
    <?php
	$qt = "SELECT * FROM genero ORDER BY genero ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		
		$sel = "";
		foreach ($losgeneros as &$valor) {
    		if($valor==$row[0]){
				$sel=" selected ";
			}
		}
		
		echo '<option value="'.$row[0].'" '.$sel.' >'.utf8_encode($row[1]).'</option>
		';
			
	}
	?>
            </select>
        </div>
        
        
        
         <div class="input medium">
            <label for="input2">Año</label>
            <input type="text" id="anio" name="anio" style="width:90px;" value="<?php echo $anio; ?>" />
        </div>
        
         <div class="input medium">
            <label for="input2">Clasificación</label>
            <input type="text" id="clasificacion" name="clasificacion" style="width:90px;" value="<?php echo $clasificacion; ?>" />
        </div>
        
         <div class="input medium">
            <label for="input2">Duración en minutos</label>
            <input type="text" id="duracion" name="duracion" style="width:110px;" value="<?php echo $duracion; ?>" />
        </div>
        
         <div class="input medium">
            <label for="input2">Rating IMDB (0-100)</label>
            <input type="text" id="rating_imdb" name="rating_imdb" style="width:110px;" value="<?php echo $rating_imdb; ?>" />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Rating Meta (0-100)</label>
            <input type="text" id="rating_meta" name="rating_meta" style="width:110px;" value="<?php echo $rating_meta; ?>" />
        </div>
        
        
         <div class="input medium">
            <label for="input2">Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" rows="4" cols="2" style="width:600px; height:200px;"><?php echo $sinopsis; ?></textarea>
        </div>
        
        
        <div class="input medium">
            <label for="input2">Geek Facts</label>
            <textarea name="geek_facts" id="geek_facts" rows="4" cols="2" style="width:600px; height:200px;"><?php echo $geek_facts; ?></textarea>
        </div>
        
        
        
        <div class="input medium">
            <label for="input2">Trailer id de youtube (Ejemplo: xe1LrMqURuw)</label>
            <input type="text" id="trailer" name="trailer" style="width:110px;" onChange="ElTrailer();" onBlur="ElTrailer();" value="<?php echo $trailer; ?>"  />
        </div>
        
        <div id="trailer_div" >
        
        <iframe width="600" height="300" src="https://www.youtube.com/embed/<?php echo $trailer; ?>" frameborder="0" allowfullscreen id="trailer_iframe">
        </iframe><br><br>
        
        </div>
        
        
          <div class="input medium">
            <label for="input2">Budget (Ejemplo: 60000000)</label>
            <input type="text" id="budget" name="budget" style="width:150px;" value="<?php echo $budget; ?>" />
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
              
              <?php 
			  $lasfotos = explode(",",$fotos);
			 $c=0;
			foreach ($lasfotos as $valor) {
				if($valor!=""){
					echo "<div class='files'><img src='".$valor."'  width='100' id='frame".$c."' onclick='Foto(".$c.");'  /></div>";
				}
				$c++;
			}
			
			if($c>1){
				echo "<div style='clear:both'> </div>";
			}
			  
			  ?>
              
            </div>
            
            
            <div style="clear:both;"></div>
            
            <br><br>
            
            <div id="seleccionadas" >    
<h2>Fotos seleccionadas:</h2>
<h3 style="font-size:12px !important;">
<strong>1.</strong> Poster (214×317)
<strong>2.</strong> Galeria 
</h3>
<br />
<div id="elegidas" style="background-color:#CCC; min-height:93px; min-width:133px; padding-top:3px;">
<?php 
			  $lasfotos = explode(",",$fotos);
			 $c=0;
			foreach ($lasfotos as $valor) {
				if($valor!=""){
					echo "<div class='files'><img src='".$valor."'  height='80' id='frame".$c."' onclick='Foto(".$c.");'  /></div>";
				}
				$c++;
			}
			
			if($c>1){
				echo "<div style='clear:both'> </div>";
			}
			  
			  ?>
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


            
           
           
           
           
           
           
           
           
   <br><br><br>

        
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