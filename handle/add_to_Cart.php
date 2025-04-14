<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
    if (!isset($_SESSION['user_id'])) {
        // Gán guest_id nếu chưa có
        if (!isset($_SESSION['guest_id'])) {
            $_SESSION['guest_id'] = mt_rand(100000000, 999999999);
        }
        $guestId = $_SESSION['guest_id'];
        // Kiểm tra xem guest này đã tồn tại trong bảng users chưa (dựa vào id)
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $guestId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            // Tạo mới user dạng guest
            $fullname = "Guest #" . $guestId;
            $phone = "0000000000"; // placeholder
            $acc_id = null;
            $stmt = $con->prepare("INSERT INTO users (full_name, phone, acc_id) VALUES ( ?, ?, ?)");
            $stmt->bind_param("ssi", $fullname, $phone, $acc_id);
            $stmt->execute();
            $userId = $stmt->insert_id;
            $_SESSION['guest_id'] = $userId;
        }
         else {
            // Đã có, lấy id
            $row = $result->fetch_assoc();
            $_SESSION['guest_id']= $row['id'];
        }
    }
    $user_id = $_SESSION['user_id'] ?? $_SESSION['guest_id'] ?? null;
    if ($product_id > 0 && $quantity > 0 && $product_detail_id > 0) {
        $cart = new Cart();
        $cart->setUserId($user_id);
        $cart->setProductId($product_id);
        $cart->setQuantity($quantity);
        $cart->setProductDetailId($product_detail_id);
        $cart->addProductToCart($con);
        echo json_encode([
            "success" => true,
            "message" => "Đã thêm vào giỏ hàng",
            "data" => [
                "user_id" => $user_id,
                "product_id" => $product_id,
                "quantity" => $quantity,
                "product_detail_id" => $product_detail_id
            ]
        ]);    } else {
        echo json_encode([
            "success" => false,
            "message" => "Dữ liệu không hợp lệ. product_id = $product_id, quantity = $quantity, product_detail_id = $product_detail_id"
        ]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Yêu cầu không hợp lệ"]);
}
?>
