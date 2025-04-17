<?php
session_start(); // Phải có dòng này để sử dụng session

include ('../class/Address.php');
include('./connect.php');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401); 
    echo json_encode(['error' => 'Chưa đăng nhập']);
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM address WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$addresses = [];
while ($row = $result->fetch_assoc()) {
    $addresses[] = [
        'id' => $row['id'],
        'address_line' => $row['address_line'],
        'ward' => $row['ward'],
        'district' => $row['district'],
        'city' => $row['city'],
        'default' => $row['default'] 
    ];
}

header('Content-Type: application/json');
echo json_encode($addresses);
?>