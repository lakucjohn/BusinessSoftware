<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>
<div id="sales-invoices-content">
    <div class="row">
    <button class="btn btn-primary" onclick="replace_div_content('sales-invoices-content','items-per-sales-invoice.php');">Create New Sales Invoice</button>
    </div>
    <p>
    <div class="row">
        <?php include 'sales-invoice-list.php'; ?>

    </div>
    </p>

</div>