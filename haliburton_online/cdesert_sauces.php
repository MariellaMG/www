<?php
$header = "/images_products/desert_sauces/DessertSauces_header.jpg";
$img1_w = 800;
$img1_h = 700;
$img1 = "/images_products/desert_sauces/DessertSauces_1.jpg";
$img2 = "/images_products/desert_sauces/DessertSauces_2.jpg";
$img3 = "/images_products/desert_sauces/DessertSauces_3.jpg";
$img4 = "/images_products/desert_sauces/DessertSauces_4.jpg";
$titulo = "DESSERT SAUCES";
$header_t = "DESSERT SAUCES";
$txt2="Carrot Cake—Caramel Sauce, Vanilla Bean Crème Anglaise ";
$txt3="Upside-Down Cake—Blackberry Coulis, **Vanilla Bean Crème Anglaise";
$txt4="Chocolate Peanut Butter Bar—Dark Chocolate Sauce and Peanut Butter Sauce ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $titulo; ?> | Haliburton</title>
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/about-us-0.js"></script>
 <script language="javascript">

function AjustarCajas(){

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
	menuleft = $(window).width()-420;
	$("#menu5").css("left", menuleft+"px");

	$("#bb1").width($(window).width()/2);
	$("#cc1").width(($(window).width()/2)+10);

	var divi = ( ($("#bb1").width()*<?php echo $img1_h; ?>) / <?php echo $img1_w; ?> ) - 3 ;
	$("#bb1").height(divi);
	$("#bb2").height(divi);

	$("#cc1").height(divi);

	var altm=($("#bb1").width()/10);

	var altn=(divi/2)-30;

	$("#bb3").css("padding-top", altn+"px");

    var divi = ( ((($( window ).width()/3))*392) / 640 ) - 3 ;

	$(".dd1").width($( window ).width()/3);
	$(".dd1").height(divi);

	var altn=(divi/2)-30;

	$(".cc3").css("padding-top", altn+"px");

	var topa=$("#header").height()+$("#bb1").height();
	
}

$( document ).ready(function() {
	$("#overall_1").css("top", "4000px");
	$("#overall_2").css("top", "4000px");
	$("#overall_3").css("top", "4000px");
	///////////////////////
	VerCC_out('ccc1','ccc2');
	VerCC_out('ddd1','ddd2');
	VerCC_out('eee1','eee2');
});
 </script>	
 
 
<script language="javascript">
 	function VerUno(){
		$("#overall_1").css("top", "0px");
		$("#overall_2").css("top", "-4000px");
		$("#overall_3").css("top", "-4000px");
	}
	function VerDos(){
		$("#overall_1").css("top", "-4000px");
		$("#overall_2").css("top", "0px");
		$("#overall_3").css("top", "-4000px");
	}
	function VerTres(){
		$("#overall_1").css("top", "-4000px");
		$("#overall_2").css("top", "-4000px");
		$("#overall_3").css("top", "0px");
	}
	function CerrarVentana(){
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
<link rel="stylesheet" type="text/css" href="css/products.css">

<style>
.caja_vw{
	width:80%;
	margin:auto;
	padding-top:6vw;
	font-family: 'Lato', sans-serif;
	text-align:center;
}
.titulo_vw{
	font-size:2.1vw;
	font-weight:normal;
}
.texto_vw{
	font-size:2vw;
	padding-top:1vw;
}
#header{
	height:48.5vw !important;
}

.ddd1{
	margin:1.2vw;
	border:solid 0.1vw #FFFFFF;
	width:25%;
	float:left;
	background-size: 100% auto;
	background-position:center;
}

.dd1{
	margin:1.2vw;
	border:solid 0.1vw #FFFFFF;
}
</style>
</head>

<body>


<div id="overall_1" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CerrarVentana();">

		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CerrarVentana();">
        	<div style="float:right; width:20%; padding-right:2%; text-align:right; cursor:pointer;">
            CLOSE
            </div>
        </div>
        <iframe src="/flipbook/" width="90%" height="80%" style="margin-left:5%;" id="iframe" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true">
    	</iframe>
</div>

<div id="overall_2" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CerrarVentana();">
		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CerrarVentana();">
        	<div style="float:right; width:20%; padding-right:2%; text-align:right; cursor:pointer;">
            CLOSE
            </div>
        </div>
        <iframe src="/flipbook_standard/" width="90%" height="80%" style="margin-left:5%;" id="iframe" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true">
    	</iframe>
</div>

