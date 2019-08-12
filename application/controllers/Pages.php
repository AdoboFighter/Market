
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Pages extends CI_Controller{
    public function __construct() {
             parent::__construct();
             $this->load->helper('url');
             $this->load->library('session');
         }


    public function index()
    {
      echo 'Index';
    }

public function view($pages = '')
{
$this->load->view('templates/header');
$this->load->view('pages/'.$pages);
$this->load->view('templates/footer');
}






  }
