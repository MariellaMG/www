<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php
$qt = "SELECT * FROM importar WHERE id_importar = '1' LIMIT 1";
//echo $qt;
$resultt = mysql_query($qt, $db);
while ($row = mysql_fetch_row($resultt)){
	$id_importar = $row[0];
	$carpeta = $row[1];
	$pagina = $row[2];
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


</script>
        
        
        
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
<script type="text/javascript">

var map;
var marker;
//var image = "../imagenes/iconos/restaurant.png";

function initialize() {
  var myLatlng = new google.maps.LatLng(19.41036036043098, -99.16975378990173);
  var myOptions = {
    zoom: 10,
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

<script type="text/javascript">
function TomarAnuncio(t_num,t_pos,t_file){
	//alert(t_num);
	$("#anuncio_div_"+t_num).show();
	$("#anuncio_img_"+t_num).attr("src",t_file);
}
</script>

<script type="text/javascript">

//////////////
//////////////Predictivos

function Predictivo(t_text,t_get,t_listado,t_num){
	var t_id = $("#"+t_text).val();
	$.get(t_get+"_como_get.php?id="+t_id+"&num="+t_num, function(data){
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


function AgregarAnuncio(t_num){
	
	//alert("AgregarAnuncio "+t_num);
	
	//alert($("#nombre"+t_num).val());
	
	/*
	"INSERT INTO `anuncio` (`id_anuncio`, `pagina`, `imagen`, `descricion`, `nombre`, `telefono`, `direccion`, `tipos_negocio`, `estatus`) VALUES (NULL, '$pagina', '$imagen', '$descripcion', '$nombre', '$telefono', '$direccion', '$tipos_negocio', '$estatus');";
	
	 "INSERT INTO `anuncio` (`id_anuncio`, `pagina`, `imagen`, `descricion`, `nombre`, `telefono`, `direccion`, `tipos_negocio`, `estatus`) VALUES (NULL, '$pag', '$img', '$desc', '$nom', '$tel', '$dir', '$tips', '$sta');";
	
	*/
	
	if( $("#nombre"+t_num).val()!="" && $("#telefono"+t_num).val()!="" && $("#direccion"+t_num).val()!=""   ){	
	
		
		var pag = $("#pagina").val();
		var img = $("#anuncio_img_"+t_num).attr("src");
		var desc = $("#descripcion"+t_num).val();
		var nom = $("#nombre"+t_num).val();
		var tel = $("#telefono"+t_num).val();
		var dir = $("#direccion"+t_num).val();
		
		var tipos = "";
		var tnn=0;
		$('#tipos'+t_num+' option').each(function(i, selected){ 
		  tipos += $(selected).val()+",";
		  tnn++;
		});
		tipos += "0";
		
		var tlink = "tipo_insertar_get.php?pag="+pag;
		
		tlink="tipo_insertar_get.php?pag="+pag+"&img="+img+"&desc="+desc+"&nom="+nom+"&tel="+tel+"&dir="+dir+"&tips="+tipos+"&num="+t_num;
		
		//alert(tlink);
		
		$.get(tlink, function(data){
			$("#anuncio"+t_num).hide("slow");
		});
		
	}
}

function SiguientePagina(t_num){
	//alert("SiguientePagina: "+t_num);
	var tlink = "cambiar_pagina.php?e="+t_num;
	$.get(tlink, function(data){
		location.reload(); 
	});
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
       

<h1><img src="img/icons/posts.png" alt="" />Importar Pagina <?php echo $pagina; ?></h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>
        
        <input name="pagina" id="pagina" type="hidden" value="<?php echo $pagina; ?>" >

<?php
$directorio = '../datos/'.$carpeta.'/'.$pagina.'/anuncios/';
$ficheros2  = scandir($directorio);

//print_r($ficheros2);
$anuncios = array();
$c=0;
foreach ($ficheros2 as $valor) {
    //echo $valor;
	if(strpos($valor,".txt")!=false){
		$anuncios[$c] = $valor;
		$c++;
	}
}


$num=-1;
foreach ($anuncios as $elanuncio) {
	$num++;
	$anuncio = substr($elanuncio,0,strpos($elanuncio,"."));
	//echo $anuncio;
	$myfile = fopen($directorio.$elanuncio, "r") or die("Unable to open file!");
	$descripcion = fread($myfile,filesize($directorio.$elanuncio));
	$descripcion = trim($descripcion);
	fclose($myfile);
?>



<div class="bloc">
    <div class="title">Anuncio <?php echo $elanuncio; ?></div>
    <div class="content" id="anuncio<?php echo $num; ?>">
    
    <div>
    <h5>Elige la mejor versión del anuncio</h5>
    <img src="<?php echo $directorio."anuncios1/".$anuncio.".jpg" ?>" width="150" onClick="TomarAnuncio(<?php echo $anuncio; ?>,1,'<?php echo $directorio."anuncios1/".$anuncio.".jpg" ?>');" />
    <img src="<?php echo $directorio."anuncios2/".$anuncio.".jpg" ?>" width="150" onClick="TomarAnuncio(<?php echo $anuncio; ?>,2,'<?php echo $directorio."anuncios2/".$anuncio.".jpg" ?>');" />
    <img src="<?php echo $directorio."anuncios3/".$anuncio.".jpg" ?>" width="150" onClick="TomarAnuncio(<?php echo $anuncio; ?>,3,'<?php echo $directorio."anuncios3/".$anuncio.".jpg" ?>');" />
    </div>
    
    <div style="display:none;" id="anuncio_div_<?php echo $anuncio; ?>">
    <img src="" id="anuncio_img_<?php echo $anuncio; ?>" width="500" />
    </div>
    
        <div class="input medium">
            <label for="input2">Descripción</label>
            <textarea name="descripcion<?php echo $num; ?>" id="descripcion<?php echo $num; ?>" cols="10" rows="10" style="height:300px; font-size:11px; font-family:Verdana, Geneva, sans-serif;"><?php echo $descripcion; ?></textarea>
        </div>
      
        <div class="input medium">
            <label for="input2">Nombre</label>
            <input type="text" id="nombre<?php echo $num; ?>" name="nombre<?php echo $num; ?>" style="width:390px;" />
</div>
        
<div class="input medium">
            <label for="input2">Telefono (sin parentesis ni espacios a 10 digitos [4433205119])</label>
            <input type="text" id="telefono<?php echo $num; ?>" name="telefono<?php echo $num; ?>" style="width:390px;" />
</div>
            <div class="input medium">
            <label for="input2">Direccion</label>
            <input type="text" id="direccion<?php echo $num; ?>" name="direccion<?php echo $num; ?>" style="width:390px;" />
</div>
<br>

            <div class="input">
            <label for="select">Tipos de negocio</label>
            
            <div style=" background:#EDEDED;">
            <div style="width:205px; height:200px; float:left;">
            
            <select name="tipos<?php echo $num; ?>[]" id="tipos<?php echo $num; ?>" multiple size="10" style=" width:200px;"  >
            
			<?php
            
               $loskeywords = explode(",",$keywords);
                foreach ($loskeywords as &$valor) {
                    $qt = "SELECT * FROM tipo WHERE id_tipo = '$valor' LIMIT 1";
                    $resultt = mysql_query($qt, $db);
                    while ($row = mysql_fetch_row($resultt)){
                        echo '<option value="'.$row[0].'" >'.utf8_encode($row[1]).'</option>
                        ';
                    }
                }
                
            ?>
            </select>
            
            <input name="Limpiar" type="button" value="Limpiar" style="width:200px; background:#0CF;" onClick="LimpiarID('tipos<?php echo $num; ?>');">
            
            </div>
            <div style="width:250px; height:200px; float:left;">
            
            <div>
            <div style="width:210px; float:left;">
            <input type="text" id="keyword<?php echo $num; ?>" name="keyword<?php echo $num; ?>" style="width:210px" onKeyUp="Predictivo('keyword<?php echo $num; ?>','tipos','lostipos<?php echo $num; ?>',<?php echo $num; ?>);" autocomplete="off" >
            </div>
            <div style="width:39px; float:left;">
            <input name="+" type="button" value="+" onClick="AgregarElem('keyword<?php echo $num; ?>','tipo','tipos<?php echo $num; ?>','lostipos');" style="width:39px; background:#0CF;">
            </div>
            <div style="clear:both"></div>
            </div>
            
            <select name="lostipos<?php echo $num; ?>[]" id="lostipos<?php echo $num; ?>" multiple size="10" style=" width:250px;"  >
            </select>
            
            </div>
            <div style="clear:both;"></div>
            
            </div>
            
        </div>
        

        <div class="submit">
            <input value="Agregar" onClick="AgregarAnuncio(<?php echo $num; ?>);"  />
        </div>
        <br><br>
        
    </div>
</div>

<?php
}
?>


<br><br><br><br><br><br>


<div class="bloc">
    <div class="title">Siguiente Pagina</div>
    <div class="content">
    
     <div class="submit">
            <input value="Siguiente Pagina" onClick="SiguientePagina(<?php echo $pagina; ?>);"  />
        </div>
        <br><br>
        
    </div>
</div>


<br><br><br><br>


<div class="cb"></div>





</div>
        
        
    </body>
</html>