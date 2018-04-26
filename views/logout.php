<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/11/18
 * Time: 15:34
 */
    session_start();
    setcookie('remember', NULL, -1);
    session_destroy();
    header("Location:../index1.php"); // Redirecting To Home Page

?>