<?php

	//include("includes/data/mysql_infos.php");
	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);

	$archivo = $_GET['timestamp'].".flv";

	
	$mb = ($_FILES['Filedata']['size'])/1000000;
	
	
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	
	$imageRoute= "../uploaded/".$timestamp.".".$extension;
	
	$imageRouteTmb0 = "../uploaded/thumb".$timestamp.".jpg";
	$imageRouteTmb = "../uploaded/thumb".$timestamp.".jpg";
	$imageRouteTmb3 = "../uploaded/thumb2".$timestamp.".jpg";
	
	
	
	//move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRoute);
	
	//chmod($imageRoute, 0644); 
	//chmod("../uploaded/".$timestamp.".flv", 0644);
	//chmod("../uploaded/".$timestamp.".mp4", 0644);
	
	echo " - ";
	
	$input = $_FILES['Filedata']['tmp_name'];

	//$_REQUEST['mov'] = $uploadedfile;
	
	$extension = "ffmpeg";
	
	//$input=$imageRoute;
	
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss 00:00:10 -an -r 30 -vframes 1 -y ".'../uploaded/'.$timestamp.'.jpg';
	shell_exec($exec_string);
	
	
	$exec_string = 'ffmpeg -i '.$input.' -s 320x240 -b 1000k -ab 380k -y ../uploaded/'.$timestamp.'_.flv';
	shell_exec($exec_string);
	
	
	$exec_string = 'ffmpeg -i '.$input.' -s 320x240 -b 1000k -ab 380k -y ../uploaded/'.$timestamp.'_.mp4';
	shell_exec($exec_string);
	
	
	$uploadfile=$input;
	
	$img = '../uploaded/'.$timestamp.'.jpg';
	
	$uploadedfile = $img;
	
	
	
	
	
	
	// Create an Image from it so we can do the resize
	$src = imagecreatefromjpeg($uploadedfile);
	
	
	// Capture the original size of the uploaded image
	list($width,$height)=getimagesize($uploadedfile);
	
	// For our purposes, I have resized the image to be
	// 600 pixels wide, and maintain the original aspect 
	// ratio. This prevents the image from being "stretched"
	// or "squashed". If you prefer some max width other than
	// 600, simply change the $newwidth variable
	$newwidth=478;
	$newheight=319;
	$tmp=imagecreatetruecolor($newwidth,$newheight);
	
	$newwidth2=140;
	$newheight2=93;
	$thumb=imagecreatetruecolor($newwidth2,$newheight2);
	
	$newwidth3=320;
	$newheight3=240;
	$thumb3=imagecreatetruecolor($newwidth3,$newheight3);
			
	
	// this line actually does the image resizing, copying from the original
	// image into the $tmp image
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
	imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
	
	imagecopyresampled($thumb3,$src,0,0,0,0,$newwidth3,$newheight3,$width,$height);
	
	
	//$watermark = imagecreatefrompng('agua.png');
	//$ww = imagesx($watermark);
	//$wh = imagesy($watermark);
	
	//$w = imagesx($tmp);
	//$h = imagesy($tmp);
	
	// Merge watermark upon the original image
	//imagecopy($tmp, $watermark, $w-$ww, $h-$wh, 0, 0, $ww, $wh);
	
	// now write the resized image to disk. I have assumed that you want the
	// resized, uploaded image file to reside in the ./images subdirectory.
	$filename = $imageRoute;
	imagejpeg($tmp,$imageRouteTmb0,75);		
	/////////////////////////////////////////////////////////////////////
	////thhumb
	imagejpeg($thumb,$imageRouteTmb,75);
	
	imagejpeg($thumb3,$imageRouteTmb3,75);
	
	
	imagedestroy($src);
	imagedestroy($tmp); 
	// NOTE: PHP will clean up the temp file it created when the request
	// has completed.
		
	

?>

