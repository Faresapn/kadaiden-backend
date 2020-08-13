<?php
include "action/koneksi.php";
error_reporting(0);


$sql = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$_GET[id]'");
$rs  = mysql_num_rows($sql);
$r   = mysql_fetch_array($sql);

if($rs > 0){
	$kode = md5("alpokat".$r['id_pemilik']);
	if($_GET['token']==$kode){
		$query = mysql_query("UPDATE pemilik SET aktif = 1 WHERE id_pemilik = '$_GET[id]'");		
		$hasil=mysql_query ($query);
		echo "<script>window.alert('Terimakasih akun anda telah diaktifkan silakan login kembali');
        	window.location=('login.php')</script>";
	}else{
		echo "<script>window.alert('Gagal mengaktifkan akun');
        	window.location=('login.php')</script>";
	}

}else{
	echo "<script>window.alert('Gagal mengaktifkan akun');
        	window.location=('login.php')</script>";
}


?>
