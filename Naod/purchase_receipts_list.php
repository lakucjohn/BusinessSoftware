<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/15/18
 * Time: 11:26 AM
 */
require '../core_resources/connect.inc.php';
$document_list_sql = "SELECT * FROM cash_purchases WHERE status=1";
$counter = 0;

?>

<table class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Receipt No</th>
        <th>Supplier</th>
        <th>Amount</th>
        <th>Timestamp</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if($sql_run = mysqli_query($db_conn, $document_list_sql)){
        if(mysqli_num_rows($sql_run) !=0){
            $counter = 0;
            while($rs = mysqli_fetch_assoc($sql_run)) {
                ?>
                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $rs['receipt_number']; ?></td>
                    <td><?php
                        $personSql = "SELECT supplier_name FROM suppliers WHERE supplier_id=".$rs['supplier'];
                        if($personSqlRun = mysqli_query($db_conn,$personSql)){
                            $name = mysqli_fetch_assoc($personSqlRun);
                            echo $name['supplier_name'];
                        }
                        ?></td>
                    <td><?php echo $rs['amount']; ?></td>
                    <td><?php echo $rs['timestamp']; ?></td>
                    <td>
                        <button class="btn btn-info"
                                onclick="loadDocumentData('<?php echo $rs['supplier']; ?>','<?php echo $rs['receipt_number']; ?>');">
                            <i class="fa fa-info-circle"> More</i></button>
                        <button class="btn btn-primary" onclick="setPurchaseReceiptDetails('100100', 'Harbours', '10000')"><i
                                    class="fa fa-edit"> Edit</i></button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSupplierReceipt"
                                onclick="setPurchaseReceiptId('10010010')"><i class="fa fa-remove"> Delete</i></button>
                    </td>
                </tr>
                <?php
            }
        }else{

        }
    }
    ?>


    </tbody>
</table>

<script>
    function loadDocumentData(supplierId, documentId){
        $.ajax({
            url:"items-per-saved-purchase-receipt.php",
            type:'post',
            data:{'supplier':supplierId,'document':documentId},
            success:function(data){
                $('#purchase-receipt-content').load('items-per-saved-purchase-receipt.php',{'supplier':supplierId,'document':documentId});
            }
        })
    }

    function setPurchaseReceiptDetails(){

    }
</script>