<?php


class SaferCrypto
{
  const METHOD = 'aes-256-ctr';

  /**
  * Encrypts (but does not authenticate) a message
  *
  * @param string $message - plaintext message
  * @param string $key - encryption key (raw binary expected)
  * @param boolean $encode - set to TRUE to return a base64-encoded
  * @return string (raw binary)
  */
  public static function encrypt($message, $key, $encode = false)
  {
    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = openssl_random_pseudo_bytes($nonceSize);

    $ciphertext = openssl_encrypt(
      $message,
      self::METHOD,
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );

    // Now let's pack the IV and the ciphertext together
    // Naively, we can just concatenate
    if ($encode) {
      return base64_encode($nonce.$ciphertext);
    }
    return $nonce.$ciphertext;
  }

  /**
  * Decrypts (but does not verify) a message
  *
  * @param string $message - ciphertext message
  * @param string $key - encryption key (raw binary expected)
  * @param boolean $encoded - are we expecting an encoded string?
  * @return string
  */
  public static function decrypt($message, $key, $encoded = false)
  {
    if ($encoded) {
      $message = base64_decode($message, true);
      if ($message === false) {
        throw new Exception('Encryption failure');
      }
    }

    $nonceSize = openssl_cipher_iv_length(self::METHOD);
    $nonce = mb_substr($message, 0, $nonceSize, '8bit');
    $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

    $plaintext = openssl_decrypt(
      $ciphertext,
      self::METHOD,
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );

    return $plaintext;
  }
}

