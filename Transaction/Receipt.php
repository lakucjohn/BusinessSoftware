<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:12 PM
 */
require '/opt/lampp/htdocs/Naod-Moses-Co/core_resources/connect.inc.php';
class Receipt{
    protected $receiptNumber;
    protected $owner;
    protected $amount;
    protected $connect;
    public function __construct($receiptNumber, $owner, $amount)
    {
        global $db_conn;
        $this->receiptNumber = $receiptNumber;
        $this->owner = $owner;
        $this->amount = $amount;
        $this->connect = $db_conn;
    }
}
?>