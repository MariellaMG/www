<?php

include("admin/includes/mysql_infos2.php");

$id = $_GET['id'];
	
	if($id!=""){
		$qt = "SELECT * FROM employee WHERE id_employee='$id' ORDER BY id_employee LIMIT 1 ";
	}else{
		$qt = "SELECT * FROM employee ORDER BY id_employee LIMIT 1 ";
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
	}
	
	
	
	//echo $hd;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $employee; ?>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/about-us.js"></script>
 
 <script>
 $( document ).ready(function() {
 	
  //ShowCC_out('bb1','bb2');
  
  <?php
	$qt = "SELECT * FROM employee ORDER BY id_employee LIMIT 10 ";
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
	
?>

	ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');
	
<?php } ?>
 
  
});
 </script>
 
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/full4.css">
<link rel="stylesheet" type="text/css" href="css/mid.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
</head>


<?php
	if($id!=""){
		$qt = "SELECT * FROM employee WHERE id_employee='$id' ORDER BY id_employee LIMIT 1 ";
	}else{
		$qt = "SELECT * FROM employee ORDER BY id_employee LIMIT 1 ";
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
	}
?>


<body>
<div class="top">
	<div class="logo">
    	<a href="/">	
         <img src="/elements/top_logo.png" height="60">
        </a>
    </div>
    
    <div class="menu">
    	<ul>
            <li><a href="#a">CONTACT</a></li>
            <li><a href="#r">QUALITY</a></li>
            <li><a href="#r">PRODUCTS</a></li>
            <li><a href="#r">INNOVATION</a></li>
            <li><a href="about-us.html">ABOUT US</a></li>
            <li><a href="/">HOME</a></li>
            
        </ul>
    </div>
    
    <div class="clr"></div>
</div>

<div class="header" id="header">
	<div class="white" id="white">
    	<div class="white_int">
    		<h1>OUR TEAM</h1>
            <h2>Your success is our common purpose</h2>
    	</div>	
    </div>
</div>
<a name="profile" id="profile"></a>
<div>
    <div class="bb1" id="bb1" onmouseover="ShowCC('bb1','bb2');" onmouseout="ShowCC_out('bb1','bb2');" 
    style="background-image:url(<?php echo $hd; ?>);" >
        <a href="#n" >
            <div id="bb2" class="cc2">
                <div class="cc3" id="bb3" >
                <?php echo $employee; ?>
                </div>
            </div>   
        </a>
    </div>
    
    <div class="bb1_azul" id="cc1"  >
        <div class="cc_texto" id="cc2">
        	<h2><?php echo $employee; ?></h2>
            <p>
<?php echo $description; ?>
            </p>
        </div>
    </div>
   
    
    <div class="clr"></div>
    
</div>


<div id="profile_container" style="overflow:hidden;">
<div id="profile_container_int" style="width:8000px;" >

<?php
	$qt = "SELECT * FROM employee WHERE id_employee!='".$id_employee_a."' ORDER BY id_employee LIMIT 10 ";
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
	
?>

  <div class="dd1" id="dd1_<?php echo $id_employee; ?>" onmouseover="ShowCC('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');" onmouseout="ShowCC_out('dd1_<?php echo $id_employee; ?>','dd2_<?php echo $id_employee; ?>');"  
    style="background-image:url(<?php echo $imagen; ?>);" >
        <a href="our-team.php?id=<?php echo $id_employee; ?>#profile" >
            <div id="dd2_<?php echo $id_employee; ?>" class="cc2">
                <div class="cc3" id="dd3_<?php echo $id_employee; ?>" >
                <?php echo $employee; ?>
                </div>
            </div>   
        </a>
    </div>
    
    <?php
	}
	?>
    
   
    
  <div class="clr"></div>
    
</div>
</div>





<div class="titulo">
     <div class="titulo_tree">
            <div class="titulo_info">
              MEET THE TEAM
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree">
            <div class="footer_info">
              Most of the hundreds of products that
we manufacture today utilize proprietary processes, our own unique ingredients or state-of-the-art packaging technology. This gives us a distinct market advantage and customer appeal, as well as a significant cost advantage. We offer:
<br />
<br />
- Expertise in manufacturing, quality assurance and quality control
<br /><br />
- State-of-art manufacturing facility with tremendous scale and capacity for growth
            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info">
              Proprietary technologies that enhance product solutions while driving down costs
              <br /><br />
- Experienced and knowledgeable sales and management team
<br /><br />
- Best-in-class culinary team to support your menu and product development needs
<br /><br />
- Experienced Research & Development team to solve product and packaging challenges
<br /><br />
-
Aggressive growth strategy with a proven track record of performance and stability


            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info">
            
            - Industry leading speed to market capabilities<br /><br />
- Strong multi-national customer base
<br /><br />
As a primary processor of vegetable, grain and bean products our location and strong partnership with our growers and the vendor community, gives us the ability to offer competitive pricing and unique products
to our customers. This combined with our large-scale manufacturing operations, gives us the ability to service the largest national restaurant operators both domestically and Internationally.

            </div>
       </div>
       <div class="clr"></div>
</div>








<?php
include "footer.php";
?>

</body>

</html>
