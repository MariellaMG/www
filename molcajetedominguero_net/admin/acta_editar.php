<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>
<?php
include("usuariologin.php");
?>


<?php

$mes[1] = "Enero";
$mes[2] = "Febrero";
$mes[3] = "Marzo";
$mes[4] = "Abril";
$mes[5] = "Mayo";
$mes[6] = "Junio";
$mes[7] = "Julio";
$mes[8] = "Agosto";
$mes[9] = "Septiembre";
$mes[10] = "Octubre";
$mes[11] = "Noviembre";
$mes[12] = "Diciembre";

$fecha = date("j")." de ".$mes[date("n")]." de ".date("Y");


		$id= $_GET['id'];

		$qt = "SELECT * FROM acta WHERE id_acta = $id";
		
	
	
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$acta = $rowt[1];
		$fecha = $rowt[2];
		$permalink = $rowt[3];
		$referencia = $rowt[4];
		$tomo = $rowt[5];
		$fecha = $rowt[6];
		$hojas = $rowt[7];
		$sesion = $rowt[8];
		$presidente = $rowt[9];
		$ano = $rowt[10];
		$asunto = $rowt[11];
		$anexo = $rowt[12];
		$observaciones = $rowt[13];
		
		$imagen = $rowt[18];
		$video = $rowt[19];
		$archivo = $rowt[20];
		
		
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
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        <script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
     <?php include "forms.php"; ?>
        
       <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
});

function Eliminar(t_id){
	
	if(confirm("Estas seguro que deseas borrar este negocio?")){
		$.get("negocio_eliminar_get.php?id="+t_id, function(data){
			$("#"+t_id).hide();
		});
	}else{
		
	}
}
function Hide(t_id){
	$("#"+t_id).hide("slow");
}

function Validar(){
	
	error = 0;
	
	if($("#nombre").val()==""){
		error = 1;
		$("#nombre").css("border-color","#ff0000");
	}else{
		$("#nombre").css("border-color","#000000");
	}
	

	if($("#imagen").val()==""){
		error = 1;
		$("#div_imagen").css("border-color","#ff0000");
	}else{
		$("#div_imagen").css("border-color","#ffffff");
	}	
	
	
	if($("#categoria").val()=="0"){
		error = 1;
		$("#categoria").css("border-color","#ff0000");
		$("#categoria").css("background-color","#ff0000")
	}else{
		$("#categoria").css("border-color","#000000");
		$("#categoria").css("background-color","#ffffff")
	}
	
	
	
	$('textarea').each(function(index) {
    	//alert(index + ': ' + $(this).text());
		if($(this).val()==""){
			error=1;
			$(this).css("border-color","#ff0000");
		}else{
			$(this).css("border-color","#000000");
		}
  	});	
	
	
	
	if(error==1){
		$("#error").show();
	}else{
		$("#error").hide();
		$("#form1").submit();
	}
}

var frames_d;
var server = "http://michoacan.uno/";

function terminaUpload(t_t,e_e){
	//alert(t_t+"  "+e_e);
	
	//var tipo=substr(1,e_e);
	var str = "Hello world!";
	var res = e_e.substr(1);
	
	if(e_e!=".jpg"){
		
		icono = "<a href='"+server+"uploaded/"+t_t+e_e+"' target='_blank'><img src='"+server+"iconos/"+res+".png'  width='160'  /></a>";
		nombre = t_t+e_e;
		losframes = '<table width="160" style="width:160px !important; border:solid 1px #999;" border="0" cellspacing="0" cellpadding="0"><tr align="center"><td align="center">'+icono+'</td></tr><tr align="center"><td align="center">'+nombre+'</td></tr></table>';
		
		frames_d = "<img src='"+server+"iconos/"+res+".png'  width='160'  />"+t_t+e_e;
		
		$("#thumb").append(losframes);
		if($("#imagen").val()==""){
			$("#imagen").val(t_t+""+e_e);
		}
		$("#archivos").val( $("#archivos").val()+t_t+e_e+","  );
	}else{
		frames_d = "<img src='"+server+"uploaded/"+t_t+".jpg'  width='160'  />";
		$("#thumb").append(frames_d);
		if($("#imagen").val()==""){
			$("#imagen").val(t_t+""+e_e);
		}
		$("#archivos").val( $("#archivos").val()+t_t+e_e+","  );
	}
	
	
	
	//$("#seleccionadas").show();
	$("#cancelar").show();	
}

function Cancelar(){
	frames_d="";
	$("#thumb").html("");
	$("#imagen").val("");
	$("#cancelar").hide();	
}

//ExternalInterface.call("terminaUploadAll",timestamp,extension,"http://nice-n-easy.co/archivos/");

