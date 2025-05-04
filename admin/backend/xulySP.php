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
    $imgPath = 'img/shoes/noname.png'; 
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

if (isset($_POST['btnEditProduct'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    $brand_id = $_POST['brand_id'];
    $price = $_POST['price'];

    // // Kiểm tra dữ liệu đầu vào
    // if (empty($id) || empty($name) || empty($category_id) || empty($brand_id)) {
    //     echo '<script>alert("Vui lòng điền đầy đủ thông tin sản phẩm!");
    //         window.location.href = "../index.php?page=editProduct&id=' . $id . '";
    //         </script>';
    //     exit();
    // }

    // Kiểm tra trùng lặp sản phẩm (trừ sản phẩm hiện tại)
    $existingProduct = $product->getProductByName($name);
    if ($existingProduct && $existingProduct['id'] != $id) {
        echo '<script>alert("Sản phẩm với tên này đã tồn tại!");
            window.location.href = "../index.php?page=editProduct&id=' . $id . '";
            </script>';
        exit();
    }

    $upload = new Upload();
    $currentProduct = $product->getProductById($id); // Lấy thông tin sản phẩm hiện tại
    $imgPath = $currentProduct['img_src'] ?? ''; // Giữ ảnh cũ nếu không upload ảnh mới
    if (isset($_FILES['img_src']) && $_FILES['img_src']['error'] !== 4) {
        $uploadResult = $upload->uploadImage($_FILES['img_src']);
        if (!$uploadResult['status']) {
            echo '<script>alert("Lỗi upload hình ảnh: ' . $uploadResult['message'] . '");
                window.location.href = "../index.php?page=editProduct&id=' . $id . '";
                </script>';
            exit();
        }
        $imgPath = $uploadResult['path'];
    }

    // Cập nhật sản phẩm
    $result = $product->update($id, $name, $price, $imgPath, $category_id, $status, $brand_id);
    if ($result) {
        echo '<script>alert("Cập nhật sản phẩm thành công!");
            window.location.href = "../index.php?page=product";
            </script>';
    } else {
        $error = mysqli_error($product->conn);
        echo '<script>alert("Cập nhật sản phẩm thất bại! Lỗi: ' . $error . '");
            window.location.href = "../index.php?page=editProduct&id=' . $id . '";
            </script>';
    }
}

/***** XÓA SẢN PHẨM******/ 
if(isset($_GET['act']) && ($_GET['act']) == 'delete' && isset($_GET['id']))
{
    $productID = ($_GET['id']);

    /*Kiểm tra sản phẩm đẵ bán hay chưa??? */
    if($product->isProductSold($productID))
    {
        $result = $product->hideProduct($productID);
        if($result)
            echo '<script> alert("Sản phẩm đã được bán, tiến hành ẩn sản phẩm !");
                    window.location.href= "../index.php?page=product";
                    </script>';
        else
            echo '<script> alert("Ẩn sản phẩm thất bại!");
                    window.location.href= "../index.php?page=product";
                    </script>';
    }
    else 
    {
        $result = $product->deleteProduct($productID);
        if($result)
            echo '<script> alert("Xóa sản phẩm thành công !");
                   window.location.href= "../index.php?page=product";       
                </script>';
        else
            echo '<script> alert("Xóa sản phẩm thất bại !");
                   window.location.href= "../index.php?page=product";       
                </script>';
    }
}
?>