<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow- Methods: POST, GET, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, content-type, X-Token, x-token, X-csrf-token');

// require (APPPATH.'/libraries/REST_Controller.php');
// use Restserver\Libraries\REST_Controller;
class ApiController extends CI_Controller{
  public function __construct() {


    // To set session inside the model could be use to get session ids.
		// header('Access-Control-Allow-Origin: *');
		// header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
		// header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, content-type, X-Token, x-token, x-csrf-token, Origin');


	  parent::__construct();
    date_default_timezone_set('Asia/Manila');
    $this->load->helper('url');
    $this->load->model('apiModel', 'model');
    $this->load->library('session');
    $this->load->library('form_validation');



  }




  public function searchStall()
  {
    $search = $this->input->post('search');
    $searchcat = $this->input->post('searchcat');
    $data = [];
		$data = [
			"firstname" => "Marco",
			"middlename" => "Eseo",
			"lastname" => "Tolentino",
			"address" => "TGA DITO",
			"customer_id" => "1",
		];
		// $data = [];

		// $query = $this->model->searchStall($search, $searchcat);
    echo json_encode($data);

		// foreach($query->result() as $k)
		// {
		// 	$data = [
		// 		"firstname" => $k->firstname,
		// 		"middlename" => $k->middlename,
		// 		"lastname" => $k->lastname,
		// 		"address" => $k->address,
		// 		"customer_id" => $k->customer_id,
		// 		"collector" => $this->session->userdata('user_fullname'),
		// 	];
		// }
		// echo json_encode($data);

    // echo $data;
		// echo json_encode($this->model->searchStall($search, $searchcat));
  }

  public function saveTransaction()
  {
    $now = date('Y-m-d H:i:s');
    $data = $this->input->post("data");

    // $count = $this->input->post("count");
    //     $data = array(
    //       'payment_datetime'=>$now
    //       ,"customer_id" => $this->input->post("customer_id")
    //       ,"payment_nature_id" => $this->input->post("no")
    //       ,"effectivity" => $this->input->post("pay_effect")
    //       ,"payment_amount" => $this->input->post("price")
    //       ,"or_number" => $this->input->post("or_number")
    //       ,"cash_rec" => $this->input->post("cash_tendered")
    //       ,"amount_to_pay" => $this->input->post("total")
    //       ,"payor" => $this->input->post("payor")
    //       ,'collector'=> $this->session->userdata('user_fullname')
    //       ,'user_id'=> $this->session->userdata('user_id')
    //       ,"cheque_rec" => $this->input->post("cheque_rec")
    //     );

		return $data;
    echo json_encode( $this->model->saveTransaction('transaction',$data, $data['count']));
  }



}

?>
