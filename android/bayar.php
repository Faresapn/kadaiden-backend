<?php
include('../action/koneksi.php');
$response = array("error" => FALSE);

$id_toko	= explode("/",$_POST['id_toko']); 
$id_kasir	= explode("/",$_POST['id_kasir']); 
$id_pelanggan	= explode("/",$_POST['id_pelanggan']); 
$no_faktur	= explode("/",$_POST['faktur']); 
$tgl_transaksi	= explode("/",$_POST['tanggal']); 
$x_id_produk	= explode("/",$_POST['id_produk']); 
$x_jumlah	= explode("/",$_POST['jumlah']); 

$x = 1;
while($x <= count($id_toko)) {

	$a = str_replace("[","",$x_id_produk[$x]);
	$b = str_replace("]","",$a);
	$c = explode(",",$b); 
	$id_produk = $c ;
	
	$a = str_replace("[","",$x_jumlah[$x]);
	$b = str_replace("]","",$a);
	$c = explode(",",$b); 
	$jumlah = $c ;

	// for($i = 0;$i < count($id_produk);$i++){
	$i = 1;
	while($i <= count($id_produk)) {	
		$id_transaksi = random();
	
		$sql = mysql_query("SELECT * FROM produk WHERE id_produk='$id_produk[$i]'");
		$r   = mysql_fetch_array($sql);
	
		$a = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$r[id_kemasan]'");
		$b = mysql_fetch_array($a);
	
		$total = $jumlah[$i] * $r['harga_jual'];
	
		$keterangan   = "Penjualan ".$r['nama_produk'].
						" sebanyak ".$jumlah[$i]." ".$b['nama_kemasan'].
						" dengan total harga Rp. ".$total;
		$id_toko = $_POST['id_toko'];
	
	
		$query = mysql_query("INSERT INTO transaksi (
								id_transaksi,
								id_toko,
								tanggal,
								id_produk,
								mk,
								jumlah,
								total,
								no_faktur,
								id_kasir,
								id_pelanggan
							)VALUES(
								'$id_transaksi',
								'$id_toko[$x]',
								'$tgl_transaksi[$x]',
								'$id_produk[$i]',
								'1',
								'$jumlah[$i]',
								'$total',
								'$no_faktur[$x]',
								'$id_kasir[$x]',
								'$id_pelanggan[$x]'
								)");
		$hasil=mysql_query ($query);
		$query = mysql_query("INSERT INTO keuangan (
								id_transaksi,
								id_toko,
								tanggal,
								mk,
								keterangan,
								jumlah,
								input_from
							)VALUES(
								'$id_transaksi',
								'$id_toko[$x]',
								'$tgl_transaksi[$x]',
								'1',
								'$keterangan',
								'$total',
								'transaksi'
								)");
		$hasil=mysql_query ($query);
		
		$i++;
	}
	$x++;
}

$response["error"] = FALSE;
$response["no_faktur"] = $no_faktur;
echo json_encode($response);


?>

