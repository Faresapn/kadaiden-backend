<?php 
include ("../action/koneksi.php");
$url=$_SERVER['HTTP_REFERER'];
$simpan=$_GET['page'];
$id_pemilik = $_SESSION['alpokat']['id'];
$id_toko = $_SESSION['alpokat']['id_toko'];

switch($simpan){
case "register";	
		
$foto = "";
if (!empty($_FILES)) {
    $foto 	= random().".jpg";
    $tempFile 	= $_FILES['foto']['tmp_name']; 
    $targetFile =  $_FILES['foto']['name']; 
    move_uploaded_file($tempFile,"../foto_profil/$foto");
}else{
    $foto = "unknow_user.png";
}		
		
		
$pass = md5($_POST['password']);
$query = mysql_query("INSERT INTO pemilik (
						id_pemilik,
						nama, 
						hp, 
						email,
						password,
						foto
					)VALUES(
						'$_POST[id_pemilik]', 
						'$_POST[nama]', 
						'$_POST[hp]', 
						'$_POST[email]',
						'$pass',
						'$foto'
						
						)");
$hasil=mysql_query ($query);
		
$query = mysql_query("INSERT INTO toko (
						id_pemilik,
						nama_toko, 
						hp, 
						alamat
					)VALUES(
						'$_POST[id_pemilik]', 
						'$_POST[nama_toko]', 
						'$_POST[hp]', 
						'$_POST[alamat]'
						)");
$hasil=mysql_query ($query);
		
		
header( 'Location: ../login.php') ;
break;	
//=======================================================//
case "toko";

$query = mysql_query("INSERT INTO toko (
						id_pemilik,
						nama_toko, 
						hp, 
						alamat
					)VALUES(
						'$id_pemilik', 
						'$_POST[nama_toko]', 
						'$_POST[hp]', 
						'$_POST[alamat]'
						)");
$hasil=mysql_query ($query);
echo "<script>window.location=('../?page=toko')</script>";	
break;
//=======================================================//
case "kasir";
$a = mysql_query("SELECT * FROM kasir WHERE hp='$_POST[hp]'");
$b = mysql_num_rows($a);

if($b > 0) {
	echo "<script>window.alert('Maaf nomor HP ini telah terdaftar !');
        window.location=('../?page=kasir')</script>";
}else{
	$pass = md5($_POST['password']);
	$query = mysql_query("INSERT INTO kasir (
						id_pemilik,
						nama, 
						hp, 
						email,
						alamat,
						id_toko,
						password
				)VALUES(
						'$id_pemilik', 
						'$_POST[nama]', 
						'$_POST[hp]', 
						'$_POST[email]',
						'$_POST[alamat]',
						'$_POST[id_toko]',
						'$pass'
						)");
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=kasir')</script>";
}
	
break;
//=======================================================//
case "kategori";
$query = mysql_query("INSERT INTO kategori (
								nama_kategori,
								id_toko
						)VALUES(
								'$_POST[nama_kategori]', 
								'$id_toko'
								)");
$hasil=mysql_query ($query);
echo "<script>window.location=('../?page=kategori')</script>";	
break;
//=======================================================//
case "header";
$query = mysql_query("INSERT INTO header_struk (
						isi,
						id_toko
					)VALUES(
						'$_POST[isi]', 
						'$id_toko'
						)");
$hasil=mysql_query ($query);
echo "<script>window.location=('$url')</script>";	
break;
//=======================================================//
case "footer";
$query = mysql_query("INSERT INTO footer_struk (
						isi,
						id_toko
					)VALUES(
						'$_POST[isi]', 
						'$id_toko'
						)");
$hasil=mysql_query ($query);
echo "<script>window.location=('$url')</script>";	
break;
//=======================================================//
case "kemasan";
$query = mysql_query("INSERT INTO kemasan (
								nama_kemasan,
								id_toko
						)VALUES(
								'$_POST[nama_kemasan]', 
								'$id_toko'
								)");
$hasil=mysql_query ($query);
echo "<script>window.location=('../?page=kemasan')</script>";	
break;
//=======================================================//
case "produk";

	$foto = "";
	
	if (!empty($_FILES)) {	
	    $foto = random().".jpg";
	    $tempFile = $_FILES['foto']['tmp_name'];
	    $targetFile =  $_FILES['foto']['name'];
	    move_uploaded_file($tempFile,"../foto_produk/x_".$foto);
		
	    function compress($source, $destination, $quality) {
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);
		imagejpeg($image, $destination, $quality);
		return $destination;
	    }
	
	    $source_img = "../foto_produk/x_".$foto;
	    $destination_img = "../foto_produk/".$foto;
	    $d = compress($source_img, $destination_img, 30);
	    unlink($source_img);
	}	
		
	$query = mysql_query("INSERT INTO produk (
						id_toko,
						id_kategori,
						id_kemasan,
						nama_produk,
						sku,
						barcode,
						harga_modal,
						harga_jual,
						foto
					)VALUES(
						'$id_toko',
						'$_POST[id_kategori]',
						'$_POST[id_kemasan]',
						'$_POST[nama_produk]',
						'$_POST[sku]',
						'$_POST[barcode]',
						'$_POST[harga_modal]',
						'$_POST[harga_jual]',
						'$foto'
						)");
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=produk')</script>";	
break;
//=======================================================//
case "produk-masuk";
$id_transaksi = random();
$total = $_POST['jumlah']*$_POST['modal'];
$keterangan   = "Pembelian ".$_POST['nama_produk'].
				" sebanyak ".$_POST['jumlah']." ".$_POST['kemasan'].
				" dengan total harga Rp. ".$total;
		
$query = mysql_query("INSERT INTO transaksi (
								id_transaksi,
								id_toko,
								tanggal,
								id_produk,
								mk,
								jumlah,
								total,
								no_faktur,
								id_kasir
						)VALUES(
								'$id_transaksi',
								'$id_toko',
								'$_POST[tanggal]',
								'$_POST[id_produk]',
								'0',
								'$_POST[jumlah]',
								'$total',
								'',
								''
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
								'$id_toko',
								'$_POST[tanggal]',
								'0',
								'$keterangan',
								'$total',
								'transaksi'
								)");
$hasil=mysql_query ($query);

echo "<script>window.location=('../?page=produk-masuk&dari=".date('Y-m-d')."&hingga=".date('Y-m-d')."')</script>";	
break;
		
case "neraca-keuangan";	
$id_transaksi = random();
$mk = $_POST['mk'];
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
								'$id_toko',
								'$_POST[tanggal]',
								'$mk',
								'$_POST[keterangan]',
								'$_POST[jumlah]',
								'neraca'
								)");
$hasil=mysql_query ($query);
echo "<script>window.location=('../?page=laporan-keuangan&bulan=".date('m')."&tahun=".date('Y')."')</script>";	
break;
		

}
?>