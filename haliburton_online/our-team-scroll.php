<?php

	include("admin/includes/mysql_infos2.php");

     $id = $_GET['id'];
	
	if($id!=""){
		$qt = "SELECT * FROM employee WHERE id_employee='$id' ORDER BY id_employee LIMIT 1 ";
	}else{
		$qt = "SELECT * FROM employee ORDER BY orden LIMIT 1 ";
	}
	
	/////
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_employee_a = $rowt[0];
		$id_employee = $rowt[0];
		$employee = $rowt[1];
		$archivos = $rowt[2];
		$fotos = $rowt[3];
		$imagen = $rowt[4];
		$description = $rowt[5];
		$hd = substr($imagen,0,-4);
		$hd .= "_hd.jpg";
		$orden = $rowt[9];
	}
	
	$qt = "SELECT count(*) FROM employee  ";
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$employees = $rowt[0];
	}
	
	$qt = "SELECT count(*) FROM employee  WHERE orden<'$orden'";
	//echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$previos = $rowt[0];
	}
	
	
	
	
	
	//echo $hd;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $employee; ?>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/our-team.js"></script>
<script src="js/menu_over.js"></script>

 <script>
 var totales=<?php echo $employees-1+6; ?>;
 
 	$( document ).ready(function() {
		//pos=<?php echo $previos; ?>;
		//if(pos>=totales-3){
		//	pos=totales-3;
		//}
		var marg=(pos*-$(".dd1").width())-17;
		//$("#profile_container_int").css( { "margin-left" : marg+"px"} );
		/*
		$("#profile_container_int").stop();
		$("#profile_container_int").animate({
			marginLeft: marg+'px'
		}, 40);
		*/
	});
 </script>
  
 <script>
 
 
 
 $( document ).ready(function() {
 	
  //ShowCC_out('bb1','bb2');
  
  <?php
	$ee=$employees-4;
	
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY orden ASC LIMIT $ee,3";
	
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$id_employee = $rowt[0]+900;
?>

	ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');
	
<?php } ?>

 <?php
	$qt = "SELECT * FROM employee ORDER BY orden  ";
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$id_employee = $rowt[0];
?>

	ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');
	
<?php } ?>

 <?php
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY orden ASC LIMIT 3";
	
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$id_employee = $rowt[0]+1900;
?>

	ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');
	
<?php } ?>

		pos=3;
		var mm = ( (3) *-$(".dd1").width())-17;
		$("#profile_container_int").css("marginLeft", mm+"px");
 
  
});


		
		

 </script>
 
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/our-team--.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
<link rel="stylesheet" type="text/css" href="css/menu_over.css">
<style>
.box_vw{
	width:87%;
	margin:auto;
	padding-top:2vw;
	font-family: 'Lato', sans-serif;
	text-align:center;
}
.title_vw{
	font-size:1.2vw;
	font-weight:normal;
	text-align:left;
	font-weight:bold;
}
.text_vw{
	font-size:0.98vw;
	text-align:left;
}
.text_vw a{
	color:#000;
}
.text_vw a:hover{
	color:#000;
	text-decoration:underline;
}
#bb3{
	background-color: rgba(255, 255, 255, 0.8);
	padding-top:15vw !important;
	font-size:2vw !important;
}
#header{
	height:44vw;
}
</style>
</head>


<?php
	if($id!=""){
		$qt = "SELECT * FROM employee WHERE id_employee='$id' ORDER BY id_employee LIMIT 1 ";
	}else{
		$qt = "SELECT * FROM employee ORDER BY orden LIMIT 1 ";
	}
	/////
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_employee_a = $rowt[0];
		$id_employee = $rowt[0];
		$employee = $rowt[1];
		$archivos = $rowt[2];
		$fotos = $rowt[3];
		$imagen = $rowt[4];
		$description = $rowt[5];
		
		$html_plus = $rowt[10];
		
		$hd = substr($imagen,0,-4);
		$hd .= "_hd.jpg";
	}
