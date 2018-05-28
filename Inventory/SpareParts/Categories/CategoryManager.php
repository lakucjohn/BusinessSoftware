<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/10/18
 * Time: 4:15 PM
 */

require '../../../core_resources/connect.inc.php';
class CategoryManager{

    private $connect;

    public function __construct()
    {
        global $db_conn;
        $this->connect = $db_conn;
    }

    public function createCategory($categoryId, $categoryName, $categoryDescription){
        $sql = "INSERT INTO categories(category_id, category_name, description) VALUES('$categoryId','$categoryName','$categoryDescription')";
        mysqli_query($this->connect,$sql);
    }

    public function editCategory($categoryId, $categoryName, $categoryDescription){
        $sql = "UPDATE categories SET category_name='$categoryName',description='$categoryDescription' WHERE category_id='$categoryId'";
        mysqli_query($this->connect,$sql);
    }

    public function deleteCategory($categoryId){
        $sql = "UPDATE categories SET status=0 WHERE category_id='$categoryId'";
        mysqli_query($this->connect,$sql);
    }

}
?>