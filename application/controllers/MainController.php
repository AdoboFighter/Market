<?php


defined('BASEPATH') OR exit('No direct script access allowed');
class UnsafeCrypto
{
  const METHOD = 'aes-256-ctr';

  /**
  * Encrypts (but does not authenticate) a message
  *
  * @param string $message - plaintext message
  * @param string $key - encryption key (raw binary expected)
  * @param boolean $encode - set to TRUE to return a base64-encoded
  * @return string (raw binary)
  */
  public static function encrypt($message, $key, $encode = false)
  {
    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = openssl_random_pseudo_bytes($nonceSize);

    $ciphertext = openssl_encrypt(
      $message,
      self::METHOD,
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );

    // Now let's pack the IV and the ciphertext together
    // Naively, we can just concatenate
    if ($encode) {
      return base64_encode($nonce.$ciphertext);
    }
    return $nonce.$ciphertext;
  }

  /**
  * Decrypts (but does not verify) a message
  *
  * @param string $message - ciphertext message
  * @param string $key - encryption key (raw binary expected)
  * @param boolean $encoded - are we expecting an encoded string?
  * @return string
  */
  public static function decrypt($message, $key, $encoded = false)
  {
    if ($encoded) {
      $message = base64_decode($message, true);
      if ($message === false) {
        throw new Exception('Encryption failure');
      }
    }

    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = mb_substr($message, 0, $nonceSize, '8bit');
    $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

    $plaintext = openssl_decrypt(
      $ciphertext,
      self::METHOD,
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );

    return $plaintext;
  }
}

