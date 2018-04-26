<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/18/18
 * Time: 19:15
 */
include "../core/fidelitec.php";
$db = config::getConnexion();
$ec = new fidelitec();
echo $ec->verifcarte();
