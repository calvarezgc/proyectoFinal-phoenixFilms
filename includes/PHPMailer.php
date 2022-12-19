<style>
  .alert {
    padding: 1rem;
    border-radius: 5px;
    color: white;
    margin: 1rem 0;
  }

  .alert-success {
    color: greenyellow;
  }

  .alert.alert-danger {
    color: #fc5555;
  }

  .alert-info {
    color: #ff55a5;
  }

  .alert-warning {
    color: #ff9966;
  }
</style>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require('includes/config.php');

//Create an instance; passing `true` enables exceptions



$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = $MailerDebug;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = $MailerHost;                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = $MailerUsername;                     //SMTP username
  $mail->Password   = $MailerPassword;                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($MailerFrom, $sitioTitulo);
  $mail->addAddress($mailto);     //Add a recipient

  $mail->addReplyTo($MailerReply, 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  //Attachments
  //$mail->addAttachment('c:/wamp22/www/infinity/admin/img/alberto.gif');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $asunto;
  $mail->Body    = $textomail;
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo "<div class='alert alert-info'>Mensaje Enviado correctamente</div>";
} catch (Exception $e) {
  //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  echo 'error99';
}
