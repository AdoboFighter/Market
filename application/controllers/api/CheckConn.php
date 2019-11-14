<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CheckConn extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function test() {
        try {
            $this->db->query("SHOW TABLES FROM market_db");
            $res = 'ok';
        } catch (Exception $e) {
            $res = 'dbError';
        } finally {
            $this->db->close();
        }
        echo $res;
    }
}
?>