?>


<body>
<div class="top" id="top">
	<div class="logo">
    	<a href="/">	
         <img src="/elements/top_logo.png" height="60">
        </a>
    </div>
    
    <div class="menu">
    	<ul>
           <?php include "menu_top.php"; ?>
            
        </ul>
    </div>
    
    <div class="clr"></div>
</div>

 <?php include "menu_over.php"; ?>

<div class="header" id="header" style="background:url(/images_our-team/OurTeam_header_1000.jpg); background-size:100% auto;"  onclick="HideMenu();">
	<div class="white" id="white" style="width:38vw; height:14.5vw; top:38% !important;">
    	<div class="white_int" style="padding-top:0%; padding-bottom:0%;">
    		<h1 style="padding-top:1.5vw; font-size:5vw;">OUR TEAM</h1>
            <h2 style="font-size:2vw;">Your success is our common purpose</h2>
    	</div>	
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	
        <div class="midmenu_div"><a href="core-values.php">CORE VALUES</a></div>
        <div class="midmenu_div"><a href="our-team-new.php" >OUR TEAM</a></div>
        <div class="midmenu_div"><a href="our-facility.php">OUR FACILITY</a></div>
        <div class="midmenu_div"><a href="sustainability.php">SUSTAINABILITY</a></div>
        <div class="clr"></div>
    </div>
</div>

<a name="profile" id="profile"></a>

<div id="profile_container_a" style="overflow:hidden; ">
    <div id="profile_container_a_int" style="width:8000px;" >
    
        <div class="bb1" id="bb1" 
        style="background-image:url(<?php echo $hd; ?>);"    >
            <a href="#n" >
                <div id="bb2" class="cc2">
                    <div class="cc3" id="bb3" style="text-align:center;" >
                    <?php echo $employee; ?>
                    </div>
                </div>   
            </a>
        </div>
        
          <div class="bb1_gray" id="cc1"  >
            <div class="box_vw" id="cc2">
                <h2 class="title_vw"><?php echo $employee; ?></h2>
                <div class="text_vw">
    <?php 
	
	if($html_plus==1){
		echo nl2br($description); 
	}else{
		echo nl2br(nl2br($description)); 
	}
	
	
	?>
                </div>
            </div>
        </div>
       
        
        <div class="clr"></div>
        
</div>
</div>


<div onclick="Back();" style="width:100px; height:100px; position:absolute; left:0px; top:500px; z-index:20;" id="atras" >
<img src="images_arrow/arrow-18.png" width="80" />
</div>

<div onclick="Forward();" style=" width:100px; height:100px; position:absolute; left:100px; top:500px; z-index:20;" id="adelante" >
<img src="images_arrow/arrow-20.png" width="80" />
</div>

<div id="profile_container" style="overflow:hidden;">
<div id="profile_container_int" style="width:25000px;" >



    
    <?php
	
	$ee=$employees-4;
	
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY orden ASC LIMIT $ee,3";
	/////
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_employee = $rowt[0];
		$id=$id_employee+900;
		$employee = $rowt[1];
		$archivos = $rowt[2];
		$fotos = $rowt[3];
		$imagen = $rowt[4];
		$description = $rowt[5];
		$hd = substr($imagen,0,-4);
		$hd .= "_hd.jpg";
		//onmouseover="ShowCC('gg1','gg2');" onmouseout="ShowCC_out('gg1','gg2');"
?>

  <div class="dd1" id="dd1_<?php echo $id; ?>"  
    style="background-image:url(<?php echo $imagen; ?>);"  onmouseover="ShowCC('dd1_<?php echo $id; ?>','dd2_<?php echo $id; ?>');" onmouseout="ShowCC_out('dd1_<?php echo $id; ?>','dd2_<?php echo $id; ?>');"  >
        <a href="our-team-scroll.php?id=<?php echo $id_employee; ?>#profile" >
            <div id="dd2_<?php echo $id; ?>" class="ccc2">
                <?php echo $employee; ?>
                
            </div>   
        </a>
    </div>
    
    <?php
	}
	?>



