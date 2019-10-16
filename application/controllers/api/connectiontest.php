<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class connectiontest extends CI_Controller{

///////
      public function __construct()
      {
          parent::__construct();
          $this->load->model('market_model','model');
      }



public function index_get()
{
       $this->response( REST_Controller::HTTP_OK);
}

  
    }

    ?>
