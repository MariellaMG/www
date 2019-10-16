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
var server = "http://museodelamusica.info/";

function terminaUpload(t_t,e_e){
	//alert(t_t+"  "+e_e);
	
	//var tipo=substr(1,e_e);
	var str = "Hello world!";
	var res = e_e.substr(1);
	
	if(e_e!=".jpg"){
		
		icono = "<a href='"+server+"uploaded/"+t_t+e_e+"' target='_blank'><img src='"+server+"iconos/"+res+".png'  width='160'  /></a>";
		nombre = t_t+e_e;
		losframes = '<table width="160" style="width:160px !important; border:solid 1px #999;" border="0" cellspacing="0" cellpadding="0"><tr align="center"><td align="center">'+icono+'</td></tr><tr align="center"><td align="center">'+nombre+'</td></tr></table>';
		
		frames_d = "<img src='"+server+"iconos/"+res+".png'  width='160'  />"+t_t+e_e;
		
		$("#thumb").append(losframes);
		if($("#imagen").val()==""){
			$("#imagen").val(t_t+""+e_e);
		}
		$("#archivos").val( $("#archivos").val()+t_t+e_e+","  );
	}else{
		frames_d = "<img src='"+server+"uploaded/"+t_t+".jpg'  width='160'  />";
		$("#thumb").append(frames_d);
		if($("#imagen").val()==""){
			$("#imagen").val(t_t+""+e_e);
		}
		$("#archivos").val( $("#archivos").val()+t_t+e_e+","  );
	}
	
	
	
	//$("#seleccionadas").show();
	$("#cancelar").show();	
}

function Cancelar(){
	frames_d="";
	$("#thumb").html("");
	$("#imagen").val("");
	$("#cancelar").hide();	
}

//ExternalInterface.call("terminaUploadAll",timestamp,extension,"http://nice-n-easy.co/archivos/");

function terminaUploadAll(t_time,t_ext,t_server){
	
	t_ext = t_ext.substr(1);
	
	frames_d = "<img src='../iconos/"+t_ext+".png'  width='120'  />";
	
	ligas = "";
	
	ligas += ' <video width="320" height="240" autobuffer controls poster="'+$("#imagen").val()+'" >';
	ligas += '<source src="'+t_server+t_time+"."+t_ext+'" type="video/mp4" />';
	ligas += '</video><br/><br/>';
	
	
	$("#thumbs").html(frames_d);
	
	//alert(t_server+t_time+t_ext);

	$("#video").val(t_server+t_time+"."+t_ext);
	//$("#seleccionadas").show();
	
	//$("#cancelar").show();	
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

<style type="text/css">
.botoncancelar{
	border: 1px solid #3580a9;
    border-radius: 3px;
    box-shadow: 0 1px 5px #b2b2b2;
    color: #d4e6ef;
    cursor: pointer;
    font-weight: bold;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #2c6aa3;
    background:#4C91BE;
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
       

<h1><img src="img/icons/posts.png" alt="" />Agregar Recorrido</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">

<form id="form1" method="post" enctype="multipart/form-data" action="foto_agregar_form.php">

<input name="imagen" id="imagen" type="hidden" value="">
<input name="video" id="video" type="hidden" value="">

<input name="archivos" id="archivos" type="hidden" value="">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
        
        
         <div class="input medium">
            <label for="input2">Nombre:</label>
            <input type="text" id="nombre" name="nombre" />
        </div>
       
        <div class="input medium">
            <label for="input2">Posicion:</label>
            <input type="text" id="posicion" name="posicion" />
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
</body>
</html>