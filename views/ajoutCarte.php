<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/20/18
 * Time: 11:33
 */
include "../core/fidelitec.php";
$e = new carte_fidelite( $_POST['anniversaire'],$_POST['situation_a'],$_POST['nbre_enfants'],$_POST['date_m']);
$ec =new fidelitec();
$ec->ajouter($e);
header("Location:myAccount.php?id=" . $_SESSION['id']);
?>

