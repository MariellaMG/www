<?php

if($_SESSION['login']  == "correcto"){
	
	$idu=$_SESSION['idu'];
	$nombre=$_SESSION['nombre'];
	
	$qt = "SELECT * FROM usuario WHERE id_usuario='$idu' LIMIT 1 ";
	//echo $qt;
	$resultt = mysqli_query($link,$qt);
	$cc=0;
	while ($rowt = mysqli_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id_usuario = $rowt[0];
		
		$nombre = $rowt[1];
		$imagen = $rowt[2];
		$fotos = $rowt[3];
		$archivos = $rowt[4];
		$descripcion = $rowt[5];
		$permalink = $rowt[6];
		$html = $rowt[7];
		
		$cc++;
		
	}
	
	
			$conteo_cart_all=0;
			$sq = "SELECT cantidad FROM cart WHERE id_usuario='$id_usuario' ";
			//echo $sq;
		    $resul = mysqli_query($link,$sq);
			while ($row = mysqli_fetch_row($resul)){
				$conteo_cart_all += $row[0];
			}
	
?>

<div class="lc_top" onclick="OcultarMenu();">
	<div class="lc_top_int">
    	<div class="lc_logo">
       		<div class="lc_izq"><a href="/"><img src="/logos_alta/icono_molcajete_blanco.png" height="18" /></a></div>
         	<div class="lc_izq" style="margin-left:3px;"><a href="/" onmouseover="MostrarMenu();"> Molcajete Dominguero </a></div>
            <div style="clear:both;"></div>
        </div>
        
        <div class="lc_der">
        	<div class="lc_izq"><a href="/checkout/"><img src="/logos_alta/icono_cart.png" height="18" /></a></div>
         	<div class="lc_izq" style="margin-left:3px;"> <a href="/checkout/" id="car_conteo"> <?php echo $conteo_cart_all; ?> </a> </div>
            <div class="lc_izq" style="margin-left:20px;"><a href="#"><img src="/logos_alta/icono_profile.png" height="18" /></a></div>
            <div class="lc_izq" style="margin-left:2px;"><a href="#" > Hello, <?php echo ucfirst($nombre); ?> </a></div>
            <div class="lc_izq" style="margin-left:20px;"><a href="#MyAccount" onmouseover="MostrarMenuLogin();" onclick="OcultarMenuLogin();"> My account</a> </div>
            <div style="clear:both;"></div>
        </div>
        
        <div style="clear:both"></div>
        
    </div>
</div>

<?php
}else{
?>
<div class="lc_top" onclick="OcultarMenu();">
	<div class="lc_top_int">
    	<div class="lc_logo">
       		<div class="lc_izq"><a href="/"><img src="/logos_alta/icono_molcajete_blanco.png" height="18" /></a></div>
         	<div class="lc_izq" style="margin-left:3px;"><a href="/" onmouseover="MostrarMenu();"> Molcajete Dominguero </a></div>
            <div style="clear:both;"></div>
        </div>
        
        <div class="lc_der">
        	<div class="lc_izq"><a href="#"><img src="/logos_alta/icono_cart.png" height="18" /></a></div>
         	<div class="lc_izq" style="margin-left:3px;"> <a href="#" id="car_conteo"> <?php echo $conteo_cart_all; ?> </a> </div>
            <div class="lc_izq" style="margin-left:20px;"><a href="#" onclick="LogMostrar();"> Login </a></div>
            <div class="lc_izq" style="margin-left:20px;"><a href="/apply.html#top"> Register</a> </div>
            <div style="clear:both;"></div>
        </div>
        
        <div style="clear:both"></div>
        
    </div>
</div>

<?php
}
?>


<div class="log_tapa" onclick="CerrarLog();"></div>
<div class="log_div">
	<div class="log_int">
    	<div class="log_x" onclick="CerrarLog();">X</div>
           
        
        <div class="log_tit">LOG IN</div>
        <form action="#">
        <input name="name" type="text" class="log_input" placeholder="NAME" id="name" /><br />
        <input name="pass" type="password" class="log_input" placeholder="PASSWORD" id="pass" /><br />
        <input name="" type="button" class="log_submit" value="Log in" onclick="HacerLogin();" /><br />
        </form>
        
        <div id="login_salida" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; margin-top:20px; text-align:center;">
        *Fill all the fields
        </div>

        
        <div class="log_forgot">
        <a href="/forgot.php">Forgot your password? </a><br />
        No account? <a href="/apply.php">Register one!</a>
        </div>
    </div>
</div>


<div class="lc_menu" id="lc_menu">
<ul>
	<li><a href="/checkout/">Shopping Cart</a></li>
	<li><a href="">View profile</a></li>
    <li><a href="#Logout" onclick="Logout();">Logout</a></li>
</ul>
</div>




<div class="lc_menu_dos" id="lc_menu_dos">
<ul>
	<li><a href="/about-us.php">About us</a></li>
	<li><a href="contact-us.php">Contact us</a></li>
    <li><a href="/san-francisco/">San Francisco</a></li>
    <li><a href="/inland-empire/">Inland empire</a></li>
     <li><a href="/apply.php">Apply</a></li>
     <li><a href="/sponsorships.php">Sponsorchips</a></li>
</ul>
</div>


