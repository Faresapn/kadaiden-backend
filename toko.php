<?php
include('action/koneksi.php');
session_start();
if(!isset($_SESSION['alpokat']['id'])){
	echo "<script>window.location=('$hosting/login.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>KadaiDen</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->  

                                      
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
               <img src="img/logo_kadaiden.png" width="100%" >
               
                <div class="login-body">
                    <div class="login-title"> Selamat Datang Kembali!<br><strong><?php echo $_SESSION['alpokat']['nama'] ?></strong></div>
                    <form action="action/update.php?page=pilih_toko" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                           	<select name="id_toko" class="form-control">
                           		<option selected disabled>Silahkan Pilih Toko Anda</option>
                           		<?php
								$id = $_SESSION['alpokat']['id'];
								$sql = mysql_query("SELECT * FROM toko where id_pemilik='$id'");
								while($r= mysql_fetch_array($sql)){
									echo "<option value='$r[id_toko]'>$r[nama_toko]</option>";
								}
								?>
                           	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                           <a href="logout.php"><button type="button" class="btn btn-danger btn-block">Batal</button></a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block">Kelola Toko</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 David Muheri
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






