<?php
header('Content-Type: application/json');
session_start();

include("../class/address.php");
include("./connect.php");

// Kiểm tra nếu user đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "error" => "Bạn chưa đăng nhập."
    ]);
    exit;
}

// Đọc dữ liệu JSON từ request
$data = json_decode(file_get_contents("php://input"), true);
$address_id = $data['address_id'] ?? null;

// Kiểm tra dữ liệu hợp lệ
if (!$address_id) {
    echo json_encode([
        "success" => false,
        "error" => "Thiếu mã địa chỉ."
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin địa chỉ để kiểm tra nếu nó là địa chỉ mặc định
$stmt = $con->prepare("SELECT * FROM address WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $address_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$address = $result->fetch_assoc();
$stmt->close();

// Kiểm tra nếu địa chỉ không tồn tại
if (!$address) {
    echo json_encode([
        "success" => false,
        "error" => "Không tìm thấy địa chỉ."
    ]);
    exit;
}

// Kiểm tra nếu địa chỉ cần xóa là địa chỉ mặc định
if ($address['default'] == 1) {
    // Tìm địa chỉ đầu tiên còn lại của người dùng để làm default
    $stmt = $con->prepare("SELECT * FROM address WHERE user_id = ? AND id != ? ORDER BY id ASC LIMIT 1");
    $stmt->bind_param("ii", $user_id, $address_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $new_default = $result->fetch_assoc();

    // Nếu có địa chỉ khác, đặt địa chỉ đầu tiên làm default
    if ($new_default) {
        $new_default_id = $new_default['id'];
        $update_stmt = $con->prepare("UPDATE address SET `default` = 1 WHERE id = ?");
        $update_stmt->bind_param("i", $new_default_id);
        $update_stmt->execute();
        $update_stmt->close();
    }
    $stmt->close();
}
// Xoá địa chỉ từ DB
$stmt = $con->prepare("DELETE FROM address WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $address_id, $user_id);
if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Không tìm thấy hoặc không thể xóa địa chỉ."
    ]);
}
$stmt->close();
$con->close();
?>
