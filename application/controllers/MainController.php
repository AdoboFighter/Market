<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MainController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Mainmodel','model');
    $this->load->library('form_validation');

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
    echo json_encode($this->model->gettenanttable());
  }


  public function getconsolidationtable()
  {
    echo json_encode($this->model->getconsolidationtable());
  }

  public function getcustomertable()
  {
    echo json_encode($this->model->getcustomertable());
  }
  public function getPayAmbulantTableCon()
  {
    echo json_encode($this->model->getPayAmbulantTableMod());
  }
  public function getdeliverypaytablecon()
  {
    echo json_encode($this->model->getdeliverypaytablemod());
  }


  public function getparkingpaytablecon()
    {
      echo json_encode($this->model->getparkingpaytablemod());
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


  public function get_customer_violation_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_customertable_violation_mod($id));
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

    $transactionData = array(
      'fund_id' => $this->input->post('fund_id'),
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
      echo json_encode($this->model->getsystemusertablemod());
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

  public function get_cert_info_con()
{
  $id = $this->input->post('id');
  echo json_encode($this->model->get_cert_info_mod($id));
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

      return $this->load->view('pages/PDFnoonwership',$data);
   }







}

?>
