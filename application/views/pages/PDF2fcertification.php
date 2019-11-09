<?php
require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d');

// create new PDF document

$pdf= new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setSourceFile(APPPATH.'/..//assets/pdf/Template1.pdf');
$pdf->SetDisplayMode(100);
$tpl = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tpl);
$orientation = $size['h'] > $size['w'] ? 'P' : 'L';
 $pdf->setPrintHeader(false);
 $pdf->setPrintFooter(false);
 $pdf->addPage($orientation);
$pdf->useTemplate($tpl, null, null, 0, 0, TRUE);





// Set some content to print


$html = <<<EOD
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p margin="10">TO WHOM IT MAY CONCERN</p>
<br>
<br>

<p>This is to certify that $fname $mname $lname is a business, whose nature of</p>

EOD;





// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// $pdf->Text(44,100, $fname);
// $pdf->Text(44,80, $mname);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

exit;
