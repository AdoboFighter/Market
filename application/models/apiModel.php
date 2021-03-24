<?php

class apiModel extends CI_model{

  public function __construct() {
       parent::__construct();

       // To set session inside the model could be use to get session ids.
      //  $this->load->library('session');
      //  $this->load->helper('url');
       $this->load->database();
   }

   public function searchStall($search,$searchcat)
   {

		$query = $this->db->select('*')
								->from('customer')
								->where($searchcat,$search)
								->join('tenant', 'tenant.fk_customer_id=customer.customer_id')
								->join('stall', 'stall.tenant_id=tenant.tenant_id')
								->get();
		
		return $query;

		//   $this->db->where($searchcat,$search);
    // //  $this->db->where("CONCAT($searchcat)",$search);
    //  $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
    //  $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
		//  $query = $this->db->get('customer');
		//  return $query;
		 
		//  if($query->num_rows() > 0 ){
		//  	return $query->result();
		// 	}
		// 	else{
		// 		return ['message' => 'Error'];
		// 	}
   }

	 public function seach(Type $var = null)
	 {
		 # code...
	 }

   public function saveTransaction($table,$data,$count)
   {
     $query = $this->db->insert($table,$data);
     $transaction_id = $this->db->insert_id();
     return array('query'=> $query, 'id'=>$transaction_id, 'count' => $count);
   }
}

?>
