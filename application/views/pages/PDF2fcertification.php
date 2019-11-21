<?php
require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
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
// $pdf->text(33, 150, "Issued this day of <month>, <year> for whatever legal purpose it may serve");
//


$txt = '    This is to certify that '.$fname.' '.$mname.' '.$lname.' BY: ' .$sysuser.' is a Market Stall Holder, whose nature of business is '.$natbus.', With Map# '.$stall.' at the '.$floor_level.'                                                                                             ';
// $txt2 = 'With Map#<Number> at the <address> ';
$pdf->MultiCell(150, 100, $txt, 100, 'J', 100, 100, 33, 130, true);
// $pdf->MultiCell(160, 100, $txt2, 100, 'L', 0, 0, 33, 143, true);

$txt2 = '    Issued this '.$days.'th day of '.$month.', '.$year.' for whatever legal purpose it may serve.                                                                                             ';
// $txt2 = 'With Map#<Number> at the <address> ';
$pdf->MultiCell(150, 100, $txt2, 100, 'J', 100, 100, 33, 150, true);
// $pdf->MultiCell(160, 100, $txt2, 100, 'L', 0, 0, 33, 143, true);


$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

ob_end_clean();
$pdf->Output('example_001.pdf', 'I');


exit;
