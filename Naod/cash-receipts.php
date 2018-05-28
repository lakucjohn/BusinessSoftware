<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>
<div id="cash-receipts-content">
<div class="row">
    <button class="btn btn-primary" onclick="replace_div_content('cash-receipts-content','items-per-sale-receipt.php');">Create New Cash Sale Receipt</button>
</div>
<p>
<div class="row">
    <?php include 'cash_sale_receipts_list.php'; ?>

</div>
</p>
</div>