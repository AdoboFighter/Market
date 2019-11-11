<?php
use setasign\Fpdi\Fpdi;

require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
// $pdf = new TCPDI(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDI();

$pdf->setSourceFile('\\\\192.168.100.164\\lcr\\'.$type.'\\'.$ref_num.'.pdf');
  // f_id
  // ref_num
  // or_no
  // name_cus
  // name_encoder
  // type
  // paid
  // page substr("testers", -1)   $firstCharacter = substr($string, 0, 1)
  // copy
  // print

// this will declare the number of pages
$pageNo = 1;
$pageCount = 2;
$stringData = 'Date Now:'.$date.' Reference Number:'.$ref_num;
$orstring = 'OR Date / OR NO:'.$date_paid.'/'.$or_num;
$encodername = ' Processed & Verified by:'.$cs_encoder;
$approvename = '';
$requestername = '';
$remarks = 'Remarks:'.$remarks;
$city = 'CITY OF SAN PABLO';
$reg = 'The City Civil Registar';

// $stringData = 'Date Now:'.$date.' Reference Number:'.;
switch ($print) {
  case 'default':
    // two pages
    $pageNo =1;
    $pageCount = 2;
    break;
  case 'specific':
    // on page
    $pageNo = $page;
    $pageCount = $page;
    break;
  case 'ranges':
    // specific range
    $pageNo = substr($page, 0, 1);
    $pageCount = substr($page, -1);
    break;
  default:
    // code...
    break;
}


for ($pageNo; $pageNo <= $pageCount; $pageNo++) {
  //$tplIdx = $pdf->importPage(2);
  //
  // $tpl = $pdf->importPage($pageNo);
  // $size = $pdf->getTemplateSize($tpl);
  // $orientation = $size['h'] > $size['w'] ? 'P' : 'L';
  // $pdf->setPrintHeader(false);
  // $pdf->setPrintFooter(false);
  // $pdf->addPage($orientation);
  // $pdf->useTemplate($tpl, null, null, 0, 0, TRUE);


  $tpl = $pdf->importPage($pageNo);
  $size = $pdf->getTemplateSize($tpl);
  // $orientation = $size['h'] > $size['w'] ? 'P' : 'L';

  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);
    $pdf->addPage();
  // $pdf->useTemplate($tpl, null, null, 0, 0, TRUE);
  $pdf ->useTemplate($tpl, 10, 10, $size['w']-20, 300-30, FALSE);

  // $pageCount = $pdf->setSourceFile("apps/Par.pdf"); .' Page no '.$pageNo.' Wha print'.$_GET['print']

  $pdf->StartTransform();
  // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
  $pdf->Rotate(90, 25, 240);
  $pdf->Text(0, 220, $stringData);

  // Stop Transformation
  $pdf->StopTransform();

  $pdf->StartTransform();
  // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
  $pdf->Rotate(90, 25, 240);
  $pdf->Text(0, 225, $orstring);

  // Stop Transformation
  $pdf->StopTransform();



  $pdf->StartTransform();
  // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
  $pdf->Rotate(-90, 85, 120);
  $pdf->Text(0, 0, $stringData);
  // Stop Transformation
  $pdf->StopTransform();


  $pdf->StartTransform();
  // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
  $pdf->Rotate(-90, 85, 120);
  $pdf->Text(0, 5, $orstring);

  // Stop Transformation
  $pdf->StopTransform();

    $pdf->StartTransform();
    // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
    $pdf->Rotate(90, 25, 240);
    $pdf->Text(110, 220, $remarks);

    // Stop Transformation
    $pdf->StopTransform();




    $pdf->Text(25,265 ,$requestername);
  $pdf->Text(25,270 ,$encodername);
  $pdf->Text(120,265 ,$approvename);





///the city of san pablo
$pdf->text($size['w']/2 - 20 , 10 , $city);
$pdf->text($size['w']/2 - 20 , 15 , $reg);
}
//print function
ob_start();
  ob_clean();


$pdf->IncludeJS('print(true)');

$pdf->Output('name.pdf', 'I');

?>
