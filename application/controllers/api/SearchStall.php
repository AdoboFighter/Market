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
        $q = $this->db->query("SELECT c.customer_id AS 'ID', s.unit_no AS 'Stall No.',
        UPPER(concat(c.firstname,' ',c.lastname)) AS 'Name',
        t.nature_or_business AS 'Business' FROM tenant AS t LEFT JOIN customer AS c ON t.fk_customer_id = c.customer_id
        LEFT JOIN stall AS s ON s.tenant_id = t.tenant_id WHERE s.unit_no = '$info'")->result();
        
        $this->db->close();
        $res['STALL_RES'] = $q;
        echo json_encode($res);
    }
}
?>