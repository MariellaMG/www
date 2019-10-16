<?php
include("session.php");
?>
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);


$qe = "DELETE FROM `encuesta` WHERE `encuesta`.`id_encuesta` = '".$id."' LIMIT 1";

//echo $qe;

$resulta = mysql_query($qe, $db);

			
mysql_close($db);


echo "ok";

?>
