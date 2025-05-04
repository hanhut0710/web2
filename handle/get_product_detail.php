<?php
session_start();
include('./connect.php');

// Kiểm tra có nhận product_detail_id không
if (!isset($_POST['product_detail_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Thiếu product_detail_id']);
    exit;
}

$productDetailId = intval($_POST['product_detail_id']);

$sql = "SELECT 
            p.id AS product_id,
            pd.id AS product_detail_id,
            p.name AS product_name, 
            p.price AS total, 
            pd.img_src,
            pd.color
        FROM product_details pd
        JOIN products p ON pd.product_id = p.id
        WHERE pd.id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $productDetailId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['error' => 'Không tìm thấy sản phẩm']);
}
