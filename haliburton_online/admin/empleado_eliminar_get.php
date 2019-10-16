
<?php
include("includes/mysql_infos2.php");


extract($_POST);
extract($_GET);


$qe = "
DELETE FROM `employee` WHERE `id_employee` = '".$id."' LIMIT 1
";


$resulta = mysqli_query($link,$qe);


	


echo $id;

?>
