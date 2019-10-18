<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MainController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Mainmodel','model');

  }



  public function saveSysUser(){
    $inputData = $this->input->post('sysUser');
    echo json_encode(   $this->model->insert_sysUser($inputData)) ;

  }

  public function saveclient()
  {

    $inputData = $this->input->post('client');
    echo json_encode(   $this->model->insert_client($inputData)) ;



  }



  public function save_tenant()
  {
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_stall($inputData)) ;
  }



  public function saveambulant()
  {
    $inputData = $this->input->post('data');

    // $inputdata2 = $this->input->post('ambulant');
    // $data = array_merge($inputData , $inputdata2 );
    echo json_encode(  $this->model->insert_ambulant($inputData)  ) ;

  }

  public function savedelivery(){
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_delivery($inputData)) ;

  }

  public function saveparking(){
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_parking($inputData)) ;
  }

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



  public function gettransactiontable()
  {
    echo json_encode($this->model->gettransactiontable());
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

  public function get_customer_violation_con()
  {
    $id = $this->input->post('id');
    echo json_encode($this->model->get_customertable_violation_mod($id));
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


}

?>
