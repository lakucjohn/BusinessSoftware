<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:05 PM
 */
require '/opt/lampp/htdocs/Naod-Moses-Co/core_resources/connect.inc.php';
class CustomerQuotationManager{
    private $connect;
    public function __construct()
    {
        global $db_conn;
        $this->connect = $db_conn;
    }

    public function addQuotation($sparePartId, $transactionType, $measure, $price){
        $sql = "INSERT INTO transactions_price_list(spare_part,transaction_type, measure, price) VALUES ('$sparePartId','$transactionType','$measure',$price)";
        mysqli_query($this->connect,$sql);
    }

    public function editQuotation($sparePartId, $transactionType, $measure, $price){
        $sql = "UPDATE transactions_price_list SET transaction_type='$transactionType', measure='$measure', price='$price' WHERE spare_part='$sparePartId'";
        mysqli_query($this->connect,$sql);
    }

    public function deleteQuotation($sparePartId,$transactionType){
        $sql = "UPDATE transactions_price_list SET status=0 WHERE spare_part='$sparePartId' AND transaction_type='$transactionType'";
        mysqli_query($this->connect,$sql);
    }
}
?>