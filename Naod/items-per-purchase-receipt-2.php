<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
require '../core_resources/connect.inc.php';
$product_list_sql = "SELECT * FROM spare_parts WHERE status=1";
$product_list = array();
if($product_list_sql_run = mysqli_query($db_conn,$product_list_sql)){
    #Packing the medicine as json
    while($row = mysqli_fetch_object($product_list_sql_run)){
        $product_list['products'][] = $row;
    }
    $fps = fopen('products.json', 'w');
    fwrite($fps, json_encode($product_list));
    fclose($fps);
}

$category_list_sql = "SELECT * FROM categories";

?>


<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addPurchaseReceiptContent">Record New Purchase In This Receipt</button>
</div>
<p>
<div class="row">
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Model</th>
                <th>Quantity</th>
                <th>Measure</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#</td>
                <td>Tyre</td>
                <td>B230</td>
                <td>120</td>
                <td>Pieces</td>
                <td>240,000</td>
                <td>12309000</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editPurchaseReceiptContent"><i class="fa fa-edit"> Edit</i> </button>
                    <button class="btn btn-danger"><i class="fa fa-remove" data-toggle="modal" data-target="#deletePurchaseReceiptContent"> Delete</i> </button>
                </td>

            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="4" align="center"><h3>Total</h3> </td>
                <td colspan="2" align="right"><h4>120,0000</h4></td>
            </tr>


        </tbody>
    </table>
    <button type="button" class="btn btn-warning" onclick="replace_div_content('purchase-receipt-content','purchase-receipts.php');"><-- Return to Purchases Receipts List</button> </td>
    <button type="button" class="btn btn-danger space-doc-btn">Print This Receipt</button>
</div>
</p>


