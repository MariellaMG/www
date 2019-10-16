<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	
	//$extension = "jpg";
	
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	$ext = $extension;
	
	$extension = "jpg";
	
	$imageRoute= "../uploaded/".$timestamp.".".$extension;
	
	$imageRouteTmb = "../uploaded/thumb".$timestamp.".".$extension;
	
	$imageRouteTmb3 = "../uploaded/thumb2".$timestamp.".".$extension;
	
	//move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRoute);
	
	//chmod($imageRoute, 0777); 
	
	echo " - ";
	
	$uploadedfile = $_FILES['Filedata']['tmp_name'];

	// Create an Image from it so we can do the resize
	
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
	$newwidth=500;
	$newheight=375;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	$newwidth2=180;
	$newheight2=135;
	$thumb=imagecreatetruecolor($newwidth2,$newheight2);
	
	$newwidth3=320;
	$newheight3=240;
	$thumb3=imagecreatetruecolor($newwidth3,$newheight3);
			
	
	// this line actually does the image resizing, copying from the original
	// image into the $tmp image
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
	
	imagecopyresampled($thumb3,$src,0,0,0,0,$newwidth3,$newheight3,$width,$height);
	
	
	
	// now write the resized image to disk. I have assumed that you want the
	// resized, uploaded image file to reside in the ./images subdirectory.
	$filename = $imageRoute;
	imagejpeg($tmp,$filename,85);		
	/////////////////////////////////////////////////////////////////////
	////thhumb	
	imagejpeg($thumb,$imageRouteTmb,85);
	
	imagejpeg($thumb3,$imageRouteTmb3,85);
	
	
	imagedestroy($src);
	imagedestroy($tmp); 
	// NOTE: PHP will clean up the temp file it created when the request
	// has completed.
	
	
	

?>





