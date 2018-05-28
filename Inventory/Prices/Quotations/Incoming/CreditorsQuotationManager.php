<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 5:52 PM
 */
require '../../../../core_resources/connect.inc.php';
class CreditorsQuotationManager{
    private $connect;
    public function __construct()
    {
        global $db_conn;
        $this->connect = $db_conn;
    }

    public function addQuotation($sparePartId, $supplierId, $measure, $price){
        $sql = "INSERT INTO supplier_price_quotations(spare_part, supplier, measure, price) VALUES ('$sparePartId','$supplierId','$measure',$price)";
        mysqli_query($this->connect,$sql);
    }

    public function editQuotation($sparePartId, $supplierId, $measure, $price){
        $sql = "UPDATE supplier_price_quotations SET supplier='$supplierId', measure='$measure', price='$price' WHERE spare_part='$sparePartId'";
        mysqli_query($this->connect,$sql);
    }

    public function deleteQuotation($sparePartId,$supplierId){
        $sql = "UPDATE supplier_price_quotations SET status=0 WHERE spare_part='$sparePartId' AND supplier='$supplierId'";
        mysqli_query($this->connect,$sql);
    }
}
?>