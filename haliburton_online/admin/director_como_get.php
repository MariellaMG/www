
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);



	$qt = "SELECT * FROM personaje WHERE nombre LIKE '%".$id."%' ORDER BY nombre ";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		
		$sel = "";
	
		
		?>
		
		<option value="<?php echo $row[0]; ?>" ondblclick="DobleClick(this,'directores');" ><?php echo utf8_encode($row[1]); ?></option>
		
        
        <?php
	}
	


			
mysql_close($db);

?>
