<?php
use setasign\Fpdi\Fpdi;
require_once(APPPATH.'/../assets/pdfmerge/TCPDF-master/tcpdf.php');
require_once(APPPATH.'/../assets/pdfmerge/tcpdi/tcpdi.php');
// require_once(APPPATH.'/../assets/pdfmerge/tcpdf_include.php');

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
$pdf->SetAutoPageBreak(true, 0);
$ttl_amt_due = (int)$total_amnt_due;
$ttl_amt_due = (int)$total_permit_fee;
$tinplate = (int)$tinplate_fee;
$verification = (int)$verification_fee;
$sticker = (int)$sticker_fee;
$service = (int)$service_license_fee;
$total_permit = (int)$total_permit_fee;
$seminar = (int)$seminar_fee;
$occupation = (int)$occupation_fee;
$Amt = (int)$Amount;

$min5 = 5;
$pdf->Text(55,50  , date('Y-m-d'));

$pdf->Text(17,58 , 'City Government of San Pablo');
$pdf->Text(77,58, 'Gr A');

// $pdf->setCellPaddings(2, 4, 6, 8);
// $txt = ($payor == null ? '0' : $payor);
// $pdf->MultiCell(90, 50, $txt, 0, 'L', 1, 2, 16, 61, true);


$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($payor == null ? '0' : $payor);
$pdf->MultiCell(80,10, $txt."\n", 1, 'L', 1, 1,15, 60, true, 0, false, true, 20, 'M', true);


$pdf->Text(5,81  - $min5, 'BT/MP');
$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($ttlbt == null ? '0' : $ttlbt) .'/'. ($mp == null ? '0' : $mp);
// $txt ="12,123,654.50" .'/'. ($mp == null ? '0' : $mp);
$pdf->MultiCell(68,7, $txt."\n", 1, 'R', 1, 1,32, 77, true, 0, false, true, 20, 'M', true);

$pdf->Text(5,87 - $min5 , 'AIF');
$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($total_annual_inspection == null ? '0' : $total_annual_inspection);
$pdf->MultiCell(68,7, $txt."\n", 1, 'R', 1, 1,32, 82, true, 0, false, true, 20, 'M', true);

$pdf->Text(5,92  - $min5, 'GF/DF');
$pdf->setCellPaddings(2, 4, 6, 8);

$txt =($garbage_fee == null ? '0' : $garbage_fee) .' / '.  ($total_service == null ? '0' : $total_service);
$pdf->MultiCell(70,7, $txt."\n", 1, 'R', 1, 1,30, 87, true, 0, false, true, 20, 'M', true);

// $pdf->Text(7,97 - $min5 , 'Health Cert Fee & S.S.F');
$pdf->Text(5,97 - $min5 , 'H.S.S.F/Occ Fee');
$pdf->setCellPaddings(2, 4, 6, 8);
$txt =($health_fee == null ? '0' : $health_fee) .' / '. ($sworn_fee == null ? '0' : $sworn_fee) .' / '. ($occupation_fee == null ? '0' : $occupation_fee) ;
$pdf->MultiCell(55,7, $txt."\n", 1, 'R', 1, 1,45, 93, true, 0, false, true, 20, 'M', true);


$pdf->Text(5,102  - $min5, 'Tinplt/Stckr/Verf');
$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ($tinplate_fee == null ? '0' : $tinplate_fee)  .' / '. ($sticker_fee == null ? '0' : $sticker_fee).' / '. ($verification_fee == null ? '0' : $verification_fee) ;
$pdf->MultiCell(50,7, $txt."\n", 1, 'R', 1, 1,50, 98, true, 0, false, true, 20, 'M', true);

$pdf->Text(5,108  - $min5, 'Brgy Fee');
$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ($brgy_fee == null ? '0' : $brgy_fee);
$pdf->MultiCell(68,7, $txt."\n", 1, 'R', 1, 1,32, 103, true, 0, false, true, 21, 'M', true);

