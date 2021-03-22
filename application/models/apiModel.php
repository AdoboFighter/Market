<?php

class apiModel extends CI_model{

  public function __construct() {
       parent::__construct();

       // To set session inside the model could be use to get session ids.
       $this->load->library('session');
       $this->load->helper('url');
       $this->load->database();
   }

   public function searchStall($searchcat,$search)
   {
     $this->db->like("concat($searchcat)",$search);
     $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
     $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
     $query = $this->db->get('customer');
   }
}

?>
