<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/25/18
 * Time: 2:15 PM
 */
require '../core_resources/connect.inc.php';
$document_list_sql = "SELECT * FROM cash_sales WHERE status=1";
$counter = 0;

?>
<table class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Receipt No</th>
        <th>Customer</th>
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
                                $personSql = "SELECT customer_name FROM customers WHERE customer_number=".$rs['customer'];
                                if($personSqlRun = mysqli_query($db_conn,$personSql)){
                                    $name = mysqli_fetch_assoc($personSqlRun);
                                    echo $name['customer_name'];
                                }
                                ?></td>
                            <td><?php echo $rs['amount']; ?></td>
                            <td><?php echo $rs['timestamp']; ?></td>
                            <td>
                                <button class="btn btn-info"
                                        onclick="loadDocumentData('<?php echo $rs['receipt_number']; ?>');">
                                    <i class="fa fa-info-circle"> More</i></button>
<!--                                <button class="btn btn-primary"><i class="fa fa-edit"> Edit</i></button>-->
                                <button class="btn btn-danger"><i class="fa fa-remove"> Delete</i></button>
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
    function loadDocumentData(documentId){
        $.ajax({
            url:"items-per-saved-sale-receipt.php",
            type:'post',
            data:{'document':documentId},
            success:function(data){
                $('#cash-receipts-content').load('items-per-saved-sale-receipt.php',{'document':documentId});
            }
        })
    }
</script>