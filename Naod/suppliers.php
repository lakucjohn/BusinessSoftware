<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>


<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addSupplier">Register New Supplier</button>
</div>
<p>
<div class="row">
    <div id="supplier-list">
        <?php include 'supplierlist.php'; ?>
    </div>

</div>
</p>

<div class="modal fade" id="addSupplier" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Supplier</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="supplierName">Company Name:</label>
                            <input type="text" id="supplierName" class="form-control" />

                            <label for="supplierAddress">Address:</label>
                            <input type="text" id="supplierAddress" class="form-control" />

                            <label for="supplierEmail">Email Address:</label>
                            <input type="email" id="supplierEmail" class="form-control" />

                            <label for="supplierTelephone">Telephone</label>
                            <input type="number" id="supplierTelephone" class="form-control" />

                            <label for="supplierContactPerson">Contact Person:</label>
                            <input type="text" id="supplierContactPerson" class="form-control" />

                            <label for="supplerContactPersonPhone">Phone</label>
                            <input type="number" id="supplierContactPersonPhone" class="form-control" />

                        </div>
                    </div>
                    <p>&nbsp</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-primary" onclick="saveSupplier();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<div class="modal fade" id="editSupplier" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Supplier</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="supplierNameEdited">Company Name:</label>
                            <input type="text" id="supplierNameEdited" class="form-control" />

                            <label for="supplierAddressEdited">Address:</label>
                            <input type="text" id="supplierAddressEdited" class="form-control" />

                            <label for="supplierEmailEdited">Email Address:</label>
                            <input type="email" id="supplierEmailEdited" class="form-control" />

                            <label for="supplierTelephoneEdited">Telephone</label>
                            <input type="number" id="supplierTelephoneEdited" class="form-control" />

                            <label for="supplierContactPersonEdited">Contact Person:</label>
                            <input type="text" id="supplierContactPersonEdited" class="form-control" />

                            <label for="supplierContactPersonPhoneEdited">Phone</label>
                            <input type="number" id="supplierContactPersonPhoneEdited" class="form-control" />

                        </div>
                    </div>
                    <input type="hidden" id="editedSupplierId" />
                    <p>&nbsp</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button"class="btn btn-primary" onclick="editSupplier();">Save Changes</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<div class="modal fade" id="deleteSupplier" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Delete Supplier</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <h3 class="confirm-txt">Are you sure you want to delete this supplier ? </h3>

                        </div>
                    </div>
                    <input type="hidden" id="supplierToDelete" />
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-danger" onclick="deleteSupplier();">Delete</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<script>
    function saveSupplier(){
        var suppliername = document.getElementById('supplierName').value;
        var supplieraddress = document.getElementById('supplierAddress').value;
        var supplieremail = document.getElementById('supplierEmail').value;
        var suppliertelephone = document.getElementById('supplierTelephone').value;
        var suppliercontactperson = document.getElementById('supplierContactPerson').value;
        var suppliercontactpersonphone = document.getElementById('supplierContactPersonPhone').value;

        var data = {'action':'addSupplier','supplierName':suppliername,'supplierAddress':supplieraddress,'supplierEmail':supplieremail,'supplierTelephone':suppliertelephone,'supplierContactPerson':suppliercontactperson,'supplierContactPersonContact':suppliercontactpersonphone};

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Supplier/supplier.php',
            type:'post',
            data:data,
            success: function(data){
                $('#addSupplier').modal('toggle');
                replace_div_content('supplier-list','http://localhost/Naod-Moses-Co/Naod/supplierlist.php');
            }
        })
    }

    function setSupplierDetails(supplier_id,supplier_name,supplier_address,supplier_email,supplier_phone,contact_person,contact_person_phone){
        supplierNameEdited.setAttribute('value',supplier_name);
        supplierAddressEdited.setAttribute('value',supplier_address);
        supplierEmailEdited.setAttribute('value',supplier_email);
        supplierTelephoneEdited.setAttribute('value',supplier_phone);
        supplierContactPersonEdited.setAttribute('value',contact_person);
        supplierContactPersonPhoneEdited.setAttribute('value',contact_person_phone);
        editedSupplierId.setAttribute('value',supplier_id);
    }

    function editSupplier(){
        var editedsuppliername = document.getElementById('supplierNameEdited').value;
        var editedsupplieraddress = document.getElementById('supplierAddressEdited').value;
        var editedsupplieremail = document.getElementById('supplierEmailEdited').value;
        var editedsuppliertelephone = document.getElementById('supplierTelephoneEdited').value;
        var editedsuppliercontactperson = document.getElementById('supplierContactPersonEdited').value;
        var editedsuppliercontactpersonphone = document.getElementById('supplierContactPersonPhoneEdited').value;
        var editedsupplierid = document.getElementById('editedSupplierId').value;


        var data = {'action':'editSupplier','supplierNameEdited':editedsuppliername,'supplierAddressEdited':editedsupplieraddress,'supplierEmailEdited':editedsupplieremail,'supplierTelephoneEdited':editedsuppliertelephone,'supplierContactPersonEdited':editedsuppliercontactperson,'supplierContactPersonContactEdited':editedsuppliercontactpersonphone,'editedSupplierId':editedsupplierid};

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Supplier/supplier.php',
            type:'post',
            data:data,
            success: function(data){
                $('#editSupplier').modal('toggle');
                replace_div_content('supplier-list','http://localhost/Naod-Moses-Co/Naod/supplierlist.php');
            }
        })

    }

    function setSupplierId(supplier_id){
        supplierToDelete.setAttribute('value',supplier_id);
    }

    function deleteSupplier(){
        var deletedsupplierid = document.getElementById('supplierToDelete').value;
        var data={'action':'deleteSupplier','deletedSupplierId':deletedsupplierid};
        $.ajax({
            url:'http://localhost/Naod-Moses-Co/People/Supplier/supplier.php',
            type:'post',
            data:data,
            success: function(data){
                $('#deleteSupplier').modal('toggle');
                replace_div_content('supplier-list','http://localhost/Naod-Moses-Co/Naod/supplierlist.php');
            }
        })

    }

</script>