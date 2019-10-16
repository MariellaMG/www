<?php
session_start();
include("../admin/includes/mysql_infos2.php");
?>
<?php
			$alimentos = $_GET['alimentos'];
			$id = $_GET['id'];
			
			$qt = "SELECT * FROM evento_tickets WHERE id_evento_tickets = '$id' ";
			//echo $qt;
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
				}
				
				
				  if($alimentos==0){ 
                     $elprecio=$tickets_precio;
				  }
				  if($alimentos==1){ 
                     $elprecio=$tickets_precio_alimentos;
				  }
				  
			$conteo_cart=0;
			$id_usuario = $_SESSION['idu'];
			$sq = "SELECT cantidad FROM cart WHERE id_usuario='$id_usuario' AND id_ticket='$id_evento_ticket' AND alimentos='$alimentos' ";
			//echo $sq;
		    $resul = mysqli_query($link,$sq);
			while ($row = mysqli_fetch_row($resul)){
				$conteo_cart += $row[0];
			}
			
			
                        
                        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $nombre; ?> | Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One|Lilita+One|Permanent+Marker" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheetmd.css">
<link rel="stylesheet" type="text/css" href="../css/shop-ticket.css">

<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="/css/login_cart.css">

 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/home2.js"></script>
 
 <script src="/js/login.js"></script>
 
   <script src="/js/login_cart.js"></script>
   
   <script type="text/javascript">
   
   
   <?php
   if($_SESSION['login']  == "correcto"){
	   $lg=1;
   }else{
	   $lg=0;
   }
   ?>
   
   var loging=<?php echo $lg; ?>;
   var agregado=0;
   var idt = <?php echo $id_evento_ticket; ?>;
	var tt = <?php echo $id_tipo_evento; ?>;
	var aa = <?php echo $alimentos; ?>;
	var pp= <?php echo $elprecio; ?>

	$( document ).ready(function() {
		
	});
	
	function AddToCar(){
		if(loging==1){
			if ($('#terms').is(":checked")){
			  // it is checked
			  if(agregado==0){
				  var num = Number($('#car_conteo').html());
				  var num_dos = Number($('#car_conteo_dos').html());
				  
				  agregado=1;
				  //agregar al car
				  $.post("/login_cart_add.php?idt="+idt+"&tt="+tt+"&aa="+aa+"&pp="+pp, function(data){
					//$("#linea"+t_id).hide("slow");
					//alert(data);
					//CerrarLog();
					//window.location.href = '/';
					$('#car_conteo').html(num+1);
				    $('#car_conteo_dos').html(num_dos+1);
				});
			  }
			}else{
				alert("You must read an accept the terms and conditions");
			}
		}else{
			alert("You must be a registered user if you want to buy");
		}
	}
	
	function BuyNow(){
		if(loging==1){
			if ($('#terms').is(":checked")){
			  // it is checked
			  if(agregado==0){
				  var num = Number($('#car_conteo_dos').html());
				  var num_dos = Number($('#car_conteo_dos').html());
				  
				  agregado=1;
				  ///agregar al car
				 // window.location.href = '/checkout/';
				  $.post("/login_cart_add.php?idt="+idt+"&tt="+tt+"&aa="+aa+"&pp="+pp, function(data){
					//$("#linea"+t_id).hide("slow");
					//alert(data);
					//CerrarLog();
					//window.location.href = '/';
					$('#car_conteo').html(num+1);
				    $('#car_conteo_dos').html(num_dos+1);
					window.location.href = '/checkout/';
					
				});
			  }
			}else{
				alert("You must read an accept the terms and conditions");
			}
		}else{
			alert("You must be a registered user if you want to buy");
		}
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
            
            
            <?php
			
			$alimentos = $_GET['alimentos'];
			$id = $_GET['id'];
			
			$qt = "SELECT * FROM evento_tickets WHERE id_evento_tickets = '$id' ";
			//echo $qt;
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
					
					
					$terminos = $row[15];
					
					$disponibles = $tickets_vendors-$tickets_vendidos;
					$disponibles_alimentos = $tickets_alimentos-$tickets_vendidos_alimentos;
					
					$qt = "SELECT * FROM evento_tipo  WHERE id_evento_tipo='$id_tipo_evento'";
					$resultt = mysqli_query($link,$qt);
					while ($rowt = mysqli_fetch_row($resultt)){
			
						$id_evento_tipo = $rowt[0];
						
						$evento = $rowt[1];
						$icono = $rowt[2];
					}
					
					$terminos="Before Finalizing your purchase, please make sure you read the bellow:

By Purchasing I agree to bring with me a white/off-white umbrella to the event, your own 6ft table and chair/s. Please note that you will have enough space to place a 6ft table and a maximum of 8x8 space. There are no refunds available and once you purchase your space, it is not transferrable or refundable. 

If you agree to the above, please check the box below and submit payment. ";
			?>
            
            
            
            
            <?php
			if($alimentos==1){
			?>
				<div class="sf_header_tit" style="margin-top:0vw;">FOOD VENDOR SPACE</div>
                <div class="sf_header_tit_mini" style="margin-top:0vw;"><?php echo $evento;  ?></div>
            <?php
			}
			?>
             <?php
			if($alimentos==0){
			?>
				<div class="sf_header_tit" style="margin-top:0vw;">VENDOR SPACE</div>
                <div class="sf_header_tit_mini" style="margin-top:0vw;"><?php echo $evento;  ?></div>
            <?php
			}
			?>
            

             
             <div class="tic_div">
            		<div class="tic_logo">
                    	<div style="width:90%; margin:auto;"><img src="<?php echo $icono; ?>" width="100%" /></div>
                        
                        <?php if($alimentos==0){ ?>
                        	<div class="tic_logo_sub">VENDOR</div>
                        <?php } ?>
                        <?php if($alimentos==1){ ?>
                        	<div class="tic_logo_sub">FOOD VENDOR</div>
                        <?php } ?>
                        
                        
                    </div>
                    <div class="tic_txt">
                    	<h1 style="font-size:18px;"><?php echo $fecha_nombre; ?><h1>
                        
                        
                        <?php if($alimentos==0){ ?>
                        <h2 style="font-size:30px;">$<?php echo $tickets_precio; ?><h2>
                        <?php } ?>
                        
                        <?php if($alimentos==1){ ?>
                        <h2 style="font-size:30px;">$<?php echo $tickets_precio_alimentos; ?><h2>
                        <?php } ?>
                        
                        <h3><?php echo $evento;  ?></h3>
                        
                        <div class="tic_detalle">
                        	<?php echo $nombre; ?>
                        </div>
                        <div class="tic_botones" style="height:60px;">
                        	 <div class="tic_boton_a"><a href="#/shop-ticket/" onclick="AddToCar();">Add to cart</a></div>
                              <div class="tic_boton"><a href="#/checkout/" onclick="BuyNow();">Buy now</a></div>
                              <div style="clear:both;"></div>
                        </div>
                        <br />
                        
                        <div class="tic_cart">
         
                        	<div class="lc_izq"><a href="#"><img src="/logos_alta/icono_cart.png" height="20" /></a></div>
         					<div class="lc_izq" style="margin-left:3px; font-size:20px;"> <a href="#" id="car_conteo_dos"> <?php echo $conteo_cart; ?> </a> </div>
                            <div style="clear:both;"></div>
                        </div>
                        
                    </div>
                    <div class="clr"></div>
                    
                    <div class="tic_terminos">
                    
                    <?php echo nl2br($terminos); ?>
                    <br /><br />
                    <div>
                        <div style="float:left;"><input name="terms" type="checkbox" value="" id="terms" /> </div>
                    	<div style="font-size:18px; margin-left:3px; float:left;">Acept terms and conditions </div>
                        <div style="clear:both;"></div>
                     </div>
                    </div>
                    
             </div>
             
             
             <?php
				}
			 ?>
             
            
            <br />
<br />
<br /><br /><br /><br /><br />

            
            
            
    
    
          
       <?php
			$qt = "SELECT * FROM evento_tipo  ORDER BY orden ";
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
            




    



</body>

</html>
