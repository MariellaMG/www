<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>


   <?php
	   
	   $id = $_GET["id"];
	   
	$qt = "SELECT * FROM entrada WHERE id_entrada = '$id' ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$titulo = $rowt[1];
		$descripcion = $rowt[2];
		$intro = $rowt[3];
		$imagen = $rowt[4];
		$fecha = $rowt[5];
		$permalink = $rowt[6];
		$id_categoria = $rowt[7];
		
		$q_c = "SELECT categoria FROM categoria WHERE id_categoria='$id_categoria' ";
		//echo $q_c;
		$result_c = mysql_query($q_c, $db);
		while ($rowc = mysql_fetch_row($result_c)){
			$categoria = $rowc[0];
		}
		$pie = $rowt[8];
		$tiempo = $rowt[9];
		$visitas = $rowt[10];
		$prioridad = $rowt[11];
		$principal = $rowt[12];
		
		$ubicacion = $rowt[17];
		$zoom = $rowt[18];
		$latitud = $rowt[19];
		$longitud = $rowt[20];
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
	initialize();
});

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
	

	if($("#imagen").val()==""){
		error = 1;
		$("#div_imagen").css("border-color","#ff0000");
	}else{
		$("#div_imagen").css("border-color","#ffffff");
	}	
	
	
	if($("#categoria").val()=="0"){
		error = 1;
		$("#categoria").css("border-color","#ff0000");
		$("#categoria").css("background-color","#ff0000")
	}else{
		$("#categoria").css("border-color","#000000");
		$("#categoria").css("background-color","#ffffff")
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

var frames_d;

function terminaUpload(t_t){
	
	
	frames_d = "<img src='../uploaded/"+t_t+".jpg'  width='75' height='70' />";
	
	
	$("#thumb").html(frames_d);
	$("#imagen").val(t_t);
	//$("#seleccionadas").show();
	//$("#generadas").show();	
}


</script>



<script type="text/javascript" src="editor/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.image.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.link.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.table.js"></script>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {
		$('#desc').wysiwyg({
		  controls: {
			bold          : { visible : true },
			italic        : { visible : true },
			underline     : { visible : true },
			strikeThrough : { visible : true },
			
			justifyLeft   : { visible : false },
			justifyCenter : { visible : false },
			justifyRight  : { visible : false },
			justifyFull   : { visible : false },

			indent  : { visible : false },
			outdent : { visible : false },

			subscript   : { visible : false },
			superscript : { visible : false },
			
			undo : { visible : true },
			redo : { visible : true },
			
			insertOrderedList    : { visible : false },
			insertUnorderedList  : { visible : false },
			insertHorizontalRule : { visible : false },

			h4: {
				visible: false,
				className: 'h4',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
				tags: ['h4'],
				tooltip: 'Header 4'
			},
			h5: {
				visible: false,
				className: 'h5',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
				tags: ['h5'],
				tooltip: 'Header 5'
			},
			h6: {
				visible: false,
				className: 'h6',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
				tags: ['h6'],
				tooltip: 'Header 6'
			},
			
			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true },
			html  : { visible: true },
			increaseFontSize : { visible : false },
			decreaseFontSize : { visible : false },
			exam_html: {
				exec: function() {
					this.insertHtml('<abbr title="exam">Jam</abbr>');
					return true;
				},
				visible: false
			}
		  },
		  events: {
			click: function(event) {
				if ($("#click-inform:checked").length > 0) {
					event.preventDefault();
					alert("You have clicked jWysiwyg content!");
				}
			}
		  }
		});

		
	});
})(jQuery);
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
<script type="text/javascript">


var map;
var marker;
//var image = "../imagenes/iconos/restaurant.png";

