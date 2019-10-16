<?php
include "ligas.php";
?>
<?php
include("includes/mysql_infos.php");

extract($_POST);
extract($_GET);

/*
$tit = stripslashes(trim(($id)));
$permalink = substr(strtolower(cleanForShortURL($tit)),0,100);
while(substr($permalink,-1,1)=="-"){
	$permalink = substr($permalink,0,-1);
}
$q = "SELECT permalink FROM tipo WHERE permalink LIKE '".$permalink."%'";
//echo $q;
$result = mysql_query($q, $db);
$contando = 0;
while ($row = mysql_fetch_row($result)){
	$contando++;
}
if($contando >= 1){
	$contando++;
	$permalink = $permalink."-".$contando;
}


$id = utf8_decode($id);
*/

$desc = utf8_decode($desc);
$nom = utf8_decode($nom);

$desc = str_replace("'", "", $desc);

$q = "INSERT INTO `anuncio` (`id_anuncio`, `pagina`, `imagen`, `descricion`, `nombre`, `telefono`, `direccion`, `tipos_negocio`, `estatus`,`numero`) VALUES (NULL, '$pag', '$img', '$desc', '$nom', '$tel', '$dir', '$tips', '$sta','$num');";

echo $q;

$resultt = mysql_query($q, $db);


	$qt = "SELECT * FROM tipo ORDER BY id_tipo DESC LIMIT 1";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		echo $row[0];
	}
	


			
mysql_close($db);

?>
