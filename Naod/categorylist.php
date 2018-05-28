<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/12/18
 * Time: 5:11 PM
 */
require '../core_resources/connect.inc.php';
?>
<table class="table table-responsive table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Description</th>
        <th>Timestamp</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter = 0;
        $category_sql = "SELECT * FROM categories WHERE status=1";
        if($category_sql_run = mysqli_query($db_conn,$category_sql)){
            while($rs = mysqli_fetch_assoc($category_sql_run)){

                ?>
                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $rs['category_name']; ?></td>
                    <td><?php echo $rs['description']; ?></td>
                    <td><?php echo $rs['timestamp']; ?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editCategory" onclick="setCategoryDetails('<?php echo $rs['category_id']; ?>','<?php echo $rs['category_name']; ?>','<?php echo $rs['description']; ?>');"><i class="fa fa-edit"> Edit</i> </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCategory" onclick="setDeleteId('<?php echo $rs['category_id']; ?>');"><i class="fa fa-remove"> Delete</i> </button>
                    </td>
                </tr>
    <?php
            }
        }
    ?>


    </tbody>
</table>