<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
date_default_timezone_set('Asia/Kolkata');
$tag= $_GET['s'];
$id= $_GET['id']; 
$company= $_GET['cy'];  
$html = file_get_contents("invoice.html");
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("Delivery_Challan.pdf", array("Attachment" => false));
if($company==2){
    $company="Shashwat";
}else{
    $company="Hindtex";
}
// date-company--dc.no
if($tag==1){
file_put_contents('Delivery_Challan/Generated-'.date("d-m-Y-H-i-s").'-'.$company.'-'.$id.'.pdf', $dompdf->output());
}
else if($tag==2){
    file_put_contents('Delivery_Challan/Edited-'.date("d-m-Y-H-i-s").'-'.$company.'-'.$id.'.pdf', $dompdf->output());
    }