class Mainmodel extends CI_model{


  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->library('session');
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Manila');

  }

  public function login_acc($input)
  {
    // $hash = '$2y$10$AU48IqTwyyySK0wzGl5XcOKNSLE5ZhGLQ2xPg4';
    $testpassword = "";
    $userdata = array();
    $data = array(
      'username' => $input['username'],
      'password' => $input['password']

    );



    $query = $this->db->select('*')
    ->from('user')
    ->join('sysuser_type', 'sysuser_type.usertype_id=user.user_level')
    ->where('username',$data['username'])
    ->get();

    if($query->num_rows() > 0){
      foreach($query->result() as $k){
        $testpassword = $k->password;



      }



      if(md5($data['password']) == $testpassword){
        foreach($query->result() as $r){
          $userdata['user_id'] = $r->user_id;
          $userdata['user_fullname'] = $r->usr_firstname." ".$r->usr_middlename." ".$r->usr_lastname;
          $userdata['position'] = $r->position;
          $userdata['user_level'] = $r->user_type;
          $userdata['user_type'] = $r->user_type;
          $userdata['username'] = $r->username;
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
      'floor_level' =>$data['floor_level'],
      'section' =>$data['section'],
      'date_occupied' =>$data['date_occupied']
    );

    $data3 = array(
      'business_name' =>$data['business_name'],
      'business_id' =>$data['business_id'],
      'nature_or_business' =>$data['nature_or_business'],
      'Date_Registered' =>$data['Date_Registered'],
      'Date_Renewed' =>$data['Date_Renewed']
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


    // $encrypted = SaferCrypto::encrypt($inputData['password'],'ching');
    $data1 = array(
      'usr_firstname' => $inputData['firstname'],
      'usr_middlename' => $inputData['middlename'],
      'usr_lastname' => $inputData['lastname'],
      'username' => $inputData['username'],
      'password' => md5($inputData['password']),
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



  public function gettenanttable($search, $searchcat)
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->like("concat($searchcat)",$search);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'c_info_stall_number' => $r->unit_no,
        'c_info_section' => $r->Section,
        'c_info_natbus' => $r->nature_or_business,
        'c_info_area' => $r->sqm,
        'c_info_daily_fee'=> $r->dailyfee,
        'c_info_fullname_owner'=> $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname ,
        'c_info_fullname_occupant'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
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

    $array = array('cancel_status' => 'NOT');

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

    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');
    $this->db->where($array);

    $query = $this->db->get();
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' =>$r->firstname.' '.$r->middlename.' '.$r->lastname,
        'pay_or' => $r->or_number,
        'pay_amount' =>$r->payment_amount,
        'pay_nature' =>$r->payment_nature_name,
        'pay_date' => $r->payment_datetime,
        'pay_fund' =>$r->fund_name,
        'pay_collector' =>$r->collector
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

  public function printconsexcelotc($sort)
  {
    $array = array('cancel_status' => 'NOT');
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
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->not_like('or_number', "M");
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

    $this->db->where($array);
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
        'trans_fund'=> $r->fund_name,
        'trans_stall'=> $r->unit_no
      );
    }

    return $data;
  }


  public function printconsexcelotcstall($sort)
  {
    $array = array('cancel_status' => 'NOT');
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
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->not_like('or_number', "M");
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
    $this->db->where($array);
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

  public function printtransactemtstall($sort)
  {

    $array = array('cancel_status' => 'NOT');
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
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');
        break;

        case 'delivery':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->like('or_number', "M");
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
    $this->db->where($array);
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
        'trans_fund'=> $r->fund_name,
        'trans_stall'=> $r->unit_no
      );
    }

    return $data;
  }

  public function printtransactemt($sort)
  {
    $array = array('cancel_status' => 'NOT');
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
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');
        break;

        case 'delivery':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->like('or_number', "M");
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
    $this->db->where($array);
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

  public function getcustomerinfomod($id)
  {
    $this->db->where('customer_id', $id);
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }

  public function getdebtmod($id)
  {
    $this->db->where('tr.customer_id', $id);
    // $this->db->select('tr.customer_id');
    // $this->db->from('tr.transaction');
    $this->db->join('payment_nature as pn', 'pn.payment_nature_id = tr.payment_nature_id');
    // $this->db->or_where('tr.payment_nature_id', '4009');
    // $this->db->or_where('tr.payment_nature_id', '4010');
    // $this->db->or_where('tr.payment_nature_id', '4011');
    // $this->db->or_where('tr.payment_nature_id', '4004');
    // $this->db->or_where('tr.payment_nature_id', '4005');
    // $this->db->or_where('tr.payment_nature_id', '4006');
    $this->db->where('tr.payment_nature_id != ', '4016');
    $this->db->where('tr.payment_nature_id != ', '4007');
    $this->db->where('tr.payment_nature_id != ', '4008');
    $this->db->where('tr.payment_nature_id != ', '4012');
    $this->db->where('tr.payment_nature_id != ', '4014');
    $this->db->where('tr.payment_nature_id != ', '4015');
    $this->db->where('tr.payment_nature_id != ', '4016');
    $this->db->where('tr.payment_nature_id != ', '4017');
    $this->db->order_by('effectivity', 'DESC ');
    $this->db->limit(1);
    $query = $this->db->get('transaction as tr');
    if($query->num_rows() > 0){
      return $query->result();
    } else {
      return "stillnopay";
    }


    echo $query;
  }



  public function getcustomerinfotablemod($search, $searchcat)
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $this->db->like("concat(firstname,' ',middlename,' ',lastname,' ',unit_no,' ',aofirstname,' ',aomiddlename,' ',aolastname,' ',section,' ',nature_or_business,' ',customer_id,'',sqm)",$search);
    $this->db->like("concat($searchcat)",$search);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'c_info_stall_number' => $r->unit_no,
        'c_info_section' => $r->Section,
        'c_info_natbus' => $r->nature_or_business,
        'c_info_area' => $r->sqm,
        'c_info_daily_fee'=> $r->dailyfee,
        'c_info_fullname_owner'=> $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname ,
        'c_info_fullname_occupant'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Load Data</button>
        </div>',

        'btn2'=>

        '<div class="">
        <button type="button" onclick="addnotes('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add note</button>
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

  public function getcustomertablepay()
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

  public function getPayAmbulantTableMod($search, $searchcat)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->select('*')
    // ->from('customer')
    // ->like("concat(firstname,' ',middlename,' ',lastname,' ',location,' ',location_no)",$search)
    // ->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id')
    // ->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id')
    // ->get();
    // $this->db->like("concat(customer_id,' ',firstname,' ',middlename,' ',lastname,' ',nature_of_business,' ',location_no)",$search);
    $this->db->like("concat($searchcat)",$search);
    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id');
    $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'pay_ambu_location' => $r->location,
        'pay_ambu_locnum'=> $r->location_no,
        'nature_of_business'=> $r->nature_of_business,
        'pay_ambu_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3 text-white" name="button" id="loadcus">Load Data</button>
        </div>',

        'btn2'=>

        '<div class="">
        <button type="button" onclick="addnotes('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add note</button>
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

  // public function getPayAmbulantTablepay($search, $searchcat)
  // {
  //   $draw = intval($this->input->get("draw"));
  //   $start = intval($this->input->get("start"));
  //   $length = intval($this->input->get("length"));
  //
  //   $query = $this->db->select('*')
  //   ->from('customer')
  //   ->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id', 'inner')
  //   ->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id', 'inner')
  //   ->like("concat($searchcat)",$search)
  //   ->get();
  //
  //   // $this->db->like("concat(firstname,' ',middlename,' ',lastname,' ',location,' ',location_no)",$search);
  //   // $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id', 'inner');
  //   // $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id', 'inner');
  //   $data = [];
  //   foreach ($query->result() as $r) {
  //     $data[] = array(
  //       'id' => $r->customer_id,
  //       'pay_ambu_location' => $r->location,
  //       'pay_ambu_locnum'=> $r->location_no,
  //       'pay_ambu_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
  //       'btn'=>
  //
  //       '<div class="">
  //       <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3 text-white" name="button" id="loadcus">Load Data</button>
  //       </div>'
  //     );
  //   }
  //   $result = array(
  //     "draw" => $draw,
  //     "recordsTotal" => $query->num_rows(),
  //     "recordsFiltered" => $query->num_rows(),
  //     "data" => $data
  //   );
  //   return $result;
  // }

  public function getdeliverypaytablemod($search, $searchcat)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $query = $this->db->select('*')
    ->from('customer')
    ->join('delivery', 'delivery.fk_customer_id=customer.customer_id', 'inner')
    ->like("concat($searchcat)",$search)
    ->get();

    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'pay_delivery_id' => $r->firstname,
        'pay_delivery_name'=> $r->middlename,
        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Load Data</button>
        </div>'
        ,
        'btn2' =>

        '<div class="">
        <button type="button" onclick="addnotes('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add notes</button>
        </div>'
        ,
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

  public function getdeliverypaytablepay($search)
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $query = $this->db->select('*')
    ->from('customer')
    ->join('delivery', 'delivery.fk_customer_id=customer.customer_id', 'inner')
    ->like("concat(firstname,' ',middlename,' ',delivery_id)",$search)
    ->get();

    // $this->db->like("concat(firstname,' ',middlename,' ',deliver_id,')",$search);
    // $this->db->join('delivery', 'delivery.fk_customer_id=customer.customer_id', 'inner');
    // $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->delivery_id,
        'pay_delivery_id' => $r->firstname,
        'pay_delivery_name'=> $r->middlename,
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

  // public function getparkingpaytablemod($search, $searchcat)
  // {
  //
  //   $draw = intval($this->input->get("draw"));
  //   $start = intval($this->input->get("start"));
  //   $length = intval($this->input->get("length"));
  //   $this->db->like("concat($searchcat)",$search);
  //   $this->db->join('driver', 'driver.fk_customer_id=customer.customer_id', 'inner');
  //   $this->db->join('parking_lot', 'driver.driver_id=parking_lot.driver_id', 'inner');
  //   $query = $this->db->get('customer');
  //   $data = [];
  //   foreach ($query->result() as $r) {
  //     $data[] = array(
  //       'id' => $r->customer_id,
  //       'pay_parking_lot' => $r->lot_no,
  //       'pay_parking_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
  //       'btn'=>
  //       '<div class="">
  //       <a href="#sect2"><button type="button" onclick="fetchdata('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Load Data</button></a>
  //       </div>'
  //     );
  //   }
  //   $result = array(
  //     "draw" => $draw,
  //     "recordsTotal" => $query->num_rows(),
  //     "recordsFiltered" => $query->num_rows(),
  //     "data" => $data
  //   );
  //   return $result;
  // }

  public function getparkingpaytablemod($search, $searchcat)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->like("concat($searchcat)",$search);
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

  public function getparkingpaytablepay($search)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    // $query = $this->db->select('*')
    // ->from('customer')
    //
    // ->join('driver', 'driver.fk_customer_id=customer.customer_id')
    // ->join('parking_lot', 'driver.driver_id=parking_lot.driver_id')
    // ->like("concat(firstname,' ',middlename,' ',lastname,' ',driver_id,' ',lot_no)",$search)
    // ->group_by('driver_id')
    // ->get();


    $this->db->like("concat(firstname,' ',middlename,' ',lastname,' ',lot_no)",$search);
    $this->db->join('driver', 'driver.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('parking_lot', 'driver.driver_id=parking_lot.driver_id', 'inner');
    // $this->db->group_by("driver.driver_id");
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'pay_driver_id' => $r->driver_id,
        'pay_parking_lot' => $r->lot_no,
        'pay_parking_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
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






  public function getcustomerinfopaymod($id)
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->select('*')
    ->from('customer')
    ->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner')
    ->join('stall', 'tenant.tenant_id = stall.tenant_id', 'inner')
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

  public static function numtowords($x)
  {
    $oneto19 = array("","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","ELEVEN","TWELVE","THIRTEEN","FOURTEEN","FIFTEEN","SIXTEEN","SEVENTEEN","EIGHTEEN","NINETEEN");
    $tens = array("","","TWENTY","THIRTY","FOURTY","FIFTY","SIXTY","SEVENTY","EIGHTY","NINETY");
    $hundreds = array("","ONE HUNDRED","TWO HUNDRED","THREE HUNDRED", "FOUR HUNDRED", "FIVE HUNDRED", "SIX HUNDRED", "SEVEN HUNDRED" ,"EIGHT HUNDRED" ,"NINE HUNDRED");
    $scale = array("","","THOUSAND", "MILLION");
    $num = number_format($x,2,".",",");
    $num_arr = explode(".",$num);
    $numwords = "";
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = explode(",",$wholenum);
    $whole_count = count($whole_arr);
    $scaleCounter = $whole_count;
    for($i=0;$i<$whole_count;$i++)
    {
      $digitcount = strlen($whole_arr[$i]);
      switch($digitcount)
      {
        case "3":
        $digit3 = substr($whole_arr[$i],0,1);
        $whole_arr[$i] = $whole_arr[$i] - ($digit3 * 100);
        $numwords .= "".$hundreds[$digit3]." ";
        case "2":
        $digit2 = substr($whole_arr[$i],0,1);
        if($digit2 < 2)
        {
          $digit1 = substr($whole_arr[$i],1,1);
          $digit21 = $digit2."".$digit1;
          $numwords .= $oneto19[$digit21]." ";
          break;
        }
        else
        {
          $digit2 = substr($whole_arr[$i],0,1);
          $whole_arr[$i] = $whole_arr[$i] - ($digit2 * 10);
          $numwords .= $tens[$digit2]." ";
        }
        case "1":
        $digit1 = substr($whole_arr[$i],0,1);
        $whole_arr[$i] = $whole_arr[$i] - ($digit1 * 1);
        $numwords .= $oneto19[$digit1]." ";
        break;
      }
      $numwords .= $scale[$scaleCounter]." ";
      $scaleCounter--;
    }
    if($decnum > 0){
      $numwords .= " PESOS and ";
      if($decnum < 20 ){
        if($decnum<10)
        {
          $decnum = str_replace(0,"",$decnum);
          $numwords .= $oneto19[$decnum];
        }
        else{
          $numwords .= $oneto19[$decnum];
        }
      }elseif($decnum < 100){
        $numwords .= $tens[substr($decnum,0,1)];
        $numwords .= " ".$oneto19[substr($decnum,1,1)];
      }
      $numwords .= ' '.'CENTS';
    }
    else{
      $numwords .= 'PESOS';
    }
    return $numwords;
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
      'business_id' => $inputData['Business_Id'],
      'business_name' => $inputData['Business_Name'],
      'fk_customer_id' => $last_id,
      'date_registered' => $inputData['Date_Registered'],
      'date_renewed' => $inputData['Date_Renewed']
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

  public function get_customertable_violation_mod($search)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->like("concat(firstname,' ',middlename,' ',lastname,' ',address,' ',aofirstname,' ',aomiddlename,' ',aolastname)",$search);
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

  public function add_park_get_stall($search)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->select('*')
    ->from('customer')
    ->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner')
    ->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner')
    ->like("concat(firstname,' ',middlename,' ',lastname,' ',section,' ',Floor_level)",$search)
    ->get();

    // $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    // $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    // $this->db->where('NOT EXISTS (select * FROM customer AS c LEFT JOIN tenant AS t ON t.fk_customer_id=c.customer_id LEFT JOIN parking_lot AS p ON t.tenant_id=p.tenant_id)', '', FALSE);
    // $query = $this->db->get('customer');
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
        'customer_id' => $r->customer_id,
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

  public function get_cheque_list()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $query = $this->db->get('cheque_details');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'cheque_id' => $r->cheque_id,
        'cheque_amount' => $r->cheque_amount,
        'cheque_number'=> $r->cheque_number,
        'bank_branch'=> $r->bank_branch,
        'fk_stall_no'=> $r->fk_stall_no,
        'fk_transaction_id'=> $r->fk_transaction_id
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
    return $table;
    $this->db->insert($table,$data);

    $this->db->where($data);
    $query = $this->db->get($table);
    $dataArray = array();
    foreach ($query->result() as $r) {
      array_push($dataArray,$r);
    }
    return $dataArray;

  }




  // public function savetransaction($table,$data,$count)
  // {
  //   $query = $this->db->insert($table,$data);
  //   $last_id = $this->db->insert_id();
  //   // $ref_numar
  //   // $finalrefnum = $data['reference_num'] . ' ' . $transaction_id;
  //   $newrefnum = array(
  //     'reference_num' => "ONLYFORTESTING",
  //   );
  //   $this->db->trans_start();
  //
  //   $this->db->where($last_id);
  //   $this->db->update('transaction', $newrefnum);
  //   $this->db->trans_complete();
  //
  //
  //   $last_id = $this->db->insert_id();
  //   // return $transaction_id;
  //   // return $count;
  //
  //
  //   return array('query'=> $query, 'id'=>$last_id, 'count' => $count);
  // }

  public function savetransaction($table,$data,$count)
  {
    $query = $this->db->insert($table,$data);
    $last_id = $this->db->insert_id();

    // $ref_numar
    $finalrefnum = $data['reference_num'] . '' . $last_id;

    $this->db->trans_start();
    $newrefnum = array(
      'reference_num' => $finalrefnum,
    );
    $this->db->where('transaction_id', $last_id);
    $this->db->update('transaction', $newrefnum);
    $this->db->trans_complete();
    //
    //
    // $last_id = $this->db->insert_id();
    // return $transaction_id;
    // return $count;


    return array('query'=> $query, 'id'=>$last_id, 'count' => $count);
  }

  public function savetransactionviolation($table,$data,$count,$violation_id)
  {
    $query = $this->db->insert($table,$data);
    $transaction_id = $this->db->insert_id();
    // return $transaction_id;
    // return $count;

    $this->db->trans_start();
    $paid = array(
      'status' => "PAID"
    );
    $this->db->where($violation_id);
    $this->db->update('violation', $paid);
    $this->db->trans_complete();


    return array('query'=> $query, 'id'=>$transaction_id, 'count' => $count, 'violation_id' => $violation_id);
  }




  public function savepayment2($table,$data)
  {
    $query =  $this->db->insert($table,$data);
    return $data;


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
      // 'password' => md5($inputData['usr_pass']),
      'position' => $inputData['usr_position'],
      'user_level' => $inputData['user_lvl']
    );

    $user_id = array(
      'user_id' => $inputData['usr_id']
    );


    $this->db->where($user_id);
    $this->db->update('user', $data_user);


  }


  public function getsystemusertablemod($search, $searchcat)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $usertype = array(1,2);


    $this->db->group_start()
    ->like("concat($searchcat)",$search)
    ->where_in('user.user_level', $usertype)
    ->group_end();
    // $this->db->like("concat($searchcat)",$search);
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
        <button type="button" onclick="fetchdata('.$r->user_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Load Data</button>
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
    $this->db->group_by('or_number');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->or_number,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'c_info_stall_number' => $r->unit_no,
        'c_info_address' => $r->address,

        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->transaction_id.'); " class="btn btn-sm btn-info ml-3 " name="button" id="loadcus">Print</button>
        </div>',

        'btn2'=>

        '<div class="">
        <button type="button" onclick="removecert('.$r->transaction_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Remove</button>
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

  public function updatecert($data){

    $data1 = array(
      'print_status' => 'PRINTED',
      'cert_type' => $data['cert_type1']

    );

    $this->db->where('transaction_id',$data['trans_id1'])
    ->update('transaction',$data1);
    return true;
  }

  public function checkviolationpay($id)
  {
    $this->db->where('customer_id', $id);
    $this->db->where('status', 'NOT PAID');
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('violation', 'violation.stall_id=stall.stall_id', 'inner');
    $query = $this->db->get('tenant');
    if($query->num_rows() >= 1) {
      return 'withviolation';
    }else {
      $this->db->trans_start();
      $this->db->where('fk_customer_id', $id);
      $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
      $query = $this->db->get('customer');
      return $query->result();
      echo $query;
    }
  }

  public function numberofstalls()
  {

    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->num_rows();
  }

  public function numberofambu()
  {

    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id', 'inner');
    $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->num_rows();
  }

  public function numberofcurtrans()
  {
    $now = date('Y-m-d');
    $this->load->helper('date');
    $this->db->like('payment_datetime', $now);
    $query = $this->db->get('transaction');
    return $query->num_rows();
  }

  public function stallspaid()
  {
    $result =  array();
    $paynat = array('4004', '4004', '4005', '4006', '4009', '4010', '4011');
    $now = date('Y-m-d');
    $this->load->helper('date');

    $this->db->select_max('effectivity');
    $this->db->group_start()
    ->where('effectivity >=', $now)
    ->where_in('payment_nature_id', $paynat)
    ->group_end();
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->order_by("effectivity", "DESC");
    $this->db->group_by('customer.customer_id');
    $query = $this->db->get('customer');
    return $query->num_rows();

    // foreach($query->result() as $row)
    // {
    //   array_push($result,$row);
    // }
    // return $result;
  }

  public function debtstat()
  {
    $result = array();
    $paynat = array('4004', '4004', '4005', '4006', '4009', '4010', '4011');
    $now = date('Y-m-d');
    $this->load->helper('date');

    $this->db->select_max('effectivity');
    $this->db->group_start()
    ->where('effectivity >=', $now)
    ->where_in('payment_nature_id', $paynat)
    ->group_end();
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->order_by("effectivity", "DESC");
    $this->db->group_by('customer.customer_id');
    $query1 = $this->db->get('customer');


    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->group_by('customer.customer_id');
    $query2 = $this->db->get('customer');

    $diff1 = $query1->num_rows();
    $diff2 = $query2->num_rows();

    $numdebt = $diff2 - $diff1;

    // echo "Difference: ", $numdebt;


    return  $numdebt;

    // return  $query2->num_rows() - $query1->num_rows();

    // foreach($query2->result() as $row)
    // {
    //   array_push($result,$row);
    // }
    // return $result;
  }







  // public function stall_number_submit($inputData)
  // {
  //
  //   $stall_num_global = array('unit_no' => $inputData['stall']);
  //   return $inputData;
  //
  // }








  public function getstallFLOOR($inputData)
  {
    $test = "yeah hahah";
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->like('unit_no',  $inputData.'-');
    $this->db->or_where('unit_no',  $inputData);
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'left');
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id' , 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id' , 'inner');
    $this->db->group_by("customer.customer_id");
    // $this->db->order_by('effectivity', 'DESC');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'unit_no' => $r->unit_no,
        'name' => $r->firstname.' '.$r->middlename.' '.$r->lastname,

        'effectivity' => $r->customer_id,

        'payment'=>

        '<div class="">
        <button type="button" onclick="launch_pay('.$r->customer_id.');" class="btn btn-sm btn-info ml-3" name="button" >Payment</button>
        </div>',

        'client_info'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->customer_id.');" class="btn btn-sm btn-info ml-3" name="button" >View</button></a>
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
    echo $query;
  }

  public function resolveViolationMod($inputData)
  {
    $data_transaction = array(
      'payment_nature_id' => '4016',
      'payment_amount' => $inputData['cash_tendered'],
      'customer_id' => $inputData['customer_id'],
      'or_number' => $inputData['OR'],
      'effectivity' => $inputData['payment_effect'],
      'collector' => $inputData['sysuser'],
    );

    $violation_id = array(
      'violation_id' => $inputData['violation_id_f']
    );

    $this->db->trans_start();
    $this->db->insert('transaction', $data_transaction);
    $paid = array(
      'status' => "PAID"
    );
    $this->db->where($violation_id);
    $this->db->update('violation', $paid);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
      echo '<script>console.log(" not working")</script>';
    }
  }

  function fetch_user()
  {
    $result =  array();
    $query = $this->db->get('user');

    foreach($query->result() as $row)
    {
      array_push($result,$row);
    }
    return $result;
  }

  function fetch_section()
  {
    $result =  array();
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
    $this->db->group_by("stall.Section");
    $query = $this->db->get('customer');
    foreach($query->result() as $row)
    {
      array_push($result,$row);
    }
    return $result;
  }

  public function numberofviolation()
  {
    $this->db->where('status', "NOT PAID");
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('violation', 'stall.stall_id=violation.stall_stall_id', 'inner');
    $query = $this->db->get('customer');
    return $query->num_rows();
  }

  public function numberoftranstoday()
  {
    $now = date('Y-m-d');
    $this->load->helper('date');
    $this->db->like('payment_datetime', $now);
    $query = $this->db->get('transaction');
    return $query->num_rows();
  }

  public function emtbackend($sort)
  {

    $array = array('cancel_status' => 'NOT');
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
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else{
      $this->db->like('or_number', "M");
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
    $this->db->where($array);
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

  public function otcbackend($sort)
  {
    $array = array('cancel_status' => 'NOT');
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
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'parking':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'tenant':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;

        case 'delivery':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else{
      $this->db->not_like('or_number', "M");
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
    $this->db->where($array);
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

  public function cashrepbackend($sort){

    $array = array('cancel_status' => 'NOT');
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
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'tenant':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;


        case 'parking':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'delivery':
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->not_like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else {
      $this->db->not_like('or_number', "M");
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
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');
    $this->db->where($array);
    $query = $this->db->get();

    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' =>$r->firstname.' '.$r->middlename.' '.$r->lastname,
        'pay_or' => $r->or_number,
        'pay_amount' =>$r->payment_amount,
        'pay_nature' =>$r->payment_nature_name,
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


  public function consolirepbackend($sort){
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
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
        break;

        case 'tenant':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
        break;


        case 'parking':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('driver', 'driver.fk_customer_id = customer.customer_id', 'inner');
        $this->db->join('parking_lot', 'parking_lot.driver_id = driver.driver_id', 'inner');
        break;

        case 'delivery':
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        $this->db->join('delivery', 'delivery.fk_customer_id = customer.customer_id', 'inner');
        break;

        default:
        $this->db->like('or_number', "M");
        $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
        $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
        break;
      }
    }
    else {
      $this->db->like('or_number', "M");
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


  public function getcertprinttable($search, $searchcat)
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $array = array('payment_nature_id' => 4015, 'print_status' => 'PRINTED');
    $this->db->like("concat($searchcat)",$search);
    $this->db->where($array);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');

    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'cert_trans_id' => $r->transaction_id,
        'cert_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'cert_dop' => $r->payment_datetime,
        'cert_type' => $r->cert_type,
        'cert_ref_num' => $r->reference_num,
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

  public function getcertprinttableOLD()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $array = array('payment_nature_id' => 4015, 'print_status' => 'PRINTED');
    // $this->db->like("concat($searchcat)",$search);
    $this->db->where($array);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');

    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'cert_trans_id' => $r->transaction_id,
        'cert_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'cert_dop' => $r->payment_datetime,
        'cert_type' => $r->cert_type,
        'cert_ref_num' => $r->reference_num,
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


  public function transtodaytable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $now = date('Y-m-d');
    $this->load->helper('date');


    $query = $this->db->select('*')
    ->from('transaction')
    ->like('payment_datetime', $now)
    ->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner')
    ->join('customer','customer.customer_id = transaction.customer_id','inner')
    ->get();
    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        // 'id' => $k->customer_id,
        'name' => $k->firstname.' '.$k->middlename.' '.$k->lastname,
        'or' => $k->or_number,
        'amount' =>$k->payment_amount,
        'nature' =>$k->payment_nature_name,
        'effectivity' =>$k->effectivity,
        'date' =>$k->payment_datetime,
        'cancel' =>$k->cancel_status
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

  public function stallpaidtable()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $paynat = array('4004', '4004', '4005', '4006', '4009', '4010', '4011');
    $array = array('cancel_status' => 'NOT');
    $now = date('Y-m-d');
    $this->load->helper('date');


    $this->db->select("customer.customer_id, firstname, middlename, lastname, unit_no,
    or_number, payment_nature_name, payment_amount, payment_datetime");
    $this->db->select('MAX(effectivity) AS effectivity');

    $this->db->group_start()
    ->where('effectivity >=', $now)
    ->where('cancel_status', 'NOT')
    ->where($array)
    ->where_in('payment_nature.payment_nature_id', $paynat)
    ->group_end();

    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');
    $this->db->order_by("effectivity", "DESC");
    // $this->db->limit(1);
    $this->db->group_by('customer.customer_id');
    $query = $this->db->get('customer');

    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        // 'id' => $k->customer_id,
        'name' => $k->firstname.' '.$k->middlename.' '.$k->lastname,
        'unit' => $k->unit_no,
        'or' => $k->or_number,
        'amount' =>$k->payment_amount,
        'nature' =>$k->payment_nature_name,
        'effectivity' =>$k->effectivity,
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

  public function ambutablehome()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id=customer.customer_id');
    $this->db->join('ambulant_unit', 'ambulant.ambulant_id=ambulant_unit.ambulant_id');
    $query = $this->db->get('customer');

    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        'id' => $k->customer_id,
        'pay_ambu_location' => $k->location,
        'pay_ambu_locnum'=> $k->location_no,
        'nature_of_business'=> $k->nature_of_business,
        'pay_ambu_name'=> $k->firstname.' '.$k->middlename.' '.$k->lastname
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


  // public function debttableno()
  // {
  //
  //   $draw = intval($this->input->get("draw"));
  //   $start = intval($this->input->get("start"));
  //   $length = intval($this->input->get("length"));
  //   $paynat = array('4004', '4004', '4005', '4006', '4009', '4010', '4011');
  //   $now = date('Y-m-d');
  //   $this->load->helper('date');
  //
  //
  //   $this->db->select('*');
  //   $this->db->where('IS NULL(transaction.effectivity)');
  //   $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'right');
  //   $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'right');
  //   $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'left');
  //   $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'left');
  //   $this->db->order_by("effectivity", "DESC");
  //   $this->db->group_by('customer.customer_id');
  //   $query = $this->db->get('customer');
  //
  //   $data =[];
  //   foreach($query->result() as $k)
  //   {
  //     $data[] = array(
  //       'id' => $k->customer_id,
  //       'name' => $k->firstname.' '.$k->middlename.' '.$k->lastname,
  //       'unit' => $k->unit_no,
  //       'or' => $k->or_number,
  //       'amount' =>$k->payment_amount,
  //       'nature' =>$k->payment_nature_name,
  //       'effectivity' =>$k->effectivity,
  //       'date' =>$k->payment_datetime
  //     );
  //   }
  //
  //   $result = array(
  //     "draw" => $draw,
  //     "recordsTotal" => $query->num_rows(),
  //     "recordsFiltered" => $query->num_rows(),
  //     "data" => $data
  //   );
  //   return $result;
  // }
  //
  //
  public function debttable()
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $paynat = array('4004', '4004', '4005', '4006', '4009', '4010', '4011');
    $now = date('Y-m-d');
    $this->load->helper('date');
    $nopast = "NO past transactions";
    $string = '';



    $this->db->select("customer.customer_id, firstname, middlename, lastname, unit_no,
    or_number, payment_nature_name, payment_amount,effectivity,

    CASE
    WHEN max(effectivity) >= curdate() THEN 'PAID'
    WHEN max(effectivity) <  curdate() THEN 'NOT PAID'
    WHEN max(effectivity) IS NULL THEN 'no past transaction'
    else 'Else cond'
    END AS PAIDSTAT

    ");

    // $this->db->select('COALESCE(NULLIF(firstname, ""), "Incomplete Info") AS firstname', false);
    // $this->db->select('COALESCE(NULLIF(middlename, ""), "Incomplete Info") AS middlename', false);
    // $this->db->select('COALESCE(NULLIF(lastname, ""), "Incomplete Info") AS lastname', false);
    $this->db->select('COALESCE(NULLIF(unit_no, ""), "Incomplete Info") AS unit_no', false);


    $this->db->select('COALESCE(NULLIF(or_number, ""), "No past transaction") AS or_number', false);
    $this->db->select('COALESCE(NULLIF(payment_nature_name, ""), "No past transaction") AS payment_nature_name', false);
    $this->db->select('COALESCE(NULLIF(payment_amount, ""), "No past transaction") AS payment_amount', false);
    $this->db->select('MAX(COALESCE(NULLIF(effectivity, ""), "No past transaction")) AS effectivity',false);

    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'left');
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'left');


    $this->db->group_start()
    ->where('cancel_status', 'NOT')
    ->where_in('transaction.payment_nature_id', $paynat)
    ->or_where('transaction_id IS NULL')
    ->group_end();


    $this->db->order_by("effectivity", "ASC");
    $this->db->group_by('customer.customer_id');

    $query = $this->db->get('customer');

    $data =[];
    foreach($query->result() as $k)
    {
      $data[] = array(
        'name' => $k->firstname.' '.$k->middlename.' '.$k->lastname,
        'unit' => $k->unit_no,
        'or' => $k->or_number,
        'amount' =>$k->payment_amount,
        'nature' =>$k->payment_nature_name,
        'effectivity' =>$k->effectivity,
        'paidstat' =>$k->PAIDSTAT,
        'btn_view' =>

        '<div class="">
        <button type="button" onclick="topay('.$k->customer_id.');" class="btn btn-sm btn-info ml-3" name="button" id="loadcus">To payment</button>
        </div>'
      );

      foreach ($data as $key => $value) {
        if (is_null($value)) {
          $data[$key] = "No Past transaction";
        }
      }
    }

    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    return $result;
  }


  public function consolidationtablesortTenant($sort){

    $array = array('cancel_status' => 'NOT');
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $this->db->select('*')
    ->from('transaction');
    // $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');


    if($sort != null)
    {
      // $this->db->like('or_number', "M");
      $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
      $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');

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
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');
    $this->db->where($array);
    $query = $this->db->get();

    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'pay_fullname' =>$r->firstname.' '.$r->middlename.' '.$r->lastname,
        'pay_or' => $r->or_number,
        'pay_amount' =>$r->payment_amount,
        'pay_nature' =>$r->payment_nature_name,
        'pay_date' => $r->payment_datetime,
        'pay_fund' =>$r->fund_name,
        'pay_collector' =>$r->collector,
        'unit_no' =>$r->unit_no
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

  public function consolidationtablesortTenant2($sort){

    $array = array('cancel_status' => 'NOT');
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $this->db->select('*')
    ->from('transaction');
    // $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');


    if($sort != null)
    {
      $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
      $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');

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

    $this->db->where($array);
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
        'unit_no' =>$r->unit_no
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

  public function consexceltenant($sort){


    $this->db->select('*')
    ->from('transaction');
    // $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    // $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');


    if($sort != null)
    {
      $this->db->like('or_number', "M");
      $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
      $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');
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
        'pay_stall' =>$r->unit_no
      );
    }

    return $data;
  }

  public function emtbackendTenant($sort)
  {
    $array = array('cancel_status' => 'NOT');
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

      $this->db->like('or_number', "M");
      $this->db->join('fund', 'transaction.fund_id = fund.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
      $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');
    }
    else{
      $this->db->like('or_number', "M");
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
    $this->db->where($array);
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
        'trans_fund'=> $r->fund_name,
        'unit_no'=> $r->unit_no
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


  public function otcbackendtenant($sort)
  {
    $array = array('cancel_status' => 'NOT');
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
    if($sort != null){

      $this->db->not_like('or_number', "M");
      $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
      $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
      $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
      $this->db->join('stall', 'stall.tenant_id = tenant.tenant_id', 'inner');

    }
    else{
      $this->db->not_like('or_number', "M");
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
    $this->db->where($array);
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
        'trans_fund'=> $r->fund_name,
        'unit_no'=> $r->unit_no
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



  public function getstallnotes()
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));


    // $this->db->select('c.customer_id');
    // $this->db->join('tenant', 'tenant.fk_customer_id=c.customer_id', 'inner');
    // $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    // $this->db->join('notes', 'n.fk_customer_id_note=c.customer_id', 'left');
    // $this->db->group_by('c.customer_id');
    // $query = $this->db->get('customer as c, tenant AS t,stall AS s, notes AS n ');

    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
    $this->db->join('notes', 'notes.fk_customer_id_note=customer.customer_id', 'right');
    $this->db->group_by('customer.customer_id');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->customer_id,
        'name' => $r->aofirstname.' '.$r->aomiddlename.' '.$r->aolastname,
        'unit_no' => $r->unit_no,
        'btn_view' =>

        '<div class="">
        <button type="button" onclick="viewnotes('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">View Notes</button>
        </div>'
        ,
        'btn_add' =>

        '<div class="">
        <button type="button" onclick="addnotes('.$r->customer_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Add notes</button>
        </div>'
        ,

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


  public function save_notes($inputData)
  {
    $data_violation = array(
      'title' => $inputData['title'],
      'note' => $inputData['desc'],
      'date_added' => $inputData['date'],
      'fk_customer_id_note' => $inputData['note_id_fk']
    );


    $this->db->insert('notes', $data_violation);

  }


  public function getviewnote($fk_custid_note)
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $this->db->where("concat(fk_customer_id_note)",$fk_custid_note);
    // $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer.customer_id');
    // $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id');
    // $this->db->join('notes', 'notes.fk_customer_id_note=customer.customer_id');
    $query = $this->db->get('notes');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        // 'id' => $r->customer_id,
        'title' => $r->title,
        'date_added' => $r->date_added,
        'btn_view' =>

        '<div class="">
        <button type="button" onclick="viewnotedb('.$r->note_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">View Note</button>
        </div>'
        ,
        'btn_delete' =>

        '<div class="">
        <button type="button" onclick="deletenotedb('.$r->note_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">delete note</button>
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


  public function getnameheader($id)
  {
    $this->db->where('customer_id', $id);
    $this->db->join('tenant', 'customer.customer_id=tenant.fk_customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
    echo $query;
  }

  public function getnotesingles($id)
  {
    $this->db->like("concat(note_id)",$id);
    $query = $this->db->get('notes');
    return $query->result();
    echo $query;
  }


  public function update_note($data){

    $data1 = array(
      'title' =>$data['title'],
      'date_added' =>$data['date'],
      'note' =>$data['desc']
    );

    $this->db->where('note_id',$data['note_id'])
    ->update('notes',$data1);


    return true;
  }


  public function delete_note($id)
  {
    $this->db->where("note_id",$id);
    $this->db->delete('notes');

  }

  public function getcerttableAmbulant()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $array = array('payment_nature_id' => 4015, 'print_status' => 'TO_PRINT', 'cancel_status' => 'NOT');

    $this->db->where($array);

    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
    $this->db->join('ambulant_unit', 'ambulant_unit.ambulant_id = ambulant.ambulant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $r->transaction_id,
        'c_info_fullname_owner'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'c_info_stall_number' => $r->location_no,
        'c_info_address' => $r->address,

        'btn'=>

        '<div class="">
        <button type="button" onclick="fetchdata('.$r->transaction_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Print</button>
        </div>',

        'btn2'=>

        '<div class="">
        <button type="button" onclick="removecert('.$r->transaction_id.'); " class="btn btn-sm btn-info ml-3" name="button" id="loadcus">Remove</button>
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

  public function get_cert_info_ambulant($id)
  {
    $this->db->where('transaction_id', $id);
    $this->db->join('ambulant', 'ambulant.fk_customer_customer_id = customer.customer_id', 'inner');
    $this->db->join('ambulant_unit', 'ambulant_unit.ambulant_id = ambulant.ambulant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $query = $this->db->get('customer');
    return $query->result();
  }


  public function cancelor($data){

    $data1 = array(
      'cancel_status' => "CANCELLED",
      'remarks' =>$data['remarks_f']
    );

    $this->db->where('or_number',$data['ORnum_f'])
    ->update('transaction',$data1);


    return $data;
  }

  public function getcancelledor()
  {

    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $array = array('cancel_status' => 'CANCELLED');
    $this->db->where($array);
    $this->db->join('tenant', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $this->db->join('transaction', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');
    $query = $this->db->get('customer');
    $data = [];
    foreach ($query->result() as $r) {
      $data[] = array(
        'cancel_ornum' => $r->or_number,
        'cancel_name'=> $r->firstname.' '.$r->middlename.' '.$r->lastname,
        'cancel_dop' => $r->payment_datetime,
        'cancel_top' => $r->payment_nature_name,
        'cancel_status' => $r->cancel_status,
        'cancel_remarks' => $r->remarks
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

  public function update_pass($data){

    $data1 = array(
      'password' => md5($data['password_change'])
    );

    $this->db->where('user_id',$data['user_id_change'])
    ->update('user',$data1);



  }

  public function proceedtopay($idar)
  {
    $this->db->where('customer_id', $id);
    $this->db->join('customer', 'tenant.fk_customer_id=customer.customer_id', 'inner');
    $this->db->join('stall', 'stall.tenant_id=tenant.tenant_id', 'inner');
    $query = $this->db->get('tenant');
    return $query->result();
  }

  public function testrefnumphp($inputData)
  {

    //date
    $datenow = date("d/m/Y");
    $datewo = str_replace('/', '', $datenow);

    //or
    $base_or = $inputData['or'];
    $last4_or = substr($base_or, -4);

    // reference number w/o transid
    $new_ref =  $datewo . '' . $last4_or;

    $data = array(
      'or_number' => $inputData['or'],
      'reference_num' => $new_ref
    );

    $this->db->insert('transaction', $data);

    $last_id = $this->db->insert_id();

    // $ref_numar
    $finalrefnum = $new_ref. '' . $last_id;

    $this->db->trans_start();

    $newrefnum = array(
      'reference_num' => $finalrefnum,
    );

    $this->db->where('transaction_id', $last_id);
    $this->db->update('transaction', $newrefnum);

    $this->db->trans_complete();
  }


  public function gettransactionstalltable($sort)
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

    if($sort['dateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['dateFrom'] );
    }
    if($sort['dateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['dateTo'] );
    }

    $this->db->where('customer.customer_id', $sort['customer_id'] );
    $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');





    $query = $this->db->get();



    $data = [];
    $count=0;
    foreach ($query->result() as $r) {
      $count++;
      $data[] = array(
        'id' => $count,
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

  public function transactByStallExcel($sort)
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



    if($sort['conDateFrom'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")>=', $sort['conDateFrom'] );
    }
    if($sort['conDateTo'])
    {
      $this->db->where('date_format(payment_datetime, "%Y-%m-%d")<=', $sort['conDateTo'] );
    }

    $this->db->where('customer.customer_id', $sort['conCustomerId'] );
    $this->db->join('fund', 'fund.fund_id = transaction.fund_id', 'inner');
    $this->db->join('customer', 'customer.customer_id=transaction.customer_id', 'inner');
    $this->db->join('tenant', 'tenant.fk_customer_id = customer.customer_id', 'inner');
    $this->db->join('payment_nature', 'payment_nature.payment_nature_id = transaction.payment_nature_id', 'inner');


    $query = $this->db->get();



    $data = [];
    $count=0;
    foreach ($query->result() as $r) {
      $data[] = array(
        'id' => $count,
        'trans_or' => $r->or_number,
        'trans_amount'=> $r->payment_amount,
        'trans_nature'=> $r->payment_nature_name,
        'trans_date'=> $r->payment_datetime,
        'trans_fund'=> $r->fund_name
      );
    }

    return $data;
  }



}


?>
