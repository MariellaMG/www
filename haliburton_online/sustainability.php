<?php
/* Esto producirá un error. Fíjese en el html
 * que se muestra antes que la llamada a header() */
header('Location: /');
exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/sustan.js"></script>
 <script src="js/menu_over.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/sustanability.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
<link rel="stylesheet" type="text/css" href="css/menu_over.css">
<style>
.box_vw{
	width:80%;
	margin:auto;
	padding-top:8vw;
	font-family: 'Lato', sans-serif;
	text-align:center;
}
.title_vw{
	font-size:2vw;
	font-weight:normal;
}
.text_vw{
	font-size:1.7vw;
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

<?php include "menu_over.php"; ?>




<div class="header" id="header" style=" background-image:url(images_sustanability/Sustainability_cover.jpg);"  onclick="HideMenu();">
	<div class="white" id="white">
    	<div class="white_int">
    		<h1>SUSTAINABILITY</h1>
            <h2>We respect our environment <br />
and strive to save energy</h2>
    	</div>	
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	<div class="midmenu_div"><a href="core-values.php">CORE VALUES</a></div>
        <div class="midmenu_div"><a href="our-team-new.php">OUR TEAM</a></div>
        <div class="midmenu_div"><a href="our-facility.php">OUR FACILITY</a></div>
        <div class="midmenu_div"><a href="sustainability.php">SUSTAINABILITY</a></div>
        <div class="clr"></div>
    </div>
</div>


<div style="width:100%; overflow:hidden;">
<div style="width:3000px; margin-left:-5px;">
    <div class="bb1" id="bb1"   
    style="background-image:url(images_sustanability/Sustainability_slideshow_1.jpg);" style="cursor:default !important;"
     >
     
            <div id="bb2" class="cc2">
                <div class="cc3" id="bb3" >
               
                </div>
            </div>   
       
    </div>
    
    
    <div class="bb1_gray" id="cc1"  >
        <div class="box_vw" id="cc2">
        	<h2 class="title_vw">SUSTAINABILITY</h2>
            <p class="text_vw">
           We conserve resources and<br />
 maximize recycling wherever and<br />
 whenever we can.
            </p>
        </div>
    </div>
   
    
    <div class="clr"></div>
    
</div>
</div>


<div style="width:100%; overflow:hidden;">
<div style="width:3000px; margin-left:-5px;">

    <div class="dd1" id="dd1"  
   style="background-image:url(images_sustanability/Sustainability_slideshow_2.jpg);" >
        <a href="#" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >
                 
                </div>
            </div>   
        </a>
    </div>
    
    <div class="dd1" id="ee1"  
    style="background-image:url(images_sustanability/Sustainability_slideshow_3.jpg);" >
        <a href="#" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >
                
                </div>
            </div>   
        </a>
    </div>
    
    <div class="dd1" id="ff1"  
    style="background-image: url(images_our-facility/OurFacility_Slideshow_5_800.jpg);" >
        <a href="#" >
            <div id="ff2" class="cc2">
                <div class="cc3" id="ff3" >
                 
                </div>
            </div>   
        </a>
    </div>
    
   
    
    <div class="clr"></div>
    
</div>
</div>






<div class="title">
     <div class="title_tree">
            <div class="title_info">
              OUR ENVIRONMENTAL AND SUSTAINABILITY INITIATIVE
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree">
            <div class="footer_info">
             We have developed an Environmental and Sustainability Initiative that is guided by the following principals:
             <br />
 An eco-conscious approach to product
design, material selection and manufacturing practices<br /><br />
 Continuous improvement in our environmental performance and sustainability practices
            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info">
              Working with suppliers who share our commitment to the environment and sustainable business practices<br /><br />
Environmental awareness training and education for our team members<br /><br />
 Knowledge of and compliance with all environmental legislation and industry best practices

            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info">
             Our Environmental and Sustainability Initiative is a “living” and constantly evolving policy initiative. It incorporates what we believe to be the initiatives where we can have the greatest impact given our current operations, available resources and existing technology. As these parameters change, so do our initiatives. Our current initiative has four principle components; water, energy, packaging and products.
            </div>
       </div>
       <div class="clr"></div>
</div>







<?php
include "footer.php";
?>

</body>

</html>
