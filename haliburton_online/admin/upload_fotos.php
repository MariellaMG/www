<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	
	$imageRoute= "../uploaded/".$timestamp.".jpg";
	
	$imageRouteTmb = "../uploaded/thumb_".$timestamp.".jpg";
	
	$imageRouteTmb3 = "../uploaded/thumb2_".$timestamp.".jpg";
	
	$imageRouteTmb4 = "../uploaded/thumb3_".$timestamp.".jpg";
	
	$imageRouteTmb5 = "../uploaded/thumb4_".$timestamp.".jpg";
	
	$imageRouteTmb6 = "../uploaded/hd_".$timestamp.".jpg";
	
	move_uploaded_file($_FILES['Filedata']['tmp_name'],"../uploaded/".$timestamp."_hd.".$ext);
	
	//chmod($imageRoute, 0777); 
	
	
	
	$uploadedfile = "../uploaded/".$timestamp."_hd.".$ext;
	
	
	echo " - ".$uploadedfile;
	
	echo "<img src='"."../uploaded/".$timestamp."_hd.jpg"."' />";
	
	
	echo $ext;
	
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
	
	
	$newwidth=640;
	$newheight=480;
	$newheight = ($newwidth*$height)/$width;
	
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	$newwidth2=300;
	//$newheight2=263;
	$newheight2 = ($newwidth2*$height)/$width;
	$thumb=imagecreatetruecolor($newwidth2,$newheight2);
	
	$newwidth3=71;
	$newheight3=54;
	$newheight3 = ($newwidth3*$height)/$width;
	$thumb3=imagecreatetruecolor($newwidth3,$newheight3);
	
	$newwidth4=87;
	$newheight4=65;
	$newheight4 = ($newwidth4*$height)/$width;
	$thumb4=imagecreatetruecolor($newwidth4,$newheight4);
	
	$newwidth5=600;
	$newheight5=450;
	$newheight5 = ($newwidth5*$height)/$width;
	$thumb5=imagecreatetruecolor($newwidth5,$newheight5);
	
	$newwidth6=1200;
	$newheight6=800;
	$newheight6 = ($newwidth6*$height)/$width;
	$thumb6=imagecreatetruecolor($newwidth6,$newheight6);
	
	
	// this line actually does the image resizing, copying from the original
	// image into the $tmp image
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
	
	imagecopyresampled($thumb3,$src,0,0,0,0,$newwidth3,$newheight3,$width,$height);
	
	imagecopyresampled($thumb4,$src,0,0,0,0,$newwidth4,$newheight4,$width,$height);
	
	imagecopyresampled($thumb5,$src,0,0,0,0,$newwidth5,$newheight5,$width,$height);
	
	imagecopyresampled($thumb6,$src,0,0,0,0,$newwidth6,$newheight6,$width,$height);
	
	
	// now write the resized image to disk. I have assumed that you want the
	// resized, uploaded image file to reside in the ./images subdirectory.
	
	imagejpeg($tmp,$imageRoute,75);		
	/////////////////////////////////////////////////////////////////////
	////thhumb	
	imagejpeg($thumb,$imageRouteTmb,75);
	
	imagejpeg($thumb3,$imageRouteTmb3,75);
	
	imagejpeg($thumb4,$imageRouteTmb4,75);
	
	imagejpeg($thumb5,$imageRouteTmb5,75);
	
	imagejpeg($thumb6,$imageRouteTmb6,75);
	
	
	echo "<img src='".$imageRouteTmb."' />";
	
	
	imagedestroy($src);
	imagedestroy($tmp); 
	// NOTE: PHP will clean up the temp file it created when the request
	// has completed.
	
	
	

?>


