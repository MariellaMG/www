<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php
include("usuariologin.php");
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
var server = "http://nice-n-easy.co/";

function terminaUpload(t_t){
	
	
	frames_d = "<img src='"+server+"archivos/"+t_t+".jpg'  width='160'  />";
	
	
	$("#thumb").html(frames_d);
	$("#imagen").val(t_t);
	//$("#seleccionadas").show();
	//$("#generadas").show();	
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
	
	frames_d = "<a href='"+t_server+t_time+"."+t_ext+"'><img src='../iconos/"+t_ext+".png'  width='120'  /></a>";
	
	ligas = "";
	
	ligas += ' <video width="320" height="240" autobuffer controls poster="'+$("#imagen").val()+'" >';
	ligas += '<source src="'+t_server+t_time+"."+t_ext+'" type="video/mp4" />';
	ligas += '</video><br/><br/>';
	
	
	$("#thumbs").html(frames_d);
	
	
	$("#thumbs").html(ligas);
	
	//alert(t_server+t_time+t_ext);

	$("#video").val(t_server+t_time+"."+t_ext);
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

        
        
</head>

    <body class="white">
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                 <a href="#"><?php echo $login_nombre; ?></a>
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
                
                
                
                
        <!--            <em></em>
              CONTENT 
                        --> 
        <div id="content">
       

<h1><img src="img/icons/posts.png" alt="" />Agregar video</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">

<form id="form1" method="post" enctype="multipart/form-data" action="video_agregar_form.php">

<input name="imagen" id="imagen" type="hidden" value="">
<input name="video" id="video" type="hidden" value="">
<input name="silueta_img" id="silueta_img" type="hidden" value="">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
         <div class="input medium">

            <label for="input2">Nombre</label>
            <input type="text" id="nombre" name="nombre" />
        </div>
        
      
      
      
        <div class="input">
            <label for="select">Categoria</label>
            <select name="categoria" id="categoria">
            	
    <?php
	$qt = "SELECT * FROM categoria ORDER BY orden ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div> 

 
      
      
        
        <div class="input medium" >

        <label for="input2">Foto del video</label>
            
            
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
          
            </div>
            
        </div>
        
        <br><br>
        
        
        
        
                
        <div class="input medium" >

        <label for="input2">Subir archivo de video .mp4 .h264</label>
            
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" >
            
            <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_all.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="6.0.65.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_all.swf" width="400" height="50">
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
            
            <div id="thumbs">
          
            </div>
            
        </div>
        
        
        
        <div class="input medium" >

        <label for="input2">Silueta de edificio</label>
            
            
            <div style="padding:4px; background-color:#FFF; width:100%; height:100% border:solid 1px #CCC;" >
            
            <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="60%" height="60%">
              <param name="movie" value="subir_silueta.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowFullScreen" value="true" /> 
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="6.0.65.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_silueta.swf" width="60%" height="60%">
                <!--<![endif]-->
                <param name="quality" value="high">
                 <param name="allowFullScreen" value="true" /> 
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
            
            <div id="thumbs">
          
            </div>
            
        </div>
        
        
        <div class="input medium">

            <label for="input2">Puntos de silueta</label>
            <input type="text" id="silueta" name="silueta"  />
        </div>
        
        
        <br><br>
        <div class="submit">
            <input value="Agregar" onClick="Validar();" />
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