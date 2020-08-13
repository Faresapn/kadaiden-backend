<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

$sql = mysql_query("SELECT * FROM kasir where id_kasir='$_POST[id_kasir]'");
$r   = mysql_fetch_array($sql);

$pass_lama = md5($_POST['pass_lama']);
$pass_baru = md5($_POST['pass_baru']);

if($pass_lama == $r['password']){

	$query = mysql_query("UPDATE kasir SET	password = '$pass_baru' WHERE id_kasir = '$_POST[id_kasir]'");		
	$hasil=mysql_query ($query);

	$response["error"] = FALSE;
}else{
	$response["error"] = TRUE;
}
echo json_encode($response);
	
?>

