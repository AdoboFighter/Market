<?php
require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD

<h1>2F CERTIFICATION EXAMPLE 00221</h1>

EOD;

date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d');

// create new PDF document

$pdf= new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setSourceFile(APPPATH.'/..//assets/pdf/market-division-copy.pdf');
$pdf->SetDisplayMode(100);
$tpl = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tpl);
$orientation = $size['h'] > $size['w'] ? 'P' : 'L';
 $pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->addPage('P', 'A4');
$pdf->useTemplate($tpl, null, null, 0, 0, TRUE);






//
// $pdf->text(33, 130, "This is to certify that $fname $mname $lname BY: $sysuser is a <Business>,");
// $pdf->text(23, 135, "whose nature of business is $natbus , With Map#<Number> at the <address>");
//

//


$txt = '    This is to certify that '.$fname.' '.$mname.' '.$lname.' BY: ' .$sysuser.' is a Market Stall Holder, whose nature of business is '.$natbus.', With Map# '.$stall.' at the '.$floor_level.'                                                                                             ';
// $txt2 = 'With Map#<Number> at the <address> ';
$pdf->MultiCell(150, 100, $txt, 100, 'J', 100, 100, 33, 130, true);
// $pdf->MultiCell(160, 100, $txt2, 100, 'L', 0, 0, 33, 143, true);

$txt2 = '    Issued this '.$days.'th day of '.$month.', '.$year.' for whatever legal purpose it may serve.                                                                                             ';
// $txt2 = 'With Map#<Number> at the <address> ';
$pdf->MultiCell(150, 100, $txt2, 100, 'J', 100, 100, 33, 150, true);
// $pdf->MultiCell(160, 100, $txt2, 100, 'L', 0, 0, 33, 143, true);

 $pdf->text(40, 214, $or_number);
 $pdf->text(40, 219, $today);
 $pdf->text(40, 224, $payment_amount);


$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

ob_end_clean();
$pdf->Output('example_001.pdf', 'I');


exit;
?>