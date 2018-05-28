<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/8/18
 * Time: 5:15 PM
 */
?>

<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addSupplierQuotation">Record New Product Quotation</button>
</div>
<p>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Spare Part</th>
                    <th>Model</th>
                    <th>Supplier</th>
                    <th>Price</th>
                    <th>Measure</th>
                    <th>Timestamp</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>Bolts</td>
                    <td>B100A</td>
                    <td>Harbour Mechanical Works</td>
                    <td>2000</td>
                    <td>Pieces</td>
                    <td>20/12/2018 12:02:12</td>
                    <td>
                        <button class="btn btn-primary"><i class="fa fa-edit"> Edit</i> </button>
                        <button class="btn btn-danger"><i class="fa fa-remove"> Delete</i> </button>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>
</p>

<div class="modal fade" id="addSupplierQuotation" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Record New Price Quotation</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="QuotingSupplier">Supplier</label>
                            <select id="QuotingSupplier" class="form-control" required >

                            </select>

                            <label for="sparePartQuotedIn">Product</label>
                            <select id="sparePartQuotedIn" class="form-control" >

                            </select>

                            <label for="sparePartModelQuotedIn">Model</label>
                            <select id="sparePartModelQuotedIn" class="form-control" >

                            </select>

                            <label for="sparePartQuotedInPrice">Price</label>
                            <input type="text" id="sparePartQuotedInPrice" class="form-control" />

                            <label for="sparePartQuotedInMeasure">Measure</label>
                            <input type="text" id="sparePartQuotedInMeasure" value="pieces" class="form-control" disabled />

                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"class="btn btn-primary" onclick="deletePurchaseReceipt();">Submit Quotation</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->