<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/19/18
 * Time: 19:38
 */
include "../core/eventsC.php";
$e = new event($_POST['eventname'], $_POST['date'], $_POST['duration'],$_POST['starttime'],$_POST['endtime'],$_POST['category']);
$ev = new eventsC();
$ev->modifier($e,$_GET['id_event']);

var_dump($ev);
header("location:affiche_event.php");
?>

