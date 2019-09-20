<?php
class market_model extends CI_model{

  public function __construct() {
    parent::__construct();

    // To set session inside the model could be use to get session ids.
    $this->load->library('session');
  }

  public function getStallInfo($stall_num)
  {
    $inputdata = $this->db->escape($stall_num);

    $query = $this->db->query('CALL POS_fetchStallInfo('.$inputdata.')');
    $response = array();

    $response['STALL_RES'][] = $query->result();

    return $response;
  }

  public function getAmbulantInfo($firstname)
  {-

    $inputdata = $this->db->escape($firstname);
    $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata.')');
    $response = array();
    $response['AMB_RES'][] = $query->result();
    return $response;
  }


  public function getTransactions($transact)
  {

    $inputdata = $this->db->escape($transact);
    $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata['user'].' , '.$inputdata['date'].')');
    $response = array();
    $response['LIST_TRNS'][] = $query->result();

    return $response;
  }


  public function RegisterAmbulant($registerambulant)
  {
    $inputdata = $this->db->escape($registerambulant);
    $query = $this->db->query('CALL POS_fetchAmbInfo('.$inputdata['firstname'].' , '.$inputdata['middlename'].' , '.$inputdata['lastname'].' , '.$inputdata['business'].' , '.$inputdata['location'].' , '.$inputdata['locationNum'].')');
    $response = array();
    $response['LIST_TRNS'][] = $query->result();
    return $response;
  }


  public function loginAuth($username,$password)
  {
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
  }

  private function getUserDevice($username,$password)
  {
    $query = $this->db->query('CALL POS_GetDeviceUser('.$username.','.$password.')');
  }
