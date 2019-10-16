<?php

	$id = $_SESSION['idu'];
		
		$qt = "SELECT * FROM colaborador WHERE id_colaborador='$id'";
	
		$resultt = mysql_query($qt, $db);
		
		while ($row = mysql_fetch_row($resultt)){
			
			$login_id = $row[0];
			$login_nombre = $row[3];
			
		}

?>