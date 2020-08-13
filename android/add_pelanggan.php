<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

		
$query = mysql_query("INSERT INTO pelanggan (
					nama,
					hp,
					alamat,
					id_toko
				)VALUES( 
					'$_POST[nama]', 
					'$_POST[hp]', 
					'$_POST[alamat]',
					'$_POST[id_toko]'
					)");
$hasil=mysql_query ($query);

$response["error"] = FALSE;
echo json_encode($response);

?>

