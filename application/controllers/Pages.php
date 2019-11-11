
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

      if($this->session->userdata('flag')== 1){

        $this->load->view('templates/header');
        $this->load->view('pages/'.$pages);
        $dataPage = array(
          'js_file' => $pages. '.js'
        );
        $this->load->view('templates/footer',$dataPage);
      }
      else{
        $this->load->view('pages/login');
      }
         

        
   
        
             
    }
    

    public function login_acc()
    {
      // To get the post method configured in the ajax POST HTTP Request
      
      $input = $this->input->post('login');

      $userdata = $this->login->login_acc($input);

      echo json_encode($userdata);

    }

    public function logout_acc(){
    
      session_destroy();
      $this->load->view('pages/login');
    }





  }
