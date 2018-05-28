<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/28/18
 * Time: 10:20 AM
 */

require '/opt/lampp/htdocs/Naod-Moses-Co/core_resources/connect.inc.php';

if(isset($_POST['document'])) {
    $documentId = $_POST['document'];

    $getDocumentContentSql = "SELECT * FROM credit_sales_invoice_content WHERE invoice_number='$documentId'";
    if ($getDocumentContentSqlRun = mysqli_query($db_conn, $getDocumentContentSql)) {
        if (mysqli_num_rows($getDocumentContentSqlRun) == 0) {

            ?>

            <?php
        } else {

            ?>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                <?php
                $counter = 0;
                while ($rs = mysqli_fetch_assoc($getDocumentContentSqlRun)) {

                    ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>
                        <td><?php
                            $getSpareNameSql = "SELECT spare_part FROM spare_parts WHERE part_id = ".$rs['spare_part'];
                            if($getSpareNameSqlRun = mysqli_query($db_conn, $getSpareNameSql)){
                                $spareName = mysqli_fetch_assoc($getSpareNameSqlRun);
                                echo $spareName['spare_part'];
                            }else{
                                echo mysqli_error($db_conn);
                            }
                            ?></td>
                        <td><?php echo $rs['description']; ?></td>
                        <td><?php echo $rs['quantity']; ?></td>
                        <td><?php echo $rs['price']; ?></td>
                        <td><?php echo $rs['amount']; ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
            <?php

        }
    }
}
?>
