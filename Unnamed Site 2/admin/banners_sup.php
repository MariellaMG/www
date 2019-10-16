<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>

<?php



function Flash_inc($t_f,$t_n,$t_l){
	return '<a href="'.$t_l.'" target="_blank">
	<object id="FlashIDx'.$t_n.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="246" height="76">
  <param name="movie" value="'.$t_f.'">
  <param name="quality" value="high">
  <param name="wmode" value="opaque">
  <param name="swfversion" value="6.0.65.0">
  
  <param name="expressinstall" value="../Scripts/expressInstall.swf">
  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  <!--[if !IE]>-->
  <object type="application/x-shockwave-flash" data="'.$t_f.'" width="246" height="76">
    <!--<![endif]-->
    <param name="quality" value="high">
    <param name="wmode" value="opaque">
    <param name="swfversion" value="6.0.65.0">
    <param name="expressinstall" value="../Scripts/expressInstall.swf">
    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
  
    <!--[if !IE]>-->
  </object>
  <!--<![endif]-->
</object>
</a>
<script type="text/javascript">
swfobject.registerObject("FlashIDx'.$t_n.'");
</script>';
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Panel de administración</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        <link rel="stylesheet" href="css/reset.css" />
        
        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="css/style.css" />

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="css/jqueryui/jqueryui.css" />
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->
        <link rel="stylesheet" href="js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>

        
        
        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script type="text/javascript" src="js/tooltipsy.min.js"></script>
        
        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script type="text/javascript" src="js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="js/excanvas.js"></script>
        
        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script type="text/javascript" src="js/zoombox/zoombox.js"></script>

        <link rel="stylesheet" href="js/zoombox/zoombox.css" />
        
        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script type="text/javascript" src="js/visualize.jQuery.js"></script>
        
        <!-- Uniform - http://uniformjs.com/ -->
       <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
});


function Hide(t_id){
	$("#"+t_id).hide("slow");
}

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar este banner?")){
		$.get("banner_eliminar_get.php?id="+t_id, function(data){
			$("#linea"+t_id).hide("slow");
		});
	}else{
		
	}
}

</script>
        
    </head>

    <body class="white">
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                <a href="#">Administrador</a>
                |
                <a href="logout.php">Logout</a>

            </div>
            <div class="right">
                <form action="#" id="search" class="search placeholder">
                    <label></label>
                    <input type="text" value="<?php echo $_GET['q']; ?>" name="q" class="text"/>
                    <input type="submit" value="rechercher" class="submit"/>
                </form>
            </div>

        </div>
                
                
        <!--            
                SIDEBAR
                         --> 
        <div id="sidebar">
        
<?php	include "menu.php"; ?>


        </div>
                
                
                
                
        <!--            
              CONTENT 
                        --> 
        <div id="content">
          <h1><img src="img/icons/edit.png" alt="" />Banners 
</h1>
           
          
           <?php if($_GET['q']!=""){	echo "<h1><b>buscando:</b> '".$_GET['q']."'</h1>";		} ?>
                
                

<div class="bloc">
    <div class="title">
        Listado
    </div>
    <div class="content">
        
        
   
        
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                        <td>Nombre</td>
    <td>Descripcion</td>
    <td>Liga</td>
    <td>Posicion</td>
    <td>Banner</td>
    
    <td>Eliminar</td>
    
                </tr>
            </thead>

            <tbody>
            
 
       
       
        <?php

$q = "SELECT * FROM banner ORDER BY posicion";

$result = mysql_query($q, $db);

$num = 1;

$cont =0;
while ($row = mysql_fetch_row($result)){
	
	$cont++;
	
	$flash = $row[1];
	
	
	if($num==1){ $num = 2; }else{	$num=1;	}
	
	
	echo "<tr class='tabla_linea$num' id='linea".$row[0]."'>
";

echo '	<td>&nbsp;</td>
	';
	
	echo '	<td>'.$row[7].'</td>
	';
	
	echo '	<td>'.substr($row[6],0,40).'...</td>
	';
	
	echo '	<td><a href="'.$row[3].'" target="_blank">'.$row[3].'</a></td>
	';
	
	echo '	<td>'.$row[5].'</td>
	';
	
	if($flash==0){
		echo "	<td><img src='../".$row[2]."' /> </td>\n";
	}else{
		echo "<td>".Flash_inc("../".$row[2],$cont,$row[3]),"</td>";
	}
	
	
	
	
	?>
    
    <td ><a href="#" title="Eliminar" onClick="Eliminar('<?php echo $row[0]; ?>');"><img src="img/icons/delete.png" alt="" /></a></td>
    
    <?php
	
	echo "</tr>
";
	
}




?>
                         
                         
                               
                            </tbody>

        </table>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</div>





<h1>&nbsp;</h1>
<h1>&nbsp;</h1></div>
        
        
    </body>
</html>