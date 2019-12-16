<?php
class Mainmodel extends CI_model{

  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->library('session');
    $this->load->library('form_validation');
  }

  public function login_acc($input)
  {
    $testpassword = "";
    $userdata = array();
    $data = array(
      'username' => $input['username'],
      'password' => $input['password']
    );

    $query = $this->db->select('*')
    ->from('user')
    ->where('username',$data['username'])
    ->get();

    if($query->num_rows() > 0){
      foreach($query->result() as $k){
        $testpassword = $k->password;
      }
      if($data['password'] == $testpassword){
        foreach($query->result() as $r){
          $userdata['user_id'] = $r->user_id;
          $userdata['user_fullname'] = $r->usr_firstname." ".$r->usr_middlename." ".$r->usr_lastname;
          $userdata['position'] = $r->position;

        } $userdata['flag'] = 1;

        $this->session->set_userdata($userdata);
        return $userdata;
      }
      else{
        return $userdata['res'] = 'passwordError';
      }

    }
    else{

      return $userdata['res'] = 'usernameError';
    }

  }

  public function updatecustomerinfo($data){

    $data1 = array(
      'firstname' =>$data['owner_fn'],
      'middlename' =>$data['owner_mn'],
      'lastname' =>$data['owner_ln'],
      'address' =>$data['owner_add'],
      'contact_number' =>$data['owner_cn'],
      'aofirstname' =>$data['occu_fn'],
      'aomiddlename' =>$data['occu_mn'],
      'aolastname' =>$data['occu_ln'],
      'aoaddress' =>$data['occu_add'],
      'ao_cn' =>$data['occu_cn']

    );
    $data2 = array(
      'unit_no' =>$data['stall_number'],
      'sqm' =>$data['area'],
      'dailyfee' =>$data['daily_fee'],
      'floor_level' =>$data['floor_level']
    );

    $data3 = array(
      'business_name' =>$data['business_name'],
      'business_id' =>$data['business_id'],
      'nature_or_business' =>$data['nature_or_business']
    );




    $this->db->where('customer_id',$data['customer_id'])
    ->update('customer',$data1);

    $this->db->where('stall_id',$data['stall_id'])
    ->update('stall',$data2);

    $this->db->where('fk_customer_id',$data['customer_id'])
    ->update('tenant',$data3);


    return true;
  }


  public function updateparkinginfo($data){
    $data2 = array(
      'lot_no' =>$data['park_lot'],
    );

    $this->db->where('driver_id',$data['driver_id'])
    ->update('parking_lot',$data2);
    return true;
  }

  public function updateambulantinfo($data){

    $data1 = array(
      'firstname' =>$data['ambulant_fn'],
      'middlename' =>$data['ambulant_mn'],
      'lastname' =>$data['ambulant_ln'],
      'address' =>$data['ambulant_add'],
      'contact_number' =>$data['ambulant_cn']

    );

    $data2 = array(
      'location' =>$data['location'],
      'location_no' =>$data['location_num'],
      'nature_of_business' =>$data['nature_of_business']
    );





    $this->db->where('customer_id',$data['customer_id'])
    ->update('customer',$data1);

    $this->db->where('ambulant_id',$data['ambulant_id'])
    ->update('ambulant_unit',$data2);



    return true;
  }


  public function updatedeliveryinfo($data){

    $data1 = array(
      'firstname' =>$data['delivery_fn'],
      'middlename' =>$data['delivery_mn'],
      'contact_number' =>$data['delivery_cn']
    );



    $this->db->where('customer_id',$data['customer_id'])
    ->update('customer',$data1);
    return true;
  }





  function insert_sysUser($inputData){

    $data1 = array(
      'usr_firstname' => $inputData['firstname'],
      'usr_middlename' => $inputData['middlename'],
      'usr_lastname' => $inputData['lastname'],
      'username' => $inputData['username'],
      'password' => $inputData['password'],
      'position' => $inputData['position'],
      'user_level' => $inputData['user_lvl'],
      'usr_address' => $inputData['address'],
      'usr_contact_number' => $inputData['contact_num']
    );

    $username = array(
      'username' => $inputData['username']
    );


    $this->db->where($username);
    $this->db->limit(1);
    $user = $this->db->get('user');

    if($user->num_rows() == 1) {
      return 'taken';
    }else {


      $query = $this->db->insert('user', $data1);
      if ($query) {
        return 'okay';
      }

    }
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
    $query = $this->db->select('*')
    ->from('customer')
    ->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner')
    ->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner')
    ->get();
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'unit_no' => $r->unit_no,
        'floor_level' => $r->floor_level,
        'section' => $r->Section,
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

  public function consolidationtablesort($sort){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $this->db->select('*')
    ->from('transaction');
    // $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');


    if($sort != null)
    {


      switch($sort['conClientType']){

        case 'ambulant':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'tenant':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;


        case 'parking':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'delivery':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else {
      $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    }
    if($sort['conDateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['conDateFrom'] );
    }
    if($sort['conDateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['conDateTo'] );
    }
    if($sort['conCollectorName'])
    {
      $this->db->where('user_id',$sort['conCollectorName']);
    }



    $query = $this->db->get();
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' =>$r->firstname.' '.$r->middlename.' '.$r->lastname,
        'pay_or' => $r->or_number,
        'pay_amount' =>$r->payment_amount,
        'pay_nature' =>$r->payment_nature_id,
        'pay_date' => $r->payment_datetime,
        'pay_fund' =>$r->fund_name,
        'pay_collector' =>$r->collector,
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


  public function consexcel($sort){


    $this->db->select('*')
    ->from('transaction');
    // $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');


    if($sort != null)
    {


      switch($sort['conClientType']){

        case 'ambulant':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'tenant':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;


        case 'parking':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'delivery':
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else {
      $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    }
    if($sort['conDateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['conDateFrom'] );
    }
    if($sort['conDateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['conDateTo'] );
    }
    if($sort['conCollectorName'])
    {
      $this->db->where('user_id',$sort['conCollectorName']);
    }



    $query = $this->db->get();
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' =>$r->firstname.' '.$r->middlename.' '.$r->lastname,
        'pay_or' => $r->or_number,
        'pay_amount' =>$r->payment_amount,
        'pay_nature' =>$r->payment_nature_id,
        'pay_date' => $r->payment_datetime,
        'pay_fund' =>$r->fund_name,
        'pay_collector' =>$r->collector,
      );
    }

    return $data;
  }


  public function collector()
  {
    $query = $this->db->select('usr_firstname, usr_middlename, usr_lastname, user_id')
    ->from('user')
    ->where('user_level=', '3')
    ->get();
    $collector = [];

    foreach($query->result()as $k)
    {
      $collector[] = array(
        'fullname' => $k->usr_firstname ." ". $k->usr_middlename." ".$k->usr_lastname,
        'user_id' => $k->user_id
      );
    }


    return $collector;
  }


  public function gettransactiontable($sort)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->query("SELECT * FROM transaction");
    // $this->db->join('fund', 'fund.fund_id=transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');

    // $query = $this->db->get('transaction');
    $this->db->select('*')
    ->from('transaction');


    //QUERY with SORT
    if($sort['clientType']){


      switch($sort['clientType']){
        case 'ambulant':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else{
      $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    }

    if($sort['dateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['dateFrom'] );
    }
    if($sort['dateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['dateTo'] );
    }
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');


    $query = $this->db->get();



    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'trans_fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'trans_or' => $r->or_number,
        'trans_amount'=> $r->payment_amount,
        'trans_nature'=> $r->payment_nature_name,
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

  public function transactexcel($sort)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->query("SELECT * FROM transaction");
    // $this->db->join('fund', 'fund.fund_id=transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');

    // $query = $this->db->get('transaction');
    $this->db->select('*')
    ->from('transaction');


    //QUERY with SORT
    if($sort['conClientType']){


      switch($sort['conClientType']){
        case 'ambulant':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else{
      $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    }

    if($sort['conDateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['conDateFrom'] );
    }
    if($sort['conDateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['conDateTo'] );
    }
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');


    $query = $this->db->get();



    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'trans_fullname' => $r->firstname.' '.$r->middlename.' '.$r->lastname ,
        'trans_or' => $r->or_number,
        'trans_amount'=> $r->payment_amount,
        'trans_nature'=> $r->payment_nature_name,
        'trans_date'=> $r->payment_datetime,
        'trans_fund'=> $r->fund_name
      );
    }

    return $data;
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
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus"><a href="#sect2">Load Data</button>
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

  public function getPayAmbulantTableMod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id', 'inner');
    $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'pay_ambu_location' => $r->location,
        'pay_ambu_locnum'=> $r->location_no,
        'pay_ambu_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus"><a href="#sect2">Load Data</button>
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

  public function getdeliverypaytablemod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $this->db->join('delivery', 'delivery.fk_customer_id=customer.customer_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->delivery_id,
        'pay_delivery_id' => $r->firstname,
        'pay_delivery_name'=> $r->middlename,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus"><a href="#sect2">Load Data</button>
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

  public function getparkingpaytablemod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $this->db->join('driver', 'driver.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('parking_lot', 'driver.driver_id=parking_lot.driver_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'pay_parking_lot' => $r->lot_no,
        'pay_parking_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>
        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus"><a href="#sect2">Load Data</button>
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
    $query = $this->db->select('*')
    ->from('customer')
    ->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner')
    ->join('stall', 'tenant.tenant_id = stall.tenant_id', 'inner')
    ->where('customer.customer_id', $id)
    ->get();

    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'customer_id'=> $r->customer_id,
        'firstname' => $r->firstname,
        'middlename' => $r->middlename,
        'lastname' => $r ->lastname,
        'address' =>$r->address,
        'contact_no' =>$r->contact_number,
        'oafirstname' => $r->firstname,
        'oamiddlename' => $r->middlename,
        'oalastname' => $r ->lastname,
        'oaaddress' =>$r->address,
        'oacontact_no' =>$r->contact_number,
        'stall_id' =>$r->stall_id,
        'stall_number' =>$r->unit_no,
        'area' => $r->sqm,
        'daily_fee' => $r->dailyfee,
        'floor_level' => $r->floor_level,
        'nature_or_business' => $r->nature_or_business,
        'business_name' => $r->business_name,
        'business_id' => $r->business_id,
        'Section' => $r->Section,



      );
    }

    return $data;

  }

  public function getcustomerinfoAMBUpaymod($id)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $query = $this->db->select('*')
    ->from('customer')
    ->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner')
    ->join('ambulant_unit', 'ambulant_unit.ambulant_id = ambulant.ambulant_id', 'inner')
    ->where('customer.customer_id', $id)
    ->get();
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'customer_id'=> $r->customer_id,
        'ambulant_id'=> $r->ambulant_id,
        'firstname' => $r->firstname,
        'middlename' => $r->middlename,
        'lastname' => $r ->lastname,
        'address' =>$r->address,
        'contact_no' =>$r->contact_number,
        'location' => $r->location,
        'Location_num' => $r->location_no,
        'nature_of_business' => $r ->nature_of_business
      );
    }

    return $data;

  }

  public function transactionhistory($id)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $query = $this->db->select('*')
    ->from('transaction')
    ->where('customer.customer_id',$id)
    ->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner')
    ->join('customer','customer.customer_id = transaction.customer_id','inner')

    ->get();

    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        'or_no' => $k->or_number,
        'nature_of_payment' => $k->payment_nature_name,
        'amount' => $k->payment_amount,
        'date' =>$k->payment_datetime
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


  public function transactionhistorypark($id)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $query = $this->db->select('*')

    ->from('transaction')
    ->where('transaction.payment_nature_id', '4012')
    ->where('customer.customer_id',$id)
    ->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner')
    ->join('customer','customer.customer_id = transaction.customer_id','inner')

    ->get();

    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        'or_no' => $k->or_number,
        'nature_of_payment' => $k->payment_nature_name,
        'amount' => $k->payment_amount,
        'date' =>$k->payment_datetime
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






  public function saveTransact($inputData)
  {
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
      'customer_type' => 0,
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
    $this->db->insert('tenant', $data_tenant);
    $last_id_tenant = $this->db->insert_id();

    $data_stall = array(
      'floor_level' => $inputData['Floor_level'],
      'unit_no' => $inputData['Stall_Number'],
      'tenant_id' => $last_id_tenant,
      'date_occupied' => $inputData['date_occupied'],
      'Section' => $inputData['section'],
      'sqm' => $inputData['Square_meters'],
      'dailyfee' => $inputData['Daily_fee']
    );

    $this->db->insert('stall', $data_stall);


    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
    {
      echo 'Shit not working';
    }
  }

  public function insert_parking($inputData)
  {

    $this->db->trans_start();
    $last_id = $this->db->insert_id();
    $data_park = array(
      'fk_customer_id' => $inputData['customer_id']
    );
    $this->db->insert('driver', $data_park);
    $last_id_driver = $this->db->insert_id();

    $data_parklot = array(
      'driver_id' => $last_id_driver,
      'lot_no' => $inputData['lot_no'],
      'tenant_id' => $inputData['tenant_id']
    );
    $this->db->insert('parking_lot', $data_parklot);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      echo 'Shit not working';
    }

  }


  public function insert_delivery($inputData)
  {

    $data_customer = array(
      'firstname' => $inputData['Owner_Firstname'],
      'middlename' => $inputData['plate_no'],
      'contact_number' => $inputData['Owner_Contact_Num'],
      'customer_type' => 2
    );
    $this->db->trans_start();
    $this->db->insert('customer', $data_customer);
    $last_id = $this->db->insert_id();

    $data_delivery = array(
      'fk_customer_id' => $last_id
    );
    $this->db->insert('delivery', $data_delivery);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      echo 'Shit not working';
    }

  }


  public function insert_ambulant($inputData)
  {
    $data_customer = array(
      'firstname' => $inputData['Owner_Firstname'],
      'middlename' => $inputData['Owner_Middlename'],
      'lastname' => $inputData['Owner_Lastname'],
      'address' => $inputData['Owner_Address'],
      'contact_number' => $inputData['Owner_Contact_Num'],
      'customer_type' => 1
    );
    $this->db->trans_start();
    $this->db->insert('customer', $data_customer);
    $last_id = $this->db->insert_id();
    $data1 = array(
      'fk_customer_customer_id' => $last_id
    );
    $this->db->insert('ambulant', $data1);
    $ambulant_id = $this->db->insert_id();

    $data2 = array(
      'location' => $inputData['Location'],
      'location_no' => $inputData['Location_num'],
      'ambulant_id' => $ambulant_id
    );
    $this->db->insert('ambulant_unit', $data2);
    $this->db->trans_complete();


    if ($this->db->trans_status() === FALSE)
    {
      echo 'Shit not working';
    }
  }

  public function get_customertable_violation_mod()
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
        'vio_address'=> $r->address,
        'c_info_fullname_occupant'=> $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname ,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add Violation</button>
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

  public function add_park_get_stall()
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
        'vio_address'=> $r->address,
        'c_info_fullname_occupant'=> $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname ,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add Parking</button>
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

  public function get_violation_data_mod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->where('status', "NOT PAID");
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('violation', 'stall.stall_id=violation.stall_stall_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'description' => $r->description,
        'date_occured' => $r->date_occured,
        'status'=> $r->status,
        'name'=> $r->name,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->violation_id.'); " class="btn btn-sm btn-info ml-3 btn-danger" name="button" id="loadcus">Resolve</button>
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

  public function get_resviolation_data_mod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->where('status', "PAID");
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('violation', 'stall.stall_id=violation.stall_stall_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'description' => $r->description,
        'date_occured' => $r->date_occured,
        'status'=> $r->status,
        'name'=> $r->name
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



  public function getambuinfopay($id)
  {
    $this->db->where('fk_customer_customer_id', $id);
    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id', 'inner');
    $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }

  public function gettenantpay($id)
  {
    $this->db->where('fk_customer_id', $id);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }


  public function getdeliverypay($id)
  {
    $this->db->where('fk_customer_id', $id);
    $this->db->join('delivery', 'delivery.fk_customer_id=customer.customer_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }

  public function getparkingpay($id)
  {
    $this->db->where('customer_id', $id);
    $this->db->join('driver', 'driver.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('parking_lot', 'driver.driver_id=parking_lot.driver_id', 'inner');
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }

  public function get_customer_info_vio($id)
  {
    $this->db->where('violation_id', $id);
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('violation', 'stall.stall_id=violation.stall_stall_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();

  }

  public function save_violation_mod($inputData)
  {
    $data_violation = array(
      'description' => $inputData['desc'],
      'date_occured' => $inputData['date'],
      'stall_id' => $inputData['stall_id_f'],
      'stall_stall_id' => $inputData['stall_id_f'],
      'name' => $inputData['name']
    );


    $this->db->insert('violation', $data_violation);

  }


  public function savepayment($table,$data)
  {
    $this->db->insert($table,$data);

    $this->db->where($data);
    $query = $this->db->get($table);
    $dataArray = array();
    foreach ($query->result() as $r) {
      array_push($dataArray,$r);
    }
    return $dataArray;

  }

  public function savepayment2($table,$data)
  {


    $query =  $this->db->insert($table,$data);


  }

  public function updateSystemUserMod($inputData)
  {
    $data_user = array(
      'usr_firstname' => $inputData['usr_fn'],
      'usr_middlename' => $inputData['usr_mn'],
      'usr_lastname' => $inputData['usr_ln'],
      'usr_address' => $inputData['usr_add'],
      'usr_contact_number' => $inputData['usr_cn'],
      'username' => $inputData['usr_un'],
      'password' => $inputData['usr_pass'],
      'position' => $inputData['usr_position'],
      'user_level' => $inputData['user_lvl']
    );

    $user_id = array(
      'user_id' => $inputData['usr_id']
    );


    $this->db->where($user_id);
    $this->db->update('user', $data_user);


  }


  public function getsystemusertablemod()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->join('sysuser_type', 'sysuser_type.usertype_id=user.user_level', 'inner');
    $query = $this->db->get('user');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'usr_id' => $r->user_id,
        'usr_name' => $r->usr_firstname.' '.$r->usr_middlename.' '.$r->usr_lastname,
        'usr_level' => $r->user_type,
        'usr_address'=>$r->usr_address,
        'usr_position'=>$r->position,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->user_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus"><a href="#sect2">Load Data</button>
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

  public function getusermod($id)
  {
    $this->db->where('user_id', $id);
    $query = $this->db->get('user');
    return $query->result();
    echo $query;
  }

  public function getcerttable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $array = array('payment_nature_id' => 4015, 'print_status' => 'TO_PRINT');

    $this->db->where($array);

    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'c_info_stall_number' => $r->unit_no,
        'c_info_address' => $r->address,

        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->transaction_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Print</button>
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


  public function get_cert_info_mod($id)
  {
    $this->db->where('transaction_id', $id);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
  }

  public function checkOr($or_number){
    $query = $this->db->select('or_number')
    ->from('transaction')
    ->where('or_number =', $or_number)
    ->get();

    if($query->num_rows()>=1){
      return $data = "meron";
    }
    else{
      return $data = "wala";
    }
  }

  public function getnature($type_of_payment)
  {
    $query = $this->db->select('payment_nature_name')
    ->from('payment_nature')
    ->where('payment_nature_id =', $type_of_payment)
    ->get();
    $get = "";

    foreach($query->result() as $k)
    {
      $get = $k->payment_nature_name;
    }

    return $get;
  }

  public function getcustomerinfopark($id)
{
  $this->db->where('customer_id', $id);
  $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
  $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
  $this->db->join('driver', 'customer.customer_id=driver.fk_customer_id', 'inner');
  $query = $this->db->get('tenant');
  if($query->num_rows() >= 1) {
    return 'withpark';
  }else {
    $this->db->trans_start();
    $this->db->where('fk_customer_id', $id);
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query2 = $this->db->get('tenant');
    return $query2->result();
  }
}



}
?>
