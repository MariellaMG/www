<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	
	//echo "subiendo: ".$_FILES['Filedata']['name'];
	
	$timestamp = $_GET['timestamp'];
	  
	$imageRoute= "../imagenes-lugares/".$timestamp.".jpg";
	$imageRouteTmb = "../imagenes-lugares/thumb_".$timestamp.".jpg";
	

	$uploadedfile = "../imagenes-lugares/".$timestamp."_hd.jpg";

	
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="wbmp"){
		
		echo "ES FOTO";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../imagenes-lugares/".$timestamp."_hd.jpg");
	    
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
		
		
		$newwidth=760;
		$newheight = ($newwidth*$height)/$width;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		$newwidth2=200;
		$newheight2 = ($newwidth2*$height)/$width;
		$thumb=imagecreatetruecolor($newwidth2,$newheight2);
		
		
		//$altobase = (760*$height)/$width;
		
		$src2 = imagecreatetruecolor(760,$newheight);
		imagecopyresampled($src2,$src,0,0,0,0,760,$newheight,$width,$height);
		
		
		$altobase = (200*$height)/$width;
		$src3 = imagecreatetruecolor(200,$newwidth2);
		imagecopyresampled($src3,$src,0,0,0,0,200,$newheight2,$width,$height);
	
		
		///AGREGAR EL LOGO
		
		
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
		
		imagejpeg($tmp,$imageRoute,85);	
		imagejpeg($thumb,$imageRouteTmb,85);
	
		echo "<img src='".$imageRouteTmb."' />";
		imagedestroy($src);
		imagedestroy($tmp); 
		
		unlink($uploadedfile);
		
	}else{
		echo " ES ARCHIVO
		
		";
		echo "<a href='../imagenes-lugares/".$timestamp.".".$ext."'>";
		echo $timestamp.".".$ext;
		echo "</a>";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../imagenes-lugares/".$timestamp.".".$ext);
		
	}
	

	

?>


<img src="logo2.png" />
