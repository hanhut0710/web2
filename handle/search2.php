<?php
include 'connect.php';
header('Content-Type: application/json');

$keyword = $_GET['keyword'] ?? '';
$brand = $_GET['brand'] ?? '';
$category = $_GET['category'] ?? '';
$minPrice = $_GET['minPrice'] ?? 0;
$maxPrice = $_GET['maxPrice'] ?? 999999999;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
$offset = ($page - 1) * $limit;

$keyword = mysqli_real_escape_string($con, $keyword);
$brand = mysqli_real_escape_string($con, $brand);
$category = mysqli_real_escape_string($con, $category);

$where = "WHERE products.price >= $minPrice AND products.price <= $maxPrice AND status = 1 AND isdeleted = 1 AND stock > 0";

if (!empty($keyword)) {
    $where .= " AND products.name LIKE '%$keyword%'";
}

if (!empty($category) && $category !== 'all') {
    $where .= " AND products.category_id = '$category'";
}

if (!empty($brand) && $brand !== 'all') {
    $where .= " AND products.brand_id = '$brand'";
}

$countQuery = "
    SELECT COUNT(DISTINCT products.id) as total
    FROM products
    $where
";
$countResult = mysqli_query($con, $countQuery);
$total = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($total / $limit);

$sql = "
    SELECT products.*
    FROM products
    $where
    GROUP BY products.id
    LIMIT $limit OFFSET $offset
";

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

$con->close();
?>

