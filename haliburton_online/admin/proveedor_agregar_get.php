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
$q = "SELECT permalink FROM proveedor WHERE permalink LIKE '".$permalink."%'";
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

$q = "INSERT INTO `proveedor` (`id_proveedor`, `proveedor`, `permalink`) VALUES (NULL, '$id', '$permalink' );";
$resultt = mysql_query($q, $db);


	$qt = "SELECT * FROM proveedor ORDER BY id_proveedor DESC LIMIT 1";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		echo $row[0];
	}
	


			
mysql_close($db);

?>
