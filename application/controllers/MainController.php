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
    echo json_encode($this->model->gettenanttable($search));
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
    echo json_encode($this->model->getPayAmbulantTablepay($search));
  }



  public function getdeliverypaytablecon()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->getdeliverypaytablemod($search));
  }


  public function getdeliverypaytablepay()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->getdeliverypaytablepay($search));
  }


  public function getparkingpaytablecon()
  {
    $search = $this->input->post('search');
    echo json_encode($this->model->getparkingpaytablemod($search));
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
    $inputData = $this->input->post('transact');
    echo json_encode($this->model->saveTransact($inputData)) ;
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
    $transactionData = array(
      'fund_id' => $this->input->post('fund_id'),
      'payment_datetime'=>$now,
      'payment_nature_id'=> $this->input->post('type_of_payment'),
      'payment_amount'=> $this->input->post('cash_tendered'),
      'customer_id'=> $this->input->post('customer_id'),
      'or_number'=> $this->input->post('or_number'),
      'effectivity'=> $this->input->post('payment_effectivity'),
      'user_id'=> $this->session->userdata('user_id'),
      'collector'=> $this->session->userdata('user_fullname'),
    );
    echo json_encode( $this->model->savepayment('transaction',$transactionData));


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
    echo json_encode( $this->model->updateSystemUserMod($inputData));
  }

  public function getsystemusertablecon()
  {
      $search = $this->input->post('search');
    echo json_encode($this->model->getsystemusertablemod($search));
  }

  public function getusercon()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->getusermod($id));
  }

  public function get_resviolation_data_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_resviolation_data_mod($id));
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



  public function pdf2fcert()
  {
    $inputData = $this->input->post('cert');
    $data = array(
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
      'address' => $inputData['address']
    );
    return $this->load->view('pages/'.$inputData['cert'],$data);
  }

  public function get_cert_info_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_cert_info_mod($id));
  }

  public function updatecert()
  {
    $data = $this->input->post('cert');
    $query = $this->model->updatecert($data);
    echo json_encode($query);
  }

  public function paymentreceipt()
  {
    $type_of_payment = $this->input->post('type_of_payment');
    $query = $this->model->getnature($type_of_payment);
    $data = array(
      'fullname' => $this->input->post('payment_name'),
      'payment_type' => $this->input->post('payment_type'),
      'text1' => $this->input->post('text1'),
      'text2' => $this->input->post('text2'),
      'text3' => $this->input->post('text3'),
      'text4' => $this->input->post('text4'),
      'text5' => $this->input->post('text5'),
      'text6' => $this->input->post('text6'),
      'text7' => $this->input->post('text7'),
      'num1' =>  $this->input->post('num1'),
      'num2' =>  $this->input->post('num2'),
      'num3' =>  $this->input->post('num3'),
      'num4' =>  $this->input->post('num4'),
      'num5' =>  $this->input->post('num5'),
      'num6' =>  $this->input->post('num6'),
      'num7' =>  $this->input->post('num7'),
      'total' => $this->input->post('total'),
      'checkNum1' => $this->input->post('check_number[0]'),
      'checkNum2' => $this->input->post('check_number[1]'),
      'checkNum3' => $this->input->post('check_number[2]'),
      'checkDate1' => $this->input->post('check_date[0]'),
      'checkDate2' => $this->input->post('check_date[1]'),
      'checkDate3' => $this->input->post('check_date[2]'),
      'bank1' => $this->input->post('bank[0]'),
      'bank2' => $this->input->post('bank[1]'),
      'bank3' => $this->input->post('bank[2]'),
      'ntw' => $this->input->post('ntw'),
      'type_of_payment' => $query,
      'amount_to_pay' => $this->input->post('amount_to_pay')
    );
    return $this->load->view('pages/receipt',$data);
  }

  public function paymentreceiptprint()
  {
    $type_of_payment = $this->input->post('type_of_payment');
    $query = $this->model->getnature($type_of_payment);
    $data = array(
      'fullname' => $this->input->post('payment_name'),
      'payment_type' => $this->input->post('payment_type'),
      'text1' => $this->input->post('text1'),
      'text2' => $this->input->post('text2'),
      'text3' => $this->input->post('text3'),
      'text4' => $this->input->post('text4'),
      'text5' => $this->input->post('text5'),
      'text6' => $this->input->post('text6'),
      'text7' => $this->input->post('text7'),
      'num1' =>  $this->input->post('num1'),
      'num2' =>  $this->input->post('num2'),
      'num3' =>  $this->input->post('num3'),
      'num4' =>  $this->input->post('num4'),
      'num5' =>  $this->input->post('num5'),
      'num6' =>  $this->input->post('num6'),
      'num7' =>  $this->input->post('num7'),
      'total' => $this->input->post('total'),
      'checkNum1' => $this->input->post('check_number[0]'),
      'checkNum2' => $this->input->post('check_number[1]'),
      'checkNum3' => $this->input->post('check_number[2]'),
      'checkDate1' => $this->input->post('check_date[0]'),
      'checkDate2' => $this->input->post('check_date[1]'),
      'checkDate3' => $this->input->post('check_date[2]'),
      'bank1' => $this->input->post('bank[0]'),
      'bank2' => $this->input->post('bank[1]'),
      'bank3' => $this->input->post('bank[2]'),
      'ntw' => $this->input->post('ntw'),
      'type_of_payment' => $query,
      'amount_to_pay' => $this->input->post('amount_to_pay')
    );
    return $this->load->view('pages/receipt0',$data);
  }




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



}



?>
