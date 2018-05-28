<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:12 PM
 */
require '../Receipt.php';
class PurchaseReceipt extends Receipt{

    public function __construct($receiptNumber, $owner, $amount)
    {
        parent::__construct($receiptNumber, $owner, $amount);
    }

    public function createReceipt(){
        $sql = "INSERT INTO cash_purchases(receipt_number, supplier, amount) VALUES ('$this->receiptNumber','$this->owner',$this->amount)";
        mysqli_query($this->connect, $sql);
    }

    public function editReceipt(){
        $sql = "UPDATE cash_purchases SET amount=$this->amount WHERE receipt_number='$this->receiptNumber' AND supplier='$this->owner'";
        mysqli_query($this->connect, $sql);
    }

    public function deleteReceipt(){
        $sql = "UPDATE cash_purchases SET status=0 WHERE receipt_number='$this->receiptNumber' AND supplier='$this->owner'";
        mysqli_query($this->connect, $sql);
    }

}

function getUniqueId(){
    $stringSet = '0000000111111122222223333333444444455555556666666777777788888889999999';
    $stringSet = str_shuffle($stringSet);
    $stringSet = substr($stringSet, 0, 7);

    return $stringSet;
}
#Manipulating data from the interface
if(isset($_POST['receiptName']) && isset($_POST['receiptDate']) && isset($_POST['receiptNumber']) && isset($_POST['receiptAmount'])){
    $receiptName = $_POST['receiptName'];
    $receiptNumber = $_POST['receiptNumber'];
    $receiptDate = $_POST['receiptDate'];
    $receiptAmount = $_POST['receiptAmount'];

    $ownerCheckSql = "SELECT supplier_id FROM suppliers WHERE supplier_name = '$receiptName'";

    if($ownerCheckSqlRun = mysqli_query($db_conn, $ownerCheckSql)){
        if(mysqli_num_rows($ownerCheckSqlRun) != 0){
            $rs = mysqli_fetch_assoc($ownerCheckSqlRun);
            $owner = $rs['supplier_id'];
        }else{
            $ownerId = getUniqueId();
            $saveSupplierSql = "INSERT INTO suppliers(supplier_id, supplier_name, supplier_address, email, telephone, contact_person, contact_person_phone) VALUES ('$ownerId','$receiptName','none','none','none','none','none')";

            mysqli_query($db_conn, $saveSupplierSql);


            $owner = $ownerId;

        }
        $purchaseReceipt = new PurchaseReceipt($receiptNumber,$owner,(float)$receiptAmount);
        $purchaseReceipt->createReceipt();
    }
}

?>