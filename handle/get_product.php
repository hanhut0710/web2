<?php   
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("./connect.php");

$pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 'all';

$offset = ($page - 1) * $pageSize;

// Nếu category_id là "all", lấy sản phẩm từ category_id từ 1 đến 6
if ($category_id == 'all') {
    $sql = "SELECT id, name, price, img_src FROM products WHERE category_id BETWEEN 1 AND 6 LIMIT ? OFFSET ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $pageSize, $offset);
} else {
    $sql = "SELECT id, name, price, img_src FROM products WHERE category_id = ? LIMIT ? OFFSET ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iii", $category_id, $pageSize, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Lấy tổng số sản phẩm theo category_id
if ($category_id == 'all') {
    $sql2 = "SELECT COUNT(*) as total FROM products WHERE category_id BETWEEN 1 AND 6";
    $stmt2 = $con->prepare($sql2);
} else {
    $sql2 = "SELECT COUNT(*) as total FROM products WHERE category_id = ?";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param("i", $category_id);
}

$stmt2->execute();
$result2 = $stmt2->get_result();
$totalProduct = $result2->fetch_assoc()['total'];

$response = [
    'data' => $data,
    'totalProduct' => $totalProduct
];

header('Content-Type: application/json');
echo json_encode($response);

$con->close();
?>
