<?php
require_once '../class/Cart.php';
require_once './connect.php';
session_start();

// if (!isset($_SESSION['user_id'])) {
//     echo json_encode(["status" => "error", "message" => "Chưa đăng nhập"]);
//     exit;
// }

if (!isset($_GET['id'])) {
    echo json_encode(["status" => "error", "message" => "Thiếu ID sản phẩm cần xoá"]);
    exit;
}

$cart = new Cart();
$cart->setId($_GET['id']);

if ($cart->removeById($con)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Xoá thất bại"]);
}
?>
