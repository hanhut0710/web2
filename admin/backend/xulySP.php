<?php
require_once "./backend/product.php";
require_once "./backend/upload.php";
/*********** XỬ LÝ THÊM SẢN PHẨM ************/
if(isset($_POST['btnAddProduct']) && ($_POST['btnAddProduct']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price = $_POST['stock'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];
    $category_id = $POST['category'];

    $upload = new Upload();
}
?>