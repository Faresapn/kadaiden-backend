<?php
require_once "action/koneksi.php";
$q = strtolower($_GET["q"]);
if (!$q) return;
$id_toko = $_SESSION['alpokat']['id_toko'];
$sql = "SELECT DISTINCT nama_produk as nama_produk, 
			id_produk as id_produk, 
			id_kemasan as id_kemasan,
			harga_modal as modal,
			id_toko as id_toko
	FROM produk WHERE 
			nama_produk LIKE '%$q%' AND
			id_toko='$id_toko'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
	$a = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$rs[id_kemasan]'");
	$r = mysql_fetch_array($a);
	
	$cid = $rs['id_produk'];
	$cname = $rs['nama_produk'];
	$ckemasan = $r['nama_kemasan'];
	$cmodal = $rs['modal'];
	echo "$cname|$cid|$ckemasan|$cmodal\n";
}
?>
