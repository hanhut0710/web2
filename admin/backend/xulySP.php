<?php
require_once "product.php";
require_once "upload.php";

$product = new Product();

if (isset($_POST['btnAddProduct'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    $brand_id = $_POST['brand_id'];
    $price = 0; // Giá bán mặc định là 0

    // Kiểm tra dữ liệu đầu vào
    if (empty($name) || empty($category_id) || empty($brand_id)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin sản phẩm!");
            window.location.href = "../index.php?page=addProduct";
            </script>';
        exit();
    }

    // Kiểm tra trùng lặp sản phẩm
    $existingProduct = $product->getProductByName($name);
    if ($existingProduct) {
        echo '<script>alert("Sản phẩm với tên này đã tồn tại!");
            window.location.href = "../index.php?page=addProduct";
            </script>';
        exit();
    }

    // Xử lý upload hình ảnh (không bắt buộc)
    $upload = new Upload();
    $imgPath = '';
    if (isset($_FILES['img_src']) && $_FILES['img_src']['error'] !== 4) {
        $uploadResult = $upload->uploadImage($_FILES['img_src']);
        if (!$uploadResult['status']) {
            echo '<script>alert("Lỗi upload hình ảnh: ' . $uploadResult['message'] . '");
                window.location.href = "../index.php?page=addProduct";
                </script>';
            exit();
        }
        $imgPath = $uploadResult['path'];
    }

    // Thêm sản phẩm
    $product_id = $product->insert($name, $price, $imgPath, $category_id, $status, $brand_id);
    if ($product_id) {
        echo '<script>alert("Thêm sản phẩm thành công!");
            window.location.href = "../index.php?page=product";
            </script>';
    } else {
        $error = mysqli_error($product->conn);
        echo '<script>alert("Thêm sản phẩm thất bại! Lỗi: ' . $error . '");
            window.location.href = "../index.php?page=addProduct";
            </script>';
    }
}
?>