<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

if (isset($_POST['email']) && isset($_POST['password'])) {

	$hp = $_POST['email'];
	$pass  = md5($_POST['password']);

	$login=mysql_query("SELECT * FROM kasir WHERE hp='$hp' AND password='$pass'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
	
	
	if($ketemu > 0 ){
		
		$a = mysql_query("SELECT * FROM toko WHERE id_toko='$r[id_toko]'");
		$b = mysql_fetch_array($a);
		
		$header = "";
		$c = mysql_query("SELECT * FROM header_struk WHERE id_toko='$r[id_toko]'");
		$cy = mysql_num_rows($c);
		$no = 1;
		while($d = mysql_fetch_array($c)){
			if($no < $cy){
				$div = " _ ";
			}else{
				$div = "";
			}
			$header = $header . $d['isi'].$div;
			$no++;
		}
		$footer = "";
		$e = mysql_query("SELECT * FROM footer_struk WHERE id_toko='$r[id_toko]'");
		$cx = mysql_num_rows($e);
		$no = 1;
		while($f = mysql_fetch_array($e)){
			if($no < $cx){
				$div = " _ ";
			}else{
				$div = "";
			}
			$footer = $footer.$f['isi'].$div;
			$no++;
		}
		
		$response["error"] = FALSE;
		$response["kasir"]["id_kasir"]= $r['id_kasir'];
		$response["kasir"]["nama_kasir"]= $r['nama'];
		$response["kasir"]["id_toko"]= $r['id_toko'];
		$response["kasir"]["nama_toko"]= $b['nama_toko'];
		$response["kasir"]["alamat"]= $b['alamat'];
		$response["kasir"]["hp"]= $b['hp'];
		$response["kasir"]["header"]= $header;
		$response["kasir"]["footer"]= $footer;
		echo json_encode($response);
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "Email atau password salah";
	    	echo json_encode($response);
	}
    
} else {
	// required post params is missing
	$response["error"] = TRUE;
	$response["error_msg"] = "Email atau password salah";
	echo json_encode($response);
}
?>

