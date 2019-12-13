<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
// header("Access-Control-Allow-Origin: *");

class Sysuser extends REST_Controller {

     public function __construct() {
         parent::__construct();
         // $this->load->helper('url');
         // $this->load->library('session');
         $this->load->model('Api_model','api');

     }

     // sysuser
     public function sysUserResgiter_post()
     {
       //Change the post(your_post_parameter)
       $input = $this->input->post('user');

       $query = $this->api->sysUserResgiter($input);

       $this->response($query, REST_Controller::HTTP_OK);
     }

     public function sysUserLogin_post()
     {
       $input = $this->input->post('login');

       $query = $this->api->sysUserLogin($input);

       $this->response($query, REST_Controller::HTTP_OK);
    
     }

}


 ?>
