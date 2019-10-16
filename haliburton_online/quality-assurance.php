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
	height:50vw;
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







<div class="header" id="header" style=" background-image:url(images_quality_assurance/QualityAssurance_header.jpg);" onclick="HideMenu();">
	<div class="white" id="white" >
    	<div class="white_int" style="padding-top:5%; padding-bottom:5%;" >
    		<h1 style="font-size:3.3vw;">QUALITY<br />
            ASSURANCE
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

    <div class="bb1" id="bb1"  style="background-image:url(images_quality_assurance/QualityAssurance_1.jpg); !important;" >
        <a href="#" >
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        </a>
    </div>

    <div class="bb1_pink" id="cc1"   >
        <div class="box_vw" id="cc2" style="padding-top:12vw;">
        	<h2 class="title_vw">QUALITY ASSURANCE</h2>
            <p class="text_vw">

          Highly trained Total Quality Team<br />
 with interdisciplinary backgrounds<br />
 in Food Science, Microbiology<br />
 and Chemistry.


            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>





<div id="profile_container" style="overflow:hidden; width:100%; ">
<div id="profile_container_int" style="width:8000px; margin-left:-5px;" >

    <div class="dd1" id="dd1"
    style="background-image:url(images_quality_assurance/QualityAssurance_2.jpg);" >
        <a href="#" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ee1"
      style="background-image:url(images_quality_assurance/QualityAssurance_3.jpg);" >
        <a href="#" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ff1"
      style="background-image:url(images_quality_assurance/QualityAssurance_4.jpg);" >
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
              QUALITY ASSURANCE
            </div>
       </div>
       <div class="clr"></div>
</div>

<div class="content">
     <div class="footer_tree" style="width:100% !important;">
            <div class="footer_info">



           Food Safety Modernization Act (FSMA) -<br />
Our food safety systems are risk based with an emphasis on Hazard Analysis and Risk-Based Preventive Controls (HARPC) and sound prerequisite programs to meet current and future requirements.<br /><br />

The Global Food Safety Initiative (GFSI) –SQF Certification<br />
We are certified through the Safe Quality Food (SQF) Program, managed by the Safe Quality Food Institute, one of the world’s leading certification systems recognized by the Global Food Safety Initiative (GFSI), offering certificates for primary production, food manufacturing, packaging, storage and distribution. This enables us to assure our customers that we have produced, processed, prepared and handled our food products according to the highest possible standards, at all levels of the supply chain.<br /><br />

California Department of Public Health (CDPH) - Haliburton processes high acid (low pH) acidified and pasteurized food products under the jurisdiction and licensing of the State of California Department of Public Health (Cannery License Program), and the US Food and Drug Administration (Low Acid Aseptic Process Registration).<br /><br />

Farm to Fork - Our food safety program spans every aspect of our operation and partners closely with everyone throughout our supply chain from our raw material suppliers, to our production team, and through our distribution system.<br /><br />

Lab Testing - Utilizing the latest technology and lab equipment including on-site Microbiological, Physical, Chemical, and Sensory testing capabilities.<br /><br />

Foreign Material Prevention - Current Metal detection and X-Ray Technology<br /><br />

Labeling – On-site packaging and case printing operations that are GS1-128 compliant



            </div>
       </div>


       <div class="clr"></div>
</div>









<?php
include "footer.php";
?>

</body>

</html>
