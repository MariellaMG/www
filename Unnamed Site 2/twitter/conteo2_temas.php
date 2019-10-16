<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	setTimeout(function(){window.location.reload(1);}, 50000);
}

</script>


</head>

<body>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>NOMBRE</td>
    <td>CONTEO</td>
  </tr>


<?php



$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');


	$qt = "SELECT distinct dato,conteo  FROM express_conteo_dos ORDER BY conteo DESC LIMIT 100";
	//echo $qt;
	$resultt = mysqli_query($link,$qt);
	$cc=0;
	while ($rowt = mysqli_fetch_row($resultt)){
		$dato=$rowt[0];
		$conteo=$rowt[1];
		$cc++;
		$color = "";
		if($cc%2==0){
			$color= ' style="background:#CCC;" ';
		}
		
		//echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
		//echo "DATO: ".$dato."   CONTEO: ".$conteo." <br />";
		
		echo '<tr '.$color.' >
    <td>'.$dato.'</td>
    <td>'.number_format($conteo).'</td>
  </tr>';
  
	}
	
	
	

?>

</table>

<div style="background:#CCC;">

</body>
</html>