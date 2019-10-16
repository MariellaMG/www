<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/contact-us.js"></script>
  <script src="js/menu_over.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/our-facility.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
<link rel="stylesheet" type="text/css" href="css/menu_over.css">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDbh9li7xLaS90U2lbgichNu4Ds04thOm8&callback=initMap&language=en"></script>

<script type="text/javascript">

$( document ).ready(function() {
 	initialize();
});

var map;
var marker;


function initialize() {
  var myLatlng = new google.maps.LatLng(34.0498622, -117.5684783);
  var myOptions = {
    zoom: 17,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  
  google.maps.event.addListener(map, 'dragend', function(event) {
	posicion();
  });  
  
  google.maps.event.addListener(map, 'zoom_changed', function(event) {
	posicion();
  });
  
	marker = new google.maps.Marker({
		position: myLatlng, 
		map: map
	});
	marker.setDraggable(true);
	google.maps.event.addListener(marker, 'dragend', function(event) {
		posicion();
	});  
	
  
}
</script>
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




<div class="header" id="header" style=" background-image:url(images_contact_us/Homepage_contactus.jpg); background-size:100% auto; " onclick="HideMenu();">
	<div class="white" id="white">
    	<div class="white_int">
    		<h1>CONTACT US</h1>
            <h2>We want to hear from you</h2>
    	</div>	
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
       <div class="midmenu_div" style="width:30% !important;"><a href="contact-us.php" >CONTACT US</a></div>
        <div class="midmenu_div" style="width:30% !important;"><a href="careers.php">CAREERS</a></div>
        <div class="midmenu_div" style="width:30% !important;"><a href="brochures.php">BROCHURES</a></div>
        <div class="clr"></div>
    </div>
</div>


<div style="width:100%; overflow:hidden;">
<div style="width:3000px; margin-left:-5px;">
    <div class="bb1" id="bb1"   
    style=" background-image:url(images_contact_us/Nancy_lobby.jpg);   " 
     >
        
            <div id="bb2" class="cc2">
                <div class="cc3" id="bb3" >
                
                </div>
            </div>   
       
    </div>
    
    <div class="bb1_pink" id="cc1" style="background-color:#f2cc92 !important;"  >
     
        	
            
<a href="https://www.google.com/maps/place/Haliburton+International+Foods,+Inc./@34.0498622,-117.5684783,15z/data=!4m5!3m4!1s0x0:0xa3faed946bdbd1e9!8m2!3d34.0498622!4d-117.5684783
" target="_blank" style="color:#000; text-decoration:none;">            
           
           <img src="elements/Map_contactus.jpg" width="100%"  />
           
           
</a>


    </div>
   
    
    <div class="clr"></div>
    
</div>
</div>


<div style="width:100%; overflow:hidden;">
  <div style="width:3000px; margin-left:-5px;">

    <div class="dd1" id="dd1"   
    style="background-image:url(images_contact_us/HR_pic.jpg);" >
        
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >
                
                </div>
            </div>   
        
    </div>
    
    <div class="dd1" id="ee1"  
    style="background-image:url(images_contact_us/Warehouse.jpg);" >
        
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >
                
                </div>
            </div>   
       
    </div>
    
    <div class="dd1" id="ff1"  
    style="background-image:url(images_contact_us/Accounting.jpg);" >
       
            <div id="ff2" class="cc2">
                <div class="cc3" id="ff3" >
                
                </div>
            </div>   
        
    </div>
    
   
    
    <div class="clr"></div>
    
</div>
</div>





<div class="title">
     <div class="title_tree">
            <div class="title_info">
              CONTACT US
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree">
            <div class="footer_info" style="font-size:16px;" >
             General Information <br />
             <a href="mailto:info@haliburton.net" style="color:#FFF; text-decoration:none;">info@haliburton.net</a>
            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info" style="font-size:16px;">
             
              Customer Support <br />
              <a href="mailto:support@haliburton.net" style="color:#FFF; text-decoration:none;">support@haliburton.net</a>

            </div>
       </div>
         <div class="footer_tree">
            <div class="footer_info" style="font-size:16px;">
              
              Sales <br />
              <a href="mailto:sales@haliburton.net" style="color:#FFF; text-decoration:none;" >sales@haliburton.net</a>


            </div>
       </div>
       <div class="clr"></div>
</div>








<?php
include "footer.php";
?>

</body>

</html>
