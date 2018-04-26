<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/21/18
 * Time: 10:01
 */
session_start();
    require '../fpdf-barcode-master/pdf_barcode.php';
    $fpdf = new PDF_BARCODE('P','mm','A4');
    $fpdf->AddPage();
    $fpdf->EAN13(10,10,$_SESSION['id'],5,1,9);
    $fpdf->Output();
?>
