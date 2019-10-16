
<?php
include("includes/mysql_infos2.php");


extract($_POST);
extract($_GET);


$qe = "
DELETE FROM `amencionar` WHERE `id_amencionar` = '".$id."' LIMIT 1
";

$resulta = mysqli_query($link,$qe);



echo $id;

?>
