<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SaveTrns extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    date_default_timezone_set('Asia/Manila');
  }

  public function testfunc()
  {
    //making an array to store the response
    $response = array();
    $this->response($response);


    //if there is a post request move ahead
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //getting the name from request
      $name = $_POST['name'];

      //creating a statement to insert to database
      $stmt = $conn->prepare("INSERT INTO names (name) VALUES (?)");

      //binding the parameter to statement
      $stmt->bind_param("s", $name);

      //if data inserts successfully
      if($stmt->execute()){
        //making success response
        $response['error'] = false;
        $response['message'] = 'Name saved successfully';
      }else{
        //if not making failure response
        $response['error'] = true;
        $response['message'] = 'Please try later';
      }

    }else{
      $response['error'] = true;
      $response['message'] = "Invalid request";
    }

    //displaying the data in json format
    echo json_encode($response);
  }



  ?>
