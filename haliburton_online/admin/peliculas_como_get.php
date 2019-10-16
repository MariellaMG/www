
<?php
include("includes/mysql_infos.php");


extract($_POST);
extract($_GET);



	$qt = "SELECT * FROM contenido WHERE titulo LIKE '%".$id."%' OR titulo_original LIKE '%".$id."%'   ORDER BY titulo ";
	
	$resultt = mysql_query($qt, $db);
	while ($row = mysql_fetch_row($resultt)){
		
		$sel = "";
	
		
		?>
		
		<option value="<?php echo $row[0]; ?>" ondblclick="DobleClick(this,'peliculas');" ><?php echo utf8_encode($row[2]); ?></option>
		
        
        <?php
	}
	


			
mysql_close($db);

?>
