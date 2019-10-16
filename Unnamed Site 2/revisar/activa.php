<?php

$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');

$id=$_GET['id'];

$idc=$_GET['idc'];


$qt= "UPDATE `capturista` SET `activa` = activa+1 WHERE `id_capturista` = '$idc';";
$resultt = mysqli_query($link,$qt);

$qt= "UPDATE `capturista` SET `reviso` = reviso+1 WHERE `id_capturista` = '$idc';";
$resultt = mysqli_query($link,$qt);


$qt= "UPDATE `revisar` SET `revisada` = 1 WHERE `id_revisar` = '$id';";
$resultt = mysqli_query($link,$qt);


echo $qt;


?>