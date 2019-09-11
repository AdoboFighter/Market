<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Api_model extends CI_model{

      public function __construct() {
           parent::__construct();

           // To set session inside the model could be use to get session ids.
           $this->load->library('session');
           $this->load->database();
       }

       public function sysUserResgiter($input)
       {
         $data = array(
            'firstname' => $input['firstname'],
            'middlename' => $input['middlename'],
            'lastname' => $input['lastname'],
            'username' => $input['username'],
            'password' => $input['password'],
            'user_lvl' => $input['user_lvl'],
            'position' => $input['position'],
            'address' => $input['address'],
            'contact_num' => $input['contact_num']
         );

         $query = $this->db->insert('sysuser',$data);

         return array(
           'response' => ($query) ? true : false,
           'msg' => ($query) ? 'Register Account done' : 'Error in adding account'
         );

       }

       public function sysUserLogin($input)
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


}
?>
