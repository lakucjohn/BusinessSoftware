<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 4:47 PM
 */
require '../../core_resources/connect.inc.php';
class StockManager{

    private $connect;
    public function __construct()
    {
        global $db_conn;
        $this->connect = $db_conn;
    }

    public function addStock($sparePartId, $quantity, $measure){
        $sql = "INSERT INTO in_stock(spare_part, quantity, measure) VALUES ('$sparePartId','$quantity','$measure')";
        mysqli_query($this->connect, $sql);
    }

    public function editStock($sparePartId, $quantity, $measure){
        $sql = "UPDATE in_stock SET quantity=$quantity, $measure='$measure' WHERE spare_part='$sparePartId' ORDER BY id DESC LIMIT 1";
        mysqli_query($this->connect,$sql);
    }

    public function deleteStock($sparePartId){
        $sql = "UPDATE in_stock SET quantity=0 WHERE spare_part='$sparePartId' ORDER BY id DESC LIMIT 1";
        mysqli_query($this->connect,$sql);
    }
}
?>