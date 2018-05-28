<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>
<div id="purchases-invoice-content">

    <div class="row">
        <button class="btn btn-primary" onclick="replace_div_content('purchases-invoice-content','items-per-purchases-invoice.php');">Record New Purchases Invoice</button>
    </div>
    <p>
    <div class="row">
        <?php include 'purchase_invoice_list.php'; ?>

    </div>
    </p>
</div>
