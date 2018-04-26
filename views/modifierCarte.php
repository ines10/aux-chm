<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/18/18
 * Time: 22:00
 */
include "../core/fidelitec.php";
session_start();
$c = new carte_fidelite($_POST['anniversaire'], $_POST['situation_a'],$_POST['nbre_enfants'],$_POST['date_m'] );
$ec = new fidelitec();
$ec->modifier($c,$_GET['id']);
var_dump($ec);
header("location:myAccount.php?id=" . $_SESSION['id']);