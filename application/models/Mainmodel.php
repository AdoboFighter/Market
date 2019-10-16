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
      redirect('pages/home');
      echo "yeah";
    }

    return $response;

  }


  function insert_client($inputData)
  {
    $data1 = array(
      'Client_type' => $inputData[''],
      'OFirstname' => $inputData[''],
      'OMiddlename' => $inputData[''],
      'OLastname' => $inputData[''],
      'OAddress' => $inputData[''],
      'OContactNum' => $inputData[''],
      'OcFirstname' => $inputData[''],
      'OcMiddlename' => $inputData[''],
      'Oclastname' => $inputData[''],
      'OcAddress' => $inputData[''],
      'OcContactNum' => $inputData['']


    );

    $this->db->insert('customer', $data1);
    return  $last_id = $this->db->insert_id();



  }

  function insert_sysUser($inputData){

    $data1 = array(
      'firstname' => $inputData[''],
      'middlename' => $inputData[''],
      'lastname' => $inputData[''],
      'username' => $inputData[''],
      'password' => $inputData[''],
      'position' => $inputData[''],
      'user_lvl' => $inputData[''],
      'address' => $inputData[''],
      'contact_num' => $inputData['']
    );

    $this->db->insert('sysuser', $data1);

  }



  function insert_ambulant($inputData)
  {
    $data1 = array(
      'ambu_client_id' => $inputData['id'],
      'location' => $inputData[''],
      'location_num' => $inputData['']
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
      'class' => $inputData[''],
      'dailyfee' => $inputData['']


    );

    return $this->db->insert('stall', $data1);

  }

  function insert_tenant($inputData){
    $data1 = array(

      'fk_customer_id' => $inputData['id'],
      'business_id' => $inputData[''],
      'business_name' => $inputData[''],
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
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button">Load Data</button>
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



  public function gettenantinfo($id)
  {
    $this->db->where('fk_customer_id', $id);
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'transaction.customer_id=customer.customer_id', 'inner');
    $this->db->order_by('payment_datetime');
    $this->db->limit(1);
    $query = $this->db->get('tenant');
    return $query->result();
    echo $query;
  }

  public function getconsolidationtable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->query("SELECT * FROM transaction");

    $this->db->join('fund', 'fund.fund_id=transaction.fund_id', 'inner');
    $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('transaction');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'pay_or' => $r->or_number,
        'pay_amount'=> $r->payment_amount,
        'pay_nature'=> $r->payment_nature_id,
        'pay_date'=> $r->payment_datetime,
        'pay_fund'=> $r->fund_name,
        'pay_collector'=> $r->collector,
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

  public function gettransactiontable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->query("SELECT * FROM transaction");
    $this->db->join('fund', 'fund.fund_id=transaction.fund_id', 'inner');
    $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('transaction');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'trans_fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'trans_or' => $r->or_number,
        'trans_amount'=> $r->payment_amount,
        'trans_nature'=> $r->payment_nature_id,
        'trans_date'=> $r->payment_datetime,
        'trans_fund'=> $r->fund_name
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

  public function getcustomertable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'c_info_stall_number' => $r->unit_no,
        'c_info_area' => $r->sqm,
        'c_info_daily_fee'=> $r->dailyfee,
        'c_info_fullname_occupant'=> $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname ,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Load Data</button>
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

  public function getcustomerinfomod($id)
  {
    $this->db->where('fk_customer_id', $id);
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('tenant');
    return $query->result();

  }


  public function getcustomerinfopaymod($id)
  {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->db->join('payment_nature', 'payment_nature.payment_nature_id=transaction.payment_nature_id', 'inner');
        $this->db->join('customer', 'transaction.customer_id=customer.customer_id', 'inner');
        $query = $this->db->get('transaction');
        $data = [];
        foreach ($query->result() as $r) {
          $data[] = array(
            'c_info_OR' => $r->or_number,
            'c_info_nature' => $r->payment_nature_name,
            'c_info_amount'=> $r->payment_amount,
            'c_info_date'=> $r->payment_datetime
          );
        }
        $result = array(
          "draw" => $draw,
          "recordsTotal" => $query->num_rows(),
          "recordsFiltered" => $query->num_rows(),
          "data" => $data
        );
        return $result;
        echo "hello";
  }




  public function saveTransact($inputData)
  {
    echo 'We in this Shit Bruv';
    $data_transaction = array(
      'payment_nature_id' => $inputData['payment_type'],
      'payment_amount' => $inputData['cash_tendered'],
      'customer_id' => $inputData['customer_id'],
      'or_number' => $inputData['OR'],
      'effectivity' => $inputData['payment_effect']
    );

    $this->db->trans_start();
    $this->db->insert('transaction', $data_transaction);
    // $last_id = $this->db->insert_id();
    $data_cheque = array(
      // 'transaction_number' => $last_id,
      'cheque_amount' => $inputData['cheque_amount'],
      'cheque_number' => $inputData['cheque_number'],
      'bank_branch' => $inputData['bank_branch'],
      'fk_stall_no' => $inputData['stall_number']
    );


    if(isset($inputData['ifCheque'])){
      $this->db->insert('cheque_details', $data_cheque);
      print_r($data_cheque);
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
    {
      echo '<script>console.log("Shit not working")</script>';
    }
  }



  public function save_customer($inputData){
    $data_customer = array(
      'firstname' => $inputData['Owner_Firstname'],
      'middlename' => $inputData['Owner_Middlename'],
      'lastname' => $inputData['Owner_Lastname'],
      'address' => $inputData['Owner_Address'],
      'contact_number' => $inputData['Owner_Contact_Num'],
      'customer_type' => $inputData['Client_type'],
      'aofirstname' => $inputData['Occu_Firstname'],
      'aomiddlename' => $inputData['Occu_Middlename'],
      'aolastname' => $inputData['Occu_Lastname'],
      'aoaddress' => $inputData['Occu_Address'],
      'ao_cn' => $inputData['Occu_Contact_Num']
    );

    $this->db->trans_start();
    $this->db->insert('customer', $data_customer);
    $last_id = $this->db->insert_id();

    $data_tenant = array(
      'business_id' => $inputData['Owner_Firstname'],
      'business_name' => $inputData['Owner_Middlename'],
      'fk_customer_id' => $last_id
    );



    if(isset($inputData['Client_type']) && $inputData['Client_type'] == 'tenant') {
      echo 'we in this shit bruv';


      $this->db->insert('tenant', $data_tenant);
      $id_tenant = $this->db->insert_id();
      echo $id_tenant;

      $data_stall = array(
        'floor_level' => $inputData['Floor_level'],
        'unit_no' => $inputData['Stall_Number'],
        'tenant_id' => $id_tenant,
        'date_occupied' => $inputData['date_occupied'],
        'Section' => $inputData['section'],
        'sqm' => $inputData['Square_meters'],
        'dailyfee' => $inputData['Daily_fee']
      );
      $this->db->insert('stall', $data_stall);
    }

    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      echo 'Shit not working';
    }


  }

  public function insert_table_bulk_model($inputData)
  {



  }



}
?>
