<?php
    ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );    
    $from = "admin@alpokat.com";    
    $to = "randiandrio@gmail.com";    
    $subject = "Aktivasi Akun Alpokat";    
    $message = "PHP mail berjalan dengan baik";   
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
    echo "Pesan email sudah terkirim.";
?>