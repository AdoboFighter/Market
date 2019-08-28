<?php
  class Mainmodel extends CI_model{
    function insert_data($inputData)
      {
        $inputData = array(
        'Client_type' => $inputData['Client_type'],
        'OFirstname' => $inputData['OFirstname'],
        'OMiddlename' => $inputData['OMiddlename'],
        'OLastname' => $inputData['OLastname'],
        'OAddress' => $inputData['OAddress'],
        'OContactNum' => $inputData['OContactNum'],
        'OcFirstname' => $inputData['OcFirstname'],
        'OcMiddlename' => $inputData['OcMiddlename'],
        'Oclastname' => $inputData['Oclastname'],
        'OcAddress' => $inputData['OcAddress'],
        'OcContactNum' => $inputData['OcContactNum'],
        'Stall_Number' => $inputData['Stall_Number'],
        'Buss_Id' => $inputData['Buss_Id'],
        'Buss_Name' => $inputData['Buss_Name']

        );
        return $this->db->insert('client', $inputData);

      }

      function fetch_data($query){
        $this->db->select("*");
        $this->db->from("client");

        if($query != '')
        {
          $this->db->like('Client_Id', $query);
          $this->db->or_like('OFirstname', $query);
          $this->db->or_like('OLastname', $query);
          $this->db->or_like('Stall_Number', $query);
        }
        $this->db->order_by('Client_Id', 'DESC');
        return $this->db->get();
      }

  }
 ?>
