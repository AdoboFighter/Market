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
              'section' => $inputData['section']

              );

             $this->db->insert('client', $data1);
             return  $last_id = $this->db->insert_id();

              // $data2 = array(
              // 'Stall_Number' => $inputData['Stall_Number'],
              // 'Buss_Id' => $inputData['Buss_Id'],
              // 'Buss_Name' => $inputData['Buss_Name'],
              // 'Floor_level' => $inputData['Floor_Level'],
              // 'Daily_Fee' => $inputData['Daily_fee'],
              // 'Sqaure_meters' => $inputData['Sqaure_meters'],
              // 'date_Oc' => $inputData['date_Oc'],
              // 'Occupied_by' => $last_id
              // );
              //   return $this->db->insert('stall', $data2);

            }

      function insert_ambulant($inputData)
        {
                $data1 = array(

                'ambu_client_id' => $inputData['id'],
                'location' => $inputData['location'],
                'location_num' => $inputData['locationNum']
                );

                return $this->db->insert('ambulant', $data1);

        }

        function insert_stall($inputData){
          $data1 = array(

          'Stall_Number' => $inputData['stallNum'],
          'Buss_Id' => $inputData['bussid'],
          'Buss_Name' => $inputData['bussname'],
          'Floor_level' => $inputData['Floor_level'],
          'Daily_Fee' => $inputData['dailyfee'],
          'Sqaure_meters' => $inputData['squaremeter'],
          'date_Oc' => $inputData['dateOc'],
          'Occupied_by' => $inputData['id']
          );

          return $this->db->insert('stall', $data1);

        }

        function insert_parking($inputData){
          $data1 = array(
          'park_client_id' => $inputData['id']
          );

          return $this->db->insert('parking', $data1);

        }

        function insert_delivery($inputData){
          $data1 = array(
          'delivery_client_id' => $inputData['id']
          );

          return $this->db->insert('delivery', $data1);

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
