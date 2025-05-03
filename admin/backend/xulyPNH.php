<?php
require_once "import.php";
require_once "productdetails.php";
require_once "upload.php";
require_once "product.php";

if (isset($_POST['btnAddImport'])) {
    session_start();
    $sup_id = $_POST['sup_id'];
    $staff_id = $_POST['staff_id'];
    $profit_percentage = (float)$_POST['profit_percentage'];
    $created_at = $_POST['created_at'];
    $products = $_POST['products'];

    $import = new Import();
    $productDetails = new ProductDetails();
    $upload = new Upload();
    $product = new Product();

    // Tính tổng số lượng và tổng giá trị
    $total_quantity = 0;
    $total_price = 0;
    foreach ($products as $p) {
        $quantity = (int)$p['quantity'];
        $import_price = (float)$p['import_price'];
        $total_quantity += $quantity;
        $total_price += $import_price * $quantity;
    }

    // 1. Tạo phiếu nhập hàng mới
    $import_id = $import->insertImport($sup_id, $staff_id, $total_quantity, $created_at, $total_price);

    if ($import_id) {
        // 2. Xử lý từng sản phẩm
        foreach ($products as $product_index => $p) {
            $product_id = $p['product_id'];
            $color = $p['color'];
            $size = $p['size'];
            $import_price = (float)$p['import_price'];
            $quantity = (int)$p['quantity'];

            // Xử lý upload ảnh biến thể (nếu có)
            $img_src = '';
            if (isset($_FILES['products']['name'][$product_index]['img_src']) && $_FILES['products']['error'][$product_index]['img_src'] !== 4) {
                $uploadResult = $upload->uploadImage($_FILES['products'], [$product_index, 'img_src']);
                if ($uploadResult['status']) {
                    $img_src = $uploadResult['path'];
                } else {
                    echo '<script>alert("Lỗi khi upload ảnh biến thể của sản phẩm ' . ($product_index + 1) . ': ' . $uploadResult['message'] . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            }

            // Kiểm tra xem biến thể đã tồn tại chưa
            $existingDetail = $productDetails->getDetailByAttributes($product_id, $color, $size);
            if ($existingDetail) {
                // Cập nhật số lượng biến thể
                if (!$productDetails->updateProductDetailStock($existingDetail['id'], $quantity)) {
                    $error = mysqli_error($productDetails->conn);
                    echo '<script>alert("Cập nhật số lượng biến thể của sản phẩm ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
                if (!$import->insertImportDetail($import_id, $existingDetail['id'], $quantity, $import_price, $import_price * $quantity)) {
                    $error = mysqli_error($import->conn);
                    echo '<script>alert("Thêm chi tiết phiếu nhập cho sản phẩm ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            } else {
                // Tạo mới biến thể
                $new_detail_id = $productDetails->insertProductDetail($product_id, $color, $size, $quantity, $img_src);
                if ($new_detail_id && is_numeric($new_detail_id)) {
                    if (!$import->insertImportDetail($import_id, $new_detail_id, $quantity, $import_price, $import_price * $quantity)) {
                        $error = mysqli_error($import->conn);
                        echo '<script>alert("Thêm chi tiết phiếu nhập cho sản phẩm ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                            window.location.href = "../index.php?page=addImport";
                            </script>';
                        exit();
                    }
                } else {
                    $error = mysqli_error($productDetails->conn);
                    echo '<script>alert("Tạo biến thể của sản phẩm ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            }

            // Cập nhật giá bán sản phẩm dựa trên phần trăm lợi nhuận
            $new_sale_price = $import_price * (1 + $profit_percentage / 100);
            if (!$product->updatePrice($product_id, $new_sale_price)) {
                $error = mysqli_error($product->conn);
                echo '<script>alert("Cập nhật giá bán sản phẩm ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }
        }

        echo '<script>alert("Thêm phiếu nhập hàng thành công!");
            window.location.href = "../index.php?page=import";
            </script>';
    } else {
        $error = mysqli_error($import->conn);
        echo '<script>alert("Thêm phiếu nhập hàng thất bại! Lỗi: ' . $error . '");
            window.location.href = "../index.php?page=addImport";
            </script>';
    }
} else {
    echo '<script>alert("Không nhận được dữ liệu form!");
        window.location.href = "../index.php?page=addImport";
        </script>';
}
?>