<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	
	//echo "subiendo: ".$_FILES['Filedata']['name'];
	
	$timestamp = $_GET['timestamp'];
	
	$imageRoute= "../contenido/".$timestamp.".jpg";
	$imageRouteTmb = "../contenido/thumb_".$timestamp.".jpg";
	$imageRouteTmb3 = "../contenido/thumb2_".$timestamp.".jpg";
	$thumb4url = "../contenido/thumb220_".$timestamp.".jpg";
	//$thumb5url = "../contenido/thumb270_".$timestamp.".jpg";  
	//$thumb6url = "../contenido/thumb145_".$timestamp.".jpg";
	//$thumb7url = "../contenido/thumb150_".$timestamp.".jpg";
	$thumb8url = "../contenido/thumb478_".$timestamp.".jpg";
	//$thumb9url = "../contenido/thumb87_".$timestamp.".jpg";
	$thumb10url = "../contenido/thumb315_".$timestamp.".jpg";
	$thumb11url = "../contenido/thumb640_".$timestamp.".jpg";
	//$thumb12url = "../contenido/thumb60_".$timestamp.".jpg";

	$contenidofile = "../contenido/".$timestamp."_hd.jpg";

	
	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif" || $ext=="bmp" || $ext=="wbmp"){
		
		echo "ES FOTO";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../contenido/".$timestamp."_hd.jpg");
	
		if($ext=="png"){
			$src = imagecreatefrompng($contenidofile);
		}else if($ext=="jpeg"){
			$src = imagecreatefromjpeg($contenidofile);
		}else if($ext=="jpg"){
			$src = imagecreatefromjpeg($contenidofile);
		}else if($ext=="gif"){
			$src = imagecreatefromgif($contenidofile);
		}else if($ext=="bmp"){
			$src = imagecreatefromwbmp($contenidofile);
		}else if($ext=="wbmp"){
			$src = imagecreatefromwbmp($contenidofile);
		}else{
			$src = imagecreatefrompng($contenidofile);
		}
	
		
		// Capture the original size of the contenido image
		list($width,$height)=getimagesize($contenidofile);
		
		
		$newwidth=720;
		$newheight=480;
		$newheight = ($newwidth*$height)/$width;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		$newwidth2=150;
		///$newheight2=100;
		$newheight2 = ($newwidth2*$height)/$width;
		$thumb=imagecreatetruecolor($newwidth2,$newheight2);
		
		$newwidth3=320;
		$newheight3=240;
		$newheight3 = ($newwidth3*$height)/$width;
		$thumb3=imagecreatetruecolor($newwidth3,$newheight3);
		
		/////////////////////220x147
		$newwidth4=220;
		$newheight4=147;
		$newheight4 = ($newwidth4*$height)/$width;
		$thumb4=imagecreatetruecolor($newwidth4,$newheight4);
		
		/////////////////////270x180
		$newwidth5=270;
		$newheight5=180;
		$newheight5 = ($newwidth5*$height)/$width;
		$thumb5=imagecreatetruecolor($newwidth5,$newheight5);
		
		/////////////////////145x97
		$newwidth6=145;
		$newheight6=97;
		$newheight6 = ($newwidth6*$height)/$width;
		$thumb6=imagecreatetruecolor($newwidth6,$newheight6);
		
		/////////////////////150x100
		$newwidth7=150;
		$newheight7=100;
		$newheight7 = ($newwidth7*$height)/$width;
		$thumb7=imagecreatetruecolor($newwidth7,$newheight7);
		
		/////////////////////478x319
		$newwidth8=478;
		$newheight8=319;
		$newheight8 = ($newwidth8*$height)/$width;
		$thumb8=imagecreatetruecolor($newwidth8,$newheight8);
		
		
		/////////////////////87x65
		$newwidth9=87;
		$newheight9=65;
		$newheight9 = ($newwidth9*$height)/$width;
		$thumb9=imagecreatetruecolor($newwidth9,$newheight9);
		
		/////////////////////315x236
		$newwidth10=315;
		$newheight10=236;
		$newheight10 = ($newwidth10*$height)/$width;
		$thumb10=imagecreatetruecolor($newwidth10,$newheight10);
		
		/////////////////////640x480
		$newwidth11=640;
		$newheight11=480;
		$newheight11 = ($newwidth11*$height)/$width;
		$thumb11=imagecreatetruecolor($newwidth11,$newheight11);
		
		/////////////////////60
		$newwidth12=60;
		$newheight12=45;
		$newheight12 = ($newwidth12*$height)/$width;
		$thumb12=imagecreatetruecolor($newwidth12,$newheight12);
		
		
		
		///Cmabiando la imagen original a 720,480
		//imagecopyresampled($src,$src,0,0,0,0,720,480,720,480);
		
		$altobase = (720*$height)/$width;
		
		$src2 = imagecreatetruecolor(720,$altobase);
		imagecopyresampled($src2,$src,0,0,0,0,720,$altobase,$width,$height);
		
		
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
		imagecopyresized($src2,$imagen_logo,$ancho_muestra,$alto_muestra,0,0,$ancho_logo,$alto_logo,$ancho_logo,$alto_logo);
		$width = 720;
		$height = $altobase;
		imagecopyresampled($tmp,$src2,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		imagecopyresampled($thumb,$src2,0,0,0,0,$newwidth2,$newheight2,$width,$height);
		
		imagecopyresampled($thumb3,$src2,0,0,0,0,$newwidth3,$newheight3,$width,$height);
		
		imagecopyresampled($thumb4,$src2,0,0,0,0,$newwidth4,$newheight4,$width,$height);
		
		imagecopyresampled($thumb5,$src2,0,0,0,0,$newwidth5,$newheight5,$width,$height);
		
		imagecopyresampled($thumb6,$src2,0,0,0,0,$newwidth6,$newheight6,$width,$height);
		
		imagecopyresampled($thumb7,$src2,0,0,0,0,$newwidth7,$newheight7,$width,$height);
		
		imagecopyresampled($thumb8,$src2,0,0,0,0,$newwidth8,$newheight8,$width,$height);
		
		imagecopyresampled($thumb9,$src2,0,0,0,0,$newwidth9,$newheight9,$width,$height);
		
		imagecopyresampled($thumb10,$src2,0,0,0,0,$newwidth10,$newheight10,$width,$height);
		
		imagecopyresampled($thumb11,$src2,0,0,0,0,$newwidth11,$newheight11,$width,$height);
		
		imagecopyresampled($thumb12,$src2,0,0,0,0,$newwidth12,$newheight12,$width,$height);
		imagejpeg($tmp,$imageRoute,60);			
		imagejpeg($thumb,$imageRouteTmb,60);
		imagejpeg($thumb3,$imageRouteTmb3,60);
		imagejpeg($thumb4,$thumb4url,60);
		//imagejpeg($thumb5,$thumb5url,60);
		//imagejpeg($thumb6,$thumb6url,60);
		//imagejpeg($thumb7,$thumb7url,60);
		imagejpeg($thumb8,$thumb8url,60);
		//imagejpeg($thumb9,$thumb9url,60);
		imagejpeg($thumb10,$thumb10url,60);
		imagejpeg($thumb11,$thumb11url,60);
		//imagejpeg($thumb12,$thumb12url,60);
		echo "<img src='".$imageRouteTmb."' />";
		imagedestroy($src);
		imagedestroy($tmp); 
		
	}else{
		echo " ES ARCHIVO
		
		";
		echo "<a href='../contenido/".$timestamp.".".$ext."'>";
		echo $timestamp.".".$ext;
		echo "</a>";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../contenido/".$timestamp.".".$ext);
		
	}
	


