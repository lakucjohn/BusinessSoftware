<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 6:38 PM
 */
require '/opt/lampp/htdocs/Naod-Moses-Co/Transaction/ReceiptContent.php';
require '/opt/lampp/htdocs/Naod-Moses-Co/Inventory/SpareParts/Spares/SparePartManager.php';

class PurchaseReceiptContent extends ReceiptContent{

    public $owner;

    public function __construct($receiptNumber, $sparePartId, $quantity, $description, $price, $amount, $owner)
    {
        parent::__construct($receiptNumber, $sparePartId, $quantity, $description, $price, $amount);
        $this->owner = $owner;
    }

    public function addReceiptContent(){
        $sql = "INSERT INTO purchases_receipt_content(receipt_number, spare_part, quantity, description, supplier, price, amount) VALUES ('$this->receiptNumber','$this->sparePartId',$this->quantity,'$this->description','$this->owner',$this->price, $this->amount)";
        mysqli_query($this->connect,$sql);
    }
    public function editReceiptContent(){
        $sql = "UPDATE purchases_receipt_content SET quantity=$this->quantity,description='$this->description',supplier='$this->owner',price=$this->price, amount = $this->amount WHERE  spare_part='$this->sparePartId' AND receipt_number='$this->receiptNumber' AND supplier='$this->owner'";
        mysqli_query($this->connect,$sql);
    }
    public function deleteReceiptContent(){
        $sql = "UPDATE purchases_receipt_content SET status=0 WHERE spare_part='$this->sparePartId' AND receipt_number='$this->receiptNumber' AND supplier='$this->owner'";
        mysqli_query($this->connect,$sql);
    }
}


function getUniqueId(){
    $stringSet = '0000000111111122222223333333444444455555556666666777777788888889999999';
    $stringSet = str_shuffle($stringSet);
    $stringSet = substr($stringSet, 0, 7);

    return $stringSet;
}

if(isset($_POST['new_document_data'])) {
    $receivedJSON = $_POST['new_document_data'];

    #Conquering the incoming JSON to form arrays
    $owner = $receivedJSON[0]['document_details']['receiptName'];

    $ownerCheckSql = "SELECT supplier_id FROM suppliers WHERE supplier_name = '$owner'";

    if($ownerCheckSqlRun = mysqli_query($db_conn, $ownerCheckSql)){
        if(mysqli_num_rows($ownerCheckSqlRun) != 0){
            $rs = mysqli_fetch_assoc($ownerCheckSqlRun);
            $owner = $rs['supplier_id'];
        }else{
            $supplierId = getUniqueId();
            $saveSupplierSql = "INSERT INTO suppliers(supplier_id, supplier_name, supplier_address, email, telephone, contact_person, contact_person_phone) VALUES ('$supplierId','$owner','none','none','none','none','none')";

            mysqli_query($db_conn, $saveSupplierSql);


            $owner = $supplierId;

        }
    }

    $documentId = $receivedJSON[0]['document_details']['receiptNumber'];
    //print_r($receivedJSON);

    foreach($receivedJSON as $jsonObject => $documentObject){
        if($jsonObject == 1){
            foreach($documentObject as $documentItem => $itemList){
                if($documentItem == 'document_content'){
                    foreach($itemList as $data){
                        if(array_key_exists('itemName',$data) &&
                            array_key_exists('itemDescription',$data) &&
                            array_key_exists('itemQuantity',$data) &&
                            array_key_exists('itemPrice',$data) &&
                            array_key_exists('itemAmount',$data)){
                            $itemName = $data['itemName'];
                            $itemDescription = $data['itemDescription'];
                            $itemQuantity = $data['itemQuantity'];
                            $itemPrice = $data['itemPrice'];
                            $itemAmount = $data['itemAmount'];

                            #Verfying the existence of spare part
                            $productCheckSql = "SELECT part_id FROM spare_parts WHERE spare_part = '$itemName'";
                            if($productCheckSqlRun = mysqli_query($db_conn, $productCheckSql)){

                                #If spare part exists
                                if(mysqli_num_rows($productCheckSqlRun) !=0 ){
                                    $prs = mysqli_fetch_assoc($productCheckSqlRun);
                                    $itemId = $prs['part_id'];
                                }else{

                                    #if it does not exist

                                    $itemId = getUniqueId();
                                    $sparePartManager = new SparePartManager();
                                    $sparePartManager->addSparePart($itemId,$itemName,'none','none','none','none',0);

                                }

                                #Now saving the final details
                                $purchaseReceipt = new PurchaseReceiptContent($documentId,$itemId,$itemQuantity,$itemDescription,$itemPrice,$itemAmount,$owner);

                                $purchaseReceipt ->addReceiptContent();
                            }




                        }
                    }
                }
            }
        }
    }


}
?>