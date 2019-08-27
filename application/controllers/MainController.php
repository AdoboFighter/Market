<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class MainController extends CI_Controller{

        public function __construct()
        {
          parent::__construct();
          $this->load->helper('url');
          $this->load->model('Mainmodel','model');
        }


  public function saveclient()
  {
    $inputData = $this->input->post('client');
    echo json_encode($this->model->insert_data($inputData)) ;

  }




  }
  ?>
