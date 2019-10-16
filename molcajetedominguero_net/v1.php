<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/stylesheetmd.css">
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/home.js"></script>
</head>

<body>

<div class="logo" id="logo">
<img src="logos_alta/molca-blanco-back.png" width="100%"  />
</div>

<div class="header" id="header">
	<div class="header1" id="header1">
        <div class="header2" id="header2">
        
       	  <div class="aboutus" id="aboutus">
            	<div id="aboutus_div">
                <img src="/images/menu_aboutus.png" width="80%" class="img_icon"  /> 
                </div>
        	</div>
            
          <div class="contactus" id="contactus">
            	<div id="contactus_div">
                <img src="/images/menu_contact.png" width="80%" class="img_icon"  /> 
                </div>
        	</div>
            
          <div class="molcajetenig" id="molcajetenig">
            	<div id="molcajetenig_div">
                <img src="/images/menu_molcajete.png" width="80%" class="img_icon"  /> 
                </div>
        	</div>
        
        
      </div>
	</div>
</div>

<img src="v1/dom_d1_7.png" width="100%" />

<img src="v1/dom_d1_2.jpg" width="100%" />

<div class="productos">
	
    <?php
	for($i=1;$i<13;$i++){
	?>
    
	<div class="producto" style=" background-image:url(imagenes_test/md4_<?php echo $i; ?>.png);" id="pd<?php echo $i; ?>"
     onmouseover="VerCC('pd<?php echo $i; ?>','pdt<?php echo $i; ?>');" onmouseout="VerCC_out('pd<?php echo $i; ?>','pdt<?php echo $i; ?>');" >
        <a href="#hola" class="producto_titulo_a">
            <div class="producto_all" >
                <div class="producto_titulo" id="pdt<?php echo $i; ?>" >
                    Titulo del producto
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




	<div class="md6">
		<div class="titulnos"> <a name="sobrenos"></a>
			<img src="/molcajetedomborrador3/nosotros.png" class="nosotros" >
		</div>

		<div class="nos1">
			<div class="izquierda1">
			    <div class="li1">
			    	<img src="/molcajetedomborrador3/md6_1.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
			<div class="derecha1">
				<div class="li2">
			    	<img src="/molcajetedomborrador3/md6_2.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
			<div style="clear: both;"></div>
		</div>

		<div class="nos2">
			<div class="izquierda2">
			    <div class="li3">
			    	<img src="/molcajetedomborrador3/md6_3.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
			<div class="derecha2">
				<div class="li4">
			    	<img src="/molcajetedomborrador3/md6_4.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
		</div>
		<div class="nos3">
			<div class="izquierda3">
			    <div class="li5">
			    	<img src="/molcajetedomborrador3/md6_5.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
			<div class="derecha3">
				<div class="li6">
			    	<img src="/molcajetedomborrador3/md6_6.png">
		    	</div>
			    <div>
				    <p class="nombre">Lorem Ipsum</p>
				    <p class="descripcion">30 amet, Consectetur adipiscing elit. Nam fermentum nulla lobortis est feugiat, vel ornane lorem aliquam. Ut tincidunt, enim in </p>
			    </div>
			    <div style="clear: both;"></div>
			</div>
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
