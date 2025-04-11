<?php
include 'connect.php';
header('Content-Type: application/json');

// Nhận dữ liệu từ frontend
$keyword = $_GET['keyword'] ?? '';
$brand = $_GET['brand'] ?? '';
$category = $_GET['category'] ?? '';
$minPrice = $_GET['minPrice'] ?? 0;
$maxPrice = $_GET['maxPrice'] ?? 999999999;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
$offset = ($page - 1) * $limit;

// Escape dữ liệu
$keyword = mysqli_real_escape_string($con, $keyword);
$brand = mysqli_real_escape_string($con, $brand);
$category = mysqli_real_escape_string($con, $category);

// Tạo điều kiện WHERE
$where = "WHERE products.price >= $minPrice AND products.price <= $maxPrice";

if (!empty($keyword)) {
    $where .= " AND products.name LIKE '%$keyword%'";
}

if (!empty($category) && $category !== 'all') {
    $where .= " AND products.category_id = '$category'";
}

if (!empty($brand) && $brand !== 'all') {
    $where .= " AND product_details.brand = '$brand'";
}

// Đếm tổng số sản phẩm phù hợp
$countQuery = "
    SELECT COUNT(DISTINCT products.id) as total
    FROM products
    LEFT JOIN product_details ON products.id = product_details.product_id
    $where
";
$countResult = mysqli_query($con, $countQuery);
$total = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($total / $limit);

// Lấy dữ liệu sản phẩm
$sql = "
    SELECT products.*, product_details.brand
    FROM products
    LEFT JOIN product_details ON products.id = product_details.product_id
    $where
    GROUP BY products.id
    LIMIT $limit OFFSET $offset
";

$result = mysqli_query($con, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Trả về JSON
echo json_encode([
    "products" => $data,
    "total" => $total,
    "totalPages" => $totalPages,
    "currentPage" => $page
]);
exit;
