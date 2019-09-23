<?php
class Mainmodel extends CI_model{

  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->library('session');
  }

  public function login_acc($input)
  {
    $data = array(
      'username' => $input['username'],
      'password' => $input['password']
    );
    $this->db->where($data);
    $query = $this->db->get('user');

    $response = array();

    if($query->num_rows() == 0){
      $response['response'] = false;
      $response['message'] = 'Incorrect Username or Password';
    }else{
      $response['response'] = true;
      $response['message'] = 'Login Success : '.$input['username'];
      $response['data'] = $query->result();
    }

    return $response;

  }


  function insert_client($inputData)
  {
    $data1 = array(
      'Client_type' => $inputData['Client_type'],
      'OFirstname' => $inputData['OFirstname'],
      'OMiddlename' => $inputData['OMiddlename'],
      'OLastname' => $inputData['OLastname'],
      'OAddress' => $inputData['OAddress'],
      'OContactNum' => $inputData['OContactNum'],
      'OcFirstname' => $inputData['OcFirstname'],
      'OcMiddlename' => $inputData['OcMiddlename'],
      'Oclastname' => $inputData['OcLastname'],
      'OcAddress' => $inputData['OcAddress'],
      'OcContactNum' => $inputData['OcContactNum']


    );

    $this->db->insert('customer', $data1);
    return  $last_id = $this->db->insert_id();



  }

  function insert_sysUser($inputData){

    $data1 = array(
      'firstname' => $inputData['firstname'],
      'middlename' => $inputData['middlename'],
      'lastname' => $inputData['lastname'],
      'username' => $inputData['username'],
      'password' => $inputData['password'],
      'position' => $inputData['position'],
      'user_lvl' => $inputData['user_lvl'],
      'address' => $inputData['address'],
      'contact_num' => $inputData['contact_num']
    );

    $this->db->insert('sysuser', $data1);

  }



  function insert_ambulant($inputData)
  {
    $data1 = array(
      'ambu_client_id' => $inputData['id'],
      'location' => $inputData['location'],
      'location_num' => $inputData['locationNum']
    );

    return $this->db->insert('ambulant', $data1);

  }

  function insert_stall($inputData){
    $data1 = array(


      'floor_level' => $inputData[''],
      'unit_no' => $inputData[''],
      'tenant_id' => $inputData[''],
      'date_occupied' => $inputData[''],
      'Section' => $inputData[''],
      'sqm' => $inputData[''],
      'class' => $inputData['']
      'dailyfee' => $inputData['']


    );

    return $this->db->insert('stall', $data1);

  }

  function insert_tenant($inputData){
    $data1 = array(

      'fk_customer_id' => $inputData['id'],
      'business_id' => $inputData['bussid'],
      'business_name' => $inputData['bussname'],
      'nature_or_business' => $inputData['']

    );

    return $this->db->insert('tenant', $data1);

  }


  function insert_parking($inputData){
    $data1 = array(
      'fk_customer_id' => $inputData['id']
    );

    return $this->db->insert('driver', $data1);

  }

  function insert_delivery($inputData){
    $data1 = array(
      'delivery_client_id' => $inputData['id']
    );

    return $this->db->insert('delivery', $data1);

  }


  function fetch_data($query){
    $this->db->select("*");
    $this->db->from("customer");

    if($query != '')
    {
      $this->db->like('customer_id', $query);
      $this->db->or_like('firstname', $query);
      $this->db->or_like('lastname', $query);
    }
    $this->db->order_by('customer_id', 'DESC');
    return $this->db->get();
  }



  public function gettenanttable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->query("SELECT * FROM customer");
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'add' => $r->address,
        'btn'=>'
        <div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.')" class="btn btn-sm btn-info ml-3" name="button">Load Data</button>
        </div>'
      );
    }
    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    return $result;
  }



  public function getstallinfo($id)
  {
    $this->db->where('fk_customer_id', $id);
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');

    $query = $this->db->get('tenant');
    return $query->result();
  }


  public function saveTransact($inputData)
  {
    echo 'We in this Shit Bruv  ';
    $data_transaction = array(

      'or_number' => $inputData['orField'],
      'payment_nature_id' => $inputData['payTypeField'],
      'payment_amount' => $inputData['cashTendField'],
      'payor' => $inputData['payorField'],
      'effectivity' => $inputData['payEffectField'],
      'customer_id' => $inputData['clientIdField']
    );

    $this->db->trans_start();
    $this->db->insert('Transactions', $data_transaction);
    $last_id = $this->db->insert_id();
    $data_cheque = array(
      'transaction_number' => $last_id,
      'cheque_amount' => $inputData['cheqAmountField'],
      'cheque_number' => $inputData['cheqNumField'],
      'bank_branch' => $inputData['bankBranchField'],
      'fk_stall_number' => $inputData['stall_number_field']
    );


    if(isset($inputData['ifCheque'])){
      $this->db->insert('Cheque', $data_cheque);
      print_r($data_cheque);
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
    {
      echo '<script>console.log("Shit not working")</script>';
    }


  }



}
?>
