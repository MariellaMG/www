<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/about-us-1.js"></script>
<script src="js/menu_over.js"></script>
 <script language="javascript">

function AdjustBoxes(){

	var divi = ($( window ).width()*575) / 1170 ;
	$("#header").height(divi);
	

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

	var divi = ( ($("#bb1").width()*700) / 810 ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);

	$("#cc1").height(divi);

	var altm=($("#bb1").width()/10);


	var altn=(divi/2)-30;

	$("#bb3").css("padding-top", altn+"px");



    var divi = ( ((($( window ).width()*0.42))*495) / 640 ) - 3 ;


	$("#dd1").width($( window ).width()*0.42);
	$("#dd1").height(divi);
	
	
	$("#ee1").width($( window ).width()*0.25);
	$("#ee1").height(divi);

	$("#ff1").width($( window ).width()*0.25);
	$("#ff1").height(divi);
	
	
	

	$("#profile_container").height(divi+divi*0.2);


	var altn=(divi/2)-30;

	$(".cc3").css("padding-top", altn+"px");


	var topa=$("#header").height()+$("#bb1").height();
	
	
	$("#overall").height($( window ).height());

}

$( document ).ready(function() {
 	//alert("--");
	//$("#overall").hide();
	//$("#iframe").hide();
	//$("#iframe2").hide();
	//$("#overall_1").hide();
	//$("#overall_2").hide();
	//$("#overall_3").hide();
	$("#overall_1").css("top", "4000px");
	$("#overall_2").css("top", "4000px");
	$("#overall_3").css("top", "4000px");
});
 </script>
 
 
 <script language="javascript">
 	function VerOne(){
		$("#overall_1").css("top", "0px");
		$("#overall_2").css("top", "-4000px");
		$("#overall_3").css("top", "-4000px");
	}
	function VerTwo(){
		$("#overall_1").css("top", "-4000px");
		$("#overall_2").css("top", "0px");
		$("#overall_3").css("top", "-4000px");
	}
	function VerThree(){
		$("#overall_1").css("top", "-4000px");
		$("#overall_2").css("top", "-4000px");
		$("#overall_3").css("top", "0px");
	}
	function CloseWindow(){
		$("#overall_1").css("top", "-4000px");
		$("#overall_2").css("top", "-4000px");
		$("#overall_3").css("top", "-4000px");
		//$("#iframe").hide();
		//$("#iframe2").hide();
		//$("#iframe").css("src",  "/flipbook/");
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
.dd1{
	margin:1.2vw;
	border:solid 0.1vw #FFFFFF;
}
#header{
	height:44.4vw !important;
}
</style>
</head>

<body>



<div id="overall_1" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CloseWindow();">

		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CloseWindow();">
        	<div style="float:right; width:20%; padding-right:2%; text-align:right; cursor:pointer;">
            CLOSE
            </div>
        </div>
        <iframe src="/flipbook/" width="90%" height="80%" style="margin-left:5%;" id="iframe" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true">
    	</iframe>
</div>

<div id="overall_2" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CloseWindow();">
		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CloseWindow();">
        	<div style="float:right; width:20%; padding-right:2%; text-align:right; cursor:pointer;">
            CLOSE
            </div>
        </div>
        <iframe src="/flipbook_standard/" width="90%" height="80%" style="margin-left:5%;" id="iframe" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true">
    	</iframe>
</div>

<div id="overall_3" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CloseWindow();">
		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CloseWindow();">
        	<div style="float:right; width:20%; padding-right:2%; text-align:right; cursor:pointer;">
            CLOSE
            </div>
        </div>
        <iframe src="/flipbook_italian/" width="90%" height="80%" style="margin-left:5%;" id="iframe" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true">
    	</iframe>
</div>


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






<div class="header" id="header" style=" background-image:url(images_brochures/Brochures_header.jpg); " onclick="HideMenu();">
    
    	<div class="white" id="white" style="width:38vw; height:14vw; top:39%; ">
    	<div class="white_int" style="padding-bottom:13%;">
    		<h1 style="font-size:3.0vw; padding-top:0%;">BROCHURES</h1>
            <h2 style="font-size:1.3vw;">Capabilities, Standard Items and Italian Sauces</h2>
    	</div>	
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	<div class="midmenu_div" style="width:30% !important;"><a href="contact-us.php">CONTACT US</a></div>
        <div class="midmenu_div" style="width:30% !important;"><a href="careers.php" >CAREERS</a></div>
        <div class="midmenu_div" style="width:30% !important;"><a href="brochures.php" >BROCHURES</a></div>
        <div class="clr"></div>
    </div>
</div>


<div id="profile_container_a" style="overflow:hidden; width:100%; ">
<div id="profile_container_a_int" style="width:8000px; margin-left:-5px;" >

    <div class="bb1" id="bb1"  style="background-image:url(images_brochures/Brochures_1.jpg); !important;" >
        <a href="#" >
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        </a>
    </div>

    <div class="bb1_yellow" id="cc1"   >
        <div class="box_vw" id="cc2">
        	<h2 class="title_vw">BROCHURES</h2>
            <p class="text_vw" style="font-size:1.6vw;">

            Our capabilities cover a broad spectrum of<br />
 products including fire roasted vegetables<br />
 and fruits, pickled vegetables and fruits,<br />
 artisan style kettle cooked sauces and<br />
 soups, authentic Mexican salsas, decadent<br />
 dessert sauces, cutting edge beverage<br />
 mixers, ancient grains, beans, jams, relishes<br />
 and many other leading edge food products.
            <br /><br />
            
            Please select a brochure below to<br />
 learn more about our capabilities and<br />
 some of our standard items.
            


            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>





<div id="profile_container" style="overflow:hidden; width:100%; ">
<div id="profile_container_int" style="width:8000px; margin-left:-5px;" >

    <div class="dd1" id="dd1"
    style="background-image:url(images_brochures/Brochures_2.jpg)" >
        <a href="#/flipbook_italian" onclick="VerOne();" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ee1"
     style="background-image:url(images_brochures/Brochures_3.jpg)" >
        <a href="#/flipbook_italian" onclick="VerTwo();" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >

                </div>
            </div>
        </a>
    </div>

    <div class="dd1" id="ff1"
      style="background-image:url(images_brochures/Brochures_4.jpg)" >
        <a href="#/flipbook_italian" onclick="VerThree();" >
            <div id="ff2" class="cc2">
                <div class="cc3" id="ff3" >

                </div>
            </div>
        </a>
    </div>



    <div class="clr"></div>

</div>
</div>





<?php
include "footer.php";
?>


</body>

</html>
