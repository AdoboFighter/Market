<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SaveTrns extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function proc() {
        $now = date('Y-m-d H:i:s');
        $data = json_decode(file_get_contents('php://input'));
        $effDate = date('m/d/Y');
        $query = "INSERT INTO market_db.transaction(
            fund_id,
            payment_datetime,
            payment_nature_id,
            payment_amount,
            user_id,
            customer_id,
            effectivity,
            collector
            )
            VALUES(
            1,
            '$now'
            4011,
            '$data->Payment',
            '$data->CollectorID',
            '$data->CustomerID',
            '$effDate',
            '$data->CollectorName'
            )";
        $this->db->query($query);
        $res = $this->db->query("SELECT transaction_id FROM market_db.transaction ORDER BY transaction_id DESC")->result();
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
        $this->db->query("UPDATE market_db.transaction SET or_number = '$ORNum' WHERE transaction_id = '$id'");
        $this->db->close();
        return $ORNum;
    }
}
?>