?>

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
  
  	
	if( $ext=="avi" || $ext=="mov" || $ext=="mp4" || $ext=="ogv" || $ext=="mpeg" || $ext=="mjpeg" || $ext=="flv" || $ext=="mpg"    ){
		
		/*
		
		echo "ES VIDEO
		";
   
	$mb = ($_FILES['Filedata']['size'])/1000000; 
	
	 
	 $imageRoute= "../contenido/".$timestamp.".".$ext;
	 
	$input = $imageRoute;
	
	$mov = new ffmpeg_movie($input);
	$div = $mov->getDuration()/6;
	
	$p1 = sec2hms($div*1,true);
	$p2 = sec2hms($div*2,true);
	$p3 = sec2hms($div*3,true);
	$p4 = sec2hms($div*4,true);
	$p5 = sec2hms($div*5,true);
	$p6 = sec2hms($div*6,true);

	
	$frame1="../contenido/".$timestamp."_frame1.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p1." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame1.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame1.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame1.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame1.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame1." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame1.jpg";
	//shell_exec($exec_string);
	
	
	$frame2="../contenido/".$timestamp."_frame2.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p2." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	
	
	$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	////$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame2.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame2.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame2.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame2.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame2." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame2.jpg";
	//shell_exec($exec_string);
	
	
	$frame3="../contenido/".$timestamp."_frame3.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p3." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame3.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame3.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame3.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame3.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame3." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame3.jpg";
	//shell_exec($exec_string);
	
	
	$frame4="../contenido/".$timestamp."_frame4.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p4." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame4.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame4.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame4.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame4.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame4." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame4.jpg";
	//shell_exec($exec_string);
	
	
	$frame5="../contenido/".$timestamp."_frame5.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p5." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	////$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame5.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame5.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame5.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame5.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame5." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame5.jpg";
	//shell_exec($exec_string);
	
	
	$frame6="../contenido/".$timestamp."_frame6.jpg";
	
	$exec_string = "ffmpeg -i ".$input." -b 300000 -an -ss ".$p6." -an -r 30 -vframes 1 -s 720x480 -y ../contenido/".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	
	$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 320x240 -y ../contenido/thumb2_".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 220x147 -y ../contenido/thumb220_".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 270x180 -y ../contenido/thumb270_".$timestamp."_frame6.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 150x100 -y ../contenido/thumb150_".$timestamp."_frame6.jpg";
	//shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 478x319 -y ../contenido/thumb478_".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 640x480 -y ../contenido/thumb640_".$timestamp."_frame6.jpg";
	shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 60x45 -y ../contenido/thumb60_".$timestamp."_frame6.jpg";
	//shell_exec($exec_string);
	//$exec_string = "ffmpeg -i ".$frame6." -b 300000 -vframes 1 -s 87x65 -y ../contenido/thumb87_".$timestamp."_frame6.jpg";
	//shell_exec($exec_string);
	
	$exec_string = 'ffmpeg -i '.$input.' -s 320x240 -b 200000 -ab 38000 -ar 44100 -y ../contenido/'.$timestamp.'_.flv';
	shell_exec($exec_string);
	
	$exec_string = 'ffmpeg -i '.$input.' -vcodec mpeg4 -s 320x240 -b 200000 -ab 38000 -ar 44100 -f mp4 -y ../contenido/'.$timestamp.'_.mp4';
	shell_exec($exec_string);
	
	
	$exec_string = 'ffmpeg -i '.$input.' -acodec libvorbis -ac 2 -ab 96k -ar 44100 -b 345k -s 320x240 -y ../contenido/'.$timestamp.'_.ogv';
	shell_exec($exec_string);
	
	
	$exec_string = 'ffmpeg -i '.$input.' -s qcif -vcodec h263 -acodec aac -ac 1 -ar 44100 -strict experimental 8000 -r 25 -ab 32 -y ../contenido/'.$timestamp.'_.3gp';
	
	//shell_exec($exec_string);
	
	//$exec_string = 'ffmpeg -i '.$input.' -vcodec mpeg4 -s 720x480 -b 400000 -ab 40000 -ar 44100 -f mp4 -y ../contenido/'.$timestamp.'_hd.mp4';
	//shell_exec($exec_string);
	
	*/
	
	}

?>


<img src="logo2.png" />
