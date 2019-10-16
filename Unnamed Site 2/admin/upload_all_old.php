<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	
	//echo "subiendo: ".$_FILES['Filedata']['name'];
	
	$timestamp = $_GET['timestamp'];
	  
	$imageRoute= "../uploaded/".$timestamp.".jpg";
	$imageRouteTmb = "../uploaded/thumb_".$timestamp.".jpg";
	

	$uploadedfile = "../uploaded/".$timestamp."_hd.jpg";

	
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="wbmp"){
		
		echo "ES FOTO";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../uploaded/".$timestamp."_hd.jpg");
	    
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
		
		
		$newwidth=1000;
		$newheight = ($newwidth*$height)/$width;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		$newwidth2=800;
		$newheight2 = ($newwidth2*$height)/$width;
		$thumb=imagecreatetruecolor($newwidth2,$newheight2);
		
		
		
		///Cmabiando la imagen original a 720,480
		//imagecopyresampled($src,$src,0,0,0,0,720,480,720,480);
		
		$altobase = (1000*$height)/$width;
		
		
		$src2 = imagecreatetruecolor(1000,$altobase);
		imagecopyresampled($src2,$src,0,0,0,0,1000,$altobase,$width,$height);
		
		
		
		$altobase = (800*$height)/$width;
		$src3 = imagecreatetruecolor(800,$altobase);
		imagecopyresampled($src3,$src,0,0,0,0,800,$altobase,$width,$height);
	
		
		///AGREGAR EL LOGO
		$imagen_logo = imagecreatefrompng("logo2.png");
		// Defino ancho, alto del logo.
		$ancho_logo = imagesx($imagen_logo);
		$alto_logo = imagesy($imagen_logo);
		
		$ancho_dest = 720;
		$alto_dest = 480;
		$ancho_muestra = 10;
		$alto_muestra = 10;
		
		// Sobre pongo el logo a la imagen.
		//imagecopyresized($src2,$imagen_logo,$ancho_muestra,$alto_muestra,0,0,$ancho_logo,$alto_logo,$ancho_logo,$alto_logo);
		//$width = 720;
		//$height = $altobase;
		
		imagecopyresampled($tmp,$src2,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
		
		imagejpeg($tmp,$imageRoute,70);	
		imagejpeg($thumb,$imageRouteTmb,70);
	
		echo "<img src='".$imageRouteTmb."' />";
		imagedestroy($src);
		imagedestroy($tmp); 
		
		unlink($uploadedfile);
		
	}else{
		echo " ES ARCHIVO
		
		";
		echo "<a href='../archivos/".$timestamp.".".$ext."'>";
		echo $timestamp.".".$ext;
		echo "</a>";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../archivos/".$timestamp.".".$ext);
		
	}
	

	

?>


<img src="logo2.png" />
