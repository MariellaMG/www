<?php 
//include("cache.start.php"); 
?>
<?php
include("./admin/includes/mysql_infos.php");
?>
<?php 
$fullpermalink = $_GET["name"];
$name = $_GET["name"];
if(strrpos($name,"/")!=FALSE){
	$producto_permalink = substr($name,strrpos($name,"/")+1);
	$name = substr($name,0,strrpos($name,"/"));
}
$permalink = $name;

	$qt = "SELECT * FROM negocio WHERE permalink = '$permalink' LIMIT 1";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		$id = $row[0];
		$id_negocio = $row[0];
		$negocio = $row[1];
		$calle = $row[2];
		$email = $row[3];
		$emailcontacto = $row[4];
		$longitud = $row[5];
		$latitud = $row[6];
		$streetview = $row[7];
		$id_subtipo = $row[8];
		$telefono = $row[9];
		$paginaweb = $row[10];
		$descripcion = $row[11];
		$rapida = $row[12];
		$domicilio = $row[13];
		$id_paquete = $row[14];
		$thumb = $row[15];
		$internet = $row[16];
		$permalink = $row[17];
		$descdestacado = $row[18];
		$iddestacado = $row[19];
		$keywords = $row[20];
		$esmundial = $row[21];
		$promomundial = $row[22];
		$zoom = $row[23];
		$peso_imagenes = $row[24];
		$optimizado = $row[25];
		$id_editor = $row[26];
		$imagen = $row[27];
		$fotos = $row[28];
		$archivos = $row[29];
		$html = $row[30];
		$panel = $row[31];
		$mesas = $row[32];
		$terraza = $row[33];
		$pantallas = $row[34];
		$wifi = $row[35];
		$velocidad = $row[36];
		$tipos = $row[37];
	}
	if($zoom==0){
		$zoom = 16;
	}
	if($producto_permalink!=""){
		$qt = "SELECT * FROM producto WHERE permalink LIKE '".$producto_permalink."' LIMIT 1";
		$resultt = mysql_query($qt, $db);
		while ($rowt = mysql_fetch_row($resultt)){
			$id = $rowt[0];
			$id_producto = $rowt[0];
			$nombre = $rowt[1];
			$descripcion = $rowt[2];
			$poster = $rowt[5];
		
			$descripcion = utf8_encode($descripcion);
			$nombre = utf8_encode($nombre);
				
			$poster = $imagen;
			
			$tp = strrpos($poster,"/");
			$poster_med = substr($poster,0,$tp+1)."med_".substr($poster,$tp+1);
			
			$tp = strrpos($poster,"/");
			$poster_thumb = substr($poster,0,$tp+1)."thumb_".substr($poster,$tp+1);
		}
	}
