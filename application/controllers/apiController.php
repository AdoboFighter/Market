<?php

class apiController extends CI_Controller{
  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    // header ("Access-Control-Allow-Methods: GET, OPTIONS");
    // header( 'Access-Control-Allow-Origin: *');
    // header("Access Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    // header( "Access-Control-Allow=Headers: X-Requested-With, content-type, X-Token, x-token, x-csrf-token, ");

		     
		header('Access-Control-Allow-Origin: *'); 
		header('Access-Control-Allow- Methods: POST, GET, PUT, DELETE, OPTIONS'); 
		header('Access-Control-Allow-Headers: X-Requested-With, content-type, X-Token, x-token, X-csrf-token');
	 
    $this->load->library('session');
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Manila');
    $this->load->helper('url');
    $this->load->model('apiModel', 'model');


  }

  public function searchStall()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');;
    echo json_encode($this->model->searchStall($search, $searchcat) , JSON_PRETTY_PRINT);
  }

  public function saveTransaction()
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
        );

return $data;
    echo json_encode( $this->model->saveTransaction('transaction',$data, $count));
  }



}

?>
