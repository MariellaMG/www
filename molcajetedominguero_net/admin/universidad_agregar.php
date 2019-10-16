<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
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

function terminaUpload(t_t){
	
	
	frames_d = "<img src='../uploaded/"+t_t+".jpg'  width='75' height='70' />";
	
	
	$("#thumb").html(frames_d);
	$("#imagen").val(t_t);
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
       

<h1><img src="img/icons/posts.png" alt="" />Agregar universidad</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="universidad_agregar_form.php">

<input name="imagen" id="imagen" type="hidden" value="">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
         <div class="input medium">

            <label for="input2">Nombre</label>
            <input type="text" id="nombre" name="nombre" />
            <span>Ingresa el titulo de la entrada</span>
        </div>
        
        
           <div class="input medium">

            <label for="input2">Fundaci&oacute;n</label>
            <input type="text" id="fundacion" name="fundacion" />
            <span>Ejemplo: 1989</span>
        </div>
      
       
        
        
   		<div class="input">
            <label for="select">Tipo de universidad:</label>
            <select name="tipo" id="tipo">
            	<option value="0">P&uacute;blica</option>
                <option value="1">Privada</option>
            </select>
        </div>        
 
        
        
        
    <div class="input textarea">
            <label for="textarea1">Dirección:</label>
            <textarea name="direccion" id="direccion" rows="4" cols="2" style="width:470px;"></textarea>
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
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div> 
        
        
        
            <div class="input textarea">
            <label for="textarea1">Teléfono:</label>
            <textarea name="telefono" id="telefono" rows="4" cols="2" style="width:470px;"></textarea>
            <br>
            Incluye los números de fax y extensiones.
        </div>
        
        
        
          <div class="input medium">

            <label for="input2">Email</label>
            <input type="text" id="email" name="email" />
            
        </div>
        
        

        <div class="input textarea">
            <label for="textarea1">Plan de estudios</label>
            <textarea name="plandeestudios" id="plandeestudios" rows="20" cols="4"></textarea>
            Incluye los planes de estudios y carreras.
        </div>
        
       
       <div class="input medium">

            <label for="input2">Convocatoria:</label>
            <input type="text" id="convocatoria" name="convocatoria" />
             Fecha de inicio de convocatoria (Enero, Enero-Febrero)
            
        </div>
        
       <div class="input medium">

            <label for="input2">Tramites:</label>
            <input type="text" id="tramites" name="tramites" />
            Fecha de inicio de tr&aacute;mites (Enero, Enero-Febrero)
        </div>        
        
       <div class="input medium">

            <label for="input2">Inscripción:</label>
            <input type="text" id="inscripcion" name="inscripcion" />
            Fecha de inscripci&oacute;n (Enero, Enero-Febrero)
        </div>      
        
 		<div class="input medium">

            <label for="input2">Inicio:</label>
            <input type="text" id="inicio" name="inicio" />
            Fecha de inscripci&oacute;n (Enero, Enero-Febrero)
        </div>        
        
        <div class="input medium">

            <label for="input2">Costo de la inscripci&oacute;n:</label>
            <input type="text" id="costo_inscripcion" name="costo_inscripcion" />
            Ejemplo: 1200
        </div> 
        
        <div class="input medium">

            <label for="input2">Costo de la colegiatura:</label>
            <input type="text" id="colegiatura" name="colegiatura" />
            Ejemplo 1300
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