?>
<? include('includes/includes.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="<?php echo $negocio["negocio"];?>" />
<meta name="description" content="<?php echo $negocio["calle"]; ?> <?php if($negocio["descripcion"] != ""): ?> - <?php echo splitstring($negocio["descripcion"],200); ?>..<?php endif; ?>" />
<meta name="author" content="<?php echo $global_solo1;?>" />
<meta property="og:latitude" content="<?php echo $negocio["latitud"]; ?>"/>
<meta property="og:longitude" content="<?php echo $negocio["longitud"]; ?>"/>
<meta property="og:street-address" content="<?php echo $negocio["calle"]; ?>"/>
<meta property="og:phone_number" content="<?php echo $negocio["telefono"]; ?>"/>
<?php

$lat = $negocio["latitud"];
$lon = $negocio["longitud"];

?>
<title><?php echo $negocio["negocio"];?> | <?php echo $global_solo;?> </title>

<link rel="image_src" href="http://maps.google.com/maps/api/staticmap?center=<?php echo $lat; ?>,<?php echo $lon; ?>&zoom=15&size=114x86&sensor=false&markers=color:red|<?php echo $lat; ?>,<?php echo $lon; ?>
" />
<?php if($negocio["thumb"] != ""):?>
<link rel="image_src" href="http://<?php echo $global_solo1;?>/archivos/<?php echo $negocio["thumb"];?>" />
<?php else: ?>
<link rel="image_src" href="http://<?php echo $global_solo1;?>/thumbs/thumb.jpg" />
<!-- 
<link rel="image_src" href="http://<?php echo $global_solo1;?>/thumbs/ef1cf64b2d61fec7e7cc3cf2524e22d0.jpg" />
 -->
<?php endif; ?>
<script type="text/javascript" src="/js/galeria/jquery.min.js"></script>
<script type='text/javascript' src='/js/utiles.js'></script>
<script type="text/javascript" src="/js/tools/jquery.scrollTo.js"></script>
<link rel="stylesheet" type="text/css" href="/shadowbox/shadowbox.css">
<script type="text/javascript" src="/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>
<?php include("common_files/add_xfbtml.php"); ?>
	<link href="/js/galeria/galleria.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/css/panel2.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="/js/galeria/jquery.galleria.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability
		
		$('ul.gallery_demo').galleria({
			history   : false, // activates the history object for bookmarking, back-button etc.
			clickNext : true, // helper for making the image clickable
			insert    : '#main_image', // the containing selector for our main image
			onImage   : function(image,caption,thumb) { // let's add some image effects for demonstration purposes
				
				// fade in the image & caption
				if(! ($.browser.mozilla && navigator.appVersion.indexOf("Win")!=-1) ) { // FF/Win fades large images terribly slow
					image.css('display','none').fadeIn(1000);
				}
				//caption.css('display','none').fadeIn(1000);
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// fade out inactive thumbnail
				_li.siblings().children('img.selected').fadeTo(500,0.3);
				
				// fade in active thumbnail
				thumb.fadeTo('fast',1).addClass('selected');
				
				// add a title for the clickable image
				image.attr('title','Next image >>');
			},
			onThumb : function(thumb) { // thumbnail effects goes here
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// if thumbnail is active, fade all the way.
				var _fadeTo = _li.is('.active') ? '1' : '0.3';
				
				// fade in the thumbnail when finnished loading
				thumb.css({display:'none',opacity:_fadeTo}).fadeIn(1500);
				
				// hover effects
				thumb.hover(
					function() { thumb.fadeTo('fast',1); },
					function() { _li.not('.active').children('img').fadeTo('fast',0.3); } // don't fade out if the parent is active
				)
			}
		});
	});
	
	</script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $global_mapkey;?>" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
