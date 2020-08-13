<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);



	

$a = mysql_query("SELECT * FROM toko WHERE id_toko='$_POST[id_toko]'");
$b = mysql_num_rows($a);
$c = mysql_fetch_array($a);


if($b > 0 ){
	
	$d = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$c[id_pemilik]' AND pass_retur='$_POST[pass_retur]'");
	$e = mysql_num_rows($d);
	if($e > 0){
		$response["error"] = FALSE;
	}else{
		$response["error"] = TRUE;
	}
	echo json_encode($response);
}else{
	$response["error"] = TRUE;
}
    

 echo json_encode($response);
?>

