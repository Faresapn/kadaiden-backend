<?php
include('action/koneksi.php');
if(isset($_SESSION['alpokat'])){
	if(isset($_SESSION['alpokat']['id_toko'])){
		include('page/top.php');
		if(isset($_GET['page'])){
			include('page/'.$_GET['page'].'.php');
		}else{
			include('page/home.php');
		}
	}else{
		echo "<script>window.location=('$hosting/toko.php')</script>";
	}
	
	include('page/bottom.php');
}else{
	echo "<script>window.location=('$hosting/login.php')</script>";
}

?>