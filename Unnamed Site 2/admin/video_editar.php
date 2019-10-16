<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");
?>


   <?php
	   
	  $id = $_GET["id"];
	   
	$qt = "SELECT * FROM video WHERE id_video = '$id' ";
	$resultt = mysql_query($qt, $db);
	while ($rowt = mysql_fetch_row($resultt)){
		
		$id = $rowt[0];
		$titulo = $rowt[1];
		$descripcion = $rowt[2];
		$liga = $rowt[3];
		$id_youtube = $rowt[4];
		$fecha = $rowt[5];
		$permalink = $rowt[6];
		
		$intro = $rowt[7];
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
  <?php include "forms.php"; ?>
        
       <script type="text/javascript" >

$(document).ready(function() {
	//$('#desde').html("hola");
});


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
	

	if($("#liga").val()==""){
		error = 1;
		$("#liga").css("border-color","#ff0000");
	}else{
		$("#liga").css("border-color","#000000");
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

function terminaUpload(t_t){
	
	
	frames_d = "<img src='../uploaded/"+t_t+".jpg'  width='75' height='70' />";
	
	
	$("#thumb").html(frames_d);
	$("#imagen").val(t_t);
	//$("#seleccionadas").show();
	//$("#generadas").show();	
}


var liga_prev = "<?php echo $id_youtube; ?>";

function CambiaLigaYoutube(){
	var liga_str = $("#liga").val();
	if(liga_str!=""){
		//http://www.youtube.com/watch?v=VrafEywHQJI
		if(liga_str.indexOf("v=")!=-1){
			liga_str = liga_str.substring(liga_str.indexOf("v=")+2);
			if(liga_str.indexOf("&")!=-1){
				liga_str  = liga_str.substring(0,liga_str.indexOf("&"));
			}
			//http://www.youtube.com/embed/Gh8IuIZnYo8?rel=0
			//#youtube
			if(liga_str!=liga_prev){
				$("#youtube_div").show();
				$("#youtube").attr("src","http://www.youtube.com/embed/"+liga_str+"?rel=0");
				$("#id_youtube").val(liga_str);
				liga_prev = liga_str;
				//http://i2.ytimg.com/vi/ElQCJZcsDjg/default.jpg
				//$("#peque_img").attr("src","http://i2.ytimg.com/vi/"+liga_prev+"/hqdefault.jpg");
			}
		}
	}
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
                <form action="" id="search" class="search placeholder">
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
       

<h1><img src="img/icons/posts.png" alt="" />Editar video '<?php echo $titulo; ?>'</h1>

		<div class="notif error" id="error" style="display:none; margin-top:20px;">
            <strong>Error: </strong>Debes llenar todos los campos requeridos
            <a href="#" class="close" onClick="Hide('error');"></a>
        </div>

<div class="bloc">
<form id="form1" method="post" enctype="multipart/form-data" action="video_editar_form.php">

<input name="id" type="hidden" value="<?php echo $id; ?>">

<input name="imagen" id="imagen" type="hidden" value="">

    <div class="title">Ingresa los datos requeridos</div>
    <div class="content">
    
    
         <div class="input medium">

            <label for="input2">Titulo</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $titulo; ?>" />
            <span>Ingresa el titulo del video</span>
        </div>
        
        
            
         <div class="input medium">

            <label for="input2">Liga</label>
            <input type="text" id="liga" name="liga" onchange="CambiaLigaYoutube();" onkeydown="CambiaLigaYoutube();" onclick="CambiaLigaYoutube();" onblur="CambiaLigaYoutube();" onfocus="CambiaLigaYoutube();" value="<?php echo $liga; ?>" />
            <span>Ingresa la liga del video ejemplo: http://www.youtube.com/watch?v=KYUL2aqpI9M</span>
        </div>
        
        
           <div class="input medium">

            <label for="input2">Id de youtube:</label>
            <input type="text" id="id_youtube" name="id_youtube" value="<?php echo $id_youtube; ?>" />
        </div>
        
        
        <div id="youtube_div">
        <iframe id="youtube" width="560" height="315" src="http://www.youtube.com/embed/<?php echo $id_youtube; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        
        
        
         <div class="input textarea">
            <label for="textarea1">Introducci&oacute;n</label>
            <textarea name="intro" id="intro" rows="4" cols="2" style="width:470px;"><?php echo $intro; ?></textarea>
            <br>
            Incluye una breve descripci&oacute;n para el texto previo.
        </div>
        
        
        
        
         <div class="input medium" ></div>
        <div class="input textarea">
        <label for="textarea1">Descripci&oacute;n</label>
            <textarea name="desc" id="desc" rows="13" cols="4"><?php echo $descripcion; ?></textarea>
            Incluye una breve descripci&oacute;n de la categoria
        </div>
<br><br>
        <div class="submit">
            <input value="Guardar" onClick="Validar();" />
        </div>
        <br>
    </div>
    </form>
</div>




<div class="cb"></div>





</div>
</body>
</html>