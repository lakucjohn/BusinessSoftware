<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/14/18
 * Time: 2:38 PM
 */
require '../core_resources/connect.inc.php';
$supplier_list_sql = "SELECT * FROM suppliers WHERE status=1";
$counter = 0;
?>


<table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email Address</th>
                <th>Company Telephone</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if($supplier_list_sql_run = mysqli_query($db_conn, $supplier_list_sql)){
            while($rs = mysqli_fetch_assoc($supplier_list_sql_run)){

                ?>
                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $rs['supplier_name']; ?></td>
                    <td><?php echo $rs['supplier_address']; ?></td>
                    <td><?php echo $rs['email']; ?></td>
                    <td><?php echo $rs['telephone']; ?></td>
                    <td><?php echo $rs['contact_person']; ?></td>
                    <td><?php echo $rs['contact_person_phone']; ?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editSupplier" onclick="setSupplierDetails('<?php echo $rs['supplier_id']; ?>','<?php echo $rs['supplier_name']; ?>','<?php echo $rs['supplier_address']; ?>','<?php echo $rs['email']; ?>','<?php echo $rs['telephone']; ?>','<?php echo $rs['contact_person']; ?>','<?php echo $rs['contact_person_phone']; ?>');"><i class="fa fa-edit"> Edit</i> </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSupplier" onclick="setSupplierId('<?php echo $rs['supplier_id']; ?>');"><i class="fa fa-remove"> Delete</i> </button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>