function initialize() {
	
  var myLatlng = new google.maps.LatLng(<?php echo $latitud; ?>,<?php echo $longitud; ?>);
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
function UbicacionCambio(){
	if( $("#ubicacion").attr('checked')=='checked' ){
		$("#map_canvas").show();
	}else{
		$("#map_canvas").hide();
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar entrada: <b><?php echo $titulo; ?></b></h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="entrada_editar_form.php">

<input name="imagen" id="imagen" type="hidden" value="<?php echo $imagen; ?>">

<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
         <div class="input medium">

            <label for="input2">Titulo</label>
            <input type="text" id="nombre" name="nombre" value='<?php echo ($titulo); ?>' />
            <span>Ingresa el titulo de la entrada</span>
        </div>
        
        
           <div class="input medium">

            <label for="input2">Fecha</label>
            <input type="text" id="tiempo" name="tiempo" value='<?php echo ($tiempo); ?>' />
            <span>Ingresa la fecha de la entrada</span>
        </div>
      
       
        
        
   		<div class="input">
            <label for="select">Categor&iacute;a</label>
            
            <select name="categoria" id="categoria">
            	<option value="0" >Elige uno</option>
    <?php
	$qt = "SELECT * FROM categoria ORDER BY categoria ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		$sel="";
		
		if($id_categoria==$row[0]){
			$sel = ' selected="selected" ';	
		}
		
		
		
		echo '<option value="'.$row[0].'" '.$sel.' >'.$row[1].'</option>
		';
	}
	?>
            </select>
            
        </div>        
        
          <div class="input medium">

            <label for="input2">Principal</label>
          
    <?php
	
		//echo utf8_encode($row[0]);
		$sel_a="";
		
		if($principal=="0"){
			$sel_a = ' selected="selected" ';	
		}
		
		$sel_b="";
		
		if($principal=="1"){
			$sel_b = ' selected="selected" ';	
		}
		
		
		
	
	?>
    
     <select name="principal" id="principal">
            	<option value="0" <?php echo $sel_a; ?> >NO</option>
                <option value="1" <?php echo $sel_b; ?>  >SI</option>
                </select>
                
                
            </select>
            
     
        </div>
        
        
        
        
        <div class="input medium">

            <label for="input2">Prioridad</label>
            <input type="text" id="prioridad" name="prioridad" value='<?php echo ($prioridad); ?>' />
            <span>Ingresa la prioridad 1-8</span>
        </div>
        
        
        
        
         <div class="input medium" >

           <label for="input2">Imagen</label>
            
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" id="div_imagen">
            
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_solofotos.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
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
            
            <div id="thumb">
          <img src='../uploaded/<?php echo $imagen; ?>.jpg'  width='75' height='70' />
            </div>
            
        </div>
        
        
        
            <div class="input textarea">
            <label for="textarea1">Pie de foto</label>
            <textarea name="pie" id="pie" rows="4" cols="2" style="width:470px;"><?php echo $pie; ?></textarea>
            <br>
            Incluye una breve descripci&oacute;n de la foto.
        </div>
        
        
    <div class="input textarea">
            <label for="textarea1">Introducci&oacute;n</label>
            <textarea name="intro" id="intro" rows="4" cols="2" style="width:470px;"><?php echo $intro; ?></textarea>
            <br>
            Incluye una breve descripci&oacute;n para el texto previo.
        </div>

        <div class="input textarea">
            <label for="textarea1">Descripci&oacute;n</label>
            <textarea name="desc" id="desc" rows="23" cols="4"><?php echo $descripcion; ?></textarea>
            Incluye una breve descripci&oacute;n de la categoria
        </div>
<br><br>


 <div class="input textarea">
 
 <input name="latitud" id="latitud" type="hidden" value="<?php echo $latitud; ?>">
 <input name="longitud" id="longitud" type="hidden" value="<?php echo $longitud; ?>">
 <input name="zoom" id="zoom" type="hidden" value="<?php echo $zoom; ?>">
 
 			<input type="checkbox" name="ubicacion" id="ubicacion" value="1" onChange="UbicacionCambio();" >
            <label for="textarea1">Ubicaci&oacute;n</label>
                
                
            <div id="map_canvas" style="height:300px; width:100%; border:solid #CCC 1px; ;"></div>
            
            
            Incluye la ubicacion de la entrada
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
        </script>
    </body>
</html>