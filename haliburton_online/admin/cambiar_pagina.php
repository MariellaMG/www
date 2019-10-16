<?php
include "ligas.php";
?>
<?php
include("includes/mysql_infos.php");

extract($_POST);
extract($_GET);

$e = $e+1;

$q = "UPDATE `importar` SET `estatus` = '$e' WHERE `importar`.`id_importar` = 1;";

echo $q;

$resultt = mysql_query($q, $db);


	$qt = "SELECT estatus FROM importar ORDER BY id_importar DESC LIMIT 1";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		echo $row[0];
	}
	


			
mysql_close($db);

?>
