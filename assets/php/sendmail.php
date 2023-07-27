<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST["name"];
$mail = $_POST["mail"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


$mail = new PHPMailer(true);
try {
 //Server settings
 $mail->CharSet = 'UTF-8';
 $mail->SMTPDebug = 0; // debug on - off
 $mail->isSMTP(); 
 $mail->Host = 'smtp.turkticaret.net'; // SMTP sunucusu örnek : mail.alanadi.com
 $mail->SMTPAuth = true; // SMTP Doğrulama
 $mail->Username = 'info@enesagalar.com'; // Mail kullanıcı adı
 $mail->Password = 'Enesranamelis1.'; // Mail şifresi
 $mail->SMTPSecure = 'tsl'; // Şifreleme
 $mail->Port = 587; // SMTP Port
 $mail->SMTPOptions = array(
 'ssl' => array(
 'verify_peer' => false,
 'verify_peer_name' => false,
 'allow_self_signed' => true
 )
);

 //Alıcılar
 $mail->setfrom('info@enesagalar.com', $_POST['name']);
 $mail->addAddress('info@enesagalar.com');
 $mail->addAddress('info@enesagalar.com', $_POST['name']);
 
 //İçerik
 $mail->isHTML(true);
 

 $mail->Subject = $_POST['subject'];
 $mail->Body = $_POST['message'];
$mail->Body = "<b>Gönderen:</b> " . $_POST['name'] . " (" . $_POST['mail'] . ")<br><br>" . $_POST['message'];

$mail->AltBody = strip_tags($_POST['message']); // E-posta istemcilerinde düz metin görüntülemesi için

 
 
 $mail->send();
 echo "<script>alert('Mesajınız İletildi --> ".$_POST['name']."');</script>";
 echo '<script>window.location.href = "../../index.html";</script>';
} catch (Exception $e) {
 echo 'Mesajınız İletilemedi. Hata: ', $mail->ErrorInfo;
 echo '<a href="../../index.html">Ana Sayfaya Dön</a>';
}

?>