<?php

	include("includes/data/mysql_infos.php");
	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);

	$archivo = $_GET['timestamp'].".flv";
	$url = "http://www.laondaesjuntarnos.com/uploaded/".$archivo;
	
	$mb = ($_FILES['Filedata']['size'])/1000000;
	
	$q = "INSERT INTO `upload` ( `id_upload` , `archivo` , `size` , `fecha`,`mb`,`flv` )
VALUES (
'', '".$_FILES['Filedata']['name']."', '".$_FILES['Filedata']['size']."', now() ,'".$mb."','".$url."'
);
";
$result = mysql_query($q, $db);
	
	
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	
	$imageRoute= "./uploaded/".$timestamp.".jpg";
	$imageRouteTmb = "./uploaded/thumb".$timestamp.".jpg";
	$imageRouteTmb3 = "./uploaded/thumb2".$timestamp.".jpg";
	
	
	
	
	//move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRoute);
	
	chmod($imageRoute, 0777); 
	
	echo " - ";
	
	$uploadedfile = $_FILES['Filedata']['tmp_name'];

	$_REQUEST['mov'] = $uploadedfile;
	
	$extension = "ffmpeg";
	$input=$_REQUEST['mov'];
	
	if(isset($_REQUEST['mov'])){
	
	$exec_string = $extension.' -i '.$input.' ./uploaded/'.$timestamp.'.flv';
	///$exec_string = $extension.' -i '.$input.' -s 500x375 ./uploaded/'.$timestamp.'.flv';
	shell_exec($exec_string);
	
	
	$exec_string = $extension.' -i '.$input.' ./uploaded/'.$timestamp.'.mp4';
	///$exec_string = $extension.' -i '.$input.' -s 500x375 ./uploaded/'.$timestamp.'.flv';
	shell_exec($exec_string);
	
	
	
	$uploadfile=$input;
	$img = './uploaded/'.$timestamp.'.jpg';
	
	$uploadedfile = $img;
	
	$mov = new ffmpeg_movie($uploadfile);

	echo 'Frame count: '. $mov->getFrameCount(). '<br />' ;
	echo 'Get duration: '. $mov->getDuration(). '<br />' ;
	echo 'Frame rate: '. $mov->getFrameRate(). '<br />' ;
	echo 'File name: '. $mov->getFilename(). '<br />' ;
	
	echo "getFrameHeight: " . $mov->getFrameHeight()."<br />";
	echo "getFrameWidth: " . $mov->getFrameWidth();
	
	$frame=1;
	$ff_frame = $mov->getFrame($frame);
	$gd_image = $ff_frame->toGDImage();
	
	imagejpeg($gd_image, $img);
	imagedestroy($gd_image);
	
	echo '<center><img src="'.$img.'" border="1" alt="Screen Capture" /></center>';
	}
	
	$archivo = $timestamp.".flv";
	$url = "http://www.laondaesjuntarnos.com/uploaded/".$archivo;

$q = "INSERT INTO `flv` ( `id_flv` , `frames` , `duracion` , `ancho` , `alto`,`archivo`,`url` )
VALUES (
'', ".$mov->getFrameCount().", '".$mov->getDuration()."', '".$mov->getFrameWidth()."', '".$mov->getFrameHeight()."', '".$archivo."', '".$url."' 
);
";
$result = mysql_query($q, $db);

mysql_close($db);


	
	
	
	// Create an Image from it so we can do the resize
	$src = imagecreatefromjpeg($uploadedfile);
	
	
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
	
	
	$watermark = imagecreatefrompng('agua.png');
	$ww = imagesx($watermark);
	$wh = imagesy($watermark);
	
	$w = imagesx($tmp);
	$h = imagesy($tmp);
	
	// Merge watermark upon the original image
	imagecopy($tmp, $watermark, $w-$ww, $h-$wh, 0, 0, $ww, $wh);
	
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





<?php

/*
	$timestamp = $_GET['timestamp'];
	$extension = substr($_FILES['Filedata']['name'], -3, 3);
	$extension = strtolower($extension);
	
	
	
	$imageRoute= "uploaded/".$timestamp.".".$extension;
	move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRoute);
	chmod($imageRoute, 0777); 
	echo " -- ";
	*/
/*$userimage=$_GET['timestamp'];
$prefix="";
if(file_exists("user_images/".$_FILES['Filedata']['name'])){
	$prefix=time();
	}

move_uploaded_file($_FILES['Filedata']['tmp_name'], "user_images/".$prefix.$_FILES['Filedata']['name']);
chmod("user_images/".$_FILES['Filedata']['name'], 0777); 

move_uploaded_file($_FILES['Filedata']['tmp_name'],"uploaded/".$_FILES['Filedata']['name']);
chmod("uploaded/".$_FILES['Filedata']['name'], 0777); 
echo " - ";*/


?>
