<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/Users/macbook/Desktop/untitled1/vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'iines4802@gmail.com';                 // SMTP username
    $mail->Password = 'Nousa10497';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('iines4802@gmail.com', 'Mailer');
    $mail->addAddress('iines4802@gmail.com', 'Joe User');     // Add a recipient
//    $mail->addAddress($_POST['email']);               // Name is optional
//    $mail->addReplyTo($_POST['email'], 'Information');
//    $mail->addCC($_POST['email']);
//    $mail->addBCC($_POST['email']);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '"please click on the link below <br><br>
    <a href=\'http://localhost:63342/untitled1/confirm.php?email=iines4802@gmail.com&confirmation_token=e9vjwjILGx\'>clickhere</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
