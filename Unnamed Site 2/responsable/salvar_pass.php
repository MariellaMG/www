<?php

$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');

$id=$_GET['id'];


$pass=$_GET['pass'];

/*
$qt= "UPDATE `revisar` SET `enproceso` = 0 WHERE `id_revisar` = '$id';";
$resultt = mysqli_query($link,$qt);


$qt= "UPDATE `capturista` SET `inactiva` = inactiva+1 WHERE `id_capturista` = '$idc';";
$resultt = mysqli_query($link,$qt);

$qt= "UPDATE `capturista` SET `reviso` = reviso+1 WHERE `id_capturista` = '$idc';";
$resultt = mysqli_query($link,$qt);
*/

$qt= "UPDATE `revisar` SET `pass` = '$pass'  WHERE `id_revisar` = '$id';";
$resultt = mysqli_query($link,$qt);


//$qt= "UPDATE `revisar` SET `suspendia` = 1  WHERE `id_revisar` = '$id';";//
//$resultt = mysqli_query($link,$qt);

echo $qt;

?>