<?php

require 'vendor/autoload.php';
$mail = new PHPMailer(true);       
try {

    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;                             
    $mail->Username = 'egoveaplikasi@gmail.com';
    $mail->Password = 'egoveaplikasi@2018';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('-fsupport@sistemku.net', 'Support eSale');
    $mail->addAddress('randiandrio@gmail.com','Randi Andrio');
    $mail->addReplyTo('support@sistemku.com', 'Support eSale');


    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>