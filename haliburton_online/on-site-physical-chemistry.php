<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/about-us-0.js"></script>
 <script src="js/menu_over.js"></script>
 <script language="javascript">

function AdjustBoxes(){

	var menutop=$(".top").height()-20;
	$("#menu2").css("top", menutop+"px");
	$("#menu3").css("top", menutop+"px");
	$("#menu4").css("top", menutop+"px");

	var menuleft = $(window).width()-570;
	$("#menu2").css("left", menuleft+"px");
	menuleft = $(window).width()-110;
	$("#menu3").css("left", menuleft+"px");
	menuleft = $(window).width()-230;
	$("#menu4").css("left", menuleft+"px");


	$("#bb1").width($(window).width()/2);
	$("#cc1").width(($(window).width()/2)+10);

	var divi = ( ($("#bb1").width()*700) / 880 ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);

	$("#cc1").height(divi);

	var altm=($("#bb1").width()/10);


	var altn=(divi/2)-30;

	//$("#bb3").css("padding-top", altn+"px");

    var divi = ( ((($( window ).width()/3))*392) / 640 ) - 3 ;


	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);


	$("#profile_container").height(divi);


	var altn=(divi/2)-30;

	//$(".cc3").css("padding-top", altn+"px");


	var topa=$("#header").height()+$("#bb1").height();


}
 </script>
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/about-us-.css">
<link rel="stylesheet" type="text/css" href="css/mini.css">
<link rel="stylesheet" type="text/css" href="css/menu_over.css">
<style>
.box_vw{
	width:80%;
	margin:auto;
	padding-top:6vw;
	font-family: 'Lato', sans-serif;
	text-align:center;
}
.title_vw{
	font-size:2.1vw;
	font-weight:normal;
}
.text_vw{
	font-size:2vw;
	padding-top:1vw;
}
#header{
	height:50vw !important;
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
 

<div class="header" id="header" style=" background-image:url(images_chemistry/Chemistry_header_dos.jpg);" onclick="HideMenu();">
	<div class="white" id="white"  >
    	<div class="white_int" style="padding-top:5%; padding-bottom:5%;" >
    		<h1 style="font-size:3.3vw;">

            ON-SITE PHYSICAL<br />
 CHEMISTRY LAB

            </h1>

    	</div>
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	<div class="midmenu_div"><a href="quality-assurance.php">QUALITY ASSURANCE</a></div>
        <div class="midmenu_div"><a href="regulatory.php">REGULATORY COMPLIANCE</a></div>
        <div class="midmenu_div"><a href="on-site-microbiology.php">ON-SITE MICRO LAB</a></div>
        <div class="midmenu_div"><a href="on-site-physical-chemistry.php">ON-SITE PHYSICAL CHEMISTRY LAB</a></div>
        <div class="clr"></div>
    </div>
</div>


<div id="profile_container_a" style="overflow:hidden; width:100%; ">
<div id="profile_container_a_int" style="width:8000px; margin-left:-5px;" >

    <div class="bb1" id="bb1"  style="background-image:url(images_chemistry/Chemistry_1.jpg); !important;" >
        <a href="#" >
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        </a>
    </div>

    <div class="bb1_blue" id="cc1"   style=" background-color:#A8A7A3;" >
        <div class="box_vw" id="cc2" style="padding-top:4vw;">
        	<h2 class="title_vw">

            ON-SITE PHYSICAL <br />
 CHEMISTRY SERVICES

            </h2>
            <p class="text_vw" style=" font-size:1.8vw;">

        All our products go through<br />
a rigorous quality testing<br />
 procedure and are evaluated<br />
 for compliance with written<br />
 specifications before shipment.



            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>





<div id="profile_container" style="overflow:hidden; width:100%; ">
<div id="profile_container_int" style="width:8000px; margin-left:-5px;" >

    <div class="dd1" id="dd1"
    style="background-image:url(images_chemistry/Chemistry_2.jpg);" >
        <a href="#" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ee1"
         style="background-image:url(images_chemistry/Chemistry_3.jpg);" >
        <a href="#" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ff1"
       style="background-image:url(images_chemistry/Chemistry_4.jpg);" >

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
     <div class="title_tree" style="width:70%;">
            <div class="title_info" style="width:70%;">
             ON-SITE PHYSICAL CHEMISTRY SERVICES 
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree" style="width:100% !important;">
            <div class="footer_info">


           		Our team of highly skilled quality technicians run more than 20,000 tests in our physical chemistry lab annually. Our testing capabilities include:<br /><br />
• Viscosity measurement with Brookfield and Bostwick viscometers<br />
 • Color analysis using a Hunter colorimeter<br />
• Salt<br />
• Titratable Acidity<br />
• Moisture and Solids using CEM microwave technology<br />
 • Brix<br />
• Water activity<br />
• pH<br />
• Sieve analysis<br />
• Drained Weight testing<br />
• Package Integrity testing<br />
 • Histamine measurement


            </div>
       </div>


       <div class="clr"></div>
</div>




<?php
include "footer.php";
?>

</body>

</html>