$pdf->Text(5,113 - $min5 , 'Sur.& Pen.');
$txt = $surcharge.' / '.$interest;
$pdf->MultiCell(70,7, $txt."\n", 1, 'R', 1, 1,30, 108, true, 0, false, true, 21, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$txt = 'Cen/Zon/Vet/Fix/Sem';
$pdf->MultiCell(44,7, $txt."\n", 1, 'R', 1, 1,5, 113, true, 0, false, true, 21, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ($cenro_fee == null ? '0' : $cenro_fee).' / '.($zoning_fee == null ? '0' : $zoning_fee).' / '.($veteran_fee == null ? '0' : $veteran_fee).' / '.($total_fixed_tax == null ? '0' : $total_fixed_tax).' / '.($seminar_fee == null ? '0' : $seminar_fee);
// $txt = "1,233.00/2,233.00/4,234.00/10,234.00";
$pdf->MultiCell(59,7, $txt."\n", 1, 'R', 1, 1,41, 114, true, 0, false, true, 19, 'M', true);


// $pdf->setCellPaddings(2, 4, 6, 8);
// $txt = ($Amount == null ? '0' : $Amount);
// $pdf->MultiCell(40,7, $txt."\n", 1, 'R', 1, 1,60, 119, true, 0, false, true, 21, 'M', true);


$pdf->Text(7,$mode_payment == 'CASH' ? 139 : 145, 'x');

if ($mode_payment == 'BANK_CASH'){
$pdf->Text(7,139 , 'x');
}

// $pdf->setCellPaddings(2, 4, 6, 8);
// // $txt = ($AmountinWords == null ? '0' : $AmountinWords);
// $txt = ucwords(numberTowords( str_replace(',', '', $Amount)));
// $pdf->MultiCell(60,20, $txt."\n", 0, 'L', 1, 1,35, 128, true, 0, false, true, 24, 'M', true);

// $cheque_re=  json_decode($cheque_received);
// $chq_count = count($cheque_re,COUNT_NORMAL);

// for ($r = 0 ; $r < $chq_count ; $r++){
// // $r = 1;
$pdf->setCellPaddings(2, 4, 6, 8);
$pdf->MultiCell(20,22,($mode_payment == 'BANK' || $mode_payment == 'BANK_CASH'  ? ( $Bank_chq == null ? '0' : $Bank_chq): '')."\n", 0, 'L', 0, 0,32,147, true, 1, false, true,16, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$pdf->MultiCell(20,22,($mode_payment == 'BANK' || $mode_payment == 'BANK_CASH' ? ( $Cheque_no == null ? '0' : $Cheque_no): '')."\n", 0, 'L', 0, 0,52,147, true, 1, false, true,16, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$pdf->MultiCell(20,22,($mode_payment == 'BANK'|| $mode_payment == 'BANK_CASH'  ? ( $Date_bnk == null ? '0' : $Date_bnk): '')."\n", 0, 'L', 0, 0,72,147, true, 1, false, true,16, 'M', true);

$pdf->Text(6,160, ($or_number == null ? '0' : $or_number));
$pdf->Text(5,165, 'BIN: ' .$bin_id);



if ($amount_credit != 0 ){
$ttlamount = ($Amount == null ? '0' : $Amount);
$pdf->setCellPaddings(2, 4, 6, 8);
$txt =  'Credit amt received: '.number_format((float)$amount_credit, 2 );
$pdf->MultiCell(95,20, $txt."\n", 0, 'L', 1, 1,5, 169, true, 0, false, true, 18, 'M', true);


$pdf->setCellPaddings(2, 4, 6, 8);
$total  =    (float)str_replace(',', '', $ttlamount) - (float)str_replace(',', '', $amount_credit) ;
$txt =  number_format((float)$total, 2 );
$pdf->MultiCell(40,7, $txt."\n", 0, 'R', 0, 1,60, 119, true, 0, false, true, 21, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ucwords(convert_number_to_words( str_replace(',', '', $total)));
$pdf->MultiCell(60,20, $txt."\n", 0, 'L', 1, 1,35, 128, true, 0, false, true, 24, 'M', true);
}


else{

$pdf->setCellPaddings(2, 4, 6, 8);
$txt = ($Amount == null ? '0' : $Amount);
$pdf->MultiCell(40,7, $txt."\n", 1, 'R', 1, 1,60, 119, true, 0, false, true, 21, 'M', true);

$pdf->setCellPaddings(2, 4, 6, 8);
// $txt = ($AmountinWords == null ? '0' : $AmountinWords);
$txt = ucwords(convert_number_to_words( str_replace(',', '', $Amount)));
$pdf->MultiCell(60,20, $txt."\n", 0, 'L', 1, 1,35, 128, true, 0, false, true, 24, 'M', true);

}

if ($credit_Amount != 0 ){
$v = str_replace(",", "",$credit_Amount);
$txt ='Cheque received: '.number_format($v,2);
// $txt = number_format((float)$credit_Amount, 2 );
// $pdf->Text(5,173, 'Cheque received: '.$txt );
$pdf->MultiCell(95,20, $txt."\n", 0, 'L', 1, 1,5, 173, true, 0, false, true, 18, 'M', true);
}



$pdf->Text(42,161, 'ARJAN V. BABANI');
$pdf->Text(42,165 , 'CITY TREASURER');


ob_start();
ob_clean();
$pdf->Output('name.pdf', 'I');





// function numtowords($x)
// {
//     $oneto19 = array("","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","ELEVEN","TWELVE","THIRTEEN","FOURTEEN","FIFTEEN","SIXTEEN","SEVENTEEN","EIGHTEEN","NINETEEN");
//     $tens = array("","","TWENTY","THIRTY","FOURTY","FIFTY","SIXTY","SEVENTY","EIGHTY","NINETY");
//     $hundreds = array("","ONE HUNDRED","TWO HUNDRED","THREE HUNDRED", "FOUR HUNDRED", "FIVE HUNDRED", "SIX HUNDRED", "SEVEN HUNDRED" ,"EIGHT HUNDRED" ,"NINE HUNDRED");
//     $scale = array("","","THOUSAND", "MILLION");

//     $num = number_format($x,2,".",",");
//     $num_arr = explode(".",$num);

//     $numwords = "";

//         $wholenum = $num_arr[0];
//         $decnum = $num_arr[1];
//         $whole_arr = explode(",",$wholenum);

//         $whole_count = count($whole_arr);
//         $scaleCounter = $whole_count;
//         for($i=0;$i<$whole_count;$i++)
//         {
//             $digitcount = strlen($whole_arr[$i]);

//             switch($digitcount)
//             {
//                 case "3":
//                     $digit3 = substr($whole_arr[$i],0,1);
//                     $whole_arr[$i] = $whole_arr[$i] - ($digit3 * 100);
//                     $numwords .= "".$hundreds[$digit3]." ";
//                 case "2":
//                     $digit2 = substr($whole_arr[$i],0,1);
//                     if($digit2 < 2)
//                     {
//                         $digit1 = substr($whole_arr[$i],1,1);
//                         $digit21 = $digit2."".$digit1;
//                         $numwords .= $oneto19[$digit21]." ";
//                     break;
//                     }
//                     else
//                     {
//                         $digit2 = substr($whole_arr[$i],0,1);
//                         $whole_arr[$i] = $whole_arr[$i] - ($digit2 * 10);
//                         $numwords .= $tens[$digit2]." ";
//                     }
//                 case "1":
//                     $digit1 = substr($whole_arr[$i],0,1);
//                     $whole_arr[$i] = $whole_arr[$i] - ($digit1 * 1);
//                     $numwords .= $oneto19[$digit1]." ";

//                 break;
//             }
//             $numwords .= $scale[$scaleCounter]." ";
//             $scaleCounter--;
//         }
//         if($decnum > 0){
//             $numwords .= " PESOS and ";
//                 if($decnum < 20 ){

//                     if($decnum<10)
//                     {
//                        $decnum = str_replace(0,"",$decnum);
//                         $numwords .= $oneto19[$decnum];
//                     }
//                     else{
//                         $numwords .= $oneto19[$decnum];
//                     }
//                 }elseif($decnum < 100){
//                     $numwords .= $tens[substr($decnum,0,1)];
//                     $numwords .= " ".$oneto19[substr($decnum,1,1)];

//                 }
//                 $numwords .= ' '.'CENTS';
//             }

//     else{
//         $numwords .= 'PESOS';
//     }



//         return $numwords;



// }



function convert_number_to_words($number) {

    $number = $number + 0;


    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }

        $string .= implode(' ', $words);
        $string .= ' Cents';
    }

    return $string;
}


// function numberTowords($num)
// {

// $ones = array(
// 0 =>"ZERO",
// 1 => "ONE",
// 2 => "TWO",
// 3 => "THREE",
// 4 => "FOUR",
// 5 => "FIVE",
// 6 => "SIX",
// 7 => "SEVEN",
// 8 => "EIGHT",
// 9 => "NINE",
// 10 => "TEN",
// 11 => "ELEVEN",
// 12 => "TWELVE",
// 13 => "THIRTEEN",
// 14 => "FOURTEEN",
// 15 => "FIFTEEN",
// 16 => "SIXTEEN",
// 17 => "SEVENTEEN",
// 18 => "EIGHTEEN",
// 19 => "NINETEEN",
// "014" => "FOURTEEN"
// );
// $tens = array(
// 0 => "ZERO",
// 1 => "TEN",
// 2 => "TWENTY",
// 3 => "THIRTY",
// 4 => "FORTY",
// 5 => "FIFTY",
// 6 => "SIXTY",
// 7 => "SEVENTY",
// 8 => "EIGHTY",
// 9 => "NINETY"
// );
// $hundreds = array(
// "HUNDRED",
// "THOUSAND",
// "MILLION",
// "BILLION",
// "TRILLION",
// "QUARDRILLION"
// ); /*limit t quadrillion */
// $num = number_format($num,2,".",",");
// $num_arr = explode(".",$num);
// $wholenum = $num_arr[0];
// $decnum = $num_arr[1];
// $whole_arr = array_reverse(explode(",",$wholenum));
// krsort($whole_arr,1);
// $rettxt = "";
// foreach($whole_arr as $key => $i){

// while(substr($i,0,1)=="0")
//         $i=substr($i,1,5);


// if($i < 20){
// /* echo "getting:".$i; */
// $rettxt .= $ones[$i];
// }elseif($i < 100){
// if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)];
// if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)];
// }else{
// if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
// if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)];
// if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)];
// }
// if($key > 0){
// $rettxt .= " ".$hundreds[$key]." ";
// }
// }


// if($decnum > 0){
// $rettxt .= " PESOS and ";
// if($decnum < 20){
// $rettxt .= $ones[$decnum];
// }elseif($decnum < 100){
// $rettxt .= $tens[substr($decnum,0,1)];
// $rettxt .= " ".$ones[substr($decnum,1,1)];
// $rettxt .= ' '.'CENTS';
// }


// }

// if($decnum > 0){
//     return $rettxt;
// }else{
//     return $rettxt.' '.'PESOS';
// }

// }



?>
