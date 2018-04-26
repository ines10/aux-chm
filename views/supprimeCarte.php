<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/26/18
 * Time: 20:48
 */

include "../core/fidelitec.php";
$ec = new fidelitec() ;
if ($ec->supprrimer($_GET['id_carte'])) {
    echo "done " ;
    header("location:../backend/indexAdmin.php");
}else{
    echo "nope" ;
}
