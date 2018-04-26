<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/21/18
 * Time: 23:53
 */

date_default_timezone_set('Africa/Tunis');

function generateRow(){
$contents = '';
require '../config.php';
$db = config::getConnexion() ;

$statement = $db->query( "SELECT id,nom,email,gender,adresse,favoris,telephone FROM user ORDER BY id DESC");
while($row = $statement->fetch())
{

$contents .="
<tr>
    <td>".$row['id']."</td>
    <td>".$row['nom']."</td>
    <td>".$row['email']."</td>
    <td>".$row['gender']."</td>
    <td>".$row['adresse']."</td>
     <td>".$row['favoris']."</td>
      <td>".$row['telephone']."</td>
</tr>";
}

return $contents;
}

require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Le Menu aux Champs Elysées");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
<h2 align="center">aux Champs Elysées</h2>
<h4> Tableaux des clients</h4>
<table border="1" cellspacing="0" cellpadding="2">
    <tr>
        <th width="5%">id</th>
        <th width="10%">nom</th>
        <th width="25%">email</th>
        <th width="15%">gender</th>
        <th width="10%">adresse</th>
        <th width="15%">favoris</th>
        <th width="20%">telephone</th>
    </tr>
    ';
    $content .= generateRow();
    $content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('user.pdf', 'I');
?>
