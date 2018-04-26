<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/17/18
 * Time: 01:25
 */
include "../core/userC.php";
session_start();
$u = new user($_POST['nom'], $_POST['email'],$_POST['gender'],$_POST['adresse'],$_POST['favoris'],$_POST['telephone'], $_POST['password']);
$ec = new userC();
$ec->modifier($u,$_SESSION['id']);
header("location:myAccount.php?id=" . $_SESSION['id']);