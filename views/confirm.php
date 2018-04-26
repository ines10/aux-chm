<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/21/18
 * Time: 12:31
 */

require '../config.php';
$pdo= config::getConnexion();
$user_id = $_GET['id'];
$token = $_GET['confirmation_token'];
$req = $pdo->prepare('SELECT * from user WHERE id = ?');
$req->execute(['$user_id']);
$user = $req->fetch();
session_start();
$pdo->prepare('UPDATE user SET confirmation_token=NULL ,confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
$_SESSION['auth'] =$user;
die('ok');

