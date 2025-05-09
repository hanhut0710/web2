<?php   
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("./connect.php");

$pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 'all';
$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : 'all';

$offset = ($page - 1) * $pageSize;

$baseCondition = "status = 1 AND isdeleted = 1 AND stock > 0";

if ($category_id == 'all' && $brand_id == 'all') {
    $sql = "SELECT id, name, price, img_src FROM products 
            WHERE $baseCondition AND category_id BETWEEN 1 AND 6 
            LIMIT $pageSize OFFSET $offset";
} else if ($category_id != 'all' && $brand_id == 'all') {
    $sql = "SELECT id, name, price, img_src FROM products 
            WHERE $baseCondition AND category_id = $category_id 
            LIMIT $pageSize OFFSET $offset";
} else if ($category_id == 'all' && $brand_id != 'all') {
    $sql = "SELECT id, name, price, img_src FROM products 
            WHERE $baseCondition AND brand_id = $brand_id 
            LIMIT $pageSize OFFSET $offset";
} else {
    $sql = "SELECT id, name, price, img_src FROM products 
            WHERE $baseCondition AND category_id = $category_id AND brand_id = $brand_id 
            LIMIT $pageSize OFFSET $offset";
}

$result = mysqli_query($con, $sql);
$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

if ($category_id == 'all' && $brand_id == 'all') {
    $sql2 = "SELECT COUNT(*) as total FROM products 
             WHERE $baseCondition AND category_id BETWEEN 1 AND 6";
} elseif ($category_id != 'all' && $brand_id == 'all') {
    $sql2 = "SELECT COUNT(*) as total FROM products 
             WHERE $baseCondition AND category_id = $category_id";
} elseif ($category_id == 'all' && $brand_id != 'all') {
    $sql2 = "SELECT COUNT(*) as total FROM products 
             WHERE $baseCondition AND brand_id = $brand_id";
} else {
    $sql2 = "SELECT COUNT(*) as total FROM products 
             WHERE $baseCondition AND category_id = $category_id AND brand_id = $brand_id";
}

$result2 = mysqli_query($con, $sql2);
$totalProduct = mysqli_fetch_assoc($result2)['total'];

$response = [
    'data' => $data,
    'totalProduct' => $totalProduct
];

header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($con);
?>
