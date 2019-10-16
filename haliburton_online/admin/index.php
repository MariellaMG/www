<?php
session_start();

if($_SESSION['login']  == "correcto"){
	header("location: home.php");
}else{
	$_SESSION['login'] = "out";
}

extract($_POST);
extract($_GET);

$login = false;

if($usr=="admin" && $pass=="4dm1n"){
	$_SESSION['login']  = "correcto";
	$login = true;
	$index = 1;
	header("location: home.php");
}else{
	$login = false;
	$index=1;
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
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ --->
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
        
                <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
                
        <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
	
	if($("#usr").val()!=""){
		$("#t_usr").hide();
	}
	if($("#pass").val()!=""){
		$("#t_pass").hide();
	}	
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
	$("#"+t_id).hide();
}

</script>
        
    </head>

    <body class="white">
                
            <div id="content" class="login">
                
                <h1><img src="img/icons/locked.png" alt="" />Panel de administración</h1>
                
                
                <div class="notif tip">
                    Ingresa tu nombre de usuario y tu contraseña
                    <a href="#" class="close"></a>
                </div>
                <form action="index.php">

                <div class="input placeholder"  onClick="Hide('t_usr');">
                    <label for="login" id="t_usr"  onClick="Hide('t_usr');">Usuario</label>
                    <input type="text" id="usr" name="usr" onClick="Hide('t_usr');" onFocus="Hide('t_usr');"/>
                </div>
                <div class="input placeholder"  onClick="Hide('t_pass');">
                    <label for="pass" id="t_pass">Contraseña</label>
                    <input type="password" id="pass" name="pass" value="" onClick="Hide('t_pass');" onFocus="Hide('t_pass');"/>
                </div>

                <div class="checkbox">
                    
                </div>
                <div class="submit">
                    <input type="submit" value="Ingresar"/>
                </div>
                </form>

                
            </div>
        
        
    </body>
</html>
