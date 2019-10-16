<?php
include("../admin/includes/mysql_infos2.php");
?>
<?php
	$key = $_GET['key'];
	$qt = "SELECT * FROM producto WHERE permalink LIKE '$key' ";
	//echo $qt;
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
	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $nombre; ?> | Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/productos.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheetmd.css">
 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/home.js"></script>
  <script src="../js/productos.js"></script>
</head>

<body>

<div class="logo" id="logo">
<a href="/">
<img src="/logos_alta/molca-blanco-back.png" width="100%"  />
</a>
</div>

<div class="header" id="header">
	<div class="header1" id="header1">
        <div class="header2" id="header2">
        
       	  <div class="aboutus" id="aboutus">
            	<div id="aboutus_div">
                <a href="../about-us.html#top">
                <img src="/images/menu_aboutus.png" width="80%" class="img_icon"  /> 
                </a>
                </div>
        	</div>
            
          <div class="contactus" id="contactus">
            	<div id="contactus_div">
                <a href="../contact-us.html#top">
                <img src="/images/menu_contact.png" width="80%" class="img_icon"  /> 
                </a>
                </div>
        	</div>
            
          <div class="molcajetenig" id="molcajetenig" onmouseover="VerNoche();" onmouseout="VerDia();">
            	<div id="molcajetenig_div">
                <a href="/molcajete-nights/#top">
                <img src="/images/menu_molcajete.png" width="80%" class="img_icon"  /> 
                </div>
                </a>
        	</div>
        
        
      </div>
	</div>
</div>

<a name="top" id="top"></a>



<div class="losproductos">
	
    <?php
	
	$qt = "SELECT * FROM producto WHERE permalink LIKE '$key' LIMIT 1 ";
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
    
	<div class="elproducto" style=" background-image:url(<?php echo $imagen; ?>);" id="ppd<?php echo $id; ?>"
     onmouseover="VerCCP('ppd<?php echo $id; ?>','ppdt<?php echo $id; ?>');" onmouseout="VerCCP_out('ppd<?php echo $id; ?>','ppdt<?php echo $id; ?>');" >
        <a href="/productos/<?php echo $permalink; ?>#top" class="elproducto_titulo_a">
            <div class="elproducto_all" >
                <div class="elproducto_titulo" id="ppdt<?php echo $id; ?>" >
                    <?php echo $nombre; ?>
                </div>
            </div>
        </a>
    </div>
    
    <?php
	}
	?>
    
    <div class="elproductodetalle">
    
        <h1><?php echo $nombre; ?></h1>
        
        <div class="elproductodetalle_txt">
        	<?php
			echo nl2br($descripcion);
			?>
        </div>
    
    	<div class="elproductodetalle_html">
        	<?php
			echo $html;
			?>
        </div>
    
    	<div class="clr"></div>
    
    </div>
    

</div>






<div class="productos">
	
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
            <div class="producto_all" >
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
    Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in lobortis malesuada
    </div>
    
    <div class="join_circulos">
    	
        <div class="join_circulo">
            <a href="#fr">
            JOIN <br /> OUR FAM
            </a>
        </div>
         <div class="join_circulo" style="float:right !important;">
            <a href="#fr">
            SPREAD <br /> THE WORD
            </a>
        </div>
        <div class="clr"></div>
        
    </div>
    
</div>




	
    <div class="vendors">

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
				<h3>Nam fermentum nulla</h3> 
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
			</div>
			<div class="text2">
				<h3>Nam fermentum nulla</h3> 
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
			</div>
			<div class="text3">
				<h3>Nam fermentum nulla</h3> 
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
				<p id="nfn">Nam fermentum nulla</p>
			</div>
			<div> <img src=""></div>
			<div style="clear: both;"></div>
		</div>
		<div class="finalbar">
			<div class="minizq"> <p>30 amet, consectetur adipiscing elit. Nam fermentum  nulla lobortis st feugiat</p></div>
			<div class="minder"> <p>Nam fermentum  nulla lobortis st feugiat</p></div>
			<div style="clear: both;"></div>
		</div>
	</div>


</body>

</html>
