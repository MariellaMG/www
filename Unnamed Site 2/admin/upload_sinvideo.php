<?php


  function sec2hms($sec, $padHours = false) 
  {

    // start with a blank string
    $hms = "";
    
    // do the hours first: there are 3600 seconds in an hour, so if we divide
    // the total number of seconds by 3600 and throw away the remainder, we're
    // left with the number of hours in those seconds
    $hours = intval(intval($sec) / 3600); 

    // add hours to $hms (with a leading 0 if asked for)
    $hms .= ($padHours) 
          ? str_pad($hours, 2, "0", STR_PAD_LEFT). ":"
          : $hours. ":";
    
    // dividing the total seconds by 60 will give us the number of minutes
    // in total, but we're interested in *minutes past the hour* and to get
    // this, we have to divide by 60 again and then use the remainder
    $minutes = intval(($sec / 60) % 60); 

    // add minutes to $hms (with a leading 0 if needed)
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ":";

    // seconds past the minute are found by dividing the total number of seconds
    // by 60 and using the remainder
    $seconds = intval($sec % 60); 

    // add seconds to $hms (with a leading 0 if needed)
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

    // done!
    return $hms;
    
  }
  
  
  
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);

	$mb = ($_FILES['Filedata']['size'])/1000000;
	
	//$timestamp = $_POST['timestamp'];
	$timestamp = $_GET['timestamp'];
	
	
	$imageRoute= "../uploaded/".$timestamp.".".$extension;
	
	move_uploaded_file($_FILES['Filedata']['tmp_name'],$imageRoute);
	
	echo " - ";
	
	$input = $_FILES['Filedata']['tmp_name'];

	//$_REQUEST['mov'] = $uploadedfile;
	
	//$input=$imageRoute;
	$input = $imageRoute;
	
	$mov = new ffmpeg_movie($input);
	$div = $mov->getDuration()/6;
	
	$p1 = sec2hms($div*1,true);
	$p2 = sec2hms($div*2,true);
	$p3 = sec2hms($div*3,true);
	$p4 = sec2hms($div*4,true);
	$p5 = sec2hms($div*5,true);
	$p6 = sec2hms($div*6,true);
	
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p1." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p2." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p3." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p4." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p5." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$input." -b 3000kb -an -ss ".$p6." -an -r 30 -vframes 1 -y ../uploaded/".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	
	
	/*
	
	
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
		
		*/
	

?>

