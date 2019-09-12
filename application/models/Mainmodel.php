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
    $query = $this->db->get('sysuser');

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

    $this->db->insert('client', $data1);
    return  $last_id = $this->db->insert_id();

    // $data2 = array(
    // 'Stall_Number' => $inputData['Stall_Number'],
    // 'Buss_Id' => $inputData['Buss_Id'],
    // 'Buss_Name' => $inputData['Buss_Name'],
    // 'Floor_level' => $inputData['Floor_Level'],
    // 'Daily_Fee' => $inputData['Daily_fee'],
    // 'Sqaure_meters' => $inputData['Sqaure_meters'],
    // 'date_Oc' => $inputData['date_Oc'],
    // 'Occupied_by' => $last_id
    // );
    //   return $this->db->insert('stall', $data2);

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

      'Stall_Number' => $inputData['stallNum'],
      'Buss_Id' => $inputData['bussid'],
      'Buss_Name' => $inputData['bussname'],
      'Floor_level' => $inputData['Floor_level'],
      'Daily_Fee' => $inputData['dailyfee'],
      'Sqaure_meters' => $inputData['squaremeter'],
      'date_Oc' => $inputData['dateOc'],
      'section' => $inputData['section'],
      'Occupied_by' => $inputData['id']

    );

    return $this->db->insert('stall', $data1);

  }

  function insert_parking($inputData){
    $data1 = array(
      'park_client_id' => $inputData['id']
    );

    return $this->db->insert('parking', $data1);

  }

  function insert_delivery($inputData){
    $data1 = array(
      'delivery_client_id' => $inputData['id']
    );

    return $this->db->insert('delivery', $data1);

  }


  function fetch_data($query){
    $this->db->select("*");
    $this->db->from("client");

    if($query != '')
    {
      $this->db->like('Client_Id', $query);
      $this->db->or_like('OFirstname', $query);
      $this->db->or_like('OLastname', $query);
    }
    $this->db->order_by('Client_Id', 'DESC');
    return $this->db->get();
  }



  public function gettenanttable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->query("SELECT * FROM client where Client_type = 'tenant'");
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->Client_Id,
        'fullname' => $r->OFirstname.' '.$r->OMiddlename.' '.$r->OLastname,
        'add' => $r->OAddress,
        'btn'=>'
        <div class="">
        <button type="button" onclick="fetchdata('.$r->Client_Id.')" class="btn btn-sm btn-info ml-3" name="button">Load Data</button>
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
    $this->db->where('Occupied_by', $id);
    $this->db->join('client', 'stall.Occupied_by=client.client_id', 'inner');

    $query = $this->db->get('stall');
    return $query->result();
  }


  public function insert_payment($inputData)
  {

    $data1 = array(
      'customer_id' => $inputData['clientIdField'],
      'or_number' => $inputData['orField'],
      'payment_nature_id' => $inputData['payTypeField'],
      'amount_to_pay' => $inputData['amountToField'],
      'payment_amount' => $inputData['cashTendField'],
      'payor' => $inputData['payorField'],
      'effectivity' => $inputData['payEffectField']

    );

    $this->db->insert('transactions', $data1);
    return  $last_id = $this->db->insert_id();

  }

  public function insert_payment_cheque($inputData)
  {

    $data1 = array(
      'transaction_number' => $inputData['id'],
      'cheque_amount' => $inputData['cheqAmountField'],
      'cheque_number' => $inputData['cheqNumField'],
      'bank_branch' => $inputData['bankBranchField'],
      'fk_stall_number' => $inputData['stall_num']

    );

    return $this->db->insert('cheque', $data1);

  }


}
?>
