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

	var divi = ( ($("#bb1").width()*700) / 800 ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);

	$("#cc1").height(divi);

	var altm=($("#bb1").width()/10);


	var altn=(divi/2)-30;

	$("#bb3").css("padding-top", altn+"px");

    var divi = ( ((($( window ).width()/3))*392) / 640 ) - 3 ;


	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);


	$("#profile_container").height(divi);


	var altn=(divi/2)-30;

	$(".cc3").css("padding-top", altn+"px");


	var topa=$("#header").height()+$("#bb1").height();


}
 </script>
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/quality.css">
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
	height:44vw;
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



<div class="header" id="header" style=" background-image:url(images_quality/Quality_header.jpg);" onclick="HideMenu();">
	
    
    <div class="white" id="white" style="width:38vw; height:14.5vw; top:38%;">
    	<div class="white_int" style="padding-bottom:5.1vw;">
    		<h1 style="font-size:3.0vw;">QUALITY</h1>
            <h2 style="font-size:1.3vw;">A commitment to integrity
				</h2>
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

    <div class="bb1" id="bb1"  style="background-image:url(images_quality/Quality_1.jpg); !important;" >
        
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        
    </div>

    <div class="bb1_yellow" id="cc1"   >
        <div class="box_vw" id="cc2">
        	<h2 class="title_vw">QUALITY ASSURANCE</h2>
            <p class="text_vw">

            From product design to  <br />
process control, at the heart <br />
of every Haliburton product <br />
 is a quality system designed to achieve<br />
our Gold Standard food safety and<br />
 quality objectives.


            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>





<div id="profile_container" style="overflow:hidden; width:100%; ">
<div id="profile_container_int" style="width:8000px; margin-left:-5px;" >

    <div class="dd1" id="dd1"
    style="background-image:url(images_quality/Quality_2.jpg);" >
       
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >

                </div>
            </div>
        
    </div>

    <div class="dd1" id="ee1"
      style="background-image:url(images_quality/Quality_3.jpg);" >
        
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >

                </div>
            </div>
        
    </div>

    <div class="dd1" id="ff1"
      style="background-image:url(images_quality/Quality_4.jpg);" >
        
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
              QUALITY
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree" style="width:100% !important;">
            <div class="footer_info" style="font-size:16px;">

             Ask our customers, vendors and industry peers and they’ll tell you – Haliburton is renowned for consistent, high-quality food products designed to meet the toughest food safety testing in the business.<br /><br />
Adhering to the current Food Safety Modernization Act (FSMA), Current Good Manufacturing Practices (CGMPs) and Hazard Analysis and Risk-Based Preventive Controls (HARPC) procedures, our Total Quality System inspectors use a proactive approach to identifying and eliminating preventable foodborne illness. We evaluate and select vendors based on these same FSMA, CGMPs and HARPC conditions, and we re-qualify existing vendors annually based on the consistent quality of their products, compliance with specifications and their ability to identify and reliably eliminate all potential food safety hazards before they enter our supply chain. This preemptive approach to quality assurance reliably eliminates preventable foodborne illness and enhances the quality of our products.<br /><br />
Our raw materials and manufactured products are inspected daily and must pass a battery of tests in our on-site physical chemistry and microbiology laboratories – all helping to ensure safe, consistent and wholesome foods. This, combined with our industry leading sanitation procedures and rigorous environmental testing protocols, makes Haliburton an industry leader in the Ready-to-Eat category.

            </div>
       </div>


       <div class="clr"></div>
</div>








<?php
include "footer.php";
?>

</body>

</html>
