<?php
include(__DIR__ . '/connect.php');
function getCartItemCount($con) {
    session_start();
    
    // Lấy user_id (người dùng đã đăng nhập hoặc khách)
    $user_id = $_SESSION['user_id'] ?? $_SESSION['guest_id'] ?? null;
    
    if (!$user_id) {
        return 0; // Không có session => chưa có giỏ
    }

    // Chuẩn bị truy vấn
    $stmt = $con->prepare("SELECT SUM(quantity) AS total FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id); // dùng "s" vì user_id có thể là chuỗi (guest_id)

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['total'] ?? 0;
}
?>
