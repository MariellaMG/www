
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);



	$qt = "SELECT * FROM tipo WHERE nombre LIKE '%".$id."%' OR permalink LIKE '%".$id."%' OR descripcion LIKE '%".$id."%'   ORDER BY nombre LIMIT 50 ";

	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		
		$sel = "";
	
		
		?>
		
		<option value="<?php echo $row[0]; ?>" ondblclick="DobleClick(this,'tipos<?php echo $num; ?>');" ><?php echo utf8_encode($row[2]); ?></option>
		
        
        <?php
	}
	


			
mysql_close($db);

?>
