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


$txt = '     This is to certify that Mr./Mrs./Ms. '.$fname.' '.$mname.' '.$lname.' is a ' .$client.' at the San Pablo City Public Market and Shopping Mall, whose nature of business is '.$natbus.', With Map# '.$stall.' and has no operation since '.$operation_date1.' to '.$operation_date2.'.                                  ';
$pdf->MultiCell(150, 1, $txt, 1, 'J', 100, 100, 33, 130, true);

$txt2 = '    Issued this '.$days.'th day of '.$month.', '.$year.' for whatever legal purpose it may serve.                 ';

$pdf->MultiCell(150, 1, $txt2, 1, 'J', 100, 100, 33, 170, true);

$style = array(
    'border' => 2,
    'padding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => array(255,255,255)
);
$pdf->write2DBarcode($refnum, 'QRCODE,H', 145, 215, 30, 30, $style, 'N');


$pdf->text(40, 214, $or_number);
$pdf->text(40, 219, $today);
$pdf->text(40, 224, $payment_amount);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
ob_end_clean();
$pdf->Output('example_001.pdf', 'I');
exit;
