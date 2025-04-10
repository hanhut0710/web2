<?php
include 'connect.php';
header('Content-Type: application/json');

$keyword = $_GET['keyword'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
$offset = ($page - 1) * $limit;

$keyword = mysqli_real_escape_string($con, $keyword);

// Đếm tổng sản phẩm
$countQuery = "SELECT COUNT(*) as total FROM products WHERE name LIKE '%$keyword%'";
$countResult = mysqli_query($con, $countQuery);
$total = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($total / $limit);

// Lấy sản phẩm theo trang
$sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode([
    "products" => $data,
    "total" => $total,
    "totalPages" => $totalPages,
    "currentPage" => $page
]);
exit;