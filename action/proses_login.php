<?php
include "../action/koneksi.php";
error_reporting(0);

$email= antiinjec(@$_POST['email']);
$pass= antiinjec(@$_POST['password']);

$login		= mysql_query("SELECT * FROM pemilik WHERE email='$email'");
$ada_email	= mysql_num_rows($login);
$r		= mysql_fetch_array($login);



if ($ada_email > 0 AND $r['password']==md5($pass) ){
		$_SESSION['alpokat']['id']= $r['id_pemilik'];
		$_SESSION['alpokat']['nama']= $r['nama'];
		header('location: ../toko.php');
}else{
  echo "<script>window.alert('Kombinasi email dan password salah');
        window.location=('../login.php')</script>";
}
?>