class MainController extends CI_Controller{



  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mainmodel','model');
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Manila');
  }

  // add client module
  // add client module
  // add client module
  // add client module

  public function saveclient()
  {
    $inputData = $this->input->post('client');
    echo json_encode(   $this->model->insert_client($inputData)) ;
  }



  public function save_tenant()
  {
    $inputData = $this->input->post('data');
    echo json_encode( $this->model->insert_stall($inputData)) ;
  }




  public function savedelivery(){
    $inputData = $this->input->post('customer');
    echo json_encode(   $this->model->insert_delivery($inputData)) ;

  }

  public function saveparking(){
    $inputData = $this->input->post('customer');
    echo json_encode($this->model->insert_parking($inputData)) ;
  }

  public function saveambulant(){
    $inputData = $this->input->post('customer');
    echo json_encode($this->model->insert_ambulant($inputData)) ;
  }

  // add client module
  // add client module
  // add client module
  // add client module

  public function getTransact()
  {
    echo json_encode($this->model->getTransactData());
  }


  public function gettenanttable()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');;
    echo json_encode($this->model->gettenanttable($search, $searchcat));
  }




  public function getconsolidationtable()
  {
    echo json_encode($this->model->getconsolidationtable());
  }

  public function getcustomerinfotable()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');;
    echo json_encode($this->model->getcustomerinfotablemod($search, $searchcat));
  }

  public function getcustomertablepay()
  {
    echo json_encode($this->model->getcustomertablepay());
  }

  public function getPayAmbulantTableCon()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getPayAmbulantTableMod($search, $searchcat));
  }

  public function getPayAmbulantTablepay()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getPayAmbulantTablepay($search, $searchcat));
  }



  public function getdeliverypaytablecon()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getdeliverypaytablemod($search, $searchcat));
  }


  public function getdeliverypaytablepay()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->getdeliverypaytablepay($search));
  }


  public function getparkingpaytablecon()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getparkingpaytablemod($search, $searchcat));
  }

  public function getparkingpaytablepay()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->getparkingpaytablepay($search));
  }






  public function gettransactiontable()
  {
    $sort['clientType'] = $this->input->post('clientType');
    $sort['dateFrom'] = $this->input->post('dateFrom');
    $sort['dateTo'] = $this->input->post('dateTo');

    $query = $this->model->gettransactiontable($sort);

    echo json_encode($query);
  }

  public function getcons()
  {

    $sort = array(
      'conClientType' => $this->input->post('conClientType'),
      'conDateFrom'=> $this->input->post('conDateFrom'),
      'conDateTo'=> $this->input->post('conDateTo'),
      'conCollectorName'=> $this->input->post('conCollectorName')
    );


    $query = $this->model->consolidationtablesort($sort);
    echo json_encode($query);
  }

  public function getconsexcel()
  {

    $sort = array(
      'excelClient' => $this->input->post('exClientType'),
      'excelDateFrom'=> $this->input->post('exDateFrom'),
      'excelDateTo'=> $this->input->post('exDateTo'),
      'excelCollector'=> $this->input->post('exCollector')
    );


    $this->session->set_userdata($sort);

    echo json_encode($sort);

  }



  public function printconsexcel()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),
      'conCollectorName' => $this->session->userdata('excelCollector'),
    );

    $query = $this->model->consexcel($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );
    echo json_encode($result);
    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');

  }

  public function gettransexcel()
  {

    $sort = array(
      'excelClient' => $this->input->post('exClientType'),
      'excelDateFrom'=> $this->input->post('exDateFrom'),
      'excelDateTo'=> $this->input->post('exDateTo'),
    );


    $this->session->set_userdata($sort);

    echo json_encode($sort);

  }

  //reports on tenant only------------------------------------------------------
  //reports on tenant only------------------------------------------------------
  //reports on tenant only------------------------------------------------------
  //reports on tenant only------------------------------------------------------

  public function getconsexcelteanant()
  {

    $sort = array(
      'excelClient' => $this->input->post('exClientType'),
      'excelDateFrom'=> $this->input->post('exDateFrom'),
      'excelDateTo'=> $this->input->post('exDateTo'),
      'excelCollector'=> $this->input->post('exCollector')
    );


    $this->session->set_userdata($sort);

    echo json_encode($sort);

  }

  public function printconsexceltenant()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),
      'conCollectorName' => $this->session->userdata('excelCollector'),
    );

    $query = $this->model->consexceltenant($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );
    echo json_encode($result);
    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');

  }

  public function gettransexceltenant()
  {

    $sort = array(
      'excelClient' => $this->input->post('exClientType'),
      'excelDateFrom'=> $this->input->post('exDateFrom'),
      'excelDateTo'=> $this->input->post('exDateTo'),
    );


    $this->session->set_userdata($sort);

    echo json_encode($sort);

  }



  //reports on tenant only end------------------------------------------------------
  //reports on tenant only end------------------------------------------------------
  //reports on tenant only end------------------------------------------------------
  //reports on tenant only end------------------------------------------------------





  public function printtransact()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),

    );

    $query = $this->model->transactexcel($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );

    echo json_encode($result);

    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');
  }

  public function printconsexcelotc()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),

    );

    $query = $this->model->printconsexcelotc($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );

    echo json_encode($result);

    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');
  }

  public function printconsexcelotcstall()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),

    );

    $query = $this->model->printconsexcelotcstall($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );

    echo json_encode($result);

    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');
  }

  public function printtransactemt()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),

    );

    $query = $this->model->printtransactemt($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );

    echo json_encode($result);

    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');
  }

  public function printtransactemtstall()
  {
    $sort = array(
      'conClientType' => $this->session->userdata('excelClient'),
      'conDateFrom' => $this->session->userdata('excelDateFrom'),
      'conDateTo' => $this->session->userdata('excelDateTo'),

    );

    $query = $this->model->printtransactemtstall($sort);

    $result = array(
      "query" => $query,
      "sort" => $sort,
      "user" => $this->session->userdata('user_fullname'),
    );

    echo json_encode($result);

    $this->session->unset_userdata('excelClient');
    $this->session->unset_userdata('excelDateFrom');
    $this->session->unset_userdata('excelDateTo');
    $this->session->unset_userdata('excelCollector');
  }







  public function getCollector()
  {
    $collector = $this->model->collector();

    echo json_encode($collector);
  }




  public function getstallinfo()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->gettenantinfo($id));
  }


  public function savePayment()
  {
    // $inputData = $this->input->post('transact');
    // echo json_encode($this->model->saveTransact($inputData));

  }

  public static function numtowords($x)
  {
    $oneto19 = array("","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","ELEVEN","TWELVE","THIRTEEN","FOURTEEN","FIFTEEN","SIXTEEN","SEVENTEEN","EIGHTEEN","NINETEEN");
    $tens = array("","","TWENTY","THIRTY","FOURTY","FIFTY","SIXTY","SEVENTY","EIGHTY","NINETY");
    $hundreds = array("","ONE HUNDRED","TWO HUNDRED","THREE HUNDRED", "FOUR HUNDRED", "FIVE HUNDRED", "SIX HUNDRED", "SEVEN HUNDRED" ,"EIGHT HUNDRED" ,"NINE HUNDRED");
    $scale = array("","","THOUSAND", "MILLION");
    $num = number_format($x,2,".",",");
    $num_arr = explode(".",$num);
    $numwords = "";
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = explode(",",$wholenum);
    $whole_count = count($whole_arr);
    $scaleCounter = $whole_count;
    for($i=0;$i<$whole_count;$i++)
    {
      $digitcount = strlen($whole_arr[$i]);
      switch($digitcount)
      {
        case "3":
        $digit3 = substr($whole_arr[$i],0,1);
        $whole_arr[$i] = $whole_arr[$i] - ($digit3 * 100);
        $numwords .= "".$hundreds[$digit3]." ";
        case "2":
        $digit2 = substr($whole_arr[$i],0,1);
        if($digit2 < 2)
        {
          $digit1 = substr($whole_arr[$i],1,1);
          $digit21 = $digit2."".$digit1;
          $numwords .= $oneto19[$digit21]." ";
          break;
        }
        else
        {
          $digit2 = substr($whole_arr[$i],0,1);
          $whole_arr[$i] = $whole_arr[$i] - ($digit2 * 10);
          $numwords .= $tens[$digit2]." ";
        }
        case "1":
        $digit1 = substr($whole_arr[$i],0,1);
        $whole_arr[$i] = $whole_arr[$i] - ($digit1 * 1);
        $numwords .= $oneto19[$digit1]." ";
        break;
      }
      $numwords .= $scale[$scaleCounter]." ";
      $scaleCounter--;
    }
    if($decnum > 0){
      $numwords .= " PESOS and ";
      if($decnum < 20 ){
        if($decnum<10)
        {
          $decnum = str_replace(0,"",$decnum);
          $numwords .= $oneto19[$decnum];
        }
        else{
          $numwords .= $oneto19[$decnum];
        }
      }elseif($decnum < 100){
        $numwords .= $tens[substr($decnum,0,1)];
        $numwords .= " ".$oneto19[substr($decnum,1,1)];
      }
      $numwords .= ' '.'CENTS';
    }
    else{
      $numwords .= 'PESOS';
    }
    return $numwords;
  }



  public function save_customer_controller()
  {
    $inputData = $this->input->post('customer');
    echo json_encode($this->model->save_customer($inputData)) ;
  }


  public function getcustomerinfocon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getcustomerinfomod($id));
  }

  public function getdebtcon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getdebtmod($id));
  }
  public function getcustomerinfopaycon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getcustomerinfopaymod($id));
  }

  public function getcustomerinfoAMBUpaycon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getcustomerinfoAMBUpaymod($id));
  }

  public function getambuinfopay()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getambuinfopay($id));
  }

  public function gettenantpay()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->gettenantpay($id));
  }

  public function getdeliverypay()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getdeliverypay($id));
  }


  public function getparkingpay()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getparkingpay($id));
  }

  public function getcustomertransactionhistory()
  {
    $id = $this->uri->segment(3);
    $query = $this->model->transactionhistory($id);

    echo json_encode($query);
  }

  public function getcustomertransactionhistorypark()
  {
    $id = $this->uri->segment(3);
    $query = $this->model->transactionhistorypark($id);

    echo json_encode($query);
  }


  public function updatecustomerinfo()
  {
    $data = $this->input->post('update');
    $query = $this->model->updatecustomerinfo($data);
    echo json_encode($query);
  }

  public function updatedeliveryinfo()
  {
    $data = $this->input->post('update');
    $query = $this->model->updatedeliveryinfo($data);
    echo json_encode($query);
  }

  public function updateambulantinfo()
  {
    $data = $this->input->post('update');
    $query = $this->model->updateambulantinfo($data);
    echo json_encode($query);
  }

  public function updateparkinginfo()
  {
    $data = $this->input->post('update');
    $query = $this->model->updateparkinginfo($data);
    echo json_encode($query);
  }


  public function get_tenant_violation_con()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->get_customertable_violation_mod($search));
  }

  public function add_park_get_stall()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->add_park_get_stall($id));
  }

  public function get_violation_data_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_violation_data_mod($id));
  }



  public function get_customer_info_vio_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_customer_info_vio($id));
  }

  public function save_violation_con()
  {
    $inputData = $this->input->post('violation');
    echo json_encode($this->model->save_violation_mod($inputData)) ;
  }


  public function saveSysUser()
  {
    $inputData = $this->input->post('sysUser');
    echo json_encode(   $this->model->insert_sysUser($inputData));
  }


  public function savetransaction()
  {
    $now = date('Y-m-d H:i:s');
    $count = $this->input->post("count");

        $data = array(
          'payment_datetime'=>$now
          ,"customer_id" => $this->input->post("customer_id")
          ,"payment_nature_id" => $this->input->post("no")
          ,"effectivity" => $this->input->post("pay_effect")
          ,"payment_amount" => $this->input->post("price")
          ,"or_number" => $this->input->post("or_number")
          ,"cash_rec" => $this->input->post("cash_tendered")
          ,"amount_to_pay" => $this->input->post("total")
          ,"payor" => $this->input->post("payor")
          ,'collector'=> $this->session->userdata('user_fullname')
          ,'user_id'=> $this->session->userdata('user_id')
          ,"cheque_rec" => $this->input->post("cheque_rec")

          // ,"particulars" => $this->input->post("particulars")
        );

    echo json_encode( $this->model->savetransaction('transaction',$data, $count));
  }

  public function savetransactionviolation()
  {
    $now = date('Y-m-d H:i:s');
    $count = $this->input->post("count");

        $data = array(
          'payment_datetime'=>$now
          ,"customer_id" => $this->input->post("customer_id")
          ,"payment_nature_id" => $this->input->post("no")
          ,"effectivity" => $this->input->post("pay_effect")
          ,"payment_amount" => $this->input->post("price")
          ,"or_number" => $this->input->post("or_number")
          ,"cash_rec" => $this->input->post("cash_tendered")
          ,"amount_to_pay" => $this->input->post("total")
          ,"payor" => $this->input->post("payor")
          ,'collector'=> $this->session->userdata('user_fullname')
          ,'user_id'=> $this->session->userdata('user_id')

          // ,"particulars" => $this->input->post("particulars")
        );

        $violation_id = array(
        "violation_id" => $this->input->post("violation_id")
        );


    echo json_encode( $this->model->savetransactionviolation('transaction',$data, $count, $violation_id));
  }


  public function savetransact()
  {
    $now = date('Y-m-d H:i:s');
    $id = $this->input->post('pay');
    echo json_encode( $this->model->savetransaction('transaction',$id));


  }

  public function savecheque()
  {
    $data = $this->input->post('ch');
    $query = $this->model->savepayment2('cheque_details',$data);
    echo json_encode($data);

  }

  public function updateSystemUserCon()
  {
    $inputData = $this->input->post('upsys');
    echo json_encode($this->model->updateSystemUserMod($inputData));
  }

  public function getsystemusertablecon()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getsystemusertablemod($search, $searchcat));
  }

  public function getusercon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getusermod($id));
  }

  public function get_resviolation_data_con()
  {
    echo json_encode($this->model->get_resviolation_data_mod());
  }

  public function get_cheque_list()
  {

    echo json_encode($this->model->get_cheque_list());
  }

  public function resolveViolationCon()
  {
    $inputData = $this->input->post('violation');

    echo json_encode( $this->model->resolveViolationMod($inputData));
  }

  public function getcerttable()
  {
    echo json_encode($this->model->getcerttable());
  }

  public function getcertprinttable()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    echo json_encode($this->model->getcertprinttable($search, $searchcat));
  }

  public function getcertprinttableOLD()
  {
    echo json_encode($this->model->getcertprinttableOLD());
  }




  // public function pdf2fcert()
  // {
  //   $inputData = $this->input->post('cert');
  //
  //   $data = array(
  //     'fname' => $inputData['fname'],
  //     'mname' => $inputData['mname'],
  //     'lname' => $inputData['lname'],
  //     'address' => $inputData['address'],
  //     'sysuser' => $inputData['sysuser'],
  //     'natbus' => $inputData['natbus'],
  //     'flrlvl' => $inputData['natbus'],
  //     'sysuser' => $inputData['sysuser'],
  //     'stall' => $inputData['stall'],
  //     'floor_level' => $inputData['floor_level'],
  //     'days' => $inputData['days'],
  //     'month' => $inputData['month'],
  //     'year' => $inputData['year'],
  //     'or_number' => $inputData['or_number'],
  //     'payment_amount' => $inputData['payment_amount'],
  //     'today' => $inputData['today'],
  //     'address' => $inputData['address'],
  //     'refnum' => $inputData['refnum']
  //   );
  //   return $this->load->view('pdftenant/'.$inputData['cert'],$data);
  // }

  public function pdf2fcert()
  {
    $inputData = $this->input->post('cert');

    $data = array(

      'ceasedate' => $inputData['ceasedate'],

      //if ambulant
      'location' => $inputData['location'],
      'location_no' => $inputData['location_no'],



      'client' => $inputData['client'],
      'fname' => $inputData['fname'],
      'mname' => $inputData['mname'],
      'lname' => $inputData['lname'],
      'address' => $inputData['address'],
      'sysuser' => $inputData['sysuser'],
      'natbus' => $inputData['natbus'],
      'flrlvl' => $inputData['natbus'],
      'sysuser' => $inputData['sysuser'],
      'stall' => $inputData['stall'],
      'floor_level' => $inputData['floor_level'],
      'days' => $inputData['days'],
      'month' => $inputData['month'],
      'year' => $inputData['year'],
      'or_number' => $inputData['or_number'],
      'payment_amount' => $inputData['payment_amount'],
      'today' => $inputData['today'],
      'address' => $inputData['address'],
      'refnum' => $inputData['refnum']
    );

    if ($inputData['client'] == "LESSEE") {

      return $this->load->view('pdftenant/'.$inputData['cert'],$data);

    }elseif ($inputData['client'] == "TEMPORARY/AMBULANT vendor") {

      return $this->load->view('pdfambulant/'.$inputData['cert'],$data);
    }


  }

  public function pdftransfer()
  {
    $inputData = $this->input->post('cert');

    $data = array(

      // transfer
      'transfer_to' => $inputData['transfer_to'],
      'transfer_date' => $inputData['transfer_date'],


      //if ambulant
      'location' => $inputData['location'],
      'location_no' => $inputData['location_no'],

      'client' => $inputData['client'],
      'fname' => $inputData['fname'],
      'mname' => $inputData['mname'],
      'lname' => $inputData['lname'],
      'address' => $inputData['address'],
      'sysuser' => $inputData['sysuser'],
      'natbus' => $inputData['natbus'],
      'flrlvl' => $inputData['natbus'],
      'sysuser' => $inputData['sysuser'],
      'stall' => $inputData['stall'],
      'floor_level' => $inputData['floor_level'],
      'days' => $inputData['days'],
      'month' => $inputData['month'],
      'year' => $inputData['year'],
      'or_number' => $inputData['or_number'],
      'payment_amount' => $inputData['payment_amount'],
      'today' => $inputData['today'],
      'address' => $inputData['address'],
      'refnum' => $inputData['refnum']
    );

    if ($inputData['client'] == "LESSEE") {

      return $this->load->view('pdftenant/'.$inputData['cert'],$data);

    }elseif ($inputData['client'] == "TEMPORARY/AMBULANT vendor") {

      return $this->load->view('pdfambulant/'.$inputData['cert'],$data);
    }


  }

  public function pdfoperation()
  {
    $inputData = $this->input->post('cert');

    $data = array(

      // transfer
      'operation_date1' => $inputData['operation_date1'],
      'operation_date2' => $inputData['operation_date2'],


      //if ambulant
      'location' => $inputData['location'],
      'location_no' => $inputData['location_no'],

      'client' => $inputData['client'],
      'fname' => $inputData['fname'],
      'mname' => $inputData['mname'],
      'lname' => $inputData['lname'],
      'address' => $inputData['address'],
      'sysuser' => $inputData['sysuser'],
      'natbus' => $inputData['natbus'],
      'flrlvl' => $inputData['natbus'],
      'sysuser' => $inputData['sysuser'],
      'stall' => $inputData['stall'],
      'floor_level' => $inputData['floor_level'],
      'days' => $inputData['days'],
      'month' => $inputData['month'],
      'year' => $inputData['year'],
      'or_number' => $inputData['or_number'],
      'payment_amount' => $inputData['payment_amount'],
      'today' => $inputData['today'],
      'address' => $inputData['address'],
      'refnum' => $inputData['refnum']
    );

    if ($inputData['client'] == "LESSEE") {

      return $this->load->view('pdftenant/'.$inputData['cert'],$data);

    }elseif ($inputData['client'] == "TEMPORARY/AMBULANT vendor") {

      return $this->load->view('pdfambulant/'.$inputData['cert'],$data);
    }


  }

  public function pdfmarket()
  {
    $inputData = $this->input->post('cert');

    $data = array(

      //if ambulant
      'location' => $inputData['location'],
      'location_no' => $inputData['location_no'],

      'client' => $inputData['client'],
      'fname' => $inputData['fname'],
      'mname' => $inputData['mname'],
      'lname' => $inputData['lname'],
      'address' => $inputData['address'],
      'sysuser' => $inputData['sysuser'],
      'natbus' => $inputData['natbus'],
      'flrlvl' => $inputData['natbus'],
      'sysuser' => $inputData['sysuser'],
      'stall' => $inputData['stall'],
      'floor_level' => $inputData['floor_level'],
      'days' => $inputData['days'],
      'month' => $inputData['month'],
      'year' => $inputData['year'],
      'or_number' => $inputData['or_number'],
      'payment_amount' => $inputData['payment_amount'],
      'today' => $inputData['today'],
      'address' => $inputData['address'],
      'refnum' => $inputData['refnum']
    );

    if ($inputData['client'] == "LESSEE") {

      return $this->load->view('pdftenant/'.$inputData['cert'],$data);

    }elseif ($inputData['client'] == "TEMPORARY/AMBULANT vendor") {

      return $this->load->view('pdfambulant/'.$inputData['cert'],$data);
    }


  }


  public function get_cert_info_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_cert_info_mod($id));
  }

  public function get_cert_info_ambulant()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_cert_info_ambulant($id));
  }

  public function updatecert()
  {
    $id = $this->input->post('certup');
    echo json_encode($this->model->updatecert($id));
  }

  public function paymentreceipt()
  {
    $type_of_payment = $this->input->post('type_of_payment');
    $query = $this->model->getnature($type_of_payment);
    $ntw = $this->numtowords($this->input->post('total'));


    $id = $this->input->post('pay');
    echo json_encode($id);



    // $data = array(
    //   'fullname' => $this->input->post('payment_name'),
    //   'payment_type' => $this->input->post('payment_type'),
    //   'text1' => $this->input->post('text1'),
    //   'text2' => $this->input->post('text2'),
    //   'text3' => $this->input->post('text3'),
    //   'text4' => $this->input->post('text4'),
    //   'text5' => $this->input->post('text5'),
    //   'text6' => $this->input->post('text6'),
    //   'text7' => $this->input->post('text7'),
    //   'num1' =>  $this->input->post('num1'),
    //   'num2' =>  $this->input->post('num2'),
    //   'num3' =>  $this->input->post('num3'),
    //   'num4' =>  $this->input->post('num4'),
    //   'num5' =>  $this->input->post('num5'),
    //   'num6' =>  $this->input->post('num6'),
    //   'num7' =>  $this->input->post('num7'),
    //   'total' => $this->input->post('total'),
    //   'checkNum1' => $this->input->post('check_number[0]'),
    //   'checkNum2' => $this->input->post('check_number[1]'),
    //   'checkNum3' => $this->input->post('check_number[2]'),
    //   'checkDate1' => $this->input->post('check_date[0]'),
    //   'checkDate2' => $this->input->post('check_date[1]'),
    //   'checkDate3' => $this->input->post('check_date[2]'),
    //   'bank1' => $this->input->post('bank[0]'),
    //   'bank2' => $this->input->post('bank[1]'),
    //   'bank3' => $this->input->post('bank[2]'),
    //   'ntw' => $this->input->post('ntw'),
    //   'ntw' => $ntw,
    //   'type_of_payment' => $query,
    //   'amount_to_pay' => $this->input->post('amount_to_pay')
    // );
    // return $this->load->view('pages/receipt',$data);
  }





