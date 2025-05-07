<?php
header("Content-Type: application/json");
include('./connect.php');
session_start();
// Lấy user_id từ session nếu có
$userId = $_SESSION['user_id'] ?? null;

// Truy vấn tất cả đơn hàng của người dùng
$sql = "SELECT orders.*, 
               CONCAT_WS(', ', address.address_line, address.ward, address.district, address.city) AS full_address
        FROM orders 
        JOIN address ON orders.address_id = address.id
        WHERE orders.user_id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$orders = [];
while ($order = mysqli_fetch_assoc($result)) {
    // Truy vấn chi tiết đơn hàng từ bảng order_details
    $orderId = $order['id'];
    $detailSql = "SELECT od.*, pd.color, pd.size, pd.img_src , p.name
        FROM order_details od
        JOIN product_details pd ON od.product_detail_id = pd.id
        JOIN products p ON od.product_id = p.id
        WHERE od.order_id = ?";
    $detailStmt = mysqli_prepare($con, $detailSql);
    mysqli_stmt_bind_param($detailStmt, "i", $orderId);
    mysqli_stmt_execute($detailStmt);
    $detailResult = mysqli_stmt_get_result($detailStmt);

    $details = [];
    while ($detail = mysqli_fetch_assoc($detailResult)) {
        $details[] = $detail;
    }

    $order['details'] = $details;
    $orders[] = $order;
    mysqli_stmt_close($detailStmt);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

// Trả kết quả về dưới dạng JSON
echo json_encode([
    'status' => 'success',
    'data' => $orders
], JSON_UNESCAPED_UNICODE);
?>
