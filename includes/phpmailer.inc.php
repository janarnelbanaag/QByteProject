<!-- To be implemented -->

<?php


require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
// include './reset-request.inc.php';

session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'qbytemail2022@gmail.com';                     //SMTP username
    $mail->Password   = 'qbytepassword@2022';                              //SMTP password
    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('qbytemail2022@gmail.com', 'Mailer');
    $mail->addAddress($userEmail);               //Name is optional
    // $mail->addAddress('cm201740@gmail.com');               //Name is optional
    $mail->addReplyTo('qbytemail2022@gmail.com', 'Mailer');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset your password for Qbyte';
    $mail->Body    = '
    <p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</br>Here is your password reset link: </br>
    <a href="' . $url . '">' . $url . '</a>
    </p>
    ';
    $mail->AltBody = 'We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email. Here is your password reset link' . $url;

    $mail->send();
    // echo 'Message has been sent';
    $mail->smtpClose();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // header("Location: ../php/index.php?phpmailererror");
    // exit();
}