<?php
session_start();
include("../admin/includes/mysql_infos2.php");

$id_usuario = $_SESSION['idu'];

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
<link rel="stylesheet" type="text/css" href="../css/checkout.css">
<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="/css/login_cart.css">

 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/home2.js"></script>
  <script src="/js/login.js"></script>
  <script src="/js/login_cart.js"></script>
 
</head>

<body>

<?php
include "../login_cart.php";
?>

<div class="sf_header">

<br /><br />

	<div class="sf_header1" id="sf_header1">
        <div class="sf_header2" id="sf_header2">
            
            
			<div class="sf_header_tit" style="margin-top:0vw;">YOUR SHOPPING CART</div>
            
            
          
             
      
             
             
             
             <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="60%">ITEM</td>
                <th width="15%">PRICE</td>
                <th width="15%">QTY</td>
                <th width="20%">TOTAL</td>
              </tr>
              
              <?php 
			  
			 	 $qt = "SELECT * FROM cart WHERE id_usuario = '$id_usuario' and pagado = 0 ";
				//echo $qt;
				$total=0;
				$resul = mysqli_query($link,$qt);
				$i=0;
				while ($row = mysqli_fetch_row($resul)){
			  		$i++;
					$id_cart = $row[0];
					$id_usuario = $row[1];
					$id_ticket = $row[2];
					$tipo_ticket = $row[3];
					$id_transaccion = $row[4];
					$fecha = $row[5];
					$cantidad = $row[6];
					$pagado = $row[7];
					$alimentos = $row[8];
					$precio = $row[9];
					
					$suma = $precio*$cantidad;
					
					$total +=$suma;
					
					$qt = "SELECT * FROM evento_tipo  WHERE id_evento_tipo='$tipo_ticket'";
					$resultt = mysqli_query($link,$qt);
					while ($rowt = mysqli_fetch_row($resultt)){
			
						$id_evento_tipo = $rowt[0];
						
						$evento = $rowt[1];
						$icono = $rowt[2];
					}
			  ?>
              
              
              <tr class="item<?php echo $i%2; ?>">
                <td>
                	<div class="item_div">
                		<div class="item_left" style="margin-right:10px;"><img src="<?php echo $icono; ?>"  height="90" /></div>
                    	<div  class="item_left">Molcajete vendor June</div>
                        <div class="clr"></div>
                    </div>
                </td>
                <td>$<?php echo $precio; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td>$<?php echo number_format($suma); ?></td>
              </tr>
              
              <?php } ?>
              
              
              <tr class="total">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>TOTAL</td>
                <td>$<?php echo number_format($total); ?></td>
              </tr>
            </table>
            
            <div class="item_btns">
            			<div class="tic_botones">
                        	 <div class="tic_boton_a" style="width:180px;"><a href="/shop/">Continue shopping</a></div>
                              <div class="tic_boton"><a href="/payment.php">Checkout</a></div>
                        </div>
            </div>
                         
             
             
            
            
            </div>
            
     </div>
    

</div>







    



</body>

</html>
