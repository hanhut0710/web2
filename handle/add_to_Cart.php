<?php
session_start();
require_once '../class/Cart.php'; // Đường dẫn đến class Cart

include('./connect.php');
if ($con->connect_error) {
    die(json_encode(["success" => false, "message" => "Lỗi kết nối CSDL"]));
}
header('Content-Type: application/json');

// Kiểm tra nếu có dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $product_detail_id = isset($_POST['product_detail_id']) ? (int)$_POST['product_detail_id'] : 0 ;
    // Giả sử bạn đã lưu user_id trong session sau khi đăng nhập
    $user_id = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if (!$user_id) {
        echo json_encode(["success" => false, "message" => "Bạn cần đăng nhập để thêm sản phẩm"]);
        exit;
    }
    
    if ($product_id > 0 && $quantity > 0) {
        // Tạo đối tượng Cart và thiết lập dữ liệu
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantity($quantity);
        $cart->createCartIfNotExists($con);
        $cart->setProductDetailId($product_detail_id);
        // Thêm sản phẩm vào giỏ hàng
        $cart->addProductToCart($con);

        echo json_encode(["success" => true, "message" => "Đã thêm vào giỏ hàng"]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Dữ liệu không hợp lệ. product_id = " . $product_id . ", quantity = " . $quantity
        ]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Yêu cầu không hợp lệ"]);
}
?>
