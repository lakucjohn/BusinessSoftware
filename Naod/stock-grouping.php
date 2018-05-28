<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/9/18
 * Time: 5:55 PM
 */
require '../core_resources/id.generator.inc.php';
$newCategoryId = getUniqueId(5);
?>

<div class="row">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addCategory">New Spare Part Category</button>
</div>
<p>
<div class="row">
    <div id="category-list">
        <?php include 'categorylist.php'; ?>
    </div>


</div>
</p>

<div class="modal fade" id="addCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Create New Category</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="categoryName">Category Name: </label>
                            <input type="text" id="categoryName" class="form-control" required />

                            <label for="categoryDescription">Description: </label>
                            <textarea id="categoryDescription" class="form-control"></textarea>

                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveCategory();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="editCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Category</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <label for="categoryNameEdited">category Name: </label>
                            <input type="text" id="categoryNameEdited" class="form-control" required />

                            <label for="categoryDescriptionEdited">Description: </label>
                            <textarea id="categoryDescriptionEdited" class="form-control"></textarea>

                        </div>
                        <input type="hidden" id="categoryIdEdited" />
                    </div>
                    <p>&nbsp;</p>
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveCategoryEdited();">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="deleteCategory" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:#5A9599; color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Confirm Delete Category</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">

                            <h3 class="confirm-txt">Are you sure you want to delete this category? </h3>

                        </div>
                    </div>
                    <input type="hidden" id="categoryToDelete" />
                    <section class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory();">Delete</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- END MODAL/-->

<script>
    function saveCategory(){
        var categoryid = '<?php echo $newCategoryId; ?>';
        var categoryname = document.getElementById('categoryName').value;
        var categorydescription = document.getElementById('categoryDescription').value;

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Categories/category.php',
            type:'post',
            data:{'addCategory':'addCategory','categoryId':categoryid,'categoryName':categoryname,'categoryDescription':categorydescription},
            success: function(data){
                $('#addCategory').modal('toggle');
                replace_div_content('category-list','http://localhost/Naod-Moses-Co/Naod/categorylist.php');
            }
        });
    }

    function setCategoryDetails(category_id, category_name, category_description){
        categoryNameEdited.setAttribute('value',category_name);
        document.getElementById('categoryDescriptionEdited').value = category_description;
        categoryIdEdited.setAttribute('value',category_id);
    }

    function saveCategoryEdited(){
        var editedcategoryid = document.getElementById('categoryIdEdited').value;
        var editedcategoryname = document.getElementById('categoryNameEdited').value;
        var editedcategorydescription = document.getElementById('categoryDescriptionEdited').value;

        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Categories/category.php',
            type:'post',
            data:{'editCategory':'editCategory','editedCategoryId':editedcategoryid,'editedCategoryName':editedcategoryname,'editedCategoryDescription':editedcategorydescription},
            success: function(data){
                $('#editCategory').modal('toggle');
                replace_div_content('category-list','http://localhost/Naod-Moses-Co/Naod/categorylist.php');
            }
        });

    }

    function setDeleteId(category_id){
        categoryToDelete.setAttribute('value',category_id);
    }

    function deleteCategory(){
        var deletecategoryid = document.getElementById('categoryToDelete').value
        $.ajax({
            url:'http://localhost/Naod-Moses-Co/Inventory/SpareParts/Categories/category.php',
            type:'post',
            data:{'deleteCategory':'deleteCategory','deletedCategoryId':deletecategoryid},
            success: function(data){
                $('#deleteCategory').modal('toggle');
                replace_div_content('category-list','http://localhost/Naod-Moses-Co/Naod/categorylist.php');

            }
        });
    }
</script>