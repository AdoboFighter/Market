<?php

use setasign\Fpdi\Fpdi;


require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');

ob_start();




$pdf= new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setSourceFile(APPPATH.'/..//assets/pdf/rec.pdf');
$pdf->SetDisplayMode(100);
$tpl = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tpl);
$orientation = $size['h'] > $size['w'] ? 'P' : 'L';
 $pdf->setPrintHeader(false);
 $pdf->setPrintFooter(false);
 $pdf->addPage($orientation);
$pdf->useTemplate($tpl, null, null, 0, 0, TRUE);
$pdf->addpage();
$pdf->deletePage(1);


// Print text using writeHTMLCell()
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);



$date = date("d/m/Y");
$pdf->Text(50 , 50 , $date);
$pdf->Text(16 , 66 , $fullname);

$pdf->Text(7 , 82 , $type_of_payment);
$pdf->Text(74 , 82 , $amount_to_pay);

$pdf->Text(7 , 88 , $text1);
$pdf->Text(74 , 88 , $num1);

$pdf->Text(7 , 93 , $text2);
$pdf->Text(74 , 93 , $num2);

$pdf->Text(7 , 99 , $text3);
$pdf->Text(74 , 99 , $num3);

$pdf->Text(7 , 104 , $text4);
$pdf->Text(74 , 104 , $num4);

$pdf->Text(7 , 109 , $text5);
$pdf->Text(74 , 109 , $num5);

$pdf->Text(7 , 114 , $text6);
$pdf->Text(74 , 114 , $num6);

$pdf->Text(7 , 119 , $text7);
$pdf->Text(74 , 119 , $num7);


$pdf->Text(74 , 125 , $total);
$pdf->Text(7,138 ,$ntw);

$pdf->Text(33, 150, $bank1);
$pdf->Text(53, 150, $checkNum1);
$pdf->Text(72, 150, $checkDate1);

$pdf->Text(33, 154, $bank2);
$pdf->Text(53, 154, $checkNum2);
$pdf->Text(72, 154, $checkDate2);

$pdf->Text(33, 158, $bank3);
$pdf->Text(53, 158, $checkNum3);
$pdf->Text(72, 158, $checkDate3);

// $pdf->Text(35, 165, $bank2);

// $pdf->Text(35, 165, $bank3);

if($payment_type == "cash"){

}
if($payment_type == "cheque"){

}




// ---------------------------------------------------------


ob_end_clean();
$pdf->IncludeJS("print();");
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

exit;
?>
