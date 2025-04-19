<?php
require_once "import.php";
require_once "productdetails.php";
require_once "upload.php";
require_once "product.php";

$import = new Import();
$productDetails = new ProductDetails();
$upload = new Upload();
$product = new Product();

if (isset($_POST['btnAddImport'])) 
{
    $sup_id = $_POST['sup_id'];
    $profit_percentage = $_POST['profit_percentage'];
    $created_at = $_POST['created_at'];
    $product_id = $_POST['product_id'] ?? '';
    $color = $_POST['color'];
    $size = $_POST['size'];
    $import_price = $_POST['import_price'];
    $quantity = $_POST['quantity'];
    $new_product_name = $_POST['new_product_name'] ?? '';
    $new_product_brand = $_POST['new_product_brand'] ?? '';
    $new_product_category = $_POST['new_product_category'] ?? '';
    $new_product_status = $_POST['new_product_status'] ?? '1';
    $new_product_price = $_POST['new_product_price'] ?? 0;

    // Tính tổng số lượng và tổng giá trị
    $total_quantity = $quantity;
    $total_price = $import_price * $quantity;

    // 1. Tạo phiếu nhập hàng mới
    $import_id = $import->insertImport($sup_id, $total_quantity, $created_at, $total_price);

    if ($import_id) {
        // 2. Xử lý sản phẩm
        $img_src = '';
        if (empty($product_id) && !empty($new_product_name)) {
            // Kiểm tra dữ liệu sản phẩm mới
            if (empty($new_product_name) || empty($new_product_brand) || empty($new_product_category)) {
                echo '<script>alert("Vui lòng điền đầy đủ thông tin sản phẩm mới!");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }

            // Kiểm tra trùng lặp sản phẩm
            $existingProduct = $product->getProductByName($new_product_name);
            if ($existingProduct) {
                echo '<script>alert("Sản phẩm với tên này đã tồn tại!");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }

            // Xử lý upload ảnh sản phẩm mới (không bắt buộc)
            $img_path = '';
            if (isset($_FILES['new_product_img']) && $_FILES['new_product_img']['error'] !== 4) {
                $uploadResult = $upload->uploadImage($_FILES['new_product_img']);
                if (!$uploadResult['status']) {
                    echo '<script>alert("Lỗi upload ảnh sản phẩm mới: ' . $uploadResult['message'] . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
                $img_path = $uploadResult['path'];
            }

            // Thêm sản phẩm mới
            $product_id = $product->insert($new_product_name, $new_product_price, $img_path, $new_product_category, $new_product_status, $new_product_brand);
            if (!$product_id) {
                $error = mysqli_error($product->conn);
                echo '<script>alert("Thêm sản phẩm mới thất bại! Lỗi: ' . $error . '");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }
        } elseif (empty($product_id)) {
            echo '<script>alert("Vui lòng chọn sản phẩm hoặc nhập thông tin sản phẩm mới!");
                window.location.href = "../index.php?page=addImport";
                </script>';
            exit();
        }

        // Xử lý tải ảnh biến thể (không bắt buộc)
        if (isset($_FILES['img_src']) && $_FILES['img_src']['name'] != '') {
            $uploadResult = $upload->uploadImage($_FILES['img_src']);
            if ($uploadResult['status']) {
                $img_src = $uploadResult['path'];
            } else {
                echo '<script>alert("Lỗi khi upload ảnh biến thể: ' . $uploadResult['message'] . '");
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
                echo '<script>alert("Cập nhật số lượng biến thể thất bại! Lỗi: ' . $error . '");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }
            if (!$import->insertImportDetail($import_id, $existingDetail['id'], $quantity, $import_price, $total_price)) {
                $error = mysqli_error($import->conn);
                echo '<script>alert("Thêm chi tiết phiếu nhập thất bại! Lỗi: ' . $error . '");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }
        } else {
            // Tạo mới biến thể
            $new_detail_id = $productDetails->insertProductDetail($product_id, $color, $size, $quantity, $img_src);
            if ($new_detail_id && is_numeric($new_detail_id)) {
                if (!$import->insertImportDetail($import_id, $new_detail_id, $quantity, $import_price, $total_price)) {
                    $error = mysqli_error($import->conn);
                    echo '<script>alert("Thêm chi tiết phiếu nhập thất bại! Lỗi: ' . $error . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            } else {
                $error = mysqli_error($productDetails->conn);
                echo '<script>alert("Tạo biến thể sản phẩm thất bại! Lỗi: ' . $error . '");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }
        }

        // Cập nhật giá bán sản phẩm
        $new_sale_price = $import_price * (1 + $profit_percentage / 100);
        if (!$product->updatePrice($product_id, $new_sale_price)) {
            $error = mysqli_error($product->conn);
            echo '<script>alert("Cập nhật giá bán sản phẩm thất bại! Lỗi: ' . $error . '");
                window.location.href = "../index.php?page=addImport";
                </script>';
            exit();
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
}
?>