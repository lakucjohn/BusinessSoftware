<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 4:15 PM
 */
require 'CategoryManager.php';
$category = new CategoryManager();
if(isset($_POST['addCategory'])){
    if(isset($_POST['categoryId'])&&isset($_POST['categoryName'])&&isset($_POST['categoryDescription'])){

        $categoryId = $_POST['categoryId'];
        $categoryName = $_POST['categoryName'];
        $categoryDescription = $_POST['categoryDescription'];

        $category ->createCategory($categoryId,$categoryName,$categoryDescription);

    }
}
if(isset($_POST['editCategory'])){
    if(isset($_POST['editedCategoryId'])&&isset($_POST['editedCategoryName'])&&isset($_POST['editedCategoryDescription'])){
        $editedCategoryId = $_POST['editedCategoryId'];
        $editedCategoryName = $_POST['editedCategoryName'];
        $editedCategoryDescription = $_POST['editedCategoryDescription'];

        $category ->editCategory($editedCategoryId,$editedCategoryName,$editedCategoryDescription);

    }
}
if(isset($_POST['deleteCategory'])){
    if(isset($_POST['deletedCategoryId'])){
        $deletedCategory = $_POST['deletedCategoryId'];
        $category ->deleteCategory($deletedCategory);
    }
}
?>