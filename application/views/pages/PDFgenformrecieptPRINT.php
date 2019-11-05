<?php
use setasign\Fpdi\Fpdi;

require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
date_default_timezone_set('Asia/Manila');
$date = date('m - d - Y');

$pdf = new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setSourceFile(APPPATH.'/../assets/pdf/rec.pdf');
 $tpl = $pdf->importPage(1);
$pdf->SetDisplayMode(100);
$size = $pdf->getTemplateSize($tpl);
$orientation = $size['h'] > $size['w'] ? 'P' : 'L';
 $pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->addPage($orientation);
 $pdf->useTemplate($tpl, null, null, 0, 0, TRUE);

 $pdf->addpage();
 $pdf->deletePage(1);


$pdf->Text(55,50 , date('Y-m-d'));
$pdf->Text(17,59 , 'City Goverment of San Pablo');
  $pdf->Text(77,59 , 'Gr A');
$pdf->Text(17,65 , ($payor == null ? 'no payor input!' : $payor));
$pdf->Text(10,83 , ($type == null ? '0' : $type));

// $pdf->Text(47,83 , ($_GET['orno'] == null ? '0' : $_GET['orno']));
$pdf->Text(75,83 , ($amount == null ? '0' : $amount));

$pdf->Text(75,125 , ($amount == null ? '0' : $amount));
$pdf->Text(42,171 , 'ARJAN B. BABANI');
$pdf->Text(42,175 , 'CITY TREASURER');

$js = 'print(true);';

ob_end_clean();
$pdf->IncludeJS($js);
 $pdf->Output('name.pdf', 'I');
  ?>
