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

    private function getFullName($username, $password) {
        $res = $this->db->query("CALL POS_GetDeviceUser('$username', '$password')")->result();
        $this->db->close();
        return $res[0];
    }
}
?>