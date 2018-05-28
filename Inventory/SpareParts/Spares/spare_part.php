<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 3:48 PM
 */

require 'SparePartManager.php';

$sparePart = new SparePartManager();

if(isset($_POST['saveNewPart'])) {
    if (isset($_POST['sparePartId']) && isset($_POST['sparePartName']) && isset($_POST['sparePartCategory']) && isset($_POST['sparePartDescription']) && isset($_POST['sparePartModel']) && isset($_POST['packagingOptions'])) {
        $sparePartId = $_POST['sparePartId'];
        $sparePartName = $_POST['sparePartName'];
        $sparePartCategory = $_POST['sparePartCategory'];
        $sparePartDescription = $_POST['sparePartDescription'];
        $sparePartModel = $_POST['sparePartModel'];
        $packageMethod = $_POST['packagingOptions'];

        #Processing the storage of the spare part
        $sparePart ->addSparePart($sparePartId,$sparePartName,$sparePartCategory,$sparePartDescription,$sparePartModel,$packageMethod,0);

    }
}

if(isset($_POST['editSparePart'])) {
    if (isset($_POST['editedSparePartId']) && isset($_POST['editedSparePartName']) && isset($_POST['editedSparePartCategory']) && isset($_POST['editedSparePartDescription']) && isset($_POST['editedSparePartModel'])) {
        $sparePartId = $_POST['editedSparePartId'];
        $editedSparePartName = $_POST['editedSparePartName'];
        $editedSparePartCategory = $_POST['editedSparePartCategory'];
        $editedSparePartDescription = $_POST['editedSparePartDescription'];
        $editedSparePartModel = $_POST['editedSparePartModel'];

        #Processing the storage of the spare part
        $sparePart->editSparePart($sparePartId, $editedSparePartName, $editedSparePartCategory, $editedSparePartDescription, $editedSparePartModel);

    }
}

if(isset($_POST['deleteSparePart'])){
    if(isset($_POST['sparePartIdDeleted'])){
        $sparePartId = $_POST['sparePartIdDeleted'];
        $sparePart->deleteSparePart($sparePartId);
    }
}

?>