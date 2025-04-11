<?php
require_once "./backend/product.php";
require_once "./backend/upload.php";
/*********** XỬ LÝ THÊM SẢN PHẨM ************/
if(isset($_POST['btnAddProduct']) && ($_POST['btnAddProduct']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];
    $category_id = $POST['category'];

    $upload = new Upload();
    $uploadResult = $upload -> uploadImage($_FILES["img"]);

    if($uploadResult["status"])
    {
        $imgPath = $uploadResult["path"];
        $product = new Product();

        $addProduct = $product -> insert($name, $price, $stock, $color, $stock, $brand, $category_id)
    }
}
?>