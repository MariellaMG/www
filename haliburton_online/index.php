<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/home.js"></script>

 <script src="js/menu_over.js"></script>
 
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
<link rel="stylesheet" type="text/css" href="css/menu_over.css">

<style>
#header{
	height:48vw !important;
	
}
</style>

</head>

<body>
<div class="top">
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



<?php
include "menu_over.php";
?>


<div class="header" id="header" onclick="OcultarMenuDos();" style="background-image:url(images2/Homepage_header_2.jpg) !important;">
	<div class="white" id="white" style="width:38vw; height:14.5vw;">
    	<div class="white_int">
    		<h1 style="font-size:3.0vw;">FOOD FOR THE FUTURE</h1>
            <h2 style="font-size:1.3vw;">Premier culinary innovation, products and menu solutions for<br />
 the world’s most recognized restaurants and food brands.
</h2>




    	</div>	
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	<div class="midmenu_div"><a href="/products.php">PRODUCTS</a></div>
        <div class="midmenu_div"><a href="/culinary.php">CULINARY</a></div>
        <div class="midmenu_div"><a href="our-team-new.php">OUR TEAM</a></div>
        <div class="midmenu_div"><a href="our-facility.php">OUR FACILITY</a></div>
        <div class="clr"></div>
    </div>
</div>


<div>
    <div class="cc1" id="cc1" onmouseover="ShowCC('cc1','cc2');" onmouseout="ShowCC_out('cc1','cc2');" >
        <a href="about-us.php" >
            <div id="cc2" class="cc2">
                <div class="cc3" id="cc3" >
                ABOUT US
                </div>
            </div>   
        </a>
    </div>
    
    
    <div class="dd1" id="dd1" onmouseover="ShowCC('dd1','dd2');" onmouseout="ShowCC_out('dd1','dd2');" >
        <a href="innovation.php" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >
                INNOVATION
                </div>
            </div>   
        </a>
    </div>
    
    <div class="ee1" id="ee1" onmouseover="ShowCC('ee1','ee2');" onmouseout="ShowCC_out('ee1','ee2');" style="background-image:url(images_home/Homepage_products_22.jpg);" >
        <a href="products.php" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >
                PRODUCTS
                </div>
            </div>   
        </a>
    </div>
    
    <div class="clr"></div>
    
</div>



<div>

  <div class="ff1" id="ff1" onmouseover="ShowCC('ff1','ff2');" onmouseout="ShowCC_out('ff1','ff2');" >
        <a href="quality.php" >
            <div id="ff2" class="cc2">
                <div class="cc3" id="ff3" >
                QUALITY
                </div>
            </div>   
        </a>
    </div>
    
    
  <div class="gg1" id="gg1" onmouseover="ShowCC('gg1','gg2');" onmouseout="ShowCC_out('gg1','gg2');" >
        <a href="contact-us.php" >
            <div id="gg2" class="cc2">
                <div class="cc3" id="gg3" >
                CONTACT US
                </div>
            </div>   
        </a>
    </div>
    
    <div class="clr"></div>

</div>



<?php
include "footer.php";
?>



</body>

</html>
