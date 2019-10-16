<?php
session_start();
include("admin/includes/mysql_infos2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contact Us | Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/contact-us.css">
<link rel="stylesheet" type="text/css" href="css/stylesheetmd-local.css">
<link rel="stylesheet" type="text/css" href="/css/login_cart.css">
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/home-local.js"></script>
 <script src="js/contact-us.js"></script>
  <script src="/js/login_cart.js"></script>
</head>

<body>


<?php
include "login_cart.php";
?>

<br /><br />

<a name="top" id="top"></a>

<div class="div-contact-us">

	<div>
      <div class="contact-izq">
           <h1 class="contact-titulo">CONTACT US</h1>
           
           <p>Name:</p>
           <input name="name" type="text" class="campo" />
           <br /><br />
           
           <p>Email:</p>
        <input name="email" type="text" class="campo" />
        <br /><br />
           
           <p>Comment:</p>
           <textarea name="comments" cols="" rows="" class="areatexto"></textarea>
           <br /><br />
           
           <input name="SUBMIT" value="SUBMIT" type="submit" class="boton" />
           
           
      </div>
        
        <div class="contact-der">
        
       		 <div class="about-mapa">
                <img src="images/mapa2.png" width="100%" />
            </div>
            
             <div class="about-direccion" style="background-color:transparent !important;">
                <h2 style="background-color:transparent !important;">MOLCAJETE DOMINGUERO</h2>
                <h3 style="background-color:transparent !important;">777 Alameda St., Suite 2063</h3>
                <h3 style="background-color:transparent !important;">Los Angeles, CA 90021</h3>
                <h3 style="background-color:transparent !important;">(213) 358-7043</h3>
            </div>
          
         
            
            <div class="about-pdf" style="margin-top:10px; background:#FFF; padding:10px; padding-right:5px;">
            <a href="sponsorships.html#top" style="text-decoration:none;">
            
                 
                <input name="SUBMIT" value="SPONSORSHIP" type="submit" class="boton" />
                
             
            </a>
            </div>
            
        </div>
        
        <div class="clr"></div>
	</div>
    
   
    

</div>




    
<div class="md7">
		<div class="">
			<div> <img src=""></div>
			<div class="contactos" ><a name="contacto"></a> 
				<div class="lc"><a href=""><img src="/molcajetedomborrador3/instagram.png" style="width: 100%;"></a></div>
				<div class="lc"><a href=""><img src="/molcajetedomborrador3/email.png" style="width: 100%;"></a></div>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="rosa">
			<div class="logo3"> <img src="/molcajetedomborrador3/logo1.png" style="width: 100%;"></div>
			<div class="text1"> 
				<h3>Molcajete Dominguero</h3> 
				<p id="nfn"><a href="/" class="footer_a">Home</a></p>
                <p id="nfn"><a href="/about-us.html#top" class="footer_a">About us</a></p>
				<p id="nfn"><a href="/contact-us.html#top" class="footer_a">Contact us</a></p>
				<p id="nfn"><a href="/molcajete-nights/#top" class="footer_a">Molcajete Nights</a></p>
			</div>
			<div class="text2">
				<h3>Join Our Fam</h3> 
				<p id="nfn"><a href="/apply.html#top" class="footer_a">Apply</a></p>
              <p id="nfn"><a href="/applications.html#top" class="footer_a">Applications</a></p>
				<p id="nfn"><a href="/sponsorships.html#top" class="footer_a">Sponsorships</a></p>
			</div>
			<div class="text3">
				<h3>Social Media</h3> 
				<p id="nfn"><a href="/apply.html#top" class="footer_a">Instagram</a></p>
                <p id="nfn"><a href="/applications.html#top" class="footer_a">Facebook</a></p>
				<p id="nfn"><a href="/sponsorships.html#top" class="footer_a">Mail</a></p>
			</div>
		  <div> <img src=""></div>
			<div style="clear: both;"></div>
		</div>
		<div class="finalbar">
			<div class="minizq"> <p>&nbsp;&nbsp; Molcajete Dominguero 2018</p></div>
			<div class="minder"> <p>All rights reserved &nbsp; &nbsp;</p></div>
			<div style="clear: both;"></div>
		</div>
	</div>

</body>

</html>
