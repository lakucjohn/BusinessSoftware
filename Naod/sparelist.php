<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/12/18
 * Time: 2:52 PM
 */
require '../core_resources/connect.inc.php';
?>
<table class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Product Id</th>
        <th>Category</th>
        <th>Description</th>
        <th>Model</th>
        <th>Timestamp</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $spare_sql = "SELECT spare.*,category.* FROM spare_parts spare,categories category WHERE spare.status=1 AND category.category_id=spare.category";
    if($spare_sql_run = mysqli_query($db_conn,$spare_sql)){
        $counter = 0;
        while($rs = mysqli_fetch_assoc($spare_sql_run)){
            ?>
            <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $rs['spare_part']; ?></td>
                <td><?php echo $rs['part_id']; ?></td>
                <td><?php

                    $rs['category_name'];

                ?></td>
                <td><?php echo $rs['description']; ?></td>
                <td><?php echo $rs['model']; ?></td>
                <td><?php echo $rs['timestamp']; ?></td>
                <td>
                    <button class="btn btn-primary" onclick="setSparePartDetails('<?php echo $rs['part_id']; ?>','<?php echo $rs['spare_part']; ?>','<?php echo $rs['category_name']; ?>','<?php echo $rs['description']; ?>','<?php echo $rs['model']; ?>');" data-toggle="modal" data-target="#editSparePart"><i class="fa fa-edit"> Edit</i> </button>
                    <button class="btn btn-danger" onclick="setSpareToDelete('<?php echo $rs['part_id']; ?>');" data-toggle="modal" data-target="#deleteSparePart"><i class="fa fa-remove"> Delete</i> </button>
                </td>
            </tr>
            <?php
        }
    }else{

        ?>
    <tr>
        <td colspan="8"><?php echo mysqli_error($db_conn);?></td>
    </tr>
    <?php


    }

    ?>


    </tbody>
</table>
