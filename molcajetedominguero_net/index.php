<?php
session_start();
include("admin/includes/mysql_infos2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Molcajete Dominguero</title>
<meta property="og:title" content="Molcajete Domingueri">
<meta property="og:description" content="Molcajete Dominguero has now become the Largest Latinx Popup in the country!">
<meta property="og:image" content="http://molcajetedominguero.net/images/thumb.jpg">
<meta property="og:url" content="http://molcajetedominguero.net/">

<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One|Lilita+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/stylesheetmd.css">

<link rel="stylesheet" type="text/css" href="css/login.css">


<link rel="stylesheet" type="text/css" href="css/login_cart.css">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=179916685444770&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/home2.js"></script>
 <script src="js/june.js"></script>
 
 <script src="js/login.js"></script>
 
 <script src="js/login_cart.js"></script>
 
 <script language="javascript">
 $( document ).ready(function() {
 	//alert("--");
   //$("#join_social").hide();
   myVarV = setInterval(myTimerV, 3000);
});

var myVarV;
var tt=0;
var ss=0;

 function MostrarJoinSocial(){
	 //alert("Join");
	 e=0;
	 if(ss==0){
		 $("#join_social").show(200);
		 ss=1;
		 tt=1;
		 e=1;
	 }
	 
	 if(ss==1 && e==0){
		 //$("#join_social").hide();
		 ss=0;
		 tt=1;
	 }
 }
 function myTimerV() {
    var d = new Date();
    //document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	//AjustarCajas();
	if(tt==0){
		$("#join_social").hide();
		tt=1;
	}
} 
 </script>
 
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/7a8c4a38965a5a4e59b4f2b51/066f6caed3d7ebfcb77e77c6e.js");</script>
 
</head>

<body>

<?php
include "login_cart.php";
?>





<div class="logo" id="logo">
    <div id="logoint" class="logint" style="position:relative; top:0px; ">
        <a href="/">
        <img src="/logos_alta/molca-blanco-back.png" width="100%" id="logodia"  />
        <img src="/images/comming_soon.png" width="100%" id="logonoche"  />
        </a>
    </div>
</div>


<div class="header" id="header" onclick="OcultarMenu();">
	<div class="header1" id="header1">
        <div class="header2" id="header2">
        
       	  <div class="aboutus" id="aboutus">
            	<div id="aboutus_div">
                    <a href="about-us.php#top" >
                    ABOUT US
                    </a>
                    <br />
                    <a href="contact-us.php#top">
                    CONTACT US
                    </a>
                </div>
        	</div>
            
          <div class="contactus" id="contactus">
            	<div id="contactus_div">
                
                <?php
				if($_SESSION['login']  != "correcto"){
				?>
                    <a href="#LOGIN" onclick="LogMostrar();">
                    LOG IN
                    </a>
                    <br />
                    <a href="apply.php#top">
                    REGISTER
                    </a>
                 <?php
				}else{	 
				 ?> 
                 
                 <a href="/shop/" style="font-size:4vw; " >
                    SHOP
                    </a>
                 
                 <?php  
				}
				 ?>
                   
                
                </div>
        	</div>
            
          <div class="molcajetenig" id="molcajetenig" onmouseover="VerNoche();" onmouseout="VerDia();" >
            	<div id="molcajetenig_div">
                <a href="#ComingSoon">
                MOLCAJETE NIGHTS
                </div>
                </a>
        	</div>
            
          <div class="sanfrancisco" id="sanfrancisco"  onmouseover="VerSanFran();" onmouseout="VerLA();" >
            	<div id="sanfrancisco_div">
                <a href="/san-francisco/#top">
                SAN FRANCISCO
                </div>
                </a>
        	</div>
            
          <div class="sanfrancisco" id="inland" >
            	<div id="inland_div">
                <a href="/inland-empire/#top">
                INLAND EMPIRE
                </div>
                </a>
        	</div>
        
        
      </div>
	</div>
</div>

<div class="skyline" id="skyline">

</div>


<div class="mesanio">
2018
</div>
<div class="mes">
	<div class="mes_int">
	  <div class="mes_txt" style="background-image:url(/uploaded/1531086417.jpg); width:20%;" id="let1">J</div>
        <div class="mes_txt" style="background-image:url(/molcajetedomborrador3/md4_2.png);" id="let2">U</div>
        <div class="mes_txt" style="background-image:url(/molcajetedomborrador3/md4_3.png);" id="let3">N</div>
        <div class="mes_txt" style="background-image:url(/molcajetedomborrador3/md4_4.png);" id="let4">E</div>
        <div class="clr"></div>
	</div>
</dv>






<img src="images/home_2.jpg" width="100%" />

<div class="productos" style="display:none;">
	
    <?php
	
	$qt = "SELECT * FROM producto ORDER BY id_producto DESC LIMIT 12 ";
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_producto = $rowt[0];
		
		$nombre = $rowt[1];
		$imagen = $rowt[2];
		$fotos = $rowt[3];
		$archivos = $rowt[4];
		$descripcion = $rowt[5];
		$permalink = $rowt[6];
		$html = $rowt[7];
		
		
		$descripcion = utf8_encode($descripcion);
		$nombre = utf8_encode($nombre);
	
	?>
    
	<div class="producto" style=" background-image:url(<?php echo $imagen; ?>);" id="pd<?php echo $id; ?>"
     onmouseover="VerCC('pd<?php echo $id; ?>','pdt<?php echo $id; ?>');" onmouseout="VerCC_out('pd<?php echo $id; ?>','pdt<?php echo $id; ?>');" >
        <a href="/productos/<?php echo $permalink; ?>#top" class="producto_titulo_a">
            <div class="producto_all" onmouseover="OcultarMenu();" >
                <div class="producto_titulo" id="pdt<?php echo $id; ?>" >
                    <?php echo $nombre; ?>
                </div>
            </div>
        </a>
    </div>
    
    <?php
	}
	?>
    
  
   
    
    <div class="clr"></div>
