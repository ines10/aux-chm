<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/27/18
 * Time: 12:29
 */
include "../core/eventsC.php";
date_default_timezone_set('Africa/Tunis');

    $ev = new event( $_POST['eventname'],$_POST['date'],$_POST['duration'],$_POST['starttime'],$_POST['endtime'],$_POST['category']);
    $ec = new eventsC();
    $ec->ajouter($ev);
    header('location:affiche_event.php');
?>