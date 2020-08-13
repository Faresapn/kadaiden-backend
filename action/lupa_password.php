<?php
include "../action/koneksi.php";
error_reporting(0);

$email= antiinjec(@$_POST['email']);

$login		= mysql_query("SELECT * FROM pemilik WHERE email='$email'");
$ada_email	= mysql_num_rows($login);
$r		= mysql_fetch_array($login);



if($ada_email > 0){
	
$token = md5("reset password".$r['id_pemilik']);
$link = "http://esale.sistemku.net/reset.php?id=$r[id_pemilik]&token=$token";
$isi ="
<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <style type='text/css'>
        #outlook a { padding: 0; }
          .ReadMsgBody { width: 100%; }
          .ExternalClass { width: 100%; }
          .ExternalClass * { line-height:100%; }
          body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
          table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
          img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
          p { display: block; margin: 13px 0; }
    </style>
    <!--[if !mso]><!-->
    <style type='text/css'>
        @media only screen and (max-width:480px) {
            @-ms-viewport { width:320px; }
            @viewport { width:320px; }
          }
    </style>
    <!--<![endif]-->
    <!--[if mso]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
    <!--[if lte mso 11]>
<style type='text/css'>
  .outlook-group-fix {
    width:100% !important;
  }
</style>
<![endif]-->

    <!--[if !mso]><!-->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <style type='text/css'>
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    </style>
    <!--<![endif]-->
    <style type='text/css'>
        @media only screen and (min-width:480px) {
            .mj-column-per-100, * [aria-labelledby='mj-column-per-100'] { width:100%!important; }
          }
    </style>
</head>

<body style='background: #F9F9F9;'>
    <div style='background-color:#F9F9F9;'>
        <!--[if mso | IE]>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='640' align='center' style='width:640px;'>
        <tr>
          <td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'>
      <![endif]-->
        <style type='text/css'>
            html, body, * {
              -webkit-text-size-adjust: none;
              text-size-adjust: none;
            }
            a {
              color:#1EB0F4;
              text-decoration:none;
            }
            a:hover {
              text-decoration:underline;
            }
        </style>
        <!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
        <!--[if mso | IE]>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='640' align='center' style='width:640px;'>
        <tr>
          <td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'>
      <![endif]-->
        <div style='max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden'>
            <div style='margin:0px auto;max-width:640px;background:#7289DA url(http://esale.sistemku.net/img/logo_aplokat_border.png) top center / cover no-repeat;'>
                <!--[if mso | IE]>
      <v:rect xmlns:v='urn:schemas-microsoft-com:vml' fill='true' stroke='false' style='width:640px;'>
        <v:fill origin='0.5, 0' position='0.5,0' type='tile' src='https://cdn.discordapp.com/email_assets/f0a4cc6d7aaa7bdf2a3c15a193c6d224.png' />
        <v:textbox style='mso-fit-shape-to-text:true' inset='0,0,0,0'>
      <![endif]-->
                <table role='presentation' cellpadding='0' cellspacing='0' style='font-size:0px;width:100%;background:#f98322  top center / cover no-repeat;' align='center' border='0'>
                    <tbody>
                        <tr>
                            <td style='text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:57px;'>
                                <!--[if mso | IE]>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td style='vertical-align:undefined;width:640px;'>
      <![endif]-->
                                <div style='cursor:auto;color:white;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:28px;font-weight:500;line-height:32px;text-align:center;'>Reset password eSale</div>
                                <!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--[if mso | IE]>
        </v:textbox>
      </v:rect>
      <![endif]-->
            </div>
            <!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
            <!--[if mso | IE]>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='640' align='center' style='width:640px;'>
        <tr>
          <td style='line-height:0px;font-size:0px;mso-line-height-rule:exactly;'>
      <![endif]-->
            <div style='margin:0px auto;max-width:640px;background:#ffffff;'>
                <table role='presentation' cellpadding='0' cellspacing='0' style='font-size:0px;width:100%;background:#ffffff;' align='center' border='0'>
                    <tbody>
                        <tr>
                            <td style='text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;'>
                                <!--[if mso | IE]>
      <table role='presentation' border='0' cellpadding='0' cellspacing='0'><tr><td style='vertical-align:top;width:640px;'>
      <![endif]-->
                                <div aria-labelledby='mj-column-per-100' class='mj-column-per-100 outlook-group-fix' style='vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;'>
                                    <table role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
                                        <tbody>
                                            <tr>
                                                <td style='word-break:break-word;font-size:0px;padding:0px 0px 20px;' align='left'>
                                                    <div style='cursor:auto;color:#737F8D;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:16px;line-height:24px;text-align:left;'>
                                                        <p align='center'><img src='http://esale.sistemku.net/img/logo_aplokat_border.png' alt='Party Wumpus' title='None' width='100%' style='height: auto;'></p>

                                                        <h2 style='font-family: Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;'>Hallo $r[nama]</h2>
                                                        <p>Untuk mereset password Anda silahkan klik tombol di bawah ini.</p>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='word-break:break-word;font-size:0px;padding:10px 25px;' align='center'>
                                                    <table role='presentation' cellpadding='0' cellspacing='0' style='border-collapse:separate;' align='center' border='0'>
                                                        <tbody>
                                                            <tr>
                                                                <td style='border:none;border-radius:3px;color:white;cursor:auto;padding:15px 19px;' align='center' valign='middle' bgcolor='#f98322'><a href='$link' style='text-decoration:none;line-height:100%;background:#f98322;color:white;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;text-transform:none;margin:0px;'
                                                                        target='_self'>
            Reset Password
          </a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
        </div>

</body>
";
		
		//=========================

		$alamat_tujuan = $r['email'];
		
		require 'mail/vendor/autoload.php';
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
		    $mail->addAddress($alamat_tujuan);
		    $mail->addReplyTo('support@sistemku.com', 'Support eSale');
		
		
		    $mail->isHTML(true);
		    $mail->Subject = 'Reset Password Akun eSale';
		    $mail->Body    = $isi;
		
		    $mail->send();
		

		    echo "<script>window.alert('Link reset password telah dikirim ke Email anda');
		    window.location=('../login.php')</script>";
		} catch (Exception $e) {
		    echo "<script>window.alert('Maaf email tidak terkirim silahkan kontak Developer');
        		window.location=('../login.php')</script>";
		}
//=========================
 	
	
	

	
}else{
	echo "<script>window.alert('Maaf email Anda tidak terdaftar di sistem kami');
	window.location=('../lupa-password.php')</script>";
}
?>