function terminaUploadAll(t_time,t_ext,t_server){
	
	t_ext = t_ext.substr(1);
	
	frames_d = "<img src='../iconos/"+t_ext+".png'  width='120'  />";
	
	ligas = "";
	
	ligas += ' <video width="320" height="240" autobuffer controls poster="'+$("#imagen").val()+'" >';
	ligas += '<source src="'+t_server+t_time+"."+t_ext+'" type="video/mp4" />';
	ligas += '</video><br/><br/>';
	
	
	$("#thumbs").html(frames_d);
	
	//alert(t_server+t_time+t_ext);

	$("#video").val(t_server+t_time+"."+t_ext);
	//$("#seleccionadas").show();
	
	//$("#cancelar").show();	
}



</script>
        




<script type="text/javascript" src="editor/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.image.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.link.js"></script>
<script type="text/javascript" src="editor/controls/wysiwyg.table.js"></script>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {
		$('#desc').wysiwyg({
		  controls: {
			bold          : { visible : true },
			italic        : { visible : true },
			underline     : { visible : true },
			strikeThrough : { visible : true },
			
			justifyLeft   : { visible : false },
			justifyCenter : { visible : false },
			justifyRight  : { visible : false },
			justifyFull   : { visible : false },

			indent  : { visible : false },
			outdent : { visible : false },

			subscript   : { visible : false },
			superscript : { visible : false },
			
			undo : { visible : true },
			redo : { visible : true },
			
			insertOrderedList    : { visible : false },
			insertUnorderedList  : { visible : false },
			insertHorizontalRule : { visible : false },

			h4: {
				visible: false,
				className: 'h4',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
				tags: ['h4'],
				tooltip: 'Header 4'
			},
			h5: {
				visible: false,
				className: 'h5',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
				tags: ['h5'],
				tooltip: 'Header 5'
			},
			h6: {
				visible: false,
				className: 'h6',
				command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
				arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
				tags: ['h6'],
				tooltip: 'Header 6'
			},
			
			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true },
			html  : { visible: true },
			increaseFontSize : { visible : false },
			decreaseFontSize : { visible : false },
			exam_html: {
				exec: function() {
					this.insertHtml('<abbr title="exam">Jam</abbr>');
					return true;
				},
				visible: false
			}
		  },
		  events: {
			click: function(event) {
				if ($("#click-inform:checked").length > 0) {
					event.preventDefault();
					alert("You have clicked jWysiwyg content!");
				}
			}
		  }
		});

		
	});
})(jQuery);
</script>

<style type="text/css">
.botoncancelar{
	border: 1px solid #3580a9;
    border-radius: 3px;
    box-shadow: 0 1px 5px #b2b2b2;
    color: #d4e6ef;
    cursor: pointer;
    font-weight: bold;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #2c6aa3;
    background:#4C91BE;
}
</style>        
        
</head>

    <body class="white">
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="img/icons/huser.png" alt="" /></a>
                Hola, 
                 <a href="#"><?php echo $login_nombre; ?></a>
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
                
                
                
                
        <!--            <em></em>
              CONTENT 
                        --> 
        <div id="content">
       

<h1><img src="img/icons/posts.png" alt="" />Editar Acta (<?php echo $referencia; ?>)</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">


<form id="form1" method="post" enctype="multipart/form-data" action="acta_editar_form.php">

<input name="imagen" id="imagen" type="hidden" value="<?php echo $imagen; ?>">
<input name="video" id="video" type="hidden" value="<?php echo $video; ?>">

<input name="archivos" id="archivos" type="hidden" value="<?php echo $archivo; ?>">

<input name="id" id="id" type="hidden" value="<?php echo $id; ?>">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
        
      
      

<?php

//echo "<h1>+".strrpos($referencia,',')."+</h1>";

$num=substr($referencia,strrpos($referencia,'C')+1);
$num=substr($num,0,strrpos($num,','));

$ln=substr($referencia,strrpos($referencia,'.')+1);
//$ln=substr($num,0,strrpos($num,','));