<div class="modal fade" id="addPurchaseReceiptContent" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>Add Item To Receipt</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="categoryName">Category: </label>
                            <select id="categoryName" class="form-control" onchange="setProductList(this.value);">
                                <option value="">Select Category</option>
                            <?php
                            if($category_list_sql_run = mysqli_query($db_conn,$category_list_sql)){
                                while($rs = mysqli_fetch_assoc($category_list_sql_run)) {

                                    ?>
                                    <option value="<?php echo $rs['category_id']; ?>"><?php echo $rs['category_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>



                            </select>

                            <label for="productName" onchange="loadProductSettings(this.value);">Product: </label>
                            <select id="productName" class="form-control">
                                <option value="">Select Product</option>
                            </select>

                            <label for="productQuantity">Quantity: </label>
                            <input type="text" id="productQuantity" class="form-control" value="1" />

                            <label for="productMeasure" onchange="setAmount(this.name,this.value);">Units of Measurement: </label>
                            <select id="productMeasure" class="form-control" disabled>
                                <option value="" name="">Select Measurement Unit</option>
                                <option value="pieces" name="" selected="selected">Pieces</option>
                            </select>

                            <label for="productDiscount">Discount: </label>
                            <input type="number" value="0" id="productDiscount" class="form-control" /><span>%</span>

                            <label for="amountPaid">Amount</label>
                            <input type="number" value="0" id="amountPaid" class="form-control" disabled />

                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-primary" onclick="addPurchaseReceiptContent();">Add Item</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->


<div class="modal fade" id="editPurchaseReceiptContent" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Receipt Content</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="categoryName" onchange="setProductList(this.value);">Category: </label>
                            <select id="categoryName" class="form-control">
                                <option value="">Select Category</option>
                            </select>

                            <label for="productName" onchange="loadProductSettings(this.value);">Product: </label>
                            <select id="productName" class="form-control">
                                <option value="">Select Product</option>
                            </select>

                            <label for="productQuantity">Quantity: </label>
                            <input type="text" id="productQuantity" class="form-control" value="" />

                            <label for="productMeasure" onchange="setAmount(this.name,this.value);">Product: </label>
                            <select id="productMeasure" class="form-control">
                                <option value="" name="">Select Measurement Unit</option>
                            </select>

                            <label for="productDiscount">Discount: </label>
                            <input type="number" value="0" id="productDiscount" class="form-control" /><span>%</span>

                            <label for="amountPaid">Amount</label>
                            <input type="number" value="0" id="amountPaid" class="form-control" disabled />

                        </div>
                    </div>
                    <input type="hidden" id="editedPurchaseReceiptContent" />
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-primary" onclick="editPurchaseReceiptContent();">Save Changes</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->


<div class="modal fade" id="deletePurchaseReceiptContent" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Delete Receipt Content</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <h3 class="confirm-txt">Are you sure you want to delete this item from the receipt ? </h3>

                        </div>
                    </div>
                    <input type="hidden" id="purchaseReceiptContentToDelete" />
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-danger" onclick="deletePurchaseReceiptContent();">Delete</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<script>
    function setProductList(category_id){
        $.ajax({
            url: "products.json",
            type: "POST",
            dataType: "json",
            async: false,
            success: function (data) {
                var new_options_list='<option value="">Select Product</option>';
                for(var key in data) {
                    if(typeof data[key] === "object") {

                        for(var i = 0; i < data[key].length; i++) {


                            for(var property in data[key][i]) {

                                if(category_id==='') {
                                    //document.getElementById('service_cost').value = 0;
                                }else{
                                    //alert(property + " = " + data[key][i][property])
                                    if (data[key][i][property] === category_id) {

                                        //alert(property + " = " + data[key][i][property]);

                                        var product_id = data[key][i]['part_id'];
                                        var product_name = data[key][i]['spare_part'];
                                        //alert(product_id);
                                        new_options_list+='<option value="'+product_id+'">'+product_name+'</option>'
                                        //$('#productName').append('<option value="'+product_id+'">'+product_name+'</option>');

                                        //alert(medicine_category);
                                        //alert(categoryId);
                                        //document.getElementById('service_cost').value = servicecost;

                                    }
                                    //alert(property + " = " + data[key][i][property]);
                                }
                            }
                        }

                        //Now changing the options
                        $('#productName').html(new_options_list)

                    } else if(typeof data[key] === "string") {

                        //alert(key + " = " + data[key]);
                        if(data[key] ===category_id){
                            //alert(key + " = " + data[key]);
                        }
                    }
                }


            }
        });
    }

    function loadProductSettings(product_id){
        $.ajax({
            url: "products.json",
            type: "POST",
            dataType: "json",
            async: false,
            success: function (data) {
                var product_cost=0;
                for(var key in data) {
                    if(typeof data[key] === "object") {

                        for(var i = 0; i < data[key].length; i++) {


                            for(var property in data[key][i]) {

                                if(category_id==='') {
                                    //document.getElementById('service_cost').value = 0;
                                }else{
                                    //alert(property + " = " + data[key][i][property])
                                    if (data[key][i][property] === product_id) {

                                        //alert(property + " = " + data[key][i][property]);

                                        product_cost = data[key][i]['part_id'];
                                        var product_name = data[key][i]['spare_part'];
                                        //alert(product_id);
                                        new_options_list+='<option value="'+product_id+'">'+product_name+'</option>'
                                        //$('#productName').append('<option value="'+product_id+'">'+product_name+'</option>');

                                        //alert(medicine_category);
                                        //alert(categoryId);
                                        //document.getElementById('service_cost').value = servicecost;

                                    }
                                    //alert(property + " = " + data[key][i][property]);
                                }
                            }
                        }

                        //Now changing the options
                        $('#productName').html(new_options_list)

                    } else if(typeof data[key] === "string") {

                        //alert(key + " = " + data[key]);
                        if(data[key] ===category_id){
                            //alert(key + " = " + data[key]);
                        }
                    }
                }


            }
        });
    }

    function setAmount(product_id,measure){

    }
</script>