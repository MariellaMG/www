<?php
$header = "/images_innovation/commercialization/Commercialization_header_2.jpg";
$img1_w = 800;
$img1_h = 630;
$img1 = "/images_innovation/commercialization/Commercialization_1.jpg";
$img2 = "/images_innovation/commercialization/Commercialization_2.jpg";
$img3 = "/images_innovation/commercialization/Commercialization_3.jpg";
$img4 = "/images_products/products_home/Products_4.jpg";
$title = "COMMERCIALIZATION";
$header_t = "COMMERCIALIZATION";

$txt2="<strong>Bloody Mary</strong><br />
<br />
Smoked California Chile Bloody Mary Mix, Pickled Cucumber, Fire-Roasted Shishito Peppers";


$txt3="<strong>Ahi and Kampachi Poke Bowl</strong><br />
<br />
Citrus Miso Vinaigrette, Brown Sushi Rice, Fire-Roasted Mukimame, Pickled Soya Onions, Wasabi Avocado Crema";

$txt4="<strong>Duck Breast</strong><br />
<br />
Black Barley with Fire-Roasted Asparagus, Red Bell Peppers and Onions, Vadouvan Carrot Purée";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?> | Haliburton</title>
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
	///
	ShowCC_out('ccc1','ccc2');
	ShowCC_out('ddd1','ddd2');
	ShowCC_out('eee1','eee2');
});
 </script>


 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/innovation.css">
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
	height:47.0vw !important;
	background-color:#000;
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



<div class="header" id="header" style=" background-image:url(<?php echo $header; ?>);" onclick="HideMenu();">
	
      
    <div class="white" id="white" style="width:38vw; height:14.5vw;">
    	<div class="white_int" style="padding-bottom:14%;" >
    		<h1 style="font-size:3.0vw; padding-top:1.5vw;"><?php echo $header_t; ?></h1>
           
    	</div>	
    </div>
    
</div>



<div class="midmenu" >
	<div class="midmenu_int">

		<?php include "innovation_menu_horizontal.php"; ?>

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

    <div class="bb1_gray" id="cc1" style="background-color:#E2D581;"   >
        <div class="box_vw" id="cc2">
        	<h2 class="title_vw" style="font-size:2.0vw;">
            
COMMERCIALIZATION

</h2>
            <p class="text_vw" style="font-size:1.4vw;">	



A critical step in ensuring a successful<br />
 product launch is going from bench-top<br />
 to production without a loss in prototype continuity.<br />
 To this end, Haliburton follows a well-rehearsed<br />
 process led by a dedicated commercialization<br />
 manager working in concert with a cross- <br />
functional team of subject matter experts.<br /><br />

And because practice makes perfect, Haliburton<br />
 operates several pilot lines for conducting<br />
 new product trials and to support customer tests<br />
 requiring smaller product runs.






            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>




<?php
include "commer_galery.php";
?>





<?php
include "footer.php";
?>

</body>

</html>
