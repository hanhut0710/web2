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
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if (!$user_id) {
        echo json_encode(["success" => false, "message" => "Bạn cần đăng nhập để thêm sản phẩm"]);
        exit;
    }
    
    if ($product_id > 0 && $quantity > 0 && $user_id && $product_id && $product_detail_id) {
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantity($quantity);
        $cart->setProductDetailId($product_detail_id);
        if ($cart->createCartIfNotExists($con)) {
            // Thêm giỏ hàng thành công (vì trước đó chưa có)
            echo "Đã tạo giỏ hàng mới cho user.";
        } else {
            // Giỏ hàng đã tồn tại, không cần tạo mới
            echo "Giỏ hàng đã tồn tại.";
        }
        $result = $cart->addProductToCart($con);
        if ($result['status'] === 'success') {
            echo json_encode(["success" => true, "message" => $result['message']]);
        } else {
            echo json_encode(["success" => false, "message" => $result['message']]);
        }
    }
     else {
        echo json_encode([
            "success" => false,
            "message" => "Dữ liệu không hợp lệ. product_id = " . $product_id . ", quantity = " . $quantity
        ]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Yêu cầu không hợp lệ"]);
}
?>
