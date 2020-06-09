<?php

use setasign\Fpdi\Fpdi;


require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
$this->load->helper('amountInWords');
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

$pdf->Text(55,50  , date('Y-m-d'));

$pdf->Text(17,58 , 'City Government of San Pablo');




$pdf->setCellPaddings(0, 0, 0, 0);
$txt ='City Government of San Pablo';
$pdf->MultiCell(80,58, $txt."\n", 1, 'L', 1, 1,15, 50, true, 0, false, true, 10, 'M', true);

$pdf->Text(77,58, 'Gr A');

$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($fullname == null ? '0' : $fullname);
$pdf->MultiCell(80 , 66 , $txt."\n", 1, 'L', 1, 1,15, 60, true, 0, false, true, 10, 'M', true);




$no =  json_decode($no);
$particulars =  json_decode($particulars);
$date =  json_decode($date);
$price =  json_decode($price);

$count = count($no,COUNT_NORMAL);
$rowspace = 0; 

for ($r = 0 ; $r < $count ; $r++){
    $row = $row - 5; 
    $mhspace = $mhspace - 1;

    $pdfv2->setCellPaddings(2, 0, 6, 0);
    $txt = ($no[$r]->no == null ? ' ' : $no[$r]->no);
    $pdfv2->MultiCell(65,0, $txt."\n", 1, 'L', 0, 0, 8+ $w, ($row + $rowspace) + 5, true, 0, false, true, 10, 'M', true);
    
}

// $date = date("d/m/Y");
// $pdf->Text(50 , 50 , $date);
// $pdf->Text(16 , 66 , $fullname);

// $pdf->Text(7 , 82 , $type_of_payment);
// $pdf->Text(74 , 82 , $amount_to_pay);

// $pdf->Text(7 , 88 , $text1);
// $pdf->Text(74 , 88 , $num1);

// $pdf->Text(7 , 93 , $text2);
// $pdf->Text(74 , 93 , $num2);

// $pdf->Text(7 , 99 , $text3);
// $pdf->Text(74 , 99 , $num3);

// $pdf->Text(7 , 104 , $text4);
// $pdf->Text(74 , 104 , $num4);

// $pdf->Text(7 , 109 , $text5);
// $pdf->Text(74 , 109 , $num5);

// $pdf->Text(7 , 114 , $text6);
// $pdf->Text(74 , 114 , $num6);

// $pdf->Text(7 , 119 , $text7);
// $pdf->Text(74 , 119 , $num7);


// $pdf->Text(74 , 125 , $total);
// $pdf->Text(7,138 ,$ntw);

// $pdf->Text(33, 150, $bank1);
// $pdf->Text(53, 150, $checkNum1);
// $pdf->Text(72, 150, $checkDate1);

// $pdf->Text(33, 154, $bank2);
// $pdf->Text(53, 154, $checkNum2);
// $pdf->Text(72, 154, $checkDate2);

// $pdf->Text(33, 158, $bank3);
// $pdf->Text(53, 158, $checkNum3);
// $pdf->Text(72, 158, $checkDate3);

// $pdf->Text(35, 165, $bank2);

// $pdf->Text(35, 165, $bank3);

if($payment_type == "cash"){

}
if($payment_type == "cheque"){

}


$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ucwords(convert_number_to_words( str_replace(',', '', $Amount)));
$pdf->MultiCell(60,20, $txt."\n", 0, 'L', 1, 1,35, 128, true, 0, false, true, 24, 'M', true);


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
