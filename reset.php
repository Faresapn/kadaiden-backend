<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Alpokat - Kasir Online Toko Pertanian</title>            
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
               <img src="img/logo_aplokat_border.png" width="100%" >
               
                <div class="login-body">
                    <div class="login-title"><strong>Reset </strong> Password</div>
                    <form action="action/update.php?page=reset" class="form-horizontal" method="post">
                    <input type='hidden' name='id_pemilik' value='<?php echo $_GET['id'] ?>' >
                    <input type='hidden' name='token' value='<?php echo $_GET['token'] ?>' >
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="ulang_password" class="form-control" placeholder="Ulangi Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="login.php" class="btn btn-link btn-block">Login</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success btn-block">Reset Password</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Belum punya akun ? <a href="register.php">Buat akun baru</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 Alpokat
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






