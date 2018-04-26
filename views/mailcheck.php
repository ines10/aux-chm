<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/17/18
 * Time: 10:12
 */
include "../core/userC.php";
    $db = config::getConnexion();
    $ec = new userC();
    echo $ec->verifmailuser($_GET['str']);