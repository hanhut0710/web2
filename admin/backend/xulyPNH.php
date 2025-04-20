<?php
require_once "import.php";
require_once "productdetails.php";
require_once "upload.php";
require_once "product.php";

if (isset($_POST['btnAddImport'])) {
    $sup_id = $_POST['sup_id'];
    $profit_percentage = $_POST['profit_percentage'];
    $created_at = $_POST['created_at'];
    $products = $_POST['products'] ?? [];

    $import = new Import();
    $productDetails = new ProductDetails();
    $upload = new Upload();
    $product = new Product();

    // Kiểm tra dữ liệu sản phẩm
    if (empty($products)) {
        echo '<script>alert("Vui lòng thêm ít nhất một sản phẩm!");
            window.location.href = "../index.php?page=addImport";
            </script>';
        exit();
    }

    // Tính tổng số lượng và tổng giá trị
    $total_quantity = 0;
    $total_price = 0;
    foreach ($products as $p) {
        $quantity = (int)($p['quantity'] ?? 0);
        $import_price = (float)($p['import_price'] ?? 0);
        $total_quantity += $quantity;
        $total_price += $import_price * $quantity;
    }

    // 1. Tạo phiếu nhập hàng mới
    $import_id = $import->insertImport($sup_id, $total_quantity, $created_at, $total_price);

    if ($import_id) {
        // 2. Xử lý từng sản phẩm
        foreach ($products as $product_index => $p) {
            $product_id = $p['product_id'] ?? '';
            $new_product_name = $p['new_product_name'] ?? '';
            $new_product_brand = $p['new_product_brand'] ?? '';
            $new_product_category = $p['new_product_category'] ?? '';
            $new_product_status = $p['new_product_status'] ?? '1';
            $new_product_price = $p['new_product_price'] ?? 0;
            $color = $p['color'] ?? '';
            $size = $p['size'] ?? '';
            $import_price = (float)($p['import_price'] ?? 0);
            $quantity = (int)($p['quantity'] ?? 0);

            // Kiểm tra dữ liệu biến thể
            if (empty($color) || empty($size) || $import_price <= 0 || $quantity <= 0) {
                echo '<script>alert("Dữ liệu biến thể của sản phẩm ' . ($product_index + 1) . ' không hợp lệ!");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }

            // Xử lý sản phẩm
            if (empty($product_id) && !empty($new_product_name)) {
                // Kiểm tra dữ liệu sản phẩm mới
                if (empty($new_product_name) || empty($new_product_brand) || empty($new_product_category)) {
                    echo '<script>alert("Vui lòng điền đầy đủ thông tin sản phẩm mới ' . ($product_index + 1) . '!");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }

                // Kiểm tra trùng lặp sản phẩm
                $existingProduct = $product->getProductByName($new_product_name);
                if ($existingProduct) {
                    echo '<script>alert("Sản phẩm ' . $new_product_name . ' đã tồn tại! Vui lòng chọn sản phẩm khác hoặc nhập tên mới!");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }

                // Xử lý upload ảnh sản phẩm mới (không bắt buộc)
                $img_path = '';
                if (isset($_FILES['products']['name'][$product_index]['new_product_img']) && $_FILES['products']['error'][$product_index]['new_product_img'] !== 4) {
                    $uploadResult = $upload->uploadImage($_FILES['products'], [$product_index, 'new_product_img']);
                    if (!$uploadResult['status']) {
                        echo '<script>alert("Lỗi upload ảnh sản phẩm mới ' . ($product_index + 1) . ': ' . $uploadResult['message'] . '");
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
                    echo '<script>alert("Thêm sản phẩm mới ' . ($product_index + 1) . ' thất bại! Lỗi: ' . $error . '");
                        window.location.href = "../index.php?page=addImport";
                        </script>';
                    exit();
                }
            } elseif (empty($product_id)) {
                echo '<script>alert("Vui lòng chọn sản phẩm hoặc nhập thông tin sản phẩm mới ' . ($product_index + 1) . '!");
                    window.location.href = "../index.php?page=addImport";
                    </script>';
                exit();
            }

            // Xử lý biến thể (chỉ 1)
            $img_src = '';
            if (isset($_FILES['products']['name'][$product_index]['img_src']) && $_FILES['products']['error'][$product_index]['img_src'] !== 4) {
                $uploadResult = $upload->uploadImage($_FILES['products'], [$product_index, 'img_src']);
                if ($uploadResult['status']) {
                    $img_src = $uploadResult['path'];
                } else {
                    echo '<script>alert("Lỗi khi upload ảnh biến thể của sản phẩm ' . ($product_index + 1) . ': ' . $uploadResult['message'] . '");
                    
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

            // Cập nhật giá bán sản phẩm
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
}
?>