<?php
  class Pages extends CI_Controller{
    public function view($page =''){
      if(!file_exists(APPPATH.'views/Pages/'.$page.'.php')){
        show_404();
      }
      $data['title'] = ucfirst($page);
      $this->load->view('templates/header');
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/Footer');
      }
  }
