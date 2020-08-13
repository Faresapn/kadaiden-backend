<?php
include('../action/koneksi.php');

echo"[";


$sql = mysql_query("SELECT * FROM produk WHERE id_toko='$_GET[id_toko]'");  
while ($r=mysql_fetch_array($sql)){

	$a = mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'");  
	$b = mysql_fetch_array($a);

	
echo"{" ?>

	"nama_produk":"<?php echo $r['nama_produk']; ?>",
	"foto_produk":"<?php echo $r['foto']; ?>",
	"id_produk":"<?php echo $r['id_produk']; ?>",
	"harga_indo":"<?php echo $r['harga_jual']; ?>",
	"harga":"Rp. <?php echo rupiah($r['harga_jual']); ?>",
	"last_update":"<?php echo $r['last_update']; ?>",
	"kategori":"<?php echo $b['nama_kategori']; ?>" ,
	"barcode":"<?php echo $r['barcode']; ?>"
	
<?php echo"},"; ?>

<?php
}
echo"]";
?>
