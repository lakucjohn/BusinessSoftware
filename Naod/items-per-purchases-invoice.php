<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
require '../core_resources/connect.inc.php';
?>
<style>
    .push-button{
        margin-left: 5%;
        margin-top: 2%;
    }
</style>
<div id="purchases-invoice-content">



    <div class="row push-button">
        <button type="button" class="btn btn-primary" onclick="replace_div_content('purchases-invoice-content','purchase-invoices.php');"><-- Back to Purchases Invoice List</button>
    </div>
    <div class="document-content">

        <div class="row" style="margin-top: 2%;">
            <div class="row" style="margin-left: 2rem;">
                <div class="col-md-2">
                    <label for="InvoiceName">Name of Supplier: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" id="InvoiceName" name="InvoiceName" list="suppliers" class="form-control" placeholder="Enter Supplier Name"/>
                    <datalist id="suppliers">
                        <?php
                        $SuppliersListSql = 'SELECT * FROM suppliers';
                        if($SuppliersListRun = mysqli_query($db_conn,$SuppliersListSql)){
                            while($rs = mysqli_fetch_assoc($SuppliersListRun)){
                                ?>
                                <option value="<?php echo $rs['supplier_name']; ?>"><?php echo $rs['supplier_name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </datalist>
                </div>
            </div>

            <div class="row" style="margin-left: 2rem;">
            <div class="card header-card">
                <div class="card-body">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <label for="InvoiceDate">Date: </label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" id="InvoiceDate" class="form-control" />
                            </div>

                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="InvoiceNumber">Invoice Number: </label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" id="InvoiceNumber" class="form-control" />
                            </div>

                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="LPONo">LPO No: </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="LPONo" class="form-control" />
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>

        <hr>
        <div class="row">
            <div class="card content-card">
                <div class="card-body">
                    <table class="table table-responsive table-bordered" id="purchaseInvoiceContent">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr style="display: none;">
<!--                            <td>1</td>-->
<!--                            <td>Tyre</td>-->
<!--                            <td>B230</td>-->
<!--                            <td>120</td>-->
<!--                            <td>240,000</td>-->
<!--                            <td>12309000</td>-->
<!--                            <td>-->
<!--                                <button class="btn btn-info" data-toggle="modal" data-target="#editPurchaseReceiptContent"><i class="fa fa-edit"> Edit</i> </button>-->
<!--                                <button class="btn btn-danger"><i class="fa fa-remove" data-toggle="modal" data-target="#deletePurchaseReceiptContent"> Delete</i> </button>-->
<!--                            </td>-->
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="text" id="itemName" style="width: 100px;" class="form-control" placeholder="Item Name" /> </td>
                            <td><input type="text" id="itemDescription" style="width: 160px;" class="form-control" placeholder="Example: model, size" /></td>
                            <td><input type="text" id="itemQuantity" style="width: 60px;" class="form-control" placeholder="Quantity" /></td>
                            <td><input type="number" id="itemPrice" style="width: 100px;" class="form-control" placeholder="Price" /></td>
                            <td><input type="number" id="itemAmount" style="width: 100px;" class="form-control" placeholder="Amount" onblur="addValueToTotal();" /></td>
                            <td><button type="button" class="btn btn-primary" onclick="addNewPurchaseInvoice();">Insert Record</button></td>

                        </tr>
                        <tr>
                            <td colspan="7">&nbsp;</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4" align="center"><h3>Total</h3> </td>
                            <td colspan="2" align="right"><h4><div id="Amount">0</div></h4></td>
                        </tr>


                        </tbody>
                    </table>

                    <button type="button" onclick="printDocument('printable-purchase-invoice');" class="btn btn-danger space-doc-btn">Print This Invoice</button>

                </div>
            </div>
        </div>
    </div>

</div>

<div id="printable-purchase-invoice" style="display: none">
    <div class="row">
        <div class="card header-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Supplier: </label>
                    </div>

                    <div class="col-md-9">
                        <div id="PrintableInvoiceName"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date: </label>
                    </div>
                    <div class="col-md-6">
                        <div id="PrintableInvoiceDate"></div>
                    </div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <label>Invoice Number: </label>
                    </div>
                    <div class="col-md-6">
                        <div id="PrintableInvoiceNo"></div>
                    </div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <label>LPO No: </label>
                    </div>
                    <div class="col-md-6">
                        <div id="PrintableLPONo"></div>
                    </div>

                </div>
        </div>
    </div>
    <div class="row">
        <div class="card content-card">
            <div class="card-body">
                <table class="table table-responsive table-bordered" id="purchaseInvoiceContentPrintable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr style="display: none;">
                        <!--                            <td>1</td>-->
                        <!--                            <td>Tyre</td>-->
                        <!--                            <td>B230</td>-->
                        <!--                            <td>120</td>-->
                        <!--                            <td>240,000</td>-->
                        <!--                            <td>12309000</td>-->
                        <!--                            <td>-->
                        <!--                                <button class="btn btn-info" data-toggle="modal" data-target="#editPurchaseReceiptContent"><i class="fa fa-edit"> Edit</i> </button>-->
                        <!--                                <button class="btn btn-danger"><i class="fa fa-remove" data-toggle="modal" data-target="#deletePurchaseReceiptContent"> Delete</i> </button>-->
                        <!--                            </td>-->
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="4" align="center"><h3>Total</h3> </td>
                        <td colspan="2" align="right"><h4><div id="PrintableAmount"></div></h4></td>
                    </tr>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<script>
    function addNewPurchaseInvoice(){
        var tablerowcount = $('#purchaseInvoiceContent tr').length;
        var c = tablerowcount-5;
         var cc = c+1;


        var itemName=document.getElementById("itemName").value;
        var itemDescription=document.getElementById("itemDescription").value;
        var itemQuantity=document.getElementById("itemQuantity").value;
        var itemPrice=document.getElementById("itemPrice").value;
        var itemAmount=document.getElementById("itemAmount").value;

        if(itemName !== '' && itemDescription !=='' && itemQuantity !=='' &&  itemPrice !=='' &&  itemAmount !=='') {

            var row_html = '<tr id="' + c + '"><td>' + cc + '</td><td id="itemName' + c + '">' + itemName + '</td><td id="itemDescription' + c + '">' + itemDescription + '</td><td id="itemQuantity' + c + '">' + itemQuantity + '</td><td id="itemPrice' + c + '">' + itemPrice + '</td><td id="itemAmount' + c + '">' + itemAmount + '</td><td id="option-col' + c + '"><button class="btn btn-info" type="button" id="editRow' + c + '" onclick="editContent(' + c + ');"><i class="fa fa-edit"> Edit</i> </button><button class="btn btn-success" style="display: none;" type="button" id="saveRow' + c + '" onclick="saveEditedContent(' + c + ');"><i class="fa fa-save"> Save</i> </button><button class="btn btn-danger" type="button"><i class="fa fa-remove" data-toggle="modal" data-target="#deletePurchaseReceiptContent" onclick="deleteRow(' + c + ');" style="display: inline-block"> Delete</i> </button></td></tr>';

            var row_html_printable = '<tr id="print' + c + '"><td>' + cc + '</td><td id="itemNamePrint' + c + '">' + itemName + '</td><td id="itemDescriptionPrint' + c + '">' + itemDescription + '</td><td id="itemQuantityPrint' + c + '">' + itemQuantity + '</td><td id="itemPricePrint' + c + '">' + itemPrice + '</td><td id="itemAmountPrint' + c + '">' + itemAmount + '</td>';

            $('#purchaseInvoiceContent > tbody:last tr:eq(' + c + ')').after(row_html);
            $('#purchaseInvoiceContentPrintable > tbody:last tr:eq(' + c + ')').after(row_html_printable);
            c = c + 1;

            document.getElementById("itemName").value = '';
            document.getElementById("itemDescription").value = '';
            document.getElementById("itemQuantity").value = '';
            document.getElementById("itemPrice").value = '';
            document.getElementById("itemAmount").value = '';
        }else{
            alert('Please Fill All Fields');
        }
    }

    function editContent(row_id){
        var itemName=document.getElementById("itemName"+row_id);
        var itemDescription=document.getElementById("itemDescription"+row_id);
        var itemQuantity=document.getElementById("itemQuantity"+row_id);
        var itemPrice=document.getElementById("itemPrice"+row_id);
        var itemAmount=document.getElementById("itemAmount"+row_id);

        var itemName_data=itemName.innerHTML;
        var itemDescription_data=itemDescription.innerHTML;
        var itemQuantity_data=itemQuantity.innerHTML;
        var itemPrice_data=itemPrice.innerHTML;
        var itemAmount_data=itemAmount.innerHTML;

        itemName.innerHTML="<input class='form-control' style='width: 100px;' type='text' id='itemNameEdited"+row_id+"' value='"+itemName_data+"'>";
        itemDescription.innerHTML="<input class='form-control' style='width: 160px;' type='text' id='itemDescriptionEdited"+row_id+"' value='"+itemDescription_data+"'>";
        itemQuantity.innerHTML="<input class='form-control' style='width: 60px;' type='text' id='itemQuantityEdited"+row_id+"' value='"+itemQuantity_data+"'>";
        itemPrice.innerHTML="<input class='form-control' style='width: 100px;' type='text' id='itemPriceEdited"+row_id+"' value='"+itemPrice_data+"'>";
        itemAmount.innerHTML="<input class='form-control' style='width: 100px;' type='text' id='itemAmountEdited"+row_id+"' value='"+itemAmount_data+"'>";

        //Subtract the value of the edited row from the total

        var previous_amount = parseInt(document.getElementById('Amount').innerHTML);
        var to_edit_amount = parseInt(itemAmount_data);

        //Now changing the value of the Amount field
        document.getElementById('Amount').innerHTML = previous_amount - to_edit_amount;

        //Toggling the buttons
        document.getElementById('editRow'+row_id).style.display='none';
        document.getElementById('saveRow'+row_id).style.display='inline-block';

    }

    function saveEditedContent(row_id){
        var editedItemName = document.getElementById('itemNameEdited'+row_id).value;
        var editedItemDescription = document.getElementById('itemDescriptionEdited'+row_id).value;
        var editedItemQuantity = document.getElementById('itemQuantityEdited'+row_id).value;
        var editedItemPrice = document.getElementById('itemPriceEdited'+row_id).value;
        var editedItemAmount = document.getElementById('itemAmountEdited'+row_id).value;

        if(editedItemName !== '' && editedItemDescription !=='' && editedItemQuantity !=='' &&  editedItemPrice !=='' &&  editedItemAmount !=='') {

            document.getElementById('itemName' + row_id).innerHTML = editedItemName;
            document.getElementById('itemDescription' + row_id).innerHTML = editedItemDescription;
            document.getElementById('itemQuantity' + row_id).innerHTML = editedItemQuantity;
            document.getElementById('itemPrice' + row_id).innerHTML = editedItemPrice;
            document.getElementById('itemAmount' + row_id).innerHTML = editedItemAmount;
            document.getElementById('editRow' + row_id).style.display = 'inline-block';
            document.getElementById('saveRow' + row_id).style.display = 'none';

            document.getElementById('itemNamePrint' + row_id).innerHTML = editedItemName;
            document.getElementById('itemDescriptionPrint' + row_id).innerHTML = editedItemDescription;
            document.getElementById('itemQuantityPrint' + row_id).innerHTML = editedItemQuantity;
            document.getElementById('itemPricePrint' + row_id).innerHTML = editedItemPrice;
            document.getElementById('itemAmountPrint' + row_id).innerHTML = editedItemAmount;

            //Saving the new amount
            var previous_amount = parseInt(document.getElementById('Amount').innerHTML);
            document.getElementById('Amount').innerHTML = previous_amount + parseInt(editedItemAmount);

        }else{
            alert('Please Fill All Fields');
        }

    }

    function deleteRow(rowid)
    {
        var row = document.getElementById(rowid);
        row.parentNode.removeChild(row);
    }

    function displayInputError(field_name){
        alert('Please enter the '+field_name);
    }
    
    function printDocument(divName){

        //Collecting important values
        var invoice_name = document.getElementById('InvoiceName').value;
        var invoice_date = document.getElementById('InvoiceDate').value;
        var invoice_number = document.getElementById('InvoiceNumber').value;
        var invoice_lpo = document.getElementById('LPONo').value;
        var invoice_amount = document.getElementById('Amount').innerHTML;

        //Validating the input
        if(invoice_name === ''){
            displayInputError('Suppier\'s Name');
        }else{
            if(invoice_date === ''){
                displayInputError('Invoice Date');
            }else{
                if(invoice_number === ''){
                    displayInputError('Invoice Number');
                }else{


                    //Preparing Custom Information for printing
                    document.getElementById('PrintableInvoiceName').innerHTML = invoice_name;
                    document.getElementById('PrintableInvoiceDate').innerHTML = invoice_date;
                    document.getElementById('PrintableInvoiceNo').innerHTML = invoice_number;
                    document.getElementById('PrintableLPONo').innerHTML = invoice_lpo;
                    document.getElementById('PrintableAmount').innerHTML = invoice_amount;

                    //Printing the content
                    document.getElementById(divName).style.display='block';
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                    document.getElementById(divName).style.display='none';

                    var blank_document = {'invoiceName':invoice_name,'invoiceDate':invoice_date,'invoiceNumber':invoice_number,'invoiceLPO':invoice_lpo,'invoiceAmount':invoice_amount};

                    $.ajax({
                        url:'http://localhost/Naod-Moses-Co/Transaction/Purchase/PurchaseInvoice.php',
                        data:blank_document,
                        type:'post',
                        success: function(data){
                            var new_complete_document = [];
                            var document_data = [];

                            $("#purchaseInvoiceContentPrintable tr:gt(0)").each(function () {
                                var this_row = $(this);

                                var item = $.trim(this_row.find('td:eq(1)').html());//td:eq(0) means first td of this row
                                var description = $.trim(this_row.find('td:eq(2)').html());
                                var quantity = $.trim(this_row.find('td:eq(3)').html());
                                var price = $.trim(this_row.find('td:eq(4)').html());
                                var amount = $.trim(this_row.find('td:eq(5)').html());

                                if(item !== '' && description !== '' && quantity !== '' && price !== '' && amount !== '') {
                                    var record = {
                                        'itemName': item,
                                        'itemDescription': description,
                                        'itemQuantity': quantity,
                                        'itemPrice': price,
                                        'itemAmount': amount
                                    };

                                    document_data.push(record);
                                }



                            });

                            var document_info_record = {'invoiceName':invoice_name,'invoiceNumber':invoice_number};
                            document_data.push(document_info_record);
                            new_complete_document.push({'document_details':document_info_record},{'document_content':document_data});
                            $.ajax({
                                url:'http://localhost/Naod-Moses-Co/Transaction/Purchase/PurchaseInvoiceContent.php',
                                data:{new_document_data:new_complete_document},
                                type:'post',
                                success: function(data){
                                    replace_div_content('purchases-invoice-content','purchase-invoices.php');
                                }
                            });

                        }
                    });
                }
            }
        }
    }

    function addValueToTotal(){
        var fresh_amount = parseInt(document.getElementById("itemAmount").value);
        var previous_amount = parseInt(document.getElementById('Amount').innerHTML);

        var new_amount = fresh_amount+previous_amount;
        document.getElementById('Amount').innerHTML = ''+new_amount;
    }

</script>