<?php
require '../autoload.php';
if(isset($_POST['submitpost'])){
if(isset($_POST['g-recaptcha-response'])){
$recaptcha = new \ReCaptcha\ReCaptcha('6LfbdU0UAAAAAOSHpKGGTamJvfQAOJha0AykKD68');
$resp = $recaptcha->verify($_POST['g-recaptcha-response']);
if ($resp->isSuccess()) {
    var_dump('Captcha Valide');
// verified!
// if Domain Name Validation turned off don't forget to check hostname field
// if($resp->getHostName() === $_SERVER['SERVER_NAME']) {  }
} else {
    $errors = $resp->getErrorCodes();
    var_dump('Captcha inValide');
    var_dump($errors);
}}
else{
    var_dump("captcha no rempli");
}}
?>
