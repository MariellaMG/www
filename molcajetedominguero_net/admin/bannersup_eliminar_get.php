
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);


$qe = "
DELETE FROM `banner` WHERE `id_banner` = '".$id."' LIMIT 1
";

echo $qe;

$resulta = mysql_query($qe, $db);


			
mysql_close($db);


echo $id;

?>