function load() {
   if (GBrowserIsCompatible()) {
      var map = new GMap2(document.getElementById("map"));   
      map.setCenter(new GLatLng(<?php echo $negocio["latitud"];?>, <?php echo $negocio["longitud"];?>), 16);   
      map.addControl(new GLargeMapControl());
      map.setMapType(G_NORMAL_MAP);
   
      var point = new GPoint (<?php echo $negocio["longitud"];?>, <?php echo $negocio["latitud"];?>);
      var marker = new GMarker(point, {title: "<?php echo $negocio["negocio"];?>"});
      marker.title = "<?php echo $negocio["negocio"];?>";
      map.addOverlay(marker);
	  
	  var map2 = new GMap2(document.getElementById("map2"));   
      map2.setCenter(new GLatLng(<?php echo $negocio["latitud"];?>, <?php echo $negocio["longitud"];?>), 16);   
      map2.addControl(new GLargeMapControl());
      map2.setMapType(G_NORMAL_MAP);
   
      var point = new GPoint (<?php echo $negocio["longitud"];?>, <?php echo $negocio["latitud"];?>);
      var marker = new GMarker(point, {title: "<?php echo $negocio["negocio"];?>"});
      marker.title = "<?php echo $negocio["negocio"];?>";
      map2.addOverlay(marker);
   }
}
//]]>
</script>
	<style media="screen,projection" type="text/css">
	
	/* BEGIN DEMO STYLE */
	*{margin:0;padding:0}
	.caption{font-style:italic;color:#887;}
	.demo{position:relative;margin-top:2em;text-align:center;color:#bba;font:80%/140% georgia,serif;}
	.gallery_demo{width:702px;margin:0 auto;}
	.gallery_demo li{width:68px;height:50px;border:3px double #111;margin: 0 2px;background:#000;}
	.gallery_demo li div{left:240px}
	.gallery_demo li div .caption{font:italic 0.7em/1.4 georgia,serif;display:none;}
	
	#main_image{margin:0 auto 0px auto;width:700px;}
	#main_image img{margin-bottom:10px; margin-top:5px;}
	
	.nav{padding-top:15px;clear:both;font:80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
	
	.info{text-align:left;width:700px;margin:0px auto;border-top:0px dotted #221;padding-top:0px;}
	.info p{margin-top:0px;}
	
    </style>

<style type="text/css">
.requerido {
	background-image:url(requerido.gif); 
	background-position:top left; 
	background-repeat:no-repeat; 
	padding-left:20px; 
	color:#FFDE00; 
	font-size:13px; 
	border:none; 
	height:18px; 
	padding-top:2px;
	display:none;
}
.h1,.h2,.h3{

	color: #FFDE00;
	font-size: 2.4em;

	border-radius: 5px;-moz-border-radius: 5px;
-webkit-border-radius: 5px;


	display: inline;
	background-color: #000000;
	padding-top: 5px;
	padding-right: 20px;
	padding-bottom: 5px;
	padding-left: 9px;
	margin-bottom: 10px;

}
</style>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="../js/pngfix.js"></script>
<link href="../styles/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link href="/styles/main.css" rel="stylesheet" type="text/css" />
<link href="/js/jquery-galleryview-2.0/galleryview.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	font-size: 1.6em;
	font-weight: bold;
	letter-spacing: -1px;
}
-->
</style>

<script>
<?php
if($id==""){ $id = 11; }
?>
if (navigator.userAgent.indexOf('iPhone') != -1) {
window.location = "/iphone_negocio.php?id=<?php echo $id; ?>";
}
if (navigator.userAgent.indexOf('berry') != -1) {
window.location = "/iphone_negocio.php?id=<?php echo $id; ?>";
}
if (navigator.userAgent.indexOf('ipod') != -1) {
window.location = "/iphone_negocio.php?id=<?php echo $id; ?>";
}
</script>
<script src="/js/amor-placer-y-sexo.js" type="text/javascript"></script>
<script>
function P2Foto(t_img){
	//alert(t_img);
	$("#p2foto").attr("src",t_img);
}
</script>
</head>


<body onload="load();" >
<div id="amor" style="width:199px; height:172px; position:absolute; z-index:11; margin-top:300px;">
<a href="http://amorplacerysexo.com/?s=solocondesa" target="_blank"><img src="/amor-placer-y-sexo-com/amor-placer-y-sexo.png" width="199" height="172" /></a>
</div>   
<a rel="author" href="http://sebastianaguilar.me/" style="display:none;">Sebastián Aguilar</a>     
<!-- Start header -->
<?php include("common_files/header.php"); ?>  
<div class="clearer"></div>
<!-- End head -->

<div class="mainpageholder">
  <div id="leftpanel">
<div class="mainleft">
  <div id="sidenav">
  
<ul>
	<?php foreach($tipos as $tipo):?>
	<h2>
		<li>
			<?php if(!esCat($tipo["id_tipo"]) && !esPadre($tipo["id_tipo"])):?>
			<a href="../directorio/<?php echo $tipo["permalink"];?>" title="<?php echo $tipo["tipo"];?>"><?php echo $tipo["tipo"];?></a>
			<?php else: $arrSubs = getSubs($tipo["id_tipo"]); ?>
			<a href="../directorio/<?php echo $tipo["permalink"];?>" class="active" title="<?php echo $tipo["tipo"];?>"><?php echo $tipo["tipo"];?></a>
			<?php foreach($arrSubs as $sub):?>
			<ul class="subnivel">
				<li>
					<?php if(!esCat($sub["id_tipo"])):?>
					<a href="../directorio/<?php echo $sub["permalink"];?>" title="<?php echo $sub["tipo"];?>"><?php echo $sub["tipo"];?></a>
					<?php else: ?>
					<a href="../directorio/<?php echo $sub["permalink"];?>" class="active" title="<?php echo $sub["tipo"];?>"><?php echo $sub["tipo"];?></a>
					<?php endif;?>
				</li>
			</ul>			
			<?php endforeach;?>
			<?php endif;?>
        </li>
	</h2>
	<?php endforeach;?>
</ul>
</div>
  

 </div>
 
 
 
 <div id="botpage2">
 
 

 </div><!-- mainleft -->
<!-- linksleft -->



</div><!-- left panel -->

<div class="mainright2" style="width:765px;">


  <div style="background-color:#FFF; width:728px; height:90px; margin-left:30px; margin-top:20px; margin-bottom:20px; border:solid 2px #FFF; ">    
  <script type="text/javascript"><!--
google_ad_client = "ca-pub-4652852896680402";
/* Solocondesa1 */
google_ad_slot = "7358514629";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
  </div>


<?php 


if($panel==2){

?>
<h1 class="h1" itemprop="name"><?php echo $negocio["negocio"];?></h1>
<div class="p2bimg">
    <div class="p2bimga">
    <img src="<?php echo $imagen; ?>" width="650">
    </div>
    <div class="p2bimgb">
    <div id="map2" style="width:120px; height: 420px"></div>
    </div>
    <div class="p2clr"></div>
</div>

<?php
}else{
?>
<div class="mainimage">
<?php if(esCat(117)):?>
<img src="../archivos/ecogrande.jpg" width="752" />
<?php else:?>
<?php if(!empty($negocio["streetview"])):?>
<iframe width="752" height="337" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $negocio["streetview"];?>&output=svembed"></iframe>
<?php else:?>
<iframe width="752" height="337" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="../streetError.php"></iframe>
<?php endif;?>
<?php endif;?>
<?php /*
<?php if(!empty($negocio["streetview"])):?>
<iframe width="752" height="337" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $negocio["streetview"];?>&output=svembed"></iframe>
<?php else:?>
<iframe width="752" height="337" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="./streetError.php"></iframe>
<?php endif;?>
*/?>
</div><br /><br />
<?php } ?>

<div class="eventcontentright" itemscope itemtype="http://schema.org/LocalBusiness">

<meta itemprop="maps" content="http://maps.google.com/maps/api/staticmap?center=<?php echo $lat; ?>,<?php echo $lon; ?>&zoom=15&size=320x240&sensor=false&markers=color:red|<?php echo $lat; ?>,<?php echo $lon; ?>" />

<meta itemprop="image" content="http://<?php echo $global_solo1;?>/archivos/<?php echo $negocio["thumb"];?>" />

<p itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
    <meta itemprop="latitude" content="<?php echo $lat; ?>" />
    <meta itemprop="longitude" content="<?php echo $lon; ?>" />
  </p>


<h1 class="h1" itemprop="name"><?php echo $negocio["negocio"];?></h1><br /><br /><br />

<p><b>Dirección: </b><?php echo $negocio["calle"];?></p>

<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    <span itemprop="streetAddress"><?php echo $negocio["calle"];?></span><br />
    <span itemprop="addressLocality">Condesa</span>
    <meta itemprop="addressRegion" content="DF" />
    <meta itemprop="addressCountry" content="México" />
  </p>

<?php if(!empty($negocio["email"])):?>
<p><b>Email: </b><?php echo $negocio["email"];?></p>
<?php endif; ?>
<?php if(!empty($negocio["telefono"])):?>
<p itemprop="telephone"><b>Teléfono: </b><?php echo $negocio["telefono"];?></p>
<?php endif; ?>
<?php if(!empty($negocio["paginaweb"])):?>
<?php

if(substr($negocio["paginaweb"],0,3)=="www"){
	$negocio["paginaweb"] = "http://".$negocio["paginaweb"];
}

 ?>
<p><b>Pagina web: </b><span itemprop="url"><a href="<?php echo $negocio["paginaweb"];?>" target="_blank"><?php echo $negocio["paginaweb"];?></a></span></p>
<?php endif; ?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<?php if(!esCat(117)):?>
<h1 class="h1">Descripción</h1>
<p>&nbsp;</p>
<?php if(empty($negocio["descripcion"])):?>
<p>De momento este elemento no cuenta con una descripción, <br/>puedes dar click en <a href="../contacto/">contacto</a> para solicitar un ingreso de la misma.
<br />
Si eres dueño de éste negocio y deseas actualizar ésta información, contactanos a info@solocondesa.com

</p>
<br />
<!-- 
<p><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Compartir</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></p>
 -->
<?php else:?>
<p itemprop="description"><?php echo nl2br($negocio["descripcion"]);?></p>
<?php endif;?>

<?php if($negocio["id_paquete"] >= 2):?>
<br />
<p><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Compartir</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></p>
<?php endif; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php endif;?>

<p itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
    <meta itemprop="latitude" content="<?php echo $lat; ?>" />
    <meta itemprop="longitude" content="<?php echo $lon; ?>" />
  </p>

<?php if($panel==2 && $producto_permalink==""){ ?>

<h2 class="eventdetailsubhead">Galería</h2>

<div class="p2gl">
<div class="p2glt">
<?php 
$lasfotos = explode(",",$fotos);
$c=0;
foreach ($lasfotos as $valor) {
	$c++;
	$poster = $valor;
    $tp = strrpos($poster,"/");
	$poster_med = substr($poster,0,$tp+1)."med_".substr($poster,$tp+1);
		
	$tp = strrpos($poster,"/");
	$poster_thumb = substr($poster,0,$tp+1)."thumb_".substr($poster,$tp+1);
	
	echo "<img src='$poster_thumb' onclick='P2Foto(".'"'.$poster.'"'.");'>";
}
?>
</div>
<div class="p2glf">
<img src="<?php echo $imagen; ?>" id="p2foto">
</div>
</div>

<?php }else{ ?>
<?php if(!empty($imagenes)):?>
<div itemprop="photos" itemscope itemtype="http://schema.org/Photograph">
  <h2 class="eventdetailsubhead">Galería</h2><br /><br />
  
<div class="demo" style="height:520px; width:710px; background-color:#ffffff; overflow:hidden;">
<div id="main_image"></div>
<ul class="gallery_demo_unstyled">
<?php $x = 1; foreach($imagenes as $imagen):?>
<?php if($x === 1):?>
<li class="active"><img src="../archivos/<?php echo $imagen["imagen"];?>" itemprop="image" ></li>
<?php else:?>
<li><img src="../archivos/<?php echo $imagen["imagen"];?>" itemprop="image" ></li>
<?php endif;?>
<?php $x++; endforeach;?>
</ul>
</div>
<p>&nbsp; </p>
</div>
<?php endif;?>
<?php } ?>













<?php
if($producto_permalink!=""){
	$qt = "SELECT * FROM producto WHERE permalink LIKE '".$producto_permalink."' LIMIT 1";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		//echo utf8_encode($rowt[0]);
		$id = $rowt[0];
		$id_producto = $rowt[0];
		$nombre = $rowt[1];
		$descripcion = $rowt[2];
		$permalink = $rowt[3];
		$html = $rowt[4];
		$imagen = $rowt[5];
		$fotos = $rowt[6];
		$archivos = $rowt[7];
		$id_editor = $rowt[8];
		$negocios = $rowt[9];
		
		$descripcion = utf8_encode($descripcion);
		$nombre = utf8_encode($nombre);
			
		$poster = $imagen;
		
		$tp = strrpos($poster,"/");
		$poster_med = substr($poster,0,$tp+1)."med_".substr($poster,$tp+1);
		
		$tp = strrpos($poster,"/");
		$poster_thumb = substr($poster,0,$tp+1)."thumb_".substr($poster,$tp+1);
	}
?>
<div class="clearer"></div>
<a name="detalle" id="detalle"></a>

<br /><br /><br />
<h1 class="h1"><?php echo $nombre; ?></h1>
<div style="background:#000; width:660px; padding:10px;">
<img src="<?php echo $imagen; ?>" width="640" />
<p style="color:#FFF; font-size:13px;">
<br />
<?php echo nl2br($descripcion); ?></p>
<br /><br />
</div>
<?php
}
?>






<?php

$qt = "SELECT count(*) FROM producto WHERE negocios LIKE '".$negocio["id_negocio"]."' OR negocios LIKE '".$negocio["id_negocio"].",%' OR  negocios LIKE '%,".$negocio["id_negocio"]."'";
$resultt = mysql_query($qt, $db);
$cont=0;
while ($rowt = mysql_fetch_row($resultt)){
	$cont = $rowt[0];
}
if($cont>0){
?>
<div class="clearer"></div>
<br /><br /><br />
<h1 class="h1">Productos de <?php echo $negocio["negocio"];?></h1>

<div>
<?php

$qt = "SELECT * FROM producto WHERE negocios LIKE '".$negocio["id_negocio"]."' OR negocios LIKE '".$negocio["id_negocio"].",%' OR  negocios LIKE '%,".$negocio["id_negocio"]."' ORDER BY id_producto DESC LIMIT 20";
$resultt = mysql_query($qt, $db);
while ($rowt = mysql_fetch_row($resultt)){
	//echo utf8_encode($rowt[0]);
	$id = $rowt[0];
	$id_producto = $rowt[0];
	$nombre = $rowt[1];
	$descripcion = $rowt[2];
	$permalink = $rowt[3];
	$html = $rowt[4];
	$imagen = $rowt[5];
	$fotos = $rowt[6];
	$archivos = $rowt[7];
	$id_editor = $rowt[8];
	$negocios = $rowt[9];
	
	$descripcion = utf8_encode($descripcion);
	$nombre = utf8_encode($nombre);
		
	$poster = $imagen;
	
	$tp = strrpos($poster,"/");
	$poster_med = substr($poster,0,$tp+1)."med_".substr($poster,$tp+1);
	
	$tp = strrpos($poster,"/");
	$poster_thumb = substr($poster,0,$tp+1)."thumb_".substr($poster,$tp+1);
?>


 <div class="eventlistbox">
        <div class="eventlistphoto">
           <div class="eventlistimage" style="width:180px; height:120px; overflow:hidden;">
           <a href="/visita/<?php echo $negocio["permalink"]."/".$permalink;  ?>#detalle">
           <img src="<?php echo $poster_med; ?>" alt="<?php echo $nombre; ?>" name="<?php echo $nombre; ?>" title="<?php echo $nombre; ?>" width="180" border="0" />
           </a>
           </div>
          <div class="eventlistimagebot"></div>
        </div>
        <div class="eventlisttext">
          <div class="producer">
          <a href="/visita/<?php echo $negocio["permalink"];  ?>">
          <?php echo $negocio["negocio"]."</a> - ".$negocio["calle"]; ?>  <br />
          </div>
          <br />
          <h1>
          <a href="/visita/<?php echo $negocio["permalink"]."/".$permalink;  ?>#detalle">
		  <?php echo $nombre; ?>
          </a>
          </h1>
<br />
<p class="MsoNormal" style="margin: 0cm 0cm 0pt;"><?php echo substr($descripcion,0,150)."..."; ?></p>
          <ul>
                                  </ul>
        </div>
        <div class="clearer"></div>
      </div>
      

<?php } ?>
<div class="clearer"></div>

</div>
<br /><br />
<?php } ?>

























  <h2 class="eventdetailsubhead">Google Map</h2><br /><br />
  
  
  
  
<div class="eventlistbox">
    
    <div id="map" style="width:730px; height: 400px"></div>
  
    
    
   
    <div class="clearer"></div>
  </div>

 




<p>&nbsp; </p>
      


  
  
  
<?php if(!empty($negocio["emailcontacto"])):?>  
<div class="eventlistbox">

<style type="text/css">

td.contacto_left{
	font-size:20px;
	text-align:right;
}
input.contacto_right{
	width:300px;
	padding:5px;
	font-size:20px;
}
.tdheight_contact{
	width:100%;
	height:100px;
}
.tdwidth_contact{
	width:10px;
}
.btn_contact_send{
	background:black;
	color:#FFCB00;
	font-size:20px;
	padding:5px;
	font-weight:bold;
}
.btn_contact_send:hover{
	background:gray;
	cursor:pointer;
}
</style>

	<p id="contacto"><br />
	<h2 class="eventdetailsubhead">Contacta a <?php echo $negocio["negocio"];?></h2><br /><br />
	  </p>
	<p>
	  Completa el formulario y envíanos tus dudas o comentarios.<br />
	  <br />
	  </p>
	  <form id="form_negocio" name="contacto" method="post">
	  <table>
	  <tr class="contacto">
			<td width="78" class="contacto_left" >Nombre: </td>
			<td width="6" class="tdwidth10"></td>
			<td width="302"><input id="nombre" type="text" class="contacto_right" name="nombre"/></td>
            <td width="141">
            
            <div id="dnombre" class="requerido">
            *Campo requerido
            </div>
            
            </td>
		</tr>
		<tr>
			<td><br/></td>
		</tr>
		<tr class="contacto">
			<td class="contacto_left" >Email: </td>
			<td class="tdwidth_contact"></td>
			<td><input type="text" id="email" class="contacto_right" name="email"/></td>
            <td>
            <div id="demail" class="requerido">
            *Campo requerido
            </div>
            </td>
		</tr>
		<tr>
			<td><input type="hidden" name="id_negocio" value="<?php echo $negocio["id_negocio"];?>" /></input></td>
		</tr>
		<tr class="contacto">
			<td class="contacto_left" >Comentario: </td>
			<td class="tdwidth"></td>
			<td><textarea id="comentario" rows="10" style="	font-size:20px; padding:5px; width:300px; " name="comentario"></textarea></td>
            <td>
            
            <div id="dcomentario" class="requerido">
            *Campo requerido
            </div>
            
            </td>
		</tr>
		<tr>
			<td><br/></td>
		</tr>
		<tr class="contacto">
			<td class="contacto_left" ></td>
			<td class="tdwidth10"></td>
			<td><input type="button" value="Enviar" class="btn_contact_send" onclick="validar_negocio()" /></td>
            <td></td>
		</tr>
	</table>
	</form>
	<br /><br />
  </div>
<p>&nbsp; </p>
 
<?php endif;?>  



  

<div class="clearer"></div>



</div>
  <div class="clearer"></div>
<div class="topevents"></div>


</div><!--mainright2-->
</div>

</div><!-- center -->

<div class="fullcentre">
  <!-- homebox -->
</div>
<!-- fullcentre -->



<div class="clearer"></div>



</div><!-- closes main -->


<!-- Start footer -->
<?php include("common_files/footer.php"); ?>
<!-- End footer -->




</div><!-- this closes contents -->


<?php
include ("common_files/analytics.php");
?>

</body>
</html>
<?php include("cache.end.php"); ?>