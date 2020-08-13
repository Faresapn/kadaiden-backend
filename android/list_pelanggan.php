<?php
include('../action/koneksi.php');
error_reporting(0);

echo"[";

if(isset($_GET['cari'])){
	$sql = mysql_query("SELECT * FROM pelanggan WHERE id_toko='$_GET[id_toko]' AND nama LIKE '%".$_GET['cari']."%' ORDER BY nama");   
}else{
	$sql = mysql_query("SELECT * FROM pelanggan WHERE id_toko='$_GET[id_toko]' ORDER BY nama");  
}
while ($r=mysql_fetch_array($sql)){

	$a = mysql_query("SELECT SUM(total) as j FROM transaksi WHERE id_pelanggan='$r[id_pelanggan]' ");
	$b = mysql_fetch_assoc($a);
	$poin = floor($b[j]/1000);
								
	echo"{" ?>
	
		"id_pelanggan":"<?php echo $r['id_pelanggan']; ?>",
		"nama":"<?php echo $r['nama']; ?>",
		"hp":"<?php echo $r['hp']; ?>",
		"alamat":"<?php echo $r['alamat']; ?>",
		"poin":"<?php echo $poin; ?> pts"
		
	<?php echo"},"; ?>
	
	<?php
}
echo"]";
?>
