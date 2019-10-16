
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);


$qe = "
DELETE FROM `acta` WHERE `id_acta` = '".$id."' LIMIT 1
";


$resulta = mysql_query($qe, $db);


			
mysql_close($db);


echo $id;

?>
