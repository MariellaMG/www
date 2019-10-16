<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>


   <?php
	   
	  $id = $_GET["id"];
	   
	$qt = "SELECT * FROM uni WHERE id_uni = '$id' ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$nombre = $rowt[1];
		$tipo = $rowt[2];
		if($tipo==0){
			$tipo_ = "Publica";
		}else{
			$tipo_ = "Privada";
		}
		$direccion = $rowt[3];
		$id_ciudad = $rowt[4];
		$telefono = $rowt[5];
		$email = $rowt[6];
		$plandeestudios = $rowt[7];
		$convocatoria = $rowt[8];
		$tramites = $rowt[9];
		$inscripcion = $rowt[10];
		$inicio = $rowt[11];
		$costo_inscripcion = $rowt[12];
		$colegiatura = $rowt[13];
		$permalink = $rowt[14];
		
		$fundacion = $rowt[15];
		$header = $rowt[16];
		$imagen = $rowt[17];
		$fotos = $rowt[18];
	
	}
	
$array = explode(",", $fotos);
$c = 0;
foreach ($array as $i => $value) {
	$c++;
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
	
	$('input text').each(function(index) {
    	//alert(index + ': ' + $(this).text());
		if($(this).val()==""){
			error=1;
			$(this).css("border-color","#ff0000");
		}else{
			$(this).css("border-color","#000000");
		}
  	});	
	
	
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

var frames_d;


server = "http://klika.mx/";
var timestamp = "";
var frames_d  = "";
var cont_foto = 0;
function terminaUpload(t_t){
	//alert(t_t);
	timestamp = t_t;

	frames_d += "<img src='"+server+"uploaded/"+timestamp+".jpg' width='133' height='89' id='frame"+cont_foto+"' onclick='Foto("+cont_foto+");' />";
	
	cont_foto++;
	
	//setTimeout("PreVideo();",30000);
	//setTimeout("LigasVideos();",30000);
	
	$("#thumbs").html(frames_d);
	$("#seleccionadas").show();
	$("#generadas").show();
}

var lista_fotos = new Array(<?php

$array = explode(",", $fotos);
$c = 0;
foreach ($array as $i => $value) {
	if($c==0){
		echo $i;
	}else{
		echo ",".$i;
	}
	$c++;
}

?>);
var lista_imagenes = new Array(<?php

$array = explode(",", $fotos);
$c = 0;
foreach ($array as $i => $value) {
	if($c==0){
		echo "'".$array[$i]."'";
	}else{
		echo ","."'".$array[$i]."'";
	}
	$c++;
}

?>);

var cont_fotos = 0;
var imgs = "";
var campo_fotos = "<?php echo $fotos; ?>";

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
 	imgs += "<img src='"+$("#frame"+t_num).attr("src")+"' width='133' height='89' id='elegida"+lista_fotos.length+"'  />";
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

/////////////////


function terminaUploadHeader(t_t){
	
	//alert("terminaUploadHeader: "+t_t);
	
	frames_c = "<a href='../uploaded/"+t_t+".jpg' target='_blank' >";
	frames_c += "<img src='../uploaded/"+t_t+".jpg'   />";
	frames_c += "</a>";
	
	$("#thumbHeader").html(frames_c);
	$("#header").val(t_t);
	//$("#seleccionadas").show();
	//$("#generadas").show();	
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar universidad <b>'<?php echo $nombre; ?>'</b></h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="universidad_editar_form.php">



<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
         <div class="input medium">

            <label for="input2">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
            <span>Ingresa el titulo de la entrada</span>
        </div>
        
        
        <input name="header" id="header" type="hidden" value="<?php echo $header; ?>" >
        
        <div class="input medium">
        <label for="input2">Header de universidad (675x140)</label>
        <div>
        
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
            <param name="movie" value="subir_header.swf">
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="swfversion" value="6.0.65.0">
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="../Scripts/expressInstall.swf">
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="subir_header.swf" width="400" height="50">
              <!--<![endif]-->
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
              <param name="swfversion" value="6.0.65.0">
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                
                
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
          
          
     </div>
     
     
     
     
     <div id="thumbHeader">
     
     <?php
	 
	 if($header!=""){
		 echo "<img src='../uploaded/".$header.".jpg' />";
	 }
	 
	 ?>
     
     </div>
     
     <br>
               
<input name="imagen" type="hidden" value="<?php echo $imagen; ?>" id="imagen"   />     
 
<input name="fotos" type="hidden" value="<?php echo $fotos; ?>" id="fotos"  />
 
 <input name="timestamp" type="hidden" value="<? echo time(); ?>" />
     
     <div class="input medium">
        <label for="input2">Fotos de la universidad (640x480)</label>
        <div>
        
        <div>
          <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
            <param name="movie" value="subir_solofotos.swf">
            <param name="quality" value="high">
            <param name="wmode" value="opaque">
            <param name="swfversion" value="6.0.65.0">
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
            <param name="expressinstall" value="../Scripts/expressInstall.swf">
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="subir_solofotos.swf" width="400" height="50">
              <!--<![endif]-->
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
              <param name="swfversion" value="6.0.65.0">
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
     
     <br><br>
     
     <div id="generadas"  <?php if($fotos==""){ ?>  style="display:none;"  <?php } ?> >
<label>Fotos generadas:</label><br />
<div id="thumbs">
<?php


$array = explode(",", $fotos);

//"<img src='"+server+"uploaded/"+timestamp+".jpg' width='133' height='89' id='frame"+cont_foto+"' onclick='Foto("+cont_foto+");' />"

foreach ($array as $i => $value) {
	$linea = "<img src='".$array[$i]."' width='133' height='89' id='frame".$i."'  onclick='Foto(".$i.");' />";
	echo $linea;
}

?>
</div>    
 <br />
<br /> 
</div>


        

<div id="seleccionadas" <?php if($fotos==""){ ?>  style="display:none;"  <?php } ?> >    
<label>Fotos seleccionadas:</label><br />
<div id="elegidas" style="background-color:#CCC; min-height:93px; min-width:133px; padding-top:3px;">
<?php


$array = explode(",", $fotos);

foreach ($array as $i => $value) {
	$linea = "<img src='".$array[$i]."' width='133' height='89' id='elegida".$i."'   />";
	echo $linea;
}

?>
</div> 
<input name="" type="button" onclick="LimpiarFotos();" value="Limpiar fotos" />
<br /><br />
</div>

        
        
        
        </div>
        
           <div class="input medium">

            <label for="input2">Fundaci&oacute;n</label>
            <input type="text" id="fundacion" name="fundacion"  value="<?php echo $fundacion; ?>"  />
            <span>Ejemplo: 1989</span>
        </div>
      
       
       
        
        
<div class="input">
            <label for="select">Tipo de universidad:</label>
            <select name="tipo" id="tipo">
            	<option value="0" <?php if($tipo==0){	echo ' selected="selected" ';	} ?>>P&uacute;blica</option>
                <option value="1" <?php if($tipo==1){	echo ' selected="selected" ';	} ?>>Privada</option>
            </select>
        </div>        
 
        
        
        
    <div class="input textarea">
            <label for="textarea1">Dirección:</label>
            <textarea name="direccion" id="direccion" rows="4" cols="2" style="width:470px;"><?php echo $direccion; ?></textarea>
            <br>
            Incluye la calle, colonia, y nombre de la ciudad.
        </div>
        
       
          
   		<div class="input">
            <label for="select">Ciudad</label>
            <select name="id_ciudad" id="id_ciudad">
            	<option value="0">Elige una</option>
    <?php
	$qt = "SELECT * FROM ciudad ORDER BY ciudad ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		$sel = "";
		if($id_ciudad == $row[0]){
			$sel = " selected='selected' ";
		}
		echo '<option value="'.$row[0].'" '.$sel.'>'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div> 
        
        
        
            <div class="input textarea">
            <label for="textarea1">Teléfono:</label>
            <textarea name="telefono" id="telefono" rows="4" cols="2" style="width:470px;"><?php echo $telefono; ?></textarea>
            <br>
            Incluye los números de fax y extensiones.
        </div>
        
        
        
          <div class="input medium">

            <label for="input2">Email</label>
            <input type="text" id="email" name="email"  value="<?php echo $email; ?>"  />
            
        </div>
        
        

        <div class="input textarea">
            <label for="textarea1">Plan de estudios</label>
            <textarea name="plandeestudios" id="plandeestudios" rows="20" cols="4"><?php echo $plandeestudios; ?></textarea>
            Incluye los planes de estudios y carreras.
        </div>
        
       
       <div class="input medium">

            <label for="input2">Convocatoria:</label>
            <input type="text" id="convocatoria" name="convocatoria"  value="<?php echo $convocatoria; ?>"  />
             Fecha de inicio de convocatoria (Enero, Enero-Febrero)
            
        </div>
        
       <div class="input medium">

            <label for="input2">Tramites:</label>
            <input type="text" id="tramites" name="tramites"  value="<?php echo $tramites; ?>"  />
            Fecha de inicio de tr&aacute;mites (Enero, Enero-Febrero)
        </div>        
        
       <div class="input medium">

            <label for="input2">Inscripción:</label>
            <input type="text" id="inscripcion" name="inscripcion"  value="<?php echo $inscripcion; ?>"  />
            Fecha de inscripci&oacute;n (Enero, Enero-Febrero)
        </div>      
        
 		<div class="input medium">

            <label for="input2">Inicio:</label>
            <input type="text" id="inicio" name="inicio"  value="<?php echo $inicio; ?>"  />
            Fecha de inscripci&oacute;n (Enero, Enero-Febrero)
        </div>        
        
        <div class="input medium">

            <label for="input2">Costo de la inscripci&oacute;n:</label>
            <input type="text" id="costo_inscripcion" name="costo_inscripcion"  value="<?php echo $costo_inscripcion; ?>"  />
            Ejemplo: 1200
        </div> 
        
        <div class="input medium">

            <label for="input2">Costo de la colegiatura:</label>
            <input type="text" id="colegiatura" name="colegiatura"  value="<?php echo $colegiatura; ?>"  />
            Ejemplo 1300
        </div>  
        
        
        
        
        
<br><br>
        <div class="submit">
            <input value="Guardar" onClick="Validar();" />
        </div>
        <br>
    </div>
    </form>
</div>




<div class="cb"></div>





</div>
    <script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
    </script>
    </body>
</html>