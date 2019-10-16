<?php
include("../admin/includes/mysql_infos2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Molcajete Dominguero</title>
<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:700|Nanum+Gothic|Titan+One|Passion+One|Lilita+One" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheetmd.css">
<link rel="stylesheet" type="text/css" href="../css/sf.css">

 <script src="../js/jquery-1.10.2.js"></script>
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

<div class="sf_header">

	<div class="sf_header1" id="sf_header1">
        <div class="sf_header2" id="sf_header2">
        
			<div class="sf_header_tit">MOLCAJETE SAN FRANCISCO</div>
            
            <div class="sf_imgs_tres">
            	<div class="sf_img3">
                	<img width="100%" src="/uploaded/1531086417.jpg">
                </div>
                <div class="sf_img3">
                	<img width="100%" src="/uploaded/1531086417.jpg">
                </div>
                <div class="sf_img3">
                	<img width="100%" src="/uploaded/1531086417.jpg">
                </div>
                <div class="clr"></div>
            </div>
            
              <div class="sf_imgs_dos">
            	<div class="sf_img3">
                	<img width="100%" src="/uploaded/1531086417.jpg">
                </div>
                <div class="sf_img3">
                	<img width="100%" src="/uploaded/1531086417.jpg">
                </div>
                <div class="clr"></div>
            </div>
            
            
             <div class="sf_location">
            
            	<div class="sf_mapa_tit">
                LOCATION
                </div>
            	
            	<div>
                    <div class="sf_mapa">
                        <div id="map_canvas" style="background:#F00; width:150px; height:120px;">
                            
                        </div>
                    </div>
                    <div class="sf_mapa_txt">
                        <div class="sf_mapa_txt_int">
                            30 amet, <br />
                            consectetur adipiscing elit. <br />
                            Nam fermentum nulla
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            
            
            
            <div class="sf_text">
            	<div class="sf_pre">
            		Are you an artisan that's is looking to for a place to sell your products.
                </div>
                
                <br />
                
                <div class="sf_btn">
                	<a href="http://molcajetedominguero.net/apply.html#top">
                	APPLY
              	  </a>
                </div>
                
            </div>
            

		</div>
	</div>
    

</div>






</body>

</html>
