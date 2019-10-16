<h1>HOLA</h1>
<?php

extract($_POST);

$t=$_GET['token'];


echo "<strong>GET:</strong> ".$t."<br>
";

echo $xml."<br>
";

echo "<strong>Token POST:</strong> ".$token;

?>