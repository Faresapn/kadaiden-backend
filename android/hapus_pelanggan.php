<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

mysql_query("DELETE FROM pelanggan WHERE id_pelanggan='$_POST[id_pelanggan]'");

$response["error"] = FALSE;
echo json_encode($response);

?>

