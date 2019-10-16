<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>

       <?php
	   
	   $id = $_GET["id"];
	   
	$qt = "SELECT * FROM porno_sitio WHERE id_sitio = '$id' ";
	
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id_sitio = $rowt[0];
		$id = $id_sitio;
		$id_categoria = $rowt[1];
		$sitio=$rowt[2];
		$intro = $rowt[3];
		$desc = $rowt[4];
		$precio = $rowt[5];
		$score = $rowt[6];
		$fecha = $rowt[7];
		$url = $rowt[8];
		$imagen = $rowt[9];
		
		$permalink = $rowt[11];
		
		$intro_trans = $rowt[17];
		$intro_es = $rowt[16];
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
        
        	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    
	<script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
    
    <script>
	
$(document).ready(function() {
	$('#color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$("#colorpre").css("background-color",hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});
	
});

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
       

<h1><img src="img/icons/posts.png" alt="" />Editar categoría</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="sitio_editar_form.php">
<input name="id" type="hidden" value="<?php echo $id; ?>">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
      
        <div class="input medium">

            <label for="input2">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $sitio; ?>" />
            <span>Ingresa el nombre de la categoría</span>
        </div>



        <div class="input textarea">
            <label for="textarea1">Descripci&oacute;n</label>
            <textarea name="desc" id="desc" rows="7" cols="4"><?php echo strip_tags($intro); ?></textarea>
            Incluye una breve descripci&oacute;n de la categoria
        </div>
        
         <div class="input textarea">
            <label for="textarea1">Traduccion</label>
            <textarea name="intro_trans" id="intro_trans" rows="7" cols="4"><?php echo $intro_trans; ?></textarea>

        </div>
        
          <div class="input textarea">
            <label for="textarea1">Traduccion FINAL</label>
            <textarea name="intro_es" id="intro_es" rows="7" cols="4"><?php echo utf8_encode($intro_es); ?></textarea>
        </div>
        
        

        <div class="submit">
            <input value="Editar" onClick="Validar();" />
        </div>
    </div>
    </form>
</div>




<div class="cb"></div>





</div>
        
        
    </body>
</html>