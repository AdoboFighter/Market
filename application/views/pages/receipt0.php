<?php

use setasign\Fpdi\Fpdi;


require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
$this->load->helper('amountwords');
ob_start();





date_default_timezone_set('Asia/Manila');
$date = date('m - d - Y');
$pdf = new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setSourceFile(APPPATH.'/..//assets/pdf/rec.pdf');
$tpl = $pdf->importPage(1);
$pdf->SetDisplayMode(100);
$size = $pdf->getTemplateSize($tpl);
$orientation = $size['h'] > $size['w'] ? 'P' : 'L';
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->addPage($orientation);
$pdf->useTemplate($tpl, null, null, 0, 0, TRUE);

$pdf->SetMargins(0, 0, 0);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

$pdf->Text(55,50 , $date);
$pdf->Text(17,59 , 'City Goverment of San Pablo');
$pdf->Text(77,59 , 'Gr A');


$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($payor == null ? '0' : $payor);
$pdf->MultiCell(80,10, $txt."\n", 0, 'L', 0, 0,17, 60, true, 0, false, true, 20, 'M', true);




$no =  json_decode($no);
$particulars =  json_decode($particulars);
$date =  json_decode($date);
$price =  json_decode($price);


$chqno =  json_decode($chqno);
$chqAmount =  json_decode($chqAmount);
$chqdate =  json_decode($chqdate);
$chqBranch =  json_decode($chqBranch);



$count = count($no,COUNT_NORMAL);
$countAddline = count($add_line,COUNT_NORMAL);

$rowspace = 0; 

for ($r = 0 ; $r < $count ; $r++){
    $rowspace = $rowspace + 5;

    $pdf->setCellPaddings(0, 0, 0, 0);
    $txt = ($particulars[$r]->particulars == null ? ' ' : $particulars[$r]->particulars);

    $pdf->MultiCell(41,0, $txt."\n", 1, 'L', 0, 0, 7,75 + $rowspace , true, 0, false, true, 10, 'M', true);
 
    $pdf->setCellPaddings(0, 0, 0, 0);
    $txt = ($no[$r]->no == null ? ' ' : $no[$r]->no);
    $pdf->MultiCell(28,0, $txt."\n", 1, 'L', 0, 0, 47,75 + $rowspace , true, 0, false, true, 10, 'M', true);
 
    
    $pdf->setCellPaddings(0, 0, 0, 0);
    $txt = ($price[$r]->price == null ? ' ' : $price[$r]->price);

    $pdf->MultiCell(25,0, $txt."\n", 1, 'R', 0, 0, 68,75 + $rowspace , true, 0, false, true, 10, 'M', true);
  
}


$pdf->setCellPaddings(2, 2, 6, 1);
$txt = ($ttlAmt == 0 ? ' ' : $ttlAmt);
$pdf->MultiCell(47,0, $txt."\n",0, 'R', 0, 0, 52, 122, true, 0, false, true, 10, 'M', true);


$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ucwords(convert_number_to_words( str_replace(',', '', $ttlAmt)));
$pdf->MultiCell(60,20, $txt."\n", 0, 'L', 1, 1,35, 128, true, 0, false, true, 24, 'M', true);



$pdf->Text(7,$paymentCol == 'cash' ? 139 : 145, 'x');

if ($paymentCol == 'bankCash'){  $pdf->Text(7,143 , 'x'); }


$pdf->Text(42,161 , 'ARJAN V. BABANI');
$pdf->Text(42,165 , 'CITY TREASURER');


$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($payment_or_number == null ? '0' : $payment_or_number);
$pdf->MultiCell(45,10, $txt."\n", 0, 'L', 0, 0,10, 165, true, 0, false, true, 10, 'M', true);



$pdf->Text(10,30 ,$chqAmount[0]->chqAmount );
$pdf->Text(10,30 ,"das");



$pdf->setCellPaddings(2, 4, 6, 8);
$pdf->MultiCell(20,22,($paymentCol == 'bank'|| $paymentCol == 'bankCash'  ? ( $chqBranch[1]->chqBranch == null ? '0' : $chqBranch[1]->chqBranch): '')."\n", 0, 'L', 0, 0,72,147, true, 1, false, true,16, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);  
$pdf->MultiCell(20,22,($paymentCol == 'bank' || $paymentCol == 'bankCash' ? ( $chqdate[1]->chqdate == null ? '0' : $chqdate[1]->chqdate): '')."\n", 0, 'L', 0, 0,52,147, true, 1, false, true,16, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$pdf->MultiCell(20,22,($paymentCol == 'bank' || $paymentCol == 'bankCash'  ? ( $chqAmount[1]->chqAmount == null ? '0' : $chqAmount[1]->chqAmount): '')."\n", 0, 'L', 0, 0,32,147, true, 1, false, true,16, 'M', true);






// ---------------------------------------------------------


ob_end_clean();
$pdf->IncludeJS("print();");
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

exit;
?>