</div>


<div class="join">
	<div class="title_join">
    TOGETHER WE ARE STRONGER!
    </div>
    <div class="subt_join">
   The only way we can make things happen is by working together and supporting each other. 
    </div>
    
    <div class="join_circulos">
    	
        <div class="join_circulo" onmouseover="OcultarMenu();" >
            <a href="/apply.php#top" >
            JOIN <br /> OUR FAM
            </a>
        </div>
         <div class="join_circulo" style="float:right !important;" onmouseover="OcultarMenu();" onclick="MostrarJoinSocial();">
            <a href="#SpreadTheWord" onclick="MostrarJoinSocial();">
            SPREAD <br /> THE WORD
            </a>
        </div>
        <div class="clr"></div>
        
    </div>
    
</div>


<div class="join_social" id="join_social">

<div class="join_social_div">
<div class="fb-share-button" data-href="http://molcajetedominguero.net/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmolcajetedominguero.net%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>



<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


</div>

</div>



<div class="vendors" style="display:none;">

		<div class="titulnos"> <a name="sobrenos"></a>
			<img src="/molcajetedomborrador3/nosotros.png" class="nosotros" >
		</div>

	<div class="vendors_int">
    
    <?php
	
	$qt = "SELECT * FROM vendor ORDER BY id_vendor DESC LIMIT 12 ";
	$resultt = mysqli_query($link,$qt);
	$cc=1;
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$cc++;
		if($cc>2){
			$cc=1;
		}
		$id = $rowt[0];
		$id_producto = $rowt[0];
		
		$nombre = $rowt[1];
		$imagen = $rowt[2];
		$fotos = $rowt[3];
		$archivos = $rowt[4];
		$descripcion = $rowt[5];
		$permalink = $rowt[6];
		$html = $rowt[7];
		
		
		$descripcion = utf8_encode($descripcion);
		$nombre = utf8_encode($nombre);
	
	?>
        <div class="vendor<?php echo $cc; ?>" >
            <a href="/vendors/<?php echo $permalink; ?>#top">
            <div class="vendor_foto1" style="background-image:url(<?php echo $imagen; ?>)">
            
            </div>
            </a>
            <div class="vendor_texto">
                <h2><?php echo $nombre; ?></h2>
                <p><?php echo $descripcion; ?></p>
            </div>
        </div>
        <?php
	}
		?>
        
    <div style="clear: both;"></div>
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
                <p id="nfn"><a href="/about-us.php#top" class="footer_a">About us</a></p>
				<p id="nfn"><a href="/contact-us.php#top" class="footer_a">Contact us</a></p>
				<p id="nfn"><a href="/molcajete-nights/#top" class="footer_a">Molcajete Nights</a></p>
			</div>
			<div class="text2">
				<h3>Join Our Fam</h3> 
				<p id="nfn"><a href="/apply.php#top" class="footer_a">Apply</a></p>
              <p id="nfn"><a href="/applications.php#top" class="footer_a">Applications</a></p>
				<p id="nfn"><a href="/sponsorships.php#top" class="footer_a">Sponsorships</a></p>
			</div>
			<div class="text3">
				<h3>Social Media</h3> 
				<p id="nfn"><a href="/apply.php#top" class="footer_a">Instagram</a></p>
                <p id="nfn"><a href="/applications.php#top" class="footer_a">Facebook</a></p>
				<p id="nfn"><a href="/sponsorships.php#top" class="footer_a">Mail</a></p>
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
