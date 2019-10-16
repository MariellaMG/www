<?php
include("includes/mysql_infos.php");
?>
<?
    header("Content-Type: application/vnd.ms-excel");
    header("Expires: 0″");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0″");
    header("content-disposition: attachment;filename=Ventas.xls");
?>


<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Ventas.clt</title>

<style type="text/css">

<!–

.style1 {

font-family: Verdana, Arial, Helvetica, sans-serif;

font-weight: bold;

}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

–>

</style>

</head>

<body>

<table >

<tr>
 <?php
		  $qc = "SELECT * FROM compra ORDER BY id_compra DESC LIMIT 50";
	
		  
		  //echo $qc;
		  
		$result = mysql_query($qc, $db);
		$i=0;
		
		while ($i < mysql_num_fields($result)) { 
			$meta = mysql_fetch_field($result, $i); 
			//if($i>2){
			echo '<th>' . $meta->name . '</th>'; 
			//}
			$column[$i] = $meta->name ;
			$i = $i + 1; 
		}
		
		?>
                  
                  
                </tr>
         

 
            
            <?php
			
            
			
		
		
		while ($row = mysql_fetch_row($result)){
			echo "<tr>";
			$j=0;
			foreach ($column as $valor) {
				///$valor <<<<< nombre de campo
				//if($j>2){
				echo "<td><span class='style1'>".utf8_encode($row[$j])."</span></td>
				";
				//}
				$j++;
			}
			echo "</tr>";
		
			
			
		}
	   
	   ?>






</table>
</body>
</html>