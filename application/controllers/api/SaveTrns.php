<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SaveTrns extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function proc() {
        $data = json_decode(file_get_contents('php://input'));
        $effDate = date('m/d/Y');
        $query = "CALL POS_SaveTransaction('$data->CustomerID', '$data->Payment', '$data->CollectorID', '$data->CollectorName', '$effDate')";
        $res = $this->db->query($query)->result();
        $this->db->close();
        echo $this->generateOR($res[0]->transaction_id);

    }

    private function generateOR($id) {
        $ORNum = '';
        $idLen = strlen($id);
        $TRNum = 9 - $idLen;
        $TrnGen = 'M';
        if($idLen <= 9){
            for($x= 0; $x < $TRNum; $x++){
                $TrnGen = $TrnGen . '0';
            }
            $ORNum = $TrnGen . $id;
        } else {
            $idOR = substr(strval($id), -9);
            $ORNum = $TrnGen . $idOR;
        }
        $this->db->query("CALL POS_SaveTransactionNumber('$ORNum','$id')");
        $this->db->close();
        return $ORNum;
    }
}
?>