public function paymentreceiptJO()
{

  $id = $this->input->post('pay');

    $data = array(
      "cash_tendered" => $id['cash_tendered'],
      "change" => $id['change'],
      // "bank_branch" => $id['bank_branch'],
      // "cheque_amount" => $id['cheque_amount'],
      // "cheque_date" => $id['cheque_date'],
      // "cheque_number" => $id['cheque_number'],
      "bank_branch" => $id['chqBranch'],
      "cheque_date" => $id['chqdate'],
      "cheque_number" => $id['chqno'],
      "cheque_amount" => $id['chqAmount'],

      "customID" => $id['customID'],
      "date" => $id['date'],
      "no" => $id['no'],
      "particulars" => $id['particulars'],
      "payment_or_number" => $id['payment_or_number'],
      "payor" => $id['payor'],
      "price" => $id['price'],
      "stall_number" => $id['stall_number'],
      "ttlAmt" => $id['ttlAmt'],
      "paymentCol" => $id['paymentCol'],
      "chqno" => $id['chqno'],
      "chqAmount" => $id['chqAmount'],
      "chqdate" => $id['chqdate'],
      "chqBranch" => $id['chqBranch']
    );

  return $this->load->view('pages/printreceipt',$data);
}





public function printreceipt()
{

  $id = $this->input->post('pay');

    $data = array(
      "cash_tendered" => $id['cash_tendered'],
      "change" => $id['change'],
      // "bank_branch" => $id['bank_branch'],
      // "cheque_amount" => $id['cheque_amount'],
      // "cheque_date" => $id['cheque_date'],
      // "cheque_number" => $id['cheque_number'],

      "bank_branch" => $id['chqBranch'],
      "cheque_date" => $id['chqdate'],
      "cheque_number" => $id['chqno'],
      "cheque_amount" => $id['chqAmount'],

      "payment_or_number" => $id['payment_or_number'],
      "customID" => $id['customID'],
      "date" => $id['date'],
      "no" => $id['no'],
      "particulars" => $id['particulars'],
      "payment_or_number" => $id['payment_or_number'],
      "payor" => $id['payor'],
      "price" => $id['price'],
      "stall_number" => $id['stall_number'],
      "ttlAmt" => $id['ttlAmt'],
      "paymentCol" => $id['paymentCol'],
      "chqno" => $id['chqno'],
      "chqAmount" => $id['chqAmount'],
      "chqdate" => $id['chqdate'],
      "chqBranch" => $id['chqBranch']
    );

  return $this->load->view('pages/receipt0',$data);
}




  // public function paymentreceiptprint()
  // {
  //   $type_of_payment = $this->input->post('type_of_payment');
  //
  //   $id = $this->input->post('pay');
  //
  //
  //   $query = $this->model->getnature($type_of_payment);
  //   $data = array(
  //     'fullname' => $this->input->post('payment_name'),
  //     'payment_type' => $this->input->post('payment_type'),
  //     'text1' => $this->input->post('text1'),
  //     'text2' => $this->input->post('text2'),
  //     'text3' => $this->input->post('text3'),
  //     'text4' => $this->input->post('text4'),
  //     'text5' => $this->input->post('text5'),
  //     'text6' => $this->input->post('text6'),
  //     'text7' => $this->input->post('text7'),
  //     'num1' =>  $this->input->post('num1'),
  //     'num2' =>  $this->input->post('num2'),
  //     'num3' =>  $this->input->post('num3'),
  //     'num4' =>  $this->input->post('num4'),
  //     'num5' =>  $this->input->post('num5'),
  //     'num6' =>  $this->input->post('num6'),
  //     'num7' =>  $this->input->post('num7'),
  //     'total' => $this->input->post('total'),
  //     'checkNum1' => $this->input->post('check_number[0]'),
  //     'checkNum2' => $this->input->post('check_number[1]'),
  //     'checkNum3' => $this->input->post('check_number[2]'),
  //     'checkDate1' => $this->input->post('check_date[0]'),
  //     'checkDate2' => $this->input->post('check_date[1]'),
  //     'checkDate3' => $this->input->post('check_date[2]'),
  //     'bank1' => $this->input->post('bank[0]'),
  //     'bank2' => $this->input->post('bank[1]'),
  //     'bank3' => $this->input->post('bank[2]'),
  //     'ntw' => $this->input->post('ntw'),
  //     'type_of_payment' => $query,
  //     'amount_to_pay' => $this->input->post('amount_to_pay')
  //   );
  //   return $this->load->view('pages/receipt0',$data);
  // }




  public function checkOr(){
    $or_number = $this->input->post('or_number');
    $query =$this->model->checkOr($or_number);
    echo json_encode($query);
  }

  public function getcustomerinfopark()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getcustomerinfopark($id));
  }

  public function checkviolationpay()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->checkviolationpay($id));
  }


  public function floorchange()
  {
    $inputData = $this->input->post('floorf');
    return $this->load->view('pages/'.$inputData['floortext']);
  }

  public function numberofstalls()
  {
    echo json_encode($this->model->numberofstalls());
  }

  public function numberofambu()
  {
    echo json_encode($this->model->numberofambu());
  }

  public function numberofcurtrans()
  {
    echo json_encode($this->model->numberofcurtrans());
  }

  public function stallspaid()
  {
    echo json_encode($this->model->stallspaid());
  }

  public function debtstat()
  {
    echo json_encode($this->model->debtstat());
  }

  public function getstallFLOOR()
  {
    $code =  $this->uri->segment(3);
    echo json_encode($this->model->getstallFLOOR(urldecode($code)));
  }

  function fetch_user()
  {
    echo json_encode($this->model->fetch_user());
  }


  function fetch_section()
  {
    echo json_encode($this->model->fetch_section());
  }

  public function numberofviolation()
  {
    echo json_encode($this->model->numberofviolation());
  }

  public function numberoftranstoday()
  {
    echo json_encode($this->model->numberofviolation());
  }

  public function emtbackend()
  {
    $sort['clientType'] = $this->input->post('clientType');
    $sort['dateFrom'] = $this->input->post('dateFrom');
    $sort['dateTo'] = $this->input->post('dateTo');

    $query = $this->model->emtbackend($sort);

    echo json_encode($query);
  }

  public function otcbackend()
  {
    $sort['clientType'] = $this->input->post('clientType');
    $sort['dateFrom'] = $this->input->post('dateFrom');
    $sort['dateTo'] = $this->input->post('dateTo');

    $query = $this->model->otcbackend($sort);

    echo json_encode($query);
  }

  public function otcbackendtenant()
  {
    $sort['clientType'] = $this->input->post('clientType');
    $sort['dateFrom'] = $this->input->post('dateFrom');
    $sort['dateTo'] = $this->input->post('dateTo');

    $query = $this->model->otcbackendtenant($sort);

    echo json_encode($query);
  }

  public function cashrepbackend()
  {

    $sort = array(
      'conClientType' => $this->input->post('conClientType'),
      'conDateFrom'=> $this->input->post('conDateFrom'),
      'conDateTo'=> $this->input->post('conDateTo'),
      'conCollectorName'=> $this->input->post('conCollectorName')
    );


    $query = $this->model->cashrepbackend($sort);
    echo json_encode($query);
  }

  public function consolirepbackend()
  {

    $sort = array(
      'conClientType' => $this->input->post('conClientType'),
      'conDateFrom'=> $this->input->post('conDateFrom'),
      'conDateTo'=> $this->input->post('conDateTo'),
      'conCollectorName'=> $this->input->post('conCollectorName')
    );


    $query = $this->model->consolirepbackend($sort);
    echo json_encode($query);
  }

  public function gettenantaddpark()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->add_park_get_stall($search));
  }

  public function transtodaytable()
  {
    $query = $this->model->transtodaytable();
    echo json_encode($query);
  }

  public function stallpaidtable()
  {
    $query = $this->model->stallpaidtable();
    echo json_encode($query);
  }

  public function ambutablehome()
  {
    $query = $this->model->ambutablehome();
    echo json_encode($query);
  }

  public function debttable()
  {
    $query = $this->model->debttable();
    $item = "bullshit";
    array_walk_recursive($query,function(&$item){$item=strval($item);});
    echo json_encode($query);
  }

  public function consolidationtablesortTenant()
  {

    $sort = array(
      'conClientType' => $this->input->post('conClientType'),
      'conDateFrom'=> $this->input->post('conDateFrom'),
      'conDateTo'=> $this->input->post('conDateTo'),
      'conCollectorName'=> $this->input->post('conCollectorName')
    );


    $query = $this->model->consolidationtablesortTenant($sort);
    echo json_encode($query);
  }

  public function consolidationtablesortTenant2()
  {

    $sort = array(
      'conClientType' => $this->input->post('conClientType'),
      'conDateFrom'=> $this->input->post('conDateFrom'),
      'conDateTo'=> $this->input->post('conDateTo'),
      'conCollectorName'=> $this->input->post('conCollectorName')
    );


    $query = $this->model->consolidationtablesortTenant2($sort);
    echo json_encode($query);
  }


  public function emtbackendTenant()
  {
    $sort['clientType'] = $this->input->post('clientType');
    $sort['dateFrom'] = $this->input->post('dateFrom');
    $sort['dateTo'] = $this->input->post('dateTo');

    $query = $this->model->emtbackendTenant($sort);

    echo json_encode($query);
  }

  public function getstallnotes()
  {
    $query = $this->model->getstallnotes();
    echo json_encode($query);
  }

  public function save_notes()
  {
    $inputData = $this->input->post('note');
    echo json_encode($this->model->save_notes($inputData)) ;
  }


  public function getviewnote()
  {
    $fk_custid_note = $this->input->post('fk_custid_note');
    echo json_encode($this->model->getviewnote($fk_custid_note));
  }



  public function getnameheader()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getnameheader($id));
  }


  public function getnotesingles()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getnotesingles($id));
  }


  public function update_note()
  {
    $data = $this->input->post('note');
    $query = $this->model->update_note($data);
    echo json_encode($query);
  }

  public function delete_note()
  {
    $id = $this->input->post('id');
    $query = $this->model->delete_note($id);
    echo json_encode($query);
  }

  public function getcerttableAmbulant()
  {
    echo json_encode($this->model->getcerttableAmbulant());
  }

  public function cancelor()
  {
    $data = $this->input->post('cancel');
    $query = $this->model->cancelor($data);
    echo json_encode($query);
  }


  public function getcancelledor()
  {
    echo json_encode($this->model->getcancelledor());
  }


  public function update_pass()
  {
    $data = $this->input->post('pass');
    echo json_encode($this->model->update_pass($data));
  }





}



?>
