<?php
// Giả sử đây là file set_default_address.php

session_start();
include ('./connect.php');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Chưa đăng nhập']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Nhận dữ liệu JSON từ client
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['address_id'])) {
    $address_id = $data['address_id'];

    // Hàm đặt địa chỉ làm mặc định
    function setDefaultAddress($address_id, $user_id, $con) {
        // Đặt tất cả các địa chỉ của người dùng thành không phải mặc định
        $updateQuery = "UPDATE address SET `default` = 0 WHERE user_id = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Đặt địa chỉ có ID là $address_id thành mặc định
        $updateQuery = "UPDATE address SET `default` = 1 WHERE id = ? AND user_id = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("ii", $address_id, $user_id);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    // Gọi hàm đặt địa chỉ mặc định
    if (setDefaultAddress($address_id, $user_id, $con)) {
        echo json_encode(['success' => 'Địa chỉ đã được đặt làm mặc định']);
    } else {
        echo json_encode(['error' => 'Có lỗi xảy ra khi cập nhật']);
    }
} else {
    echo json_encode(['error' => 'Không tìm thấy address_id']);
}
?>