<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php
include "ligas.php";
?>



<?php

extract($_POST);


$intro = VaciarComillas($intro);
$desc = VaciarComillas($desc);
$nombre = VaciarComillas($nombre);
$pie = VaciarComillas($pie);

$tit = stripslashes(trim(($tomo.$referencia)));
$permalink = substr(strtolower(cleanForShortURL($tit)),0,100);
while(substr($permalink,-1,1)=="-"){
	$permalink = substr($permalink,0,-1);
}
$q = "SELECT permalink FROM acta WHERE permalink LIKE '".$permalink."%'";
$result = mysql_query($q, $db);
$contando = 0;
while ($row = mysql_fetch_row($result)){
	$contando++;
}
if($contando >= 1){
	$contando++;
	$permalink = $permalink."-".$contando;
}

/*
$pregunta = utf8_decode($pregunta);
$opcion1 = utf8_decode($opcion1);
$opcion2 = utf8_decode($opcion2);
$opcion3 = utf8_decode($opcion3);
$opcion4 = utf8_decode($opcion4);
*/

$fotos = "http://michoacan.uno/uploaded/".$imagen.".jpg";

if($anio=="-"){
	$anio=$anio2;
}

$fechaa=$anio."/".$mes."/".$dia;
$fecha=$anio."/".$mes."/".$dia;

$referencia = "AHMM,FAC".$num1.",LN.".$num2;




$qin = "UPDATE `michoaca_db`.`acta` SET `numero` = '2' WHERE `acta`.`id_acta` = 19;";


echo $qin;

$fichero = "back/update_".time().'.txt';
// Abre el fichero para obtener el contenido existente
$actual = file_get_contents($fichero);
// Añade una nueva persona al fichero
$actual .= $qin;
// Escribe el contenido al fichero
file_put_contents($fichero, $actual);

$result = mysql_query($qin, $db);

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
        
    </head>

    <body class="white">
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                <a href="#"></a>
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
       

<h1><img src="img/icons/posts.png" alt="" />Acta agregada '<?php echo $nombre; ?>'</h1>

	<div class="notif success" id="completo" style="margin-top:20px;">
            <strong>Success: </strong>El acta se ha agregado correctamente
            <a href="#" class="close" onClick="Hide('completo');"></a>

        </div>
        



<div class="cb"></div>





</div>
        
        
    </body>
</html>