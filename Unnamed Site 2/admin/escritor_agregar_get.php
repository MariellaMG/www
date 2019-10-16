<?php
include "ligas.php";
?>
<?php
include("includes/mysql_infos.php");

extract($_POST);
extract($_GET);

$tit = stripslashes(trim(($id)));
$permalink = substr(strtolower(cleanForShortURL($tit)),0,100);
while(substr($permalink,-1,1)=="-"){
	$permalink = substr($permalink,0,-1);
}
$q = "SELECT permalink FROM personaje WHERE permalink LIKE '".$permalink."%'";
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

$q = "SELECT * FROM personaje WHERE nombre LIKE '".$id."'";
$result = mysql_query($q, $db);
$contando = 0;
while ($row = mysql_fetch_row($result)){
	$contando++;
	$id_personaje = $row[0];
}


if($contando<=0){

	
	
	$q = "INSERT INTO `personaje` (`id_personaje`, `nombre`, `permalink`) VALUES (NULL, '$id', '$permalink' );";
	$resultt = mysql_query($q, $db);

	$qt = "SELECT * FROM personaje ORDER BY id_personaje DESC LIMIT 1";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		echo $row[0];
	}

}else{
	echo $id_personaje;
}
			
mysql_close($db);

?>
