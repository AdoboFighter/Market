<?php
class market_model extends CI_model{

  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->library('session');
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


  public function loginAuth($username,$password)
  {

  try {
    $username = $this->db->escape($username);
    $password = $this->db->escape($password);
    // $this->db->trans_start();
    $response = array();
    $query = $this->db->query('CALL POS_AuthLogin('.$username.')');

    if ($query) {
      $credentials = $this->getUserDevice($username,$password);
      $response['USER'][] = $credentials->result();
    }else{
      $res_error = array();
      $res_error['ID'] = '';
      $res_error['fullname'] = 'NoUsername';

      $response['USER'][0] = $res_error;
    }
    // $this->db->trans_complete();
    return $response;

  } catch (Exception $e) {
    return "OOPS something went wrong";
  }


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