<?php
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY orden";
	/////
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_employee = $rowt[0];
		$employee = $rowt[1];
		$archivos = $rowt[2];
		$fotos = $rowt[3];
		$imagen = $rowt[4];
		$description = $rowt[5];
		$hd = substr($imagen,0,-4);
		$hd .= "_hd.jpg";
		//onmouseover="ShowCC('gg1','gg2');" onmouseout="ShowCC_out('gg1','gg2');"
?>

  <div class="dd1" id="dd1_<?php echo $id_employee; ?>"  
    style="background-image:url(<?php echo $imagen; ?>);"  onmouseover="ShowCC('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');" onmouseout="ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');"  >
        <a href="our-team-scroll.php?id=<?php echo $id_employee; ?>#profile" >
            <div id="dd2_<?php echo $id_employee; ?>" class="ccc2">
                <?php echo $employee; ?>
                
            </div>   
        </a>
    </div>
    
    <?php
	}
	?>
    
    
    
    
    
    
    
    
    
    
    
    <?php
	
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY orden ASC LIMIT 3";
	/////
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[1]);
		$id_employee = $rowt[0];
		$id=$id_employee+1900;
		$employee = $rowt[1];
		$archivos = $rowt[2];
		$fotos = $rowt[3];
		$imagen = $rowt[4];
		$description = $rowt[5];
		$hd = substr($imagen,0,-4);
		$hd .= "_hd.jpg";
		//onmouseover="ShowCC('gg1','gg2');" onmouseout="ShowCC_out('gg1','gg2');"
?>

  <div class="dd1" id="dd1_<?php echo $id; ?>"  
    style="background-image:url(<?php echo $imagen; ?>);"  onmouseover="ShowCC('dd1_<?php echo $id; ?>','dd2_<?php echo $id; ?>');" onmouseout="ShowCC_out('dd1_<?php echo $id; ?>','dd2_<?php echo $id; ?>');"  >
        <a href="our-team-scroll.php?id=<?php echo $id_employee; ?>#profile" >
            <div id="dd2_<?php echo $id; ?>" class="ccc2">
                <?php echo $employee."----"; ?>
                
            </div>   
        </a>
    </div>
    
    <?php
	}
	?>
    
    
    
    
    
    
   
    
  <div class="clr"></div>
    
</div>

</div>






<div class="title">
     <div class="title_tree">
            <div class="title_info">
              MEET THE TEAM
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
      <div class="footer_tree" style="width:100% !important;">
            <div class="footer_info" style="font-size:16px; ">
              
              Most of the hundreds of products that we manufacture today utilize proprietary processes, our own unique ingredients or state-of-the-art packaging technology. This gives us a distinct market advantage and customer appeal, as well as a significant cost advantage. We offer:<br /><br />
• Expertise in manufacturing, quality assurance and quality control<br />
• State-of-art manufacturing facility with tremendous scale and capacity for growth<br />
• Proprietary technologies that enhance product solutions while driving down costs<br />
• Experienced and knowledgeable sales and management team<br />
• Best-in-class culinary team to support your menu and product development needs<br />
• Experienced Research & Development team to solve product and packaging challenges<br />
 • Aggressive growth strategy with a proven track record of performance and stability<br />
• Industry leading speed to market capabilities<br />
• Strong multi-national customer base<br /><br />
As a primary processor of vegetable, grain and bean products our location and strong partnership with our growers and the vendor community, gives us the ability to offer competitive pricing and unique products to our customers. This combined with our large-scale manufacturing operations, gives us the ability to service the largest national restaurant operators both domestically and Internationally.


            </div>
       </div>
         
        
       <div class="clr"></div>
</div>






<?php
include "footer.php";
?>

</body>

</html>
<?php
mysql_close($link);
?>
