<?php
include('../action/koneksi.php');
error_reporting(0);

echo"[";


$sql = mysql_query("SELECT * FROM kategori WHERE id_toko='$_GET[id_toko]'");   
while ($r=mysql_fetch_array($sql)){

echo"{" ?>

	"nama_kategori":"<?php echo $r['nama_kategori']; ?>",
	"id_kategori":"<?php echo $r['id_kategori']; ?>"
	
<?php echo"},"; ?>

<?php
}
echo"]";
?>
