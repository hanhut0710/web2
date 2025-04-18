<?php
require_once "product.php";
require_once "upload.php";

$product = new Product();

if (isset($_POST['btnAddProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    // Xử lý upload hình ảnh
    $upload = new Upload();
    $uploadResult = $upload->uploadImage($_FILES["img_src"]);

    if ($uploadResult["status"]) {
        $imgPath = $uploadResult["path"];
        if ($product->insert($name, $price, $imgPath, $category_id, $status)) {
            echo '<script>alert("Thêm sản phẩm thành công!");
                window.location.href = "../index.php?page=product";
                </script>';
        } else {
            echo '<script>alert("Thêm sản phẩm thất bại!");
                window.location.href = "../index.php?page=addProduct";
                </script>';
        }
    } else {
        echo '<script>alert("Lỗi upload hình ảnh: ' . $uploadResult["message"] . '");
            window.location.href = "../index.php?page=addProduct";
            </script>';
    }
}
?>