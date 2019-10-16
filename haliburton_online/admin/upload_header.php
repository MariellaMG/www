<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	
	$imageRoute= "../uploaded/".$timestamp.".jpg";
	
	$imageRouteTmb = "../uploaded/thumb_".$timestamp.".jpg";
	
	$imageRouteTmb3 = "../uploaded/thumb2_".$timestamp.".jpg";
	
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
	
	
	$newwidth=675;
	$newheight=140;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	
	
	// this line actually does the image resizing, copying from the original
	// image into the $tmp image
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	
	
	// now write the resized image to disk. I have assumed that you want the
	// resized, uploaded image file to reside in the ./images subdirectory.
	
	imagejpeg($tmp,$imageRoute,75);		
	/////////////////////////////////////////////////////////////////////
	////thhumb	
	
	
	imagedestroy($src);
	imagedestroy($tmp); 
	// NOTE: PHP will clean up the temp file it created when the request
	// has completed.
	
	
	

?>