?>


         <div class="input medium">
           
            
            <div style="margin-top:10px;">
            <div style="float:left; font-size:20px; margin-right:6px;">AHMM,FAC</div>
            <div style="float:left; width:80px;"><input type="text" id="num1" name="num1" style="width:80px;" value="<?php echo $num; ?>" /></div>
            <div style="float:left; font-size:20px; margin-right:6px; margin-left:3px;">,LN.</div>
            <div style="float:left;"><input type="text" id="num2" name="num2" value="<?php echo $ln; ?>" /></div>
            
            <div style="clear:both;"></div>
            </div>
            
            <input type="hidden" id="referencia" name="referencia" value="<?php echo $referencia; ?>" />
        </div>
        
        <div class="input medium">
            <label for="input2">Tomo</label>
            <input type="text" id="tomo" name="tomo" value="<?php echo $tomo; ?>" />
        </div>
        
         <div class="input medium">
            <label for="input2">Fecha (DD MM AA)</label>
          
            
            <select name="dia" id="dia">
            	
			<?php
			
			
			
            for($i=1;$i<32;$i++){
                //echo utf8_encode($row[0]);
                echo '<option value="'.$i.'">'.$i.'</option>
                ';
            }
            ?>
            </select>
            
            <select name="mes" id="mes">
            	
			<?php
			$meses = array("Enero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            for($i=1;$i<13;$i++){
                //echo utf8_encode($row[0]);
                echo '<option value="'.$i.'">'."[".$i."] ".$meses[$i]."  ".'</option>
                ';
            }
            ?>
            </select>
            
            
            &nbsp; &nbsp; XX &nbsp; &nbsp; &nbsp;
            
            <select name="anio" id="anio">
            	
                <option value="-">-</option>
			<?php
            for($i=1900;$i<=1999;$i++){
                //echo utf8_encode($row[0]);
                echo '<option value="'.$i.'">'.$i.'</option>
                ';
            }
            ?>
            </select>
            
              &nbsp; &nbsp; XXI &nbsp; &nbsp; &nbsp;
            
            <select name="anio2" id="anio2">
            	<option value="-">-</option>
			<?php
            for($i=2000;$i<=2016;$i++){
                //echo utf8_encode($row[0]);
                echo '<option value="'.$i.'">'.$i.'</option>
                ';
            }
            ?>
            </select>
            
            
        </div>
        
         <div class="input medium">
            <label for="input2">Hojas (35-98/404)</label>
            <input type="text" id="hojas" name="hojas" value="<?php echo $hojas; ?>" />
        </div>
        
        
       <div class="input">
            <label for="select">Sesión</label>
            <select name="id_sesion" id="id_sesion">
            	
    <?php
	$qt = "SELECT * FROM sesion ORDER BY id_sesion ";
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		//echo utf8_encode($row[0]);
		echo '<option value="'.$row[0].'">'.$row[1].'</option>
		';
	}
	?>
            </select>
        </div> 
        
        
         <div class="input medium">
            <label for="input2">Presidente Municipal</label>
            <input type="text" id="presidente" name="presidente" value="<?php echo $presidente; ?>" />
        </div>
        
         <div class="input medium">
            <label for="input2">Año de la nombración (2013-2015)</label>
            <input type="text" id="ano" name="ano" value="<?php echo $ano; ?>" />
        </div>
  
        
        <div class="input medium">
            <label for="input2">Asunto:</label>
            <textarea name="asunto" cols="" rows=""><?php echo $asunto; ?></textarea>
        </div>
        
          <div class="input medium">
            <label for="input2">Anexo:</label>
            <textarea name="anexo" cols="" rows=""><?php echo $anexo; ?></textarea>
        </div>
        
          <div class="input medium">
            <label for="input2">Observaciones:</label>
            <textarea name="observaciones" cols="" rows=""><?php echo $observaciones; ?></textarea>
        </div>
        
         <div class="input medium">
            <label for="input2">Número de sesión:</label>
            <input type="text" id="numero" name="numero" value="<?php echo $sesion; ?>" />
        </div>

      
        
        <div class="input medium" >

        <label for="input2">Archivo del libro</label>
            
            
            <div style="padding:4px; background-color:#FFF; width:400px; border:solid 1px #CCC;" id="div_imagen">
            
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="50">
              <param name="movie" value="subir_solofotos.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
               <param name="allowScriptAccess" value="allways" />
              <param name="swfversion" value="6.0.65.0">
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="../Scripts/expressInstall.swf">
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="subir_solofotos.swf" width="400" height="50">
                <!--<![endif]-->
                <param name="quality" value="high">
                <param name="wmode" value="opaque">
                <param name="swfversion" value="6.0.65.0">
                 <param name="allowScriptAccess" value="allways" />
                <param name="expressinstall" value="../Scripts/expressInstall.swf">
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                
                
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
            
            </div>
            
            <div id="thumb">
          
          	  <?php
        
		$galeria = explode(",", $archivo);
		$c=0;
		foreach ($galeria as &$valor) {
    		//$valor = $valor * 2;
			
			if($valor!=""){
			//echo $valor; 
			
				//$thumb = "http://michoacan.uno/uploaded/thumb_".substr($valor,-14);
				$thumb = "http://michoacan.uno/uploaded/med_".$valor;
				//echo "<a href='/galeria/$permalink#$c'>";
				echo "<img src='$thumb' width='200' />
				";
				//echo "</a>";
			}
			
			$c++;
		}
		
        ?>
          
            </div>
            
            <div id="cancelar" style="display:none;">
            
             	 <div >
           			 <input value="Cancelar" onClick="Cancelar();" class="botoncancelar" style="border: 1px solid #3580a9;
    border-radius: 3px;
    box-shadow: 0 1px 5px #b2b2b2;
    color: #d4e6ef;
    cursor: pointer;
    font-weight: bold;
    padding: 5px 10px;
    text-decoration: none;
    text-shadow: 0 -1px 0 #2c6aa3;
    background:#4C91BE;" />
       			 </div>
            </div>
            
        </div>
        
        <br><br>
        
        
        

        <div class="submit">
            <input value="Agregar" onClick="Validar();" />
        </div>
        <br>
    </div>
    </form>
</div>




<div class="cb"></div>





</div>
    <script type="text/javascript">
swfobject.registerObject("FlashID");
        </script>
    </body>
</html>