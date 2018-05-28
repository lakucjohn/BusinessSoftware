<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */

?>
<div id="purchase-receipt-content">
    <div class="row">
        <button class="btn btn-primary" onclick="createPurchaseReceipt()">Record New Cash Purchase Receipt</button>
    </div>
    <p>
    <div class="row">
        <div id="purchase-receipts-list">
            <?php include 'purchase_receipts_list.php'; ?>
        </div>

    </div>
    </p>
</div>

<script>
    function createPurchaseReceipt(){

        replace_div_content('purchase-receipt-content','items-per-purchase-receipt.php');
    }

    function setPurchaseReceiptDetails(receipt_number, supplier, Amount){
        receiptRecNoEdited.setAttribute('value',receipt_number);
        supplierRecNameEdited.setAttribute('value',supplier);
        receiptRecAmountEdited.setAttribute('value',Amount);
    }

    function editPurchaseReceipt(){
        var editedreceiptrecno = document.getElementById('receiptRecNoEdited').value;
        var editedsupplierrecno = document.getElementById('supplierRecNameEdited').value;
        var editedsupplierreceiptrecamount = document.getElementById('receiptRecAmountEdited').value;

    }

    function setPurchaseReceiptId(purchase_receipt_id){
        purchaseReceiptToDelete.setAttribute('value',purchase_receipt_id);
    }

    function deletePurchaseReceipt(){
        var deletedreceiptno = document.getElementById('purchaseReceiptToDelete');
    }
</script>