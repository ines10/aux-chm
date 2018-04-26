<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/18/18
 * Time: 19:22
 */
include "../core/userC.php";
$db = config::getConnexion();
$ec = new userC();
echo $ec->verifuser($_GET['str']);
