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
        $res = $this->db->query("SELECT c.customer_id AS 'ID', upper((concat(c.firstname,' ',c.lastname))) AS 'Name',
        au.location AS 'Location',
        b.nature_or_business AS 'Business' FROM customer AS c
        LEFT JOIN ambulant AS a ON c.customer_id = a.fk_customer_customer_id
        LEFT JOIN ambulant_unit AS au ON a.ambulant_id = au.ambulant_id
        LEFT JOIN tenant AS b ON a.fk_customer_customer_id = b.fk_customer_id
        WHERE c.firstname LIKE CONCAT('$data','%') AND a.fk_customer_customer_id HAVING c.customer_id")->result();
        
        $this->db->close();
        $xhr = array();
        $xhr['AMB_RES'] = $res;
        echo json_encode($xhr);
    }
}
?>