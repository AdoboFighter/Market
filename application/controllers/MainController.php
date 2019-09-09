<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class MainController extends CI_Controller{

        public function __construct()
        {
          parent::__construct();

          $this->load->model('Mainmodel','model');



        }



  public function saveSysUser(){
    $inputData = $this->input->post('sysUser');
    echo json_encode(   $this->model->insert_sysUser($inputData)) ;

  }

  public function saveclient()
  {

     $inputData = $this->input->post('client');
     echo json_encode(   $this->model->insert_client($inputData)) ;



  }



  public function savetenant()
  {
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_stall($inputData)) ;
  }



  public function saveambulant()
  {
    $inputData = $this->input->post('data');

    // $inputdata2 = $this->input->post('ambulant');
    // $data = array_merge($inputData , $inputdata2 );
    echo json_encode(  $this->model->insert_ambulant($inputData)  ) ;

  }

  public function savedelivery(){
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_delivery($inputData)) ;

  }

  public function saveparking(){
    $inputData = $this->input->post('data');
    echo json_encode(   $this->model->insert_parking($inputData)) ;
  }



  function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('Mainmodel');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->Mainmodel->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table id="example" class="table table-bordered table-striped">
      <tr>
       <th>Client ID#</th>
       <th>Name</th>
       <th>LastName</th>
       <th>Stall Number</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->Client_Id.'</td>
       <td>'.$row->OFirstname.'</td>
       <td>'.$row->OLastname.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }




public function gettenanttable()
{
echo json_encode($this->model->gettenanttable());


}
public function getstallinfo()
{
  $id = $this->input->post('id');
  echo json_encode($this->model->getstallinfo($id));
}




  }
  ?>
