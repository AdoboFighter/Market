<?php
class market_model extends CI_model{

  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->database();
  }


  public function checkconnection()
  {
    try {
      $query = $this->db->query('SHOW TABLES FROM market_db');
      $dataArray = array();
      foreach ($query->result() as $r) {
        array_push($dataArray,$r);
      }


      if($dataArray == null){
        return "dbError";
      }else{
        return "ok";
        $data = array(
          'response' => true,
          'content' => $userdata,
          'msg' => 'Login success'
        );

      }
    } catch (Exception $e) {
      return "OOPS something went wrong";
    }
  }

  public function getStallInfo($stall_num)
  {
    try {
      $inputdata = $this->db->escape($stall_num);

      $query = $this->db->query('CALL POS_fetchStallInfo('.$inputdata.')');
      $dataArray = array();
      foreach ($query->result() as $r) {
        array_push($dataArray,$r);
      }
      return $dataArray;

    } catch (Exception $e) {
      return "OOPS something went wrong";
    }

  }

  public function getAmbulantInfo($firstname)
  {

    try {
      $inputdata = $this->db->escape($firstname);
      $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata.')');

      $dataArray = array();

      foreach ($query->result() as $r) {
        array_push($dataArray,$r);
      }


      // $response['STALL_RES'][] = $query->result();

      return $dataArray;

    } catch (\Exception $e) {
      return "OOPS something went wrong";
    }

  }


  public function getTransactions($transact)
  {

    try {
      $inputdata = $this->db->escape($transact);
      $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata['user'].' , '.$inputdata['date'].')');
      $dataArray = array();

      foreach ($query->result() as $r) {
        array_push($dataArray,$r);
      }


      // $response['STALL_RES'][] = $query->result();

      return $dataArray;

    } catch (\Exception $e) {
      return "OOPS something went wrong";
    }

  }


  public function RegisterAmbulant($registerambulant)
  {

    try {
      $inputdata = $this->db->escape($registerambulant);
      $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata['firstname'].' , '.$inputdata['middlename'].' , '.$inputdata['lastname'].' , '.$inputdata['business'].' , '.$inputdata['location'].' , '.$inputdata['locationNum'].')');
      $dataArray = array();

      foreach ($query->result() as $r) {
        array_push($dataArray,$r);
      }


      // $response['STALL_RES'][] = $query->result();

      return $dataArray;

    } catch (\Exception $e) {
      return "OOPS something went wrong";

    }

  }


  // public function loginAuth($username,$password)
  // {
  //
  //   try {
  //     $username = $this->db->escape($username);
  //     $password = $this->db->escape($password);
  //     // $this->db->trans_start();
  //     $response = array();
  //     $query = $this->db->query('CALL POS_AuthLogin('.$username.')');
  //
  //     if ($query) {
  //       $credentials = $this->getUserDevice($username,$password);
  //       $response['USER'][] = $credentials->result();
  //     }else{
  //       $res_error = array();
  //       $res_error['ID'] = '';
  //       $res_error['fullname'] = 'NoUsername';
  //
  //       $response['USER'][0] = $res_error;
  //     }
  //     // $this->db->trans_complete();
  //     return $response;
  //
  //   } catch (Exception $e) {
  //     return "OOPS something went wrong";
  //   }
  //
  //
  // }


  public function loginnow($username,$password)
  {

    // $response = array();
    $this->db->select('user_id');
    $this->db->select('usr_firstname');
    $this->db->select('usr_lastname');
    $this->db->select('usr_middlename');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('user');
    //
    // return $query->num_rows();
    // $data = array();
    //
    // foreach ($query->result() as $r) {
    //   array_push($data,$r);
    // }
  //
  // $query = $this->db->select('*')->where([
  //   'username' => $inputData['username'],
  //   'password' => $inputData['pass']
  // ])->get('user');
  $data = array();
  if($query->num_rows() == 0){
    $data = array(
      'response' => false,
      'content' => null,
          'msg' => 'Login failed bitch'
    );
  }else {
    $userdata = array();
    foreach($query->result() as $r){
      $is = (int)$r->user_id;
      $userdata = array(
        'array_name' => $r->usr_firstname,
        'usr_lastname' => $r->usr_lastname,
        'usr_middlename' => $r->usr_middlename,
        'user_id' => $r->user_id
      );
    }

    $data = array(
      'response' => true,
      'content' => $userdata,
        'msg' => 'success'
    );

  }

  // $this->db->insert('bonilla_test', array('name1' => json_encode($data)));
  return $data;

  }



  private function getUserDevice($username,$password)
  {

    try {
      $query = $this->db->query('CALL POS_GetDeviceUser('.$username.','.$password.')');
    } catch (\Exception $e) {
      return "OOPS something went wrong";

    }

  }

}
?>
