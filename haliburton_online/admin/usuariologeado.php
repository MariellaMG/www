<?php

	$id = $_SESSION['idu'];
		
		$qt = "SELECT * FROM usuario WHERE id_usuario='$id'";
	
		$resultt = mysql_query($qt, $db);
		
		while ($row = mysql_fetch_row($resultt)){
			
			$login_id = $row[0];
			$login_nombre = $row[3];
			
			//echo $login_nombre;
			
		}
		
		

?>
Administrador