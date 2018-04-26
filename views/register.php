<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/11/18
 * Time: 19:16
 */
include "../core/userC.php";
$db = config::getConnexion();
    $u = new user($_POST['nom'], $_POST['email'],$_POST['gender'],$_POST['adresse'],$_POST['favoris'],$_POST['telephone'],$_POST['password'],$_POST['photo']);
    $ec = new userC();
    $rr=$ec->verifToken($_POST['email']);
    echo $rr[0];
    //SEND EMAIL Confirmation
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include 'vendor/autoload.php';
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
    $mail->setFrom($_POST['email'], 'Mailer');
    $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient
    $mail->addAddress($_POST['email']);               // Name is optional
    $mail->addReplyTo($_POST['email'], 'Information');
    $mail->addCC($_POST['email']);
    $mail->addBCC($_POST['email']);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '"please click on the link below <br><br>
<a href="http://localhost:63342/untitled1/views/confirm.php?id='.$rr[1].'&confirmation_token='.$rr[0].'">clique ici </a>"';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    $ec->register($u);

    $ec->sendSms($_POST['telephone'],"Merci pour vore registrement ");


//    header("location:../index1.php");
?>

