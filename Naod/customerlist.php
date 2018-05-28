<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/15/18
 * Time: 9:33 AM
 */

require '../core_resources/connect.inc.php';
$customer_list_sql = "SELECT * FROM customers WHERE status=1";
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
    if($customer_list_sql_run = mysqli_query($db_conn, $customer_list_sql)){
        while($rs = mysqli_fetch_assoc($customer_list_sql_run)){

            ?>
            <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $rs['customer_name']; ?></td>
                <td><?php echo $rs['customer_address']; ?></td>
                <td><?php echo $rs['customer_email']; ?></td>
                <td><?php echo $rs['customer_phone']; ?></td>
                <td><?php echo $rs['contact_person']; ?></td>
                <td><?php echo $rs['contact_person_phone']; ?></td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editCustomer" onclick="setCustomerDetails('<?php echo $rs['customer_number']; ?>','<?php echo $rs['customer_name']; ?>','<?php echo $rs['customer_address']; ?>','<?php echo $rs['customer_email']; ?>','<?php echo $rs['customer_phone']; ?>','<?php echo $rs['contact_person']; ?>','<?php echo $rs['contact_person_phone']; ?>');"><i class="fa fa-edit"> Edit</i> </button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCustomer" onclick="setCustomerId('<?php echo $rs['customer_number']; ?>');"><i class="fa fa-remove"> Delete</i> </button>
                </td>
            </tr>
            <?php
        }
    }
    ?>

    </tbody>
</table>


