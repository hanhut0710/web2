<?php
session_start();
file_put_contents("session_debug.log", print_r($_SESSION, true));
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
    $product_detail_id = isset($_POST['product_detail_id']) ? (int)$_POST['product_detail_id'] : 0;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if (!$user_id) {
        echo json_encode(["success" => false, "message" => "Bạn cần đăng nhập để thêm sản phẩm"]);
        exit;
    }

    if ($product_id > 0 && $quantity > 0 && $product_detail_id > 0) {
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantity($quantity);
        $cart->setProductDetailId($product_detail_id);
        $cart->createCartIfNotExists($con);
        $cart->addProductToCart($con);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Dữ liệu không hợp lệ. product_id = $product_id, quantity = $quantity, product_detail_id = $product_detail_id"
        ]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Yêu cầu không hợp lệ"]);
}
?>
