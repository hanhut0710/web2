<?php
session_start();
include('./connect.php');

if(isset($_SESSION['guest_id']) && !isset($_SESSION['user_id'])){
    $user_id = $_SESSION['guest_id'];
}
else {
    $user_id = $_SESSION['user_id'];
}
// Lấy cả product_detail_id và tên sản phẩm
$sql = "SELECT 
            c.quantity, 
            pd.id AS product_detail_id,
            p.name,
            (p.price * c.quantity) AS total
        FROM cart c
        JOIN product_details pd ON c.product_detail_id = pd.id
        JOIN products p ON pd.product_id = p.id
        WHERE c.user_id = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cartItems = [];
while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

header('Content-Type: application/json');
echo json_encode($cartItems);
?>
