<?php
require_once "import.php";
require_once "productdetails.php";
require_once "upload.php";

if (isset($_POST['btnAddImport'])) 
{
    $sup_id = $_POST['sup_id'];
    $created_at = $_POST['created_at'];
    $product_ids = $_POST['product_id'];
    $colors = $_POST['color'];
    $sizes = $_POST['size'];
    $brands = $_POST['brand'];
    $quantities = $_POST['quantity'];

    $import = new Import();
    $productDetails = new ProductDetails();
    $upload = new Upload();

    // 1. Tạo phiếu nhập hàng mới
    $total_quantity = array_sum($quantities);
    $import_id = $import->insertImport($sup_id, $total_quantity, $created_at);

    if ($import_id) {
        // 2. Xử lý chi tiết phiếu nhập hàng
        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $color = $colors[$i];
            $size = $sizes[$i];
            $brand = $brands[$i];
            $quantity = $quantities[$i];
            $img_src = '';

            // Kiểm tra xem biến thể đã tồn tại chưa
            $existingDetail = $productDetails->getDetailByAttributes(
                $product_id,
                $color,
                $size,
                $brand
            );

            if ($existingDetail) {
                // Nếu biến thể đã tồn tại, cập nhật số lượng
                $productDetails->updateProductDetailStock($existingDetail['id'], $quantity);
                $import->insertImportDetail($import_id, $existingDetail['id'], $quantity);
            } else {
                // Nếu chưa tồn tại, xử lý tải ảnh (nếu có)
                if (isset($_FILES['img_src']['name'][$i]) && $_FILES['img_src']['name'][$i] != '') {
                    // Tạo mảng file tạm thời cho class Upload
                    $file = [
                        'name' => $_FILES['img_src']['name'][$i],
                        'type' => $_FILES['img_src']['type'][$i],
                        'tmp_name' => $_FILES['img_src']['tmp_name'][$i],
                        'error' => $_FILES['img_src']['error'][$i],
                        'size' => $_FILES['img_src']['size'][$i]
                    ];

                    $uploadResult = $upload->uploadImage($file);
                    if ($uploadResult['status']) {
                        $img_src = $uploadResult['path'];
                    } else {
                        echo '<script>alert("Lỗi khi upload ảnh cho biến thể ' . ($i + 1) . ': ' . $uploadResult['message'] . '");
                            window.location.href = "../index.php?page=addImport";
                            </script>';
                        exit();
                    }
                }

                // Tạo mới biến thể
                $new_detail_id = $productDetails->insertProductDetail(
                    $product_id,
                    $color,
                    $size,
                    $brand,
                    $quantity,
                    $img_src
                );
                if ($new_detail_id && is_numeric($new_detail_id)) {
                    $import->insertImportDetail($import_id, $new_detail_id, $quantity);
                } else {
                    echo '<script>alert("Lỗi khi tạo biến thể sản phẩm mới!");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            }
        }
        echo '<script>alert("Thêm phiếu nhập hàng thành công!");
            window.location.href = "../index.php?page=import";
            </script>';
    } else {
        echo '<script>alert("Thêm phiếu nhập hàng thất bại!");
            window.location.href = "../index.php?page=addImport";
            </script>';
    }
}
?>