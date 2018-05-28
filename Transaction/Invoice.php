<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:37 PM
 */
require '/opt/lampp/htdocs/Naod-Moses-Co/core_resources/connect.inc.php';
class Invoice{

    public $invoiceNumber;
    public $owner;
    public $amount;
    public $dateRecorded;
    public $connect;
    public function __construct($invoiceNumber, $owner, $amount, $dateRecorded)
    {
        global $db_conn;
        $this->connect = $db_conn;
        $this->invoiceNumber = $invoiceNumber;
        $this->owner = $owner;
        $this->amount = $amount;
        $this->dateRecorded = $dateRecorded;
    }
}
?>