<div id="overall_3" style="z-index:900; background:#000; width:100%; height:100%; position:fixed; top:0px; left:0px; background-color: rgba(0, 0, 0, 0.8); " onclick="CerrarVentana();">
		<div style="color:#FFFFFF; height:8%; font-size:1.5vw;" onclick="CerrarVentana();">
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
            <li><a href="contact-us.html" onmouseover="VerMenuTres()">CONTACT</a></li>
            <li><a href="quality.html" onmouseover="VerMenuCuatro()">QUALITY</a></li>
            <li><a href="/products.php" onmouseover="VerMenuCinco()">PRODUCTS</a></li>
            <li><a href="#r" onmouseover="OcultarMenuDos()">INNOVATION</a></li>
            <li><a href="about-us.html" onmouseover="VerMenuDos()" >ABOUT US</a></li>
            <li><a href="/" onmouseover="OcultarMenuDos()">HOME</a></li>

        </ul>
    </div>

    <div class="clr"></div>
</div>

<div style="width:120px; background:#000; position:absolute; top:100px; z-index:10; " id="menu2">
    <div style=" width:110px; margin-left:10px;  background:#000;">
            <ul>
               <li style="width:110px; "><a href="core-values.html">CORE VALUES</a></li>
               <li style="width:110px;"><a href="our-team-new.php">OUR TEAM</a></li>
               <li style="width:110px;"><a href="our-facility.html">OUR FACILITY</a></li>
               <li style="width:110px;"><a href="sustainability.html">SUSTAINABILITY</a></li>
            </ul>
    </div>
</div>
<div style="width:110px; background:#CCC; position:absolute; top:100px; z-index:10;  " id="menu3">
        <ul>
           <li style="width:110px;"><a href="careers.html">CAREERS</a></li>
           <li style="width:110px;"><a href="brochures.html">BROCHURES</a></li>
        </ul>
</div>
<div style="width:130px; background:#CCC; position:absolute; top:100px; z-index:13;  " id="menu4">
        <ul>
           <li style="width:110px;"><a href="quality-assurance.html">QUALITY ASSURANCE</a></li>
           <li style="width:110px;"><a href="regulatory.html">REGULATORY COMPLIANCE</a></li>
           <li style="width:110px;"><a href="on-site-microbiology.html">ON-SITE <br /> MICRO LAB</a></li>
           <li style="width:110px;"><a href="on-site-physical-chemistry.html">ON-SITE PHYSICAL CHEMISTRY LAB</a></li>
        </ul>
</div>

<div style="width:290px; background:#CCC; position:absolute; top:70px; z-index:14; padding-bottom:20px; background:#000000;  " id="menu5">
        <ul>
          <?php include "products_menu_vertical.php" ?>
        </ul>
</div>








<div class="header" id="header" style=" background-image:url(<?php echo $header; ?>);" onclick="OcultarMenuDos();">
	<div class="blanco" id="blanco">
    	<div class="blanco_int">
    		<h1 style="font-size:3.0vw;"><?php echo $header_t; ?> </h1>
              
    	</div>
    </div>
</div>

<div class="midmenu" >
	<div class="midmenu_int">
    	
		<?php include "products_menu_horizontal.php"; ?>

        <div class="clr"></div>
    </div>
</div>


<div id="profile_container_a" style="overflow:hidden; width:100%;  ">
<div id="profile_container_a_int" style="width:8000px; margin-left:-5px;" >

    <div class="bb1" id="bb1"  style="background-image:url(<?php echo $img1; ?>); !important;" >
        <a href="#nada" >
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        </a>
    </div>

    <div class="bb1_gris" id="cc1"   >
        <div class="caja_vw" id="cc2">
        	<h2 class="titulo_vw">CUSTOM FOOD<br />
SERVICE PRODUCTS</h2>
            <p class="texto_vw" style="font-size:1.5vw;">

            Haliburton’s custom culinary creations are<br />
designed to meet the fl avor needs of multiunit<br />
restaurant operators looking for scratchquality,<br />
ready-to-eat convenience and fl exible<br />
concept-specifi c packaging.<br />
<br />
And whether we develop a product driven<br />
by your inspiration or ours, we’ve earned a<br />
reputation for fast sample turn-around time<br />
and quick product approval.<br />





            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>





