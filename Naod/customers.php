<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>

<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">Register new Customer</button>
</div>
<p>
<div class="row">
    <div class="table-responsive">
        <div id="customer-list">
            <?php include 'customerlist.php'; ?>
        </div>

</div>
</div>
</p>

<div class="modal fade" id="addCustomer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="customerName">Company Name:</label>
                            <input type="text" id="customerName" class="form-control" />

                            <label for="customerAddress">Address:</label>
                            <input type="text" id="customerAddress" class="form-control" />

                            <label for="customerEmail">Email Address:</label>
                            <input type="email" id="customerEmail" class="form-control" />

                            <label for="customerTelephone">Telephone</label>
                            <input type="number" id="customerTelephone" class="form-control" />

                            <label for="customerContactPerson">Contact Person:</label>
                            <input type="text" id="customerContactPerson" class="form-control" />

                            <label for="customerContactPersonPhone">Phone</label>
                            <input type="number" id="customerContactPersonPhone" class="form-control" />

                        </div>
                    </div>
                    <p>&nbsp</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-primary" onclick="saveCustomer();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<div class="modal fade" id="editCustomer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="customerNameEdited">Company Name:</label>
                            <input type="text" id="customerNameEdited" class="form-control" />

                            <label for="customerAddressEdited">Address:</label>customerNameEdited
                            <input type="text" id="customerAddressEdited" class="form-control" />

                            <label for="customerEmailEdited">Email Address:</label>
                            <input type="email" id="customerEmailEdited" class="form-control" />

                            <label for="customerTelephoneEdited">Telephone</label>
                            <input type="number" id="customerTelephoneEdited" class="form-control" />

                            <label for="customerContactPersonEdited">Contact Person:</label>
                            <input type="text" id="customerContactPersonEdited" class="form-control" />

                            <label for="customerContactPersonPhoneEdited">Phone</label>
                            <input type="number" id="customerContactPersonPhoneEdited" class="form-control" />

                        </div>
                    </div>
                    <input type="hidden" id="editedCustomerId" />
                    <p>&nbsp</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button"class="btn btn-primary" onclick="editCustomer();">Save Changes</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<div class="modal fade" id="deleteCustomer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Confirm Delete Customer</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <h3 class="confirm-txt">Are you sure you want to delete this customer ? </h3>

                        </div>
                    </div>
                    <input type="hidden" id="customerToDelete" />
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-danger" onclick="deleteCustomer();">Delete</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<script>
    function saveCustomer(){
        var customername = document.getElementById('customerName').value;
        var customeraddress = document.getElementById('customerAddress').value;
        var customeremail = document.getElementById('customerEmail').value;
        var customertelephone = document.getElementById('customerTelephone').value;
        var customercontactperson = document.getElementById('customerContactPerson').value;
        var customercontactpersonphone = document.getElementById('customerContactPersonPhone').value;

        var data = {'action':'addCustomer','customerName':customername,'customerAddress':customeraddress,'customerEmail':customeremail,'customerTelephone':customertelephone,'customerContactPerson':customercontactperson,'customerContactPersonContact':customercontactpersonphone};

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Customer/customer.php',
            type:'post',
            data:data,
            success: function(data){
                $('#addCustomer').modal('toggle');
                replace_div_content('customer-list','http://localhost/Naod-Moses-Co/Naod/customerlist.php');
            }
        })
    }

    function setCustomerDetails(customer_id,customer_name,customer_address,customer_email,customer_phone,contact_person,contact_person_phone){
        customerNameEdited.setAttribute('value',customer_name);
        customerAddressEdited.setAttribute('value',customer_address);
        customerEmailEdited.setAttribute('value',customer_email);
        customerTelephoneEdited.setAttribute('value',customer_phone);
        customerContactPersonEdited.setAttribute('value',contact_person);
        customerContactPersonPhoneEdited.setAttribute('value',contact_person_phone);
        editedCustomerId.setAttribute('value',customer_id);
    }

    function editCustomer(){
        var editedcustomername = document.getElementById('customerNameEdited').value;
        var editedcustomeraddress = document.getElementById('customerAddressEdited').value;
        var editedcustomeremail = document.getElementById('customerEmailEdited').value;
        var editedcustomertelephone = document.getElementById('customerTelephoneEdited').value;
        var editedcustomercontactperson = document.getElementById('customerContactPersonEdited').value;
        var editedcustomercontactpersonphone = document.getElementById('customerContactPersonPhoneEdited').value;
        var editedcustomerid = document.getElementById('editedCustomerId').value;


        var data = {'action':'editCustomer','customerNameEdited':editedcustomername,'customerAddressEdited':editedcustomeraddress,'customerEmailEdited':editedcustomeremail,'customerTelephoneEdited':editedcustomertelephone,'customerContactPersonEdited':editedcustomercontactperson,'customerContactPersonContactEdited':editedcustomercontactpersonphone,'editedCustomerId':editedcustomerid};

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Customer/customer.php',
            type:'post',
            data:data,
            success: function(data){
                $('#editCustomer').modal('toggle');
                replace_div_content('customer-list','http://localhost/Naod-Moses-Co/Naod/customerlist.php');
            }
        })

    }

    function setCustomerId(supplier_id){
        customerToDelete.setAttribute('value',supplier_id);
    }

    function deleteCustomer(){
        var deletedcustomerid = document.getElementById('customerToDelete').value;
        var data={'action':'deleteCustomer','deletedCustomerId':deletedcustomerid};
        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Customer/customer.php',
            type:'post',
            data:data,
            success: function(data){
                $('#deleteCustomer').modal('toggle');
                replace_div_content('customer-list','http://localhost/Naod-Moses-Co/Naod/customerlist.php');
            }
        })

    }

</script>