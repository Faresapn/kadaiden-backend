<?php 
$url=$_SERVER['HTTP_REFERER'];
include ("../action/koneksi.php");
$page=$_GET['page'];
switch($page){

//=============================================================================================================	
case "pilih_toko";

	$sql = mysql_query("SELECT * FROM toko WHERE id_toko='$_POST[id_toko]'");
	$r   = mysql_fetch_array($sql);

	$_SESSION['alpokat']['id_toko']= $_POST['id_toko'];
	$_SESSION['alpokat']['nama_toko']= $r['nama_toko'];
	echo "<script>window.location=('$hosting')</script>";
		
break;
//=============================================================================================================	
case "reset";

	if($_POST['password']==$_POST['ulang_password']){

		$sql = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$_POST[id_pemilik]'");
		$r   = mysql_fetch_array($sql);
		
		$token = md5("reset password".$r['id_pemilik']);
		$new_pass = md5($_POST['password']);
		
		if($token==$_POST['token']){
			$query = mysql_query("UPDATE pemilik SET password= '$new_pass' WHERE id_pemilik = '$_POST[id_pemilik]'");		
			$hasil=mysql_query ($query);
			
			echo "<script>window.alert('Password Anda telah diperbarui silahkan login kembali');
        		window.location=('../login.php')</script>";
		}else{
			echo "<script>window.alert('Maaf token tidak berlaku');
        		window.location=('$url')</script>";
		}
	
	
		
	}else{
		echo "<script>window.alert('Password tidak sesuai');
        	window.location=('$url')</script>";
	}
		
break;
//=============================================================================================================	
case "ganti_password";

	if($_POST['re_pass']==$_POST['new_pass']){

		$sql = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$_POST[id_pemilik]'");
		$r   = mysql_fetch_array($sql);
		
		$old = md5($_POST['old_pass']);

		$new_pass = md5($_POST['password']);
		
		if($old == $r['password']){
			$query = mysql_query("UPDATE pemilik SET password= '$new_pass' WHERE id_pemilik = '$_POST[id_pemilik]'");		
			$hasil=mysql_query ($query);
			
			echo "<script>window.alert('Password Anda telah diperbarui');
        		window.location=('$url')</script>";
		}else{
			echo "<script>window.alert('Password lama anda salah');
        		window.location=('$url')</script>";
		}
	
		
	}else{
		echo "<script>window.alert('Password tidak sesuai');
        	window.location=('$url')</script>";
	}
		
break;
//=============================================================================================================	
case "kelola";

	$sql = mysql_query("SELECT * FROM toko WHERE id_toko='$_GET[id]'");
	$r   = mysql_fetch_array($sql);

	$_SESSION['alpokat']['id_toko']= $_GET['id'];
	$_SESSION['alpokat']['nama_toko']= $r['nama_toko'];
	echo "<script>window.location=('$hosting')</script>";
		
break;
//=============================================================================================================	
case "toko";
	$query = mysql_query("UPDATE toko SET	nama_toko	= '$_POST[nama_toko]', 
						hp 		= '$_POST[hp]', 
						alamat 		= '$_POST[alamat]'
					WHERE   id_toko		= '$_POST[id_toko]'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=toko')</script>";	
break;

//=============================================================================================================	
case "kasir";
	$a = mysql_query("SELECT * FROM kasir WHERE hp='$_POST[hp]' AND id_kasir<>'$_POST[id_kasir]'");
	$b = mysql_num_rows($a);
	
	if($b > 0) {
		echo "<script>window.alert('Maaf nomor HP ini telah terdaftar !');
	        window.location=('../?page=kasir')</script>";
	}else{
		$query = mysql_query("UPDATE kasir SET	nama		= '$_POST[nama]', 
							hp 		= '$_POST[hp]', 
							email 		= '$_POST[email]',
							alamat 		= '$_POST[alamat]',
							id_toko 	= '$_POST[id_toko]'
						WHERE   id_kasir	= '$_POST[id_kasir]'");		
		$hasil=mysql_query ($query);
		echo "<script>window.location=('../?page=kasir')</script>";
	}	
break;
//=============================================================================================================	
case "kategori";
	$query = mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori = '$_POST[id_kategori]'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=kategori')</script>";	
break;
//=============================================================================================================	
case "kemasan";
	$query = mysql_query("UPDATE kemasan SET nama_kemasan = '$_POST[nama_kemasan]' WHERE id_kemasan = '$_POST[id_kemasan]'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=kemasan')</script>";	
break;
//=============================================================================================================	
case "produk";
	$gambar = "";
	
	if ($_FILES['foto']['name'] <> "") {	
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
	    
	    $gambar		= "foto ='$foto',";
	}		
			
	$query = mysql_query("UPDATE produk SET	id_kategori	= '$_POST[id_kategori]',
						id_kemasan	= '$_POST[id_kemasan]',
						nama_produk	= '$_POST[nama_produk]',
						sku		= '$_POST[sku]',
						barcode		= '$_POST[barcode]',
						harga_modal	= '$_POST[harga_modal]',
						$gambar
						harga_jual	= '$_POST[harga_jual]'
				  	  WHERE id_produk	= '$_POST[id_produk]'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=produk')</script>";	
break;
//=============================================================================================================	
case "pemilik";
	$gambar = "";
	
	if ($_FILES['foto']['name'] <> "") {	
	    $foto = random().".jpg";
	    $tempFile = $_FILES['foto']['tmp_name'];
	    $targetFile =  $_FILES['foto']['name'];
	    move_uploaded_file($tempFile,"../foto_profil/$foto");
	    $gambar		= "foto ='$foto',";
	}		
			
	$query = mysql_query("UPDATE pemilik SET nama		= '$_POST[nama]',
						 $gambar
						 hp		= '$_POST[hp]'
				  	  WHERE id_pemilik	= '$_POST[id_pemilik]'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=setting')</script>";	
break;
//=============================================================================================================	
case "pass_retur";
	$id = $_SESSION['alpokat']['id'];
	$query = mysql_query("UPDATE pemilik SET pass_retur = '$_POST[retur]' WHERE id_pemilik='$id'");		
	$hasil=mysql_query ($query);
	echo "<script>window.location=('../?page=setting')</script>";	
break;
}

?>









