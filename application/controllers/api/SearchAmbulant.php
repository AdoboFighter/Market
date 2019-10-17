<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SearchAmbulant extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function search($info) {
        $data = urldecode($info);
        $res = $this->db->query("CALL POS_fetchAmbInfo('$data')")->result();
        $this->db->close();
        $xhr = array();
        $xhr['AMB_RES'] = $res;
        echo json_encode($xhr);
    }
}
?>