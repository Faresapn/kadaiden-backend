<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

$query = mysql_query("UPDATE kasir SET	nama	= '$_POST[nama]', 
					hp 	= '$_POST[hp]', 
					email 	= '$_POST[email]',
					alamat 	= '$_POST[alamat]'
				WHERE   id_kasir= '$_POST[id_kasir]'");		
$hasil=mysql_query ($query);

$response["error"] = FALSE;
echo json_encode($response);
	
?>

