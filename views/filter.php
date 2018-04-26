<?php
include "../core/fidelitec.php";
$e=new carte_fidelite();
$ec=new fidelitec();
$liste=$ec->triUser();

$j = 0 ;
foreach ($stmt as $key=>$value){
    $tabc[$j]= $value ;
    $j++ ;
}
foreach ($liste as $key =>$value ) {
    echo   $value['id']. '<br>';
}
