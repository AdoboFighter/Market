<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
// header("Access-Control-Allow-Origin: *");

class Market_android extends REST_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->model->load('market_model','market');
    }

    public function getStallInfo(){
        $stall_num = $this->input->get('info');

        $query = $this->model->getStallInfo($stall_num);

        $this->response($query, REST_Controller::HTTP_OK);
    }

    public function getAmbulantInfo()
    {
        $firstname = $this->input->get('info');

        $query = $this->model->getAmbulantInfo($firstname);

        $this->response($query, REST_Controller::HTTP_OK);
    }


    public function getTransactions()
    {
        $transact = $this->input->get('info');

        $query = $this->model->getTransactions($transact);

        $this->response($query, REST_Controller::HTTP_OK);
    }

    
    public function RegisterAmbulant()
    {
        $registerambulant = $this->input->get('info');

        $query = $this->model->RegisterAmbulant($registerambulant);

        $this->response($query, REST_Controller::HTTP_OK);
    }










}
