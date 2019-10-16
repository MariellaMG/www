<?php
session_start();
include("../admin/includes/mysql_infos2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One|Lilita+One|Permanent+Marker" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheetmd.css">
<link rel="stylesheet" type="text/css" href="../css/shop.css">


<link rel="stylesheet" type="text/css" href="css/login.css">

<link rel="stylesheet" type="text/css" href="/css/login_cart.css">

 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/home2.js"></script>
  
   <script src="/js/login.js"></script>
  <script src="/js/login_cart.js"></script>
  
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?language=es&key=AIzaSyBDWeh4k3DcbeApzdqiX92bsqMQz4-bBV4"></script>
  
<script type="text/javascript">

$( document ).ready(function() {
 	initialize();
});

var map;
var marker;


function initialize() {
//alert("--");
  var myLatlng = new google.maps.LatLng(34.0498622, -117.5684783);
  var myOptions = {
    zoom: 10,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

  
	marker = new google.maps.Marker({
		position: myLatlng, 
		map: map
	});
	 
  
}
</script>
</head>

<body>


<?php
include "../login_cart.php";
?>


<div class="sf_header">

<br /><br />

	<div class="sf_header1" id="sf_header1">
        <div class="sf_header2" id="sf_header2">
            
            
			<div class="sf_header_tit" style="margin-top:0vw;">SHOP</div>
            
            
            
            
            
       <?php
			$qt = "SELECT * FROM evento_tipo ORDER by orden ";
			$resultt = mysqli_query($link,$qt);
			while ($rowt = mysqli_fetch_row($resultt)){
	
				$id_evento_tipo = $rowt[0];
				
				$evento = $rowt[1];
				$icono = $rowt[2];
			?>
            
            <br /><br />
            
             <div class="sf_header_sub" >
             	MOLCAJETE DOMINGUERO - <?php echo $evento; ?>
             </div>
             
            
             
             <div class="shop_linea">
             	<div class="shop_linea_int">
                
             	<?php 
				$qt = "SELECT * FROM evento_tickets  WHERE id_tipo_evento = '$id_evento_tipo' ";
				$resul = mysqli_query($link,$qt);
				while ($row = mysqli_fetch_row($resul)){
					
					$id_evento_ticket = $row[0];
					$id_tipo_evento = $row[1];
					$nombre = $row[2];
					$fecha = $row[3];
					$fecha_nombre = $row[4];
					$tickets_totales = $row[5];
					$tickets_vendors = $row[6];
					$tickets_alimentos = $row[7];
					$tickets_vendidos = $row[8];
					$tickets_vendidos_alimentos = $row[9];
					$tickets_precio = $row[10];
					$tickets_precio_alimentos = $row[11];
					
					$disponibles = $tickets_vendors-$tickets_vendidos;
					$disponibles_alimentos = $tickets_alimentos-$tickets_vendidos_alimentos;
				
				 ?>
                
					<?php if($tickets_precio!=0){ ?>
                        <div class="shop_elemento">
                            <a href="/shop-ticket/?id=<?php echo $id_evento_ticket."&alimentos=0"; ?>">
                            	<img src="<?php echo $icono; ?>" height="145" />
                            </a>
                          
                            <div class="shop_precio">$<?php echo $tickets_precio; ?></div>
                            <div class="shop_fecha"><?php  echo $fecha_nombre; ?></div>
                            
                            <div class="shop_boton"><a href="/shop-ticket/?id<?php echo $id_evento_ticket."&alimentos=0"; ?>">Buy</a></div>
                        </div>
                     <?php } ?>

					<?php if($tickets_precio_alimentos!=0){ ?>
                        <div class="shop_elemento">
                        	<a href="/shop-ticket/?id=<?php echo $id_evento_ticket."&alimentos=1"; ?>">
                            	<img src="<?php echo $icono; ?>" height="145" />
                          	</a>
                            <div class="shop_precio">$<?php echo $tickets_precio_alimentos; ?></div>
                            <div class="shop_fecha"><?php  echo $fecha_nombre; ?></div>
                            <div class="shop_fecha"><strong>FOOD VENDOR</strong></div>
                            
                            <div class="shop_boton"><a href="/shop-ticket/?id=<?php echo $id_evento_ticket."&alimentos=1"; ?>">Buy</a></div>
                        </div>
                     <?php } ?>
                    
                    
                    
                <?php } ?>
                
                
                
                
                	<div class="clr"></div>
                </div>
             </div>
            
            
            <?php
	}
			?>
            
            
            
 
            
            
            <br /><br /><br />
            
           
            
           
            

		</div>
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
