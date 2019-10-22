<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GetTransaction extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getTrns() {
        $res = array();
        $data = json_decode(file_get_contents('php://input'));
        $query = "SELECT or_number AS 'Receipt', payment_amount AS 'Payments' FROM `market_db`.`transaction`
        WHERE collector = '$data->user'
        AND DATE_FORMAT(payment_datetime, '%m/%d/%Y') = '$data->date'";
        $q = $this->db->query($query)->result();
        $res['LIST_TRNS'] = $q;
        $this->db->close();
        echo json_encode($res);
    }
}
?>