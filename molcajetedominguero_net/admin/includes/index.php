<?php
include("includes/data/mysql_infos.php");

extract($_POST);
extract($_GET);




/*
$q = "SELECT id_amigocondesa FROM amigoscondesa LIMIT 51";
$result = mysql_query($q, $db);

echo "<fotos>
";

while ($row = mysql_fetch_row($result)){
	//$numero = $row[0];
	
	echo '<foto>
	';
	echo '	<archivo>'.$row[0].'</archivo>
	';
	echo '	<id>'.$row[0].'</id>
	';
	echo '</foto>
	';
	
}

echo "</fotos>
";

*/


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ya somos los 4400 y tantos amigos en FACEBOOK</title>

<link rel="image_src" href="http://graph.facebook.com/solocondesa/picture?type=large" />


<meta name="language" content="es" />
<meta name="author" content="solocondesa.com" />
<meta name="description" content="Ya somos los 4400 y tantos amigos en FACEBOOK" />
<meta name="keywords" content="amigos, facebook , colonia condesa, solocondesa, coloniacondesa, directorios condesa " />




<script language="javascript" src="js/jquery.js">
</script>

<script type="text/javascript" >
<!--

var id = setInterval("Centrar()",1000);
setTimeout("clearInterval("+id+")",5000);


$(document).ready(function() {
	//$('#desde').html("hola");
	Centrar();
	Centrar();
});

$(window).resize(function(){
	Centrar();
	Centrar();
}); 

$(document).resize(function(){
	Centrar();
	Centrar();
}); 

function Centrar(){
	//alert($(document).width())
}
var actual;
function Detalle(t_this){
	
	if(t_this==actual){
		var t_mini = "http://graph.facebook.com/"+$(actual).attr("id")+"/picture";
		var t_old = $(actual).attr("id");
		
		$("#mini"+t_old).attr("src",t_mini);
		$("#mini"+t_old).show();
		$("#grande"+t_old).hide();
		actual = null;
		
		$(".top4").css("position","absolute");
		$(".topf").css("position","absolute");
		$(".topi").css("position","absolute");
	}else{
		var t_id = $(t_this).attr("id");
		var t_big = "http://graph.facebook.com/"+$(t_this).attr("id")+"/picture?type=large";
		
		$("#mini"+t_id).attr("src","images/vacio.gif");
		
		$("#grande"+t_id).attr("src",t_big);
		
		var t_mini = "http://graph.facebook.com/"+$(actual).attr("id")+"/picture";
		var t_old = $(actual).attr("id");
		
		$("#mini"+t_old).attr("src",t_mini);
		$("#mini"+t_old).show();
		$("#grande"+t_old).hide();
		
		actual = t_this;
	}
	
}
function Carga(t_this){
	
	var t_id = $(t_this).attr("dato");
	$("#mini"+t_id).hide();
	$("#grande"+t_id).show("slow");
	
	$(".top4").css("position","inherit");
	$(".topf").css("position","inherit");
	$(".topi").css("position","inherit");
}
function DetalleAlgo(t_this){
	$('#fotos').width( ($(window).width()) - 210 );
	var t_espacio = ($(window).width())- 210;	
	var t_dif = Math.floor(t_espacio/183);
	
	var total_nece = (t_dif*183);
	
	var main_w = total_nece + 215;
	
	$('#fotos').width(total_nece+20);
	$('#main').width(main_w+20);
	
	var t_no_usado = t_espacio - (t_dif*183);
	var t_margen = Math.floor(t_no_usado/t_dif);
	
	//$('.foto').css("margin-right",t_margen);
	//$('.foto').css("margin-bottom",t_margen/2);
	
	$('#fotos').height($("#detalle_all").height());
}



-->
</script>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#EDEDED;
}
.foto{
	min-width:50px;
	min-height:50px;
	border:solid #000 4px;
	margin:1px;
	display:block;
	float:left;
	background:url(images/loading.gif) no-repeat center;
	cursor:pointer;
}
.foto:hover{
	border:solid #CCCCCC 4px;
}
.top{
	height:30px;
	width:auto;
	margin:0px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:20px;
	background-color:#000;
	color:#FFF;
	padding-top:3px;
	padding-left:30px;
}
.top a{
	text-decoration:none;
	color:#FFF;
}
.top a:hover{
	color:#FFDE00;
}
.top4{
	background:#FFF;
	width:420px;
	height:180px;
	float:left;
	display:block;
	position:absolute;
	left:0px;
	top:33px;
	
}
.topf{
	width:299px;
	height:119px;
	float:left;
	display:block;
	position:absolute;
	left: 0px;
	top: 213px;
	background-color:#FFDE00;
}
.topi{
	width:339px;
	height:99px;
	float:left;
	display:block;
	position:absolute;
	padding:10px;
	left: 0px;
	top: 333px;
	background-color:#FFDE00;
}

-->
</style></head>

<body>

<div class="top">

<div style="float:left;">
<a href="http://www.solocondesa.com">SoloCondesa.com</a>
</div>

<div style="float:right; font-size:12px; margin-top:5px; margin-right:20px;">
<SCRIPT LANGUAGE="javascript">
width = screen.width;
height = screen.height;
document.write("<a href='version_hd.php?ancho="+width+"&alto="+height+"' >")
</SCRIPT>
Si tienes un gran monitor disfruta de esta otra versión</a>
</div>

<div style="clear:both;"></div>

</div>


<div class="top4"> <a href="http://www.facebook.com/solocondesa"><img src="images/4400.jpg" width="420" height="180" alt="4400" border="none" /></a>
</div>


<div class="topf"> <a href="http://www.facebook.com/solocondesa"><img src="images/facebook.jpg" width="299" height="109" alt="amigos en facebook" border="none" /></a>
</div>

<div class="topi">

 <iframe src="http://www.facebook.com/widgets/like.php?href=http://www.solocondesa.com/conexion/4400/"
scrolling="no" frameborder="0"
style="border:none; width:300px; height:70px"></iframe>

</div>


<div class="foto" >
<a href="http://www.solocondesa.com">
<img src="http://graph.facebook.com/solocondesa/picture" id="solocondesa" border="none" >
</a>
</div>



<?php

$q = "SELECT id_amigocondesa FROM amigoscondesa ORDER BY RAND() LIMIT 200";
$result = mysql_query($q, $db);

echo "<fotos>
";

while ($row = mysql_fetch_row($result)){
	//$numero = $row[0];
	
	echo '<div class="foto" id="'.$row[0].'" onclick="Detalle(this);" >
	';
	echo '	<img src="http://graph.facebook.com/'.$row[0].'/picture" id="mini'.$row[0].'"  >
	';
	
	echo '	<img id="grande'.$row[0].'" style="display:none" onload="Carga(this);" dato="'.$row[0].'" >
	';
	
	echo '</div>
	';
	
	
}

echo "</fotos>
";



?>


<?php
include ("../../common_files/analytics.php");
?>

</body>

</html>
