<?php

use setasign\Fpdi\Fpdi;


require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');

ob_start();


// // create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // set document information
// $pdf->SetCreator(PDF_CREATOR);


// // set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
// $pdf->setFooterData(array(0,64,0), array(0,64,128));

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// // set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// // set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// // set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// // set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// // set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//     require_once(dirname(__FILE__).'/lang/eng.php');
//     $pdf->setLanguageArray($l);
// }

// // ---------------------------------------------------------

// // set default font subsetting mode
// $pdf->setFontSubsetting(true);

// // Set font
// // dejavusans is a UTF-8 Unicode font, if you only need to
// // print standard ASCII chars, you can use core fonts like
// // helvetica or times to reduce file size.
// $pdf->SetFont('dejavusans', '', 14, '', true);

// // Add a page
// // This method has several options, check the source code documentation for more information.
// $pdf->AddPage();

// // $pdf->Text(50 , 50 , $fullname);

// // set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// // Set some content to print
// $html = <<<EOD




// EOD;



// date_default_timezone_set('Asia/Manila');
// $date = date('Y/m/d');

// create new PDF document

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
// $pdf->addpage();
// $pdf->deletePage(1);

 // int MultiCell (float $w, float $h, string $txt, [mixed $border = 0], [string $align = 'J'], [int $fill = 0], [int $ln = 1], [int $x = ''], [int $y = ''], [boolean $reseth = true], [int $stretch = 0])
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$pdf->setCellPaddings(0, 0, 0, 0);
// $txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
// $pdf->MultiCell(93, 5, '                        :'.$txt, 1, '', 0, 1, '8', '132', true);


$date = date("d/m/Y");
$pdf->Text(50 , 50 , $date);
$pdf->Text(8, 57 , "City Government of San Pablo City");
$pdf->Text(77 , 57 , "GF-MKT");
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
// $pdf->Text(7,138 ,$ntw);
$pdf->MultiCell(93, 5, '                        :'.$ntw, 1, '', 0, 1, '8', '132', true);

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
// $pdf->IncludeJS("print();");
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

exit;
?>
