<?php
include("./connect.php");
session_start();

$user_id = $_SESSION['user_id'];

// Kiểm tra giá trị của user_id
// echo "User ID: " . $user_id . "<br>";

$sql = "SELECT * FROM address WHERE user_id = ? AND `default` = 1 LIMIT 1";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// In tất cả kết quả từ cơ sở dữ liệu
// while ($row = $result->fetch_assoc()) {
//     echo "ID: " . $row['id'] . " - Địa chỉ: " . $row['address_line'] . " - Quận: " . $row['district'] . "<br>";
// }

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'district' => $row['district'],
        'ward' => $row['ward'],
        'address_line' => $row['address_line']
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Không tìm thấy địa chỉ.']);
}
?>
