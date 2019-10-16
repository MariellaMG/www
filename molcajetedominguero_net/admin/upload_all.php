<?php

	
	$extension = substr (strrchr ($_FILES['Filedata']['name'], "."), 1 );
	$extension = strtolower($extension);
	$ext = $extension;
	
	//echo "subiendo: ".$_FILES['Filedata']['name'];
	
	$timestamp = $_GET['timestamp'];
	 
	$imageRoute= "../uploaded/".$timestamp.".jpg";
	$imageRouteTmb = "../uploaded/thumb_".$timestamp.".jpg";
	$imageRouteTmbMed = "../uploaded/med_".$timestamp.".jpg";
	

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
		
		
		$newwidth=800;
		$newheight = ($newwidth*$height)/$width;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		$newwidth2=200;
		$newheight2 = ($newwidth2*$height)/$width;
		$thumb=imagecreatetruecolor($newwidth2,$newheight2);
		
		$newwidth3=78;
		$newheight3 = ($newwidth3*$height)/$width;
		$thumb3 =imagecreatetruecolor($newwidth3,$newheight3);
		
		
		//$altobase = (760*$height)/$width;
		
		$src2 = imagecreatetruecolor(970,$newheight);
		imagecopyresampled($src2,$src,0,0,0,0,970,$newheight,$width,$height);
		
		
		$altobase = (200*$height)/$width;
		$src3 = imagecreatetruecolor(200,$newheight2);
		imagecopyresampled($src3,$src,0,0,0,0,200,$newheight2,$width,$height);
		
		
		$altobase = (78*$height)/$width;
		$src4 = imagecreatetruecolor(78,$newheight3);
		imagecopyresampled($src4,$src,0,0,0,0,78,$newheight3,$width,$height);
	
	
		
		///AGREGAR EL LOGO
		
		
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		
		imagecopyresampled($thumb,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
		
		imagecopyresampled($thumb3,$src,0,0,0,0,$newwidth3,$newheight3,$width,$height);
		
		
		
		//$watermark = imagecreatefrompng("marca800.png");
		//imagecopyresampled($tmp,$watermark,0,0,0,0,$newwidth,$newheight,$newwidth,$newheight);
			
		//$watermark = imagecreatefrompng("marca200.png");
		//imagecopyresampled($thumb,$watermark,0,0,0,0,$newwidth2,$newheight2,$newwidth2,$newheight2);
		
		
		
		
		imagejpeg($tmp,$imageRoute,80);	
		imagejpeg($thumb,$imageRouteTmbMed,80);
		imagejpeg($thumb3,$imageRouteTmb,80);
	
	
		echo "<img src='".$imageRouteTmb."' />";
		imagedestroy($src);
		imagedestroy($tmp); 
		
		//unlink($uploadedfile);
		
	}else{
		echo " ES ARCHIVO
		
		";
		echo "<a href='../uploaded/".$timestamp.".".$ext."'>";
		echo $timestamp.".".$ext;
		echo "</a>";
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'],"../uploaded/".$timestamp.".".$ext);
		
	}
	

	

?>


<img src="logo2.png" />
