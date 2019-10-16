
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);


$qe = "
UPDATE `entrada` SET `estatus` = '1' WHERE `entrada`.`id_entrada` ='".$id."' LIMIT 1
";


$resulta = mysql_query($qe, $db);


			
mysql_close($db);


echo $id;

?>