<div> 
    <div style="width:70%; height:40vw; background:url(<?php echo $img2; ?>); background-size: 100% auto; background-position:center; float:left; overflow:hidden;"
     onmouseover="VerCC('ccc1','ccc2');" onmouseout="VerCC_out('ccc1','ccc2');" id="ccc1" >
            <div id="ccc2" class="ccc2" style=" height:40vw; padding-top:20vw;">
                <div class="ccc3" id="ee3" >
						<?php echo $txt2; ?>
                </div>
            </div>
    </div>
    <div style="width:30%; height:40vw; float:left;">
    		   <div style="width:100%; height:20vw; background:url(<?php echo $img3; ?>); background-size: 100% auto; float:left; overflow:hidden; background-position:center;" 
              onmouseover="VerCC('ddd1','ddd2');" onmouseout="VerCC_out('ddd1','ddd2');" id="ddd1"  >
                        <div id="ddd2" class="ccc2" style=" height:10vw; padding-top:10vw;">
                            <div class="ccc3" id="ee3" >
                                    <?php echo $txt3; ?> 
                            </div>
                        </div>
   				</div>
                 <div style="width:100%; height:20vw; background:url(<?php echo $img4; ?>); background-size: 100% auto; float:left; overflow:hidden; background-position:center;" 
                 onmouseover="VerCC('eee1','eee2');" onmouseout="VerCC_out('eee1','eee2');" id="eee1"   >
                 	 
                        <div id="eee2" class="ccc2" style=" height:10vw; padding-top:10vw;">
                            <div class="ccc3" id="ee3" >
                                   <?php echo $txt4; ?> 
                            </div>
                        </div>
                 
   				</div>     
    </div>
    <div class="clr"></div>
</div>




<div id="profile_container" style="overflow:hidden; width:100%; height:35vw; ">
<div id="profile_container_int" style="width:100%; margin-left:-5px;" >

    <div class="ddd1" 
    style="background-image:url(images_brochures/Brochures_2.jpg); width:42% !important; height:32vw;" >
        <a href="#/flipbook_italian" onclick="VerUno();" >
            <div id="dd2" class="cc2">
                <div class="cc3" id="dd3" >

                </div>
            </div>
        </a>
    </div>

    <div class="ddd1" 
     style="background-image:url(images_brochures/Brochures_3.jpg); height:32vw;" >
        <a href="#/flipbook_italian" onclick="VerDos();" >
            <div id="ee2" class="cc2">
                <div class="cc3" id="ee3" >

                </div>
            </div>
        </a>
    </div>

    <div class="ddd1" 
      style="background-image:url(images_brochures/Brochures_4.jpg); height:32vw;" >
        <a href="#/flipbook_italian" onclick="VerTres();" >
            <div id="ff2" class="cc2">
                <div class="cc3" id="ff3" >

                </div>
            </div>
        </a>
    </div>



    <div class="clr"></div>

</div>
</div>






<div class="footer">

	<div class="footer_tree">
    	<div class="footer_icono">
   	    	<img src="/elements/footer_logo.png" width="111" />
        </div>

       <div class="footer_ico">
        	<div class="footer_info">
              <strong>NEED INFO?</strong><br />
              Contact us with questions about<br />
              products or services.<br /><br />
              909-428-8520 &nbsp; <a href="mailto:info@haliburton.net" style="color:#ffffff; text-decoration:none;">| &nbsp; info@haliburton.net</a>
</div>
        </div>

        <div class="clr"></div>

    </div>

    <div class="footer_tree">
        <div class="footer_info">
          <strong>NEED A CHALLENGE?</strong><br />
          If you want to join a team that embraces growth and continuous<br />
improvement, we want to hear from you.<br /><br />

careers@haliburton.net
        </div>
    </div>

    <div class="footer_tree">
    	<div class="footer_info">
          <strong>FOLLOW US ON SOCIAL MEDIA</strong><br />

          <img src="elements/social.png" width="130" usemap="#Map" border="0"  />
          <map name="Map" id="Map">
            <area shape="rect" coords="9,6,28,27" href="https://www.facebook.com/HaliburtonInternationalFoods" target="_blank" />
            <area shape="rect" coords="35,6,60,27" href="https://twitter.com/Haliburtonfoods" target="_blank" />
            <area shape="rect" coords="69,7,91,28" href="https://www.instagram.com/Haliburtonfoods/" target="_blank" />
            <area shape="rect" coords="101,6,124,29" href="https://www.linkedin.com/company/haliburton-international-foods/" target="_blank" />
          </map>
<br />


          ©2018 Haliburton International Foods, Inc.

        </div>
    </div>

    <div class="clr"></div>

</div>



<br /><br /><br />

</body>

</html>
