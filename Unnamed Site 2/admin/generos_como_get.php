
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);



	$qt = "SELECT * FROM genero WHERE genero LIKE '%".$id."%' ORDER BY genero ";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		
		$sel = "";
	
		
		echo '<option value="'.$row[0].'" '.$sel.' >'.utf8_encode($row[1]).'</option>
		';
	}
	


			
mysql_close($db);

?>
