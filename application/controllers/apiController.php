<?php

class apiController extends CI_Controller{
  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    header ("Access-Control-Allow-Methods: GET, OPTIONS");
    header( 'Access-Control-Allow-Origin: *');
    header("Access Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    header( "Access-Control-Allow=Headers: X-Requested-With, content-type, X-Token, x-token, x-csrf-token, ");
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
    echo json_encode($this->model->searchStall($search, $searchcat));

  }



}

?>
