<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);



$login=mysql_query("SELECT * FROM kasir WHERE id_kasir='$_POST[id_kasir]'");
$r=mysql_fetch_array($login);

$response["error"] = FALSE;
$response["kasir"]["nama"]= $r['nama'];
$response["kasir"]["hp"]= $r['hp'];
$response["kasir"]["email"]= $r['email'];
$response["kasir"]["alamat"]= $r['alamat'];
echo json_encode($response);
	
?>

