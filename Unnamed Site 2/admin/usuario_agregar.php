<?php
include("session.php");
?>
<?php
include("includes/mysql_infos2.php");
?>
<?php
//include("usuariologin.php");
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
	
	
	if($("#usuario").val()==""){
		error = 1;
		$("#usuario").css("border-color","#ff0000");
	}else{
		$("#usuario").css("border-color","#000000");
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
	
	
	frames_d = "<img src='"+server+"archivos/"+t_t+".jpg'  width='75' height='70' />";
	
	
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
       

<h1><img src="img/icons/posts.png" alt="" />Agregar usuario</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">

<form id="form1" method="post" enctype="multipart/form-data" action="usuario_agregar_form.php">

<input name="imagen" id="imagen" type="hidden" value="">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
    	 <div class="input">
            <label for="select">Nivel</label>
            <select name="nivel" id="nivel">
            	<option value="0">Capturista</option>
                <option value="1">Supervisor</option>
                <option value="2">Director</option>
            </select>
        </div>
    
         <div class="input medium">

            <label for="input2">Nombre de usuario (sin acentos ni espacios y en minusculas ejemplo: juan.perez)</label>
            <input type="text" id="usuario" name="usuario" />
        </div>
        
        
         <div class="input medium">

            <label for="input2">Contraseña de acceso</label>
            <input type="text" id="pass" name="pass" />
        </div>
      
      
      
         <div class="input medium">

            <label for="input2">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" />
        </div>
        
        
         <div class="input">
            <label for="select">Genero</label>
            <select name="genero" id="genero">
            	<option value="0">Hombre</option>
                <option value="1">Mujer</option>
            </select>
        </div> 
        
        
        
         <div class="input medium">

            <label for="input2">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" />
        </div>

      
  
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
        </script>
    </body>
</html>