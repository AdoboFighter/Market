
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Pages extends CI_Controller{
    public function __construct() {
             parent::__construct();
             $this->load->helper('url');
             $this->load->library('session');

             $this->load->model('Mainmodel','login');
         }


    public function index()
    {
      $this->load->view('pages/login');
    }


    public function view($pages = '')
    {


    $this->load->view('templates/header');
    $this->load->view('pages/'.$pages);
    $dataPage = array(
      'js_file' => $pages. '.js'
    );
    $this->load->view('templates/footer',$dataPage);

    }

    public function login_acc()
    {
      // To get the post method configured in the ajax POST HTTP Request
      $input = $this->input->post('login');

      // returns a array result from model function login_acc converted to json response
      echo json_encode($this->login->login_acc($input));

    }





  }
