
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);


$qe = "
TRUNCATE TABLE `compra`
";


$resulta = mysql_query($qe, $db);


			
mysql_close($db);


echo $id;

?>
