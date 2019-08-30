<?php
  class Mainmodel extends CI_model{
    function insert_client($inputData)
      {

              $data1 = array(
              'Client_type' => $inputData['Client_type'],
              'OFirstname' => $inputData['OFirstname'],
              'OMiddlename' => $inputData['OMiddlename'],
              'OLastname' => $inputData['OLastname'],
              'OAddress' => $inputData['OAddress'],
              'OContactNum' => $inputData['OContactNum'],
              'OcFirstname' => $inputData['OcFirstname'],
              'OcMiddlename' => $inputData['OcMiddlename'],
              'Oclastname' => $inputData['OcLastname'],
              'OcAddress' => $inputData['OcAddress'],
              'OcContactNum' => $inputData['OcContactNum'],
              'Stall_Number' => $inputData['Stall_Number'],
              'Buss_Id' => $inputData['Buss_Id'],
              'Buss_Name' => $inputData['Buss_Name']

              );

           $this->db->insert('client', $data1);

          $last_id = $this->db->insert_id();




        $data2 = array(
        'Stall_Number' => $inputData['Stall_Number'],
        'Floor_Level' => $inputData['Floor_level'],
        'Daily_Fee' => $inputData['Daily_fee'],
        'Sqaure_meters' => $inputData['Sqaure_meters'],
        'Location' => $inputData['Section'],
          'Occupied_by' => $last_id
        );
                        return $this->db->insert('stall', $data2);

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
