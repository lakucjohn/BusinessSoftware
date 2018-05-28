<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
require '../core_resources/id.generator.inc.php';
$newSparePartId = getUniqueId(7);


?>
<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addSparePart">New Spare Part</button>
</div>
<p>
<div class="row">
    <div id="spare-part-list">
        <?php include_once 'sparelist.php';
        $category_sql = "SELECT * FROM categories WHERE status = 1";
        $category_sql_run = mysqli_query($db_conn,$category_sql);
        ?>
    </div>

</div>
</p>

<div class="modal fade" id="addSparePart" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Spare Part</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="sparePartName">Spare Part Name: </label>
                            <input type="text" id="sparePartName" class="form-control" required />

                            <label for="sparePartCategory">Category: </label>
                            <select id="sparePartCategory" class="form-control" required>
                                <option value="">----- Select a category -----</option>
                                <?php
                                    while($rs = mysqli_fetch_assoc($category_sql_run)){

                                        ?>
                                        <option value="<?php echo $rs['category_id']; ?>"><?php echo $rs['category_name']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>

                            <label for="sparePartDescription">Description: </label>
                            <textarea id="sparePartDescription" class="form-control"></textarea>

                            <label for="sparePartModel">Model: </label>
                            <input type="text" id="sparePartModel" class="form-control" required />

                            <label for="packageMethods">Packages methods for sale: </label>
                            <input type="text" id="packageMethods" class="form-control" placeholder="Example: pieces, cartons" value="pieces" disabled />

                            <label for="buyingPrice">Cash Selling Price per package:</label>
                            <input type="text" id="cashSellingPrice" class="form-control" placeholder="Example: 1000,3000" />

                            <label for="buyingPrice">Credit Selling Price per package: </label>
                            <input type="text" id="creditSellingPrice" class="form-control" placeholder="Example: 1000,3000" />

                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveSparePart();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="editSparePart" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Spare Part</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="sparePartNameEdited">Spare Part Name: </label>
                            <input type="text" id="sparePartNameEdited" class="form-control" required />

                            <label for="sparePartCategoryEdited">Category: </label>
                            <select id="sparePartCategoryEdited" class="form-control" required>
                                <option value="">----- Select a category -----</option>
                                <?php

                                $category_sql = "SELECT * FROM categories WHERE status = 1";
                                $category_sql_run = mysqli_query($db_conn,$category_sql);
                                while($rs = mysqli_fetch_assoc($category_sql_run)){

                                    ?>
                                    <option value="<?php echo $rs['category_id']; ?>"><?php echo $rs['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                            <label for="sparePartDescriptionEdited">Description: </label>
                            <textarea id="sparePartDescriptionEdited" class="form-control"></textarea>

                            <label for="sparePartModelEdited">Model: </label>
                            <input type="text" id="sparePartModelEdited" class="form-control" required />
                        </div>
                        <input type="hidden" id="sparePartIdEdited" />
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveSparePartEdited();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="deleteSparePart" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Confirm Delete Spare Part</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <h3 class="confirm-txt">Are you sure you want to delete this spare part ? </h3>

                        </div>
                    </div>
                    <input type="hidden" id="spareToDelete" />
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-danger" onclick="deleteSparePart();">Delete</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<script>

    function saveSparePart(){
        //alert('OK');
        var sparepartname = document.getElementById('sparePartName').value;
        var sparepartcategory = document.getElementById('sparePartCategory').value;
        var sparepartdescription = document.getElementById('sparePartDescription').value;
        var sparepartmodel = document.getElementById('sparePartModel').value;
        var packages = document.getElementById('packageMethods').value;
        var cashsaleprices = document.getElementById('cashSellingPrice').value;
        var creditsaleprices = document.getElementById('creditSellingPrice').value;

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Spares/spare_part.php',
            data:{'saveNewPart':'saveNewPart','sparePartId':<?php echo $newSparePartId; ?>,'sparePartName':sparepartname,'sparePartCategory':sparepartcategory,'sparePartDescription':sparepartdescription,'sparePartModel':sparepartmodel,'packagingOptions':packages,},
            type:'post',
            success: function (data) {

                $.ajax({
                    url:'http://localhost/Naod-Moses-Co/Inventory/Prices/Quotations/Outgoing/CustomerQuotation.php',
                    data:{'action':'insertSparePart','sparePartId':<?php echo $newSparePartId; ?>,'packagingOptions':packages,'cashSalePrices':cashsaleprices,'creditSalePrices':creditsaleprices},
                    type:'post',
                    success: function (data) {
                        alert(data);
                        $('#addSparePart').modal('toggle');
                        replace_div_content('spare-part-list','http://localhost/Naod-Moses-Co/Naod/sparelist.php');
                    }
                });
            }
        });


    }

    function setSparePartDetails(spare_part_id, spare_part_name, spare_part_category, spare_part_description, spare_part_model){
        sparePartNameEdited.setAttribute('value',spare_part_name);
        sparePartCategoryEdited.setAttribute('value',spare_part_category);
        document.getElementById('sparePartDescriptionEdited').value = spare_part_description;
        sparePartModelEdited.setAttribute('value',spare_part_model);
        sparePartIdEdited.setAttribute('value',spare_part_id);
    }


    function saveSparePartEdited(){
        var editedsparepartname = document.getElementById('sparePartNameEdited').value;
        var editedsparepartcategory = document.getElementById('sparePartCategoryEdited').value;
        var editedsparepartdescription = document.getElementById('sparePartDescriptionEdited').value;
        var editedsparepartmodel = document.getElementById('sparePartModelEdited').value;
        var editedsparepartid = document.getElementById('sparePartIdEdited').value;

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Spares/spare_part.php',
            type:'post',
            data:{'editSparePart':'editSparePart','editedSparePartName':editedsparepartname,'editedSparePartCategory':editedsparepartcategory,'editedSparePartDescription':editedsparepartdescription,'editedSparePartModel':editedsparepartmodel,'editedSparePartId':editedsparepartid},
            success: function(data){
                $('#editSparePart').modal('toggle');
                replace_div_content('spare-part-list','http://localhost/Naod-Moses-Co/Naod/sparelist.php');
            }
        });
    }

    function setSpareToDelete(spare_part_id){
        spareToDelete.setAttribute('value',spare_part_id)
    }
    function deleteSparePart(){
        //alert('OK');
        var sparepartid = document.getElementById('spareToDelete').value;
        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Spares/spare_part.php',
            type:'post',
            data:{'deleteSparePart':'deleteSparePart','sparePartIdDeleted':sparepartid},
            success: function(data){
                
                $('#deleteSparePart').modal('toggle');
                replace_div_content('spare-part-list','http://localhost/Naod-Moses-Co/Naod/sparelist.php');
            }
        })
    }
</script>