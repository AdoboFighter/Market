<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function auth() {
        $xhrResponse = array();
        $resObj = new stdClass();
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = "SELECT password FROM market_db.user WHERE username = '$username' COLLATE utf8_bin";
        $res = $this->db->query($query)->result();
        $this->db->close();
        if(count($res) > 0){
            if($res[0]->password == $password) {
                $xhrResponse['USER'][0] = $this->getFullName($username, $password);
                // $xhrResponse['USER'][0] = 'Bonbon';
            } else {
                $resObj->ID = '';
                $resObj->fullname = 'PassInc';
                $xhrResponse['USER'][0] = $resObj;
            }
        } else {
            $resObj->ID = '';
            $resObj->fullname = 'NoUsername';
            $xhrResponse['USER'][0] = $resObj;
        }
        echo json_encode($xhrResponse);
    }



    public function savedata()
    {
      $xhrResponse = array();
      $resObj = new stdClass();
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $array = array(
        'username' => $username,
        'password' => $password
      );
      $query =  $this->db->insert('user' , $array);
      echo json_encode($query);

    }



    private function getFullName($username, $password) {
        $res = $this->db->query("SELECT user_id as 'ID', UPPER(CONCAT(usr_firstname,' ',usr_middlename,' ',usr_lastname)) AS 'fullname' FROM market_db.user WHERE username = '$username' AND password = '$password' COLLATE utf8_bin")->result();
        $this->db->close();
        return $res[0];
    }
}
?>
