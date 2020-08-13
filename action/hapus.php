 <?php 
include ("../action/koneksi.php");
$url=$_SERVER['HTTP_REFERER'];
$hapus=$_GET['page'];
switch($hapus){

case "toko";
		mysql_query("DELETE FROM toko WHERE id_toko='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "kasir";
		mysql_query("DELETE FROM kasir WHERE id_kasir='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "kategori";
		mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "produk";
		mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "kemasan";
		mysql_query("DELETE FROM kemasan WHERE id_kemasan='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "produk-masuk";
		mysql_query("DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
		mysql_query("DELETE FROM keuangan WHERE id_transaksi='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "neraca-keuangan";
		mysql_query("DELETE FROM keuangan WHERE id_transaksi='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "faktur";
	$a = mysql_query("SELECT * FROM transaksi WHERE no_faktur='$_GET[id]'");
	while($b = mysql_fetch_array($a)){
		mysql_query("DELETE FROM keuangan WHERE id_transaksi='$b[id_transaksi]'");
	}
		mysql_query("DELETE FROM transaksi WHERE no_faktur='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;
case "detail-transaksi";
		mysql_query("DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
		mysql_query("DELETE FROM keuangan WHERE id_transaksi='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;

case "pelanggan";
		mysql_query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;

case "header";
		mysql_query("DELETE FROM header_struk WHERE id='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;

case "footer";
		mysql_query("DELETE FROM footer_struk WHERE id='$_GET[id]'");
		echo "<script>window.location=('$url')</script>";
break;

		
}
?>