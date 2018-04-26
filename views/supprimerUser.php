<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/28/18
 * Time: 12:06
 */
include "../core/userC.php";
$ec = new userC() ;
if ($ec->supprrimer($_GET['id'])) {
    echo "done " ;
    header("location:../backend/indexAdmin.php");
}else{
    echo "nope" ;
}