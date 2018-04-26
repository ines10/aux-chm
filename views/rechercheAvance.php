<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/15/18
 * Time: 17:16
 */
include "../core/userC.php" ;
$userc = new userC() ;
$a = $userc->afficherechercheavance($_GET['str']) ;
$myJSON = json_encode($a) ;
if ($_GET['str'] == ""){
    echo "null" ;
}else{
    "hellooooooo " ;
}
echo $myJSON ;