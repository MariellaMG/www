<?php
header('Content-Type: text/html; charset=utf-8'); 


	extract($_POST);
	extract($_GET);
	
	
?>
<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>


<?php

	$q = "SELECT w,h,liga FROM banner_tam WHERE id_banner_tam='$posicion' ";
	$result = mysql_query($q, $db);
	while ($row = mysql_fetch_row($result)){
		$w = $row[0];
		$h = $row[1];
	}



?>


<?php

	include("includes/mysql_infos.php");
	
	$ext = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$ext = strtolower($ext);
	
	
	
	//$ext = $extension;
	
	$extension = "jpg";
	
	$imageRoute= "../uploaded/".$timestamp.".".$extension;

	$imageRouteHD= "../uploaded/".$timestamp.".".$ext;
	
	
	$imageRouteTmb = "../uploaded/thumb".$timestamp.".".$extension;
	
	$imageRouteTmb3 = "../uploaded/thumb2".$timestamp.".".$extension;
	
	move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRouteHD);
	
	//chmod($imageRoute, 0777);
	
	echo " - ";
	
	$uploadedfile = $imageRouteHD;

	// Create an Image from it so we can do the resize
	
	if($ext!="swf"){
	
		if($ext=="png"){
			$src = imagecreatefrompng($uploadedfile);
		}else if($ext=="jpeg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="jpg"){
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($ext=="gif"){
			$src = imagecreatefromgif($uploadedfile);
		}else if($ext=="bmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else if($ext=="wbmp"){
			$src = imagecreatefromwbmp($uploadedfile);
		}else{
			$src = imagecreatefrompng($uploadedfile);
		}
		
		
		
		// Capture the original size of the uploaded image
		list($width,$height)=getimagesize($uploadedfile);
		
		// For our purposes, I have resized the image to be
		// 600 pixels wide, and maintain the original aspect 
		// ratio. This prevents the image from being "stretched"
		// or "squashed". If you prefer some max width other than
		// 600, simply change the $newwidth variable
		
		//978x157
		
		$newwidth=$w;
		$newheight=$h;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
	
		
		// this line actually does the image resizing, copying from the original
		// image into the $tmp image
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		
	
		
		$filename = $imageRoute;
		imagejpeg($tmp,$filename,90);		
		
		imagedestroy($src);
		imagedestroy($tmp); 
		// NOTE: PHP will clean up the temp file it created when the request
		// has completed.
		$archivo = "uploaded/".$timestamp.".jpg";
		$flash = 0;
		
	}else{
		$archivo = "uploaded/".$timestamp.".swf";
		$flash = 1;
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../".$archivo);
	}
	
	
	
	
	$qe = "INSERT INTO `banner` ( `id_banner` , `nombre` , `archivo` , `posicion` ,`descripcion`,`liga`,`swf` )
VALUES (
NULL , '$nombre', '$archivo', '$posicion','$descripcion','$liga','$flash'
);

";



$resulta = mysql_query($qe, $db);

			
mysql_close($db);
	
	
	

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
       

<h1><img src="img/icons/posts.png" alt="" />Agregar Banner</h1>

	<div class="notif success" id="completo" style="margin-top:20px;">
            <strong>Success: </strong>El banner se ha agregado correctamente
            <a href="#" class="close" onClick="Hide('completo');"></a>

        </div>
        



<div class="cb"></div>





</div>
        
        
    </body>
</html>