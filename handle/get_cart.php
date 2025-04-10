<?php
header('Content-Type: application/json');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Kết nối CSDL
include("./connect.php");
// Gọi class Cart
require_once '../class/Cart.php'; // Đường dẫn đến class Cart
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Người dùng chưa đăng nhập"
    ]);
    exit;
}
$user_id = $_SESSION['user_id'];
$cart = new Cart();
$cartItems = $cart->getCartByUserId($user_id, $con);
echo json_encode([
    'status' => 'success',
    'data' => $cartItems
]);
?>
