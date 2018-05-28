<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:39 PM
 */
class InvoiceContent{
    public $invoiceNumber;
    public $sparePartId;
    public $quantity;
    public $description;
    public $price;
    public $amount;
    public $connect;
    public function __construct($invoiceNumber,$sparePartId,$quantity,$description,$price,$amount)
    {
        global $db_conn;
        $this->connect = $db_conn;
        $this->invoiceNumber = $invoiceNumber;
        $this->sparePartId = $sparePartId;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->price = $price;
        $this->amount = $amount;
    }
}
?>