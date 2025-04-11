<?php
header('Content-Type: application/json');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Kết nối CSDL
include("./connect.php");
// Gọi class Cart
require_once '../class/Cart.php'; // Đường dẫn đến class Cart
// Nếu chưa có user_id (chưa đăng nhập)
if (!isset($_SESSION['user_id'])) {
    // Gán guest_id nếu chưa có
    if (!isset($_SESSION['guest_id'])) {
        $_SESSION['guest_id'] = mt_rand(100000000, 999999999);
    }

    // Giỏ hàng tạm thời
    $user_id = $_SESSION['guest_id'];
    $cart = new Cart();
    $cartItems = $cart->getCartByUserId($user_id, $con);
    echo json_encode([
        'status' => 'success',
        'data' => $cartItems
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
