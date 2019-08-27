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
  }
 ?>
