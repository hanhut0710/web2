<?php
require_once "productdetails.php";
require_once "upload.php";

$details = new ProductDetails();

if (isset($_POST['btnAddDetails'])) {
    $product_id = $_POST['product'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $brand = $_POST['brand'];
    $stock = $_POST['quantity'];
    $img_src = '';

    // Xử lý upload hình ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload = new Upload();
        $uploadResult = $upload->uploadImage($_FILES['image']);
        if ($uploadResult["status"]) {
            $img_src = $uploadResult["path"];
        } else {
            echo '<script>alert("Lỗi khi upload hình ảnh: ' . $uploadResult["message"] . '");
                window.location.href="../index.php?page=addProductDetail";
                </script>';
            exit();
        }
    }

    $result = $details->insertProductDetail($product_id, $color, $size, $brand, $stock, $img_src);
    if ($result) {
        echo '<script>alert("Thêm chi tiết sản phẩm thành công");
            window.location.href="../index.php?page=productdetails";
            </script>';
    } else {
        echo '<script>alert("Thêm chi tiết sản phẩm thất bại");
            window.location.href="../index.php?page=addProductDetail";
            </script>';
    }
}
?>