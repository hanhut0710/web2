<?php
require_once '../class/Cart.php';
require_once './connect.php';
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Chưa đăng nhập"]);
    exit;
}

if (!isset($data['id']) || !isset($data['quantity'])) {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu"]);
    exit;
}
$cart = new Cart();
$cart->setId($data['id']);
$cart->setQuantity($data['quantity']);

if ($cart->updateQuantityById($con)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Cập nhật thất bại"]);
}
?>
