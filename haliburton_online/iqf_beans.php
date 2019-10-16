<?php
$header = "/images_products/iqf_beans/IQFbeans_header.jpg";
$img1_w = 800;
$img1_h = 530;
$img1 = "/images_products/iqf_beans/IQFBeanMachine1200.jpg";
$img2 = "/images_products/iqf_beans/IQFbeans_2.jpg";
$img3 = "/images_products/iqf_beans/IQFbeans_3.jpg";
$img4 = "/images_products/iqf_beans/IQFbeans_4.jpg";
$title = "IQF BEANS";
$header_t = "IQF BEANS";
$txt2="<strong>Mediterranean Chopped Salad</strong><br />
IQF Chickpeas";
$txt3="<strong>Jamaican Jerk Salmon</strong><br />
IQF Black Beans";
$txt4="<strong>Hearty Three Bean Chili</strong><br />
IQF Black, Kidney, and Pinto Beans";
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
	
	CloseWindow();
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
<link rel="stylesheet" type="text/css" href="css/products.css">
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
	height:44.4vw !important;
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





<div class="header" id="header" style=" background-image:url(<?php echo $header; ?>);" onclick="HideMenu();">
	<div class="white" id="white">
    	<div class="white_int">
    		<h1  style="font-size:3.0vw; "><?php echo $header_t; ?> </h1>

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
        <a href="#" >
            <div id="bb2" class="cc2"  >
                <div class="cc3" id="bb3" >

                </div>
            </div>
        </a>
    </div>

    <div class="bb1_gray" id="cc1" style=" background-color: #C7A4B9 !important; "   >
        <div class="box_vw" id="cc2" style="margin-top:1.5vw;">
        	<h2 class="title_vw">
IQF BEANS
          </h2>
            <p class="text_vw" style="font-size:1.5vw;">

          With over 100 million pounds of<br />
          capacity, our continuous cooking<br />
           system, ensures each bean is cooked<br />
            precisely the same every time.







            </p>
        </div>
    </div>


    <div class="clr"></div>

</div>
</div>




<?php
include "products_galery.php";
?>


<?php
include "products_footer_brochures.php";
?>






<?php
include "footer.php";
?>

</body>

</html>
