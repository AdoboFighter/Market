<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SearchStall extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function search($info) {
        //$info = $this->input->get('info');
        $res = array();
        $q = $this->db->query("CALL POS_fetchStallInfo('$info')")->result();
        $this->db->close();
        $res['STALL_RES'] = $q;
        echo json_encode($res);
    }
}
?>