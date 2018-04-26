<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/27/18
 * Time: 15:26
 */
include '../core/eventsC.php';
$ec = new eventsC() ;
if ($ec->supprrimer($_GET['id_event'])) {
    echo "done " ;
    header("location:affiche_event.php");
}else{
    echo "nope" ;
}